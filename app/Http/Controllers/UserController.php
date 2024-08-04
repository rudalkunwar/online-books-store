<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showReister()
    {
        return view('user.auth.register');
    }
    public function showLogin()
    {
        return view('user.auth.login');
    }
    public function login()
    {
    }
    public function register()
    {
    }
}
