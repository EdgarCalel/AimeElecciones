<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DirectivaController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;

Route::resource('loginEstudiante', 'App\Http\Controllers\loginEstudianteController');


Route::resource('/', HomeController::class);
Route::resource('/auth', HomeController::class);
Route::resource('directiva', DirectivaController::class)->names('directiva');
Route::resource('usuarios', UserController::class)->only(['index','edit','update'])->names('usuarios');
Route::resource('estudiante', EstudianteController::class)->names('estudiante');
Route::resource('grado', GradoController::class)->names('grado');
Route::resource('profesor', ProfesorController::class)->names('profesor');











