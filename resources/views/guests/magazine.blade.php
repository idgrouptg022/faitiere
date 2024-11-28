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
            <li class="breadcrumb-item active">FCT Mag</li>
        </ol>
    </section>

    <section class="section-container plaidoyers-section">
        <h1>FCT Mag</h1>
        <div class="plaidoyers-container">
            @foreach ($magazines as $magazine)
                <div class="plaidoyers-item">
                    <h2 class="plaidoyers-title">{{ $magazine->title }}</h2>
                    <div class="plaidoyer-download">
                        <a href="{{ route('guests:magazine-download', $magazine) }}" class="plaidoyer-download-btn"><i class="fas fa-download"></i> Télécharger le PDF</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@push('extra-scripts')
    <script src="{{ asset('assets/scripts/guests/statut.js') }}"></script>
@endpush
