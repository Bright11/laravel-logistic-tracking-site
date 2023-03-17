@extends('frontend.layouts.master')

@push('stylesheet')
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/divider.css">
    <link rel="stylesheet" href="css/frontend.css">
    <link rel="stylesheet" href="css/checkoutpage.css">
@endpush
@section('content')
    <div class="checkoutpage">
        <div style="margin-top:100px"></div>


        <table class="table cartpagetable">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($getcart as $cart)
                    <tr>
                        <th scope="row">{{ $cart->Product->name }}</th>

                        <td>{{ $cart->Product->selling_price }}</td>
                        <td>{{ $cart->qty }}</td>
                        <td>{{ $cart->total_price }}</td>
                        <td><a href="removecart/{{$cart->id}}" class="deletecart">
                                <i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @empty
                @endforelse

            </tbody>
  </table>
        {{-- the end --}}


  <div class="userinfo">
            <h1>Shipping Information</h1>
            <form action="placorder" method="POST">
                @csrf
                <input type="text" name="email" readonly value="{{Auth::user()->email}}"/>
                <input type="text" name="number" placeholder="Number"/>
                <input type="text" name="country" placeholder="Country"/>
                 <input type="text" name="state" placeholder="City or State"/>
                <input type="text" value="Total ${{$total}}" readonly/>
                <input type="text" name="nearest_city" placeholder="Nearest Location"/>
                <textarea cols="" rows="" name="address" placeholder="More information" ></textarea>
                <button type="submit" class="ordersubmit">Order NOW</button>
            </form>
        </div>
        <div style="margin-top:100px"></div>
    </div>
@endsection
