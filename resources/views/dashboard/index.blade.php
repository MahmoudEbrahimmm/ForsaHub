@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">

    {{-- Page Title --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Dashboard Overview</h2>
    </div>

    @if (auth()->user()->role == 'admin')

    {{-- Statistics Cards --}}
    <div class="row g-4 mb-5">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 rounded-4">
                <div class="card-body text-center">
                    <div class="mb-2 text-success fs-2">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <h6 class="text-muted mb-1">Users</h6>
                    <h3 class="fw-bold">{{ $activeUser }}</h3>
                    <small class="text-muted">All Users</small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 rounded-4">
                <div class="card-body text-center">
                    <div class="mb-2 text-danger fs-2">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <h6 class="text-muted mb-1">Total Jobs</h6>
                    <h3 class="fw-bold">{{ $totalJobs }}</h3>
                    <small class="text-muted">All Time</small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 rounded-4">
                <div class="card-body text-center">
                    <div class="mb-2 text-primary fs-2">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                    <h6 class="text-muted mb-1">Total Applications</h6>
                    <h3 class="fw-bold">{{ $jobApplication }}</h3>
                    <small class="text-muted">All Jobs</small>
                </div>
            </div>
        </div>

    </div>

    {{-- Most Applied Jobs --}}
    <div class="card border-0 shadow-sm rounded-4 mb-5">
        <div class="card-header bg-white fw-semibold">
            <i class="fa-solid fa-fire me-2 text-danger"></i>
            Most Applied Jobs
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Job Title</th>
                        <th>Company</th>
                        <th class="text-center">Applications</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mostJobs as $job)
                        <tr>
                            <td class="fw-semibold">{{ $job->title }}</td>
                            <td>{{ $job->company->name }}</td>
                            <td class="text-center">
                                <span class="badge bg-success">{{ $job->totalCount }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                No data available
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Top Converting Job Posts --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white fw-semibold">
            <i class="fa-solid fa-chart-line me-2 text-primary"></i>
            Top Converting Job Posts
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Job Title</th>
                        <th class="text-center">Views</th>
                        <th class="text-center">Applications</th>
                        <th class="text-center">Conversion Rate</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($convertionRates as $convert)
                        <tr>
                            <td class="fw-semibold">{{ $convert->title }}</td>
                            <td class="text-center">{{ $convert->viewCount }}</td>
                            <td class="text-center">{{ $convert->totalCount }}</td>
                            <td class="text-center">
                                <span class="badge bg-primary">
                                    {{ $convert->convertionRates }}%
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                No data available
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @endif
</div>
@endsection
