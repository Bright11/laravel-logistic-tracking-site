@extends('frontend.layouts.master')

@push('stylesheet')
    <link rel="stylesheet" href="css/frontend.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="css/divider.css">
@endpush
@section('content')
<div class="loginpage">
    <form action="/loginuser" method="POST">
        @csrf
        <h3>Login</h3>
        <input type="email" placeholder="Email@Example.com" name="email"/>
        <input type="password" placeholder="Password*****" name="password"/>
        <button class="loginbtn" type="submit">Login</button>
        <p>Don't have an account?</p>
        <a href="/register" class="donhaveaccount">Register</a>

    </form>
</div>
@endsection
