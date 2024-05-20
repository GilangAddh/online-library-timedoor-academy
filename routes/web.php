<?php

use App\Http\Controllers\api\BookController;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [BooksController::class, "welcome"])->name('book-index');

Route::get('/', [BooksController::class, "index"])->name('books-index');
Route::get('/test', [BooksController::class, "test"])->name('books-test');
Route::get('/detail/{id}', [BooksController::class, "detail"])->name('books-detail');
Route::get('/tambah', [BooksController::class, "tambah"])->name('books-tambah')->middleware('auth');
Route::post('/store', [BooksController::class, "store"])->name('books-store')->middleware('auth');;
Route::get('/edit/{id}', [BooksController::class, "edit"])->name('books-edit')->middleware('auth');;
Route::put('/put/{id}', [BooksController::class, "put"])->name('books-put')->middleware('auth');;
Route::delete('/delete/{id}', [BooksController::class, "delete"])->name('books-delete')->middleware('auth');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
