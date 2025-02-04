@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/actualites/index.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Thématiques</li>
        </ol>
    </section>

    <section class="section-container actualites-section">

        <div class="actualites-container">
            @foreach ($thematiques as $thematique)
                <div class="actu-communes-item">
                    <figure class="actu-communes-image animated-bg">
                        <img src="{{ asset('storage/' . $thematique->image) }}" alt="Image de l'actualité" loading="lazy">
                    </figure>
                    <div class="actu-communes-content">
                        <div class="actu-communes-published-at">
                            <span>Publié le {{ \Carbon\Carbon::parse($thematique->created_at)->format("d/m/Y") }}</span>
                        </div>
                        <h3 class="actu-communes-title">
                            {{ $thematique->title }}
                        </h3>
                        <div class="actu-communes-read-more">
                            <a href="{{ route('guests:thematiques:show', $thematique) }}" class="actu-communes-read-more-btn">Lire plus <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@push('extra-scripts')

@endpush
