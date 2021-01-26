<nav class="navbar navbar-expand-md navbar-light bg-warning py-0" style="border-radius: 0 0 55px 55px">

    <a class="navbar-brand ml-5" href="{{ route('home') }}">KaamKaaj</a>

    <a 
        class="navbar-toggler" 
        type="button" 
        data-toggle="collapse" 
        data-target="#navbarContent"
        >
        
        <img src="{{ asset('imgs/baseline_more_vert_black_18dp.png') }}">
    </a>


    <div class="collapse navbar-collapse" id="navbarContent">

        <ul class="navbar-nav mr-auto">
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('new-event') }}">New Event</a>
            </li>
            @endauth
        </ul>

        <ul class="navbar-nav mr-5">    
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
            @endauth
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @endguest
        </ul>
        
    </div>
</nav>