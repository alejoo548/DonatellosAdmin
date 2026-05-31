<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('/products', ProductController::class);
    Route::resource('/categories', CategoryController::class);
});
Route::get('/calculadora', [App\Http\Controllers\CalculadoraController::class, 'index'])->name('calculadora');
Route::post('/calculadora', [App\Http\Controllers\CalculadoraController::class, 'calculate'])->name('calculadora.calculate');

Route::get('/promedios', [App\Http\Controllers\PromediosController::class, 'index'])
        ->name('promedios');

Route::post('/promedios', [App\Http\Controllers\PromediosController::class, 'calcular']);
