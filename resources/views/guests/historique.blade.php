@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/historique.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Historique</li>
        </ol>
    </section>

    <section class="section-container historic-text">
        {!! $quotation->body ?? "" !!}

        @if ($quotationFile)
            <div class="plaidoyer-download">
                <a href="{{ route('guests:downloadFile', $quotation) }}" class="plaidoyer-download-btn"><i class="fas fa-download"></i> Télécharger le PDF</a>
            </div>
        @endif
    </section>
@endsection

@push('extra-scripts')

@endpush
