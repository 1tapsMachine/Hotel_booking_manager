<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function home()
    {
        $text = 'This is home';
        return view('pages.home',compact('text'));
    }
    function login()
    {
        return view('pages.login');
    }
}
