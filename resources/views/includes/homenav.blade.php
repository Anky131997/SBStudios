<nav style="" id="navbar" class="navbar homeCustomNav navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <!-- Logo -->
        @if ($theme === 'day-theme')
            <a class="btn float-end sidebarToggleButton toggle-btn d-block" href="{{ route('set.theme', 'night-theme') }}" id="toggleSidebar">
                <i class="bi bi-sun"></i>
            </a>
        @elseif ($theme === 'night-theme')
            <a class="btn float-end sidebarToggleButton toggle-btn d-block" href="{{ route('set.theme', 'day-theme') }}" id="toggleSidebar">
                <i class="bi bi-moon-stars"></i>
            </a>
        @endif
        <a class="navbar-brand d-md-block d-none ms-md-5 ps-md-2" href="#">
            Spring Break Studios
        </a>
        <a class="navbar-brand mobileNavbar-brand d-block d-md-none mx-auto text-center ps-4" href="#">
            Spring Break Studios
        </a>

        <!-- Mobile Menu Toggle -->

        @if (Route::has('login'))
            @auth
                <button class="btn btn-sm d-md-none d-block" id="dropdownMenuButton" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-caret-down-fill"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row justify-content-around">
                        @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager')
                            <li class="nav-item mt-2 mb-2">
                                <a href="{{ route('dashboard') }}" class="nav-link d-md-none fw-bold"><i
                                        class="bi bi-clipboard-data"></i></a>
                            </li>
                        @endif
                        <li class="nav-item mt-2 mb-2">
                            <a href="{{ route('profile') }}" class="nav-link d-md-none fw-bold"><i
                                    class="bi bi-person-fill"></i></a>
                        </li>
                        <li class="nav-item mt-2 mb-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    <i class="bi bi-box-arrow-left"></i>
                                </x-responsive-nav-link>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <button class="btn btn-sm d-md-none d-block" id="dropdownMenuButton" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-caret-down-fill"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row justify-content-around text-center">
                        <li class="nav-item mt-4 mb-2">
                            <a href="{{ route('login') }}" class="nav-link d-md-none fw-bold"><i
                                    class="bi bi-box-arrow-in-right"></i></a>
                        </li>
                    </ul>
                </div>
            @endauth
        @endif

        <!-- Desktop Menu -->

        @if (Route::has('login'))
            @auth
                <!-- Dropdown -->
                <div class="dropdown ms-auto d-none d-md-block me-4">
                    <a class="navbarText" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle fs-5"></i> <i class="bi bi-caret-down-fill"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager')
                            <li><a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a></li>
                        @endif
                        <li><a href="{{ route('profile') }}" class="dropdown-item">Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link-dropdown :href="route('logout')"
                                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link-dropdown>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" id="loginLink" class="ms-auto d-none d-md-block me-4"><i
                        class="bi bi-box-arrow-in-right"></i></a>
            @endauth
        @endif

    </div>
</nav>
