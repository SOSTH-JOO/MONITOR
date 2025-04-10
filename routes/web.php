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


Route::get('/parametre-securite', [SecuritySettingsController::class, 'edit'])->name('security.edit');
Route::put('/parametre-securite', [SecuritySettingsController::class, 'update'])->name('security.update');
Route::get('/parametre-securite', [SecuritySettingsController::class, 'reset'])->name('security.reset');


Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/memos', [HomeController::class, 'index'])->name('memos.index');


