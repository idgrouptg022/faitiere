@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/regions.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">{{ $region->name }}</li>
        </ol>
    </section>

    @php
        $localisationCommune = new \App\Utils\LocalisationCommune();
    @endphp

    <section class="section-container regions-section">
        <h1>{{ $region->name }}</h1>
        <div class="communes-container">
            @foreach ($prefectures as $prefecture)
                <details class="communes-content" open>
                    <summary>Préfecture de {{ $prefecture->name }}</summary>
                    <div class="communes-content-list">
                        @foreach ($prefecture->communes()->get() as $commune)
                            <a href="{{ $localisationCommune::getMapLink($commune) ?? '#' }}" class="communes-item" target="_blank">
                                <h3 class="communes-item-title">{{ $commune->name }}</h3>
                            </a>
                        @endforeach
                    </div>
                </details>
                <hr>
            @endforeach
        </div>
    </section>
@endsection

@push('extra-scripts')

    <script src="{{ asset('assets/scripts/guests/statut.js') }}"></script>
@endpush
