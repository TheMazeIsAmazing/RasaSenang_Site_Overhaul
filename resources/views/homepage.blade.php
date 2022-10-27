@extends('layouts.web')
@section('title', 'Welkom op onze site')
@section('top_text', 'De lekkerste sushi van Dordrecht')
@section('bottom_text', 'Altijd vers bereid')
@section('content')
    {{--    <h1>Welcome</h1>--}}
    {{--    <sub>this is the homepage</sub>--}}
    {{--    <a href={{ route('about-page') }}>about us</a>--}}

    <section id="about">
        <div class="about-wrapper container">
            <div class="about-text">
                <p class="small">Wie zijn wij?</p>
                <h2>Wij staan met liefde voor u klaar, al 35 jaar lang</h2>
                <p>
                    Sinds 1986 zitten we niet alleen in het hart van Sterrenburg,
                    maar ook het hart van onze gasten. Plaats snel uw reservering of
                    bestelling, en waarschijnlijk gebeurt bij u hetzelfde!
                </p>
            </div>
            <div class="about-img">
                <img src="{{asset('images/indonesische-sate.jpg')}}" alt="De lekkerste saté"/>
            </div>
        </div>
    </section>
    <section id="food">
        <h2>Onze Gerechten</h2>
        <div class="food-container container">
            <div class="food-type fruite">
                <div class="img-container">
                    <img src="{{asset('images/indonesisch-vleesgerecht.png')}}" alt="Indonesisch vleesgerecht"/>
                    <div class="img-content">
                        <h3>Indonesisch</h3>
                        <a
                            href="https://en.wikipedia.org/wiki/Fruit"
                            class="btn btn-primary"
                            target="blank"
                        >Meer informatie</a
                        >
                    </div>
                </div>
            </div>
            <div class="food-type vegetable">
                <div class="img-container">
                    <img src="{{asset('images/buffet.png')}}" alt="buffet"/>
                    <div class="img-content">
                        <h3>Javaans</h3>
                        <a
                            href="https://en.wikipedia.org/wiki/Vegetable"
                            class="btn btn-primary"
                            target="blank"
                        >Meer informatie</a
                        >
                    </div>
                </div>
            </div>
            <div class="food-type grin">
                <div class="img-container">
                    <img src="{{asset('images/sushi-flamberen.png')}}" alt="sushi"/>
                    <div class="img-content">
                        <h3>Sushi</h3>
                        <a
                            href="https://en.wikipedia.org/wiki/Grain"
                            class="btn btn-primary"
                            target="blank"
                        >Meer informatie</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Use on different page-->
    <!--<section id="food-menu">-->
    <!--    <h2 class="food-menu-heading">Food Menu</h2>-->
    <!--    <div class="food-menu-container container">-->
    <!--        <div class="food-menu-item">-->
    <!--            <div class="food-img">-->
    <!--                <img src="https://i.postimg.cc/wTLMsvSQ/food-menu1.jpg" alt=""/>-->
    <!--            </div>-->
    <!--            <div class="food-description">-->
    <!--                <h2 class="food-titile">Food Menu Item 1</h2>-->
    <!--                <p>-->
    <!--                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,-->
    <!--                    quae.-->
    <!--                </p>-->
    <!--                <p class="food-price">Price: &#8377; 250</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!---->
    <!--        <div class="food-menu-item">-->
    <!--            <div class="food-img">-->
    <!--                <img-->
    <!--                        src="https://i.postimg.cc/sgzXPzzd/food-menu2.jpg"-->
    <!--                        alt="error"-->
    <!--                />-->
    <!--            </div>-->
    <!--            <div class="food-description">-->
    <!--                <h2 class="food-titile">Food Menu Item 2</h2>-->
    <!--                <p>-->
    <!--                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,-->
    <!--                    quae.-->
    <!--                </p>-->
    <!--                <p class="food-price">Price: &#8377; 250</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="food-menu-item">-->
    <!--            <div class="food-img">-->
    <!--                <img src="https://i.postimg.cc/8zbCtYkF/food-menu3.jpg" alt=""/>-->
    <!--            </div>-->
    <!--            <div class="food-description">-->
    <!--                <h2 class="food-titile">Food Menu Item 3</h2>-->
    <!--                <p>-->
    <!--                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,-->
    <!--                    quae.-->
    <!--                </p>-->
    <!--                <p class="food-price">Price: &#8377; 250</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="food-menu-item">-->
    <!--            <div class="food-img">-->
    <!--                <img src="https://i.postimg.cc/Yq98p5Z7/food-menu4.jpg" alt=""/>-->
    <!--            </div>-->
    <!--            <div class="food-description">-->
    <!--                <h2 class="food-titile">Food Menu Item 4</h2>-->
    <!--                <p>-->
    <!--                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,-->
    <!--                    quae.-->
    <!--                </p>-->
    <!--                <p class="food-price">Price: &#8377; 250</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="food-menu-item">-->
    <!--            <div class="food-img">-->
    <!--                <img src="https://i.postimg.cc/KYnDqxkP/food-menu5.jpg" alt=""/>-->
    <!--            </div>-->
    <!--            <div class="food-description">-->
    <!--                <h2 class="food-titile">Food Menu Item 5</h2>-->
    <!--                <p>-->
    <!--                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,-->
    <!--                    quae.-->
    <!--                </p>-->
    <!--                <p class="food-price">Price: &#8377; 250</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="food-menu-item">-->
    <!--            <div class="food-img">-->
    <!--                <img src="https://i.postimg.cc/Jnxc8xQt/food-menu6.jpg" alt=""/>-->
    <!--            </div>-->
    <!--            <div class="food-description">-->
    <!--                <h2 class="food-titile">Food Menu Item 6</h2>-->
    <!--                <p>-->
    <!--                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,-->
    <!--                    quae.-->
    <!--                </p>-->
    <!--                <p class="food-price">Price: &#8377; 250</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <section id="testimonials">
        <h2 class="testimonial-title">Wat vinden onze gasten?</h2>
        <div class="testimonial-container container">
            <div class="testimonial-box">
                <div class="customer-detail">
                    <div class="customer-photo">
                        <img src="https://i.postimg.cc/5Nrw360Y/male-photo1.jpg" alt=""/>
                        <p class="customer-name">Ross Lee</p>
                    </div>
                </div>
                <div class="star-rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <p class="testimonial-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit
                    voluptas cupiditate aspernatur odit doloribus non.
                </p>

            </div>
            <div class="testimonial-box">
                <div class="customer-detail">
                    <div class="customer-photo">
                        <!--                    <img src="https://i.postimg.cc/fy90qvkV/male-photo3.jpg" alt=""/>-->
                        <p class="customer-name">Roy Yang</p>
                    </div>
                </div>
                <div class="star-rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <p class="testimonial-text">
                    Ik eet graag Indonesisch en daarvoor kom ik speciaal naar Dordrecht, naar Rasa Senang
                </p>

            </div>
            <div class="testimonial-box">
                <div class="customer-detail">
                    <div class="customer-photo">
                        <img src="https://i.postimg.cc/fy90qvkV/male-photo3.jpg" alt=""/>
                        <p class="customer-name">Ben Roy</p>
                    </div>
                </div>
                <div class="star-rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <p class="testimonial-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit
                    voluptas cupiditate aspernatur odit doloribus non.
                </p>

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
                    <a href="./afhalen" class="btn btn-danger">Afhalen</a>
                    <a href="./reserveren" class="btn btn-danger">Reserveren</a>
                </div>
            </div>
        </div>
    </section>
    <!--Use on different page-->
    <!--<section id="contact">-->
    <!--    <div class="contact-container container">-->
    <!--        <div class="contact-img">-->
    <!--            <img src="https://i.postimg.cc/1XvYM67V/restraunt2.jpg" alt=""/>-->
    <!--        </div>-->
    <!---->
    <!--        <div class="form-container">-->
    <!--            <h2>Contact Us</h2>-->
    <!--            <input type="text" placeholder="Your Name"/>-->
    <!--            <input type="email" placeholder="E-Mail"/>-->
    <!--            <textarea-->
    <!--                    cols="30"-->
    <!--                    rows="6"-->
    <!--                    placeholder="Type Your Message"-->
    <!--            ></textarea>-->
    <!--            <a href="#" class="btn btn-primary">Submit</a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
@endsection
