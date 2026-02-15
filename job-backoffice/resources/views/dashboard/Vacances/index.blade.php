@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 text-center m-auto">
                <x-success />
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <h3 class="fw-bold mb-3 mt-5">Job vacances {{ request()->input('archived') == 'true' ? '(Archived)' : '' }}</h3>
                    <div>
                        @if(request()->input('archived') == 'true')
                        <a href="{{ route('dashboard.vacances.index') }}" class="btn btn-dark me-2">Active vacances</a>
                        @else
                        <a href="{{ route('dashboard.vacances.create') }}" class="btn btn-primary">Add vacance</a>
                        <a href="{{ route('dashboard.vacances.index', ['archived' => 'true']) }}" class="btn btn-dark me-2">Archived vacances</a>
                        @endif
                    </div>
                </div>
                <table class="table bg-white p-3 rounded shadow-sm">
                    <thead>
                        <tr>
                            <td>title</td>
                            <td class="w-25">description</td>
                            <td>location</td>
                            <td>salary</td>
                            <td>type</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacances as $vacance)
                            <tr>
                                <td>{{ $vacance->title }}</td>
                                <td>{{ $vacance->description }}</td>
                                <td>{{ $vacance->location }}</td>
                                <td>{{ number_format($vacance->salary,2) }}</td>
                                <td>{{ $vacance->type }}</td>
                                <td>
                                    @if(request()->input('archived') == 'true')
                                    <a href="{{ route('dashboard.vacances.restore', $vacance->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-rotate-right"></i></a>
                                    <form action="{{ route('dashboard.vacances.delete', $vacance->id) }}" method="POST"
                                        style="display: inline"
                                        onsubmit="return confirm('Are you sure you want to delete this vacance?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-trash"></i>
                                        </button>
                                        </form>
                                    @else
                                    <a href="{{ route('dashboard.vacances.show', $vacance->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('dashboard.vacances.edit', $vacance->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('dashboard.vacances.destroy', $vacance->id) }}" method="POST"
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
                {{ $vacances->withQueryString()->links() }}
            </div>
        </div>
    </div>

@endsection
