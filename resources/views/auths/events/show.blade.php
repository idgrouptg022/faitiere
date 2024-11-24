@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/events/create.css') }}">
@endpush

@section('content')

    <h1 class="page-title">Evènements</h1>

    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('auth:evenements:index') }}">Evénements</a></li>
            <li class="breadcrumb-item">Détails</li>
        </ol>
    </div>

    <div class="container">
        <div class="page-conten">
            @include('includes.auths.flash')
        </div>
        <div class="event-container">
            <div class="form-part">
                <form action="{{ route('auth:evenements:update', $event) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="form__group">
                        <label for="title" class="form__label">Titre</label>
                        <input type="text" name="title" id="title" placeholder="Titre de l'événement..." class="input__form" value="{{ $event->title }}">
                    </div>
                    <div class="form__group">
                        <label for="domaine" class="form__label">Domaine</label>
                        <input type="text" name="domaine" id="domaine" placeholder="Culture, politique, environnement,..." class="input__form" value="{{ $event->domaine }}">
                    </div>
                    <div class="form__row">
                        <div class="form__col">
                            <label for="event_date" class="form__label">Date</label>
                            <input type="date" name="event_date" id="event_date" class="input__form" value="{{ $event->event_date }}">
                        </div>
                        <div class="form__col">
                            <label for="event_area" class="form__label">Zone de l'événement</label>
                            <select name="event_area" id="event_area" class="input__form">
                                <option disabled>Sélectionner la zone</option>
                                <option value="national" {{ $event->event_area == 'national' ? 'selected' : '' }}>National</option>
                                <option value="international" {{ $event->event_area == 'international' ? 'selected' : '' }}>International</option>
                            </select>
                        </div>
                    </div>
                    <div class="form__group">
                        <label for="" class="form__label">Image de l'événement</label>
                        <label for="" class="input__file__container">
                            <i class="fa fa-image"></i>
                            <input type="file" name="image" id="" class="input__file" onchange="uploadFile(this)">
                            <span class="file__name">Choisir une image</span>
                        </label>
                    </div>
                    <div class="form__group">
                        <label for="content" class="form__label">Description</label>
                        <textarea name="description" id="content" rows="3" placeholder="Description de l'événement..." class="input__form">{!! $event->description !!}</textarea>
                    </div>

                    <div class="form__button">
                        <button type="submit" class="button__green">Enregistrer l'événement</button>
                    </div>
                </form>
            </div>
            <div class="image-loader-part">
                <figure class="image-loader-container">
                    @if ($event->image != null)
                        <img id="imagePreview" src="{{ asset('storage/' . $event->image) }}" alt="Image de l'événement">
                    @else
                        <img id="imagePreview" src="{{ asset('assets/images/preview.png') }}" alt="Image de l'événement">
                    @endif
                </figure>
            </div>
        </div>
    </div>
@endsection

@push('extra-scripts')
    <script>
        $(document).ready(function () {
            $('#content').summernote({
                placeholder: "Contenu de l'événement...",
                lang: 'fr-FR',
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    // ['insert', ['link', 'picture']],
                ]
            });
        });

        let imagePreview = document.getElementById("imagePreview");

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

                imagePreview.src = URL.createObjectURL(fileInput.files[0]);

            } else {
                fileContainer.style.borderColor = "#000";
                fileContainer.style.backgroundColor = "#fff";
                fileSpan.textContent = "Choisir une image" ;
                imagePreview.src = "{{ asset('assets/images/preview.png') }}";
            }

        }
    </script>
@endpush
