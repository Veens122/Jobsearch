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
    <div class="dashboard-wrap bg-light w-100 px-3">
        <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
            aria-controls="MobNav">
            <i class="fas fa-bars mr-2"></i>Dashboard Navigation
        </a>

        <div class="dashboard-content">
            <div class="dashboard-tlbar d-block mb-4">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
                        <h1 class="mb-1 fs-3 fw-medium">Edit Admin Profile</h1>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <form method="POST" action="{{ route('admin-profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Profile Picture Section -->
                    <div class="dashboard-profle-wrapper mb-4">
                        <div class="dash-prf-start">
                            <div class="dash-prf-start-upper">
                                <div class="dash-prf-start-thumb">
                                    <figure>
                                        @if(Auth::user()->profile_picture)
                                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                            class="img-fluid circle" alt="Admin Profile Picture"
                                            id="profile-picture-preview">
                                        @else
                                        <div class="img-fluid circle d-flex align-items-center justify-content-center bg-primary text-white fw-bold"
                                            style="width: 90px; height: 90px; border-radius: 50%; font-size: 80px"
                                            id="initials-preview">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </div>
                                        @endif
                                    </figure>
                                    <div class="mt-3">
                                        <input type="file" class="form-control" id="profile_picture"
                                            name="profile_picture" accept="image/*" onchange="previewImage(this)">
                                        <small class="text-muted">Max 2MB (JPG, PNG, JPEG)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Basic Details Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Basic Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $admin->name) }}" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="{{ old('username', $admin->username) }}" required>
                                    </div>
                                </div>




                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="job_title">Job Title</label>
                                        <input type="text" class="form-control" id="job_title" name="job_title"
                                            value="{{ old('job_title', $admin->adminProfile->job_title ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" id="age" name="age"
                                            value="{{ old('age', $admin->adminProfile->age ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="education">Education</label>
                                        <input type="text" class="form-control" id="education" name="education"
                                            value="{{ old('education', $admin->adminProfile->education ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="experience">Experience</label>
                                        <input type="text" class="form-control" id="experience" name="experience"
                                            value="{{ old('experience', $admin->adminProfile->experience ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="language">Language</label>
                                        <input type="text" class="form-control" id="language" name="language"
                                            value="{{ old('language', $admin->adminProfile->language ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="bio">Bio</label>
                                        <textarea class="form-control" id="bio" name="bio"
                                            rows="3">{{ old('bio', $admin->adminProfile->bio ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Details Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Contact Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $admin->email) }}" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                            value="{{ old('phone', $admin->adminProfile->phone ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ old('address', $admin->adminProfile->address ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" id="country" name="country"
                                            value="{{ old('country', $admin->adminProfile->country ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city"
                                            value="{{ old('city', $admin->adminProfile->city ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="zipcode">Zip Code</label>
                                        <input type="text" class="form-control" id="zipcode" name="zipcode"
                                            value="{{ old('zipcode', $admin->adminProfile->zipcode ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-3 mb-4">
                        <a href="{{ route('admin-profile') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary"> Update Profile</button>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3 text-center">© 2015 - 2025 Job Stock® Themezhub.</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('profile-picture-preview');
            const initials = document.getElementById('initials-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    if (preview) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }
                    if (initials) {
                        initials.style.display = 'none';
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <!-- ======================= dashboard Detail End ======================== -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ======================= dashboard Detail End ======================== -->



</div>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@endsection