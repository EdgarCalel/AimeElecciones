<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DirectivaController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\GradoController;

Route::get('/', function () {
    return view('admin.index');
});

Route::get('admin', [HomeController::class, 'index']);

Route::resource('directiva', 'App\Http\Controllers\DirectivaController');
Route::resource('usuarios', 'App\Http\Controllers\Admin\UserController');
Route::resource('estudiante', 'App\Http\Controllers\EstudianteController');
Route::resource('grado', 'App\Http\Controllers\GradoController');
Route::resource('profesor', 'App\Http\Controllers\ProfesorController');








