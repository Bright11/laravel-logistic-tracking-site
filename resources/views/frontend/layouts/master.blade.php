<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- recaptcha --}}
     {{-- {!! htmlScriptTagJsApi() !!} --}}
    @yield('description')
	<meta name="description" content="Maximum Global Security">
<meta name="keywords" content="social security,social security administration,social security office near me,social security office,security cameras,security service,in home security camera,home security,security systems">
    <link rel="icon" type="image/x-icon" href="{{asset('logo/security.ico')}}">
   @yield('title')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @stack('stylesheet')
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,500;0,700;1,400;1,500;1,900&display=swap" rel="stylesheet">
</head>

<body>
@include('frontend.layouts.nav')
@yield('content')
    @include('frontend.layouts.footer')
