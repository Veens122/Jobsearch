@extends('layouts.superadmin_app')
@section('content')

<div id="main-wrapper">


    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ======================= dashboard Detail ======================== -->
    <div class="dashboard-wrap bg-light">
        <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
            aria-controls="MobNav">
            <i class="fas fa-bars mr-2"></i>Dashboard Navigation
        </a>

        <div class="collapse" id="MobNav">
            <div class="dashboard-nav">
                <div class="dash-user-blocks pt-5">
                    <div class="jbs-grid-usrs-thumb">
                        <div class="jbs-grid-yuo">
                            <a href="candidate-detail.html">
                                <figure>
                                    <img src="{{ $admin->profile_picture 
        ? asset('storage/' . $admin->profile_picture) 
        : asset('assets/img/l-12.png') }}" class="img-fluid circle" alt="Admin Profile Picture">
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div class="jbs-grid-usrs-caption mb-3">
                        <div class="jbs-kioyer">
                            <span class="label text-light theme-bg">05 Openings</span>
                        </div>
                        <div class="jbs-tiosk">
                            <h4 class="jbs-tiosk-title"><a href="">{{ $admin->name }}</a></h4>
                            <!-- <div class="jbs-tiosk-subtitle"><span><i
                                        class="fa-solid fa-location-dot me-2"></i>Canada</span></div> -->
                        </div>
                    </div>
                </div>
                <div class="dashboard-inner">
                    <ul data-submenu-title="Main Navigation">
                        <li class="active"><a href="employer-dashboard.html"><i
                                    class="fa-solid fa-gauge-high me-2"></i>User Dashboard</a></li>
                        <li><a href="{{ route('admin-profile') }}"><i class="fa-regular fa-user me-2"></i>User
                                Profile </a>
                        </li>
                        <li><a href="employer-jobs.html"><i class="fa-solid fa-business-time me-2"></i>My Jobs</a>
                        </li>
                        <li><a href="employer-submit-job.html"><i class="fa-solid fa-pen-ruler me-2"></i>Approve
                                Jobs</a></li>
                        <li><a href="employer-applicants-jobs.html"><i
                                    class="fa-solid fa-user-group me-2"></i>Applicants Jobs</a></li>
                        <li><a href="employer-shortlist-candidates.html"><i
                                    class="fa-solid fa-user-clock me-2"></i>Shortlisted Candidates</a></li>
                        <li><a href="employer-package.html"><i class="fa-solid fa-wallet me-2"></i>Package</a></li>
                        <li><a href="employer-messages.html"><i class="fa-solid fa-comments me-2"></i>Messages</a>
                        </li>
                        <li><a href="employer-change-password.html"><i
                                    class="fa-solid fa-unlock-keyhole me-2"></i>Change Password</a></li>
                        <li><a href="employer-delete-account.html"><i class="fa-solid fa-trash-can me-2"></i>Delete
                                Account</a></li>

                        <button type="button" class="btn btn-whites">
                            <div class="drp_menu_headr-right">

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="btn btn-whites"><i class="fa-solid fa-power-off me-2"></i>Log Out</a>
                            </div>
                            <form action="{{ route('logout') }}" method="post" style="display: none;" id="logout-form">
                                @csrf
                            </form></a>
                        </button>

                    </ul>
                </div>
            </div>
        </div>

        <div class="dashboard-content">
            <div class="dashboard-tlbar d-block mb-4">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <h1 class="mb-1 fs-3 fw-medium">Admin Profile</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <!-- <li class="breadcrumb-item text-muted"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li> -->
                                <!-- <li class="breadcrumb-item"><a href="#" class="text-primary">Admin Profile</a></li> -->
                            </ol>
                        </nav>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 text-end">
                        <a href="{{ route('admin-profile.edit') }}" class="btn btn-sm btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">




                <!-- Profile  -->
                <div class="dashboard-profle-wrapper mb-4">
                    <div class="dash-prf-start">
                        <div class="dash-prf-start-upper">
                            <div class="dash-prf-start-thumb">
                                <figure><img src="{{ $admin->profile_picture 
        ? asset('storage/' . $admin->profile_picture) 
        : asset('assets/img/l-12.png') }}" class="img-fluid circle" alt="Admin Profile Picture">
                                </figure>


                            </div>
                        </div>
                    </div>
                    <div class="dash-prf-end">
                        <div class="dash-prfs-caption">
                            <div class="dash-prfs-title">
                                <h4>{{ $admin->name }}</h4>
                            </div>
                            <div class="dash-prfs-title">
                                <h4>{{ $admin->username }}</h4>
                            </div>

                            <!-- <div class="dash-prfs-subtitle">
                                <div class="jbs-job-mrch-lists">
                                    <div class="single-mrch-lists">
                                        <span>{{ $admin->username }}</span>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="dash-prfs-subtitle">
                                <div class="jbs-job-mrch-lists">
                                    <div class="single-mrch-lists">
                                        <span>{{ $admin->job_title }}</span>.<span><i
                                                class="fa-solid fa-location-dot me-1"></i>{{ $admin->country }}</span>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="jbs-grid-job-edrs-group mt-1">
                                @foreach(explode(',', $admin->skills) as $skill)
                                <span>{{ $skill }}</span>
                                @endforeach
                            </div> -->
                        </div>
                        <div class="dash-prf-caption-end">
                            <div class="dash-prf-infos">
                                <div class="single-dash-prf-infos">
                                    <div class="single-dash-prf-infos-icons"><i
                                            class="fa-solid fa-envelope-open-text"></i></div>
                                    <div class="single-dash-prf-infos-caption">
                                        <p class="text-sm-muted mb-0">Email</p>
                                        <h5>{{ $admin->email }}</h5>
                                    </div>
                                </div>
                                <!-- <div class="single-dash-prf-infos">
                                    <div class="single-dash-prf-infos-icons"><i class="fa-solid fa-phone-volume"></i>
                                    </div>
                                    <div class="single-dash-prf-infos-caption">
                                        <p class="text-sm-muted mb-0">Call</p>
                                        <h5>{{ $admin->phone }}</h5>
                                    </div>
                                </div> -->
                                <!-- <div class="single-dash-prf-infos">
                                    <div class="single-dash-prf-infos-icons"><i class="fa-solid fa-briefcase"></i></div>
                                    <div class="single-dash-prf-infos-caption">
                                        <p class="text-sm-muted mb-0">Exp.</p>
                                        <h5>{{ $admin->experience }}</h5>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="dash-prf-completion">
                                <p class="text-sm-muted">Profile Completed</p>
                                <div class="progress" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100">
                                    <div class="progress-bar bg-success" style="width: 75%">75%</div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Basic Info Display -->
                <div class="card">
                    <div class="card-header">
                        <h4>Basic Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Your Name:</strong>
                                <p>{{ $admin->name }}</p>
                            </div>

                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Job Title:</strong>
                                <p>{{ $admin->job_title }}</p>
                            </div> -->

                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Age:</strong>
                                <p>{{ $admin->age }}</p>
                            </div> -->

                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Education:</strong>
                                <p>{{ $admin->education }}</p>
                            </div> -->

                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Experience:</strong>
                                <p>{{ $admin->experience }}</p>
                            </div> -->

                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Language:</strong>
                                <p>{{ $admin->language }}</p>
                            </div> -->

                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Bio:</strong>
                                <p>{{ $admin->bio }}</p>
                            </div> -->

                        </div>
                    </div>
                </div>


                <!-- Contact Info Display -->
                <div class="card">
                    <div class="card-header">
                        <h4>Contact Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Your Email:</strong>
                                <p>{{ $admin->email }}</p>
                            </div>

                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Phone no.:</strong>
                                <p>{{ $admin->phone }}</p>
                            </div> -->

                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Address:</strong>
                                <p>{{ $admin->address }}</p>
                            </div> -->



                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Country:</strong>
                                <p>{{ $admin->country }}</p>
                            </div> -->

                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>State/City:</strong>
                                <p>{{ $admin->state_city }}</p>
                            </div> -->

                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <strong>Zip Code:</strong>
                                <p>{{ $admin->zipcode }}</p>
                            </div> -->



                        </div>
                    </div>
                </div>



            </div>

            <!-- footer -->
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3 text-center">© 2015 - 2025 Job Stock® Themezhub.</div>
                </div>
            </div>
        </div>

    </div>
    <!-- ======================= dashboard Detail End ======================== -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@endsection