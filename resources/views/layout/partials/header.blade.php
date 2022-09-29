<section class="showcase-area" id="showcase"
         style="background: linear-gradient(rgba(240, 240, 240, 0.144), rgba(255, 255, 255, 0.336)),
         url({{asset('images/sushi-flamberen.png')}}) no-repeat center;
         background-size: cover;">
    <div class="showcase-container">
        <h1 class="main-title" id="home">@yield('top_text')</h1>
        <p>
            @yield('bottom_text')
        </p>
        <div class="showcase-button-container">
            <a href="/afhalen" class="btn btn-primary">Afhalen</a>
            <a href="/reserveren" class="btn btn-primary">Reserveren</a>
        </div>
    </div>
</section>
