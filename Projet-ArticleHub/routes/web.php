<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'viewHome']);

Route::get('profile',[ProfileController::class, 'showProfileView']);

Route::resource('auth', RegistrationController::class);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('auth.login');

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('logout' , [AuthController::class, 'logout'])->name('logout');