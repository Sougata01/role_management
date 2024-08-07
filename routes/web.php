<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo touppercase('hello');
    return view('welcome');
});

Route::group(['prefix' => 'account'], function(){

    // Guest middleware
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [LoginController::class, 'index'])->name('account.login');
        Route::get('/register', [LoginController::class, 'register'])->name('account.register');
        Route::post('/process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });
    
    // Authenticated middleware
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
        Route::get('/user-list', [UsersController::class, 'userList'])->name('account.userList');
        Route::get('/add-user', [UsersController::class, 'addUser'])->name('account.addUser');
        Route::post('/create-user', [UsersController::class, 'createUser'])->name('account.createUser');
    });
    
});