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
    @vite(['resources/css/app.css', 'resources/css/welcome.css'])
    @if ($theme === 'day-theme')
        @vite(['resources/css/welcome-day.css'])
    @elseif ($theme === 'night-theme')
        @vite(['resources/css/welcome-night.css'])
    @endif
</head>

<body class="welcomeBody">
    @include('includes.homenav')
    @session('success')
        <script>
            const successMessage = "{{ session('success') }}";
        </script>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header customToastHeader">
                    <strong class="me-auto">{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body customToastBody">
                    {{ session('body') }}
                </div>
            </div>
        </div>
    @endsession

    <div id="mainContent" class="container">
        <div class="row justify-content-evenly">
            <div class="col-md-6 welcomeSection d-flex pt-md-5 pb-5 animationHidden">
                <h1>
                    SPRING <br />
                    BREAK <br />
                    STUDIOS
                </h1>
                <p>We cater to all levels of experience and skill levels. We are here to help you grow and develop your
                    skills.</p>
            </div>
            <div class="col-md-6 welcomeSection pt-5 pb-5 ps-md-5 pe-md-5 fadeHidden fade-in-2">
                <input type="radio" name="slider" id="item-1" checked>
                <input type="radio" name="slider" id="item-2">
                <input type="radio" name="slider" id="item-3">
                <div class="carouselCards">
                    @foreach ($serviceImagesWithIdentifiers as $serviceImagesWithIdentifier)
                        <label class="carouselCard" for="item-{{ $serviceImagesWithIdentifier['identifier'] }}"
                            id="song-{{ $serviceImagesWithIdentifier['identifier'] }}">
                            <img src="{{ url('images/serviceImages/' . $serviceImagesWithIdentifier['image']) }}"
                                alt="song">
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="serviceCarousel pt-5">
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-md-12 pt-5 pb-5 pe-md-5 animationHidden">
                    <h1 class="fw-bold">Check Out Our Services</h1>
                </div>
                <div class="col-md-4 pt-5 pb-5 ps-md-5 pe-md-5 d-none d-md-block fadeHidden fade-in-2">
                    <ul class="list-unstyled service-list text-start" id="service-list">
                        @foreach ($services as $service)
                            <a href="#" onclick="showService(event, {{ $service->id }})">
                                <li id="service-item-{{ $service->id }}" class="service-item pt-4 pb-4 ps-3">{{ $service->name }}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4 pb-5 ps-md-5 pe-md-5 d-block d-md-none fadeHidden fade-in-2">
                    <select class="form-select" onchange="showServiceDropdown(this)"
                        aria-label="Default select example">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8 pt-5 pb-5 ps-md-5 pe-md-5">
                    <div class="service-details">
                        @foreach ($services as $service)
                            <div class="page" id="service-{{ $service->id }}">
                                <h2 class="fw-bold fadeHidden fade-in-2">{{ $service->name }}</h2>
                                <div class="contactButton pt-4 fadeHidden fade-in-2">
                                    <a href="#" onclick="scrollToContact({{ $service->id }},'contactContainer')" class="btn btn-sm btn-success contactButtonInside">Contact us about {{ $service->name }} <i class="bi bi-arrow-down"></i></a>
                                </div>
                                <div class="slider pt-3 fadeHidden fade-in-2">
                                    <div class="slides-track">
                                        @foreach ($service->serviceImages as $serviceImage)
                                            <div class="slide">
                                                <img src="{{ url('images/serviceImages/' . $serviceImage->image) }}"
                                                    alt="" />
                                            </div>
                                        @endforeach
                                        @foreach ($service->serviceImages as $serviceImage)
                                            <div class="slide">
                                                <img src="{{ url('images/serviceImages/' . $serviceImage->image) }}"
                                                    alt="" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contactContainer" class="contactContainer pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-md-9 pt-5">
                    <h1 class="fw-bold animationHidden">Contact With Us</h1>
                </div>
                <div class="col-md-9 pt-5 pb-5 fadeHidden fade-in-2">
                    <form id="submitForm" class="row g-4" method="POST" action="{{ route('requestedjob.store') }}">
                        @csrf

                        <div class="col-md-4 mt-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                aria-describedby="emailHelp">
                            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                        </div>
                        <!-- Email Address -->
                        <div class="col-md-4 mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" type="email" name="email" :value="old('email')"
                                autocomplete="username" />
                            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                        </div>

                        <div class="col-md-4 mt-4">
                            <x-input-label for="number" :value="__('Number')" />
                            <x-text-input id="number" type="number" name="number" :value="old('number')"
                                autocomplete="username" />
                            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                        </div>

                        <!-- Password -->
                        <div class="col-md-12 mt-4">
                            <x-input-label for="service" :value="__('Service')" />
                            <select id="service" name="service" class="form-select">
                                <option selected>--Select a Service--</option>
                                @foreach ($services as $service)
                                    <option value={{ $service->id }}>{{ $service->name }}</option>
                                @endforeach
                            </select>
                            {{-- <x-input-error :messages="$errors->get('role')" class="mt-2" /> --}}
                        </div>

                        <!-- Remember Me -->
                        <div class="col-md-12 mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                            {{-- <x-input-error :messages="$errors->get('description')" class="mt-2" /> --}}
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit ms-3" class="btn btn-primary d-none d-md-block">Submit</button>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit ms-3" class="btn btn-primary contactSubmitButton d-block d-md-none">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Error Toast Notification --}}
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header errorToast-header">
                <strong class="me-auto errorToastHeader"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body errorToastBody">

            </div>
        </div>
    </div>

    <footer class="text-center py-3 mt-auto w-100">
        <div class="container">
            <div class="mb-3">
                <a href="#link1" class="btn btn-facebook btn-sm mx-1 rounded-circle btn-no-hover"><i
                        class="bi bi-facebook"></i></a>
                <a href="#link2" class="btn btn-youtube btn-sm mx-1 rounded-circle btn-no-hover"><i
                        class="bi bi-youtube"></i></a>
                <a href="#link3" class="btn btn-instagram btn-sm mx-1 rounded-circle btn-no-hover"><i
                        class="bi bi-instagram"></i></a>
                <a href="#link4" class="btn btn-twitter btn-sm mx-1 rounded-circle btn-no-hover"><i
                        class="bi bi-twitter"></i></a>
            </div>
            <p class="mb-0">&copy; 2024 SBStudios. All rights reserved.</p>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
