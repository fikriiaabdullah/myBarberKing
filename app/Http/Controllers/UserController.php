<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Login()
    {
        return view('login');
    }
    public function ProcessLogin(Request $request)
    {

    }
    public function register(Request $request)
    {

    }

}