@extends('front.layouts.master')
@section('title', 'Login')
@section('content')
<div class="container" style="margin-top: 150px; margin-bottom: 250px;">
    <div class="row">
        <form action="{{ url('login') }}" method="post" class="col-md-6 offset-md-3 mx-auto">
            @csrf
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
            <button type="submit" class="btn btn-success">Login</button>
        </form>  
    </div>
</div>
@endsection
