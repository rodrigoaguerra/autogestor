<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'can:gerenciar usuários')->group(function () {
    Route::resource('users', UserController::class)->names('users');
    Route::resource('roles', RoleController::class)->names('roles');
});

Route::middleware('auth', 'can:gestao de produtos')->group(function () {
    Route::get('/produtos', [ProductController::class, 'index'])->name('products');
});

Route::middleware('auth', 'can:gestao de categorias')->group(function () {
    Route::get('/categorias', [CategoryController::class, 'index'])->name('categories');
});

Route::middleware('auth', 'can:gestao de marcas')->group(function () {
    Route::get('/marcas', [MarkController::class, 'index'])->name('brands');
});

require __DIR__.'/auth.php';
