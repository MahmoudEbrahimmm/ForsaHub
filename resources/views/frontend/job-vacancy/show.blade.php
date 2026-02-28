@extends('layouts.frontend')
@section('content')
<x-header-job />
    <!-- Content -->
    <div class="py-5 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <x-success />
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <!-- Job Header -->
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
                                <div>
                                    <h3 class="fw-bold mb-1">
                                        {{ $jobVacancy->title }}
                                    </h3>
                                    <div class="text-muted small">
                                        {{ $jobVacancy->company->name ?? 'No Company' }}
                                        • {{ $jobVacancy->location }}
                                        • {{ ucfirst($jobVacancy->type) }}
                                    </div>
                                </div>

                                <div class="gap-4">
                                    <a href="{{ route('frontend.job-vacancy.index') }}"
                                       class="btn btn-outline-secondary">
                                        ← All Jobs
                                    </a>

                                    <a href="{{ route('frontend.job-vacancy.apply', $jobVacancy->id) }}"
                                       class="btn btn-primary btn-sm px-4">
                                        Apply Now
                                    </a>
                                </div>
                            </div>

                            <hr>

                            <!-- Job Info Grid -->
                            <div class="row g-4">

                                <div class="col-md-6">
                                    <div class="border rounded p-3 h-100">
                                        <div class="text-muted small">Salary</div>
                                        <div class="fw-semibold text-success fs-5">
                                            ${{ $jobVacancy->salary }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="border rounded p-3 h-100">
                                        <div class="text-muted small">Location</div>
                                        <div class="fw-semibold fs-6">
                                            {{ $jobVacancy->location }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="border rounded p-3 h-100">
                                        <div class="text-muted small">Job Type</div>
                                        <span class="badge bg-success-subtle text-success border">
                                            {{ ucfirst($jobVacancy->type) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="border rounded p-3 h-100">
                                        <div class="text-muted small">Company</div>
                                        <div class="fw-semibold">
                                            {{ $jobVacancy->company->name ?? 'No Company' }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="border rounded p-3 h-100">
                                        <div class="text-muted small">Views</div>
                                        <div class="fw-semibold">
                                            {{ $jobVacancy->viewCount ?? 0 }}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Description -->
                            <div class="mt-4">
                                <h6 class="fw-bold">Job Description</h6>
                                <p class="text-muted mb-0">
                                    {{ $jobVacancy->description }}
                                </p>
                            </div>

                            <!-- Footer -->
                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top text-muted small">
                                <span>
                                    Posted on {{ $jobVacancy->created_at->format('M d, Y') }}
                                </span>

                                <span>
                                    {{ $jobVacancy->created_at->diffForHumans() }}
                                </span>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
