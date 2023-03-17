@extends('frontend.layouts.master')
@section('title')
    <title>Maximum Global Security</title>
@endsection
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/divider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pageniation.css') }}">
    {{-- <link rel="stylesheet" href="css/pageniation.css"> --}}
@endpush
@section('content')
    <input type="hidden" class="s">
    <div class="s"></div>

    <div class="index__content">
        {{-- @include('frontend.slider.topimage') --}}

        {{-- products --}}


        <div class="products">

            @forelse ($getpro as $p)
                <div class="product_holder">
                    <a href="viewdetails/{{ $p->slug }}">
                        <img src="{{ Storage::url($p->image) }}" alt="{{ $p->name }}">

                        <div class="product__info">
                            <h1>{{ $p->name }}</h1>
                            <p> {{ Str::limit($p->description, 30, $end = '...') }}</p>
                            <div class="percentage">
                                <button>{{ $p->discount_price }}%</button>
                            </div>


                            <div class="addtocat">
                                <h2>Price</h2>

                                <form action="/addtocartnow/{{ $p->id }}" method="post">
                                    @csrf
                                    <button type="submit"><i class="fa-sharp fa-solid fa-cart-shopping"></i>Add to
                                        cart</button>
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
            {{-- {{ $getpro->links() }} --}}
        </div>
    </div>



    </div>
@endsection
