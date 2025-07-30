<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // $array = [
    //     ['title' => 'Libro 1'],
    //     ['title' => 'Libro 2'],
    //     ['title' => 'Libro 3'],
    //     ['title' => 'Libro 4'],
    // ];

    $array = Book::all();
    //Select * FROM books 
    return view('welcome', ['libri' => $array]);
});
