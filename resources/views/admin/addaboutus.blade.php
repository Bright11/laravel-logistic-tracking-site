@extends('admin.adminlayout.master')

@section('content')
    <div class="admincontainer ">
        {{-- side bar --}}

        @include('admin.adminsidbar')

        {{-- the end --}}
        {{-- main content --}}
        <div class="adminmaincontent">
            @include('admin.adminlayout.admintopnav')
            <form  class="aboutform" action="/insertabout" method="POST" enctype="multipart/form-data">
                @csrf
                <label>About us</label>
                <input type="text" placeholder="Title" name="name"/>
                <textarea id="editors" name="about" cols="10" rows="10"></textarea>
                <input class="submit" type="submit" value="Submit" />
            </form>
        </div>
        {{-- the end --}}

        <script>
            ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
                console.error(error);
            });
        </script>

    </div>
@endsection
