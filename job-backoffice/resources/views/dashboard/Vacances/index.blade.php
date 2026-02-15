@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 text-center m-auto">
                <x-success />
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <h3 class="fw-bold mb-3 mt-5">Job companies {{ request()->input('archived') == 'true' ? '(Archived)' : '' }}</h3>
                    <div>
                        @if(request()->input('archived') == 'true')
                        <a href="{{ route('dashboard.companies.index') }}" class="btn btn-dark me-2">Active companies</a>
                        @else
                        <a href="{{ route('dashboard.companies.create') }}" class="btn btn-primary">Add company</a>
                        <a href="{{ route('dashboard.companies.index', ['archived' => 'true']) }}" class="btn btn-dark me-2">Archived companies</a>
                        @endif
                    </div>
                </div>
                <table class="table bg-white p-3 rounded shadow-sm">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>
                                    @if(request()->input('archived') == 'true')
                                    <a href="{{ route('dashboard.companies.restore', $company->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-rotate-right"></i></a>
                                    <form action="{{ route('dashboard.companies.delete', $company->id) }}" method="POST"
                                        style="display: inline"
                                        onsubmit="return confirm('Are you sure you want to delete this company?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    @else
                                    <a href="{{ route('dashboard.companies.edit', $company->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('dashboard.companies.destroy', $company->id) }}" method="POST"
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
                {{ $companies->withQueryString()->links() }}
            </div>
        </div>
    </div>

@endsection
