@extends('layouts.frontend')
@section('header')
    <x-nav />
@endsection
@section('content')
    <x-header-job />
    <section class="latest-jobs-section" id="find_jobs">
        <div class="container">
            <!-- Jobs List -->
            <div class="jobs-list">
                <!-- Job Item -->
                @forelse ($jobs as $job)
                    <article class="job-item">
                        <div class="job-info">
                            <div class="job-header">
                                <h3 class="job-title">{{ $job->title }}</h3>
                                <div class="job-badges">
                                    <span class="badge badge-new">{{ $job->created_at->diffForHumans() }}</span>
                                    <span class="badge badge-remote">{{ $job->type }}</span>
                                </div>
                            </div>
                            <div class="job-company">{{ $job->location }}</div>
                            <div class="job-company">{{ $job->description }}</div>
                            <div class="job-tags">
                                <span>Company: <strong>{{ $job->company->name }}</strong></span>
                            </div>
                        </div>
                        <div class="job-meta">
                            <div class="job-type">
                                <i class="fa-solid fa-briefcase"></i>
                                {{ ucfirst($job->type) }}
                            </div>
                        </div>
                        <div class="job-actions">
                            <a href="{{ route('frontend.job-vacancy.show', $job->id) }}" class="btn-apply-job">Detals Job</a>
                        </div>
                    </article>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-5">
                            No jobs found
                        </td>
                    </tr>
                @endforelse
            </div>
            <div class="mt-4">
                {{ $jobs->withQueryString()->links() }}
            </div>
    </section>


@endsection
