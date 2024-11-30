@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/rapports/ressources.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Annuaires - Communes</h1>

    <div class="container">
         @include('includes.auths.flash')

        <div class="page-content">


            <div class="table-container">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom de la commune</th>
                            <th>Préfecture d'appartenance</th>
                            <th>Région</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp

                        @forelse ($communes as $commune)
                            <tr>
                                <td>{{ $i }}</td>

                                <td>{{ $commune->name }}</td>
                                <td>{{ $commune->prefecture->name }}</td>
                                <td>{{ $commune->prefecture->region->name }}</td>
                                <td>{{ $commune->communeLink->active ?? "" }}</td>
                                <td>
                                    <a href="{{ route('auth:annuaires:show', $commune) }}" class="edit-new">Editer</a>
                                    {{-- <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cet événement ?') ? document.getElementById('deleteEvent{{ $commune->id }}').submit() : ''" class="destroy-new"><i class="fas fa-trash-alt"></i></a>
                                    <form action="{{ route('auth:communes:destroy', $commune) }}" method="POST" id="deleteEvent{{ $commune->id }}">
                                        @csrf
                                        @method("DELETE")
                                    </form> --}}
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
    <script>
        const modalOpener = (element) => {
            const targetSelector = element.dataset.target;
            const modal = document.querySelector(targetSelector);
            modal.style.display = "flex";
        };


    </script>
@endpush

