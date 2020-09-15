@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime miesto informaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('books.update', $book->id) }}">
                        @csrf @method("PUT")

                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Pavadinimas: </label>
                            <input type="text" name="title" class="form-control" value="{{ $book->title }}">
                        </div>

                        @error('pages')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Lapų sk.: </label>
                            <input type="number" name="pages" class="form-control" value="{{ $book->pages }}">
                        </div>

                        @error('isbn')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Isbn: </label>
                            <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}">
                        </div>
                        <div class="form-group">
                            <label>Rašytojas: </label>
                            <select name="author_id" id="" class="form-control">
                                @foreach ($authors as $author)
                                <option value="{{ $author->id }}" @if($author->id == $book->author_id) selected="selected" @endif>{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        @error('short_description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Trumpas aprašymas</label>
                            <textarea id="mce" type="text" name="short_description" rows=10 cols=100 class="form-control">{{ $book->short_description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection