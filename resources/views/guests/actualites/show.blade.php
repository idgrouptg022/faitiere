@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/actualites/show.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('guests:actualites:index') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Actualités</li>
        </ol>
    </section>

    <section class="section-container actualites-section">

        <div class="actualites-container">
            <div class="current-actualite-container">
                <figure class="current-actualite-image">
                    <img src="{{ asset('storage/'. $actualite->image) }}" alt="Image d'actualité">
                </figure>
                <div class="current-actualites-content">
                    <h1 class="current-actualite-title">{{ $actualite->title }}</h1>
                    <div class="current-actualite-category">{{ $actualite->commune->name }}</div>
                    <div class="current-actualite-info">
                        <p class="current-actualite-date">{{ \Carbon\Carbon::parse($actualite->created_at)->locale('fr')->isoFormat('ll') }}</p>
                    </div>
                    <div class="current-actualite-body">
                        {!! $actualite->description !!}
                    </div>
                </div>
            </div>
            <div class="actualites-list">
                @forelse ($actualites as $actualite)
                    <div class="actu-communes-item">
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
                @empty
                    <p class="other-none-actualite">Aucune autre actualité pour le moment.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('extra-scripts')

@endpush
