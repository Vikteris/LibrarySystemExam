@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime rašytojo informaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('authors.update', $author->id) }}">
                        @csrf @method("PUT")

                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Vardas</label>
                            <input type="text" name="name" class="form-control" value="{{ $author->name }}">
                        </div>
                        @error('surname')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Pavardė</label>
                            <input type="text" name="surname" class="form-control" value="{{ $author->surname }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection