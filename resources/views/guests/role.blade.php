@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/role.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Rôle et Mission</li>
        </ol>
    </section>

    <section class="section-container role-text">
        <p>
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
            Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission. Ici sera renseigné le texte du rôle et de la mission.
        </p>
    </section>
@endsection

@push('extra-scripts')

@endpush
