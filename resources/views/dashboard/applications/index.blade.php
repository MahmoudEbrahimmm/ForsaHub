@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <x-success />

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
                <h3 class="fw-bold mb-0">
                    Job Applications
                    @if(request()->input('archived') == 'true')
                        <span class="badge bg-secondary ms-2">Archived</span>
                    @endif
                </h3>

                <div class="d-flex gap-2">
                    @if(request()->input('archived') == 'true')
                        <a href="{{ route('dashboard.applications.index') }}"
                           class="btn btn-outline-dark btn-sm">
                            <i class="fa-solid fa-file-lines me-1"></i>
                            Active Applications
                        </a>
                    @else
                        <a href="{{ route('dashboard.applications.index', ['archived' => 'true']) }}"
                           class="btn btn-outline-dark btn-sm">
                            <i class="fa-solid fa-box-archive me-1"></i>
                            Archived Applications
                        </a>
                    @endif
                </div>
            </div>

            {{-- Table Card --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Applicant</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($applications as $application)
                                <tr>
                                    <td class="fw-semibold">
                                        {{ $application->user->name ?? 'Deleted account' }}
                                    </td>

                                    <td>{{ $application->jobVacancy->title }}</td>

                                    <td>{{ $application->jobVacancy->company->name }}</td>

                                    <td>
                                        @php
                                            $statusColors = [
                                                'pending' => 'warning',
                                                'accepted' => 'success',
                                                'rejected' => 'danger',
                                            ];
                                        @endphp

                                        <span class="badge bg-{{ $statusColors[$application->status] ?? 'secondary' }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </td>

                                    <td class="text-center">
                                        @if(request()->input('archived') == 'true')

                                            <a href="{{ route('dashboard.applications.restore', $application->id) }}"
                                               class="btn btn-outline-primary btn-sm"
                                               title="Restore">
                                                <i class="fa-solid fa-rotate-right"></i>
                                            </a>

                                            <form action="{{ route('dashboard.applications.delete', $application->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this application?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-outline-warning btn-sm"
                                                        title="Delete permanently">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>

                                        @else

                                            <a href="{{ route('dashboard.applications.show', $application->id) }}"
                                               class="btn btn-outline-primary btn-sm"
                                               title="View">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ route('dashboard.applications.edit', $application->id) }}"
                                               class="btn btn-outline-success btn-sm"
                                               title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form action="{{ route('dashboard.applications.destroy', $application->id) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-outline-danger btn-sm"
                                                        title="Archive">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>

                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="fa-regular fa-folder-open fs-3 mb-2 d-block"></i>
                                        No applications found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="card-footer bg-white border-0">
                    <div class="d-flex justify-content-end">
                        {{ $applications->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
