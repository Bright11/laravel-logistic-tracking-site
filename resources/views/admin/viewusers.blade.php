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
            <table class="table">
  <thead >
    <tr class="tdheader">
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

   @forelse ($users as $u)
 <tr>
      <th scope="row">{{$u->name}}</th>
    <th scope="row">{{$u->email}}</th>
       <td><a class="admindelete" href="">Send to Trash</a></td>
    </tr>
   @empty

   @endforelse

  </tbody>
</table>
        </div>
        {{-- the end --}}
    </div>
@endsection
