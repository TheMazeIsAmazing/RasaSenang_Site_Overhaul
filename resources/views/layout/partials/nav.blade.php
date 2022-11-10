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
            <li><a href="{{ route('buffet.index') }}">All-in Buffet</a></li>
            <li><a href="{{ route('dish.index') }}">Menukaart</a></li>
            <li><a href="/afhalen">Afhalen</a></li>
            <li><a href="{{ route('reservation.create') }}">Reserveren</a></li>
{{--            <li><a href="/catering">Catering</a></li>--}}
            <li><a href="{{ route('review.index') }}">Beoordelingen</a></li>
            <li><div style="display: flex; gap: 20px"> <a href="/winkelwagen"><img style="height: 20px" src="http://cdn.onlinewebfonts.com/svg/img_548739.png" alt="Winkelwagen"></a><a href="{{ route('profile') }}"><img style="height: 20px" src="https://vectorified.com/images/profile-picture-icon-27.png" alt="Profiel"></a></div></li>
            <li></li>
{{--            <li><a href="/inloggen">Account</a></li>--}}
        </ul>
        <a href="{{ route('homepage') }}">
            <img src="{{asset('images/logo-hi-rez.jpg')}}" alt="logo rasa senang" class="logo">
        </a>
    </div>
</nav>
