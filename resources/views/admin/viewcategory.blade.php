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
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

   @forelse ($cat as $c)
 <tr>
      <th scope="row">{{$c->name}}</th>
      <td colspan="2" class="admintdimg"><img class="adminproimg" src="{{ Storage::url($c->image) }}" alt=""></td>

       <td><a class="admindelete" href="editcat/{{$c->id}}">Edite</a></td>
    </tr>
   @empty

   @endforelse

  </tbody>
</table>
        </div>
        {{-- the end --}}
    </div>
@endsection
