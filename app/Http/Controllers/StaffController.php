<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Department;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Staff::with('department');

        if (!$request->is('admin/*')) {
            $query->where('status', 'active');
        }

        if ($request->has('department')) {
            $query->where('department_id', $request->department);
        }

        $staff = $query->orderBy('name')->paginate(12);
        
        if ($request->is('admin/*')) {
            return view('admin.staff.index', compact('staff'));
        }

        $departments = Department::all();
        
        return view('staff.index', compact('staff', 'departments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.staff.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'email' => 'nullable|email|unique:staff,email',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
            'photo' => 'nullable|image|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('staff', 'public');
        }

        Staff::create($data);

        return redirect()->route('admin.staff.index')->with('success', 'Staff member added successfully.');
    }

    public function edit(Staff $staff)
    {
        $departments = Department::all();
        return view('admin.staff.edit', compact('staff', 'departments'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'email' => 'nullable|email|unique:staff,email,' . $staff->id,
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
            'photo' => 'nullable|image|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('staff', 'public');
        }

        $staff->update($data);

        return redirect()->route('admin.staff.index')->with('success', 'Staff member updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('admin.staff.index')->with('success', 'Staff member removed successfully.');
    }
}
