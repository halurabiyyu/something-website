<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        try {
            $request->validate([
                'email' => 'required|string',
                'username' => 'required|string|max:100',
                'name' => 'required|string|max:100',
                'password' => 'required|string',
            ]);
    
            UserModel::create([
                'level_id' => 1,
                'email' => $request->email,
                'username' => $request->username,
                'name' => $request->name,
                'password' => Hash::make($request->password),
            ]);
            return redirect('/login')->with('success', 'register successful, please login');
        } catch (\Exception $e) {
            return redirect('/register')->with('error', $e->getMessage());
            //throw $th;
        }
    }
}
