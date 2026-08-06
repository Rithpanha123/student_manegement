@extends('dashboard.index')

@section('title', 'user_list')

@section('content')
<div class="container mt-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <i class="fas fa-users me-2"></i>User List
            </h2>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                <i class="fas fa-user-plus me-2"></i>Dashboard
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- User Table -->
        <div class="card">
            <div class="card-body">
                @if($users->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Last Login</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->user_id }}</td>
                                        <td>
                                            <strong>{{ $user->username }}</strong>
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">
                                                {{ $user->email }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">
                                                {{ $user->gender->gender_name ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">
                                                {{ $user->role->role_name ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($user->is_active)
                                                <span class="badge bg-success">
                                                    <i class="fas fa-check-circle me-1"></i>Active
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    <i class="fas fa-times-circle me-1"></i>Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->last_login)
                                                {{ $user->last_login->format('d/m/Y H:i:s') }}
                                            @else
                                                <span class="text-muted">Never</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->created_at)
                                                {{ $user->created_at->format('d/m/Y H:i:s') }}
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->updated_at)
                                                {{ $user->updated_at->format('d/m/Y H:i:s') }}
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="#" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <small class="text-muted">
                            Total: <strong>{{ $users->count() }}</strong> users
                        </small>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h5>No Users Found</h5>
                        <p class="text-muted">Click the button above to create a new user.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
