@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <x-success />

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
                <h3 class="fw-bold mb-0">
                    Job Vacancies
                    @if(request()->input('archived') == 'true')
                        <span class="badge bg-secondary ms-2">Archived</span>
                    @endif
                </h3>

                <div class="d-flex gap-2">
                    @if(request()->input('archived') == 'true')
                        <a href="{{ route('dashboard.vacances.index') }}"
                           class="btn btn-outline-dark btn-sm">
                            <i class="fa-solid fa-briefcase me-1"></i> Active Vacancies
                        </a>
                    @else
                        <a href="{{ route('dashboard.vacances.create') }}"
                           class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-plus me-1"></i> Add Vacancy
                        </a>

                        <a href="{{ route('dashboard.vacances.index', ['archived' => 'true']) }}"
                           class="btn btn-outline-dark btn-sm">
                            <i class="fa-solid fa-box-archive me-1"></i> Archived
                        </a>
                    @endif
                </div>
            </div>

            {{-- Table --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th style="width: 30%">Description</th>
                                <th>Location</th>
                                <th>Salary</th>
                                <th>Type</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vacances as $vacance)
                                <tr>
                                    <td class="fw-semibold">{{ $vacance->title }}</td>

                                    <td class="text-muted small">
                                        {{ Str::limit($vacance->description, 120) }}
                                    </td>

                                    <td>{{ $vacance->location }}</td>

                                    <td>
                                        {{ number_format($vacance->salary, 2) }}
                                    </td>

                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $vacance->type }}
                                        </span>
                                    </td>

                                    <td class="text-center">
                                        @if(request()->input('archived') == 'true')

                                            <a href="{{ route('dashboard.vacances.restore', $vacance->id) }}"
                                               class="btn btn-outline-primary btn-sm"
                                               title="Restore">
                                                <i class="fa-solid fa-rotate-right"></i>
                                            </a>

                                            <form action="{{ route('dashboard.vacances.delete', $vacance->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this vacancy?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-outline-warning btn-sm"
                                                        title="Delete permanently">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>

                                        @else

                                            <a href="{{ route('dashboard.vacances.show', $vacance->id) }}"
                                               class="btn btn-outline-primary btn-sm"
                                               title="View">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ route('dashboard.vacances.edit', $vacance->id) }}"
                                               class="btn btn-outline-success btn-sm"
                                               title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form action="{{ route('dashboard.vacances.destroy', $vacance->id) }}"
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
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="fa-regular fa-folder-open fs-3 mb-2 d-block"></i>
                                        No vacancies found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="card-footer bg-white border-0">
                    <div class="d-flex justify-content-end">
                        {{ $vacances->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
