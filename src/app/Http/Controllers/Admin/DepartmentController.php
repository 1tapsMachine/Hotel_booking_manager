<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();
        return view('admin.departments.index')->with('departments', $departments);
    }

    public function add()
    {
        $employees = Employee::latest()->get();
        return view('admin.departments.create')->with('employees', $employees);
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'employee' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all()
            ]);
        } else {
            $departments = new Department();
            $departments->name = $request->name;
            $departments->save();
            foreach ($request->employee as $emp) {
                Employee::where('id', $emp)->update(['dep_id' => $departments->id]);
            }
            return response()->json([
                'success' => true,
                'message' => ['department add successfully']
            ]);
        }
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $employees = Employee::latest()->get();
        return view('admin.departments.update')->with('department', $department)->with('employees', $employees);
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all()
            ]);
        } else {
            $departments = Department::findOrFail($request->id);
            $departments->name = $request->name;
            $departments->save();
            if ($request->employee) {
                foreach ($request->employee as $emp) {
                    Employee::where('id', $emp)->update(['dep_id' => $departments->id]);
                }
            }

            foreach ($employees = Employee::where('dep_id', $request->id)->get() as $removed_emp) {
                $employeeIds = $request->employee ?? [];
                if (!in_array($removed_emp->id, $employeeIds) & $removed_emp->dep_id == $departments->id) {
                    Employee::where('id', $removed_emp->id)->update(['dep_id' => 1]);
                }
            }
            return response()->json([
                'success' => true,
                'message' => ['department Update successfully']
            ]);
        }
    }

    public function delete(Request $request)
    {
        foreach ($employees = Employee::where('dep_id', $request->id)->get() as $emp) {
            Employee::where('id', $emp->id)->update(['dep_id' => 1]);
        }
        $departments = Department::findOrFail($request->id)->delete();
        return response()->json([
            'success' => true,
            'message' => ['department delete successfully']
        ]);
    }
}
