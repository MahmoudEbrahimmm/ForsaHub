@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <h3 class="text-center mb-4">Create Vacance Page</h3>

            <div class="bg-white p-4 rounded shadow-sm">
                <form action="{{ route('dashboard.vacances.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                               value="{{ old('location') }}">
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Salary</label>
                        <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror"
                               value="{{ old('salary') }}">
                        @error('salary')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Job Type</label>
                        <select name="type" class="form-select @error('type') is-invalid @enderror">
                            <option value="">Select Type</option>
                            <option value="full-time" {{ old('type') == 'full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="contract" {{ old('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                            <option value="part-time" {{ old('type') == 'remote' ? 'selected' : '' }}>Remote</option>
                            <option value="internship" {{ old('type') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company</label>
                        <select name="company_id" class="form-select @error('company_id') is-invalid @enderror">
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Job Category</label>
                        <select name="job_category_id" class="form-select @error('job_category_id') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('job_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('job_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('dashboard.vacances.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
