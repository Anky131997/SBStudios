<nav style="" id="navbar" class="navbar customNavbar day-theme navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid justify-content-evenly">
        <!-- Logo -->
        <a class="btn float-end sidebarCloseButton mobileAdminSideToggle toggle-btn d-block d-lg-none" id="toggleSidebar">
            <i class="bi bi-three-dots-vertical"></i>
        </a>
        <a class="navbar-brand navbarText day-theme d-md-block d-none ms-md-4" href="#">
            Spring Break Studios
        </a>
        <a class="navbar-brand navbarText day-theme d-block d-md-none mx-auto text-center" href="#">
            Spring Break Studios
        </a>
        <button class="btn btn-sm d-md-none mobileAdminNavButton d-block" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="bi bi-caret-down-fill"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mobileAdminNav d-flex flex-row justify-content-evenly me-auto mt-2 mb-2 mb-lg-0">
                <li class="nav-item mb-2">
                    @if ($theme === 'day-theme')
                        <a class="nav-link d-md-none fw-bold" href="{{ route('set.theme', 'night-theme') }}"
                            id="toggleSidebar">
                            <i class="bi bi-sun"></i>
                        </a>
                    @elseif ($theme === 'night-theme')
                        <a class="nav-link d-md-none fw-bold" href="{{ route('set.theme', 'day-theme') }}"
                            id="toggleSidebar">
                            <i class="bi bi-moon-stars"></i>
                        </a>
                    @endif
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('profile') }}" class="nav-link d-md-none fw-bold"><i
                            class="bi bi-person-fill"></i></a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-md-none fw-bold" style="text-decoration: none;" type="button"
                        id="dropdownMenuButton" data-bs-toggle="modal" data-bs-target="#notificationModal">
                        <i class="bi bi-bell-fill"></i>
                        @if ($unreadNotifications->count() > 0)
                            <span class="badge badge-danger dangerBadge">{{ $unreadNotifications->count() }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item mb-2">
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
        <div class="dropdown ms-auto d-none d-md-block me-4">
            <a class="navbarText day-theme" style="text-decoration: none;" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bell-fill"></i>
                @if ($unreadNotifications->count() > 0)
                    <span class="badge badge-danger dangerBadge">{{ $unreadNotifications->count() }}</span>
                @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end notificationDropdown" style=""
                aria-labelledby="dropdownMenuButton">
                <h4 class="fw-bold pt-3 ps-3 pb-3">Notifications<span
                        class="badge text-bg-danger ms-3">{{ $unreadNotifications->count() }}</span></h4>
                @foreach ($unreadNotifications as $unreadNotification)
                    @if ($unreadNotification->data['badge'] == 'newFinalizeRequest')
                        <a href= "{{ route('approvedjobs.index', $unreadNotification->id) }}"
                            class="card newFinalizeRequest m-2">
                            <div class="card-body notificationBody">
                                <strong class="">{{ $unreadNotification->data['header'] }}</strong>
                                <small class="float-end">{{ $unreadNotification->created_at->diffForHumans() }}</small>
                                <p class="pt-3">{{ $unreadNotification->data['message'] }}</p>
                            </div>
                        </a>
                    @elseif ($unreadNotification->data['badge'] == 'declinedFinalizeRequest')
                        <a href= "{{ route('profile', $unreadNotification->id) }}"
                            class="card declinedFinalizeRequest m-2">
                            <div class="card-body notificationBody">
                                <strong class="">{{ $unreadNotification->data['header'] }}</strong>
                                <small class="float-end">{{ $unreadNotification->created_at->diffForHumans() }}</small>
                                <p class="pt-3">{{ $unreadNotification->data['message'] }}</p>
                            </div>
                        </a>
                    @elseif ($unreadNotification->data['badge'] == 'newApprovedJob')
                        <a href= "{{ route('profile', $unreadNotification->id) }}" class="card newApprovedJob m-2">
                            <div class="card-body notificationBody">
                                <strong class="">{{ $unreadNotification->data['header'] }}</strong>
                                <small class="float-end">{{ $unreadNotification->created_at->diffForHumans() }}</small>
                                <p class="pt-3">{{ $unreadNotification->data['message'] }}</p>
                            </div>
                        </a>
                    @elseif ($unreadNotification->data['badge'] == 'newJob')
                        <a class="card m-2" href="{{ route('requestedjob.index', $unreadNotification->id) }}">
                            <div class="card-body notificationBody">
                                <strong class="">{{ $unreadNotification->data['header'] }}</strong>
                                <small class="float-end">{{ $unreadNotification->created_at->diffForHumans() }}</small>
                                <p class="pt-3">{{ $unreadNotification->data['message'] }}</p>
                            </div>
                        </a>
                    @elseif ($unreadNotification->data['badge'] == 'newFinishedJob')
                        <a class="card newFinishedJob m-2" @if (Auth::user()->role == 'worker') href="{{ route('profile', $unreadNotification->id) }}" @elseif (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager') href="{{ route('finishedjob.index', $unreadNotification->id) }}" @endif>
                            <div class="card-body notificationBody">
                                <strong class="">{{ $unreadNotification->data['header'] }}</strong>
                                <small class="float-end">{{ $unreadNotification->created_at->diffForHumans() }}</small>
                                <p class="pt-3">{{ $unreadNotification->data['message'] }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach
            </ul>
        </div>
        @if ($theme === 'day-theme')
            <a class="btn d-none d-md-block text-black me-4" href="{{ route('set.theme', 'night-theme') }}"
                id="toggleSidebar">
                <i class="bi bi-sun"></i>
            </a>
        @elseif ($theme === 'night-theme')
            <a class="btn d-none d-md-block text-white me-4" href="{{ route('set.theme', 'day-theme') }}"
                id="toggleSidebar">
                <i class="bi bi-moon-stars"></i>
            </a>
        @endif
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
