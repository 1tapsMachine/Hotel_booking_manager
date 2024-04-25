<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View
    {
        return view("login");
    }


    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $admin = Auth::guard('admin')->attempt(['email' => $email, 'password' => $password]);
        $employee = Auth::guard('user')->attempt(['email' => $email, 'password' => $password]);
        if ($admin)
        {    
            return redirect()->route('admin.dashboard');
        }
        elseif ($employee)
        {
            echo 2;
        } 
        else {
            echo 0;
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('user')->logout();
        return view("welcome");
    }
}
