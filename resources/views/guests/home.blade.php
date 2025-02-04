@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/carte.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/aos.min.css') }}">
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endpush

@section('content')
    <section class="banniere-container">
        <div class="banniere-content">
            <div class="swiper" id="banner-swiper">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                        <div class="swiper-slide">
                            <figure class="slide-img">
                                <img src="{{ asset('storage/' . $banner->image) }}" alt="Slide 1">
                                <figcaption class="banniere-mask">
                                    <div>
                                        {{-- <figure class="logo-page">
                                            <img src="{{ asset('assets/images/logo2.png') }}" alt="">
                                        </figure> --}}
                                        <h2 class="banniere-title">
                                            {!! $banner->title !!}
                                        </h2>
                                        @if ($banner->link)
                                            <span><a href="{{ $banner->link }}" class="banniere-link">En savoir plus <i class="fas fa-arrow-right"></i></a></span>
                                        @endif
                                    </div>
                                    <div class="banniere-band">
                                        <a href="https://communestogo.sogevo.com" class="banniere-btn">Consulter l'annuaire <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                    {{-- <div class="banniere-band-news">
                                        <h2 class="banniere-news-title">
                                            {!! $banner->title !!}
                                        </h2><br>
                                        @if ($banner->link)
                                            <span><a href="{{ $banner->link }}">En savoir plus</a></span>
                                        @endif
                                    </div> --}}
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="swiper-pagination"></div> --}}
            </div>
        </div>
    </section>

    <div class="motif-band-container">
        <figure class="motif-band">
            <img src="{{ asset('assets/images/motif.png') }}" alt="Motif FCT">
        </figure>
    </div>

    <section class="flash-container">
        <div class="flash-title">Flash Info</div>
        <ul class="flash-content">
            @foreach ($flashs as $flash)
                <li class="flash-content-item">
                    <span class="flash-content-item-title">{{ $flash != null ? $flash->commune->name . ":" : "" }} </span>
                    <span class="flash-content-item-text">{{ \Illuminate\Support\Str::substr($flash->title, 0, 50) . "..." }} <a href="{{ route('guests:actualites:show', $flash) }}">Lire plus</a></span>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="presentation-section section-container">
        <figure class="presentation-image animated-bg">
            <img src="{{ asset('storage/' . $presidentWord->image) }}" alt="Président" loading="lazy">
            <figcaption>
                <a href="{{ route('guests:presidentWord') }}">
                    <h5>Mot de la présidente</h5>
                </a>
            </figcaption>
        </figure>
        {{-- <div class="presentation-squares">
            <div class="first-squares">
                <div class="first-squares-item">
                    <h2 class="square-title" id="communes-number">0</h2>
                    <p class="square-text">communes</p>
                </div>
                <div class="first-squares-item">
                    <h2 class="square-title">0<span id="regions-number">0</span></h2>
                    <p class="square-text">regions</p>
                </div>
            </div>
            <div class="second-squares">
                <div class="second-squares-item">
                    <h2 class="square-title" id="cantons-number">0</h2>
                    <p class="square-text">cantons</p>
                </div>
                <div class="second-squares-item">
                    <h2 class="square-title" id="prefectures-number">0</h2>
                    <p class="square-text">prefectures</p>
                </div>
            </div>
        </div> --}}
        <div class="presentation-content" style="overflow-x: hidden;">
            <h2 class="presentation-title">Présentation</h2>
            <div class="presentation-description" data-aos="fade-left" data-aos-duration="5000">
                {!! $presentation->body !!}
            </div>
            <a href="{{ route('guests:presentation') }}" class="presentation-btn">Lire plus <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

    {{-- <div class="president-word-section section-container">
        <div class="president-word-container" data-aos="fade-up" data-aos-duration="5000">
            <figure class="president-image animated-bg">
                <img src="{{ asset('storage/' . $presidentWord->image) }}" alt="Président" loading="lazy">
            </figure>
            <div class="president-info">
                <h2 class="president-title">mot de la présidente de la fct</h2>
                <div class="president-content">
                    <div class="president-word">
                        {!! $presidentWord->body !!}
                    </div>

                    <div class="president-word-read-more">
                        <a href="{{ route('guests:presidentWord') }}" class="president-word-read-more-btn">Lire plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="actu-communes-section section-container">
        <div class="actu-communes-container">
            <h1 class="actu-communes-container-title">Actu - Communes</h1>

            <div class="actu-communes">
                <div class="swiper actu-communes-item prior" id="actu-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($slide_actualites as $actualite)
                            <div class="swiper-slide">
                                <figure class="actu-communes-image animated-bg">
                                    <img src="{{ asset('storage/' . $actualite->image) }}" alt="Image de l'actualité" loading="lazy">
                                    <figcaption>
                                        <a href="{{ route('guests:actualites:show', $actualite) }}">
                                            <h2>{{ $actualite->title }}</h2>
                                        </a>
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                @foreach ($actualites as $actualite)
                    <div class="actu-communes-item" data-aos="zoom-in" data-aos-duration="5000">
                        <figure class="actu-communes-image animated-bg">
                            <img src="{{ asset('storage/' . $actualite->image) }}" alt="Image de l'actualité" loading="lazy">
                            <figcaption>{{ $actualite != null ? $actualite->commune->name : '' }}</figcaption>
                        </figure>
                        <div class="actu-communes-content">
                            <div class="actu-communes-published-at">
                                <span>Publié le {{ \Carbon\Carbon::parse($actualite->created_at)->format("d/m/Y") }}</span>
                            </div>
                            <h3 class="actu-communes-title">
                                {{ $actualite->title }}
                            </h3>
                            <div class="actu-communes-read-more">
                                <a href="{{ route('guests:actualites:show', $actualite) }}" class="actu-communes-read-more-btn">Lire plus <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="actu-communes-read-all">
                <a href="{{ route('guests:actualites:index') }}" class="actu-communes-read-all-btn">Voir toutes les actualités <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="actu-videos-section section-container">
        <div class="actu-videos-container">
            <h1 class="actu-videos-container-title">Actu - Vidéos</h1>

            <div class="actu-videos">
                @foreach ($actu_videos as $actu_video)
                    <div class="actu-videos-item" data-aos="zoom-in" data-aos-duration="5000">
                        <div class="actu-videos-video">
                            <iframe src="https://www.youtube.com/embed/{{ $actu_video->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <div class="actu-videos-content">
                            <h3 class="actu-videos-title">
                                {{ $actu_video->title }}
                            </h3>
                            <div class="actu-videos-published-at">
                                <span>Publié le {{ \Carbon\Carbon::parse($actu_video->created_at)->format("d/m/Y") }}</span>
                            </div>

                            {{-- <div class="actu-videos-read-more">
                                <a href="#" class="actu-videos-read-more-btn">Lire la vidéo <i class="fas fa-arrow-right"></i></a>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="actu-communes-read-all">
                <a href="{{ route('guests:actuvideos:index') }}" class="actu-communes-read-all-btn">Voir toutes les vidéos <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    {{-- <div class="agenda-section section-container">
        <h2 class="agenda-title">Evénements</h2>
        <div class="events-container">
            {{-- <h2 class="events-container-title">Nos événements</h2> -}}
            <div class="events-primary-container">
                @foreach ($primary_events as $event)
                    <div class="events-primary-item" data-aos="fade-up" data-aos-duration="5000">
                        <figure class="events-primary-image animated-bg">
                            <img src="{{ asset('storage/' . $event->image) }}" alt="Image d'événement" loading="lazy">
                        </figure>
                        <div class="events-primary-content">
                            <div class="events-date">
                                <span>{{ \Carbon\Carbon::parse($event->event_date)->locale("fr")->isoFormat("ll") }}</span>
                            </div>
                            <div class="events-category">{{ $event->domaine }}</div>
                            <h3 class="events-title">{{ $event->title }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="events-secondary-container">
                @foreach ($events as $event)
                    <div class="events-secondary-item" data-aos="flip-down" data-aos-duration="5000">
                        <div class="events-date">
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->locale("fr")->isoFormat("ll") }}</span>
                        </div>
                        <div class="events-secondary-content">
                            <div class="events-category">{{ $event->domaine }}</div>
                            <h3 class="events-title">{{ $event->title }}</h3>
                        </div>
                        <div class="events-secondary-bolb"></div>
                    </div>
                @endforeach
            </div>

            <div class="events-read-all">
                <a href="{{ route('guests:events:index', 'national') }}" class="events-read-all-btn">Tous nos evenements <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div> --}}

    <section class="chiffres-section section-container">
        <div class="chiffres-container">
            <div class="chiffres-item">
                <h2 class="square-title" id="communes-number">0</h2>
                <p class="square-text">communes</p>
            </div>
            <div class="chiffres-item">
                <h2 class="square-title">0<span id="regions-number">0</span></h2>
                <p class="square-text">regions</p>
            </div>
            <div class="chiffres-item">
                <h2 class="square-title" id="cantons-number">0</h2>
                <p class="square-text">cantons</p>
            </div>
            <div class="chiffres-item">
                <h2 class="square-title" id="prefectures-number">0</h2>
                <p class="square-text">prefectures</p>
            </div>
            <div class="chiffres-item">
                <h2 class="square-title">0<span id="dagl-number">0</span></h2>
                <p class="square-text">dagl</p>
            </div>
        </div>
    </section>

    <section class="decouverte-section section-container">
        <div class="decouverte-title">Découvrez</div>
        <div class="decouverte-content">
            <a href="{{ route('guests:thematiques:index') }}" class="decouverte-item">
                <div class="decouverte-icon">
                    <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5V78.6c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8V454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5V83.8c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11V456c0 11.4 11.7 19.3 22.4 15.5z"></path>
                    </svg>
                </div>
                <div class="decouverte-item-content">
                    <h3 class="decouverte-item-title">Nos thématiques</h3>
                    <p class="decouverte-item-description">
                        <span>voir</span>
                    </p>
                </div>
            </a>
            <a href="#" class="decouverte-item">
                <div class="decouverte-icon">
                    <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z"></path>
                    </svg>
                </div>
                <div class="decouverte-item-content">
                    <h3 class="decouverte-item-title">cadel</h3>
                    <p class="decouverte-item-description">Cellule d'Appui au Développement Economique et Local. <span>voir</span></p>
                </div>
            </a>
            <a href="#" class="decouverte-item">
                <div class="decouverte-icon">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M132.7 4.7l-64 64c-4.6 4.6-5.9 11.5-3.5 17.4s8.3 9.9 14.8 9.9H208c6.5 0 12.3-3.9 14.8-9.9s1.1-12.9-3.5-17.4l-64-64c-6.2-6.2-16.4-6.2-22.6 0zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H64zm96 96a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM80 400c0-26.5 21.5-48 48-48h64c26.5 0 48 21.5 48 48v16c0 17.7-14.3 32-32 32H112c-17.7 0-32-14.3-32-32V400zm192 0c0-26.5 21.5-48 48-48h64c26.5 0 48 21.5 48 48v16c0 17.7-14.3 32-32 32H304c-17.7 0-32-14.3-32-32V400zm32-128a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM356.7 91.3c6.2 6.2 16.4 6.2 22.6 0l64-64c4.6-4.6 5.9-11.5 3.5-17.4S438.5 0 432 0H304c-6.5 0-12.3 3.9-14.8 9.9s-1.1 12.9 3.5 17.4l64 64z"></path>
                    </svg>
                </div>
                <div class="decouverte-item-content">
                    <h3 class="decouverte-item-title">refela</h3>
                    <p class="decouverte-item-description">Réseau des Femmes Elues Locales d'Afrique. <span>voir</span></p>
                </div>
            </a>
            <a href="{{ route('guests:contact') }}" class="decouverte-item">
                <div class="decouverte-icon">
                    <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM325.8 139.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-21.4 21.4-71-71 21.4-21.4c15.6-15.6 40.9-15.6 56.6 0zM119.9 289L225.1 183.8l71 71L190.9 359.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"></path>
                    </svg>
                </div>
                <div class="decouverte-item-content">
                    <h3 class="decouverte-item-title">Ecrire a fct</h3>
                    <p class="decouverte-item-description">Canal de mise en contact avec la FCT. <span>voir</span></p>
                </div>
            </a>
        </div>
    </section>

    {{-- <div class="fctmag-section section-container">
        <h2 class="fctmag-title lg-hide">FCT Mag</h2>
        <div class="fctmag-container">
            <div class="fctmag-text-container">
                <h2 class="fctmag-title sm-hide">FCT Mag</h2>
                <p>
                    Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag.
                    Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag.
                    Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag.
                </p>
                <p>
                    Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag.
                    Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag.
                    Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag. Ici sera renseigné le texte de la fct mag.
                </p>
                <div class="fctmag-read-more">
                    <a href="#" class="fctmag-read-more-btn">En savoir plus <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <figure class="fctmag-image">
                <img src="{{ asset('assets/images/fctmag1.png') }}" alt="Image de FCT Mag">
            </figure>
        </div>
    </div> --}}

    <div class="localisation-ads-section section-container">
        <div class="localisation-ads-title">
            <h2>Localiser ma commune</h2>
        </div>
        <div class="localisation-ads-container">
            <div class="map-localisation-container">
                @include('includes.carte')
                <div class="region-desc" id="maritime-desc">
                    <h4 class="region-desc-title">Region maritime</h4>
                    <p>32 Communes</p>
                    <p>2 599 555 habitants</p>
                    <div class="region-button">
                        <a href="{{ route('guests:carte:index', $maritime) }}" class="button-link">Localisation</a>
                    </div>
                </div>
                <div class="region-desc" id="plateau-desc">
                    <h4 class="region-desc-title">Region des plateaux</h4>
                    <p>32 Communes</p>
                    <p>1 000 551 habitants</p>
                    <div class="region-button">
                        <a href="{{ route('guests:carte:index', $plateaux) }}" class="button-link">Localisation</a>
                    </div>
                </div>
                <div class="region-desc" id="centrale-desc">
                    <h4 class="region-desc-title">Region centrale</h4>
                    <p>21 Communes</p>
                    <p>769 940 habitants</p>
                    <div class="region-button">
                        <a href="{{ route('guests:carte:index', $centrale) }}" class="button-link">Localisation</a>
                    </div>
                </div>
                <div class="region-desc" id="kara-desc">
                    <h4 class="region-desc-title">Region de la kara</h4>
                    <p>15 Communes</p>
                    <p>617 871 habitants</p>
                    <div class="region-button">
                        <a href="{{ route('guests:carte:index', $kara) }}" class="button-link">Localisation</a>
                    </div>
                </div>
                <div class="region-desc" id="savanes-desc">
                    <h4 class="region-desc-title">Region des savanes</h4>
                    <p>16 Communes</p>
                    <p>828 224 habitants</p>
                    <div class="region-button">
                        <a href="{{ route('guests:carte:index', $savanes) }}" class="button-link">Localisation</a>
                    </div>
                </div>
            </div>
            <div class="ads-container">
                <div class="twitter-widget-container">
                    <blockquote class="twitter-tweet">
                        <p lang="fr" dir="ltr">
                            <a href="https://t.co/EXs3Ytlr4J">pic.twitter.com/EXs3Ytlr4J</a></p>
                            <a href="{{ $twitter_post->url ?? 'https://twitter.com/fct228/status/1820842352442794216' }}"></a>
                    </blockquote>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <div class="pub-content">
                    <figure class="pub-image" style="width: 100%;">
                        <img src="{{ asset('storage/' . $publicite->image) }}" alt="Image de publicité" loading="lazy">
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="partner-section section-container">
        <div class="partner-container">
            <h1 class="partner-container-title">Nos partenaires</h1>

            <div class="partners">
                <figure class="partner-primary-logo">
                    <img src="{{ asset('assets/images/partners/2.png') }}" alt="Logo du partenaire principal" loading="lazy">
                </figure>
                <div class="partners-logo">
                    <div class="partners-logo-wrapper">
                        @foreach ($partners as $partner)
                            <figure class="partner-slide animated-bg">
                                <img src="{{ asset('storage/' . $partner->image) }}" alt="Logo du partenaire" loading="lazy">
                            </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="motif-band-container">
        <figure class="motif-band">
            <img src="{{ asset('assets/images/motif.png') }}" alt="Motif FCT">
        </figure>
    </div>
@endsection

@push('extra-scripts')
    <script src="{{ asset('assets/scripts/guests/home.js') }}"></script>
    <script src="{{ asset('assets/scripts/guests/carte.js') }}"></script>
    <script src="{{ asset('assets/scripts/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/aos.min.js') }}"></script>
    <script>
        AOS.init({
            once: true
        });
        const swiper = new Swiper('#banner-swiper', {
            // Optional parameters
            direction: 'horizontal',
            effect: 'fade',
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
        });

        const actuSwiper = new Swiper('#actu-swiper', {
            // Optional parameters
            direction: 'horizontal',
            effect: 'slide',
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endpush
