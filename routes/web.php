<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas de login
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::delete('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

// Rotas para cadastro
Route::get('/cadastro', [UserController::class, 'create'])->name('signUp');
Route::post('/cadastro', [UserController::class, 'store'])->name('signUp.store');

// Rotas home
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Rota para categoria
Route::post('/register-category', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::post('view-categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/editar-categoria/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/update-conta/{category}', [CategoryController::class, 'update'])->name('category.update');

// Rota transações
Route::get('//home/categorias-transacao', [TransactionController::class, 'index'])->name('transaction.index');

Route::post('/home/registrar-transacao', [TransactionController::class, 'store'])->name('transaction.store');