@extends('frontend.layouts.master')
@section('title')
 <title>Maximum Global Security</title>
@endsection
@section('description')

@endsection
@push('stylesheet')

     <link rel="stylesheet" href="{{asset('css/frontend.css')}}">
     <link rel="stylesheet" href="{{asset('css/nav.css')}}">
       <link rel="stylesheet" href="{{asset('css/divider.css')}}">
  <link rel="stylesheet" href="{{asset('css/product.css')}}">
    <link rel="stylesheet" href="{{asset('css/pageniation.css')}}">
    {{-- <link rel="stylesheet" href="css/pageniation.css"> --}}
@endpush
@section('content')
    <div class="index__content">
        {{-- @include('frontend.slider.topimage') --}}

       @include('frontend.categorydatatop')
       @include('frontend.layouts.saerchform')
        <div class="banna__image"
            style="background-image: url('/image/topbackground.avif')">
			<style>

			</style>
            <div class="banner_content">

                <div class="banner_right">

                    <h2>Reliable Tracking and Transportation Services.</h2>
                    <p> Maximum Security Solutions for Your Successful Business</p>
                </div>
                <div class="banner_left">
                    <h1>Get in touch with us</h1>
                    {{-- <button>Request a call</button> --}}
                    <a href="tel:+3197005034068">+3197005034068</a>
                    {{-- <button>Contact us</button> --}} <a href=" https://wa.me/3197005034068">WhatsApp Message</a>
                </div>
            </div>


        </div>

        <div class="advantage">
            <h1>Our Advantages</h1>
            <div class="advantage_content">
                <div class="advantage_holder">
                    <i class="fa-sharp fa-solid fa-plane"></i>
                    <h1>Fast Delivery</h1>
                    <p>Cooperating with Maximum Global Security, you are guaranteed to have your goods delivered fast</p>
                </div>
                <div class="advantage_holder">
                    <i class="fa-solid fa-phone-volume"></i>
                    <h1>24/7 support</h1>
                    <p>We provide you with 27/7 support, which gives you an opportunity to track your cargo on its way.</p>
                </div>
                <div class="advantage_holder">
                    <i class="fa-sharp fa-solid fa-anchor"></i>
                    <h1>Secured Services</h1>
                    <p>We provide all our clients with professional transportation services on the highest security level.
                    </p>
                </div>
                {{-- <div class="advantage_holder">
                    <i class="fa-solid fa-money-check-dollar"></i>
                    <h1>Affordable Prices</h1>
                    <p>We have the lowest prices on the market and offer affordable solutions tailored to your business.</p>
                </div> --}}

            </div>
            {{-- products --}}



            <div class="products">

                @forelse ($pro as $p)
                    <div class="product_holder">
                        <a href="viewdetails/{{$p->slug}}">
                            <img src="{{ Storage::url($p->image) }}" alt="{{$p->name}}">

                        <div class="product__info">
                            <h1>{{ $p->name }}</h1>
                            {{-- <p> {{ Str::limit($p->description, 30, $end = '...') }}</p> --}}
                            <div class="percentage">
                                <button>{{ $p->discount_price }}%</button>
                            </div>


                            <div class="addtocat">
                                <h2>${{$p->selling_price}}</h2>

                                      <form  action="/addtocartnow/{{$p->id}}" method="post">
                                                @csrf
                                    <button type="submit"><i class="fa-sharp fa-solid fa-cart-shopping"></i></button>
                                </form>

                            </div>

                        </div>
                        </a>
                    </div>
                @empty
                    <h1>No Products for now</h1>
                @endforelse


            </div>
            {{-- the end --}}

            <div class="page">
                {{ $pro->links() }}
            </div>
        </div>

    </div>
@endsection