</body>

<script>
    const slideObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('slide-in-left');
            }
        });
    });

    const fadeObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    });

    const animationElements = document.querySelectorAll('.animationHidden');
    animationElements.forEach(element => {
        slideObserver.observe(element);
    });

    const fadeElements = document.querySelectorAll('.fadeHidden');
    fadeElements.forEach(element => {
        fadeObserver.observe(element);
    });

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
        const mobileNavbarBrand = document.querySelector('.mobileNavbar-brand');
        const toggleSidebar = document.getElementById('toggleSidebar');
        const loginLink = document.getElementById('loginLink');
        const dropdownMenuButton = document.getElementById('dropdownMenuButton');
        const navbarSupportedContent = document.getElementById('navbarSupportedContent');

        window.addEventListener("scroll", () => {
            if (window.scrollY > 40) {
                navbar.classList.add("scrolled");
                navbarBrand.classList.add('visible');
                mobileNavbarBrand.classList.add('visible');
                toggleSidebar.classList.add('afterScroll');
                if (loginLink) {
                    loginLink.classList.add('afterScroll');
                }
                if (dropdownMenuButton) {
                    dropdownMenuButton.classList.add('afterScrollMenu');
                }
                if (navbarSupportedContent) {
                    navbarSupportedContent.classList.add('afterScrollMenu');
                }
            } else {
                navbar.classList.remove("scrolled");
                navbarBrand.classList.remove('visible');
                mobileNavbarBrand.classList.remove('visible');
                toggleSidebar.classList.remove('afterScroll');
                if (loginLink) {
                    loginLink.classList.remove('afterScroll');
                }
                if (dropdownMenuButton) {
                    dropdownMenuButton.classList.remove('afterScrollMenu');
                }
                if (navbarSupportedContent) {
                    navbarSupportedContent.classList.remove('afterScrollMenu');
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

    const firstServiceItem = document.getElementById("service-item-1");
    if (!firstServiceItem.classList.contains('active')) {
        firstServiceItem.classList.add('active');
    }

    const firstService = document.getElementById("service-1");
    if (!firstService.classList.contains('active')) {
        firstService.classList.add('active');
    }

    function showService(event, serviceId) {
        event.preventDefault();

        const newServiceItemId = "service-item-" + serviceId;
        const newserviceId = "service-" + serviceId;
        document.querySelectorAll('.page').forEach(page => {
            page.classList.remove('active');
        });
        document.querySelectorAll('.service-item').forEach(page => {
            page.classList.remove('active');
        });

        // Show the selected page
        document.getElementById(newserviceId).classList.add('active');
        document.getElementById(newServiceItemId).classList.add('active');
    }

    function showServiceDropdown(selectElement) {
        const serviceId = selectElement.value;

        const newserviceId = "service-" + serviceId;
        document.querySelectorAll('.page').forEach(page => {
            page.classList.remove('active');
        });

        // Show the selected page
        document.getElementById(newserviceId).classList.add('active');
    }

    function scrollToContact(serviceId, contactContainerId) {
        event.preventDefault();

        const contactContainer = document.getElementById(contactContainerId);
        contactContainer.scrollIntoView({behavior: 'smooth'});

        const service = document.getElementById('service');
        service.value = serviceId;
    }

    if (typeof successMessage !== 'undefined' && successMessage) {
        const toastLiveExample = document.getElementById('liveToast');
        const toast = new bootstrap.Toast(toastLiveExample);
        toast.show();

        if (toast) {
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }
    }



    document.getElementById('submitForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const fields = [{
                id: 'name',
                header: 'Name is required',
                message: 'Please enter your name.'
            },
            {
                id: 'email',
                header: 'Email is required.',
                message: 'Please enter your email.'
            },
            {
                id: 'number',
                header: 'Number is required.',
                message: 'Please enter your number.'
            },
            {
                id: 'service',
                header: 'Service is required.',
                message: 'Please select a service.'
            },
            {
                id: 'description',
                header: 'Description is required.',
                message: 'Please enter a description.'
            },
        ];

        let formValid = true;


        for (const field of fields) {
            const input = document.getElementById(field.id);
            const value = (input.tagName === 'SELECT') ? input.value : input.value.trim();

            if (!value || (input.tagName === 'SELECT' && value === '--Select a Service--')) {
                formValid = false;

                input.style.border = "2px solid red";
                const errorToastElement = document.getElementById("errorToast");
                const toastHeader = errorToastElement.querySelector('.toast-header .errorToastHeader');
                const toastBody = errorToastElement.querySelector('.errorToastBody');

                toastHeader.innerText = field.header;
                toastBody.innerText = field.message;

                const errorToast = new bootstrap.Toast(errorToastElement);
                errorToast.show();
                break;
            } else {
                input.style.border = "";
            }
        }

        if (formValid) {
            this.submit();
        }
    });
</script>

</html>
