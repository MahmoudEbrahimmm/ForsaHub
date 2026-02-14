<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-end bg-dark text-white" id="sidebar-wrapper" style="width: 250px;">
        <div class="sidebar-heading text-center py-4 fs-5 fw-bold border-bottom">
            Dashboard
        </div>

        <div class="list-group list-group-flush">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-dark text-white">
                Dashboard
            </a>
            <a href="{{ route('companies.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
                Companies
            </a>
            <a href="{{ route('applications.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
                Job Applications
            </a>
            <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
                Job Categories
            </a>
            <a href="{{ route('Vacances.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
                Job Vacancies
            </a>
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
                Users
            </a>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper" class="w-100">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container-fluid">

                <button class="btn btn-outline-secondary" id="menu-toggle">
                    ☰
                </button>

                <div class="dropdown ms-auto">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid p-4">
            @yield('content')
        </div>

    </div>
</div>

</html>
