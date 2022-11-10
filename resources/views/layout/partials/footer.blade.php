<footer class="footer-section">
    <div class="container">
        <div class="footer-cta pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i style="width: 30px; height: 30px; padding-left: 5px" class="fas fa-map-marker-alt"></i>
                        <div class="cta-text">
                            <h4>Locatie</h4>
                            <span>De Jagerweg 227, 3328AA Dordrecht</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fas fa-phone"></i>
                        <div class="cta-text">
                            <h4>Telefoonnummer</h4>
                            <span>078-6511160</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="far fa-envelope-open"></i>
                        <div class="cta-text">
                            <h4>E-mailadres</h4>
                            <span>info@rasasenang.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content pt-5 pb-5">
            <div class="row" style="row-gap: 40px">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Links</h3>
                        </div>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('buffet.index') }}">All-in Buffet</a></li>
                            <li><a href="{{ route('dish.index') }}">Menukaart</a></li>
                            <li><a href="/afhalen">Afhalen</a></li>
                            <li><a href="{{ route('reservation.create') }}">Reserveren</a></li>
                            <li><a href="/catering">Catering</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li><a href="/inloggen">Account</a></li>
                            <li><a href="/vacatures">Vacatures</a></li>
                            <li><a href="/privacystatement">Privacystatement</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Nieuwsbrief</h3>
                        </div>
                        <div class="footer-text mb-25">
                            <p>Wilt u als aller eerste nieuws over Rasa Senang ontvangen? Laat dan hier uw e-mailadres achter!</p>
                        </div>
                        <div class="subscribe-form">
                            <form action="#">
                                <label for="email-newsletter" style="display: none">
                                </label>
                                <input id="email-newsletter" name="email-newsletter" type="text" placeholder="jan-en-alleman@voorbeeld.nl">
                                <button><i class="fab fa-telegram-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget" style="padding-top: 20px">
                        <div class="footer-logo">
                            <a href="/"><img src="{{asset('images/logowit.png')}}" class="img-fluid" style="max-height: 150px" alt="logo"></a>
                        </div>
                        <div class="footer-text">
                            <p>© <?= date("Y") ?> - Rasa Senang. Alle rechten voorbehouden.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
