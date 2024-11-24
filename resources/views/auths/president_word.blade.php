@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/president_word.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Mot de la présidente</h1>
    <div class="container">
        @include('includes.auths.flash')
        <div class="president-container">
            <div class="form-part">
                <form action="{{ route('auth:presidentWord:store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form__group">
                        <label for="" class="form__label">Image</label>
                        <label for="" class="input__file__container">
                            <i class="fa fa-image"></i>
                            <input type="file" name="image" id="" class="input__file" onchange="uploadFile(this)">
                            <span class="file__name">Choisir une image</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <textarea id="content" name="body">{!! $content->body ?? "" !!}</textarea>
                    </div>
                    <input type="hidden" name="type" value="presentation">
                    <div class="form__button">
                        <button type="submit" class="button__green">Enregistrer le mot</button>
                    </div>
                </form>
            </div>
            <div class="image-loader-part">
                <figure class="image-loader-container">
                    @if ($content!= null && $content->image != null)
                        <img id="imagePreview" src="{{ asset('storage/' . $content->image) }}" alt="Image de la présidente">
                    @else
                        <img id="imagePreview" src="{{ asset('assets/images/preview.png') }}" alt="Image de la présidente">
                    @endif
                </figure>
            </div>
        </div>
    </div>

@endsection

@push('extra-scripts')
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                placeholder: "Contenu de la présentaion...",
                lang: 'fr-FR',
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    // ['insert', ['link', 'picture']],
                ]
            });
        })

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
