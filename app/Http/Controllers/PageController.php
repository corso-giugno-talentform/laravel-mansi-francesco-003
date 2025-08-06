<?php

namespace App\Http\Controllers;

use App\Models\Book;

class PageController extends Controller
{
    public function homepage()
    {

        $books = Book::latest()->take(3)->get();

        return view('pages.homepage', compact('books'));
    }
}
