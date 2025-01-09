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
                if ($user) {
                    return redirect()->intended('admin/dashboard');
                }
                // Redirect based on user role
                return redirect('/login')->with('error', 'Access denied!');
            }
        } catch (\Exception $e) {
            return redirect('/login')->with('error', $e->getMessage());
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
