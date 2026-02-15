@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="d-flex justify-content-between align-items-end mb-3">
                <h3 class="mb-3 mt-5">Details {{ $company->name }}</h3>
                <a href="{{ route('dashboard.companies.index') }}" class="btn btn-dark">
                    Back
                </a>
            </div>

            <table class="table bg-white p-3 rounded shadow-sm">
                <tbody>
                    <tr>
                        <td class="fw-bold">Name</td>
                        <td>{{ $company->name }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Address</td>
                        <td>{{ $company->address }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Industry</td>
                        <td>{{ $company->industry }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Website</td>
                        <td>
                            @if($company->website)
                                <a href="{{ $company->website }}" target="_blank">
                                    {{ $company->website }}
                                </a>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Owner</td>
                        <td>{{ $company->owner->name ?? 'N/A' }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Created At</td>
                        <td>{{ $company->created_at->format('Y-m-d - h:i A') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
