@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="d-flex justify-content-between align-items-end mb-3">
                <h3 class="mb-3 mt-5">Details {{ $vacance->title }}</h3>
                <a href="{{ route('dashboard.vacances.index') }}" class="btn btn-dark">
                    Back
                </a>
            </div>

            <table class="table bg-white p-3 rounded shadow-sm">
                <tbody>
                    <tr>
                        <td class="fw-bold">Title</td>
                        <td>{{ $vacance->title }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold w-25">description</td>
                        <td>{{ $vacance->description }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold">location</td>
                        <td>{{ $vacance->location }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">salary</td>
                        <td>{{ $vacance->salary }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">type</td>
                        <td>{{ $vacance->type }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Created At</td>
                        <td>{{ $vacance->created_at->format('Y-m-d h:i A') }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
