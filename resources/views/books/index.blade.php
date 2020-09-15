@extends('layouts.app')
@section('content')

<label>Filtravimas:</label>
<form class="form-inline" action="{{ route('books.index') }}" method="GET">
<select name="author_id" id="" class="form-control">
    <option value="" selected>Visi</option>
    @foreach ($authors as $author)
    <option value="{{ $author->id }}" 
        @if($author->id == app('request')->input('author_id')) 
            {{-- selected="selected" reiškia kad altiksu filtravimą, ta pasirnkite inpute palieka rodoma --}}
        selected="selected"  
        @endif>{{ $author->name }}</option>
    @endforeach
</select>
<button type="submit" class="btn btn-primary">Filtruoti</button>
</form>

<div class="card-body">
    <table class="table">
        <tr>
            <th>Pavadinimas</th>
            <th>Lapų sk.</th>
            <th>Isbn</th>
            <th>Trumpas aprašymas</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->pages }}</td>
            <td>{{ $book->isbn }}</td>

            <td>{!! $book->short_description !!}</td>
            <td>
                <form action={{ route('books.destroy', $book->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('books.edit', $book->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('books.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection