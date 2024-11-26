@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/quotations.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Décentralisation - Informations</h1>

    <div class="container">

        <div class="page-content">
            @include('includes.auths.flash')

            <div class="quotation-container">
                <div class="form-part">
                    <form action="{{ route('auth:about:store', 'decentralisation-info') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <textarea id="content" name="body">{!! $quotation->body ?? "" !!}</textarea>
                        </div>
                        <input type="hidden" name="type" value="presentation">

                        <div class="form__group">
                            <label for="" class="form__label">Fichier (optionnel)</label>
                            <label for="" class="input__file__container">
                                <i class="fa fa-file-pdf"></i>
                                <input type="file" name="filepath" id="" class="input__file" onchange="uploadFile(this)" accept=".pdf">
                                <span class="file__name">Choisir un fichier</span>
                            </label>
                        </div>

                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer</button>
                        </div>
                    </form>
                </div>
                <div class="files-part-loader">
                    @if ($quotationFiles != null)
                        <span id="quotationDoc" hidden data-url="{{ asset('storage/' . $quotationFiles->filepath) }}"></span>
                    @endif
                    <div class="pdf-container">
                        <div class="top-bar">
                            <button class="btn" id="prev_page">
                                <i class="fas fa-arrow-left"></i> Page prec.
                            </button>
                            <button class="btn" id="next_page">
                                Page suiv.
                                <i class="fas fa-arrow-right"></i>
                            </button>
                            <span class="page-info">
                                Page <span id="page_num"></span> sur <div id="page_count"></div>
                            </span>
                        </div>
                        <canvas id="pdf-renderer"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('extra-scripts')
    <script type="module" src="https://mozilla.github.io/pdf.js/build/pdf.mjs"></script>
    <script type="module" src="{{ asset('assets/scripts/auths/pdf.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                placeholder: "Contenu ...",
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
        // const modalOpener = (element) => {
        //     const targetSelector = element.dataset.target;
        //     const modal = document.querySelector(targetSelector);
        //     modal.style.display = "flex";
        // };

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
