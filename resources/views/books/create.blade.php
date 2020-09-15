@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Pridėkime knygą:</div>
               <div class="card-body">
                   <form action="{{ route('books.store') }}" method="POST">
                       @csrf

                       @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       <div class="form-group">
                            <label for="">Pavadinimas: </label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        @error('pages')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Lapų sk.: </label>
                            <input type="number" name="pages" class="form-control">
                        </div>
                        
                        @error('isbn')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Isbn: </label>
                            <input type="text" name="isbn" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Rašytojas: </label>
                            <select name="author_id" id="" class="form-control">
                                <option value="" selected disabled>Pasirikinite autorių:</option>
                                @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name . " " }}{{ $author->surname }}</option>
                                @endforeach
                            </select>
                       </div>
                       @error('short_description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       <div class="form-group">
                        <label for="">Trumpas aprašymas: </label>
                        <input id="mce" type="text" name="short_description" class="form-control">
                    </div>
                        
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection