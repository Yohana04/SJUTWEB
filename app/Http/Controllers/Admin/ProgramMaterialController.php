<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramMaterial;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramMaterialController extends Controller
{
    public function index()
    {
        $materials = ProgramMaterial::with('program')->orderBy('created_at', 'desc')->get();
        return view('admin.materials.index', compact('materials'));
    }

    public function create()
    {
        $programs = Program::orderBy('name')->get();
        return view('admin.materials.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|max:10240', // 10MB max
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('program_materials', 'public');
            
            ProgramMaterial::create([
                'program_id' => $request->program_id,
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $filePath,
                'file_name' => $fileName,
                'file_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
            ]);
        }

        return redirect()->route('admin.materials.index')->with('success', 'Material uploaded successfully.');
    }

    public function show(ProgramMaterial $material)
    {
        return view('admin.materials.show', compact('material'));
    }

    public function edit(ProgramMaterial $material)
    {
        $programs = Program::orderBy('name')->get();
        return view('admin.materials.edit', compact('material', 'programs'));
    }

    public function update(Request $request, ProgramMaterial $material)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $material->update($request->all());

        return redirect()->route('admin.materials.index')->with('success', 'Material updated successfully.');
    }

    public function destroy(ProgramMaterial $material)
    {
        // Delete file from storage
        if (file_exists(public_path($material->file_path))) {
            unlink(public_path($material->file_path));
        }
        
        $material->delete();
        return redirect()->route('admin.materials.index')->with('success', 'Material deleted successfully.');
    }
}
