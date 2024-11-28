@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/events/index.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Evénements</li>
            <li class="breadcrumb-item active">{{ $eventTypeValue == 'national' ? "Nationaux" : "Internationaux" }}</li>
        </ol>
    </section>

    <section class="section-container events-section">
        <h1>Evénements {{ $eventTypeValue == 'national' ? "nationaux" : "internationaux" }}</h1>

        <div class="events-container">
            @foreach ($events as $event)
                <div class="events-item">
                    <figure class="events-image animated-bg">
                        <img src="{{ asset('storage/' . $event->image) }}" alt="Image d'événement" loading="lazy">
                    </figure>
                    <div class="events-content">
                        <div class="events-date">
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->locale("fr")->isoFormat("ll") }}</span>
                        </div>
                        <div class="events-category">{{ $event->domaine }}</div>
                        <a href="{{ route('guests:events:show', [$eventTypeValue, $event]) }}" class="events-title"><h3>{{ $event->title }}</h3></a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@push('extra-scripts')

@endpush
