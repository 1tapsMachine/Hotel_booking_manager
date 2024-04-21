<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    public function index(){
        $tasks=Task::latest()->get();
        return view('admin.tasks.index',compact('tasks'));
    }

    public function add()
    {
        $departments = Department::latest()->get();
        return view('admin.tasks.create', compact('departments'));
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'departement' => 'required',
            'content' => 'required',
            'status' => 'required',
            'date' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all()
            ]);
        } else {
            $tasks = new Task();

            $tasks->title = $request->title;
            $tasks->content = $request->content;
            $tasks->dep_id = $request->departement;
            $tasks->date = $request->date;
            $tasks->status = $request->status;
            $result = $tasks->save();
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => ['Task add successfully']
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => ['Task not add successfully']
                ]);
            }
        }
    }

    public function delete(Request $request){
        $result=Task::findOrFail($request->id)->delete();
        if($result){
            return response()->json([
                'success'=>true,
                'message'=>['Task delete Successfully']
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>['Task not delete Successfully']
            ]);
        }
    }

    public function edit($id){
        $task=Task::findOrFail($id);
        $departements = Department::latest()->get();
        return view('admin.tasks.update',compact(['task','departements']));
    }


    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'departements' => 'required',
            'content' => 'required',
            'status' => 'required',
            'date' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all()
            ]);
        } else {
            $tasks = Task::findOrFail($request->id);
            $tasks->title = $request->title;
            $tasks->content = $request->content;
            $tasks->dep_id = $request->departements;
            $tasks->content = $request->content;
            $tasks->date = $request->date;
            $tasks->status = $request->status;
            $result = $tasks->save();
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => ['Task update successfully']
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => ['Task not update successfully']
                ]);
            }
        };
    }
}