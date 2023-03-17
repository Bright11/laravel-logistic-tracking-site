@extends('admin.adminlayout.master')
@push('adminstylsheet')
<link rel="stylesheet" href="css/bootstrap.css">
@endpush
@section('content')
    <div class="admincontainer ">
        {{-- side bar --}}

             @include('admin.adminsidbar')

        {{-- the end --}}
        {{-- main content --}}
        <div class="adminmaincontent">
              @include('admin.adminlayout.admintopnav')
            <div class="">
                @forelse ($about as $b)
 <div class="allabout">
   <div class="aboutadminh1">
     <h2>{{$b->name}}</h2>
     <a href="deleteabout/{{$b->id}}">Delete</a>
   </div>
    <p>{{$b->about}}</p>
 </div>
                @empty

                @endforelse

            </div>



        </div>
        {{-- the end --}}
    </div>
@endsection
