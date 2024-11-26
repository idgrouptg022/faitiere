@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/rapports/ressources.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Préfectures</h1>

    <div class="container">
         @include('includes.auths.flash')
        <div class="pager-subheader">
            <a href="#!" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addBanner"><i class="fas fa-plus-circle"></i> Ajouter une Préfecture</a>
        </div>



        <div class="modal__container" id="addBanner">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:prefectures:store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="name" class="form__label">Nom de la préfecture</label>
                            <textarea name="name" id="title" rows="3" placeholder="Nom de la préfecture" class="input__form"></textarea>
                        </div>
                        <div class="from__group">
                        <label for="region" class="form__label">Région de la préfecture</label>
                            <select name="region_id" id="region" class="input__form">
                                <option value="">Sélectionner une région</option>
                                @forelse ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @empty
                                    <option value="">Pas de region !</option>
                                @endforelse
                            </select>

                        </div>

                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer la Préfecture</button>
                            <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>






        <div class="page-conten">


            <div class="table-container">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom de la préfecture</th>
                            <th>Région d'appartenance</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp

                        @forelse ($prefectures as $prefecture)
                            <tr>
                                <td>{{ $i }}</td>

                                <td>{{ \Illuminate\Support\Str::substr($prefecture->name, 0, 50) . "..." }}</td>
                                <td>{{ $prefecture->region->name }}</td>

                                <td>
                                    <a href="#!" onclick="modalOpener(this)" data-target="#updateBanner{{ $prefecture->id }}" class="edit-new">Editer</a>
                                    <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cet événement ?') ? document.getElementById('deleteEvent{{ $prefecture->id }}').submit() : ''" class="destroy-new"><i class="fas fa-trash-alt"></i></a>
                                    <form action="{{ route('auth:prefectures:destroy', $prefecture) }}" method="POST" id="deleteEvent{{ $prefecture->id }}">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>

                            </tr>



                            <div class="modal__container" id="updateBanner{{ $prefecture->id }}">
                                <div class="modal">
                                    <div class="modal__body">
                                        <form action="{{ route('auth:prefectures:update', $prefecture) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("PATCH")

                                            <div class="form__group">
                                                <label for="name" class="form__label">Nom de la préfecture</label>
                                                <textarea name="name" id="title" rows="3" placeholder="Nom de la préfecture" class="input__form">{!! $prefecture->name !!}</textarea>
                                            </div>
                                            <div class="from__group">
                                            <label for="region" class="form__label">Région de la préfecture</label>
                                                <select name="region_id" id="region" class="input__form">

                                                    @forelse ($regions as $region)
                                                        <option value="{{ $region->id }}"
                                                        @if(old('region', $region->id ) == $region->id ) selected @endif
                                                            >{{ $region->name }}</option>
                                                    @empty
                                                        <option value="">Pas de region !</option>
                                                    @endforelse
                                                </select>

                                            </div>

                                            <div class="form__button">
                                                <button type="submit" class="button__green">Enregistrer la modification de la Préfecture</button>
                                                <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            @php
                                $i++;
                            @endphp
                        @empty
                            <tr style="text-align: center;">
                                <td colspan="4">Aucun enregistrement</td>
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

