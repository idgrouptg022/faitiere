@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/projets/plaidoyers.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Plaidoyers</h1>

    <div class="container">
        <div class="pager-subheader">
            <a href="#!" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addPlaidoyer"><i class="fas fa-plus-circle"></i> Ajouter un plaidoyer</a>
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
                        @forelse ($projects as $project)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    <span>{{ \Carbon\Carbon::parse($project->created_at)->format('d-m-Y') }}</span>
                                </td>
                                <td>{{ \Illuminate\Support\Str::substr($project->title, 0, 50) . "..." }}</td>
                                <td>
                                    {{-- <a href="" class="edit-new">Lire</a> --}}
                                    <a href="#!"  onclick="modalOpener(this)" data-target="#editPlaidoyer{{ $project->id }}" class="edit-new">Editer</a>
                                    <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer ce plaidoyer ?') ? document.getElementById('deleteProject{{ $project->id }}').submit() : ''" class="destroy-new"><i class="fas fa-trash-alt"></i></a>
                                    <form action="{{ route('auth:projects:destroy', ['plaidoyer', $project]) }}" method="POST" id="deleteProject{{ $project->id }}">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>
                            </tr>

                            <div class="modal__container" id="editPlaidoyer{{ $project->id }}">
                                <div class="modal">
                                    <div class="modal__body">
                                        <form action="{{ route('auth:projects:update', ['plaidoyer', $project]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("PATCH")
                                            <div class="form__group">
                                                <label for="title" class="form__label">Titre</label>
                                                <textarea name="title" id="title" rows="2" placeholder="Titre du plaidoyer" class="input__form">{!! $project->title !!}</textarea>
                                            </div>
                                            <div class="form__group">
                                                <label for="" class="form__label">Fichier</label>
                                                <label for="" class="input__file__container">
                                                    <i class="fa fa-image"></i>
                                                    <input type="file" name="filepath" id="" class="input__file" onchange="uploadFile(this)" accept=".pdf">
                                                    <span class="file__name">Choisir un fichier</span>
                                                </label>
                                            </div>
                                            <div class="form__button">
                                                <button type="submit" class="button__green">Valider la modification</button>
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

        <div class="modal__container" id="addPlaidoyer">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:projects:store', 'plaidoyer') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="title" class="form__label">Titre</label>
                            <textarea name="title" id="title" rows="2" placeholder="Titre du plaidoyer" class="input__form"></textarea>
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Fichier</label>
                            <label for="" class="input__file__container">
                                <i class="fa fa-image"></i>
                                <input type="file" name="filepath" id="" class="input__file" onchange="uploadFile(this)" accept=".pdf">
                                <span class="file__name">Choisir un fichier</span>
                            </label>
                        </div>
                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer le plaidoyer</button>
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
                fileSpan.textContent = `${fileName}, ${fileSize}` ;
            } else {
                fileContainer.style.borderColor = "#000";
                fileContainer.style.backgroundColor = "#fff";
                fileSpan.textContent = "Choisir un fichier" ;
            }

        }
    </script>
@endpush
