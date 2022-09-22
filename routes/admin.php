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
Route::resource('usuarios', UserController::class)->middleware('can:usuarios.index')->only(['index','edit','update'])->names('usuarios');
Route::resource('estudiante', EstudianteController::class)->middleware('can:estudiante.index')->names('estudiante');
Route::resource('grado', GradoController::class)->middleware('can:grado.index')->names('grado');
Route::resource('profesor', ProfesorController::class)->middleware('can:profesor.index')->names('profesor');











