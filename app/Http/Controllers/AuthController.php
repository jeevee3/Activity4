<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Show registration form
    public function showRegisterForm()
    {
        return view('auth.register');  // use your registration blade file path here
    }

    // Handle user registration
    public function register(Request $request)
    {
        $request->validate([
            'full_name'    => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:20',
            'password'     => 'required|confirmed|min:4|max:8',
        ]);

        try {
            $new_user = User::create([
                'name'         => $request->full_name,
                'email'        => $request->email,
                'phone_number' => $request->phone_number,
                'password'     => Hash::make($request->password),
            ]);

            Auth::login($new_user);

            return redirect('/dashboard')->with('success', 'Registration Successful!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Registration failed. Please try again.');
        }
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle user login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:4|max:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('fail', 'User not found.');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('fail', 'Password is incorrect.');
        }

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Login Successful!');
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login')->with('success', 'Logged Out Successfully.');
    }

    // Dashboard - Only accessible when logged in

public function dashboard()
{
    $user = Auth::user(); // only current user
    return view('auth.dashboard', compact('user'));
}
}