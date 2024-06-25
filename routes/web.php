<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/login',[UserController::class, 'login'])->name('login');
Route::get('/reservation',[ReservationController::class, 'reservation'])->name('reservation');
Route::post('/login', [UserController::class, 'processLogin'])->name('processLogin');
Route::post('/register', [UserController::class, 'register'])->name('register');
