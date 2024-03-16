<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate([
            "name" => "required|min:4|max:12",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed|min:8",
        ]);

        User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"]),

        ]);

        return redirect()->route("dashboard")->with("success", "you registered successfully");
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {

        $validated = request()->validate([
            "email" => "required|email| ",
            "password" => "required|min:8",
        ]);

        if (Auth::attempt($validated)) {
            return Redirect::route('dashboard')->with('success', 'logged in successfully!');
        } else {
            return redirect()->route('login')->withErrors(["email" => "no matching user email or password found"]);
        }
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();


        return redirect()->route("dashboard")->with("success", "logged out successfully");
    }
}
