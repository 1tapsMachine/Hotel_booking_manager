<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    public function index(): View
    {
        $employees = Employee::latest()->get();
        return view('admin.employees.index', compact('employees'));
    }

    public function add()
    {
        return view('admin.employees.create');
    }
    public function create(Request $request)
    {
            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'email' => [
                    'required',
                    'email',
                    'unique:employees',
                    function ($attribute, $value, $fail) {
                        if (\App\Models\Admin::where('email', $value)->exists()) {
                            $fail('The ' . $attribute . ' is already in use.');
                        }
                    },
                ],
                'password' => 'required',
                'phone' => 'required',
                'dob' => 'required',
                'city' => 'required',
            ]);
        
        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all()
            ]);
        } else {
            $employee = new Employee();
            $employee->dep_id = 1;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->dob = $request->dob;
            $employee->city = $request->city;
            $employee->phone = $request->phone;
            $employee->password = Hash::make($request->password);

            $result = $employee->save();
            if ($result) {
                return response()->json([
                    "success" => true,
                    'message' => [
                        'Employee Create Successfully'
                    ]
                ]);
            } else {
                return response()->json([
                    "success" => false,
                    'message' => [
                        'Failed to Create Employee'
                    ]
                ]);
            }
        }
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employees.update', compact('employee'));
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:employees',
                function ($attribute, $value, $fail) {
                    if (\App\Models\Admin::where('email', $value)->exists()) {
                        $fail('The ' . $attribute . ' is already in use.');
                    }
                },
            ],
            'phone' => 'required',
            'dob' => 'required',
            'city' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all()
            ]);
        } else {
            $employee =  Employee::findOrFail($request->id);
            $employee->dep_id = 1;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->dob = $request->dob;
            $employee->city = $request->city;
            $employee->phone = $request->phone;
            $result = $employee->save();
            if ($result) {
                return response()->json([
                    "success" => true,
                    'message' => [
                        'Employee Update Successfully'
                    ]
                ]);
            } else {
                return response()->json([
                    "success" => false,
                    'message' => [
                        'Failed to update employee'
                    ]
                ]);
            }
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $employee = Employee::findOrFail($id);
        $result = $employee->delete();
        if ($result) {
            return response()->json([
                "success" => true,
                'message' => [
                    'Employee Deleted Successfully'
                ]
            ]);
        } else {
            return response()->json([
                "success" => false,
                'message' => [
                    'Failed to delete employee'
                ]
            ]);
        }
    }
}
