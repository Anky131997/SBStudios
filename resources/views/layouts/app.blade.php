<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if ($theme === 'day-theme')
        @vite(['resources/css/day-theme.css'])
    @elseif ($theme === 'night-theme')
        @vite(['resources/css/night-theme.css'])
    @endif
</head>

<body id="body" class="body day-theme">
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Notifications <span class="badge text-bg-danger">{{ $unreadNotifications->count() }}</span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mobileNotificationModal">
                    {{-- <ul class="mobileNotificationModalList" style="" aria-labelledby="dropdownMenuButton"> --}}
                        @foreach ($unreadNotifications as $unreadNotification)
                            @if ($unreadNotification->data['badge'] == 'newFinalizeRequest')
                                <a href= "{{ route('approvedjobs.index', $unreadNotification->id) }}"
                                    class="card float-start newFinalizeRequest m-2">
                                    <div class="card-body notificationBody">
                                        <strong class="">{{ $unreadNotification->data['header'] }}</strong>
                                        <small
                                            class="float-end">{{ $unreadNotification->created_at->diffForHumans() }}</small>
                                        <p class="pt-3">{{ $unreadNotification->data['message'] }}</p>
                                    </div>
                                </a>
                            @elseif ($unreadNotification->data['badge'] == 'declinedFinalizeRequest')
                                <a href= "{{ route('profile', $unreadNotification->id) }}"
                                    class="card float-start declinedFinalizeRequest m-2">
                                    <div class="card-body notificationBody">
                                        <strong class="">{{ $unreadNotification->data['header'] }}</strong>
                                        <small
                                            class="float-end">{{ $unreadNotification->created_at->diffForHumans() }}</small>
                                        <p class="pt-3">{{ $unreadNotification->data['message'] }}</p>
                                    </div>
                                </a>
                            @elseif ($unreadNotification->data['badge'] == 'newApprovedJob')
                                <a href= "{{ route('profile', $unreadNotification->id) }}"
                                    class="card float-start newApprovedJob m-2">
                                    <div class="card-body notificationBody">
                                        <strong class="">{{ $unreadNotification->data['header'] }}</strong>
                                        <small
                                            class="float-end">{{ $unreadNotification->created_at->diffForHumans() }}</small>
                                        <p class="pt-3">{{ $unreadNotification->data['message'] }}
                                        </p>
                                    </div>
                                </a>
                            @else
                                <a @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager') href="{{ route('requestedjob.index', $unreadNotification->id) }}"
                                    @elseif (Auth::user()->role == 'worker')
                                        href= "{{ route('profile', $unreadNotification->id) }}" @endif
                                    class="card m-2">
                                    <div class="card-body notificationBody">
                                        <strong class="">{{ $unreadNotification->data['header'] }}</strong>
                                        <small
                                            class="float-end">{{ $unreadNotification->created_at->diffForHumans() }}</small>
                                        <p class="pt-3">{{ $unreadNotification->data['message'] }}
                                        </p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    {{-- </ul> --}}
                </div>
            </div>
        </div>
    </div>
    @include('includes.sidebar')
    <div class="content-body">
        @include('includes.navbar')
        <div class="container">
            {{ $slot }}
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
</body>

</html>
