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
        <div style="margin-top:100px"></div>
       @forelse ($about as $ab)
<h3>{{$ab->name}}</h3>
<p>{{$ab->about}}</p>
       @empty

       @endforelse

    </div>
@endsection
