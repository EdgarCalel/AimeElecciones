<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DirectivaController;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('admin.index');
});

Route::get('admin', [HomeController::class, 'index']);

Route::resource('directiva', 'App\Http\Controllers\DirectivaController');
Route::resource('usuarios', 'App\Http\Controllers\Admin\UserController');





