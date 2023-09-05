<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Events\PodcastProcessed;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Pegawai";
        $employees = Employee::all();
        return view('employees.index', compact('employees','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Form Pegawai";
        return view('employees.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'position' => 'required',
        ]);
    
        Employee::create($validatedData);
        event(new PodcastProcessed('success'));
        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Detail Pegawai";
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Detail Pegawai";
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $id,
            'position' => 'required',
        ]);
    
        $employee = Employee::findOrFail($id);
        $employee->update($validatedData);
        event(new PodcastProcessed('success'));
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        event(new PodcastProcessed('success'));
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

    public function export()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }
}
