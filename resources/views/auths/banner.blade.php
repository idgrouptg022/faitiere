@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/banner.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Bannières</h1>

    <div class="container">
        <div class="pager-subheader">
            <a href="#!" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addBanner"><i class="fas fa-plus-circle"></i> Ajouter une bannière</a>
        </div>

        <div class="page-content">
            @include('includes.auths.flash')
            <div class="banners">
                @foreach ($banners as $banner)
                    <figure class="banner-item">
                        <img src="{{ asset('storage/' . $banner->image) }}" alt="">
                        <figcaption>
                            <h2 class="banner-title">{{  $banner->title }}</h2>
                            <div class="banner-actions">
                                <a href="#" onclick="modalOpener(this)" data-target="#editBanner{{ $banner->id }}">Editer</a>
                                <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cette bannière ?') ? document.getElementById('deleteBanner{{ $banner->id }}').submit() : ''">Supprimer</a>
                                <form action="{{ route('auth:banner:destroy', $banner) }}" method="POST" id="deleteBanner{{ $banner->id }}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </div>
                        </figcaption>
                    </figure>

                    <div class="modal__container" id="editBanner{{ $banner->id }}">
                        <div class="modal">
                            <div class="modal__body">
                                <form action="{{ route('auth:banner:update', $banner) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("PATCH")
                                    <div class="form__group">
                                        <label for="title" class="form__label">Titre</label>
                                        <textarea name="title" id="title" rows="3" placeholder="Titre de la bannière" class="input__form">{!! $banner->title !!}</textarea>
                                    </div>
                                    <div class="form__group">
                                        <label for="" class="form__label">Image de la bannière</label>
                                        <label for="" class="input__file__container">
                                            <i class="fa fa-image"></i>
                                            <input type="file" name="image" id="" class="input__file" onchange="uploadFile(this)">
                                            <span class="file__name">Choisir une image</span>
                                        </label>
                                    </div>
                                    <div class="form__group">
                                        <label for="link" class="form__label">Lien</label>
                                        <input type="url" name="link" id="link" placeholder="Lien..." class="input__form" value="{!! $banner->link !!}">
                                    </div>
                                    <div class="form__button">
                                        <button type="submit" class="button__green">Enregistrer la bannière</button>
                                        <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="modal__container" id="addBanner">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:banner:store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="title" class="form__label">Titre</label>
                            <textarea name="title" id="title" rows="3" placeholder="Titre de la bannière" class="input__form"></textarea>
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Image de la bannière</label>
                            <label for="" class="input__file__container">
                                <i class="fa fa-image"></i>
                                <input type="file" name="image" id="" class="input__file" onchange="uploadFile(this)">
                                <span class="file__name">Choisir une image</span>
                            </label>
                        </div>
                        <div class="form__group">
                            <label for="link" class="form__label">Lien</label>
                            <input type="url" name="link" id="link" placeholder="Lien..." class="input__form">
                        </div>
                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer la bannière</button>
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
