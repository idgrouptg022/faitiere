<aside>
    <div class="sidebar-top">
        <a href="#" class="logo__wrapper">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" class="logo">
            <h1 class="hide">La Faitiere</h1>
        </a>
        {{-- <div class="expand-btn">
            <svg  viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path>
            </svg>
        </div> --}}
    </div>
    <div class="sidebar-links">
        <ul>
            <li>
                <a href="" title="Tableau de bord" class="tooltip">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm320 96c0-26.9-16.5-49.9-40-59.3V88c0-13.3-10.7-24-24-24s-24 10.7-24 24V292.7c-23.5 9.5-40 32.5-40 59.3c0 35.3 28.7 64 64 64s64-28.7 64-64zM144 176a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm-16 80a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM400 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"></path>
                    </svg>
                    <span class="link hide">Tableau de bord</span>
                    <span class="tooltip__content">Tableau de bord</span>
                </a>
            </li>
            <li>
                <a href="{{ route('auth:banner:index') }}" title="bannieres" class="tooltip">
                    <svg viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M45.6 32C20.4 32 0 52.4 0 77.6V434.4C0 459.6 20.4 480 45.6 480c5.1 0 10-.8 14.7-2.4C74.6 472.8 177.6 440 320 440s245.4 32.8 259.6 37.6c4.7 1.6 9.7 2.4 14.7 2.4c25.2 0 45.6-20.4 45.6-45.6V77.6C640 52.4 619.6 32 594.4 32c-5 0-10 .8-14.7 2.4C565.4 39.2 462.4 72 320 72S74.6 39.2 60.4 34.4C55.6 32.8 50.7 32 45.6 32zM96 160a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm272 0c7.9 0 15.4 3.9 19.8 10.5L512.3 353c5.4 8 5.6 18.4 .4 26.5s-14.7 12.3-24.2 10.7C442.7 382.4 385.2 376 320 376c-65.6 0-123.4 6.5-169.3 14.4c-9.8 1.7-19.7-2.9-24.7-11.5s-4.3-19.4 1.9-27.2L197.3 265c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l26.4 33.1 87-127.6c4.5-6.6 11.9-10.5 19.8-10.5z"></path>
                    </svg>
                    <span class="link hide">Bannieres</span>
                    <span class="tooltip__content">Bannieres</span>
                </a>
            </li>
            <li>
                <a href="{{ route('auth:actuVideo:index') }}" title="actu videos" class="tooltip">
                    <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
                    </svg>
                    <span class="link hide">Actu Videos</span>
                    <span class="tooltip__content">Actu Videos</span>
                </a>
            </li>
            <li>
                <a href="{{ route('auth:evenements:index') }}" title="evenements" class="tooltip">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0h32c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64H64c123.7 0 224 100.3 224 224v32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V320C100.3 320 0 219.7 0 96z"></path>
                    </svg>
                    <span class="link hide">Evenements</span>
                    <span class="tooltip__content">Evenements</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-bottom">
        <div class="sidebar__profile">
            <div class="avatar__wrapper">
                <img class="avatar" src="" alt="Profile">
                <div class="online__status"></div>
            </div>
            <div class="avatar__name hide">
                <div class="user-name">Admin</div>
                <div class="email">admin@auth.com</div>
            </div>
        </div>
    </div>
</aside>
