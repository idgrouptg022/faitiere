@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/statut.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Statuts & Réglements</li>
        </ol>
    </section>

    <section class="section-container statut-section">
        <h1>Statuts de la FCT</h1>
        <div class="statut-container">
            <div class="statut-text-container">
                <p>
                    La politique de décentralisation au Togo a enregistrè de grands progrès entre 2016 et 2020, notamment au plan législatif
                    et réglementaire qui on conduit à la tenue d'élections coomunales le 30 Juin et le 15 août 2019.
                </p>
            </div>
            <div class="pdf-container">
                <div class="top-bar">
                    <button class="btn" id="prev_page">
                        <i class="fas fa-arrow-left"></i> Prev Page
                    </button>
                    <button class="btn" id="next_page">
                        Next page
                        <i class="fas fa-arrow-right"></i>
                    </button>
                    <span class="page-info">
                        Page <span id="page_num"></span> of <div id="page_count"></div>
                    </span>
                </div>
                <canvas id="pdf-renderer"></canvas>
            </div>
        </div>
    </section>

    <section class="section-container reglement-section">
        <h1>Réglements de la FCT</h1>
        <div class="reglement-container">
            <div class="reglement-text-container">
                <p>
                    La politique de décentralisation au Togo a enregistrè de grands progrès entre 2016 et 2020, notamment au plan législatif
                    et réglementaire qui on conduit à la tenue d'élections coomunales le 30 Juin et le 15 août 2019.
                </p>
            </div>
            <canvas id="the-canvas" style="width: 100%; height: 100%;" class="reglement-pdf-container"></canvas>
        </div>
    </section>
@endsection

@push('extra-scripts')
    <script type="module" src="https://mozilla.github.io/pdf.js/build/pdf.mjs"></script>
    {{-- <script src="{{ asset('assets/scripts/guests/pdf.js') }}"></script> --}}
    <script type="module" src="{{ asset('assets/scripts/guests/statut.js') }}"></script>
@endpush
