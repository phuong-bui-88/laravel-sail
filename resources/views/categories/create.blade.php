@extends('template')

@section('content')
    <h1> Create category </h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <br>
        <p>Name: <input name="name" class="form-text" value=""></p>
        <br>
        <input type="submit" class="btn btn-primary" value="Create">
    </form>
@endsection
