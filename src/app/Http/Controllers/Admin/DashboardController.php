<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Adminindex() : View
    {
        $tasks = Task::orderBy("created_at","asc")->get();
        $departements = Department::all();
        return view('admin.dashboard')->with('tasks',$tasks)->with('departements',$departements);
    }
    public function Userindex() : View
    {
        return view('user.dashboard');
    }
}
