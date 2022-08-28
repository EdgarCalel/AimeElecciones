<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\DirectivaController;


Route::get('', [HomeController::class, 'index']);
Route::get('', [DirectivaController::class, 'index'])->name('admin.directiva');

