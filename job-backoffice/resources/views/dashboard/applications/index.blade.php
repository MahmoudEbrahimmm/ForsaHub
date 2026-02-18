@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 text-center m-auto">
                <x-success />
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <h3 class="fw-bold mb-3 mt-5">Job applications {{ request()->input('archived') == 'true' ? '(Archived)' : '' }}</h3>
                    <div>
                        @if(request()->input('archived') == 'true')
                        <a href="{{ route('dashboard.applications.index') }}" class="btn btn-dark me-2">Active applications</a>
                        @else
                        <a href="{{ route('dashboard.applications.index', ['archived' => 'true']) }}" class="btn btn-dark me-2">Archived applications</a>
                        @endif
                    </div>
                </div>
                <table class="table bg-white p-3 rounded shadow-sm">
                    <thead>
                        <tr>
                            <td>Applicant Name</td>
                            <td>Postion (Job Vacancy)</td>
                            <td>Company</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>
                                <td>{{ $application->user->name ?? 'Deleted-account' }}</td>
                                <td>{{ $application->jobVacancy->title }}</td>
                                <td>{{ $application->jobVacancy->company->name }}</td>
                                <td>{{ $application->status }}</td>
                                <td>
                                    @if(request()->input('archived') == 'true')
                                    <a href="{{ route('dashboard.applications.restore', $application->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-rotate-right"></i></a>
                                <form action="{{ route('dashboard.applications.delete', $application->id) }}" method="POST"
                                        style="display: inline"
                                        onsubmit="return confirm('Are you sure you want to delete this application?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    @else
                                    <a href="{{ route('dashboard.applications.show', $application->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('dashboard.applications.edit', $application->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('dashboard.applications.destroy', $application->id) }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $applications->withQueryString()->links() }}
            </div>
        </div>
    </div>

@endsection
