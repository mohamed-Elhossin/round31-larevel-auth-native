<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeController extends Controller
{
  
    // List All Data
    public function index()
    {
        $employees  = Employee::with('department')->paginate(10);
        // return  $employees;
        return view('employees.index', compact('employees'));
    }


    // Go  Create Page
    public function create()
    {
        $departments = DB::table("departments")->get();
        return view("employees.create", compact("departments"));
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|min:3|max:20|unique:employees,name",
            'salary' => "required|numeric",
            'dep_id' => "required|numeric",
        ]);
        $newEmployee = new Employee();
        $newEmployee->name = $request->name;
        $newEmployee->salary =  $request->salary;
        $newEmployee->department_id =  $request->dep_id;
        $newEmployee->save();
        return redirect()->route("employee.index")->with("done", "Create Employee Successfully");
    }


    public function show($id)
    {
        $employee = Employee::with("department")->find($id);

        return view('employees.show', compact("employee"));
    }


    public function edit($id)
    {
        $employee = Employee::find($id);
        $departments = DB::table("departments")->get();
        return view('employees.edit', compact("employee", 'departments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|min:3|max:20|unique:employees,name",
            'salary' => "required|numeric",
            'dep_id' => "required|numeric",
        ]);
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->salary =  $request->salary;
        $employee->department_id =  $request->dep_id;
        $employee->save();
        return redirect()->route("employee.index")->with("done", "Update Employee Successfully");
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route("employee.index")->with("done", "Delete Employee Successfully");
    }
}
