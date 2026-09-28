<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    // Sabhi employees ki list dikhane ke liye
    public function index()
    {
        $employees = Employee::all();
        return view('all_employee', compact('employees'));
    }

    // Add employee form
    public function create()
    {
        return view('add_employee');
    }

    // Database mein save karne ke liye
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string',
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->route('employees.index')
            ->with('success', 'Employee added successfully!');
    }

    // Edit form dikhane ke liye
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('edit_employee', compact('employee'));
    }

    // Update karne ke liye
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string',
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully!');
    }

    // Delete karne ke liye
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully!');
    }
}