@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/partners.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Partenaires</h1>

    <div class="container">
        <div class="pager-subheader">
            <a href="#!" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addPartner"><i class="fas fa-plus-circle"></i> Ajouter un partenaire</a>
        </div>

        <div class="page-content">
            @include('includes.auths.flash')
            <div class="partners">
                @foreach ($partners as $partner)
                    <figure class="partner-item">
                        <img src="{{ asset('storage/' . $partner->image) }}" alt="">
                        <figcaption>
                            <div class="partner-actions">
                                <a href="#" onclick="modalOpener(this)" data-target="#editPartner{{ $partner->id }}">Editer</a>
                                <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer ce partenaire ?') ? document.getElementById('deletePartner{{ $partner->id }}').submit() : ''">Supprimer</a>
                                <form action="{{ route('auth:partner:destroy', $partner) }}" method="POST" id="deletePartner{{ $partner->id }}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </div>
                        </figcaption>
                    </figure>

                    <div class="modal__container" id="editPartner{{ $partner->id }}">
                        <div class="modal">
                            <div class="modal__body">
                                <form action="{{ route('auth:partner:update', $partner) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("PATCH")
                                    <div class="form__group">
                                        <label for="" class="form__label">Image de la bannière</label>
                                        <label for="" class="input__file__container">
                                            <i class="fa fa-image"></i>
                                            <input type="file" name="image" id="" class="input__file" onchange="uploadFile(this)" accept="image/*">
                                            <span class="file__name">Choisir une image</span>
                                        </label>
                                    </div>
                                    <div class="form__group">
                                        <label for="link" class="form__label">Lien</label>
                                        <input type="url" name="weblink" id="link" placeholder="https://exemple.com..." class="input__form" value="{!! $partner->weblink !!}">
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

        <div class="modal__container" id="addPartner">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:partner:store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="" class="form__label">Logo du partenaire</label>
                            <label for="" class="input__file__container">
                                <i class="fa fa-image"></i>
                                <input type="file" name="image" id="" class="input__file" onchange="uploadFile(this)">
                                <span class="file__name">Choisir une image</span>
                            </label>
                        </div>
                        <div class="form__group">
                            <label for="link" class="form__label">Lien</label>
                            <input type="url" name="weblink" id="link" placeholder="https://exemple.com..." class="input__form">
                        </div>
                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer le partenaire</button>
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
