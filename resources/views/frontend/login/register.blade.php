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
		form{
			margin-top:60px;
		}
		.danger{
		color:red;	
		}
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
    <form action="registeruser" method="POST">
        @csrf
		 @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
						@endif
      @if ($errors->has('email'))
    <span class="danger">{{ $errors->first('email') }}</span>
@endif
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
