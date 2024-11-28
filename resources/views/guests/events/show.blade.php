@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/events/show.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('guests:events:index', $eventTypeValue) }}">Ev. {{ $eventTypeValue == 'national' ? "Nationaux" : "Internationaux" }}</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </section>

    <section class="section-container events-section">
        <div class="events-container">
            <div class="current-event-container">
                <figure class="current-event-image">
                    <img src="{{ asset('storage/'. $event->image) }}" alt="Image d'evenement">
                </figure>
                <div class="current-events-content">
                    <h1 class="current-event-title">{{ $event->title }}</h1>
                    <div class="current-event-area">{{ $event->event_area }}</div>
                    <div class="current-event-info">
                        <p class="current-event-date"><i class="fas fa-calendar-check"></i> {{ \Carbon\Carbon::parse($event->event_date)->locale('fr')->isoFormat('LL') }}</p>
                    </div>
                    <div class="current-event-body">
                        {!! $event->description !!}
                    </div>
                </div>
            </div>
            <div class="events-list">
                @forelse ($events as $event)
                    <div class="events-item">
                        <figure class="events-image">
                            <img src="{{ asset('storage/' . $event->image) }}" alt="Image d'event">
                        </figure>
                        <div class="events-content">
                            <div class="events-sub-header">
                                <span class="events-published-at">{{ \Carbon\Carbon::parse($event->created_at)->locale("fr")->isoFormat("ll") }}</span>
                            </div>
                            <h2 class="events-title">{{ $event->title }}</h2>
                            <div class="events-read">
                                <a href="{{ route('guests:events:show', [$eventTypeValue, $event]) }}" class="events-read-btn">Lire plus</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="other-none-event">Aucune autre actualité pour le moment.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('extra-scripts')

@endpush
