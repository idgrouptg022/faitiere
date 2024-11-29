@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/users/index.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Administrateurs</h1>

    <div class="container">
        @include('includes.auths.flash')

        <div class="register-user-button">
            <a href="#!" onclick="modalOpener(this)" data-target="#registerNewUser" class="page-subheader-btn"><i class="fas fa-plus"></i> Enregistrer un nouvel utilisateur</a>
        </div>
        <div class="table-container">
            <table class="table-default">
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Nom & Prénoms</th>
                        <th>Email</th>
                        <th>Date d'enregistrement</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ $user->avatar
                                ? asset('storage/' . $user->avatar)
                                : asset('assets/images/avatar-default.png') }}" alt="Avatar de {{ $user->name }}" class="user-avatar">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->locale("fr_FR")->isoFormat('LL') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Aucun enregistrement</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="modal__container" id="registerNewUser">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:users:register') }}" method="POST">
                        @csrf
                        <div class="form__group">
                            <label for="name" class="form__label">Nom complet: </label>
                            <input type="text" name="name" id="name" placeholder="Nom complet" class="input__form" autocomplete="off">
                        </div>
                        <div class="form__group">
                            <label for="email" class="form__label">Adresse électronique: </label>
                            <input type="email" name="email" id="email" placeholder="Adresse électronique" class="input__form" autocomplete="off">
                        </div>
                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer</button>
                            <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('extra-scripts')
    <script>
        const modalOpener = (element) => {
            const targetSelector = element.dataset.target;
            const modal = document.querySelector(targetSelector);
            modal.style.display = "flex";
        };

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
                fileSpan.textContent = "Choisir une image" ;
            }

        }
    </script>
@endpush
