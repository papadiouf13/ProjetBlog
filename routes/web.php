<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/article/create',[ArticleController::class, 'index'])->name('index');
    Route::post('/article/create',[ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/list',[ArticleController::class, 'list'])->name('list');
    Route::get('/article/{id}',[ArticleController::class, 'edit'])->name('edit');
    Route::post('/article/modifier',[ArticleController::class, 'modifier'])->name('modifier');
    Route::get('/logout',[DashboardController::class, 'logout'])->name('logout');
});

Route::get('/register', [RegisterController::class, 'form_register'])->name('register');
Route::post('/register', [RegisterController::class, 'form_register_post'])->name('register');

Route::get('/login', [RegisterController::class, 'form_login'])->name('login');
Route::post('/login', [RegisterController::class, 'form_login_post'])->name('login');


Route::get('/api/users', [UserController::class, 'index']);
Route::get('/api/users/{id}', [UserController::class, 'show']);


