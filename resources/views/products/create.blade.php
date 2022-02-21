@extends('template')

@section('content')
    <h1> Create product </h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <br>
        <p>Name: <input type="text" name="name" class="form-text" value=""></p>
        <br>
        <p>Price: $<input type="text" name="price" class="form-text" value=""></p>
        <br>
        <p>Category:
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </p>
        <p>
            <textarea name="description"></textarea>
        </p>

        <p>
            <input type="file" name="photo">
        </p>
        <br>

        <input type="submit" class="btn btn-primary" value="Create">
    </form>
@endsection
