@extends('layouts.foodApp')

@section('title')
Foodapp's | Login
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('src/css/auth.css') }}">
@endsection

@section ('content')
<div class="m-0 row h-100">
    <div class="p-0 text-center col d-flex justify-content-center align-items-center display-none">
        <img src="{{ asset('src/img/auth.jpg') }}" class="w-100 h-100">
    </div>
    <div class="p-0 col bg-custom d-flex justify-content-center align-items-center flex-column w-100">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
        <form method="POST" class="w-75" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email">
                    Email
                </label>
                <input type="email" id="email" name="email" class="form-control" placeholder="example@email.com">
            </div>
            <div class="mb-3">
                <label for="password">
                    Password
                </label>
                <input type="password" id="password" name="password" class="form-control" placeholder="********">
            </div>
            <div class="block clearfix mt-4 form-group">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label><br>
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900 pull-right" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Login Now</button>
        </form>
    </div>
</div>
@endsection
