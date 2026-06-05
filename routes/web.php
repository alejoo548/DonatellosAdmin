<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarouselItemController;
use App\Models\User;
use App\Models\Product;

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
        $usersCount = User::count();
        $productsCount = Product::count();

        $purchasesCount = 0;
        if (Schema::hasTable('cart_items')) {
            try {
                $purchasesCount = DB::table('cart_items')->count();
            } catch (\Throwable $e) {
                $purchasesCount = 0;
            }
        }

        return view('dashboard', [
            'usersCount' => $usersCount,
            'productsCount' => $productsCount,
            'purchasesCount' => $purchasesCount,
        ]);
    })->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('/products', ProductController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/carousel', CarouselItemController::class);
});
