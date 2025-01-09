<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/proses_login', [LoginController::class, 'proses_login'])->name('proses_login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

// Route::resource('user', UserController::class);
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::group(['middleware' => ['is_admin']], function () {
    // Route for role admin user
    Route::group(['middleware' => ['is_admin'], 'prefix' => 'admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        
        // Route Users 
        Route::resource('users', UserController::class);
        Route::post('/users/list', [UserController::class, 'list'])->name('users.list');
        
        // Route Roles 
        Route::resource('roles', RolesController::class);
        Route::post('/roles/list', [RolesController::class, 'list'])->name('roles.list');
        
        // Route Logout
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
})->middleware('is_admin');
