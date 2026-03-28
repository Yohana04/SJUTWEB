<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $announcements = Announcement::latest('published_at')->get();
        if ($request->is('admin/*')) {
            return view('admin.announcements.index', compact('announcements'));
        }
        return view('announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:General,Academic,Urgent',
            'status' => 'required|in:active,inactive',
            'published_at' => 'required|date',
            'expires_at' => 'nullable|date|after:published_at',
        ]);

        $announcement = Announcement::create($request->all());

        if ($announcement->status === 'active') {
            $this->notifySubscribers($announcement);
        }

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement created successfully.');
    }

    public function show(Announcement $announcement)
    {
        $read = session()->get('read_announcements', []);
        if (!in_array($announcement->id, $read)) {
            $read[] = $announcement->id;
            session()->put('read_announcements', $read);
        }
        return view('announcements.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:General,Academic,Urgent',
            'status' => 'required|in:active,inactive',
            'published_at' => 'required|date',
            'expires_at' => 'nullable|date|after:published_at',
        ]);

        $announcement->update($request->all());

        if ($announcement->wasChanged('status') && $announcement->status === 'active') {
            $this->notifySubscribers($announcement);
        }

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement updated successfully.');
    }

    private function notifySubscribers($announcement)
    {
        $subscribers = \App\Models\Subscriber::where('is_active', true)->get();
        foreach ($subscribers as $subscriber) {
            try {
                \Illuminate\Support\Facades\Mail::to($subscriber->email)->send(new \App\Mail\ContentNotification(
                    $announcement->title,
                    $announcement->content,
                    route('announcements.show', $announcement),
                    'Announcement'
                ));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Mail sending failed: ' . $e->getMessage());
            }
        }
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('admin.announcements.index')->with('success', 'Announcement deleted successfully.');
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
                Announcement::whereIn('id', $ids)->delete();
                $message = count($ids) . ' notices permanently removed.';
                break;
            case 'active':
            case 'inactive':
                Announcement::whereIn('id', $ids)->update(['status' => $action]);
                $message = count($ids) . ' notices updated to ' . $action . '.';
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
            // Mapping: title, content, type, status
            if (count($row) < 2) continue;

            Announcement::create([
                'title' => $row[0],
                'content' => $row[1],
                'type' => $row[2] ?? 'General',
                'status' => $row[3] ?? 'active',
                'published_at' => now(),
            ]);
            $count++;
        }

        fclose($handle);

        return back()->with('success', "Successfully imported {$count} announcements.");
    }

    public function downloadTemplate()
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=announcements_template.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['title', 'content', 'type', 'status'];

        $callback = function() use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            fputcsv($file, ['Important Notice', 'Registration details...', 'Academic', 'active']);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
