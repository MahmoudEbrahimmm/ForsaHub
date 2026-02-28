@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <x-success />

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
                <h3 class="fw-bold mb-0">
                    Job Companies
                    @if(request()->input('archived') == 'true')
                        <span class="badge bg-secondary ms-2">Archived</span>
                    @endif
                </h3>

                <div class="d-flex gap-2">
                    @if(request()->input('archived') == 'true')
                        <a href="{{ route('dashboard.companies.index') }}"
                           class="btn btn-outline-dark btn-sm">
                            <i class="fa-solid fa-building me-1"></i>
                            Active Companies
                        </a>
                    @else
                        <a href="{{ route('dashboard.companies.create') }}"
                           class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-plus me-1"></i>
                            Add Company
                        </a>

                        <a href="{{ route('dashboard.companies.index', ['archived' => 'true']) }}"
                           class="btn btn-outline-dark btn-sm">
                            <i class="fa-solid fa-box-archive me-1"></i>
                            Archived
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
                                <th>Name</th>
                                <th>Address</th>
                                <th>Website</th>
                                <th>Owner</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($companies as $company)
                                <tr>
                                    <td class="fw-semibold">
                                        {{ $company->name }}
                                    </td>

                                    <td>
                                        {{ $company->address }}
                                    </td>

                                    <td>
                                        @if ($company->website)
                                            <a href="{{ $company->website }}"
                                               target="_blank"
                                               class="btn btn-outline-primary btn-sm">
                                                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i>
                                                Visit
                                            </a>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $company->owner->name ?? 'N/A' }}
                                    </td>

                                    <td class="text-center">
                                        @if (request()->input('archived') == 'true')

                                            <a href="{{ route('dashboard.companies.restore', $company->id) }}"
                                               class="btn btn-outline-primary btn-sm"
                                               title="Restore">
                                                <i class="fa-solid fa-rotate-right"></i>
                                            </a>

                                            <form action="{{ route('dashboard.companies.delete', $company->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this company?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-outline-warning btn-sm"
                                                        title="Delete permanently">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>

                                        @else

                                            <a href="{{ route('dashboard.companies.show', $company->id) }}"
                                               class="btn btn-outline-primary btn-sm"
                                               title="View">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ route('dashboard.companies.edit', $company->id) }}"
                                               class="btn btn-outline-success btn-sm"
                                               title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form action="{{ route('dashboard.companies.destroy', $company->id) }}"
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
                                        No companies found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="card-footer bg-white border-0">
                    <div class="d-flex justify-content-end">
                        {{ $companies->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
