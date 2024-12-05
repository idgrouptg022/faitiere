@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/annuaires/plaquettes/show.css') }}">
@endpush

@php
    $annuaireAtout = \App\Utils\AnnuaireAtout::class;
@endphp

@section('content')
    <h1 class="page-title">Annuaires - Communes</h1>

    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('auth:annuaires:plaquettes:index') }}">Annuaires - Communes</a></li>
            <li class="breadcrumb-item">{{  $commune->name  }}
            </li>
        </ol>
    </div>

    <div class="container">
        <div class="page-content">
            @include('includes.auths.flash')
        </div>

        <div class="plaquette-container">
            <div class="tab-header">
                <div class="tabs">
                    <a id="tab1" name="all" href="#tab1">
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"></path>
                        </svg>
                        Informations primaires
                    </a>
                    <a id="tab2" name="user" href="#tab2">
                        <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path>
                        </svg>
                        Responsables
                    </a>
                    <a id="tab3" name="file" href="#tab3">
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.1-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45L7.3 301C1 307-1.4 316 .8 324.4s8.9 14.9 17.3 17.1l62.5 15.8-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 15.8 62.5c2.1 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.4l45-46.2 45 46.2c6.1 6.2 15 8.7 23.4 6.4s14.9-8.9 17.1-17.3l15.8-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-15.8c8.4-2.1 15-8.7 17.3-17.1s-.2-17.3-6.4-23.4l-46.2-45 46.2-45c6.2-6.1 8.7-15 6.4-23.4s-8.9-14.9-17.3-17.1l-62.5-15.8 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L341.4 18.1c-2.1-8.4-8.7-15-17.1-17.3S307 1 301 7.3L256 53.5 211 7.3z"></path>
                        </svg>
                        Atouts
                    </a>
                    <a id="tab4" name="file" href="#tab4">
                        <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M364.2 83.8c-24.4-24.4-64-24.4-88.4 0l-184 184c-42.1 42.1-42.1 110.3 0 152.4s110.3 42.1 152.4 0l152-152c10.9-10.9 28.7-10.9 39.6 0s10.9 28.7 0 39.6l-152 152c-64 64-167.6 64-231.6 0s-64-167.6 0-231.6l184-184c46.3-46.3 121.3-46.3 167.6 0s46.3 121.3 0 167.6l-176 176c-28.6 28.6-75 28.6-103.6 0s-28.6-75 0-103.6l144-144c10.9-10.9 28.7-10.9 39.6 0s10.9 28.7 0 39.6l-144 144c-6.7 6.7-6.7 17.7 0 24.4s17.7 6.7 24.4 0l176-176c24.4-24.4 24.4-64 0-88.4z"></path>
                        </svg>
                        Fichiers
                    </a>
                </div>
            </div>
            <div class="tab-content-wrapper">
                <div id="tab1-content" class="tab-content">
                    <form action="{{ route('auth:annuaires:store', $commune ) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form__row">
                            <div class="form__col">
                                <label class="form__label" for="domaine_prior1">Domaine prioritaire 1</label>
                                <input type="text" id="domaine_prior1" name="domaine_prior1" required class="input__form" placeholder="infrastructures" value="{!! $annuaire->domaine_prior1 ?? "" !!}">
                            </div>
                            <div class="form__col">
                                <label class="form__label" for="domaine_prior2">Domaine prioritaire 2</label>
                                <input type="text" id="domaine_prior2" name="domaine_prior2" required class="input__form" placeholder="services sociaux" value="{!! $annuaire->domaine_prior2 ?? "" !!}">
                            </div>
                            <div class="form__col">
                                <label class="form__label" for="domaine_prior3">Domaine prioritaire 3</label>
                                <input type="text" id="domaine_prior3" name="domaine_prior3" required class="input__form" placeholder="administration moderne" value="{!! $annuaire->domaine_prior3 ?? "" !!}">
                            </div>
                        </div>
                        <div class="form__group">
                            <label for="vision" class="form__label">Vision de développement</label>
                            <textarea name="vision" id="vision" rows="7" class="input__form" placeholder="Vision de développement...">{!! $annuaire->vision ?? "" !!}</textarea>
                        </div>
                        <div class="form__group">
                            <label for="presentation" class="form__label">Présentation</label>
                            <textarea name="presentation" id="presentation" rows="10" class="input__form">{!! $annuaire->presentation ?? "" !!}</textarea>
                        </div>
                        <div class="form__row numbers">
                            <div class="form__col">
                                <label for="superficie" class="form__label">Superficie</label>
                                <input type="number" min="0" name="superficie" id="superficie" class="input__form" placeholder="superficie..." value="{!! $annuaire->superficie ?? "" !!}">
                            </div>
                            <div class="form__col">
                                <label for="population" class="form__label">Population</label>
                                <input type="number" min="0" name="population" id="population" class="input__form" placeholder="population..." value="{!! $annuaire->population ?? "" !!}">
                            </div>
                            <div class="form__col">
                                <label for="sante" class="form__label">Santé</label>
                                <input type="number" min="0" name="sante" id="sante" class="input__form" placeholder="sante..." value="{!! $annuaire->sante ?? "" !!}">
                            </div>
                            <div class="form__col">
                                <label for="hotel" class="form__label">Hôtels</label>
                                <input type="number" min="0" name="hotels" id="hotel" class="input__form" placeholder="hotel..." value="{!! $annuaire->hotels ?? "" !!}">
                            </div>
                            <div class="form__col">
                                <label for="prescolaires" class="form__label">Préscolaires</label>
                                <input type="number" min="0" name="prescolaires" id="prescolaires" class="input__form" placeholder="prescolaires..." value="{!! $annuaire->prescolaires ?? "" !!}">
                            </div>
                            <div class="form__col">
                                <label for="primaires" class="form__label">Primaires</label>
                                <input type="number" min="0" name="primaires" id="primaires" class="input__form" placeholder="primaires..." value="{!! $annuaire->primaires ?? "" !!}">
                            </div>
                            <div class="form__col">
                                <label for="secondaires" class="form__label">Secondaires</label>
                                <input type="number" min="0" name="secondaires" id="secondaires" class="input__form" placeholder="secondaires..." value="{!! $annuaire->secondaires ?? "" !!}">
                            </div>
                            <div class="form__col">
                                <label for="artisanaux" class="form__label">Artisanaux</label>
                                <input type="number" min="0" name="artisanaux" id="artisanaux" class="input__form" placeholder="artisanaux..." value="{!! $annuaire->artisanaux ?? "" !!}">
                            </div>
                            <div class="form__col">
                                <label for="agences_bancaires" class="form__label">Agences bancaires</label>
                                <input type="number" min="0" name="agences_bancaires" id="agences_bancaires" class="input__form" placeholder="agences bancaires..." value="{!! $annuaire->agences_bancaires ?? "" !!}">
                            </div>
                        </div>

                        <div class="form__button">
                            <button type="submit" class="button__green">Valider les informations</button>
                        </div>
                    </form>
                </div>
                <div id="tab2-content" class="tab-content">
                    <form action="{{ route('auth:annuaires:store-responsable', $commune) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="responsable-container">
                            <figure class="responsable-image">
                                <img src="{{ $annuaireResponsableMaire ? asset('storage/' . $annuaireResponsableMaire->file) : '' }}" alt="">
                            </figure>
                            <div class="">
                                <div class="form__row">
                                    <div class="form__col">
                                        <label for="maire" class="form__label">Maire de la commune</label>
                                        <input type="text" name="maire" id="maire" class="input__form" placeholder="Nom complet" value="{{ $annuaireResponsableMaire->name ?? '' }}">
                                    </div>
                                    <div class="form__col">
                                        <label for="image_maire" class="form__label">Image du maire</label>
                                        <input type="file" id="image_maire" name="image_maire" accept=".jpg,.png" class="input__form">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="responsable-container">
                            <figure class="responsable-image">
                                <img src="{{ $annuaireResponsableAdjoint1 ? asset('storage/' . $annuaireResponsableAdjoint1->file) : '' }}" alt="">
                            </figure>
                            <div class="">
                                <div class="form__row">
                                    <div class="form__col">
                                        <label for="adjoint1" class="form__label">1er adjoint au maire</label>
                                        <input type="text" name="adjoint1" id="adjoint1" class="input__form" placeholder="Nom complet" value="{{ $annuaireResponsableAdjoint1->name ?? '' }}">
                                    </div>
                                    <div class="form__col">
                                        <label for="image_adjoint1" class="form__label">Image du 1er adjoint</label>
                                        <input type="file" id="image_adjoint1" name="image_adjoint1" accept=".jpg,.png" class="input__form">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="responsable-container">
                            <figure class="responsable-image">
                                <img src="{{ $annuaireResponsableAdjoint2 ? asset('storage/' . $annuaireResponsableAdjoint2->file) : '' }}" alt="">
                            </figure>
                            <div class="">
                                <div class="form__row">
                                    <div class="form__col">
                                        <label for="adjoint2" class="form__label">2eme adjoint au maire</label>
                                        <input type="text" name="adjoint2" id="adjoint2" class="input__form" placeholder="Nom complet" value="{{ $annuaireResponsableAdjoint2->name ?? '' }}">
                                    </div>
                                    <div class="form__col">
                                        <label for="image_adjoint2" class="form__label">Image du 2eme adjoint</label>
                                        <input type="file" id="image_adjoint2" name="image_adjoint2" accept=".jpg,.png" class="input__form">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form__button">
                            <button type="submit" class="button__green">Valider les informations</button>
                        </div>
                    </form>
                </div>
                <div id="tab3-content" class="tab-content">
                    <fieldset class="atout">
                        <legend>Premier atout</legend>
                        <form action="{{ route('auth:annuaires:plaquettes:atout:store', [$commune, 1]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="atout-container">
                                <figure class="atout-image">
                                    <img src="{{ $annuaireAtout::get($annuaire, 1) != null ? asset('storage/' . $annuaireAtout::get($annuaire, 1)->image) : '' }}" alt="Fichier atout">
                                </figure>
                                <div class="">
                                    <div class="form__row">
                                        <div class="form__col">
                                            <label for="premier_atout_titre" class="form__label">Titre</label>
                                            <input type="text" name="title" id="premier_atout_titre" class="input__form" placeholder="Titre du premier atout" value="{{ $annuaireAtout::get($annuaire, 1)->title ?? '' }}">
                                        </div>
                                        <div class="form__col">
                                            <label for="premier_atout_image" class="form__label">Image</label>
                                            <input type="file" id="premier_atout_image" name="image" accept="image/*" class="input__form">
                                        </div>
                                    </div>
                                    <div class="form__group">
                                        <label for="premier_atout_description" class="form__label">Description</label>
                                        <textarea name="description" id="premier_atout_description" rows="5" class="input__form" placeholder="Brève description de l'atout">{!! $annuaireAtout::get($annuaire, 1)->description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form__button button2">
                                <button type="submit" class="button__green">Valider les informations</button>
                            </div>
                        </form>
                    </fieldset>
                    <fieldset class="atout">
                        <legend>Deuxième atout</legend>
                        <form action="{{ route('auth:annuaires:plaquettes:atout:store', [$commune, 2]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="atout-container">
                                <figure class="atout-image">
                                    <img src="{{ $annuaireAtout::get($annuaire, 2) != null ? asset('storage/' . $annuaireAtout::get($annuaire, 2)->image) : '' }}" alt="Fichier atout">
                                </figure>
                                <div class="">
                                    <div class="form__row">
                                        <div class="form__col">
                                            <label for="deuxieme_atout_titre" class="form__label">Titre</label>
                                            <input type="text" name="title" id="deuxieme_atout_titre" class="input__form" placeholder="Titre du deuxième atout"  value="{{ $annuaireAtout::get($annuaire, 2)->title ?? '' }}">
                                        </div>
                                        <div class="form__col">
                                            <label for="deuxieme_atout_image" class="form__label">Image</label>
                                            <input type="file" id="deuxieme_atout_image" name="image" accept="image/*" class="input__form">
                                        </div>
                                    </div>
                                    <div class="form__group">
                                        <label for="deuxieme_atout_description" class="form__label">Description</label>
                                        <textarea name="description" id="deuxieme_atout_description" class="input__form" rows="5" placeholder="Brève description de l'atout">{!! $annuaireAtout::get($annuaire, 2)->description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form__button button2">
                                <button type="submit" class="button__green">Valider les informations</button>
                            </div>
                        </form>
                    </fieldset>
                    <fieldset class="atout">
                        <legend>Troisième atout</legend>
                        <form action="{{ route('auth:annuaires:plaquettes:atout:store', [$commune, 3]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="atout-container">
                                <figure class="atout-image">
                                    <img src="{{ $annuaireAtout::get($annuaire, 3) != null ? asset('storage/' . $annuaireAtout::get($annuaire, 3)->image) : '' }}" alt="Fichier atout">
                                </figure>
                                <div class="">
                                    <div class="form__row">
                                        <div class="form__col">
                                            <label for="troisieme_atout_titre" class="form__label">Titre</label>
                                            <input type="text" name="title" id="troisieme_atout_titre" class="input__form" placeholder="Titre du troisieme atout" value="{{ $annuaireAtout::get($annuaire, 3)->title ?? '' }}">
                                        </div>
                                        <div class="form__col">
                                            <label for="troisieme_atout_image" class="form__label">Image</label>
                                            <input type="file" id="troisieme_atout_image" name="image" accept="image/*" class="input__form">
                                        </div>
                                    </div>
                                    <div class="form__group">
                                        <label for="troisieme_atout_description" class="form__label">Description</label>
                                        <textarea name="description" id="troisieme_atout_description" class="input__form" rows="5" placeholder="Brève description de l'atout">{!! $annuaireAtout::get($annuaire, 3)->description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form__button button2">
                                <button type="submit" class="button__green">Valider les informations</button>
                            </div>
                        </form>
                    </fieldset>
                    <fieldset class="atout">
                        <legend>Quatrième atout</legend>
                        <form action="{{ route('auth:annuaires:plaquettes:atout:store', [$commune, 4]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="atout-container">
                                <figure class="atout-image">
                                    <img src="{{ $annuaireAtout::get($annuaire, 4) != null ? asset('storage/' . $annuaireAtout::get($annuaire, 4)->image) : '' }}" alt="Fichier atout">
                                </figure>
                                <div class="">
                                    <div class="form__row">
                                        <div class="form__col">
                                            <label for="quatrieme_atout_titre" class="form__label">Titre</label>
                                            <input type="text" name="title" id="quatrieme_atout_titre" class="input__form" placeholder="Titre du quatrieme atout" value="{{ $annuaireAtout::get($annuaire, 4)->title ?? '' }}">
                                        </div>
                                        <div class="form__col">
                                            <label for="quatrieme_atout_image" class="form__label">Image</label>
                                            <input type="file" id="quatrieme_atout_image" name="image" accept="image/*" class="input__form">
                                        </div>
                                    </div>
                                    <div class="form__group">
                                        <label for="quatrieme_atout_description" class="form__label">Description</label>
                                        <textarea name="description" id="quatrieme_atout_description" class="input__form" rows="5" placeholder="Brève description de l'atout">{!! $annuaireAtout::get($annuaire, 4)->description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form__button button2">
                                <button type="submit" class="button__green">Valider les informations</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <div id="tab4-content" class="tab-content">
                    <fieldset class="atout logo-fieldset">
                        <legend>Logo</legend>
                        <form action="{{ route('auth:annuaires:file-store', $annuaire ?? "" ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form__row form-logo">

                                <figure class="logo-container form__col">

                                    <img src="{{ $annuaireLogoFile ? asset('storage/' . $annuaireLogoFile->file) : asset('images/default-logo.png') }}" alt="Logo">
                                </figure>

                                <div class="form__col">
                                    <div>
                                        <label for="logo" class="form__label">Image</label>
                                        <input type="file" id="logo" name="logo" accept="image/*" class="input__form">
                                    </div>
                                    <div class="form__button button2">
                                        <button type="submit" class="button__green">Valider</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </fieldset>
                    <fieldset class="atout logo-fieldset">
                        <legend>Bannière</legend>
                        <form action="{{ route('auth:annuaires:file-store', $commune ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form__row form-logo">

                                <figure class="banner-container form__col">
                                    <img src="{{ $annuaireBannerFile ? asset('storage/' . $annuaireBannerFile->file) : asset('images/default-banner.png') }}" alt="Banniere">
                                </figure>

                                <div class="form__col">
                                    <div>
                                        <label for="banner" class="form__label">Image</label>
                                        <input type="file" id="banner" name="banner" accept="image/*" class="input__form">
                                    </div>
                                    <div class="form__button button2">
                                        <button type="submit" class="button__green">Valider</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </fieldset>
                    <fieldset class="atout logo-fieldset">
                        <legend>Domaines prioritaires</legend>
                        <form action="{{ route('auth:annuaires:file-domaine-store', $commune ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form__row">
                                <div class="form__col">
                                    <label for="annuaires[domaine_prior1]" class="form__label">Domaine prioritaire 1</label>
                                    <figure class="domaine-container">
                                        <img src="{{ $annuaireDomaine1File ? asset('storage/' . $annuaireDomaine1File->file) : asset('images/default-annuaireDomaine1File.png') }}" alt="Domaines">
                                    </figure>
                                    <div>
                                        <input type="file" id="domaine_prior1" name="annuaires[domaine_prior1]" accept="image/*" class="input__form">
                                    </div>
                                </div>

                                <div class="form__col">
                                    <label for="annuaires[domaine_prior2]" class="form__label">Domaine prioritaire 2</label>
                                    <figure class="domaine-container">
                                        <img  src="{{ $annuaireDomaine2File ? asset('storage/' . $annuaireDomaine2File->file) : asset('images/default-annuaireDomaine2File.png') }}" alt="Domaines">
                                    </figure>
                                    <div>
                                        <input type="file" id="domaine_prior2" name="annuaires[domaine_prior2]" accept="image/*" class="input__form">
                                    </div>
                                </div>

                                <div class="form__col">
                                    <label for="annuaires[domaine_prior3]" class="form__label">Domaine prioritaire 3</label>
                                    <figure class="domaine-container">
                                        <img  src="{{ $annuaireDomaine3File ? asset('storage/' . $annuaireDomaine3File->file) : asset('images/default-annuaireDomaine3File.png') }}" alt="Domaines">
                                    </figure>
                                    <div>
                                        <input type="file" id="domaine_prior3" name="annuaires[domaine_prior3]" accept="image/*" class="input__form">
                                    </div>
                                </div>
                            </div>
                            <div class="form__button button2">
                                <button type="submit" class="button__green">Valider</button>
                            </div>
                        </form>
                    </fieldset>
                    <fieldset class="atout logo-fieldset">
                        <legend>Presentation</legend>
                        <form action="{{ route('auth:annuaires:file:presentation', $commune) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form__row row__pres">
                                <div class="form__col">
                                    <label for="presentation1" class="form__label">Image 1</label>
                                    <figure class="pres-container">
                                        <img src="{{ $annuairePresentation1File ? asset('storage/' . $annuairePresentation1File->file) : ''}}" alt="Presentation">
                                    </figure>
                                    <div>
                                        <input type="file" id="presentation1" name="presentation1" accept="image/*" class="input__form">
                                    </div>
                                </div>

                                <div class="form__col">
                                    <label for="presentation2" class="form__label">Image 2</label>
                                    <figure class="pres-container">
                                        <img src="{{ $annuairePresentation2File ? asset('storage/' . $annuairePresentation2File->file) : '' }}" alt="Presentation">
                                    </figure>
                                    <div>
                                        <input type="file" id="presentation2" name="presentation2" accept="image/*" class="input__form">
                                    </div>
                                </div>

                                <div class="form__col">
                                    <label for="presentation3" class="form__label">Image 3</label>
                                    <figure class="pres-container">
                                        <img src="{{ $annuairePresentation3File ? asset('storage/' . $annuairePresentation3File->file) : ''}}" alt="Presentation">
                                    </figure>
                                    <div>
                                        <input type="file" id="presentation3" name="presentation3" accept="image/*" class="input__form">
                                    </div>
                                </div>
                                <div class="form__col">
                                    <label for="presentation4" class="form__label">Image 4</label>
                                    <figure class="pres-container">
                                        <img src="{{ $annuairePresentation4File ? asset('storage/' . $annuairePresentation4File->file) : ''}}" alt="Presentation">
                                    </figure>
                                    <div>
                                        <input type="file" id="presentation4" name="presentation4" accept="image/*" class="input__form">
                                    </div>
                                </div>
                            </div>
                            <div class="form__button button2">
                                <button type="submit" class="button__green">Valider</button>
                            </div>
                        </form>
                    </fieldset>
                    <fieldset class="atout logo-fieldset">
                        <legend>Partenaires</legend>
                        <div class="partners">
                            @foreach ($partners as $partner)
                                <figure class="partner-item">
                                    <img src="{{ asset('storage/' . $partner->file) }}" alt="">
                                    <figcaption>
                                        <div class="partner-actions">
                                            <a href="#" onclick="modalOpener(this)" data-target="#editPartner{{ $partner->id }}">Editer</a>
                                            <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer ce partenaire ?') ? document.getElementById('deletePartner{{ $partner->id }}').submit() : ''">Supprimer</a>
                                            <form action="{{ route('auth:annuaires:file:partner:delete', $partner) }}" method="POST" id="deletePartner{{ $partner->id }}">
                                                @csrf
                                                @method("DELETE")
                                            </form>
                                        </div>
                                    </figcaption>
                                </figure>

                                <div class="modal__container" id="editPartner{{ $partner->id }}">
                                    <div class="modal">
                                        <div class="modal__body">
                                            <form action="{{ route('auth:annuaires:file:partner:update', [$annuaire, $partner]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method("PATCH")
                                                <div class="form__group">
                                                    <label for="" class="form__label">Image de l'annonce</label>
                                                    <label for="" class="input__file__container">
                                                        <i class="fa fa-image"></i>
                                                        <input type="file" name="file" id="" class="input__file" onchange="uploadFile(this)" accept="image/*">
                                                        <span class="file__name">Choisir une image</span>
                                                    </label>
                                                </div>

                                                <div class="form__button">
                                                    <button type="submit" class="button__green">valider la modiication</button>
                                                    <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <form action="{{ route('auth:annuaires:file:partner', $commune) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form__group">
                                <label for="partner" class="form__label">Partenaires</label>
                                <input type="file" name="images[]" id="partner" class="input__form" multiple accept=".jpg,.png,.svg">
                            </div>
                            <div class="form__button button2">
                                <button type="submit" class="button__green">Valider</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    @endsection

@push('extra-scripts')
    <script>
        $(document).ready(function () {
            $('#presentation').summernote({
                placeholder: "Contenu de la présentation...",
                lang: 'fr-FR',
                height: 250,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    // ['insert', ['link', 'picture']],
                ]
            });
        });

        const modalOpener = (element) => {
            const targetSelector = element.dataset.target;
            const modal = document.querySelector(targetSelector);
            modal.style.display = "flex";
        };

        const uploadFile = (element) => {
            const fileInput = element;

            const fileContainer = fileInput.parentNode;
            const fileSpan = fileContainer.querySelector('.file__name');


            if (fileInput.files.length >= 1) {
                const fileName = fileInput.files[0].name;
                let fileSize = fileInput.files[0].size;
                fileSize = (fileSize / 1024).toFixed(2) + " ko";

                fileContainer.style.borderColor = "#006ccb";
                fileContainer.style.backgroundColor = "#dfeeff";
                fileSpan.textContent = `${fileName}, ${fileSize}` ;
            } else {
                fileContainer.style.borderColor = "#000";
                fileContainer.style.backgroundColor = "#fff";
                fileSpan.textContent = "Choisir une image" ;
            }

        }

    </script>
    <script src="{{ asset('assets/scripts/auths/annuaires/plaquettes/purify.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/auths/annuaires/plaquettes/show.js') }}"></script>
@endpush
