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
    <div class="dashboard-wrap bg-light w-100 px-0">
        <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
            aria-controls="MobNav">
            <i class="fas fa-bars mr-2"></i>Dashboard Navigation
        </a>

        <div class="dashboard-content p-0">
            <div class="dashboard-tlbar d-block mb-4 px-3">
                <div class="row mx-0">
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4 w-100">
                        <h1 class="mb-1 fs-3 fw-medium">Admin Profile</h1>
                        <a href="{{ route('admin-profile.edit') }}" class="btn btn-sm btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block px-3">
                <!-- Profile Header Section -->
                <div class="dashboard-profle-wrapper mb-4">
                    <div class="dash-prf-start">
                        <div class="dash-prf-start-upper">
                            <div class="dash-prf-start-thumb">
                                <figure>
                                    @if(Auth::user()->profile_picture)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                        class="img-fluid circle" alt="Admin Profile Picture">
                                    @else
                                    <div class="img-fluid circle d-flex align-items-center justify-content-center bg-primary text-white fw-bold"
                                        style="width: 90px; height: 90px; border-radius: 50%; font-size: 80px">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    @endif
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="dash-prf-end">
                        <div class="dash-prfs-caption">
                            <div class="dash-prfs-title">
                                <h4>{{ $admin->name }}</h4>
                            </div>
                            <div class="dash-prfs-subtitle">
                                <div class="jbs-job-mrch-lists">
                                    <div class="single-mrch-lists">
                                        <span>{{ $admin->adminProfile->job_title ?? 'N/A' }}</span>.<span><i
                                                class="fa-solid fa-location-dot me-1"></i>{{ $admin->adminProfile->country ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dash-prf-caption-end">
                            <div class="dash-prf-infos">
                                <div class="single-dash-prf-infos">
                                    <div class="single-dash-prf-infos-icons"><i
                                            class="fa-solid fa-envelope-open-text"></i></div>
                                    <div class="single-dash-prf-infos-caption">
                                        <p class="text-sm-muted mb-0">{{ $admin->email}}</p>
                                    </div>
                                </div>
                                <div class="single-dash-prf-infos">
                                    <div class="single-dash-prf-infos-icons"><i
                                            class="fa-solid fa-envelope-open-text"></i></div>
                                    <div class="single-dash-prf-infos-caption">
                                        <p class="text-sm-muted mb-0">{{ $admin->username }}</p>
                                    </div>
                                </div>
                                <div class="single-dash-prf-infos">
                                    <div class="single-dash-prf-infos-icons"><i class="fa-solid fa-phone-volume"></i>
                                    </div>
                                    <div class="single-dash-prf-infos-caption">
                                        <p class="text-sm-muted mb-0">{{ $admin->adminProfile->phone ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="single-dash-prf-infos">
                                    <div class="single-dash-prf-infos-icons"><i class="fa-solid fa-briefcase"></i></div>
                                    <div class="single-dash-prf-infos-caption">
                                        <p class="text-sm-muted mb-0">{{ $admin->adminProfile->experience ?? 'N/A' }}
                                        </p>
                                    </div>
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
                        <div class="row mx-0">
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Name</p>
                                    <h5>{{ $admin->name }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Username</p>
                                    <h5>{{ $admin->username }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Job Title</p>
                                    <h5>{{ $admin->adminProfile->job_title ?? 'N/A' }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Age</p>
                                    <h5>{{ $admin->adminProfile->age ?? 'N/A' }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Education</p>
                                    <h5>{{ $admin->adminProfile->education ?? 'N/A' }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Experience</p>
                                    <h5>{{ $admin->adminProfile->experience ?? 'N/A' }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Language</p>
                                    <h5>{{ $admin->adminProfile->language ?? 'N/A' }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Bio</p>
                                    <h5>{{ $admin->adminProfile->bio ?? 'N/A' }}</h5>
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
                        <div class="row mx-0">
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Email</p>
                                    <h5>{{ $admin->email }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Phone</p>
                                    <h5>{{ $admin->adminProfile->phone ?? 'N/A' }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Address</p>
                                    <h5>{{ $admin->adminProfile->address ?? 'N/A' }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Country</p>
                                    <h5>{{ $admin->adminProfile->country ?? 'N/A' }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>City</p>
                                    <h5>{{ $admin->adminProfile->city ?? 'N/A' }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 px-3">
                                <div class="form-group">
                                    <p>Zip Code</p>
                                    <h5>{{ $admin->adminProfile->zipcode ?? 'N/A' }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="row mx-0">
                <div class="col-md-12 px-3">
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