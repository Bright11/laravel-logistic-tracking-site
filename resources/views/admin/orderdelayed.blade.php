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
                        <th scope="col">Quantity</th>
                        <th scope="col">Ownner</th>
                        <th scope="col">Status</th>
                        <th scope="col">Update</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($orderdlayed as $o)
                        <tr>
                            <th scope="row">{{ $o->Product->name }}</th>
                            <td colspan="2" class="admintdimg"><img class="adminproimg"
                                    src="{{ Storage::url($o->Product->image) }}" alt=""></td>
                            <td>{{ $o->Product->selling_price }}</td>
                            <td>{{ $o->qty }}</td>
                            <td>{{ $o->username }}</td>
                            <td>{{ $o->order_status }}</td>
                            <td><a class="admindelete" href="updateorder/{{ $o->user_id }}">Update</a></td>

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
