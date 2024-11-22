<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAITIERE - AUTH</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css') }}">
    @stack('extra-styles')
</head>
<body>
    @include('includes.auths.sidebar')
    <main>
        @yield('content')
    </main>

    <script src="{{ asset('assets/scripts/auths/admin.js') }}"></script>
    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('summernote/summernote-lite.js') }}"></script>
    <script src="{{ asset('summernote/summernote-lite.js.map') }}"></script>
    <script src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    @stack('extra-scripts')
</body>
</html>
