<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthorizationController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);

// Auth Routes
Route::get('/register', [AuthorizationController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthorizationController::class, 'register'])->name('register.post');

Route::get('/login', [AuthorizationController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthorizationController::class, 'login'])->name('login.post');

// Use POST for logout for security reasons
Route::post('/logout', [AuthorizationController::class, 'logout'])->name('logout');

// Protected route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');