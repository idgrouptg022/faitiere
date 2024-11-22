@extends('layouts.admin')

@push('extra-styles')

@endpush

@section('content')

@endsection

@push('extra-scripts')
    
    <script>
        $(document).ready(function () {
            $('#content').summernote({
                placeholder: "Contenu de l'actualité...",
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
