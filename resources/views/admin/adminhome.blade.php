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
						<img src="data:image/png;base64,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" alt="image icon" />
						 
                    </div>
          </div>
           <div class="adminhomeinfo">
                    <h2>Number of Products</h2>
                    <div class="adminfordetails">
                        <h1>{{$procount}}</h1>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHsAAAB7CAMAAABjGQ9NAAAAZlBMVEX///8AAADw8PDt7e3U1NTe3t7Gxsa1tbXz8/Pa2toODg42NjbX19dmZmbCwsL8/PxSUlK8vLwwMDCjo6MrKyuAgIA+Pj5GRkYaGhrMzMx1dXVMTEyHh4cUFBSdnZ2VlZVcXFwkJCT09NRPAAAGbElEQVRogbVbi7KiMAzligiKgAoovuX/f3JlkSRAmzSIZ2ZnduZCj807afE8NbIgDR9lsjtUm7/Nvbi+ykeYBpl+ISWCfRnf/0y4x+U++Bnv4lweN0beDptjuVzMTxxtLzHL2yG+bOcV/+J5dCJucXrOt/ntRUHc4jKP6pc7NXOD1/Jr5u1rEnOD5Lu9L0r70pviEB/jQ8Gw36Lp1PvKtGIVv57heR34vh+9/wXbc3jbmb2+Xk3ddGJa7ZaaRRnsb7Xh+cukre/HC11zXoVBfhqr5qynHvnVMXfxWv8xMoBSyewPN5A4//wsHbrGThVqtgMjS3TOeh6wFwpvS/uvnvQqW/WDv7vSwz51rmZukPcX2U95a5qTeCMXDdXUm3Qic4O+lzqIryfwq/8F9dtbriqxr+jTt6+YG/TygWBwwfdG1kdPg6yrLWq9aQqgSi+4IEP1MyEOG3Ema+7sj1HtCJEsCvPQktGGWJJVrbGdhjNp1/+j5v1wWTl4At25JaFHCl1v4cnDZS2SE51vzKGKxKGHtNqTmu9LrE4e+PDF9HcicTHjLv76OEnsxJIMj0aY86/CQlk4bo2uguSxHijGUr+hSnjz8Z8j4v+4sa2QTx4c/o0ENN7OwtpM/e7EWLck9jZ0TTS0hFshM9WuADZP4psDc0Of+ePytc91Am88mXeJfW57f8ACi0sgvlXeHbjMh2mlJ1rU9pF5OTtI1PzOsY+mGkf34xyV1bXDAlgbkACC0fTFUKcmqhEKZgXULBoVhjwuhbjNPDiDwaQCQTuDoPNi4oPbtt9w2fipI1rDa5yDOg8BGI1jgOlCMLR9NRcWXak5P0NP+VhbBLbPOcjZTGRAzOwAcsGxtTasabgkkht5jGC4MZC0wR8yGBdXPEv2MoHbAsi41QxYOVuPK7i5VA7iO/0XA0xp2LLzZubRckPSqho28NuKo9Zws3uAnaZ0Ub5KYyZtQ7B1D6zTKBzUzdcrin2z4xUIL0cihA3fZczFDQq/E4878GNvhZ2zkwoMbQEmVaEyfph51Nyo4xXOGYRGX8HNCxCyR4hrCsOYeWIqXeiBNi90ngpufiFQcolF2JZ948mfEPWQsxuH1JV4cCLBuphC23+WXrMDVCo7rzP5motGUk8wBKe/oP48VHjd/w4c99LIYAfXv8M+Kq/TY8xxO9eJH7DNTSfpDZRhMRcJtfvmZO5Dre22b7kR64G3Hdx3N6Vn9e3WDgHYNprou/sf+1tpj+wAdggAdVLh6N/joxsGL3Yl4t+Occ030xjB74LEtfnjuZAQSTx3zWOeQ+PfQjh6J3nMNX87+7g0dQdBhygCZr7cws3c2OamAdQtKdZrsfRSb7BvBW+y786T1GtQp97FaXhooaMQR7G0TsXuTD6OkqNbIY7ToT5v5AyFt3wqFJgJCeQzFrCaG/0htfie6ORsIG8BtVfzMwM483U4/riaOTvI55cQUds2yK3/bsGHVocDTJBc64ugcNHDPd7WHSSOlt06BAYslyNfe192dLjHNJy34JzJ6RDS1ohfVb+8K9HA7LnpFMCmcpeDuqzunu5KeCxKXK7C2Bpx8VzLo9bShV6cpzpYi71clg9QMyiSYJ5K7Ee8zzG8AUJQi1LH2SROMPEoQ9r40nxZsUUlkeNtNNIMYGrmBSdlMj6co7pos4hud2LeDeQxdsLlMRz+96Z/DudEa7e6pbQKHvvofgAlxZgxRCxS95uDydm8BD4xsGjc+Lhx91cXXf8dm66pYuHxGkoU3+xlo8zPk1pF3OKQ7PuqJ2Y6mvVimCbnwP5DSNgsEnLjjUTicUlHqtCPKWS55kKsGa+u48A91IZGnxwSN6WUrxigsnhkPamaYwCpQnMvV8y0BFQhrfPMkZNeYph2F9cGGpMsoxXtRGcKrCWd/s6zFszU7xuPcgE3J1fOk7TgZzpreYEvINyBWckrTIZYDbo0utPgcFNTMaRXwan4/w254+XHX4jd6WpsA/dzdlco7t/DbH8eVPLVPoLFnMnkpL3dqzj3FcCe3JgxV5SZdJs6miOtJVOvkKfKo6kR6i+ukEffFW3ffFfzRjBd8InKs4zY6s5pOuy+/46qQaD3t5m+H2sQPcYf69gx53dzDbJ16dalxJflDz7XjJbPq33a0qA6lecffCf5QZA+T5bvQ4+3H34fCvBXYX77fBdbFbukfISrKbT/AOsST1vMJyaCAAAAAElFTkSuQmCC" alt="image icon" />
                    </div>
          </div>
         <div class="adminhomeinfo">
                    <h2>Number of Orders</h2>
                    <div class="adminfordetails">
                        <h1>{{$ordercounts}}</h1>
                  <img src="data:image/png;base64,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" alt="image icon" />
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
