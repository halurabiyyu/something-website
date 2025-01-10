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

        $breadcrumb = (object)[
            'title' => 'Dashboard',
            'list' => ['Home', 'Dashboard']
        ];

        $page = (object)[
            'title' => 'Dashboad Admin'
        ];

        $activeMenu = 'dashboard';

        return view('admin.dashboard', ['userCount' => $userCount, 'breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    
}
