<nav class="navbar-top">
    <div class="navbar-top-container container">
        <input type="checkbox" name="" id="">
        <div class="hamburger-lines-navbar-top">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>
        <ul class="menu-items-navbar-top">
            <li><a href={{ route('homepage') }}>Home</a></li>
            <li><a href="/buffet">All-in Buffet</a></li>
            <li><a href="{{ route('dish.index') }}">Menukaart</a></li>
            <li><a href="/afhalen">Afhalen</a></li>
            <li><a href="{{ route('reservation.create') }}">Reserveren</a></li>
{{--            <li><a href="/catering">Catering</a></li>--}}
            <li><a href="{{ route('review.index') }}">Beoordelingen</a></li>
            <li><a href="/inloggen">Account</a></li>
        </ul>
        <a href="{{ route('homepage') }}">
            <img src="{{asset('images/logo-hi-rez.jpg')}}" alt="logo rasa senang" class="logo">
        </a>
    </div>
</nav>
