@extends('layouts.admin')

@push('extra-styles')
<link rel="stylesheet" href="{{ asset('assets/styles/auths/events/index.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('assets/styles/auths/sidebar.css') }}"> -->
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
                            <!-- <a href="{{ route('auth:evenements:show', $event) }}" class="tooltip">
                                <svg class="w-[50px] h-[50px] fill-[#8e8e8e]" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path>
                                </svg>
                            </a> -->
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