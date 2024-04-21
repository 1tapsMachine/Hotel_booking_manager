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
        return view("admin.auth.login");
    }


    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $admin = Auth::guard('admin')->attempt(['email' => $email, 'password' => $password]);
        if ($admin)
        {
            return redirect()->route('admin.dashboard');
        } else {
            echo 0;
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return view("welcome");
    }
}
