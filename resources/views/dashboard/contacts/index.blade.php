@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <x-success />

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-semibold">
                        <i class="fa-solid fa-address-book me-2 text-primary"></i>
                        Contact Messages
                    </h5>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th style="width: 30%">Description</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($contactsUser as $contact)
                                    <tr>
                                        <td class="fw-semibold">{{ $contact->name }}</td>

                                        <td>
                                            <a href="mailto:{{ $contact->email }}"
                                               class="text-decoration-none text-primary">
                                                {{ $contact->email }}
                                            </a>
                                        </td>

                                        <td class="text-muted small">
                                            {{ Str::limit($contact->description, 120) }}
                                        </td>

                                        <td>{{ $contact->phone }}</td>

                                        <td class="text-muted small">
                                            {{ $contact->created_at?->format('Y-m-d | h:i A') }}
                                        </td>

                                        <td class="text-center">
                                            <form action="{{ route('dashboard.contacts.destroy', $contact->id) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-outline-danger btn-sm rounded-circle"
                                                        title="Delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">
                                            <i class="fa-regular fa-folder-open fs-3 mb-2 d-block"></i>
                                            No contact messages found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white border-0">
                    <div class="d-flex justify-content-end">
                        {{ $contactsUser->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
