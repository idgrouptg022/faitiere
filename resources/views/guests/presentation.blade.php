@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/historique.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Presentation</li>
        </ol>
    </section>

    <section class="section-container historic-text">
        {!! $presentation->body ?? "" !!}
    </section>
@endsection

@push('extra-scripts')

@endpush
