@extends('admin.adminlayout.master')

@push('adminjx')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endpush
@section('content')
    <div class="admincontainer ">
        {{-- side bar --}}

            @include('admin.adminsidbar')

        {{-- the end --}}
        {{-- main content --}}
        <div class="adminmaincontent">
              @include('admin.adminlayout.admintopnav')
            <div class="admin_home_holder">
                 <div class="adminhomeinfo">
                    <h2>Number of Users</h2>
                    <div class="adminfordetails">
                        <h1>{{$usercount}}</h1>
                    <img src="icons/trophy.png"/>
                    </div>
          </div>
           <div class="adminhomeinfo">
                    <h2>Number of Products</h2>
                    <div class="adminfordetails">
                        <h1>{{$procount}}</h1>
                    <img src="icons/trophy.png"/>
                    </div>
          </div>
         <div class="adminhomeinfo">
                    <h2>Number of Orders</h2>
                    <div class="adminfordetails">
                        <h1>{{$ordercounts}}</h1>
                    <img src="icons/trophy.png"/>
                    </div>
          </div>

            </div>
            {{-- chat --}}

 <div class="chart">
  <canvas id="myChart"></canvas>
</div>
            {{-- the end --}}
        </div>
        {{-- the end --}}


    </div>
@endsection
