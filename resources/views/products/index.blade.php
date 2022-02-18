@extends('template')

@section('content')
    <a href=" {{ route('categories.create') }}" class="btn btn-info">Create category</a>

    <table class="table">
        <thead>
            <td>Name</td>
            <td>Action</td>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', [$category->id]) }}" class="btn btn-primary">Edit</a>

                    <form action="{{ route('categories.destroy', [$category->id])  }}" method = "POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete" onclick="confirm('Do you want to delete category?')"/>
                    </form>
                    <br>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
