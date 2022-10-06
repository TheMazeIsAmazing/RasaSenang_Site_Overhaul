@extends('layouts.web')
@section('top_text', 'Oeps, er is helaas iets mis gegaan.')
@section('content')
    <section id="about">
        <div class="about-wrapper container">
            <div class="about-text">
                <h2>Wat is er gebeurd?</h2>
                <p>
                    @yield('description_error')
                </p>
            </div>
            <div class="about-img">
                <img src="{{asset('images/map.jpg')}}" alt="wéreldkaart"/>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="contact-container container">
            <div class="contact-img">
                <img src="https://i.postimg.cc/1XvYM67V/restraunt2.jpg" alt=""/>
            </div>

            <div class="form-container">
                <h3>Zocht u naar een manier om uw trek te verhelpen?</h3>
                <p>
                    Haal uw gerechten gemakkelijk af, of kom genieten in ons restaurant!
                </p>
                <div class="showcase-button-container">
                    <a href="./afhalen" class="btn btn-primary">Afhalen</a>
                    <a href="./reserveren" class="btn btn-primary">Reserveren</a>
                </div>
            </div>
        </div>
    </section>
@endsection
