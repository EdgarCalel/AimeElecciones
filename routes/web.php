<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
<<<<<<< HEAD
Route::resource('roles', 'App\Http\Controllers\RolesController');
=======

>>>>>>> 9eb122f9a7794cbc8ac7443c67e3d0cad71aff20
Route::resource('directiva', 'App\Http\Controllers\DirectivaController');
