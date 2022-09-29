@extends('layouts.web')
@section('title', '404 - Pagina niet gevonden',)
@section('top_text', 'Oeps, er is helaas iets mis gegaan.')
@section('bottom_text', '404 - Niet gevonden')
@section('content')
    <section id="about">
        <div class="about-wrapper container">
            <div class="about-text">
                <h2>Wat is er gebeurd?</h2>
                <p>
Helaas hebben we de pagina niet kunnen vinden die u zocht, mogelijk is deze verwijderd of er staat een typfoutje in de link.
                </p>
            </div>
            <div class="about-img">
                <img src="{{asset('images/indonesische-sate.jpg')}}" alt="De lekkerste saté"/>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="contact-container container">
            <div class="contact-img">
                <img src="https://i.postimg.cc/1XvYM67V/restraunt2.jpg" alt=""/>
            </div>

            <div class="form-container">
                <h2>Ook trek gekregen?</h2>
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
