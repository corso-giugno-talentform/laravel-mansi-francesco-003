<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
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
            'page' => $request->page,
            'image' => $request->file('image')->store('cover', 'public')
        ]);
        // Book::create($data);

        return redirect()->route('books.index')->with('success', 'Elemento inserito!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Book $book, UpdateBookRequest $request)
    {
        $image = $book->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('cover', 'public');
        }
        $book->update([
            'name' => $request->name,
            'year' => $request->year,
            'page' => $request->page,
            'image' => $image
        ]);

        return redirect()->route('books.index')->with('success', 'Elemento modificato!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Elemento cancellato!');
    }
}
