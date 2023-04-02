@extends('admin.adminlayout.master')

@section('content')
    <div class="admincontainer ">
        {{-- side bar --}}

        @include('admin.adminsidbar')

        {{-- the end --}}
        {{-- main content --}}
        <div class="adminmaincontent">
            @include('admin.adminlayout.admintopnav')
            <form action="/editcartedb/{{$getcate->id}}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <label>Category Name</label>
                <input type="text" name="name" value="{{$getcate->name}}" />
                <input type="file" name="image" />
                <input class="submit" type="submit" value="Submit" />
            </form>
        </div>
        {{-- the end --}}
    </div>
@endsection
