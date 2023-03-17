@extends('frontend.layouts.master')
@push('stylesheet')
<link rel="stylesheet" href="css/frontend.css">
<link rel="stylesheet" href="css/nav.css">
 <link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/divider.css">
@endpush

@section('content')
<style>
    .trackorder{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin: 100px 10px;
    }
    .tracknow{
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .tracknow input{
        padding: 10px;
        outline: none;
       width: 40vw;
    }
    .submit{
        background-color: #EA2837;
        color: white;
        font-size: 20px;
        border:none;
        cursor: pointer;
    }
</style>
<div class="trackorder">


        <h1>TRACK & TRACE</h1>
       <form action="tracknow" class="tracknow" method="GET">
            @csrf
        <input type="text" name="track" class="input" placeholder="Track your order" />
        <input type="submit" class="submit" value="track your order" />
        </form>
        <h1>Your Tracking information</h1>

          <iframe width="100%" height="300" src="https://maps.google.com/maps?q={{$track->currnet_state}}&output=embed"></iframe>

          {{-- table order --}}
       <table class="table">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
        <th scope="col">Order Status</th>
         <th scope="col">Current Location</th>
    </tr>
  </thead>
  <tbody>
@forelse ($trackall as $order)
 <tr>

      <td>{{$order->Product->name}}</td>
     <td>{{$order->Product->selling_price}}</td>
       <td>{{$order->qty}}</td>
         <td>{{$order->total_price}}</td>
          <td>{{$track->status}}</td>
          <td>{{$track->currnet_state}}</td>

    </tr>
@empty

@endforelse


  </tbody>
</table>

          {{-- the end --}}

</div>

@endsection
