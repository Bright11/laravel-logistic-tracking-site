@extends('frontend.layouts.master')

@push('stylesheet')
    <link rel="stylesheet" href="css/frontend.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="css/divider.css">
@endpush
@section('content')
<div class="loginpage">
    <form action="registeruser" method="POST">
        @csrf
        <h3>Register</h3>
        <input type="text" placeholder="Name" name="name"/>
        <input type="email" placeholder="Email@Example.com" name="email"/>
        <input type="password" placeholder="Password*****" name="password"/>
        <input type="password" placeholder="Confirm Password" name="cpassword"/>
        <input type="checkbox"/>
        <button class="loginbtn" type="submit">Register</button>
        <p> have an account?</p>
        <a href="/login" class="donhaveaccount">Login</a>

    </form>
</div>
@endsection
