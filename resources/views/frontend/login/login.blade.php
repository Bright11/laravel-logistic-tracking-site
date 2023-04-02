@extends('frontend.layouts.master')

@push('stylesheet')
    <link rel="stylesheet" href="css/frontend.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="css/divider.css">
@endpush
@section('content')
<div class="loginpage">
	<style>
	@media screen and (max-width:768px){

.loginpage form{
    padding: 20px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    display: flex;
        flex-direction: column;
        align-items: center;
        width: 80vw;
}
}
	</style>
    <form action="/loginuser" method="POST">
       @csrf
		 @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
        <h3>Login</h3>
        <input type="email" placeholder="Email@Example.com" name="email"/>
        <input type="password" placeholder="Password*****" name="password"/>
        <button class="loginbtn" type="submit">Login</button>
        <p>Don't have an account?</p>
        <a href="/register" class="donhaveaccount">Register</a>

    </form>
</div>
@endsection
