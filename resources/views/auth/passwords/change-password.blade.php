@extends('layouts.app')
@section('content')

<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-4">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="mb-1 fs-3 fw-medium">Change Password</h1>
            </div>
        </div>
    </div>

    <div class="dashboard-widg-bar d-block">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Change Your Password</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('password.update') }}">
                    @csrf

                    <!-- Old Password -->
                    <div class="row mb-3 align-items-center">
                        <label class="col-xl-2 col-md-12 col-form-label">Old Password</label>
                        <div class="col-xl-7 col-md-12 position-relative">
                            <input type="password" name="old_password" class="form-control" id="oldPassword" required>
                            <span class="toggle-password" onclick="togglePassword('oldPassword')"
                                style="position:absolute; top:50%; right:10px; transform:translateY(-50%); cursor:pointer;">👁️</span>
                        </div>
                    </div>

                    <!-- New Password -->
                    <div class="row mb-3 align-items-center">
                        <label class="col-xl-2 col-md-12 col-form-label">New Password</label>
                        <div class="col-xl-7 col-md-12 position-relative">
                            <input type="password" name="new_password" class="form-control" id="newPassword" required>
                            <span class="toggle-password" onclick="togglePassword('newPassword')"
                                style="position:absolute; top:50%; right:10px; transform:translateY(-50%); cursor:pointer;">👁️</span>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="row mb-3 align-items-center">
                        <label class="col-xl-2 col-md-12 col-form-label">Confirm Password</label>
                        <div class="col-xl-7 col-md-12 position-relative">
                            <input type="password" name="new_password_confirmation" class="form-control"
                                id="confirmPassword" required>
                            <span class="toggle-password" onclick="togglePassword('confirmPassword')"
                                style="position:absolute; top:50%; right:10px; transform:translateY(-50%); cursor:pointer;">👁️</span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row mb-3">
                        <div class="col-xl-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Change password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="row">
        <div class="col-md-12">
            <div class="py-3 text-center">© 2024 - 2025 Job Veens® Ugochukwu.</div>
        </div>
    </div>
</div>

<!-- JavaScript for toggling password visibility -->
<script>
    function togglePassword(id) {
        const input = document.getElementById(id);
        input.type = input.type === "password" ? "text" : "password";
    }
</script>


@endsection