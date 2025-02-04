<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faitiere</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/master.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/band.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/topbar.css') }}">
    @stack('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/footer.css') }}">
</head>
<body>
    @include('includes.guests.topbar')
    @include('includes.guests.header')
    @include('includes.guests.navbar')
    @yield('content')
    @include('includes.guests.footer')

    {{-- <div class="social-icons">
        <a href="https://www.facebook.com/FCT228" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.linkedin.com/in/fa%C3%AEti%C3%A8re-des-communes-du-togo-268a57338/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        <a href="https://x.com/fct228" target="_blank"><i class="fab fa-x-twitter"></i></a>
        <a href="https://www.youtube.com/@fcttv5006/featured" target="_blank"><i class="fab fa-youtube"></i></a>
    </div> --}}

    <a class="whatsapp-container" href="https://wa.me/22893824362">
        <i class="fab fa-whatsapp"></i>
    </a>

    @if ($message = Session::get('newsletter-success'))
        @include('includes.guests.mail_success')
    @endif

    <script src="{{ asset('assets/scripts/guests/app.js') }}"></script>
    {{-- <script src="{{ asset('assets/scripts/guests/navbar.js') }}"></script> --}}
    @stack('extra-scripts')
</body>
</html>
