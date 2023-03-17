@extends('admin.adminlayout.master')

@section('content')
    <div class="admincontainer ">
        {{-- side bar --}}

            @include('admin.adminsidbar')

        {{-- the end --}}
        {{-- main content --}}
        <div class="adminmaincontent">
              @include('admin.adminlayout.admintopnav')
            <form action="/addpro" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Product Name</label>
                <input type="text" name="name" placeholder="name" />
                <input type="text" name="selling_price" placeholder="Selling Price" />
                <input type="text" name="discount_price" placeholder="Discount Price" />
                <input type="number" name="qty" placeholder="Quantity" />
                <select name="cat_slug">
                        <option selected>Select Category</option>
                        @forelse ($cat as $c)
                        <option value="{{$c->slug}}">{{$c->name}}</option>
                        @empty
                         <option selected>Select Category</option>
                        @endforelse
                </select>
                <textarea rows="8" placeholder="description" cols="50" name="description"></textarea>
                <label>Keywords</label>
                  <textarea rows="8" placeholder="keywords, gun, bullet,etc" cols="50" name="keywords"></textarea>
                <input type="file" name="image" />
                <input class="submit" type="submit" value="Submit" />
            </form>
        </div>
        {{-- the end --}}
    </div>
@endsection
