<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
        //return view('welcome', ['books' => $books]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request)
    {


        // $data = [
        //     'name' => $request->name,
        //     'year' => $request->year,
        //     'page' => $request->page,
        // ];

        Book::create([
            'name' => $request->name,
            'year' => $request->year,
            'page' => $request->page
        ]);
        // Book::create($data);

        return redirect()->route('books.index')->with('success', 'Elemento inserito!');
    }
}
