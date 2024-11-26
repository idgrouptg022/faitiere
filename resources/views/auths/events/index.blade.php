@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/events/index.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Evènements</h1>

    <div class="container">
        <div class="pager-subheader">
            <a href="{{ route('auth:evenements:create') }}" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addActuVideo"><i class="fas fa-plus-circle"></i> Ajouter un évènement</a>
        </div>

        <div class="page-content">
            @include('includes.auths.flash')

            <div class="table-container">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Titre</th>
                            <th>Domaine</th>
                            <th>Zone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @forelse ($events as $event)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    <span>{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</span>
                                </td>
                                <td>{{ \Illuminate\Support\Str::substr($event->title, 0, 50) . "..." }}</td>
                                <td>{{ $event->domaine }}</td>
                                <td>{{ $event->event_area }}</td>
                                <td>
                                    <a href="{{ route('auth:evenements:show', $event) }}" class="edit-new">Editer</a>
                                    <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cet événement ?') ? document.getElementById('deleteEvent{{ $event->id }}').submit() : ''" class="destroy-new"><i class="fas fa-trash-alt"></i></a>
                                    <form action="{{ route('auth:evenements:destroy', $event) }}" method="POST" id="deleteEvent{{ $event->id }}">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>
                            </tr>

                            @php
                                $i++;
                            @endphp
                        @empty
                            <tr style="text-align: center;">
                                <td colspan="6">Aucun enregistrement</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('extra-scripts')

@endpush

