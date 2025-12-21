<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        // Attempt login
       if (Auth::guard('student')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // If login fails
        return redirect()->back()->with('error', 'Invalid password')->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
