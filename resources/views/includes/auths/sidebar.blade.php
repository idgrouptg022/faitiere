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
                <a href="{{ route('auth:presentations.index') }}" title="bannieres" class="tooltip">
                    <svg class="w-[50px] h-[50px] fill-[#8e8e8e]" viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg">

                        <path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm72 208c-13.3 0-24 10.7-24 24V336v56c0 13.3 10.7 24 24 24s24-10.7 24-24V360h44c42 0 76-34 76-76s-34-76-76-76H136zm68 104H160V256h44c15.5 0 28 12.5 28 28s-12.5 28-28 28z"></path>

                    </svg>
                    <span class="link hide">Présentaions</span>
                    <span class="tooltip__content">Présenations</span>
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
</aside>