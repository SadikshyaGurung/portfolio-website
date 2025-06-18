<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioUpdateRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerview()
    {
        return view("register");
    }

    public function register(PortfolioUpdateRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect("/login");

    }
    public function loginView()
    {
        return view("login");
    }
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect("/admin");
        }
        return back()->withErrors([
            "email" => "Invalid credentials"
        ]);
    }
    public function logout()
    {
        Auth::logout();
        // request()->session()->flush();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect("/home");
    }
}
