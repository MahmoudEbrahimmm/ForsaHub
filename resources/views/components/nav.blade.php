<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <span class="brand-text">NTI CAREER</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="mainNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.job-vacancy.*') ? 'active' : '' }}"
                        href="{{ route('frontend.job-vacancy.index') }}">Find Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->url() == 'https://nti.sci.eg/about_nti.html' ? 'active' : '' }}"
                        href="https://nti.sci.eg/about_nti.html" target="_blank">About NTI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->url() == 'https://nti.sci.eg/dey/catcr.php' ? 'active' : '' }}"
                        href="https://nti.sci.eg/dey/catcr.php">Tracks</a>
                </li>

                @if(auth()->check() && auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}"
                            class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                            Dashboard
                        </a>
                    </li>
                @endif

                @if(auth()->check() && auth()->user()->role == 'company-owner')
                    <li class="nav-item">
                        <a href="{{ route('dashboard.my-company.show') }}"
                            class="nav-link {{ request()->routeIs('dashboard.my-company.*') ? 'active' : '' }}">
                            My Company
                        </a>
                    </li>
                @endif
            </ul>

            <!-- Auth Buttons for Mobile -->
            <div class="d-lg-none auth-buttons mt-2 d-flex">
                @guest
                    <a href="{{ route('login') }}" class="btn-login me-2">
                        <i class="fa-solid fa-sign-in-alt"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="btn-register">
                        <i class="fa-solid fa-user-plus"></i> Register
                    </a>
                @else
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn-login me-2">
                            <i class="fa-solid fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                @endguest
            </div>
        </div>

        <!-- Auth Buttons for Desktop -->
        <div class="d-none d-lg-flex auth-buttons">
            @guest
                <a href="{{ route('login') }}" class="btn-login me-2">
                    <i class="fa-solid fa-sign-in-alt"></i> Login
                </a>
                <a href="{{ route('register') }}" class="btn-register">
                    <i class="fa-solid fa-user-plus"></i> Register
                </a>
            @else
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-login me-2">
                        <i class="fa-solid fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>
