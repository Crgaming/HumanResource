<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $departments = Department::all(); // Fetch all departments
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'DepartmentID' => 'required|integer|unique:departments,DepartmentID',
            'Name' => 'required|string|max:255',
            'GroupName' => 'required|string|max:255',
            'ModifiedDate' => 'required|date',
        ]);

        // Create new department
        $department = new Department($validatedData);
        $department->save();

        // Redirect back to department list with a success message
        return redirect()->route('admin.departments.index')->with('success', 'Department added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('admin.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|max:255',
            'group_name' => 'required|max:255',


        ]);
        $department->Name = $request->name;
        $department->GroupName = $request->group_name;
        $department->save();

        return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully.');
    }
    public function employees($departmentID)
    {
        // Get employees belonging to the department
        $employees = DB::table('employee_department_history')
            ->where('DepartmentID', $departmentID)
            ->select('BusinessEntityID', 'StartDate', 'EndDate')
            ->get();

        // Get the department details
        $department = Department::find($departmentID);

        return view('admin.departments.employees', compact('department', 'employees'));
    }
}
