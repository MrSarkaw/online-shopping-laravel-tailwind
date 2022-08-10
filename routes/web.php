<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicController::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function(){
    Route::post('/addto-favcart/{id}/{cart}', [PublicController::class, 'addToFavCart'])->name('addToFavCart');
    Route::middleware(['isAdmin'])->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('admin/user', UserController::class)->except(['show']);
        Route::resource('admin/category', CategoryController::class)->except(['show']);
        Route::resource('admin/post', PostController::class)->except(['show']);
    });

    Route::resource('profile', ProfileController::class)->except(['create', 'show']);
});

Route::get('/post/{id}', [PublicController::class, 'showPost'])->name('showpost');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

