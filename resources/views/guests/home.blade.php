@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/carte.css') }}">
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endpush

@section('content')
    <section class="banniere-container">
        <div class="banniere-content">
            <div class="swiper" id="banner-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <figure class="slide-img">
                            <img src="{{ asset('assets/images/banner.jpg') }}" alt="Slide 1">
                            <figcaption class="banniere-mask">
                                <figure class="logo-page">
                                    <img src="{{ asset('assets/images/logo2.png') }}" alt="">
                                </figure>
                                <h2 class="banniere-title">Bienvenue sur le site web officiel de la faitiere des communes du Togo</h2>
                                <div class="banniere-band">
                                    <a href="https://communestogo.test" class="banniere-btn">Consulter l'annuaire <i class="fas fa-arrow-right"></i></a>
                                </div>
                                <div class="banniere-band-news">
                                    <h2 class="banniere-news-title">
                                        Faitiere des communes / 3eme Assemblée générale 2023
                                    </h2>
                                    <span><a href="#">En savoir plus</a></span>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="slide-img">
                            <img src="{{ asset('assets/images/slide3.jpeg') }}" alt="Slide 1">
                            <figcaption class="banniere-mask">
                                <figure class="logo-page">
                                    <img src="{{ asset('assets/images/logo2.png') }}" alt="">
                                </figure>
                                <h2 class="banniere-title">Bienvenue sur le site web officiel de la faitiere des communes du Togo</h2>
                                <div class="banniere-band">
                                    <a href="https://communestogo.test" class="banniere-btn">Consulter l'annuaire <i class="fas fa-arrow-right"></i></a>
                                </div>
                                <div class="banniere-band-news">
                                    <h2 class="banniere-news-title">
                                        Commune Lacs 1 / Benjamin BOUKPETI Open première édition
                                    </h2>
                                    <span><a href="#">En savoir plus</a></span>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="slide-img">
                            <img src="{{ asset('assets/images/slide4.jpeg') }}" alt="Slide 1">
                            <figcaption class="banniere-mask">
                                <figure class="logo-page">
                                    <img src="{{ asset('assets/images/logo2.png') }}" alt="">
                                </figure>
                                <h2 class="banniere-title">Bienvenue sur le site web officiel de la faitiere des communes du Togo</h2>
                                <div class="banniere-band">
                                    <a href="https://communestogo.test" class="banniere-btn">Consulter l'annuaire <i class="fas fa-arrow-right"></i></a>
                                </div>
                                <div class="banniere-band-news">
                                    <h2 class="banniere-news-title">
                                        Faitiere des communes / Atelier de finalisation et de validation du plan stratégique 2025-2029 de Aide et Action /Action Education Togo
                                    </h2>
                                    <span><a href="#">En savoir plus</a></span>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
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
            <li class="flash-content-item">
                <span class="flash-content-item-title">Golfe1: </span>
                <span class="flash-content-item-text">Reouverture de centre de lecture et d'animation culturelle. <a href="#">Lire plus</a></span>
            </li>
            <li class="flash-content-item">
                <span class="flash-content-item-title">Agoè Nyivé5: </span>
                <span class="flash-content-item-text">Le taux de change du franc CFA est monté en flêche. <a href="#">Lire plus</a></span>
            </li>
            <li class="flash-content-item">
                <span class="flash-content-item-title">Golfe3: </span>
                <span class="flash-content-item-text">Le gouvernement a décidé de créer un lieu social pour arbriter les plus démunis. <a href="#">Lire plus</a> </span>
            </li>
            <li class="flash-content-item">
                <span class="flash-content-item-title">EstMono2: </span>
                <span class="flash-content-item-text">Reouverture de centre de lecture et d'animation culturelle. <a href="#">Lire plus</a></span>
            </li>
        </ul>
    </section>

    <section class="presentation-section section-container">
        {{-- <figure class="presentation-image animated-bg">
            <img src="{{ asset('assets/images/presidente2.png') }}" alt="Image de présentation de la FCT">
        </figure> --}}
        <div class="presentation-squares">
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
        </div>
        <div class="presentation-content">
            <h2 class="presentation-title">Présentation</h2>
            <div class="presentation-description">
                <p>
                    La Faitière des Communes du TOGO (FCT) est créée le 14 Novembre 2020 à Kara. Elle est une association qui vise la bonne
                    gouvernance locale inclusive, l'émancipation et la promotion du développement durable et inclusive des territoires, dans
                    une approche solidaire et participative.
                </p>
                <p>
                    Elle est un cadre d'echange, de partage d'informations, d'expérience entre les 117 communes togolaises.
                    La faitiere des communes a comme pour valeurs la cohésion, la solidarité et la transparence et a pour mission
                    de renforcer la décentralisation et de développer les territoires.
                </p>
            </div>
            <a href="#" class="presentation-btn">Lire plus <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

    <div class="president-word-section section-container">
        <div class="president-word-container">
            <figure class="president-image animated-bg">
                <img src="{{ asset('assets/images/presidente.png') }}" alt="Président" loading="lazy">
            </figure>
            <div class="president-info">
                <h2 class="president-title">mot de la présidente de la fct</h2>
                <div class="president-content">
                    <div class="president-word">
                        Ici sera renseigné le mot de la présidente de la faitière des communes du Togo.
                        Ici sera renseigné le mot de la présidente de la faitière des communes du Togo.
                        Ici sera renseigné le mot de la présidente de la faitière des communes du Togo.
                        Ici sera renseigné le mot de la présidente de la faitière des communes du Togo.
                        Ici sera renseigné le mot de la présidente de la faitière des communes du Togo.
                        Ici sera renseigné le mot de la présidente de la faitière des communes du Togo.
                        Ici sera renseigné le mot de la présidente de la faitière des communes du Togo.
                        Ici sera renseigné le mot de la présidente de la faitière des communes du Togo.
                        Ici sera renseigné le mot de la présidente de la faitière des communes du Togo.
                        Ici sera renseigné le mot de la présidente de la faitière des communes du Togo.
                    </div>

                    <div class="president-word-read-more">
                        <a href="#" class="president-word-read-more-btn">Lire plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            {{-- <div class="communes-info">
                <div class="communes-info-item">
                    <div class="communes-info-title">
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"></path>
                        </svg>
                        <h3><span class="highlighted">05</span> Régions</h3>
                    </div>
                    <div class="communes-info-content">
                        <p>Notre pays est segmenté en 5 régions composées de 117 communes.</p>
                    </div>
                </div>
                <div class="communes-info-item">
                    <div class="communes-info-title">
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"></path>
                        </svg>
                        <h3><span class="highlighted">117</span> Communes</h3>
                    </div>
                    <div class="communes-info-content">
                        <p>Nous comptons 117 communes dans notre pays, qui regroupent au sein d'elles 394 cantons.</p>
                    </div>
                </div>
                <div class="communes-info-item">
                    <div class="communes-info-title">
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"></path>
                        </svg>
                        <h3><span class="highlighted">394</span> Cantons</h3>
                    </div>
                    <div class="communes-info-content">
                        <p>Nous comptons 394 cantons dans notre pays, qui sont coiffés par 39 préfectures.</p>
                    </div>
                </div>
                <div class="communes-info-item">
                    <div class="communes-info-title">
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"></path>
                        </svg>
                        <h3><span class="highlighted">39</span> Préfectures</h3>
                    </div>
                    <div class="communes-info-content">
                        <p>Nous comptons 39 préfectures dans notre pays, qui sont responsables de la gestion des communes.</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="actu-communes-section section-container">
        <div class="actu-communes-container">
            <h1 class="actu-communes-container-title">Actu - Communes</h1>

            <div class="actu-communes">
                <div class="swiper actu-communes-item prior" id="actu-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <figure class="actu-communes-image animated-bg">
                                <img src="{{ asset('assets/images/actu1.jpg') }}" alt="Image de l'actualité" loading="lazy">
                                <figcaption>
                                    <a href="#">
                                        <h2>Semaine européenne de la diplomatie: Le CDP Togo-France en mode Ecojogging dans les rues de Bè Apédomé</h2>
                                    </a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="actu-communes-image animated-bg">
                                <img src="{{ asset('assets/images/actu2.jpg') }}" alt="Image de l'actualité" loading="lazy">
                                <figcaption>
                                    <a href="#">
                                        <h2>Apothéose de la fête des ignames</h2>
                                    </a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="actu-communes-item">
                    <figure class="actu-communes-image animated-bg">
                        <img src="{{ asset('assets/images/actu1.jpg') }}" alt="Image de l'actualité" loading="lazy">
                        <figcaption>Golfe 1</figcaption>
                    </figure>
                    <div class="actu-communes-content">
                        <div class="actu-communes-published-at">
                            <span>Publié le 12/11/2024</span>
                        </div>
                        <h3 class="actu-communes-title">
                            Semaine européenne de la diplomatie: Le CDP Togo-France en mode Ecojogging dans les rues de Bè Apédomé
                        </h3>
                        <div class="actu-communes-read-more">
                            <a href="#" class="actu-communes-read-more-btn">Lire plus <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="actu-communes-item">
                    <figure class="actu-communes-image animated-bg">
                        <img src="{{ asset('assets/images/actu1.jpg') }}" alt="Image de l'actualité" loading="lazy">
                        <figcaption>Golfe 1</figcaption>
                    </figure>
                    <div class="actu-communes-content">
                        <div class="actu-communes-published-at">
                            <span>Publié le 12/11/2024</span>
                        </div>
                        <h3 class="actu-communes-title">
                            Semaine européenne de la diplomatie: Le CDP Togo-France en mode Ecojogging dans les rues de Bè Apédomé
                        </h3>
                        <div class="actu-communes-read-more">
                            <a href="#" class="actu-communes-read-more-btn">Lire plus <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="actu-communes-item">
                    <figure class="actu-communes-image animated-bg">
                        <img src="{{ asset('assets/images/actu2.jpg') }}" alt="Image de l'actualité" loading="lazy">
                        <figcaption>Est-mono 2</figcaption>
                    </figure>
                    <div class="actu-communes-content">
                        <div class="actu-communes-published-at">
                            <span>Publié le 12/11/2024</span>
                        </div>
                        <h3 class="actu-communes-title">
                            Apothéose de la fête des igname
                        </h3>
                        <div class="actu-communes-read-more">
                            <a href="#" class="actu-communes-read-more-btn">Lire plus <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="actu-communes-item">
                    <figure class="actu-communes-image animated-bg">
                        <img src="{{ asset('assets/images/actu3.jpg') }}" alt="Image de l'actualité" loading="lazy">
                        <figcaption>Kozah 3</figcaption>
                    </figure>
                    <div class="actu-communes-content">
                        <div class="actu-communes-published-at">
                            <span>Publié le 12/11/2024</span>
                        </div>
                        <h3 class="actu-communes-title">
                            La Commune de Kozah 3 et la Communauté de Communes du Pays de Lure en France s'unissent officiellement
                        </h3>
                        <div class="actu-communes-read-more">
                            <a href="#" class="actu-communes-read-more-btn">Lire plus <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="actu-communes-item">
                    <figure class="actu-communes-image animated-bg">
                        <img src="{{ asset('assets/images/actu4.jpg') }}" alt="Image de l'actualité" loading="lazy">
                        <figcaption>Keran 1</figcaption>
                    </figure>
                    <div class="actu-communes-content">
                        <div class="actu-communes-published-at">
                            <span>Publié le 12/11/2024</span>
                        </div>
                        <h3 class="actu-communes-title">
                            Les travaux de la 1ère session ordinaire 2023 de la commune Kéran 1 ouverts à Kantè
                        </h3>
                        <div class="actu-communes-read-more">
                            <a href="#" class="actu-communes-read-more-btn">Lire plus <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="actu-communes-read-all">
                <a href="#" class="actu-communes-read-all-btn">Voir toutes les actualités <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="actu-videos-section section-container">
        <div class="actu-videos-container">
            <h1 class="actu-videos-container-title">Actu - Vidéos</h1>

            <div class="actu-videos">
                <div class="actu-videos-item">
                    <div class="actu-videos-video">
                        <iframe src="https://www.youtube.com/embed/zuAUktlxid4" title="Intervention de Madame Kouigan, présidente de la Faîtière des communes du Togo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="actu-videos-content">
                        <h3 class="actu-videos-title">
                            Intervention de Madame Kouigan, présidente de la Faîtière des communes du Togo
                        </h3>
                        <div class="actu-videos-published-at">
                            <span>Publié le 12/11/2024</span>
                        </div>

                        <div class="actu-videos-read-more">
                            <a href="#" class="actu-videos-read-more-btn">Lire la vidéo <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="actu-videos-item">
                    <div class="actu-videos-video">
                        <iframe src="https://www.youtube.com/embed/HCRLxrtR1UE" title="Intervention de Madame Kouigan, présidente de la Faîtière des communes du Togo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="actu-videos-content">
                        <h3 class="actu-videos-title">
                            Vidéo pitch de la commune Mô 1 avec M Bayé KLOUN, Maire de la commune de Mô1
                        </h3>
                        <div class="actu-videos-published-at">
                            <span>Publié le 12/11/2024</span>
                        </div>

                        <div class="actu-videos-read-more">
                            <a href="#" class="actu-videos-read-more-btn">Lire la vidéo <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="actu-videos-item">
                    <div class="actu-videos-video">
                        <iframe src="https://www.youtube.com/embed/MFNJJ0kvr-8" title="Intervention de Madame Kouigan, présidente de la Faîtière des communes du Togo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="actu-videos-content">
                        <h3 class="actu-videos-title">
                            Vidéo pitch de la commune Wawa 2 avec Mme OBIM Kafui, Adj au maire de la commune de Wawa 2
                        </h3>
                        <div class="actu-videos-published-at">
                            <span>Publié le 12/11/2024</span>
                        </div>

                        <div class="actu-videos-read-more">
                            <a href="#" class="actu-videos-read-more-btn">Lire la vidéo <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="actu-communes-read-all">
                <a href="#" class="actu-communes-read-all-btn">Voir toutes les vidéos <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="agenda-section section-container">
        <h2 class="agenda-title">Agenda</h2>
        <div class="events-container">
            <h2 class="events-container-title">Nos événements</h2>
            <div class="events-primary-container">
                <div class="events-primary-item">
                    <figure class="events-primary-image animated-bg">
                        <img src="{{ asset('assets/images/event1.jpeg') }}" alt="Image d'événement" loading="lazy">
                    </figure>
                    <div class="events-primary-content">
                        <div class="events-date">
                            <span>14 nov 2024</span>
                        </div>
                        <div class="events-category">Culture</div>
                        <h3 class="events-title">Assemblée Générale Ordinaire de la Faitiere des Communes du TOGO</h3>
                    </div>
                </div>
                <div class="events-primary-item">
                    <figure class="events-primary-image animated-bg">
                        <img src="{{ asset('assets/images/event2.jpeg') }}" alt="Image d'événement" loading="lazy">
                    </figure>
                    <div class="events-primary-content">
                        <div class="events-date">
                            <span>24 Oct 2024</span>
                        </div>
                        <div class="events-category">Culture</div>
                        <h3 class="events-title">Partage d'experience sur la Gestion des marchés dans les Communes du TOGO</h3>
                    </div>
                </div>
            </div>
            <div class="events-secondary-container">
                <div class="events-secondary-item">
                    <div class="events-date">
                        <span>24 Juil 2024</span>
                    </div>
                    <div class="events-secondary-content">
                        <div class="events-category">Culture</div>
                        <h3 class="events-title">Accessibilité des actes d'etat civil, rôle et responsabilité des acteurs</h3>
                    </div>
                    <div class="events-secondary-bolb"></div>
                </div>
                <div class="events-secondary-item">
                    <div class="events-date">
                        <span>24 Juil 2024</span>
                    </div>
                    <div class="events-secondary-content">
                        <div class="events-category">Culture</div>
                        <h3 class="events-title">Accessibilité des actes d'etat civil, rôle et responsabilité des acteurs</h3>
                    </div>
                    <div class="events-secondary-bolb"></div>
                </div>
                <div class="events-secondary-item">
                    <div class="events-date">
                        <span>24 Juil 2024</span>
                    </div>
                    <div class="events-secondary-content">
                        <div class="events-category">Culture</div>
                        <h3 class="events-title">Accessibilité des actes d'etat civil, rôle et responsabilité des acteurs</h3>
                    </div>
                    <div class="events-secondary-bolb"></div>
                </div>
            </div>

            <div class="events-read-all">
                <a href="#" class="events-read-all-btn">Tous nos evenements <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <section class="decouverte-section section-container">
        <div class="decouverte-title">Découvrez</div>
        <div class="decouverte-content">
            <a href="#" class="decouverte-item">
                <div class="decouverte-icon">
                    <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5V78.6c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8V454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5V83.8c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11V456c0 11.4 11.7 19.3 22.4 15.5z"></path>
                    </svg>
                </div>
                <div class="decouverte-item-content">
                    <h3 class="decouverte-item-title">fct mag</h3>
                    <p class="decouverte-item-description">Premier magazine d'information sur la décentralisation et le développement des territoires au Togo. <span>voir</span></p>
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
            <a href="#" class="decouverte-item">
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
                        <a href="{{ route('guests:carte:maritime') }}" class="button-link">Localisation</a>
                    </div>
                </div>
                <div class="region-desc" id="plateau-desc">
                    <h4 class="region-desc-title">Region des plateaux</h4>
                    <p>32 Communes</p>
                    <p>1 000 551 habitants</p>
                    <div class="region-button">
                        <a href="{{ route('guests:carte:plateaux') }}" class="button-link">Localisation</a>
                    </div>
                </div>
                <div class="region-desc" id="centrale-desc">
                    <h4 class="region-desc-title">Region centrale</h4>
                    <p>21 Communes</p>
                    <p>769 940 habitants</p>
                    <div class="region-button">
                        <a href="{{ route('guests:carte:centrale') }}" class="button-link">Localisation</a>
                    </div>
                </div>
                <div class="region-desc" id="kara-desc">
                    <h4 class="region-desc-title">Region de la kara</h4>
                    <p>15 Communes</p>
                    <p>617 871 habitants</p>
                    <div class="region-button">
                        <a href="{{ route('guests:carte:kara') }}" class="button-link">Localisation</a>
                    </div>
                </div>
                <div class="region-desc" id="savanes-desc">
                    <h4 class="region-desc-title">Region des savanes</h4>
                    <p>16 Communes</p>
                    <p>828 224 habitants</p>
                    <div class="region-button">
                        <a href="{{ route('guests:carte:savanes') }}" class="button-link">Localisation</a>
                    </div>
                </div>
            </div>
            <div class="ads-container">
                <div class="twitter-widget-container">
                    <blockquote class="twitter-tweet"><p lang="fr" dir="ltr">Le Ministre de l&#39;administration territoriale, Colonel AWATE Hodabalo a donné le ton pour la Journée africaine de la décentralisation et du développement local (JADDL) ce 06 août à Lomé en présence de Madame Yawa KOUIGAN, Présidente de la FCT et Ministre de la communication. <a href="https://t.co/EXs3Ytlr4J">pic.twitter.com/EXs3Ytlr4J</a></p>&mdash; Faîtière des Communes du Togo (@fct228) <a href="https://twitter.com/fct228/status/1820842352442794216?ref_src=twsrc%5Etfw">August 6, 2024</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <div class="pub-content">
                    <figure class="pub-image">
                        <img src="{{ asset('assets/images/ads.jpg') }}" alt="Image de publicité" loading="lazy">
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
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/14.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/13.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/12.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/11.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/10.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/9.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/8.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/7.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/6.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/5.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/4.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/3.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/2.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/1.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/14.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/13.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/12.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
                        <figure class="partner-slide animated-bg">
                            <img src="{{ asset('assets/images/partner/11.png') }}" alt="Logo du partenaire" loading="lazy">
                        </figure>
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
    <script>
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
