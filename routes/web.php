<?php

use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SecuritySettingsController;
use App\Http\Controllers\ProfileController;


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'showLogin'])->name('showLogin');

Route::get('/new_password/{slug}', [AuthController::class, 'new_password'])->name('new.password');
Route::post('/new_password/{slug}', [AuthController::class, 'updatePassword'])->name('update.password');

Route::get('/404', [HomeController::class, 'Error404'])->name('404');


    Route::get('/security/settings', [SecuritySettingsController::class, 'edit'])->name('security.settings.edit');
    Route::put('/security/settings', [SecuritySettingsController::class, 'update'])->name('security.settings.update');


Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
