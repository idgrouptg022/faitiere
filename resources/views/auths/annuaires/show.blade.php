@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/annuaires/show.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Annuaires - Communes</h1>

    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('auth:annuaires:communes') }}">Annuaires-communes</a></li>
            <li class="breadcrumb-item">Details</li>
        </ol>
    </div>

    <div class="container">
        <div class="page-content">@include('includes.auths.flash')</div>

        <div class="form-container">
            <form action="{{ route('auth:annuaires:update', $commune) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                <div class="form__row">
                    <div class="form__col">
                        <label for="" class="form__label">Nom</label>
                        <input type="text" id="" value="{{ $commune->name }}" disabled class="input__form pres">
                    </div>
                    <div class="form__col">
                        <label for="presentation" class="form__label">Fichier de présentation</label>
                        <input type="file" id="presentation" name="presentation" accept=".pdf" class="input__form">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="contact">Contact</label>
                        <input type="url" name="contact" id="contact" class="input__form" value="{{ $communeLink->contact ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="localisation">Localisation</label>
                        <input type="url" name="localisation" id="localisation" class="input__form" value="{{ $communeLink->localisation ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="administratif">Etat civil</label>
                        <input type="url" name="administratif" id="administratif" class="input__form" value="{{ $communeLink->administratif ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="bureau_citoyen">Bureau du citoyen</label>
                        <input type="url" name="bureau_citoyen" id="bureau_citoyen" class="input__form" value="{{ $communeLink->bureau_citoyen ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="taxe">Les taxes</label>
                        <input type="url" name="taxe" id="taxe" class="input__form" value="{{ $communeLink->taxe ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="be_partner">Devenir partenaire</label>
                        <input type="url" name="be_partner" id="be_partner" class="input__form" value="{{ $communeLink->be_partner ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="give_project">Proposer un projet</label>
                        <input type="url" name="give_project" id="give_project" class="input__form" value="{{ $communeLink->give_project ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="public_markets">Marchés publics</label>
                        <input type="url" name="public_markets" id="public_markets" class="input__form" value="{{ $communeLink->public_markets ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="lien_siteweb">Site web</label>
                        <input type="url" name="lien_siteweb" id="lien_siteweb" class="input__form" value="{{ $communeLink->lien_siteweb ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="tourisme">Tourisme</label>
                        <input type="url" name="tourisme" id="tourisme" class="input__form" value="{{ $communeLink->tourisme ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="business">Opportunités d'affaires</label>
                        <input type="url" name="business" id="business" class="input__form" value="{{ $communeLink->business ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="jumelage">Jumelages</label>
                        <input type="url" name="jumelage" id="jumelage" class="input__form" value="{{ $communeLink->jumelage ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="district">Les cantons et quartiers</label>
                        <input type="url" name="district" id="district" class="input__form" value="{{ $communeLink->district ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="social">Actions sociales</label>
                        <input type="url" name="social" id="social" class="input__form" value="{{ $communeLink->social ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="urbanisme">Urbanisme</label>
                        <input type="url" name="urbanisme" id="urbanisme" class="input__form" value="{{ $communeLink->urbanisme ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="environnement">Environnement</label>
                        <input type="url" name="environnement" id="environnement" class="input__form" value="{{ $communeLink->environnement ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="education">Education</label>
                        <input type="url" name="education" id="education" class="input__form" value="{{ $communeLink->education ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="culture">Culture</label>
                        <input type="url" name="culture" id="culture" class="input__form" value="{{ $communeLink->culture ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="sante">Santé</label>
                        <input type="url" name="sante" id="sante" class="input__form" value="{{ $communeLink->sante ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                    <div class="form__col">
                        <label class="form__label" for="securite">Sécurité</label>
                        <input type="url" name="securite" id="securite" class="input__form" value="{{ $communeLink->securite ?? '' }}" placeholder="https://mairie.tg/......">
                    </div>
                </div>
                <div class="form__button">
                    <button type="submit" class="button__green">Valider la modification</button>
                </div>
            </form>
            <div class="presentation-file-container">
                @if ($communeLink != null && $communeLink->presentation != null)
                    <span id="quotationDoc" hidden data-url="{{ asset('storage/' . $communeLink->presentation) }}"></span>
                @endif
                <div class="pdf-container">
                    <div class="top-bar">
                        <button class="btn" id="prev_page">
                            <i class="fas fa-arrow-left"></i> Page prec.
                        </button>
                        <button class="btn" id="next_page">
                            Page suiv.
                            <i class="fas fa-arrow-right"></i>
                        </button>
                        <span class="page-info">
                                <span id="page_num"></span>  <div id="page_count"></div>
                        </span>
                    </div>
                    <canvas id="pdf-renderer"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('extra-scripts')
    <script type="module" src="https://mozilla.github.io/pdf.js/build/pdf.mjs"></script>
    <script type="module" src="{{ asset('assets/scripts/auths/pdf.js') }}"></script>
@endpush
