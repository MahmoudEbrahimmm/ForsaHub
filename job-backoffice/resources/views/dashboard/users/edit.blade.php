@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <h3 class="text-center">Change {{ $user->name }}</h3>

                <div class="bg-white p-3 rounded shadow-sm">
                    <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="table bg-white p-3 rounded shadow-sm">
                            <tbody>
                                <tr>
                                    <td class="fw-bold">User Name</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">User E-mail</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">User Role</td>
                                    <td>{{ $user->role }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mb-3">
                            <label class="form-label">Change Role</label>
                            <select name="role" class="form-select @error('role') is-invalid @enderror">
                                <option value="job-seeker"
                                    {{ old('role', $user->role) == 'job-seeker' ? 'selected' : '' }}>
                                    Job Seeker</option>
                                <option value="company-owner"
                                    {{ old('role', $user->role) == 'company-owner' ? 'selected' : '' }}>
                                    Company Owner</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">User Name</label>
                            <input type="text" name="name" class="form-control mb-3" value="{{ old('name' , $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Change E-mail</label>
                            <input type="email" name="email" class="form-control mb-3" value="{{ old('email' , $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Change Password</label>
                            <input type="password" name="password" class="form-control mb-3">
                        </div>

                        <div class="d-flex justify-content-between align-items-end mb-3 mt-4">
                            <button status="submit" class="btn btn-primary">Update Data</button>
                            <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
