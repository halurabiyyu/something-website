<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class AdminController extends Controller
{
    public function index(){
        $users = new UserController;
        $userCount = $users->count();

        return view('admin.dashboard', ['userCount' => $userCount]);
    }
    
}
