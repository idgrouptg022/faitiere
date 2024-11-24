@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/banner.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Mot de la présidente</h1>

    @if($words)

    @foreach ($words as $word)

    <div>
        <div class="P-left">
            <img src="{{ asset('storage/' . $word->image) }}" alt="Image de la presidente">
        </div>
        <div class="p-rigth">
            <form action="{{ route('auth:word:store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <label for="body"> Mot de la Présidente</label>
            <textarea name="body" id="content" cols="30" rows="10"> {{ $word->body }}</textarea>
            <label for="image">Ajouter/Changer l'image de la Présidente</label>
            <input type="file" name="image" id="">
            <button type="submit">Enregistrer la modification</button>
        </form>
        </div>
    </div>

    @endforeach

    @else

    <div>
        <div class="P-left">
            <img src="" alt="Image de la presidente">
        </div>
        <div class="p-rigth">
            <form action="{{ route('auth:word:store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <label for="body"> Mot de la Présidente</label>
            <textarea name="body" id="content" cols="30" rows="10"> </textarea>
            <label for="image">Ajouter/Changer l'image de la Présidente</label>
            <input type="file" name="image" id="">
            <button type="submit">Enregister</button>
        </form>
        </div>
    </div>

    @endif


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
