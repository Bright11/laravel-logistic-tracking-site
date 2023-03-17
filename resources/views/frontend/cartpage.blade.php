@extends('frontend.layouts.master')

@push('stylesheet')
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/divider.css">
    <link rel="stylesheet" href="css/frontend.css">
@endpush
@section('content')
    <div class="cartpage">
        <div style="margin-top:100px"></div>
        @if ($getcart->count() > 0)
            <p></p>
        @else
            <p class="bg-danger text-white p-1">Your cart is empty</p>
        @endif

        <table class="table cartpagetable">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Update</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($getcart as $cart)
                    <tr>
                        <th scope="row">{{ $cart->Product->name }}</th>
                        <td colspan="2" class="carttdpage">
                            <img src="{{ Storage::url($cart->Product->image) }}" alt="">
                        </td>
                        <td>{{ $cart->Product->selling_price }}</td>
                        <td>{{ $cart->qty }}</td>
                        <td>{{ $cart->total_price }}</td>
                        <td>
                            <div class="plusandminus">
                                <form action="updatecart/{{ $cart->id }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <input type="number" name="qty" value="{{ $cart->qty }}" />
                                    <button>Update</button>
                                </form>
                            </div>
                        </td>
                        <td><a href="removecart/{{ $cart->id }}" class="deletecart">
                                <i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @empty
                @endforelse
                <tr>
                    @if ($getcart->count() > 0)
                        <td colspan="4" class="cartsopping"><a href="/">Continue Shopping</a></td>
                        <td>Total ${{ $total }}</td>
                        <td colspan="4" class="cartsopping"><a href="/checkoutpage">Checkout</a></td>
                    @endif


                </tr>
            </tbody>
        </table>
        <div style="margin-top:100px"></div>
    </div>
@endsection
