@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/president-word.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Mot de la présidente</li>
        </ol>
    </section>

    <section class="section-container word-text">
        <div class="presidentWordContainer">
            <figure class="president-image">
                <img src="{{ asset('storage/' . $content->image) }}" alt="">
            </figure>
            <div class="president-text">
                {!! $content->body !!}
            </div>
        </div>
    </section>
@endsection

@push('extra-scripts')

@endpush
