@extends('admin.adminlayout.master')

@section('content')
    <div class="admincontainer ">
        {{-- side bar --}}

            @include('admin.adminsidbar')

        {{-- the end --}}
        {{-- main content --}}
        <div class="adminmaincontent">
              @include('admin.adminlayout.admintopnav')
            <form action="/uodatenow/{{$pro->id}}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <label>Product Name</label>
                <input type="text" name="name" value="{{$pro->name}}" />
                <input type="text" name="selling_price"  value="{{$pro->selling_price}}" />
                <input type="text" name="discount_price" value="{{$pro->discount_price}}" />
                <input type="text" name="qty"value="{{$pro->qty}}" />
                <select name="cat_slug">
                        <option  selected value="{{$pro->cat_slug}}">{{$pro->cat_slug}}</option>
                        @forelse ($cat as $c)
                        <option value="{{$c->slug}}">{{$c->name}}</option>
                        @empty
                         <option>Select Category</option>
                        @endforelse
                </select>
                <textarea rows="8" cols="50" name="description">{{$pro->description}}</textarea>
                <input type="file" name="image" />
                <input class="submit" type="submit" value="Submit" />
            </form>
        </div>
        {{-- the end --}}
    </div>
@endsection
