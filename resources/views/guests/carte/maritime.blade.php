@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/regions.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Région Maritime</li>
        </ol>
    </section>

    <section class="section-container regions-section">
        <h1>Région Maritime</h1>
        <div class="communes-container">
            @foreach ($communes as $key => $commune)
                <details class="communes-content" open>
                    <summary>Préfecture de {{ $key }}</summary>
                    <div class="communes-content-list">
                        @foreach ($commune as $item)
                            <a href="{{ $item === 'Golfe 1' ? 'https://maps.app.goo.gl/TCZBThkzhyurhBNKA' : '#' }}" target="{{ $item === 'Golfe 1' ? '_blank' : '' }}"  class="communes-item">
                                <h3 class="communes-item-title">{{ $item }}</h3>
                            </a>
                        @endforeach
                    </div>
                </details>
                <hr>
            @endforeach
        </div>
    </section>
@endsection

@push('extra-scripts')

    <script src="{{ asset('assets/scripts/guests/statut.js') }}"></script>
@endpush
