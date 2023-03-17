@extends('frontend.layouts.master')
@push('stylesheet')
<link rel="stylesheet" href="css/frontend.css">
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/divider.css">
@endpush

@section('content')
<div class="track">
   <div>

    <div class="trackbtn">
        <h1>TRACK & TRACE</h1>
       <form action="tracknow" method="GET">
            @csrf
        <input type="text" name="track" class="input" placeholder="Track your order" />
        <input type="submit" class="submit" value="track your order" />
        </form>

    </div>
   </div>

</div>

@endsection
