@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/presentation.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Présentation</h1>
    <div class="container">
        @include('includes.auths.flash')
        <form action="{{ route('auth:presentation:store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <textarea id="content" name="body">{!! $content->body ?? "" !!}</textarea>
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
</script>
@endpush
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
