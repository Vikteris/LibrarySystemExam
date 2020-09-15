<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    
    public function index()
    {
        return view('authors.index', ['authors' => Author::orderBy('name')->get()]);
    }

   
    public function create()
    {
        return view('authors.create');
    }

    
    public function store(Request $request)
    {
        $author = new Author();

        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
            // galime pažiūrėti, kas bus jei bus neteisingas
            
            'name' => 'required|:authors,name',
            'surname' => 'required',
            ]);
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $author->fill($request->all());
        $author->save();
        return redirect()->route('authors.index');
    }

    
    public function show(Author $author)
    {
        //
    }


    public function edit(Author $author)
    {
        return view('authors.edit', ['author' => $author]);
    }

    
    public function update(Request $request, Author $author)
    {
        $author->fill($request->all());
        $author->save();
        return redirect()->route('authors.index');
    }

    
    public function destroy(Author $author)
    {
        if (count($author->books)){ 
            return back()->withErrors(['error' => ['Negalima ištrinti  autoriaus, jei nėra ištrintos autoriaus knygos!']]);
        }
        $author->delete();
        return redirect()->route('authors.index');
    }
}
