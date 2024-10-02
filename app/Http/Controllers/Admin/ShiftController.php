<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $shifts = Shift::all(); // Get all shifts from the database
        return view('admin.shifts.index', compact('shifts')); // Pass shifts to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shifts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'ShiftID' => 'required|integer|unique:shifts,ShiftID',
            'Name' => 'required|string|max:255',
            'StartTime' => 'required|date_format:H:i:s',
            'EndTime' => 'required|date_format:H:i:s|after:StartTime',
            'ModifiedDate' => 'required|date',
        ]);

        // Create a new shift
        $shift = new Shift();
        $shift->ShiftID = $validatedData['ShiftID'];
        $shift->Name = $validatedData['Name'];
        $shift->StartTime = $validatedData['StartTime'];
        $shift->EndTime = $validatedData['EndTime'];
        $shift->ModifiedDate = $validatedData['ModifiedDate'];
        $shift->save();

        return redirect()->route('admin.shifts.index')->with('success', 'Shift created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Shift $shift)
    {
        return view('admin.shifts.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        return view('admin.shifts.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shift $shift)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'ShiftID' => 'required|integer|unique:shifts,ShiftID,' . $shift->ShiftID . ',ShiftID',
            'Name' => 'required|string|max:255',
            'StartTime' => 'required|date_format:H:i:s',
            'EndTime' => 'required|date_format:H:i:s|after:StartTime',
            'ModifiedDate' => 'required|date',
        ]);

        $shift->update($validatedData);

        return redirect()->route('admin.shifts.index')->with('success', 'Shift updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift) 
    {
        $shift->delete();

        return redirect()->route('admin.shifts.index')->with('success', 'Shift deleted successfully');
    }
}
