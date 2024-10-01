<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            // Filter employees by BusinessEntityID
            $employees = Employee::where('BusinessEntityID', $search)->get();
        } else {
            // Fetch all employees if no search query
            $employees = Employee::all();
        }

        // Return the view with the employee data
        return view('admin.employees.index', compact('employees', 'search'));
    }

    public function view($businessEntityID)
    {
        // Fetch the employee by BusinessEntityID
        $employee = Employee::where('BusinessEntityID', $businessEntityID)->firstOrFail();

        // Return the 'view full' page with the employee data
        return view('admin.employees.view', compact('employee'));
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'BusinessEntityID' => 'required|integer|unique:employees,BusinessEntityID',
            'NationalIDNumber' => 'required|string|max:25',
            'LoginID' => 'required|string|max:255',
            'OrganizationNode' => 'required',
            'OrganizationLevel' => 'required|integer',
            'JobTitle' => 'required|string|max:50',
            'BirthDate' => 'required|date',
            'MaritalStatus' => 'required|in:M,S',
            'Gender' => 'required|in:M,F',
            'HireDate' => 'required|date',
            'VacationHours' => 'required|integer',
            'SickLeaveHours' => 'required|integer',
            'ModifiedDate' => 'required|date',
        ]);

        // Create new employee
        $employee = new Employee($validatedData);
        $employee->save();

        // Redirect back to employee list with a success message
        return redirect()->route('admin.employees.index')->with('success', 'Employee added successfully');
    }
    public function edit($businessEntityID)
    {
        // Fetch the employee by BusinessEntityID
        $employee = Employee::where('BusinessEntityID', $businessEntityID)->firstOrFail();

        // Return the edit form view with the employee data
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, $businessEntityID)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'NationalIDNumber' => 'required|string|max:25',
            'LoginID' => 'required|string|max:255',
            'OrganizationNode' => 'required',
            'OrganizationLevel' => 'required|integer',
            'JobTitle' => 'required|string|max:50',
            'BirthDate' => 'required|date',
            'MaritalStatus' => 'required|in:M,S',
            'Gender' => 'required|in:M,F',
            'HireDate' => 'required|date',
            'VacationHours' => 'required|integer',
            'SickLeaveHours' => 'required|integer',
            'ModifiedDate' => 'required|date',
        ]);

        // Fetch the employee by BusinessEntityID
        $employee = Employee::where('BusinessEntityID', $businessEntityID)->firstOrFail();

        // Update the employee data
        $employee->update($validatedData);

        // Redirect back to employee list with a success message
        return redirect()->route('admin.employees.index')->with('success', 'Employee updated successfully');
    }


    public function destroy($businessEntityID)
    {
        $employee = Employee::where('BusinessEntityID', $businessEntityID)->firstOrFail();
        $employee->delete();

        return redirect()->route('admin.employees.index')->with('success', 'Employee removed successfully');
    }
}
