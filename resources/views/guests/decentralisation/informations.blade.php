@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/decentralisation/informations.css') }}">
    <script src="{{ asset('assets/scripts/guests/pdf.js') }}"></script>
    <script src="{{ asset('assets/scripts/guests/mpdf.js') }}"></script>
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Decentralisation</li>
            <li class="breadcrumb-item active">Informations</li>
        </ol>
    </section>

    <section class="section-container informations-section">
        <h1>Informations de la FCT</h1>
        <div class="informations-container">
            {!! $quotation->body ?? "" !!}

            @if ($quotationFile)
                <div class="plaidoyer-download">
                    <a href="{{ route('guests:downloadFile', $quotation) }}" class="plaidoyer-download-btn"><i class="fas fa-download"></i> Télécharger le PDF</a>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('extra-scripts')

    <script src="{{ asset('assets/scripts/guests/statut.js') }}"></script>
@endpush
