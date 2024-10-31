<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
        // Show the registration form
        public function showRegisterForm()
        {
            return view('auth.register');
        }
    
        // Handle user registration
        public function register(Request $request)
        {
            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
            
            // Create a new user and hash the password
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        
    
            // Log the user in
            Auth::login($user);
    
            // Redirect to the desired location (e.g., dashboard or home)
            return redirect()->route('home');
        }
    
        // Show the login form
        public function showLoginForm()
        {
            return view('auth.login');
        }
    
        // Handle user login
        public function login(Request $request)
        {
            // Validate the request data
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            // Attempt to authenticate the user
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Authentication passed, redirect to the desired location
                return redirect()->route('home');
            }
    
            // Authentication failed, redirect back with an error message
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    
        // Handle user logout
        public function logout(Request $request)
        {
            Auth::logout();
            return redirect()->route('login.form');
        }
}
