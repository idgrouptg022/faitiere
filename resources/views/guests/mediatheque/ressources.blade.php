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
            @forelse ($rapports as $rapport)
            <div class="ressources-item">
                <h2 class="ressources-title">{!! $rapport->title !!}</h2>
                <div class="ressources-download">
                    <a href="{{ route('guests:projets:downloadFile', $rapport) }}" class="ressources-download-btn"><i class="fas fa-download"></i> Télécharger le PDF</a>
                </div>
            </div>


        @empty
        <div>Aucun rapport !!!</div>

        @endforelse
        </div>
    </section>
@endsection

@push('extra-scripts')
    <script src="{{ asset('assets/scripts/guests/statut.js') }}"></script>
@endpush
