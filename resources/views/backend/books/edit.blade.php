@extends('home')

@section('title', 'Book')

@section('content')

<div class="container">
    <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">name</label>
                    <input type="text" name="name" class="form-control" value="{{ $book->name }}">
                    @if($errors->any())
                        <p style="color: red"> {{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">category</label>
                    <input type="text" name="category" class="form-control" value="{{ $book->category }}">
                    @if($errors->any())
                        <p style="color: red"> {{ $errors->first('category') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">image</label><br>
                    <input type="file" name="image" class="form-control-file" value="{{ $book->image }}">
                    <img src="{{ url('storage/' . $book->image) }}" height="100px" width="100px">
                    @if($errors->any())
                        <p style="color: red"> {{ $errors->first('image') }}</p>
                    @endif
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">status</label>
                    <select name="status" class="form-control" value="{{ $book->status }}">
                        <option value="sách cũ">Sách cũ</option>
                        <option value="sách mới">Sách mới</option>
                    </select>
                    @if($errors->any())
                        <p style="color: red"> {{ $errors->first('status') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">description</label>
                    <input type="text" name="description" class="form-control" value="{{ $book->description }}">
                    @if($errors->any())
                        <p style="color: red"> {{ $errors->first('description') }}</p>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
    </form>
</div>

@endsection
