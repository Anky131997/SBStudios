<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Expandable Sidebar</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sidebar Styles */
        .sidebar {
            width: 90px;
            position: fixed;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            top: 0;
            left: 0;
            height: 100vh;
            background-color: #343a40;
            color: white;
            transition: width 0.5s ease !important;
            overflow: hidden;
            z-index: 1000;
            font-family: 'Fira Sans Condensed';
        }

        /* Sidebar Expanded on Hover */
        .sidebar:hover {
            transition: width 0.5s ease !important;
            width: 200px;
        }

        /* Sidebar Item */
        .sidebar .nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
        }

        /* Sidebar Icon */
        .sidebar .nav-link i {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        /* Sidebar Text (hidden by default, shown on hover) */
        .sidebar .nav-link span {
            white-space: nowrap;
            overflow: hidden;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .sidebar:hover .nav-link span {
            opacity: 1;
            text-align: right !important;
        }

        .sidebar-footer {
            padding: 0 !important;
            background-color: #004d40 !important;
        }

        .sidebar-footer .nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Main Content Area */
        .content {
            margin-left: 60px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .sidebar:hover~.content {
            margin-left: 200px;
        }

        /* Hide sidebar on smaller screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                display: none;
            }

            .sidebar.show {
                display: block;
                width: 200px;
            }

            .content {
                margin-left: 0;
            }

            .content.sidebar-open {
                margin-left: 200px;
            }
        }

        /* Mobile Toggle Button */
        .toggle-btn {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1100;
        }
    </style>
</head>

<body>
    <!-- Toggle Button for Mobile -->
    <button class="btn btn-primary toggle-btn d-md-none" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link mx-3 my-2">
                        <i class="bi bi-house-fill"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link mx-3 my-2">
                        <i class="bi bi-gear-fill"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link mx-3 my-2">
                        <i class="bi bi-person-circle"></i>
                        <span>About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-footer">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white m-3">
                        <i class="bi bi-envelope"></i>
                        <span>Contact</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap Icons and JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <!-- Custom JavaScript to Toggle Sidebar -->
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');
            sidebar.classList.toggle('show');
            content.classList.toggle('sidebar-open');
        }
    </script>
</body>

</html>
