<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/post', [PublicController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::post('/addTo-FavCard/{id}', [PublicController::class, 'AddToFavCard'])->name('AddToFavCard');
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');
        Route::resource('/admin/user', UserController::class)->except(['show']);
        Route::resource('/admin/category', CategoryController::class)->except(['show']);
        Route::resource('/admin/post', PostController::class)->except(['show']);
    });
    Route::resource('profile', ProfileController::class)->except('create', 'store', 'show');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
