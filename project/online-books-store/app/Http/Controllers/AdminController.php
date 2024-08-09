<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    public function allUsers()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('profile.users', compact('users'));
    }


    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }


    public function profile(Request $request)
    {

        $admin = Auth::user();

        return view('profile.index', compact('admin'));
    }
    public function edit()
    {

        $admin = Auth::user();

        return view('profile.edit', compact('admin'));
    }


    public function update(Request $request)
    {

        $admin = $request->user();

        $data =  $request->validate([
            'name' => 'required|alpha|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'email'
        ]);

        $admin->update($data);

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    public function edit_password()
    {
        return view('profile.change-password');
    }

    public function update_password(Request $request)
    {
        $admin = $request->user();

        $request->validate([
            'password' => 'required',
            'new-password' => 'required|min:8',
            'verify-password' => 'required|min:8|same:new-password'
        ]);

        if (!Hash::check($request->password, $admin->password)) {
            return back()->withErrors(['password' => 'Current password is incorrect.']);
        }

        $admin->update([
            'password' => Hash::make($request->input('new-password'))
        ]);

        return redirect()->route('dashboard')->with('success', 'Password Changed');
    }
}
