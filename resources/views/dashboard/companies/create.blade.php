    @extends('layouts.dashboard')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <h3 class="text-center">Create company Page</h3>

                    <div class="bg-white p-3 rounded shadow-sm">
                        <form action="{{ route('dashboard.companies.store') }}" method="POST">
                            @csrf
                            <label class="mb-2">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="mb-2">Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                value="{{ old('address') }}">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label class="mb-2 mt-3">Industry</label>
                            <input type="text" name="industry" class="form-control @error('industry') is-invalid @enderror"
                                value="{{ old('industry') }}">
                            @error('industry')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label class="mb-2 mt-3">Website</label>
                            <input type="text" name="website" class="form-control @error('website') is-invalid @enderror"
                                value="{{ old('website') }}">
                            @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label class="mb-2 mt-3">Deleted At</label>
                            <input type="datetime-local" name="deleted_at"
                                class="form-control @error('deleted_at') is-invalid @enderror" value="{{ old('deleted_at') }}">
                            @error('deleted_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label class="mb-2 mt-3">Owner</label>
                            <select name="owner_id" class="form-control @error('owner_id') is-invalid @enderror">
                                <option value="">Select Owner</option>
                                @foreach($owners as $owner)
                                    <option value="{{ $owner->id }}" {{ old('owner_id') == $owner->id ? 'selected' : '' }}>
                                        {{ $owner->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('owner_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror


                            <div class="d-flex justify-content-between align-items-end mb-3 mt-4">
                                <button type="submit" class="btn btn-primary">Craete</button>
                                <a href="{{ route('dashboard.companies.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    @endsection
