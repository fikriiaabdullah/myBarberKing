<?php

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isBarberman;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\BarbermanController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/login',[UserController::class, 'login'])->name('login');
Route::get('/reservation',[ReservationController::class, 'reservation'])->name('reservation');
Route::post('/reservation/create',[ReservationController::class, 'store'])->name('reservation.store');
Route::post('/login', [UserController::class, 'processLogin'])->name('processLogin');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::middleware(['auth'])->group(function() {
    Route::post('/logout',[UserController::class, 'logout'])->name('logout');
});
Route::middleware([isAdmin::class])->group(function( ){
    Route::get('/dashboard', function () {
        return view('dashboard-admin');
    })->name('dashboard-admin');
    Route::get('users/{id}/', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}/edit', [UserController::class, 'update'])->name('users.update');
    Route::get('/barberman', [BarbermanController::class, 'index'])->name('barberman');
    Route::get('/outlet', [OutletController::class, 'index'])->name('outlet');
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
    Route::get('/layanan/create',[LayananController::class, 'create'])->name('layanan.create');
    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::put('/layanan/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');
    Route::get('/outlet/create',[OutletController::class, 'create'])->name('outlet.create');
    Route::post('/outlet', [OutletController::class, 'store'])->name('outlet.store');
    Route::get('/outlet/{outlet}/edit', [OutletController::class, 'edit'])->name('outlet.edit');
    Route::put('/outlet/{outlet}', [OutletController::class, 'update'])->name('outlet.update');
    Route::delete('/outlet/{outlet}', [OutletController::class, 'destroy'])->name('outlet.destroy');
    Route::get('/barberman/create',[BarbermanController::class, 'create'])->name('barberman.create');
    Route::post('/barberman', [BarbermanController::class, 'store'])->name('barberman.store');
    Route::get('/barberman/{barberman}/edit', [BarbermanController::class, 'edit'])->name('barberman.edit');
    Route::put('/barberman/edit', [BarbermanController::class, 'update'])->name('barberman.update');
    Route::delete('/barberman/{barberman}', [BarbermanController::class, 'destroy'])->name('barberman.destroy');
});
Route::middleware([isBarberman::class])->group(function( ){
Route::get('/dashboard/karyawan', function () {
    return view('dashboard-barberman');
})->name('dashboard-barberman');
Route::get('users/{id}/', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{id}/edit', [UserController::class, 'update'])->name('users.update');
Route::get('/reservation/show',[ReservationController::class, 'show'])->name('reservation.show');
Route::delete('/reservation/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
});




