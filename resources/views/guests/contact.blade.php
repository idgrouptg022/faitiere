@extends('layouts.app')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/contact.css') }}">
@endpush

@section('content')
    @include("includes.guests.band")
    <section class="section-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>
    </section>

    <section class="section-container">
        <div class="contact-container">
            <div class="contact-left">
                <h3 class="contact-subtitle">
                    Avez-vous une inquiétude ou question, ecrivez-nous via le formulaire
                </h3>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <span>{{ $message }}</span>
                    </div>
                @endif
                <form action="{{ route('guests:contact:send') }}" method="post" class="sendMessage">
                    @csrf
                    <div class="contact-form-group">
                        <label for="user-name">Nom & Prénom(s)</label>
                        <input type="text" name="fullname" id="user-name" class="contact-input" placeholder="Nom & Prénom(s)..." autocomplete="off">
                        @error("fullname")
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="contact-form-group">
                        <label for="user-email">Adresse électronique</label>
                        <input type="email" name="email" id="user-email" class="contact-input" placeholder="Adresse électronique..." autocomplete="off">
                        @error("email")
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="contact-form-group">
                        <label for="user-message">Message</label>
                        <textarea name="body" id="user-message" rows="8" placeholder="Votre message..."></textarea>
                        @error("body")
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="contact-button-container">
                        <button type="submit" class="contact-button">Envoyer</button>
                    </div>
                </form>
            </div>
            <div class="contact-right">
                <h3>Réseaux sociaux et autres</h3>
                <div class="contact-social-container">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/FCT228">
                                <i class="fab fa-facebook-f"></i>
                                <span>@fct</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://x.com/fct228">
                                <i class="fab fa-x-twitter"></i>
                                <span>@fct</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/fa%C3%AEti%C3%A8re-des-communes-du-togo-268a57338/">
                                <i class="fab fa-linkedin-in"></i>
                                <span>@fct</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/@fcttv5006/featured">
                                <i class="fab fa-youtube"></i>
                                <span>@fct</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:sefct2020@gmail.com">
                                <i class="fa fa-envelope"></i>
                                <span>sefct2020@gmail.com</span>
                            </a>
                        </li>
                        <li>
                            <a href="tel:+22893824362">
                                <i class="fa fa-phone"></i>
                                <span>(+228) 93 82 43 62</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('extra-scripts')

@endpush
