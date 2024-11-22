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
            <div class="informations-text-container">
                <p>
                    La politique de décentralisation au Togo a enregistrè de grands progrès entre 2016 et 2020, notamment au plan législatif
                    et réglementaire qui on conduit à la tenue d'élections coomunales le 30 Juin et le 15 août 2019.
                </p>
            </div>
            <canvas id="the-canvas" style="width: 100%; height: 100%;" class="informations-pdf-container"></canvas>
        </div>
    </section>
@endsection

@push('extra-scripts')

    <script src="{{ asset('assets/scripts/guests/statut.js') }}"></script>
@endpush
