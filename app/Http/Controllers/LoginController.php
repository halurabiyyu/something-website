<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        // Validate input fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Retrieve credentials
        $credentials = $request->only('email', 'password');
        
        try {
            if (Auth::attempt($credentials)) {
                $user = Auth::user(); // Get the authenticated user
    
                // Redirect based on user role
                switch ($user->level_id) {
                    case 1: // Admin
                        return redirect()->intended('admin/dashboard');
                    case 2: // Cashier
                        return redirect()->intended('cashier/dashboard');
                    case 3: // Regular User
                        return redirect()->intended('user/dashboard'); // Change this as per your needs
                    default:
                        // Redirect if role doesn't match any predefined case
                        Auth::logout(); // Log out the user for invalid roles
                        return redirect('/login')->with('error', 'Access denied!');
                }
            }
        } catch (\Exception $e) {
            return redirect('/register')->with('error', $e->getMessage());
        }
        // Attempt to authenticate the user
        

        // Failed login attempt
        return back()
            ->withInput($request->except('password')) // Retain input except password
            ->withErrors(['email' => 'Invalid credentials. Please try again.']);
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
