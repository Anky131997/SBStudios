<nav style="" id="navbar" class="navbar customNavbar day-theme navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="btn float-end sidebarCloseButton toggle-btn d-block d-lg-none" id="toggleSidebar">
            <i class="bi bi-list"></i>
        </a>
        <a class="navbar-brand navbarText day-theme d-md-block d-none ms-md-4" href="#">
            Spring Break Studios
        </a>
        <a class="navbar-brand navbarText day-theme d-block d-md-none mx-auto text-center" href="#">
            Spring Break Studios
        </a>
        <button class="btn btn-sm d-md-none d-block" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="bi bi-caret-down-fill"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mt-4 mb-2">
                    <a href="{{ route('profile') }}" class="nav-link d-md-none fw-bold"><i
                            class="bi bi-person-fill ms-2 pe-4"></i> Profile</a>
                </li>
                <li class="nav-item mb-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                    this.closest('form').submit();">
                            <i class="bi bi-box-arrow-left ms-2 pe-4"></i> {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </li>
            </ul>
        </div>
        <div class="dropdown ms-auto d-none d-md-block me-4">
            <a class="navbarText day-theme" style="text-decoration: none;" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bell-fill"></i><span
                    class="badge badge-danger">{{ $unreadNotifications->count() }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end notificationDropdown" style="" aria-labelledby="dropdownMenuButton">
                @foreach ($unreadNotifications as $unreadNotification)
                    <a @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager') href="{{ route('requestedjob.index', $unreadNotification->id) }}"
                        @elseif (Auth::user()->role == 'worker')
                            href= "{{ route('profile', $unreadNotification->id) }}" @endif
                        class="card">
                        <div class="card-body">
                            <strong class="">{{ $unreadNotification->data['header'] }}</strong>
                            <small>{{ $unreadNotification->created_at->diffForHumans() }}</small>
                            <p>{{ $unreadNotification->data['message'] }}</p>
                        </div>
                    </a>
                @endforeach
            </ul>
        </div>
        <div class="btn-group btn-group-sm ms-auto me-4" role="group" aria-label="First group">
            <a type="button" href="{{ route('set.theme', 'day-theme') }}" id="dayThemeButton" class="btn btn-light"><i
                    class="bi bi-brightness-high"></i></a>
            <a type="button" href="{{ route('set.theme', 'night-theme') }}" id="nightThemeButton"
                class="btn btn-outline-dark"><i class="bi bi-moon"></i></a>
        </div>
        <!-- Dropdown -->
        <div class="dropdown ms-auto d-none d-md-block me-4">
            <a class="navbarText day-theme" style="text-decoration: none;" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-5"></i> <i class="bi bi-caret-down-fill"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
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
    </div>
</nav>
