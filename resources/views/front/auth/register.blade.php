@extends('front.layouts.master')
@section('title', 'Register')
@section('content')
<div class="container" style="margin-top: 150px; margin-bottom: 150px;">
    <div class="row">
        <form action="{{ route('register') }}" method="POST" class="col-md-6 offset-md-3 mx-auto">
            @csrf
            <div class="form-group">
                <label for="name">
                    Name
                </label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">
                    E-mail
                </label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="">
                    Password
                </label>
                    <input class="form-control" name="password" type="password" required>
            </div>
            <div class="form-group">
                <label for="phone">
                    Phone
                </label>
                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" required>
            </div>
            <button type="submit" class="btn btn-success">Register</button>
        </form>  
    </div>
</div>
@endsection
