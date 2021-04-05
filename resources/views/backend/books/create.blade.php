@extends('home')

@section('title', 'Book')

@section('content')

<div class="container">
    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">name</label>
                    <input type="text" name="name" class="form-control" id="">
                    @if($errors->any())
                        <p style="color: red"> {{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">category</label>
                    <input type="text" name="category" class="form-control" id="">
                    @if($errors->any())
                        <p style="color: red"> {{ $errors->first('category') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">image</label><br>
                    <input type="file" name="image" class="form-control-file" id="">
                    @if($errors->any())
                        <p style="color: red"> {{ $errors->first('image') }}</p>
                    @endif
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">name</label>
                    <select name="status" class="form-control" id="">
                        <option value="sách cũ">Sách cũ</option>
                        <option value="sách mới">Sách mới</option>
                    </select>
                    @if($errors->any())
                        <p style="color: red"> {{ $errors->first('status') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">category</label>
                    <input type="text" name="description" class="form-control" id="">
                    @if($errors->any())
                        <p style="color: red"> {{ $errors->first('description') }}</p>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-outline-primary">Add</button>
    </form>
</div>

@endsection
