<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();

        if (!$request->is('admin/*')) {
            $query->where('status', 'active');
        }

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $projects = $query->latest()->paginate(12);

        if ($request->is('admin/*')) {
            return view('admin.projects.index', compact('projects'));
        }

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:research,student_project',
            'year' => 'nullable|integer',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('projects/files', 'public');
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects/images', 'public');
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Published successfully.');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:research,student_project',
            'year' => 'nullable|integer',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('projects/files', 'public');
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects/images', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Removed successfully.');
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
                Project::whereIn('id', $ids)->delete();
                $message = count($ids) . ' records permanently removed.';
                break;
            case 'active':
            case 'inactive':
                Project::whereIn('id', $ids)->update(['status' => $action]);
                $message = count($ids) . ' records updated to ' . $action . '.';
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
            // Mapping: title, author, category, description, year, file_path, image
            if (count($row) < 3) continue;

            $projectData = [
                'title' => $row[0],
                'author' => $row[1],
                'category' => $row[2] ?? 'student_project',
                'description' => $row[3] ?? '',
                'year' => $row[4] ?? date('Y'),
                'status' => 'active',
            ];

            // Handle file_path from CSV (column 5)
            if (isset($row[5]) && !empty($row[5])) {
                // If CSV contains file path, use it (for existing files)
                $projectData['file_path'] = $row[5];
            }

            // Handle image from CSV (column 6)
            if (isset($row[6]) && !empty($row[6])) {
                // If CSV contains image path, use it (for existing images)
                $projectData['image'] = $row[6];
            }

            Project::create($projectData);
            $count++;
        }

        fclose($handle);

        return back()->with('success', "Successfully imported {$count} projects. Note: File attachments need to be uploaded individually for each project.");
    }

    public function bulkUpload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $csvFile = $request->file('csv_file');
        $handle = fopen($csvFile->getRealPath(), 'r');
        
        // Skip header
        $header = fgetcsv($handle);
        $count = 0;
        $uploadedDocuments = [];

        // Handle document uploads first
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                $uploadedDocuments[] = $document->store('projects/files', 'public');
            }
        }

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) < 3) continue;

            $projectData = [
                'title' => $row[0],
                'author' => $row[1],
                'category' => $row[2] ?? 'student_project',
                'description' => $row[3] ?? '',
                'year' => $row[4] ?? date('Y'),
                'status' => 'active',
            ];

            // Assign uploaded document if available
            if (!empty($uploadedDocuments)) {
                $projectData['file_path'] = array_shift($uploadedDocuments);
            }

            // Handle file_path from CSV (column 5)
            if (isset($row[5]) && !empty($row[5])) {
                $projectData['file_path'] = $row[5];
            }

            // Handle image from CSV (column 6)
            if (isset($row[6]) && !empty($row[6])) {
                $projectData['image'] = $row[6];
            }

            Project::create($projectData);
            $count++;
        }

        fclose($handle);

        return back()->with('success', "Successfully imported {$count} projects with " . count($request->file('documents', [])) . " document(s).");
    }

    public function downloadTemplate()
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=projects_template.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['title', 'author', 'category', 'description', 'year', 'file_path', 'image'];

        $callback = function() use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            
            // Add sample data
            fputcsv($file, [
                'Machine Learning Applications in Healthcare',
                'John Smith',
                'research',
                'This research explores the application of machine learning algorithms in healthcare diagnosis and treatment.',
                '2024',
                '', // file_path - upload documents individually
                ''  // image - upload images individually
            ]);
            
            fputcsv($file, [
                'Student Project Management System',
                'Jane Doe',
                'student_project',
                'A comprehensive system for managing student projects with real-time collaboration features.',
                '2024',
                '', // file_path - upload documents individually
                ''  // image - upload images individually
            ]);
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
