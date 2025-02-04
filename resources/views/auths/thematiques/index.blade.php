@extends('layouts.admin')

@push('extra-styles')
<link rel="stylesheet" href="{{ asset('assets/styles/auths/actualites/index.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('assets/styles/auths/sidebar.css') }}"> -->
@endpush

@section('content')
<h1 class="page-title">Thématiques</h1>

<div class="container">
    <div class="pager-subheader">
        <a href="{{ route('auth:thematiques:create') }}" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addActuVideo"><i class="fas fa-plus-circle"></i> Ajouter une thématique</a>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @forelse ($thematiques as $thematique)
                    <tr>
                        <td>{{ $i }}</td>
                        <td style="width: 20%;">
                            <span>{{ \Carbon\Carbon::parse($thematique->created_at)->format('d-m-Y') }}</span>
                        </td>
                        <td>{{ \Illuminate\Support\Str::substr($thematique->title, 0, 50) . "..." }}</td>

                        <td>

                            <a href="{{ route('auth:thematiques:show', $thematique)}}" class="edit-new">Editer</a>
                            <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cette thématique ?') ? document.getElementById('deleteEvent{{ $thematique->id }}').submit() : ''" class="destroy-new"><i class="fas fa-trash-alt"></i></a>
                            <form action="{{ route('auth:thematiques:destroy', $thematique) }}" method="POST" id="deleteEvent{{ $thematique->id }}">
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
                        <td colspan="5">Aucun enregistrement</td>
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
