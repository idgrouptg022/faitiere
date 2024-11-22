@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/projets/plaidoyers.css') }}">
    <script src="{{ asset('assets/scripts/guests/pdf.js') }}"></script>
    <script src="{{ asset('assets/scripts/guests/mpdf.js') }}"></script>
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Projets</li>
            <li class="breadcrumb-item active">Réalisés</li>
        </ol>
    </section>

    <section class="section-container plaidoyers-section">
        <h1>Projets réalisés de la FCT</h1>
        <div class="plaidoyers-container">
            @for ($i = 0; $i < 7; $i++)
                <div class="plaidoyers-item">
                    <h2 class="plaidoyers-title">Titre du projet</h2>
                    <div class="plaidoyer-download">
                        <a href="#" class="plaidoyer-download-btn"><i class="fas fa-download"></i> Télécharger le PDF</a>
                    </div>
                </div>
            @endfor
        </div>
    </section>
@endsection

@push('extra-scripts')
    <script src="{{ asset('assets/scripts/guests/statut.js') }}"></script>
@endpush
