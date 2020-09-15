<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{


    public function index(Request $request)
    {
        if (isset($request->author_id) && $request->author_id !== 0)
            $books = \App\Book::where('author_id', $request->author_id)->orderBy('title')->get();
        else
            $books = \App\Book::orderBy('title')->get();
        $authors = \App\Author::orderBy('name')->get();
        return view('books.index', ['books' => $books, 'authors' => $authors]);
    }

    // ATTENTION :: we need countries to be able to assign them
    public function create()
    {
        $authors = \App\Author::orderBy('name')->get();
        return view('books.create', ['authors' => $authors]);
    }
    public function store(Request $request)
    {
        $book = new Book();

        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
            // galime pažiūrėti, kas bus jei bus neteisingas

            'title' => 'required|:books,title',
            'pages' => 'required',
            'isbn' => 'required',
            'short_description' => 'required',
            'author_id' => 'required',
        ]);

        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $book->fill($request->all());
        $book->save();
        return redirect()->route('books.index');
    }
    public function show(Book $book)
    {
        //
    }
    // ATTENTION :: we need countries to be able to assign them
    public function edit(Book $book)
    {
        $authors = \App\Author::orderBy('name')->get();
        return view('books.edit', ['book' => $book, 'authors' => $authors]);
    }
    public function update(Request $request, Book $book)
    {
        $book->fill($request->all());
        $book->save();
        return redirect()->route('books.index');
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
