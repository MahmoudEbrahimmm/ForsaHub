@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mt-5 mb-4">
                <h3 class="m-0">
                    Company Details: {{ $company->name }}
                </h3>

                <div class="d-flex gap-2">
                    @if (auth()->user()->role == 'admin')
                    <a href="{{ route('dashboard.companies.index') }}" class="btn btn-dark">
                        Back
                    </a>
                    <a href="{{ route('dashboard.companies.edit', $company->id) }}" class="btn btn-primary">
                        Edit
                    </a>
                    @endif
                    @if (auth()->user()->role == 'company-owner')
                    <a href="{{ route('dashboard.my-company.edit') }}" class="btn btn-success">
                        Edit My-company
                    </a>
                    @endif


                </div>
            </div>

            {{-- Details Table --}}
            <div class="bg-white p-3 rounded shadow-sm">
                <table class="table table-borderless mb-0">
                    <tbody>
                        <tr>
                            <td class="fw-bold w-25">Owner Name</td>
                            <td>{{ $company->owner->name ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <td class="fw-bold">Owner Email</td>
                            <td>{{ $company->owner->email ?? 'N/A' }}</td>
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
                                @if ($company->website)
                                    <a href="{{ $company->website }}" target="_blank">
                                        {{ $company->website }}
                                    </a>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td class="fw-bold">Created At</td>
                            <td>
                                {{ $company->created_at->format('Y-m-d | h:i A') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
