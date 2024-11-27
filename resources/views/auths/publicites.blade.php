@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/publicites.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Publicités</h1>

    <div class="container">
        <div class="pager-subheader">
            <a href="#!" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addPublicite"><i class="fas fa-plus-circle"></i> Ajouter une publicité</a>
        </div>

        <div class="page-content">
            @include('includes.auths.flash')
            <div class="partners">
                @foreach ($publicites as $publicite)
                    <figure class="partner-item">
                        <img src="{{ asset('storage/' . $publicite->image) }}" alt="">
                        <figcaption>
                            <div class="partner-actions">
                                <a href="#" onclick="modalOpener(this)" data-target="#editPublicite{{ $publicite->id }}">Editer</a>
                                <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cette publicité ?') ? document.getElementById('deletePublicite{{ $publicite->id }}').submit() : ''">Supprimer</a>
                                <form action="{{ route('auth:publicites:destroy', $publicite) }}" method="POST" id="deletePublicite{{ $publicite->id }}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </div>
                        </figcaption>
                    </figure>

                    <div class="modal__container" id="editPublicite{{ $publicite->id }}">
                        <div class="modal">
                            <div class="modal__body">
                                <form action="{{ route('auth:publicites:update', $publicite) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("PATCH")
                                    <div class="form__group">
                                        <label for="" class="form__label">Image de la publicité</label>
                                        <label for="" class="input__file__container">
                                            <i class="fa fa-image"></i>
                                            <input type="file" name="image" id="" class="input__file" onchange="uploadFile(this)" accept="image/*">
                                            <span class="file__name">Choisir une image</span>
                                        </label>
                                    </div>

                                    <div class="form__button">
                                        <button type="submit" class="button__green">valider la modiication</button>
                                        <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="modal__container" id="addPublicite">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:publicites:store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="" class="form__label">Image de la publicité</label>
                            <label for="" class="input__file__container">
                                <i class="fa fa-image"></i>
                                <input type="file" name="image" id="" class="input__file" onchange="uploadFile(this)">
                                <span class="file__name">Choisir une image</span>
                            </label>
                        </div>

                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer la publicité</button>
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
                fileSpan.textContent = "Choisir une image" ;
            }

        }
    </script>
@endpush
