@extends('layouts.superadmin_app')
@section('content')

<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->

    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ======================= dashboard Detail ======================== -->


    <div class="dashboard-content">


        <div class="dashboard-widg-bar d-block">

            <section>
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <h2>All Users</h2>
                            <form action="{{ route('users.users-list') }}" method="GET" class="form-inline">
                                <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                    <option value="">All users</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="banned" {{ request('status') == 'banned' ? 'selected' : '' }}>Banned
                                    </option>
                                </select>
                            </form>
                        </div>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Banned Until</th>
                                        <th>Ban/Unban</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->role_id == 1)
                                            <span class="badge bg-primary">Super Admin</span>
                                            @elseif($user->role_id == 2)
                                            <span class="badge bg-info">Employer</span>
                                            @elseif($user->role_id == 3)
                                            <span class="badge bg-success">Candidate</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->banned_until && now()->lessThan($user->banned_until))
                                            <span class="badge bg-danger">Banned</span>
                                            @else
                                            <span class="badge bg-success">Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $user->banned_until ? $user->banned_until->format('d M Y H:i') : '-' }}
                                        </td>
                                        <td>
                                            @if($user->banned_until && now()->lessThan($user->banned_until))
                                            <!-- Unban Button -->
                                            <form action="{{ route('superadmin.unban.user', $user->id) }}"
                                                onsubmit="return confirm('Are you sure you want to unban this user?')"
                                                id="unbanForm{{ $user->id }}" method="POST" class="d-inline-block">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Unban</button>
                                            </form>
                                            @else
                                            <!-- Ban Form -->
                                            <form action="{{ route('superadmin.ban.user', $user->id) }}"
                                                onsubmit="return confirm('Are you sure you want to ban this user?')"
                                                id="banForm{{ $user->id }}" method="POST" class="d-inline-block">
                                                @csrf
                                                <div class="input-group input-group-sm">
                                                    <input type="number" name="ban_days" class="form-control"
                                                        placeholder="Days" min="1" required>
                                                    <button type="submit" class="btn btn-danger">Ban</button>
                                                </div>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">No users found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <!-- footer -->
        <div class="row">
            <div class="col-md-12">
                <div class="py-3 text-center">© 2024 - 2025 Job Veens® Ugochukwu.</div>
            </div>
        </div>

    </div>

</div>
<!-- ======================= dashboard Detail End ======================== -->

<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

@endsection