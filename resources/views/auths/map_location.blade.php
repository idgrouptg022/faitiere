@extends('layouts.admin')

@push('extra-styles')
<link rel="stylesheet" href="{{ asset('assets/styles/auths/map_location.css') }}">
@endpush

@section('content')
<h1 class="page-title">Localisation des mairies</h1>

<div class="container">
    @include('includes.auths.flash')
    <div class="pager-subheader">
        <a href="#!" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addMagazine"><i class="fas fa-plus-circle"></i>Ajouter une localisation</a>
    </div>
    <div class="table-container">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prefecture</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @forelse ($map_locations as $map_location)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>
                            <span>{{ $map_location->commune->name }}</span>
                        </td>
                        <td>{{ $map_location->commune->prefecture->name }}</td>
                        <td><a href="{{ $map_location->maplink }}" target="_blank">Localiser</a></td>
                        <td>
                            <a href="#" onclick="modalOpener(this)" data-target="#editMap{{ $map_location->id }}" class="edit-new">Editer</a>
                            <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cette localisation ?') ? document.getElementById('deleteEvent{{ $map_location->id }}').submit() : ''" class="destroy-new"><i class="fas fa-trash-alt"></i></a>
                            <form action="{{ route('auth:maploc:destroy', $map_location) }}" method="POST" id="deleteEvent{{ $map_location->id }}">
                                @csrf
                                @method("DELETE")
                            </form>
                        </td>
                    </tr>

                    @php
                        $i++;
                    @endphp

                    <div class="modal__container" id="editMap{{ $map_location->id }}">
                        <div class="modal">
                            <div class="modal__body">
                                <form action="{{ route('auth:maploc:store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form__group">
                                        <label for="commune" class="form__label">Commune</label>
                                        <select name="commune_id" id="commune" class="input__form">
                                            <option disabled>Sélectionner la commune</option>
                                            @foreach ($prefectures as $prefecture)
                                                <optgroup label="{{ $prefecture->name }}">
                                                    @foreach ($prefecture->communes()->get() as $commune)
                                                        <option value="{{ $commune->id }}" {{ $map_location->commune_id == $commune->id ? 'selected' : '' }}>{{ $commune->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form__group">
                                        <label for="maplink" class="form__label">Lien de la localisation Map</label>
                                        <input type="url" name="maplink" id="maplink" class="input__form" value="{{ $map_location->maplink }}" placeholder="https://maps.app.goo.gl/TCZBThkzhyurhBNKA">
                                    </div>
                                    <div class="form__button">
                                        <button type="submit" class="button__green">Enregistrer</button>
                                        <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr style="text-align: center;">
                        <td colspan="5">Aucun enregistrement</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="modal__container" id="addMagazine">
        <div class="modal">
            <div class="modal__body">
                <form action="{{ route('auth:maploc:store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form__group">
                        <label for="commune" class="form__label">Commune</label>
                        <select name="commune_id" id="commune" class="input__form">
                            <option disabled>Sélectionner la commune</option>
                            @foreach ($prefectures as $prefecture)
                                <optgroup label="{{ $prefecture->name }}">
                                    @foreach ($prefecture->communes()->get() as $commune)
                                        <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__group">
                        <label for="maplink" class="form__label">Lien de la localisation Map</label>
                        <input type="url" name="maplink" id="maplink" class="input__form" placeholder="https://maps.app.goo.gl/TCZBThkzhyurhBNKA">
                    </div>
                    <div class="form__button">
                        <button type="submit" class="button__green">Enregistrer</button>
                        <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                    </div>
                </form>
            </div>
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

    const uploadFile = (element) => {
        const fileInput = element;

        const fileContainer = fileInput.parentNode;
        const fileSpan = fileContainer.querySelector('.file__name');


        if (fileInput.files.length >= 1) {
            const fileName = fileInput.files[0].name;
            let fileSize = fileInput.files[0].size;
            fileSize = (fileSize / 1024).toFixed(2) + " ko";

            fileContainer.style.borderColor = "#006ccb";
            fileContainer.style.backgroundColor = "#dfeeff";
            fileSpan.textContent = `${fileName}, ${fileSize}`;
        } else {
            fileContainer.style.borderColor = "#000";
            fileContainer.style.backgroundColor = "#fff";
            fileSpan.textContent = "Choisir un fichier";
        }

    }
</script>
@endpush
