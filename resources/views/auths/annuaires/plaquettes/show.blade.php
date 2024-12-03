@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/annuaires/plaquettes/show.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Annuaires - Communes</h1>

    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('auth:annuaires:plaquettes:index') }}">Annuaires - Communes</a></li>
            <li class="breadcrumb-item">{{ $commune->name }}</li>
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
                    <form action="" method="post">
                        @csrf
                        <div class="form__row">
                            <div class="form__col">
                                <label class="form__label" for="domaine_prior1">Domaine prioritaire 1</label>
                                <input type="text" id="domaine_prior1" name="domaine_prior1" required class="input__form" placeholder="infrastructures">
                            </div>
                            <div class="form__col">
                                <label class="form__label" for="domaine_prior2">Domaine prioritaire 2</label>
                                <input type="text" id="domaine_prior2" name="domaine_prior2" required class="input__form" placeholder="services sociaux">
                            </div>
                            <div class="form__col">
                                <label class="form__label" for="domaine_prior3">Domaine prioritaire 3</label>
                                <input type="text" id="domaine_prior3" name="domaine_prior3" required class="input__form" placeholder="administration moderne">
                            </div>
                        </div>
                        <div class="form__group">
                            <label for="vision" class="form__label">Vision de développement</label>
                            <textarea name="vision" id="vision" rows="7" class="input__form" placeholder="Vision de développement..."></textarea>
                        </div>
                        <div class="form__group">
                            <label for="presentation" class="form__label">Présentation</label>
                            <textarea name="presentation" id="presentation" rows="10" class="input__form"></textarea>
                        </div>
                        <div class="form__row numbers">
                            <div class="form__col">
                                <label for="superficie" class="form__label">Superficie</label>
                                <input type="number" min="0" name="superficie" id="superficie" class="input__form" placeholder="superficie...">
                            </div>
                            <div class="form__col">
                                <label for="population" class="form__label">Population</label>
                                <input type="number" min="0" name="population" id="population" class="input__form" placeholder="population...">
                            </div>
                            <div class="form__col">
                                <label for="sante" class="form__label">Santé</label>
                                <input type="number" min="0" name="sante" id="sante" class="input__form" placeholder="sante...">
                            </div>
                            <div class="form__col">
                                <label for="hotel" class="form__label">Hôtels</label>
                                <input type="number" min="0" name="hotel" id="hotel" class="input__form" placeholder="hotel...">
                            </div>
                            <div class="form__col">
                                <label for="prescolaires" class="form__label">Préscolaires</label>
                                <input type="number" min="0" name="prescolaires" id="prescolaires" class="input__form" placeholder="prescolaires...">
                            </div>
                            <div class="form__col">
                                <label for="primaires" class="form__label">Primaires</label>
                                <input type="number" min="0" name="primaires" id="primaires" class="input__form" placeholder="primaires...">
                            </div>
                            <div class="form__col">
                                <label for="secondaires" class="form__label">Secondaires</label>
                                <input type="number" min="0" name="secondaires" id="secondaires" class="input__form" placeholder="secondaires...">
                            </div>
                            <div class="form__col">
                                <label for="artisanaux" class="form__label">Artisanaux</label>
                                <input type="number" min="0" name="artisanaux" id="artisanaux" class="input__form" placeholder="artisanaux...">
                            </div>
                            <div class="form__col">
                                <label for="agences_bancaires" class="form__label">Agences bancaires</label>
                                <input type="number" min="0" name="agences_bancaires" id="agences_bancaires" class="input__form" placeholder="agences bancaires...">
                            </div>
                        </div>

                        <div class="form__button">
                            <button type="submit" class="button__green">Valider les informations</button>
                        </div>
                    </form>
                </div>
                <div id="tab2-content" class="tab-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form__row">
                            <div class="form__col">
                                <label for="maire" class="form__label">Maire de la commune</label>
                                <input type="text" name="maire" id="maire" class="input__form" placeholder="Nom complet">
                            </div>
                            <div class="form__col">
                                <label for="image_maire" class="form__label">Image du maire</label>
                                <input type="file" id="image_maire" name="image_maire" accept=".jpg,.png" class="input__form">
                            </div>
                        </div>
                        <div class="form__row">
                            <div class="form__col">
                                <label for="adjoint1" class="form__label">1er adjoint au maire</label>
                                <input type="text" name="adjoint1" id="adjoint1" class="input__form" placeholder="Nom complet">
                            </div>
                            <div class="form__col">
                                <label for="image_adjoint1" class="form__label">Image du 1er adjoint</label>
                                <input type="file" id="image_adjoint1" name="image_adjoint1" accept=".jpg,.png" class="input__form">
                            </div>
                        </div>
                        <div class="form__row">
                            <div class="form__col">
                                <label for="adjoint2" class="form__label">2eme adjoint au maire</label>
                                <input type="text" name="adjoint2" id="adjoint2" class="input__form" placeholder="Nom complet">
                            </div>
                            <div class="form__col">
                                <label for="image_adjoint2" class="form__label">Image du 2eme adjoint</label>
                                <input type="file" id="image_adjoint2" name="image_adjoint2" accept=".jpg,.png" class="input__form">
                            </div>
                        </div>

                        <div class="form__button">
                            <button type="submit" class="button__green">Valider les informations</button>
                        </div>
                    </form>
                </div>
                <div id="tab3-content" class="tab-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="atout">
                            <legend>Premier atout</legend>
                            <div class="form__row">
                                <div class="form__col">
                                    <label for="premier_atout_titre" class="form__label">Titre</label>
                                    <input type="text" name="premier_atout_titre" id="premier_atout_titre" class="input__form" placeholder="Titre du premier atout">
                                </div>
                                <div class="form__col">
                                    <label for="premier_atout_image" class="form__label">Image</label>
                                    <input type="file" id="premier_atout_image" name="premier_atout_image" accept="image/*" class="input__form">
                                </div>
                            </div>
                            <div class="form__group">
                                <label for="premier_atout_description" class="form__label">Description</label>
                                <textarea name="premier_atout_description" id="premier_atout_description" rows="5" class="input__form" placeholder="Brève description de l'atout"></textarea>
                            </div>
                            <div class="form__button button2">
                                <button type="submit" class="button__green">Valider les informations</button>
                            </div>
                        </fieldset>
                        <fieldset class="atout">
                            <legend>Deuxième atout</legend>
                            <div class="form__row">
                                <div class="form__col">
                                    <label for="deuxieme_atout_titre" class="form__label">Titre</label>
                                    <input type="text" name="deuxieme_atout_titre" id="deuxieme_atout_titre" class="input__form" placeholder="Titre du deuxième atout">
                                </div>
                                <div class="form__col">
                                    <label for="deuxieme_atout_image" class="form__label">Image</label>
                                    <input type="file" id="deuxieme_atout_image" name="deuxieme_atout_image" accept="image/*" class="input__form">
                                </div>
                            </div>
                            <div class="form__group">
                                <label for="deuxieme_atout_description" class="form__label">Description</label>
                                <textarea name="deuxieme_atout_description" id="deuxieme_atout_description" class="input__form" rows="5" placeholder="Brève description de l'atout"></textarea>
                            </div>
                            <div class="form__button button2">
                                <button type="submit" class="button__green">Valider les informations</button>
                            </div>
                        </fieldset>
                        <fieldset class="atout">
                            <legend>Troisième atout</legend>
                            <div class="form__row">
                                <div class="form__col">
                                    <label for="troisieme_atout_titre" class="form__label">Titre</label>
                                    <input type="text" name="troisieme_atout_titre" id="troisieme_atout_titre" class="input__form" placeholder="Titre du troisieme atout">
                                </div>
                                <div class="form__col">
                                    <label for="troisieme_atout_image" class="form__label">Image</label>
                                    <input type="file" id="troisieme_atout_image" name="troisieme_atout_image" accept="image/*" class="input__form">
                                </div>
                            </div>
                            <div class="form__group">
                                <label for="troisieme_atout_description" class="form__label">Description</label>
                                <textarea name="troisieme_atout_description" id="troisieme_atout_description" class="input__form" rows="5" placeholder="Brève description de l'atout"></textarea>
                            </div>
                            <div class="form__button button2">
                                <button type="submit" class="button__green">Valider les informations</button>
                            </div>
                        </fieldset>
                        <fieldset class="atout">
                            <legend>Quatrième atout</legend>
                            <div class="form__row">
                                <div class="form__col">
                                    <label for="quatrieme_atout_titre" class="form__label">Titre</label>
                                    <input type="text" name="quatrieme_atout_titre" id="quatrieme_atout_titre" class="input__form" placeholder="Titre du quatrieme atout">
                                </div>
                                <div class="form__col">
                                    <label for="quatrieme_atout_image" class="form__label">Image</label>
                                    <input type="file" id="quatrieme_atout_image" name="quatrieme_atout_image" accept="image/*" class="input__form">
                                </div>
                            </div>
                            <div class="form__group">
                                <label for="quatrieme_atout_description" class="form__label">Description</label>
                                <textarea name="quatrieme_atout_description" id="quatrieme_atout_description" class="input__form" rows="5" placeholder="Brève description de l'atout"></textarea>
                            </div>
                            <div class="form__button button2">
                                <button type="submit" class="button__green">Valider les informations</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div id="tab4-content" class="tab-content">
                    <fieldset class="atout logo-fieldset">
                        <legend>Logo</legend>
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form__row form-logo">
                                <figure class="logo-container form__col">
                                    <img src="" alt="Logo">
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
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form__row form-logo">
                                <figure class="logo-container form__col">
                                    <img src="" alt="Banniere">
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
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form__row">
                                <div class="form__col">
                                    <label for="domaine_prior1" class="form__label">Domaine prioritaire 1</label>
                                    <figure class="logo-container">
                                        <img src="" alt="Domaines">
                                    </figure>
                                    <div>
                                        <input type="file" id="domaine_prior1" name="domaine_prior1" accept="image/*" class="input__form">
                                    </div>
                                </div>

                                <div class="form__col">
                                    <label for="domaine_prior2" class="form__label">Domaine prioritaire 2</label>
                                    <figure class="logo-container">
                                        <img src="" alt="Domaines">
                                    </figure>
                                    <div>
                                        <input type="file" id="domaine_prior2" name="domaine_prior2" accept="image/*" class="input__form">
                                    </div>
                                </div>

                                <div class="form__col">
                                    <label for="domaine_prior3" class="form__label">Domaine prioritaire 3</label>
                                    <figure class="logo-container">
                                        <img src="" alt="Domaines">
                                    </figure>
                                    <div>
                                        <input type="file" id="domaine_prior3" name="domaine_prior3" accept="image/*" class="input__form">
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
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form__row">
                                <div class="form__col">
                                    <label for="presentation1" class="form__label">Image 1</label>
                                    <figure class="logo-container">
                                        <img src="" alt="Domaines">
                                    </figure>
                                    <div>
                                        <input type="file" id="presentation1" name="presentation1" accept="image/*" class="input__form">
                                    </div>
                                </div>

                                <div class="form__col">
                                    <label for="presentation2" class="form__label">Image 2</label>
                                    <figure class="logo-container">
                                        <img src="" alt="Domaines">
                                    </figure>
                                    <div>
                                        <input type="file" id="presentation2" name="presentation2" accept="image/*" class="input__form">
                                    </div>
                                </div>

                                <div class="form__col">
                                    <label for="presentation3" class="form__label">Image 3</label>
                                    <figure class="logo-container">
                                        <img src="" alt="Domaines">
                                    </figure>
                                    <div>
                                        <input type="file" id="presentation3" name="presentation3" accept="image/*" class="input__form">
                                    </div>
                                </div>
                                <div class="form__col">
                                    <label for="presentation4" class="form__label">Image 4</label>
                                    <figure class="logo-container">
                                        <img src="" alt="Domaines">
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
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form__group">
                                <label for="partner" class="form__label">Partenaires</label>
                                <input type="file" name="partner[]" id="partner" class="input__form" multiple>
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
    </script>
    <script src="{{ asset('assets/scripts/auths/annuaires/plaquettes/purify.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/auths/annuaires/plaquettes/show.js') }}"></script>
@endpush
