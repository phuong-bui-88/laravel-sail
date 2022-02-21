@extends('template')

@section('content')
    <a href=" {{ route('products.create') }}" class="btn btn-info">Create product</a>

    <table class="table">
        <thead>
            <td>Name</td>
            <td>Category</td>
            <td>Price</td>
            <td>Action</td>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-primary">Edit</a>

                    <form action="{{ route('products.destroy', [$product->id])  }}" method = "POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete" onclick="confirm('Do you want to delete product?')"/>
                    </form>
                    <br>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
