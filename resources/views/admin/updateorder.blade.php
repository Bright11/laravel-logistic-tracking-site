@extends('admin.adminlayout.master')

@section('content')
    <div class="admincontainer ">
        {{-- side bar --}}

             @include('admin.adminsidbar')

        {{-- the end --}}
        {{-- main content --}}
        <div class="adminmaincontent">
              @include('admin.adminlayout.admintopnav')
            <form action="/oredrlocation/{{$order->user_id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Oredr Status</label>

                  <input type="text" readonly  value="{{$order->order_status}}" />
                  <label>Current Order Location</label>
                 <input type="text" name="current_state" value="{{$shipping->currnet_state}}" />
                  <input type="text" readonly value="{{$shipping->username}}" placeholder=""/>
                  <label>Order Status</label>
                 <select name="status">
                    <option value="{{$shipping->status}}" selected>{{$shipping->status}}</option>
                    <option value="On the way">On the way</option>
                     <option value="Order delayed">Order delayed</option>
                      <option value="Order Delivered">Order Delivered</option>
                 </select>
                 <textarea rows="10" name="message" cols="50">{{$shipping->message}}</textarea>
                <input class="submit" type="submit" value="Submit" />
            </form>
        </div>
        {{-- the end --}}
    </div>
@endsection
