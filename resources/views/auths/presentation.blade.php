@extends('layouts.admin')

@push('extra-styles')
<link rel="stylesheet" href="{{ asset('assets/styles/auths/banner.css') }}">


@endpush

@section('content')

<div>
    <form action="{{ route('auth:presentation.process') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Ajouter une présentation</h1>
        <div class="form__group">
            <label for="" class="form__label">Image de la bannière</label>
            <label for="" class="input__file__container">
                <i class="fa fa-image"></i>
                <input type="file" name="image" id="" class="input__file" onchange="uploadFile(this)">
                <span class="file__name">Ajouter une image à la présentation</span>
            </label>
        </div>
        <div class="form-group">
            <label><strong>Présentation :</strong></label>
            <textarea id="summernote" name="description"></textarea>
        </div>
        <input type="hidden" name="type" value="presentation">
        <div class="form__button">
            <button type="submit" class="button__green">Enregistrer la présentation</button>
        </div>
    </form>
</div>

@endsection

@push('extra-scripts')

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: "Contenu de la présentaion...",
            lang: 'fr-FR',
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
            ]
        });
    })
</script>
@endpush
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>