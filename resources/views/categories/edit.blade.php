@extends('template')

@section('content')
    <h1> Edit category </h1>
    <form action="{{ route('categories.update', [$category->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <br>
        <p>Name: <input type="text" name="name" class="form-text" value="{{ $category->name }}"></p>
        <br>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>
@endsection
