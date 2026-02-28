<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            background-color: #003366;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #003366, #00AEEF);
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .sidebar .nav-link {
            color: #eee;
            padding: 12px 16px;
            margin-bottom: 6px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .sidebar h5 a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .top-navbar {
            background-color: #fff;
            border-radius: 16px;
        }

        main {
            background-color: #fff;
            border-radius: 20px;
            min-height: 80vh;
        }

        .logout-btn {
            border-radius: 20px;
        }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->
    <aside class="sidebar p-4">
        <h5 class="text-center mb-5">
            <a href="{{ route('home') }}">NTI Career</a>
        </h5>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}"
                   class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <i class="fa-solid fa-house me-2"></i> Dashboard
                </a>
            </li>

            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('dashboard.companies.index') }}"
                       class="nav-link {{ request()->routeIs('dashboard.companies.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-building me-2"></i> Companies
                    </a>
                </li>
            @endif

            @if (auth()->user()->role == 'company-owner')
                <li class="nav-item">
                    <a href="{{ route('dashboard.my-company.show') }}"
                       class="nav-link {{ request()->routeIs('dashboard.my-company.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-building me-2"></i> My Company
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a href="{{ route('dashboard.applications.index') }}"
                   class="nav-link {{ request()->routeIs('dashboard.applications.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-file-lines me-2"></i> Applications
                </a>
            </li>

            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('dashboard.categories.index') }}"
                       class="nav-link {{ request()->routeIs('dashboard.categories.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-layer-group me-2"></i> Categories
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a href="{{ route('dashboard.vacances.index') }}"
                   class="nav-link {{ request()->routeIs('dashboard.vacances.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-briefcase me-2"></i> Vacancies
                </a>
            </li>

            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('dashboard.contacts.index') }}"
                       class="nav-link {{ request()->routeIs('dashboard.contacts.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-address-book"></i> Contacts
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.users.index') }}"
                       class="nav-link {{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users me-2"></i> Users
                    </a>
                </li>
            @endif
        </ul>
    </aside>

    <!-- Main -->
    <div class="flex-fill p-4">

        <!-- Top Navbar -->
        <nav class="navbar top-navbar px-4 py-3 shadow-sm mb-4">
            <span class="fw-semibold">
                👋 Welcome, {{ Auth::user()->name ?? 'Admin' }}
            </span>

            <div class="ms-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm logout-btn">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="p-4 shadow-sm">
            @yield('content')
        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
