@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">

    {{-- Page Title --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Dashboard Overview</h2>
    </div>
    @if (auth()->user()->role == 'admin')


    {{-- Statistics Cards --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2 text-success fs-3">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <h6 class="text-muted">Active Users</h6>
                    <h3 class="fw-bold">{{ $activeUser }}</h3>
                    <small class="text-muted">Last 30 Days</small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2 text-danger fs-3">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <h6 class="text-muted">Total Jobs</h6>
                    <h3 class="fw-bold">{{ $totalJobs }}</h3>
                    <small class="text-muted">All Time</small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2 text-primary fs-3">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                    <h6 class="text-muted">Total Applications</h6>
                    <h3 class="fw-bold">{{$jobApplication}}</h3>
                    <small class="text-muted">All Jobs</small>
                </div>
            </div>
        </div>

    </div>

    {{-- Most Applied Jobs --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white fw-bold">
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
                    @foreach ($mostJobs as $job)
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->company->name }}</td>
                        <td class="text-center">{{ $job->totalCount }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Top Converting Job Posts --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-bold">
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
                    @foreach ($convertionRates as $convert)

                    @endforeach
                    <tr>
                        <td>{{ $convert->title }}</td>
                        <td class="text-center">{{ $convert->viewCount }}</td>
                        <td class="text-center">{{ $convert->totalCount }}</td>
                        <td class="text-center">
                            <span class="badge bg-primary">{{ $convert->convertionRates }}%</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

@endsection
