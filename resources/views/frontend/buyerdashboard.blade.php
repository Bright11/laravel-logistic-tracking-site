@extends('frontend.layouts.master')

@push('stylesheet')
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/divider.css">
    <link rel="stylesheet" href="css/frontend.css">
    <link rel="stylesheet" href="css/userdashboard.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@endpush
@section('title')
 <title>Maximum Global Security</title>
@endsection
@section('content')
    <div class="userpage">
        <div style="margin-top:100px"></div>
        {{-- user info --}}
        <div class="user__container">
            <div class="user_dashboard">
               @include('frontend.usersidebar')
            </div>
            {{-- the end --}}
            {{-- user order --}}

            <div class="user_main_content">
               {{-- user top info --}}
              <div class="myinfo__holder">
                  <div class="myinfo">
                   <h2> Ordered Items</h2>
                   <h4>{{$oderusernumber}}</h4>
                </div>
                 <div class="myinfo">
                     <h2> Ordered Delayed</h2>
                   <h4>{{$delayesuser}}</h4>
                </div>
                <div class="myinfo">
                     <h2> Ordered On the way</h2>
                   <h4>{{$orderonthewaysuser}}</h4>
                </div>
                <div class="myinfo">
                     <h2> Ordered Commpleted</h2>
                   <h4>{{$commpletedsuser}}</h4>
                </div>
              </div>
              {{--  --}}
               {{-- th end --}}
              {{-- chart --}}
             <div class="userchartfrontend">
                 <canvas id="myChartright"></canvas>
                 <canvas id="myChartleft"></canvas>
             </div>

              {{-- the end --}}
            </div>
            {{-- the end --}}
        </div>

        <div style="margin-top:100px"></div>
    </div>
@endsection
