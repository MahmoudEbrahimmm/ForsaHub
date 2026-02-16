@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
                    <h3>Details {{ $application->user->name }}</h3>

                    <div class="d-flex gap-2">
                        <a href="{{ route('dashboard.applications.index') }}" class="btn btn-dark">
                            Back
                        </a>

                        <a href="{{ route('dashboard.applications.edit', $application->id) }}"
                           class="btn btn-success">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <form action="{{ route('dashboard.applications.destroy', $application->id) }}"
                              method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Application Info --}}
                <table class="table bg-white p-3 rounded shadow-sm">
                    <tbody>
                        <tr>
                            <td class="fw-bold">Applicant</td>
                            <td>{{ $application->user->name }}</td>
                        </tr>

                        <tr>
                            <td class="fw-bold">Job Vacancy</td>
                            <td>{{ $application->JobVacancy->title }}</td>
                        </tr>

                        <tr>
                            <td class="fw-bold">Company</td>
                            <td>{{ $application->JobVacancy->company->name }}</td>
                        </tr>

                        <tr>
                            <td class="fw-bold">Status</td>
                            <td>{{ $application->status }}</td>
                        </tr>

                        <tr>
                            <td class="fw-bold">Resume</td>
                            <td>{{ $application->resume->file_url }}</td>
                        </tr>
                    </tbody>
                </table>

                {{-- Resume --}}
                <table class="table bg-white p-3 rounded shadow-sm">
                    <tbody>
                        <tr>
                            <td class="fw-bold">Summary</td>
                            <td>{{ $application->resume->summary }}</td>
                        </tr>

                        <tr>
                            <td class="fw-bold">Skills</td>
                            <td>{{ $application->resume->skills }}</td>
                        </tr>

                        <tr>
                            <td class="fw-bold">Experience</td>
                            <td>{{ $application->resume->experience }}</td>
                        </tr>

                        <tr>
                            <td class="fw-bold">Created At</td>
                            <td>{{ $application->created_at->format('Y-m-d - h:i A') }}</td>
                        </tr>
                    </tbody>
                </table>

                {{-- AI Feedback --}}
                <table class="table bg-white p-3 rounded shadow-sm">
                    <tbody>
                        <tr>
                            <td class="fw-bold">AI Score</td>
                            <td>{{ $application->ai_generated_score }}</td>
                        </tr>

                        <tr>
                            <td class="fw-bold">AI Feedback</td>
                            <td>{{ $application->ai_generated_feedback }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
