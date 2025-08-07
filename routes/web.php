<?php

// use App\Http\Controllers\BookController;
// use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// / => homepage
// libri -> books
Route::get('/', [PageController::class, 'homepage'])->name('pages.homepage');

Route::get('/libri', [BookController::class, 'index'])->name('books.index')->middleware('auth');

Route::get('/libri/crea-libro', [BookController::class, 'create'])->name('books.create')->middleware('auth');
Route::post('/libri/salva-libro', [BookController::class, 'store'])->name('books.store')->middleware('auth');

Route::get('/libri/{book}', [BookController::class, 'show'])->name('books.show');

Route::get('/libri/{book}/modifica', [BookController::class, 'edit'])->name('books.edit');
Route::put('/libri/{book}/aggiorna', [BookController::class, 'update'])->name('books.update');

Route::delete('/libri/{book}/elimina', [BookController::class, 'destroy'])->name('books.destroy');

Route::resource('authors', AuthorController::class);
Route::resource('categories', CategoryController::class);


Route::resource('tags', TagController::class);
