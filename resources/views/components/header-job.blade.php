<!-- Page Header -->
    <header class="page-header">
        <div class="container-adaptive page-header-content">
            <nav aria-label="breadcrumb" class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Available Jobs</li>
                </ol>
            </nav>
            <h1 class="page-title">
                Hello, <span class="text-primary fw-semibold">{{ auth()->user()->name ?? '' }}</span></h1>
            <p class="page-subtitle">Browse over 1,240 jobs in various tech fields from top companies in Egypt and
                worldwide</p>

            <div class="stats-bar">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fa-solid fa-briefcase"></i></div>
                    <div class="stat-content">
                        <h4>{{ number_format($totalJobs) }}</h4>
                        <p>Available Jobs</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon"><i class="fa-solid fa-building"></i></div>
                    <div class="stat-content">
                        <h4>{{ number_format($totalCompanies) }}</h4>
                        <p>Partner Companies</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
                    <div class="stat-content">
                        <h4>{{ number_format($totalUsers) }}</h4>
                        <p>Job Seekers</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon"><i class="fa-solid fa-check-circle"></i></div>
                    <div class="stat-content">
                        <h4>98%</h4>
                        <p>Success Rate</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Filter Section -->
    <section class="filter-section py-4">
        <div class="container">

            <div class="row align-items-center g-3">

                <!-- Search -->
                <div class="col-lg-4">
                    <form action="{{ route('frontend.job-vacancy.index') }}" method="GET">
                        <div class="input-group shadow-sm">

                            <span class="input-group-text bg-white">
                                <i class="fa-solid fa-search text-muted"></i>
                            </span>

                            <input type="text" name="search" class="form-control"
                                placeholder="Search job title, company, or skill..." value="{{ request('search') }}">

                            <button class="btn btn-primary" type="submit">
                                Search
                            </button>

                        </div>
                    </form>
                </div>

                <!-- Filters -->
                <div class="col-lg-8">
                    <div class="d-flex flex-wrap gap-2 justify-content-lg-end">

                        <a href="{{ route('frontend.job-vacancy.index') }}" class="btn btn-outline-primary btn-sm text-decoration-none
                               {{ request('filter') ? '' : 'active' }}">
                            All Jobs
                        </a>

                        <a href="{{ route('frontend.job-vacancy.index', ['filter' => 'full-time']) }}" class="btn btn-outline-primary btn-sm text-decoration-none
                               {{ request('filter') == 'full-time' ? 'active' : '' }}">
                            Full-Time
                        </a>

                        <a href="{{ route('frontend.job-vacancy.index', ['filter' => 'remote']) }}" class="btn btn-outline-primary btn-sm text-decoration-none
                               {{ request('filter') == 'remote' ? 'active' : '' }}">
                            Remote
                        </a>

                        <a href="{{ route('frontend.job-vacancy.index', ['filter' => 'hybrid']) }}" class="btn btn-outline-primary btn-sm text-decoration-none
                               {{ request('filter') == 'hybrid' ? 'active' : '' }}">
                            Hybrid
                        </a>

                        <a href="{{ route('frontend.job-vacancy.index', ['filter' => 'contract']) }}" class="btn btn-outline-primary btn-sm text-decoration-none
                               {{ request('filter') == 'contract' ? 'active' : '' }}">
                            Contract
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>
