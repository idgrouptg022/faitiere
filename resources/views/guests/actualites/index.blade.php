@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/actualites/index.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Actualités</li>
        </ol>
    </section>

    <section class="section-container actualites-section">
        <h1>Actualites</h1>

        <div class="actualites-container">
            @foreach ($actualites as $actualite)
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
            @endforeach
        </div>
    </section>
@endsection

@push('extra-scripts')

@endpush
