@extends('template')

@section('content')
    <form action="{{ route('categories.store', [$category->id]) }}" method="POST">
        @csrf
        @method('UPDATE')
        <br>
        Name: <input class="form-text" value="{{ $category->name }}">
        <br>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>
@endsection
