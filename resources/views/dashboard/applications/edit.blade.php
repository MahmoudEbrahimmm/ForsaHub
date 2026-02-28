@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <h3 class="text-center">Edit {{ $application->user->name }} Status</h3>

                <div class="bg-white p-3 rounded shadow-sm">
                    <form action="{{ route('dashboard.applications.update', $application->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="table bg-white p-3 rounded shadow-sm">
                            <tbody>
                                <tr>
                                    <td class="fw-bold">Applicant Name</td>
                                    <td>{{ $application->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Job Vacancy</td>
                                    <td>{{ $application->JobVacancy->title }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Company</td>
                                    <td>{{ $application->JobVacancy->company->name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">AI Score</td>
                                    <td>{{ $application->ai_generated_score }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">AI Feedback</td>
                                    <td>{{ $application->ai_generated_feedback }}</td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">Select Status</option>
                                <option value="pending"
                                    {{ old('status', $application->status) == 'pending' ? 'selected' : '' }}>
                                    pending</option>
                                <option value="accepted"
                                    {{ old('status', $application->status) == 'accepted' ? 'selected' : '' }}>
                                    accepted</option>
                                <option value="rejected"
                                    {{ old('status', $application->status) == 'rejected' ? 'selected' : '' }}>
                                    rejected</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-end mb-3 mt-4">
                            <button status="submit" class="btn btn-primary">Update Status</button>
                            <a href="{{ route('dashboard.applications.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
