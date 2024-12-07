@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/publicites.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/twitter_post.css') }}">
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endpush

@section('content')
    <h1 class="page-title">Twitter Post</h1>

    <div class="container">
        <div class="pager-subheader">
            <a href="#!" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addTwitterPost"><i class="fas fa-plus-circle"></i> Ajouter un post twitter</a>
        </div>

        <div class="page-content">
            @include('includes.auths.flash')
            <div class="partners">
                @foreach ($twitter_posts as $twitter_post)
                    <div class="twitter-widget-container">
                        <blockquote class="twitter-tweet">
                            <p lang="fr" dir="ltr">
                                {{-- {{ $twitter_post->title }} --}}
                                <a href="https://t.co/EXs3Ytlr4J">pic.twitter.com/EXs3Ytlr4J</a>
                            </p>
                            <a href="{{ $twitter_post->url }}">August 6, 2024</a>
                        </blockquote>
                        <button onclick="modalOpener(this)" data-target="#editTwitterPost{{ $twitter_post->id }}" class="editBtn">Editer</button>
                        <button class="deleteBtn" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer ce post ?') ? document.getElementById('twitterPost{{ $twitter_post->id }}').submit() : ''">Supprimer</button>
                        <form action="{{ route('auth:twitter:destroy', $twitter_post) }}" method="POST" id="twitterPost{{ $twitter_post->id }}">
                            @csrf
                            @method("DELETE")
                        </form>
                    </div>

                    <div class="modal__container" id="editTwitterPost{{ $twitter_post->id }}">
                        <div class="modal">
                            <div class="modal__body">
                                <form action="{{ route('auth:twitter:update', $twitter_post) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("PATCH")
                                    <div class="form__group">
                                        <label for="title" class="form__label">Titre du twitter</label>
                                        <textarea rows="6" name="title" id="title" class="input__form" placeholder="Titre du twitter">{!! $twitter_post->title !!}</textarea>
                                    </div>

                                    <div class="form__group">
                                        <label for="twitter_url" class="form__label">Lien du post</label>
                                        <input type="url" name="url" id="twitter_url" class="input__form" placeholder="https://twitter.com/fct228/status/...." value="{{ $twitter_post->url }}">
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

        <div class="modal__container" id="addTwitterPost">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:twitter:store') }}" method="POST">
                        @csrf
                        <div class="form__group">
                            <label for="title" class="form__label">Titre du twitter</label>
                            <textarea rows="6" type="text" name="title" id="title" class="input__form" placeholder="Titre du twitter"></textarea>
                        </div>

                        <div class="form__group">
                            <label for="twitter_url">Lien du post</label>
                            <input type="url" name="url" id="twitter_url" class="input__form" placeholder="https://twitter.com/fct228/status/....">
                        </div>

                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer le post</button>
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
