@extends('template')

@section('content')
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
                    <a href="{{ route('categories.update', [$category->id]) }}" class="btn btn-primary">Edit</a>
                    <br>
                    <form action="{{ route('categories.destroy')  }}" method = "PUT">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" value="Delete"/>
                    </form>
                    <br>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
