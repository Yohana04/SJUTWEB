<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display campus life gallery items
     */
    public function campusLife()
    {
        $galleryItems = Gallery::active()
            ->ordered()
            ->get();

        return view('campus-life', compact('galleryItems'));
    }

    /**
     * Display all gallery items for admin
     */
    public function index()
    {
        $galleries = Gallery::orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new gallery item
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created gallery item
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:10240', // 10MB max
            'type' => 'required|in:image,video',
            'category' => 'required|string|in:campus-life,events,sports,academic,general',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('gallery', 'public');

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'type' => $request->type,
            'category' => $request->category,
            'order' => $request->order ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery item uploaded successfully!');
    }

    /**
     * Show the form for editing the specified gallery item
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified gallery item
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:10240',
            'type' => 'required|in:image,video',
            'category' => 'required|string|in:campus-life,events,sports,academic,general',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'category' => $request->category,
            'order' => $request->order ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ];

        if ($request->hasFile('file')) {
            // Delete old file
            if ($gallery->file_path) {
                Storage::disk('public')->delete($gallery->file_path);
            }
            
            $file = $request->file('file');
            $data['file_path'] = $file->store('gallery', 'public');
        }

        $gallery->update($data);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery item updated successfully!');
    }

    /**
     * Remove the specified gallery item
     */
    public function destroy(Gallery $gallery)
    {
        // Delete file from storage
        if ($gallery->file_path) {
            Storage::disk('public')->delete($gallery->file_path);
        }

        $gallery->delete();

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery item deleted successfully!');
    }

    /**
     * Toggle gallery item status
     */
    public function toggleStatus(Gallery $gallery)
    {
        $gallery->update(['is_active' => !$gallery->is_active]);

        $message = $gallery->is_active ? 'Gallery item activated successfully!' : 'Gallery item deactivated successfully!';

        return redirect()->back()->with('success', $message);
    }

    /**
     * Reorder gallery items
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:galleries,id',
            'items.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Gallery::find($item['id'])->update(['order' => $item['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Gallery items reordered successfully!'
        ]);
    }
}
