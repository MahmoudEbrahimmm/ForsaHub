@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 text-center m-auto">
                <x-success />
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <h3 class="fw-bold mb-3 mt-5">Job Categories {{ request()->input('archived') == 'true' ? '(Archived)' : '' }}</h3>
                    <div>
                        @if(request()->input('archived') == 'true')
                        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-dark me-2">Active Categories</a>
                        @else
                        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary">Add Category</a>
                        <a href="{{ route('dashboard.categories.index', ['archived' => 'true']) }}" class="btn btn-dark me-2">Archived Categories</a>
                        @endif
                    </div>
                </div>
                <table class="table bg-white p-3 rounded shadow-sm">
                    <thead>
                        <tr>
                            <td>Name</td>
                        <td class="fw-bold">Created At</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at->format('Y-m-d h:i A') }}</td>
                                <td>
                                    @if(request()->input('archived') == 'true')
                                    <a href="{{ route('dashboard.categories.restore', $category->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-rotate-right"></i></a>
                                    <form action="{{ route('dashboard.categories.delete', $category->id) }}" method="POST"
                                        style="display: inline"
                                        onsubmit="return confirm('Are you sure you want to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    @else
                                    <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST"
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
                {{ $categories->withQueryString()->links() }}
            </div>
        </div>
    </div>

@endsection
