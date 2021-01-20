<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="{{ route('home') }}">KaamKaaj</a>

    <div class="collapse navbar-collapse">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                {{-- <a class="nav-link" href="{{ route('event') }}">New Event</a> --}}
            </li>

        </ul>
            
           
        
        <ul class="navbar-nav">
            
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">My Profile</a>
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