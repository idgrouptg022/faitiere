<nav>
    <figure class="nav-logo">
        <img src="{{ asset('assets/images/logo.png') }}" alt="">
    </figure>
    <ul class="nav-menu">
        <li class="nav-item">
            <a href="{{ route('guests:home') }}">Accueil</a>
        </li>
        <li class="nav-item">
            <a>A Propos</a>
            <div class="dropdown">
                <ul class="nav-submenu">
                    <li class="nav-submenu-item"><a href="{{ route('guests:historique') }}">Historique</a></li>
                    <li class="nav-submenu-item"><a href="{{ route('guests:role') }}">Rôle et Mission</a></li>
                    <li class="nav-submenu-item"><a href="{{ route('guests:statut') }}">Status et Réglements</a></li>
                    <li class="nav-submenu-item"><a href="{{ route('guests:organigramme') }}">Organigramme</a></li>
                    <li class="nav-submenu-item"><a href="{{ route('guests:presidentWord') }}">Mot de la présidente</a></li>
                    <li class="nav-submenu-item"><a href="{{ route('guests:partenaires') }}">Partenaires</a></li>
                    <li class="nav-submenu-item"><a href="{{ route('guests:contact') }}">Contacts</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a>Décentralisation</a>
            <div class="dropdown">
                <ul class="nav-submenu">
                    <li class="nav-submenu-item"><a href="{{ route('guests:decentralisation:lois') }}">Lois</a></li>
                    <li class="nav-submenu-item"><a href="{{ route('guests:decentralisation:informations') }}">Informations</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a href="https://communestogo.test">Communes</a>
        </li>
        <li class="nav-item">
            <a>Projets</a>
            <div class="dropdown">
                <ul class="nav-submenu">
                    <li class="nav-submenu-item"><a href="{{ route('guests:projets:plaidoyers') }}">Plaidoyers</a></li>
                    <li class="nav-submenu-item"><a href="{{ route('guests:projets:projetsEnCours') }}">Projets en cours</a></li>
                    <li class="nav-submenu-item"><a href="{{ route('guests:projets:projetsRealises') }}">Projets réalisés</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a>Mediathèque</a>
            <div class="dropdown">
                <ul class="nav-submenu">
                    <li class="nav-submenu-item"><a href="{{ route('guests:mediatheque:ressources') }}">Centre National de Ressources FCT</a></li>
                    <li class="nav-submenu-item"><a href="{{ route('guests:mediatheque:rapportsAG') }}">Rapports AG</a></li>
                    <li class="nav-submenu-item"><a href="{{ route('guests:mediatheque:rapportsAnnuels') }}">Rapport d'activités annuelles</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a>Evénements</a>
            <div class="dropdown">
                <ul class="nav-submenu">
                    <li class="nav-submenu-item"><a href="#">Evénements nationaux</a></li>
                    <li class="nav-submenu-item"><a href="#">Evénements internationaux</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a href="https://communestogo.test">FCT Mag</a>
        </li>
        {{-- <li class="nav-item">
            <a>Outils de la FCT</a>
            <div class="dropdown">
                <ul class="nav-submenu">
                    <li class="nav-submenu-item"><a href="#">FCTMag</a></li>
                    <li class="nav-submenu-item"><a href="#">CADEL</a></li>
                    <li class="nav-submenu-item"><a href="#">REFELA</a></li>
                </ul>
            </div>
        </li> --}}
    </ul>
    <div class="nav-search">
        <h4 class="search-icon">
            <i class="fas fa-search"></i>
        </h4>
    </div>
</nav>
