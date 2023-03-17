<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Maximum Global Security</title>
     <link rel="stylesheet" href="{{asset('css/admin.css')}}">
        @stack('adminstylsheet')
         <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<link rel="icon" type="image/x-icon" href="{{asset('logo/security.ico')}}">
</head>
<body>
@yield('content')

@stack('adminjx')

<script src="js/adminchat.js"></script>
</body>
</html>
