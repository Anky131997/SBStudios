<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if ($theme === 'day-theme')
        @vite(['resources/css/day-preloader.css','resources/css/day-theme.css'])
    @elseif ($theme === 'night-theme')
        @vite(['resources/css/night-preloader.css','resources/css/night-theme.css'])
    @endif
</head>

<body>
    @session('success')
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header customToastHeader">
                    <strong class="me-auto">Thanks for contacting us</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body customToastBody">
                    You will be hearing from us very soon!!
                </div>
            </div>
        </div>
    @endsession
    <div id="preloader">
        @include('includes.preloader')
    </div>
    <div id="mainContent" class="container">
        {{ $slot }}
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
</body>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const preloader = document.getElementById("preloader");
        const mainContent = document.getElementById("mainContent");
        const submitForm = document.getElementById("submitForm");

        submitForm.addEventListener('submit', function() {
            preloader.style.display = 'flex';
            mainContent.style.display = 'none';
        });

        
        window.addEventListener("load", () => {
            preloader.style.display = "none";
        });
    });

    const toastLiveExample = document.getElementById('liveToast');
    const toast = new bootstrap.Toast(toastLiveExample);
    toast.show();

    if (toast) {
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }
</script>

</html>
