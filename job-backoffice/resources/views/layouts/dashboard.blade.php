<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">
        <h5 class="text-center mb-4">Dashboard</h5>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}" class="nav-link text-white">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard.companies.index') }}" class="nav-link text-white">Companies</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard.applications.index') }}" class="nav-link text-white">Applications</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard.categories.index') }}" class="nav-link text-white">Categories</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard.Vacances.index') }}" class="nav-link text-white">Vacancies</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard.users.index') }}" class="nav-link text-white">Users</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-fill">

        <!-- Navbar -->
        <nav class="navbar navbar-light bg-white border-bottom px-4">
            <span class="navbar-text">
                Welcome, {{ Auth::user()->name ?? 'Admin Name' }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </nav>

        <!-- Page Content -->
        <div class="p-4">
            @yield('content')
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
