@extends('template')

@section('content')
    <h1> Edit product </h1>
    <form action="{{ route('products.update', [$product->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <br>
        <p>Name: <input type="text" name="name" class="form-text" value="{{ $product->name }}"></p>
        <br>
        <p>Price: $<input type="text" name="price" class="form-text" value="{{ $product->price }}"></p>
        <br>
        <p>Category:
            <label>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </label>
        </p>
        <label>
            <textarea name="description">{{ $product->description }}</textarea>
        </label>

        <p>
            <input type="file" name="photo">
        </p>
        <br>

        <input type="submit" class="btn btn-primary" value="Update">
    </form>
@endsection
