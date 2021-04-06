@extends('home')

@section('title', 'Login')

@section('content')


    <form method="POST" action="{{ route('users.login') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            @csrf
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" >login</button>

    </form>
@endsection
