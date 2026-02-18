@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 text-center m-auto">
                <x-success />
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <h3 class="fw-bold mb-3 mt-5">Users{{ request()->input('archived') == 'true' ? '(Archived)' : '' }}</h3>
                    <div>
                        @if(request()->input('archived') == 'true')
                            <a href="{{ route('dashboard.users.index') }}" class="btn btn-dark me-2">Active users</a>
                        @else
                            <a href="{{ route('dashboard.users.index', ['archived' => 'true']) }}"
                                class="btn btn-dark me-2">Archived users</a>
                        @endif
                    </div>
                </div>
                <table class="table bg-white p-3 rounded shadow-sm">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>E-mail</td>
                            <td>Role</td>
                            <td class="fw-bold">Created At</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td class="w-25">{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at->format('Y-m-d h:i A') }}</td>
                                <td>
                                    @if(request()->input('archived') == 'true')
                                        <a href="{{ route('dashboard.users.restore', $user->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fa-solid fa-rotate-right"></i></a>
                                        <form action="{{ route('dashboard.users.delete', $user->id) }}" method="POST"
                                            style="display: inline"
                                            onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-warning">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        @if ($user->role != 'admin')

                                            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-success"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST"
                                                style="display: inline">
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
                        @endforeach
                    </tbody>
                </table>
                {{ $users->withQueryString()->links() }}
            </div>
        </div>
    </div>

@endsection
