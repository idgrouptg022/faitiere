@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/actualites/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/actuvideos.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Actu - Videos</li>
        </ol>
    </section>

    <section class="section-container actualites-section">
        {{-- <h1>Actu-videos</h1> --}}

        <div class="actu-videos">
            @foreach ($actu_videos as $actu_video)
                <div class="actu-videos-item">
                    <div class="actu-videos-video">
                        <iframe src="https://www.youtube.com/embed/{{ $actu_video->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="actu-videos-content">
                        <h3 class="actu-videos-title">
                            {{ $actu_video->title }}
                        </h3>
                        <div class="actu-videos-published-at">
                            <span>Publié le {{ \Carbon\Carbon::parse($actu_video->created_at)->format("d/m/Y") }}</span>
                        </div>

                        {{-- <div class="actu-videos-read-more">
                            <a href="#" class="actu-videos-read-more-btn">Lire la vidéo <i class="fas fa-arrow-right"></i></a>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@push('extra-scripts')

@endpush
