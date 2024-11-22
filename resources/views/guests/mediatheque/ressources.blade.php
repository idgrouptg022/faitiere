@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/mediatheque/ressources.css') }}">
    <script src="{{ asset('assets/scripts/guests/pdf.js') }}"></script>
    <script src="{{ asset('assets/scripts/guests/mpdf.js') }}"></script>
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">mediatheque</li>
            <li class="breadcrumb-item active">CNR</li>
        </ol>
    </section>

    <section class="section-container ressources-section">
        <h1>Centre National de ressources FCT</h1>
        <div class="ressources-container">
            @for ($i = 0; $i < 7; $i++)
                <div class="ressources-item">
                    <h2 class="ressources-title">Titre de la ressource</h2>
                    <div class="ressources-download">
                        <a href="#" class="ressources-download-btn"><i class="fas fa-download"></i> Télécharger le PDF</a>
                    </div>
                </div>
            @endfor
        </div>
    </section>
@endsection

@push('extra-scripts')
    <script src="{{ asset('assets/scripts/guests/statut.js') }}"></script>
@endpush
