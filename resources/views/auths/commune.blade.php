@extends('layouts.admin')

@push('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/rapports/ressources.css') }}">
@endpush

@section('content')
    <h1 class="page-title">Communes</h1>

    <div class="container">
         @include('includes.auths.flash')
        {{-- <div class="pager-subheader">
            <a href="#!" class="page-subheader-btn" onclick="modalOpener(this)" data-target="#addBanner"><i class="fas fa-plus-circle"></i> Ajouter une commune</a>
        </div> --}}



        <div class="modal__container" id="addBanner">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:communes:store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="name" class="form__label">Nom de la commune</label>
                            <textarea name="name" id="title" rows="3" placeholder="Nom de la commune" class="input__form"></textarea>
                        </div>
                        <div class="form__group">
                            <label for="habitants" class="form__label">Habitants</label>
                            <textarea name="habitants" id="habitants" rows="3" placeholder="nombre d'habitans de la commune" class="input__form"></textarea>
                        </div>
                        <div class="form__group">
                            <label for="surface" class="form__label">Surface</label>
                            <textarea name="surface" id="surface" rows="3" placeholder="Surface de la commune" class="input__form"></textarea>
                        </div>
                        <div class="from__group">
                        <label for="prefecture" class="form__label">Préfecture de cette commune</label>
                            <select name="prefecture_id" id="prefecture" class="input__form">
                                <option value="">Sélectionner une préfecture</option>
                                @forelse ($prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                                @empty
                                    <option value="">Pas de préfecture !</option>
                                @endforelse
                            </select>

                        </div>

                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer la commune</button>
                            <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>






        <div class="page-content">


            <div class="table-container">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom de la commune</th>

                            <th>préfecture d'appartenance</th>
                            <th>Habitants</th>
                            <th>Surface</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp

                        @forelse ($communes as $commune)
                            <tr>
                                <td>{{ $i }}</td>

                                <td>{{ \Illuminate\Support\Str::substr($commune->name, 0, 50) . "..." }}</td>
                                <td>{{ $commune->prefecture->name }}</td>
                                <td>{{ $commune->habitants }}</td>
                                <td>{{ $commune->surface }}</td>
                                <td>
                                    <a href="#!" onclick="modalOpener(this)" data-target="#updateBanner{{ $commune->id }}" class="edit-new">Editer</a>
                                    <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cet événement ?') ? document.getElementById('deleteEvent{{ $commune->id }}').submit() : ''" class="destroy-new"><i class="fas fa-trash-alt"></i></a>
                                    <form action="{{ route('auth:communes:destroy', $commune) }}" method="POST" id="deleteEvent{{ $commune->id }}">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>

                            </tr>



                            <div class="modal__container" id="updateBanner{{ $commune->id }}">
                                <div class="modal">
                                    <div class="modal__body">
                                        <form action="{{ route('auth:communes:update', $commune) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("PATCH")

                                            <div class="form__group">
                                                <label for="name" class="form__label">Nom de la commune</label>
                                                <textarea name="name" id="title" rows="3" placeholder="Nom de la commune" class="input__form">{!! $commune->name !!}</textarea>
                                            </div>
                                            <div class="form__group">
                                                <label for="habitants" class="form__label">Habitants</label>
                                                <textarea name="habitants" id="habitants" rows="3" placeholder="nombre d'habitans de la commune" class="input__form">{!! $commune->habitants !!}</textarea>
                                            </div>
                                            <div class="form__group">
                                                <label for="surface" class="form__label">Surface</label>
                                                <textarea name="surface" id="surface" rows="3" placeholder="Surface de la commune" class="input__form">{!! $commune->surface !!}</textarea>
                                            </div>
                                            <div class="from__group">
                                            <label for="prefecture" class="form__label">Préfecture de la commune</label>
                                                <select name="prefecture_id" id="prefecture" class="input__form">

                                                    @forelse ($prefectures as $prefecture)
                                                        <option value="{{ $prefecture->id }}" {{ $commune->prefecture_id == $prefecture->id ? "selected" : ""}}>{{ $prefecture->name }}</option>
                                                    @empty
                                                        <option value="">Pas de prefecture !</option>
                                                    @endforelse
                                                </select>

                                            </div>

                                            <div class="form__button">
                                                <button type="submit" class="button__green">Enregistrer la modification de la commune</button>
                                                <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            @php
                                $i++;
                            @endphp
                        @empty
                            <tr style="text-align: center;">
                                <td colspan="6">Aucun enregistrement</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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


    </script>
@endpush

