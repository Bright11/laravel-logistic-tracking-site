@extends('frontend.layouts.master')

@push('stylesheet')
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/divider.css">
    <link rel="stylesheet" href="css/frontend.css">
@endpush
@section('title')
    <title>Maximum Global Security</title>
@endsection
@section('content')
    <div class="about">

        @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div style="margin-top:100px"></div>
        <div class="contact">
            <h3>We love to hear from you</h3>
            <form action="sendmessage" method="POST">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @csrf
                <input name="name" placeholder="Your name" />
                <input name="email" placeholder="Email" />
                <textarea rows="4" name="message" cols="50"></textarea>
                <button>Send</button>
            </form>
        </div>

    </div>
@endsection
