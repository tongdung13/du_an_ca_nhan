<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
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
});

Route::middleware('cors')->group(function () {
    Route::prefix('book')->group(function () {
        Route::get('', [BookController::class, 'index'])->name('book.index');
        Route::get('/create', [BookController::class, 'create'])->name('book.create');
        Route::post('/create', [BookController::class, 'store'])->name('book.store');
        Route::get('edit/{id}', [BookController::class, 'edit'])->name('book.edit');
        Route::post('edit/{id}', [BookController::class, 'update'])->name('book.update');
    });
});
