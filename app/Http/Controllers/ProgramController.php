<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Department;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $programs = Program::with('department')->get();
        if ($request->is('admin/*')) {
            return view('admin.programs.index', compact('programs'));
        }
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.programs.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|in:Diploma,Degree,Masters',
            'description' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'duration_years' => 'required|integer|min:1|max:10',
            'code' => 'required|string|unique:programs,code',
        ]);

        Program::create($request->all());
        return redirect()->route('admin.programs.index')->with('success', 'Program created successfully.');
    }

    public function show(Program $program)
    {
        $program->load(['department', 'materials']);
        return view('programs.show', compact('program'));
    }

    public function edit(Program $program)
    {
        $departments = Department::all();
        return view('admin.programs.edit', compact('program', 'departments'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|in:Diploma,Degree,Masters',
            'description' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'duration_years' => 'required|integer|min:1|max:10',
            'code' => 'required|string|unique:programs,code,' . $program->id,
        ]);

        $program->update($request->all());
        return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program deleted successfully.');
    }
}
