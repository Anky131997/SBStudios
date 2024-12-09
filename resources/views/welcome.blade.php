<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption:wght@400;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4fc7fa6ddd.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/welcome.css', 'resources/js/app.js', 'resources/css/welcome.js'])
    {{-- @if ($theme === 'day-theme')
        @vite(['resources/css/day-preloader.css', 'resources/css/day-theme.css'])
    @elseif ($theme === 'night-theme')
        @vite(['resources/css/night-preloader.css', 'resources/css/night-theme.css'])
    @endif --}}
</head>

<body class="welcomeBody">
    @include('includes.homenav')
    <div id="mainContent" class="container">
        <div class="row justify-content-evenly">
            <div class="col-md-6 welcomeSection d-flex pt-md-5 pb-5 slide-in-left">
                <h1>
                    SPRING <br />
                    BREAK <br />
                    STUDIOS
                </h1>
                <p>We cater to all levels of experience and skill levels. We are here to help you grow and develop your
                    skills.</p>
            </div>
            <div class="col-md-6 welcomeSection pt-5 pb-5 ps-md-5 pe-md-5 fade-in fade-in-2">
                <input type="radio" name="slider" id="item-1" checked>
                <input type="radio" name="slider" id="item-2">
                <input type="radio" name="slider" id="item-3">
                <div class="carouselCards">
                    <label class="carouselCard" for="item-1" id="song-1">
                        <img src="https://images.unsplash.com/photo-1530651788726-1dbf58eeef1f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=882&q=80"
                            alt="song">
                    </label>
                    <label class="carouselCard" for="item-2" id="song-2">
                        <img src="https://images.unsplash.com/photo-1559386484-97dfc0e15539?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1234&q=80"
                            alt="song">
                    </label>
                    <label class="carouselCard" for="item-3" id="song-3">
                        <img src="https://images.unsplash.com/photo-1533461502717-83546f485d24?ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
                            alt="song">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="serviceCarousel pt-5">
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-md-12 pt-5 pb-5 pe-md-5">
                    <h1 class="fw-bold">Check Out Our Services</h1>
                </div>
                <div class="col-md-4 pt-5 pb-5 ps-md-5 pe-md-5">
                    <ul class="list-unstyled service-list text-start" id="service-list">
                        @foreach ($services as $service)
                            <a href="#" onclick="showService(event, {{$service->id}})"><li class="service-item pt-4 pb-4">{{ $service->name }}</li></a>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-8 pt-5 pb-5 ps-md-5 pe-md-5">
                    <div class="service-details">
                        @foreach ($services as $service)
                            <div class="page" id="service-{{ $service->id }}">
                                <h3 class="fw-bold">{{ $service->name }}</h3>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
</body>

<script>
    let currentIndex = 1;
    const totalItems = 3; // Update this if you add more items

    function autoCarousel() {
        currentIndex = (currentIndex % totalItems) + 1; // Move to the next item and loop back to 1 after the last item
        document.getElementById(`item-${currentIndex}`).checked = true;
    }

    // Set an interval to change the image every 3 seconds
    setInterval(autoCarousel, 3000);

    document.addEventListener('DOMContentLoaded', () => {
        const navbar = document.querySelector(".navbar");
        const navbarBrand = document.querySelector('.navbar-brand');
        const toggleSidebar = document.getElementById('toggleSidebar');
        const loginLink = document.getElementById('loginLink');
        const dropdownMenuButton = document.getElementById('dropdownMenuButton');

        window.addEventListener("scroll", () => {
            if (window.scrollY > 40) {
                navbar.classList.add("scrolled");
                navbarBrand.classList.add('visible');
                toggleSidebar.classList.add('afterScroll');
                if (loginLink) {
                    loginLink.classList.add('afterScroll');
                }
                if (dropdownMenuButton) {
                    dropdownMenuButton.classList.add('afterScrollMenu');
                }
            } else {
                navbar.classList.remove("scrolled");
                navbarBrand.classList.remove('visible');
                toggleSidebar.classList.remove('afterScroll');
                if (loginLink) {
                    loginLink.classList.remove('afterScroll');
                }
                if (dropdownMenuButton) {
                    dropdownMenuButton.classList.remove('afterScrollMenu');
                }
            }
        });
    });

    // Invisible Scrollbar

    const serviceList = document.getElementById('service-list');

    let scrollTimeout;
    serviceList.addEventListener('scroll', () => {
        serviceList.classList.add('scrolling');

        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            serviceList.classList.remove('scrolling');
        }, 1000);
    });

    const firstService = document.getElementById("service-1");
    if(!firstService.classList.contains('active')){
        firstService.classList.add('active');
    }

    function showService(event, serviceId) {
        event.preventDefault();

        const newserviceId = "service-" + serviceId;
        document.querySelectorAll('.page').forEach(page => {
            page.classList.remove('active');
        });

        // Show the selected page
        document.getElementById(newserviceId).classList.add('active');
    }
</script>

{{-- <script>
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
</script> --}}

</html>
