<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ryan BarberKing</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .sidebar-open #content-area {
            margin-left: 16rem; /* Adjust based on your sidebar width */
        }

        .sidebar-closed #content-area {
            margin-left: 0;
        }

        .sidebar-open #sidebar {
            transform: translateX(0);
        }

        .sidebar-closed #sidebar {
            transform: translateX(-100%);
        }
    </style>
</head>

<body class="bg-gray-100 sidebar-closed">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Sidebar Toggle Button -->
                <div class="flex items-center">
                    <button id="sidebar-toggle" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                        <img src="{{ asset('assets/img/svg/list-svgrepo-com.svg') }}" class="h-6 w-6" alt="Toggle Sidebar">
                    </button>
                </div>

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="#" class="font-bold text-xl text-gray-800 ml-2">Ryan BarberKing</a>
                </div>

                <!-- User Info -->
                <div class="flex items-center relative">
                    @if(Auth::check())
                        <div class="flex items-center cursor-pointer" id="user-menu-button">
                            <img src="{{ asset('assets/' . Auth::user()->photo_path) }}" class="h-8 w-8 rounded-full object-cover" alt="User Photo">
                            <img src="{{ asset('assets/img/svg/arrow-down-339-svgrepo-com.svg') }}" class="h-4 w-4 ml-2" alt="Arrow Down">
                        </div>
                        <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
                            <a href="{{ route('users.edit', Auth::user()->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profile</a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside id="sidebar" class="bg-gray-800 text-white h-screen w-64 fixed left-0 top-0 transform transition-transform">
        <div class="p-4 flex justify-between items-center">
            <h2 class="text-xl font-bold">Sidebar Menu</h2>
            <button id="sidebar-close" class="text-white focus:outline-none">
                <img src="{{ asset('assets/img/svg/x-symbol-svgrepo-com.svg') }}" class="h-6 w-6" alt="Close Sidebar">
            </button>
        </div>
        <ul class="mt-4">
            @if(Auth::check() && Auth::user()->role === 'admin')
                <li><a href="{{ route('barberman') }}" class="block py-2 px-4 text-sm hover:bg-gray-700">Barberman</a></li>
                <li><a href="{{ route('layanan') }}" class="block py-2 px-4 text-sm hover:bg-gray-700">Layanan</a></li>
                <li><a href="{{ route('outlet') }}" class="block py-2 px-4 text-sm hover:bg-gray-700">Outlet</a></li>
            @elseif(Auth::check() && Auth::user()->role === 'barberman')
                <li><a href="{{ route('reservation.show') }}" class="block py-2 px-4 text-sm hover:bg-gray-700">Reservasi</a></li>
            @endif
        </ul>
    </aside>

    <!-- Content area -->
    <div id="content-area" class="transition-all p-8">
        <!-- Main content -->
        <div class="bg-white rounded-lg shadow-md p-8">
            @yield('content')
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        document.getElementById('sidebar-toggle').addEventListener('click', function () {
            var body = document.body;
            body.classList.toggle('sidebar-open');
            body.classList.toggle('sidebar-closed');
        });

        document.getElementById('sidebar-close').addEventListener('click', function () {
            var body = document.body;
            body.classList.toggle('sidebar-open');
            body.classList.toggle('sidebar-closed');
        });

        // Initial state
        document.body.classList.add('sidebar-closed');

        // User menu toggle
        document.getElementById('user-menu-button').addEventListener('click', function () {
            var menu = document.getElementById('user-menu');
            menu.classList.toggle('hidden');
        });

        // Close menu if clicked outside
        window.addEventListener('click', function(event) {
            var menu = document.getElementById('user-menu');
            var button = document.getElementById('user-menu-button');
            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
