<section class="@yield('classesHeader')" id="showcase"
         style="background: linear-gradient(rgba(240, 240, 240, 0.144), rgba(255, 255, 255, 0.336)),
        @hasSection('img_is_sushi')
         url({{asset('images/sushi-2314534_1920.jpg')}}) no-repeat center;
                  @elseif(View::hasSection('img_is_sushi_flamberen'))
                  url({{asset('images/sushi-flamberen.png')}}) no-repeat center;
                                    @elseif(View::hasSection('img_is_buffet'))
                  url({{asset('images/allyoucaneat.jpg')}}) no-repeat center;
                                                      @elseif(View::hasSection('img_is_map'))
                  url({{asset('images/map.jpg')}}) no-repeat center;
                  @else
                  url({{asset('images/sushi-flamberen.png')}}) no-repeat center;
        @endif
         url({{asset('images/sushi-flamberen.png')}}) no-repeat center;
         background-size: cover;">
    <div class="showcase-container">
        <h1 class="main-title" id="home">@yield('top_text')</h1>
        @hasSection('bottom_text')
            <p>
                @yield('bottom_text')
            </p>
        @endif
        @hasSection('takeOut_and_Reservation_buttons')
            <div class="showcase-button-container">
                <a href="/afhalen" class="btn btn-primary">Afhalen</a>
                <a href="{{ route('reservation.create') }}" class="btn btn-primary">Reserveren</a>
            </div>
        @endif
    </div>
</section>
