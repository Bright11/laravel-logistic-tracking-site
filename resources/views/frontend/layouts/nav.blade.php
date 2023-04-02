<nav class="mynav" id="mynav">
    <div class="logo">
        <a href="/">
            <img src="/logo/security.png" alt="logo" />
        </a>
        {{-- security.png --}}
    </div>
    <ul id="navul" class="hidmobil">
        <li>
            <a href="/">Home</a>
        </li>
        <li><a onclick="category()" href="#">Categories</a></li>
        <li>
            <a href="/about">About Us</a>
        </li>
        <li>
            <a href="/contact">Contact us</a>
        </li>
        @if (Auth::user())
            <li><a href="/buyerdashboard">
                    My Profile
                </a></li>
            <li>
                <a href="/logout">Logout</a>
            </li>
        @else
            <li>
                <a href="/login">Login</a>
            </li>
        @endif


        <li><a class="countnav" href="/cartpage">

                <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                <span class="navcat" id="navcat">
                    {{ $countcart }}
                </span>
            </a></li>
        {{-- <form class="seacherform" action="searchdata" method="GET">
            @csrf
             <input type="text" name="name" class="searchinput" >
             <button type="submit" class="searchbtn">Search</button>
           </form> --}}
        <button onclick="search()" class="searchbtn">Search</button>
    </ul>

    <button class="nobilebtn" onclick="mobilnav()"><i class="fa-solid fa-bars"></i></button>
</nav>
{{-- <div></div>
<div class="nav_divider"></div> --}}
