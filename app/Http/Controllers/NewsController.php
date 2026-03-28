<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->is('admin/*')) {
            $news = News::latest('published_at')->paginate(10);
            return view('admin.news.index', compact('news'));
        }
        $news = News::where('status', 'published')
                   ->latest('published_at')
                   ->paginate(9);
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('news', 'public');
            $data['image'] = $path;
        }

        $news = News::create($data);

        if ($news->status === 'published') {
            $this->notifySubscribers($news);
        }

        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    public function show(News $news)
    {
        $read = session()->get('read_news', []);
        if (!in_array($news->id, $read)) {
            $read[] = $news->id;
            session()->put('read_news', $read);
        }
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('news', 'public');
            $data['image'] = $path;
        }

        $news->update($data);

        if ($news->wasChanged('status') && $news->status === 'published') {
            $this->notifySubscribers($news);
        }

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    private function notifySubscribers($news)
    {
        $subscribers = \App\Models\Subscriber::where('is_active', true)->get();
        foreach ($subscribers as $subscriber) {
            try {
                \Illuminate\Support\Facades\Mail::to($subscriber->email)->send(new \App\Mail\ContentNotification(
                    $news->title,
                    $news->content,
                    route('news.show', $news),
                    'News'
                ));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Mail sending failed: ' . $e->getMessage());
            }
        }
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }

    public function bulk(Request $request)
    {
        $ids = $request->input('ids', []);
        $action = $request->input('action');

        if (empty($ids) || !$action) {
            return back()->with('error', 'No items or action selected.');
        }

        switch ($action) {
            case 'delete':
                News::whereIn('id', $ids)->delete();
                $message = count($ids) . ' stories permanently removed.';
                break;
            case 'published':
            case 'draft':
                News::whereIn('id', $ids)->update(['status' => $action]);
                $message = count($ids) . ' stories updated to ' . $action . '.';
                break;
            default:
                return back()->with('error', 'Invalid action.');
        }

        return back()->with('success', $message);
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $handle = fopen($file->getRealPath(), 'r');
        
        // Skip header
        $header = fgetcsv($handle);
        $count = 0;

        while (($row = fgetcsv($handle)) !== false) {
            // Mapping: title, content, status
            if (count($row) < 2) continue;

            News::create([
                'title' => $row[0],
                'slug' => Str::slug($row[0]),
                'content' => $row[1],
                'status' => $row[2] ?? 'draft',
                'published_at' => now(),
            ]);
            $count++;
        }

        fclose($handle);

        return back()->with('success', "Successfully imported {$count} news stories.");
    }

    public function downloadTemplate()
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=news_template.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['title', 'content', 'status'];

        $callback = function() use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            fputcsv($file, ['Sample Title', 'Sample Content Content', 'published']);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
