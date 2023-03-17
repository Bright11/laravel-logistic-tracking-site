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
                        <th scope="col">Price</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($allcommlete as $p)
                        <tr>
                            <th scope="row">{{ $p->name }}</th>
                            <td colspan="2" class="admintdimg"><img class="adminproimg"
                                    src="{{ Storage::url($p->image) }}" alt=""></td>
                            <td>{{ $p->selling_price }}</td>
                            <td><a class="admindelete" href="editpro/{{ $p->id }}">Edit</a></td>

                            <td><a class="admindelete" href="deletepro/{{ $p->id }}">Send to Trash</a></td>
                        </tr>
                    @empty
                        {{--  --}}
                    @endforelse

                </tbody>
            </table>
        </div>
        {{-- the end --}}
    </div>
@endsection
