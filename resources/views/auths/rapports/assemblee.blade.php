@extends('layouts.admin')

@push('extra-styles')
<link rel="stylesheet" href="{{ asset('assets/styles/auths/rapports/assemblee.css') }}">
@endpush

@section('content')
<h1 class="page-title">Rapports AG</h1>

<div class="container">
    @include('includes.auths.flash')
    <div class="pager-subheader">
        <a href="#!" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addRapport"><i class="fas fa-plus-circle"></i> Ajouter un rapport</a>
    </div>
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
                @forelse ($rapports as $rapport)
                <tr>
                    <td>{{ $i }}</td>
                    <td>
                        <span>{{ \Carbon\Carbon::parse($rapport->created_at)->format('d-m-Y') }}</span>
                    </td>
                    <td>{{ \Illuminate\Support\Str::substr($rapport->title, 0, 50) . "..." }}</td>
                    <td>
                        <a href="#" onclick="modalOpener(this)" data-target="#editRapport{{ $rapport->id }}" class="edit-new">Editer</a>
                        <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cet rapport ?') ? document.getElementById('deleteEvent{{ $rapport->id }}').submit() : ''" class="destroy-new"><i class="fas fa-trash-alt"></i></a>
                        <form action="{{ route('auth:rapports-ag:destroy', $rapport) }}" method="POST" id="deleteEvent{{ $rapport->id }}">
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
    
    @foreach($rapports as $rapport)
    <div class="modal__container" id="editRapport{{ $rapport->id }}">
        <div class="modal">
            <div class="modal__body">
                <form action="{{ route('auth:rapports-ag:update', $rapport) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="form__group">
                        <label for="title" class="form__label">Titre</label>
                        <textarea name="title" id="title" rows="3" placeholder="Titre du rapport" class="input__form">{!! $rapport->title !!}</textarea>
                    </div>
                    <div class="form__group">
                        <label for="" class="form__label">Modifier le rapport</label>
                        <label for="" class="input__file__container">
                            <i class="fa fa-image"></i>
                            <input type="file" name="filepath" id="" class="input__file" onchange="uploadFile(this)">
                            <span class="file__name">Choisir un fichier</span>
                        </label>
                    </div>
                    <input type="hidden" name="type" value="assemblee-generale">
                    <div class="form__button">
                        <button type="submit" class="button__green">Enregistrer le rapport</button>
                        <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <div class="modal__container" id="addRapport">
        <div class="modal">
            <div class="modal__body">
                <form action="{{ route('auth:rapports-ag:store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form__group">
                        <label for="title" class="form__label">Titre</label>
                        <textarea name="title" id="title" rows="3" placeholder="Titre du rapport" class="input__form"></textarea>
                    </div>
                    <div class="form__group">
                        <label for="" class="form__label">Ajouter un rapport</label>
                        <label for="" class="input__file__container">
                            <i class="fa fa-image"></i>
                            <input type="file" name="filepath" id="" class="input__file" onchange="uploadFile(this)">
                            <span class="file__name">Choisir un fichier</span>
                        </label>
                    </div>
                    <input type="hidden" name="type" value="assemblee-generale">
                    <div class="form__button">
                        <button type="submit" class="button__green">Enregistrer le rapport</button>
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
