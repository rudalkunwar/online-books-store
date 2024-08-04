<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
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
    public function login(Request $request)
    {
    }
    public function register(Request $request)
    {
        (new RegisteredUserController)->store($request);
    }
}
