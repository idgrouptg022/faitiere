@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/partenaires.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Partenaires</li>
        </ol>
    </section>

    <section class="section-container">
        <div class="partners">
            <figure class="partner-item">
                <img src="{{ asset('assets/images/partners/2.png') }}" alt="Logo du partenaire" loading="lazy">
            </figure>
            <figure class="partner-item">
                <img src="{{ asset('assets/images/partners/1.png') }}" alt="Logo du partenaire" loading="lazy">
            </figure>
            <figure class="partner-item">
                <img src="{{ asset('assets/images/partners/13.png') }}" alt="Logo du partenaire" loading="lazy">
            </figure>
            <figure class="partner-item">
                <img src="{{ asset('assets/images/partners/3.png') }}" alt="Logo du partenaire" loading="lazy">
            </figure>
            <figure class="partner-item">
                <img src="{{ asset('assets/images/partners/4.webp') }}" alt="Logo du partenaire" loading="lazy">
            </figure>
            <figure class="partner-item">
                <img src="{{ asset('assets/images/partners/5.jpg') }}" alt="Logo du partenaire" loading="lazy">
            </figure>
            <figure class="partner-item">
                <img src="{{ asset('assets/images/partners/6.png') }}" alt="Logo du partenaire" loading="lazy">
            </figure>
            <figure class="partner-item">
                <img src="{{ asset('assets/images/partners/7.jpg') }}" alt="Logo du partenaire" loading="lazy">
            </figure>
        </div>
    </section>
@endsection

@push('extra-scripts')

@endpush
