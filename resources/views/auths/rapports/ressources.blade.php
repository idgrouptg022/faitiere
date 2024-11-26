@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/rapports/ressources.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Centre National de Ressources</h1>

    <div class="container">
        @include('includes.auths.flash')
        <div class="pager-subheader">
            <a href="#!" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addBanner"><i class="fas fa-plus-circle"></i> Ajouter une ressource</a>
        </div>



        <div class="modal__container" id="addBanner">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:ressources:store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="title" class="form__label">Titre</label>
                            <textarea name="title" id="title" rows="3" placeholder="Titre de la ressource" class="input__form"></textarea>
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Ressource</label>
                            <label for="" class="input__file__container">
                                <i class="fa fa-image"></i>
                                <input type="file" name="filepath" id="" class="input__file" onchange="uploadFile(this)">
                                <span class="file__name">Choisir un fichier</span>
                            </label>
                        </div>

                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer la ressource</button>
                            <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="page-content">


            <div class="table-container">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Ressource</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp

                        @forelse ($ressources as $ressource)
                            <tr>
                                <td>{{ $i }}</td>

                                <td>{{ \Illuminate\Support\Str::substr($ressource->title, 0, 50) . "..." }}</td>
                                <td>{{ $ressource->filepath }}</td>

                                <td>
                                    <a href="#!" onclick="modalOpener(this)" data-target="#updateBanner{{ $ressource->id }}" class="edit-new">Editer</a>
                                    <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cet événement ?') ? document.getElementById('deleteEvent{{ $ressource->id }}').submit() : ''" class="destroy-new"><i class="fas fa-trash-alt"></i></a>
                                    <form action="{{ route('auth:ressources:destroy', $ressource) }}" method="POST" id="deleteEvent{{ $ressource->id }}">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>

                            </tr>
                            <div class="modal__container" id="updateBanner{{ $ressource->id }}">
                                <div class="modal">
                                    <div class="modal__body">
                                        <form action="{{ route('auth:ressources:update', $ressource) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("PATCH")

                                            <div class="form__group">
                                                <label for="title" class="form__label">Titre</label>
                                                <textarea name="title" id="title" rows="3" placeholder="Titre de la ressource" class="input__form">{!! $ressource->title !!}</textarea>
                                            </div>
                                            <div class="form__group">
                                                <label for="" class="form__label">Ressource</label>
                                                <label for="" class="input__file__container">
                                                    <i class="fa fa-image"></i>
                                                    <input type="file" name="filepath" id="" class="input__file" onchange="uploadFile(this)">
                                                    <span class="file__name">Choisir un fichier</span>
                                                </label>
                                            </div>

                                            <div class="form__button">
                                                <button type="submit" class="button__green">Enregistrer la modification de ressource</button>
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
                fileSpan.textContent = `${fileName}, ${fileSize}` ;
            } else {
                fileContainer.style.borderColor = "#000";
                fileContainer.style.backgroundColor = "#fff";
                fileSpan.textContent = "Choisir une image" ;
            }

        }
    </script>
@endpush

