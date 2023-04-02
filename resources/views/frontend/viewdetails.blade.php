@extends('frontend.layouts.master')

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/divider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endpush
@section('title')
    <title>{{ $prodetals->name }}</title>
@endsection
@section('content')
<div class="detailsdivid" style="margin-top:100px"></div>
    <div class="index__content ">
 @include('frontend.categorydatatop')
    @include('frontend.layouts.saerchform')

        <style>

        </style>

      <div class="detailspage">
          <div class="detailsimg">
            <img src="{{ Storage::url($prodetals->image) }}" alt="{{ $prodetals->name }}">
        </div>
        <div class="detailsright">
             <h1>{{ $prodetals->name }}</h1>
               <button>{{ $prodetals->discount_price }}%</button>
               <form action="/addtocartnow/{{ $prodetals->id }}" method="post">
                    @csrf
                    <button type="submit"><i class="fa-sharp fa-solid fa-cart-shopping"></i>Add to
                        cart</button>
                </form>
        </div>

      </div>



<div class="description">
     <p> {{ $prodetals->description }}</p>
</div>
        {{-- <p> {{ $prodetals->description }}</p> --}}

    {{-- the end --}}




    </div>
@endsection
