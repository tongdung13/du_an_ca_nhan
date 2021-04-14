<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('home');
});
Route::prefix('users')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('users.index');
    Route::post('login', [AuthController::class, 'authenticate'])->name('users.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('users.logout');
});

Route::middleware('cors', 'authUser')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/list', [AuthController::class, 'getAll'])->name('users.list');
        Route::get('/create', [AuthController::class, 'create'])->name('users.create');
        Route::post('/create', [AuthController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [AuthController::class, 'edit'])->name('users.edit');
        Route::post('/edit/{id}', [AuthController::class, 'update'])->name('users.update');
    });
});

Route::middleware('authUser')->group(function () {
    Route::prefix('book')->group(function () {
        Route::get('', [BookController::class, 'index'])->name('book.index');
        Route::get('/create', [BookController::class, 'create'])->name('book.create');
        Route::post('/create', [BookController::class, 'store'])->name('book.store');
        Route::get('edit/{id}', [BookController::class, 'edit'])->name('book.edit');
        Route::post('edit/{id}', [BookController::class, 'update'])->name('book.update');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [App\Http\Controllers\Auth\LoginController::class, 'facebookRedirect'])->name('login.facebook');
Route::get('auth/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'loginWithFacebook']);
