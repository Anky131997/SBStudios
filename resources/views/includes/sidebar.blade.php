<div class="sidebar customSidebar d-flex flex-column" id="sidebar">
    <div>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="" class="navbar-brand nav-link day-theme navlogo mb-5 mt-5 mx-3 my-2"><img
                        src="/images/logo.png" class="logoImg" alt=""> <span class="fs-4">SB STUDIOS</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" id="dashboardLink" class="nav-link day-theme mx-3 my-2">
                    <i class="bi bi-clipboard-data-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->role !== 'worker')
                <li class="nav-item">
                    <a href="{{ route('register') }}" id="registerLink" class="nav-link day-theme mx-3 my-2">
                        <i class="bi bi-person-plus-fill"></i>
                        <span>Add Employees</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" id="userLink" class="nav-link day-theme mx-3 my-2">
                        <i class="bi bi-people-fill"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link day-theme mx-3 my-2" id="jobCollapseButton" data-bs-toggle="collapse"
                        href="#jobsCollapse" role="button" aria-expanded="false" aria-controls="jobsCollapse">
                        <i class="bi bi-briefcase-fill"></i>
                        <span>Jobs</span>
                    </a>
                    <div class="collapse mt-3 customSidebarDropdown" id="jobsCollapse">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item justify-content-center">
                                <a class="nav-link day-theme" href="{{ route('requestedjob.index') }}"><i
                                        class="bi bi-exclamation-circle-fill"></i> Requested Jobs</a>
                            </li>
                            <li class="nav-item justify-content-center">
                                <a class="nav-link day-theme" href="{{ route('approvedjobs.index') }}"><i
                                        class="bi bi-check-circle-fill"></i> Approved Jobs</a>
                            </li>
                            <li class="nav-item justify-content-center">
                                <a class="nav-link day-theme" href="{{ route('canceledjobs.index') }}"><i
                                        class="bi bi-x-circle-fill"></i> Canceled Jobs</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>

    <div class="sidebar-footer day-theme">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link day-theme m-3">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Contact</span>
                </a>
            </li>
        </ul>
    </div>
</div>
