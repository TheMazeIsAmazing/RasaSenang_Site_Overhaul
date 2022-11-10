@extends('layouts.web')
@section('title', 'Welkom op onze site')
@section('top_text', 'All-in Buffet')
@section('img_is_buffet', 'true')
@section('classesHeader', 'showcase-area')
@section('content')
    <section id="about">
        <div class="about-wrapper container">
            <div class="about-text">
                <p>
                    Bij ons All-in buffet kunt u voor een vast bedrag zoveel en zo vaak eten als u wenst.
                    Hierbij zijn drie glazen drank naar keuze én ombeperkt frisdrank volledig imbegrepen!
                    Lukt het u om te kiezen uit meer dan 20 gerechten?
                </p>
            </div>
            <div class="about-img">
                <div id="captioned-gallery">
                    <figure class="slider">
                        <figure>
                            <img src="{{asset('/images/carousel_buffet/bakken-buffet.jpg')}}" alt>
                            <figcaption>Veel keuze voor iedereen!</figcaption>
                        </figure>
                        <figure>
                            <img src="{{asset('/images/carousel_buffet/sate-grillen.jpg')}}" alt>
                            <figcaption>Heerlijke kip saté</figcaption>
                        </figure>
                        <figure>
                            <img src="{{asset('/images/carousel_buffet/6-smaken-ijs.jpg')}}" alt>
                            <figcaption>Keuze uit 6 smaken ijs</figcaption>
                        </figure>
                        <figure>
                            <img src="{{asset('/images/carousel_buffet/sushi-buffet.jpg')}}" alt>
                            <figcaption>Keuze uit verschillende soorten Sushi</figcaption>
                        </figure>
                        <figure>
                            <img src="{{asset('/images/carousel_buffet/bakken-buffet.jpg')}}" alt>
                            <figcaption>Veel keuze voor iedereen!</figcaption>
                        </figure>
                    </figure>
                </div>
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

    <style>
        @keyframes slidy {
            0% { left: 0%; }
            20% { left: 0%; }
            25% { left: -100%; }
            45% { left: -100%; }
            50% { left: -200%; }
            70% { left: -200%; }
            75% { left: -300%; }
            95% { left: -300%; }
            100% { left: -400%; }
        }
        body, figure {
            margin: 0; background: #101010;
            font-weight: 100;
        }
        div#captioned-gallery {
            width: 100%; overflow: hidden;
        }
        figure.slider {
            position: relative; width: 500%;
            font-size: 0; animation: 30s slidy infinite;
        }
        figure.slider figure {
            width: 20%; height: auto;
            display: inline-block;  position: inherit;
        }
        figure.slider img { width: 100%; height: auto; }
        figure.slider figure figcaption {
            position: absolute; bottom: 0;
            background: rgba(0,0,0,0.4);
            color: #fff; width: 100%;
            font-size: 1.3rem; padding: .6rem;
        }
    </style>
@endsection
