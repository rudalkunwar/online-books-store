<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//for books 
Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::get('/book/{id}/update', [BookController::class, 'update'])->name('book.update');
Route::get('/book/{id}/delete', [BookController::class, 'destroy'])->name('book.delete');


//for books 
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');

//for books 
Route::get('/authors', [AuthorController::class, 'index'])->name('author.index');
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::get('/author/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit');
Route::get('/author/{id}/update', [AuthorController::class, 'update'])->name('author.update');
Route::get('/author/{id}/delete', [AuthorController::class, 'destroy'])->name('author.delete');

//for books 
Route::get('/publications', [PublicationController::class, 'index'])->name('publication.index');
Route::get('/publication/create', [PublicationController::class, 'create'])->name('publication.create');
Route::get('/publication/{id}/edit', [PublicationController::class, 'edit'])->name('publication.edit');
Route::get('/publication/{id}/update', [PublicationController::class, 'update'])->name('publication.update');
Route::get('/publication/{id}/delete', [PublicationController::class, 'destroy'])->name('publication.delete');












Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
