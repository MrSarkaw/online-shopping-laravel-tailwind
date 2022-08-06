<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){

    Route::middleware(['isAdmin'])->group(function(){
        Route::resource('admin/user', UserController::class)->except(['show']);
        Route::resource('admin/category', CategoryController::class)->except(['show']);
    });

});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

