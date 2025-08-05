<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BookController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            // new Middleware('auth', only: ['destroy', 'update']), //Esempio middleware dentro controller
        ];
    }
    public function index()
    {
        $books = Book::simplePaginate(4);

        return view('books.index', compact('books'));
        //return view('welcome', ['books' => $books]);
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();

        return view('books.create', compact('authors', 'categories'));
    }

    public function store(StoreBookRequest $request)
    {


        // $data = [
        //     'name' => $request->name,
        //     'year' => $request->year,
        //     'page' => $request->page,
        // ];

        $book = Book::create([
            'name' => $request->name,
            'year' => $request->year,
            'page' => $request->page,
            'author_id' => $request->author_id,
            'image' => $request->file('image')->store('cover', 'public')
        ]);
        // Book::create($data);
        $book->categories()->attach($request->categories);
        return redirect()->route('books.index')->with('success', 'Elemento inserito!');
    }

    public function show(Book $book)
    {

        // $author = Author::find($book->author_id);
        // dd($author->firstname);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
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
            'author_id' => $request->author_id,
            'image' => $image
        ]);
        $book->categories()->detach();
        $book->categories()->attach($request->categories);

        return redirect()->route('books.index')->with('success', 'Elemento modificato!');
    }

    public function destroy(Book $book)
    {
        $book->categories()->detach();
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Elemento cancellato!');
    }
}
