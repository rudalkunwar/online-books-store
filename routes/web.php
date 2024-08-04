<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');

Route::get('/user/register', [UserController::class, 'showReister'])->name('showRegister');
Route::get('/user/login', [UserController::class, 'showLogin'])->name('showLogin');
Route::post('/user/register', [UserController::class, 'register'])->name('user.register');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');

//for admins 
Route::middleware(['admin', 'auth'])->group(function () {
    //for books 
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::get('/books/{id}/show', [BookController::class, 'show'])->name('books.show');
    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}/update', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{id}/delete', [BookController::class, 'destroy'])->name('books.destroy');


    //for categories 
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //for genres 
    Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
    Route::post('/genres/store', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/genres/{id}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('/genres/{id}/update', [GenreController::class, 'update'])->name('genres.update');
    Route::delete('/genres/{id}/delete', [GenreController::class, 'destroy'])->name('genres.destroy');

    //for authors 
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors/store', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/authors/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::put('/authors/{id}/update', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/authors/{id}/delete', [AuthorController::class, 'destroy'])->name('authors.destroy');

    //for Publication
    Route::get('/publications', [PublicationController::class, 'index'])->name('publications.index');
    Route::get('/publications/create', [PublicationController::class, 'create'])->name('publications.create');
    Route::post('/publications/store', [PublicationController::class, 'store'])->name('publications.store');
    Route::get('/publications/{id}/edit', [PublicationController::class, 'edit'])->name('publications.edit');
    Route::put('/publications/{id}/update', [PublicationController::class, 'update'])->name('publications.update');
    Route::delete('/publications/{id}/delete', [PublicationController::class, 'destroy'])->name('publications.destroy');


    Route::get('/profile', [AdminController::class, 'profile'])->name('profile.index');
    Route::get('/proflie/edit', [AdminController::class, 'edit'])->name('profile.edit');
    Route::put('/proflie/update', [AdminController::class, 'update'])->name('profile.update');
    Route::get('/proflie/settings', [AdminController::class, 'edit_password'])->name('profile.edit_password');
    Route::put('/password/update', [AdminController::class, 'update_password'])->name('profile.update_password');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__ . '/auth.php';
