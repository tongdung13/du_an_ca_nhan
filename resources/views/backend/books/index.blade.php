@extends('home')

@section('title', 'Book')

@section('content')

<div class="container">
    <a href="{{ route('book.create') }}">Add</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>category</th>
                <th>image</th>
                <th>status</th>
                <th>description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $key => $value)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->category }}</td>
                    <td>
                        <img src="{{ url('storage/' . $value->image) }}" style="width: 100px; height: 100px">
                    </td>
                    <td>{{ $value->status }}</td>
                    <td>{{ $value->description }}</td>
                    <td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
