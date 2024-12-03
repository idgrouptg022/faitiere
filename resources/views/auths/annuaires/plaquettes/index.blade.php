@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/annuaires/plaquettes/index.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Annuaires - Communes</h1>
    <div class="container">
        @include('includes.auths.flash')

        <div class="page-content">
            <div class="communes-container">
                @foreach ($prefectures as $prefecture)
                    <details class="communes-content" open>
                        <summary>Préfecture de {{ $prefecture->name }}</summary>
                        <div class="communes-content-list">
                            @foreach ($prefecture->communes()->get() as $commune)
                                <a href="{{ route('auth:annuaires:plaquettes:show', $commune) }}" class="communes-item">
                                    <h3 class="communes-item-title">{{ $commune->name }}</h3>
                                </a>
                            @endforeach
                        </div>
                    </details>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('extra-scripts')

@endpush
