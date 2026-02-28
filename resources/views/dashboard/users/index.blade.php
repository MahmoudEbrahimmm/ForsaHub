@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">

            <x-success />

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-end mb-3">
                <h3 class="fw-bold mb-3 mt-5">
                    Users
                    @if(request()->input('archived') === 'true')
                        <span class="text-muted">(Archived)</span>
                    @endif
                </h3>

                <div>
                    @if(request()->input('archived') === 'true')
                        <a href="{{ route('dashboard.users.index') }}" class="btn btn-dark me-2">
                            Active Users
                        </a>
                    @else
                        <a href="{{ route('dashboard.users.index', ['archived' => 'true']) }}" class="btn btn-dark me-2">
                            Archived Users
                        </a>
                    @endif
                </div>
            </div>

            {{-- Users Table --}}
            <div class="table-responsive">
                <table class="table table-hover bg-white rounded shadow-sm align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td class="w-25 text-break">{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $user->role }}</span>
                            </td>
                            <td>{{ $user->created_at->format('Y-m-d h:i A') }}</td>

                            <td class="text-center">
                                @if(request()->input('archived') === 'true')
                                    {{-- Restore --}}
                                    <a href="{{ route('dashboard.users.restore', $user->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-rotate-right"></i>
                                    </a>

                                    {{-- Permanent Delete --}}
                                    <form action="{{ route('dashboard.users.delete', $user->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                @else
                                    @if($user->role !== 'admin')
                                        {{-- Edit --}}
                                        <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        {{-- Soft Delete --}}
                                        <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                No users found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $users->withQueryString()->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
