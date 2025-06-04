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
                            <h4 class="jbs-tiosk-title"><a href="">Instagram App</a></h4>
                            <div class="jbs-tiosk-subtitle"><span><i
                                        class="fa-solid fa-location-dot me-2"></i>Canada</span></div>
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
                        <li><a href="employer-submit-job.html"><i class="fa-solid fa-pen-ruler me-2"></i>Submit
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


        <div id="main-wrapper">
            <div class="dashboard-wrap bg-light">
                <div class="dashboard-content">
                    <div class="dashboard-tlbar d-block mb-4">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <h1 class="mb-1 fs-3 fw-medium">Edit Employer Profile</h1>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('admin-profile.update') }}" method="POST" enctype="multipart/form-data">


                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif




                        <!-- Profile Picture -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Profile Picture</h4>
                            </div>
                            <div class="card-body">
                                @if ($admin->profile_picture)
                                <img src="{{ $admin->profile_picture 
        ? asset('storage/' . $admin->profile_picture) 
        : asset('assets/img/l-12.png') }}" class="img-fluid circle" alt="Admin Profile Picture">


                                @endif
                                <input type="file" name="profile_picture" class="form-control mt-2">

                            </div>
                        </div>

                        <!-- Basic Detail -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Basic Detail</h4>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $admin->name ?? $admin->name }}"
                                        class="form-control">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Username</label>
                                    <input type="text" name="username"
                                        value="{{ $admin->username ?? $admin->username }}" class="form-control">

                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label>Industry</label>
                                    <input type="text" name="industry" value="{{ $employer->profile->industry ?? '' }}"
                                        class="form-control">
                                </div> -->

                                <!-- <div class="col-md-6 mb-3">
                                    <label>Website</label>
                                    <input type="text" name="website" value="{{ $employer->profile->website ?? '' }}"
                                        class="form-control">

                                </div> -->

                                <!-- <div class="col-12 mb-3">
                                    <label>Company decription</label>
                                    <textarea name="bio"
                                        class="form-control">{{ $employer->profile->company_description ?? '' }}</textarea>
                                </div> -->

                                <!-- <div class="col-12 mb-3">
                                    <label>Specialties (comma separated)</label>
                                    <input type="text" name="specialties"
                                        value="{{ $admin->profile->specialties ?? '' }}" class="form-control">
                                </div> -->

                                <!-- <div class="col-12 mb-3">
                                    <label>Company Size</label>
                                    <input type="text" name="company_size"
                                        value="{{ $employer->profile->company_size ?? '' }}" class="form-control">
                                </div> -->
                            </div>
                        </div>

                        <!-- Contact Detail -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Contact Detail</h4>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email', $admin->email) }}">
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone', $admin->phone) }}">

                                </div> -->
                                <!-- <div class="col-md-6 mb-3">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ $admin->profile->address ?? '' }}"
                                        class="form-control">
                                </div> -->
                                <!-- <div class="col-md-6 mb-3">
                                    <label>Country</label>
                                    <input type="text" name="country" value="{{ $admin->profile->country ?? '' }}"
                                        class="form-control">
                                </div> -->
                                <!-- <div class="col-md-6 mb-3">
                                    <label>State/City</label>
                                    <input type="text" name="state_city" value="{{ $admin->profile->state_city ?? '' }}"
                                        class="form-control">
                                </div> -->
                                <!-- <div class="col-md-6 mb-3">
                                    <label>Zip Code</label>
                                    <input type="text" name="zipcode" value="{{ $admin->profile->zipcode ?? '' }}"
                                        class="form-control">
                                </div> -->
                            </div>
                        </div>


                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update Profile</button>

                            <button class="btn btn-danger"> <a href="{{ route('admin-profile')}}">Cancel</a>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- ======================= dashboard Detail End ======================== -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>



@endsection