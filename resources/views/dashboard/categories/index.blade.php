@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <x-success />

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
                <h3 class="fw-bold mb-0">
                    Job Categories
                    @if(request()->input('archived') == 'true')
                        <span class="badge bg-secondary ms-2">Archived</span>
                    @endif
                </h3>

                <div class="d-flex gap-2">
                    @if(request()->input('archived') == 'true')
                        <a href="{{ route('dashboard.categories.index') }}"
                           class="btn btn-outline-dark btn-sm">
                            <i class="fa-solid fa-layer-group me-1"></i>
                            Active Categories
                        </a>
                    @else
                        <a href="{{ route('dashboard.categories.create') }}"
                           class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-plus me-1"></i>
                            Add Category
                        </a>

                        <a href="{{ route('dashboard.categories.index', ['archived' => 'true']) }}"
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
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="fw-semibold">
                                        {{ $category->name }}
                                    </td>

                                    <td class="text-muted small">
                                        {{ $category->created_at->format('Y-m-d | h:i A') }}
                                    </td>

                                    <td class="text-center">
                                        @if(request()->input('archived') == 'true')

                                            <a href="{{ route('dashboard.categories.restore', $category->id) }}"
                                               class="btn btn-outline-primary btn-sm"
                                               title="Restore">
                                                <i class="fa-solid fa-rotate-right"></i>
                                            </a>

                                            <form action="{{ route('dashboard.categories.delete', $category->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this category?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-outline-warning btn-sm"
                                                        title="Delete permanently">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>

                                        @else

                                            <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                                               class="btn btn-outline-success btn-sm"
                                               title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form action="{{ route('dashboard.categories.destroy', $category->id) }}"
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
                                    <td colspan="3" class="text-center py-5 text-muted">
                                        <i class="fa-regular fa-folder-open fs-3 mb-2 d-block"></i>
                                        No categories found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="card-footer bg-white border-0">
                    <div class="d-flex justify-content-end">
                        {{ $categories->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
