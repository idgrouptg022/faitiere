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
            <li class="breadcrumb-item active">En cours</li>
        </ol>
    </section>

    <section class="section-container plaidoyers-section">
        <h1>Projets en cours de la FCT</h1>
        <div class="plaidoyers-container">
            @forelse ($projects as $project)
                <div class="plaidoyers-item">
                    <h2 class="plaidoyers-title">{!! $project->title !!}</h2>
                    <div class="plaidoyer-download">
                        <a href="{{ route('guests:projets:downloadFile', $project) }}" class="plaidoyer-download-btn"><i class="fas fa-download"></i> Télécharger le PDF</a>
                    </div>
                </div>

            @empty
            <div>Aucun projet !!!</div>

            @endforelse
        </div>
    </section>
@endsection

@push('extra-scripts')
    <script src="{{ asset('assets/scripts/guests/statut.js') }}"></script>
@endpush
