@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <h3 class="text-center">Create Category Page</h3>

                <div class="bg-white p-3 rounded shadow-sm">
                    <form action="{{ route('dashboard.categories.store') }}" method="POST">
                        @csrf
                        <label class="mb-2">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="d-flex justify-content-between align-items-end mb-3 mt-4">
                            <button type="submit" class="btn btn-primary">Craete</button>
                            <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
