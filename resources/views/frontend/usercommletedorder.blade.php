@extends('frontend.layouts.master')

@push('stylesheet')
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/divider.css">
    <link rel="stylesheet" href="css/frontend.css">
    <link rel="stylesheet" href="css/userdashboard.css">
@endpush
@section('content')
    <div class="userpage">
        <div style="margin-top:100px"></div>
        {{-- user info --}}
        <div class="user__container">
            <div class="user_dashboard">
               @include('frontend.usersidebar')
            </div>
            {{-- the end --}}
            {{-- user order --}}

            <div class="user_main_content">
               {{-- user top info --}}
          <table class="table cartpagetable">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($commleteorder as $cart)
                    <tr>
                        <th scope="row">{{ $cart->Product->name }}</th>
                        <td colspan="2" class="carttdpage">
                           <img src="{{ Storage::url($cart->Product->image) }}" alt="">
                        </td>
                        <td>{{ $cart->Product->selling_price }}</td>
                        <td>{{$cart->qty}}</td>
                         <td>{{$cart->total_price}}</td>
                         <td><a href="" class="deletecart">
                            <i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @empty
                @endforelse
                  
            </tbody>
        </table>
              </div>
              {{--  --}}
               {{-- th end --}}
            </div>
            {{-- the end --}}
        </div>

        <div style="margin-top:100px"></div>
    </div>
@endsection
