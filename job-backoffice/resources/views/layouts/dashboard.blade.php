<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css') }}">

</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->
    <aside class="sidebar bg-dark p-3">
        <h5 class="text-white mb-4 text-center">
            <i class="fa-solid fa-chart-line me-2"></i>Admin Panel
        </h5>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}"
                   class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <i class="fa-solid fa-house me-2"></i>Dashboard
                </a>
            </li>
            @if (auth()->user()->role == 'admin')
            <li class="nav-item">
                <a href="{{ route('dashboard.companies.index') }}"
                class="nav-link {{ request()->routeIs('dashboard.companies.*') ? 'active' : '' }}">
                <i class="fa-solid fa-building me-2"></i>Companies
            </a>
            </li>
            @endif
            @if (auth()->user()->role == 'company-owner')
            <li class="nav-item">
                <a href="{{ route('dashboard.my-company.show') }}"
                class="nav-link {{ request()->routeIs('dashboard.my-company.*') ? 'active' : '' }}">
                <i class="fa-solid fa-building me-2"></i>My Company
            </a>
            </li>
            @endif

            <li class="nav-item">
                <a href="{{ route('dashboard.applications.index') }}"
                   class="nav-link {{ request()->routeIs('dashboard.applications.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-file-lines me-2"></i>Applications
                </a>
            </li>
            @if (auth()->user()->role == 'admin')
            <li class="nav-item">
                <a href="{{ route('dashboard.categories.index') }}"
                class="nav-link {{ request()->routeIs('dashboard.categories.*') ? 'active' : '' }}">
                <i class="fa-solid fa-layer-group me-2"></i>Categories
            </a>
            </li>
        @endif

            <li class="nav-item">
                <a href="{{ route('dashboard.vacances.index') }}"
                   class="nav-link {{ request()->routeIs('dashboard.vacances.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-briefcase me-2"></i>Vacancies
                </a>
            </li>
            @if (auth()->user()->role == 'admin')
            <li class="nav-item">
                <a href="{{ route('dashboard.users.index') }}"
                class="nav-link {{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users me-2"></i>Users
            </a>
            </li>
        @endif
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="flex-fill">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand bg-white border-bottom px-4 shadow-sm">
            <span class="navbar-text fw-semibold">
                Welcome, {{ Auth::user()->name ?? 'Admin' }}
            </span>

            <div class="ms-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm">
                        <i class="fa-solid fa-right-from-bracket me-1"></i>Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="p-4">
            @yield('content')
        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
