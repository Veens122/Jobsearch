@extends('layouts.candidate_app')
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


        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="dashboard-content">
                <div class="dashboard-tlbar d-block mb-4">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <h1 class="mb-1 fs-3 fw-medium">Edit Candidate Profile</h1>
                        </div>

                    </div>

                    <!-- Logout Form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>



                <div class="dashboard-widg-bar d-block">

                    <!-- Profile Image -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Profile Picture</h4>
                        </div>
                        <div class="card-body">
                            @if ($candidate->profile_picture)
                            <img src="{{ $candidate->candidateProfile && $candidate->candidateProfile->profile_picture 
                ? asset('storage/' . $candidate->candidateProfile->profile_picture) 
                : asset('assets/img/l-12.png') }}" class="img-fluid circle" alt="profile picture">

                            @endif
                            <input type="file" name="profile_picture" class="form-control mt-2">

                        </div>
                    </div>









                    <!-- Basic Info -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Basic Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Your Name</strong></label>
                                    <input type="text" name="full_name"
                                        value="{{ old('full_name', auth()->user()->name) }}" required
                                        class="form-control">



                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Job Title</strong></label>
                                    <input type="text" name="job_title"
                                        value="{{ old('job_title', $candidate->candidateProfile ? $candidate->candidateProfile->job_title : '') }}"
                                        class="form-control">
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Username</strong></label>
                                    <input type="text" name="username"
                                        value="{{ old('username', $candidate->candidateProfile ? $candidate->candidateProfile->username : '') }}"
                                        class="form-control">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Age</strong></label>
                                    <input type="text" name="age"
                                        value="{{ old('age', $candidate->candidateProfile ? $candidate->candidateProfile->age : '') }}"
                                        class="form-control">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Education</strong></label>
                                    <input type="text" name="education"
                                        value="{{ old('education', $candidate->candidateProfile ? $candidate->candidateProfile->education : '') }}"
                                        class="form-control">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Experience</strong></label>
                                    <input type="text" name="experience"
                                        value="{{ old('experience', $candidate->candidateProfile ? $candidate->candidateProfile->experience : '') }}"
                                        class="form-control">
                                </div>



                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Bio</strong></label>
                                    <input type="text" name="bio"
                                        value="{{ old('bio', $candidate->candidateProfile ? $candidate->candidateProfile->bio : '') }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Contact Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Email</strong></label>
                                    <input type="text" name="email"
                                        value="{{ old('email', $candidate->candidateProfile ? $candidate->candidateProfile->email : '') }}"
                                        class="form-control">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Phone no.</strong></label>
                                    <input type="text" name="phone"
                                        value="{{ old('phone', $candidate->candidateProfile ? $candidate->candidateProfile->phone : '') }}"
                                        class="form-control">
                                </div>



                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Address</strong></label>
                                    <input type="text" name="address"
                                        value="{{ old('address', $candidate->candidateProfile ? $candidate->candidateProfile->address : '') }}"
                                        class="form-control">
                                </div>



                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Country</strong></label>
                                    <input type="text" name="country"
                                        value="{{ old('country', $candidate->candidateProfile ? $candidate->candidateProfile->country : '') }}"
                                        class="form-control">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>State/City</strong></label>
                                    <input type="text" name="state_city"
                                        value="{{ old('city', $candidate->candidateProfile ? $candidate->candidateProfile->city : '') }}"
                                        class="form-control">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Zip Code</strong></label>
                                    <input type="text" name="zipcode"
                                        value="{{ old('zipcode', $candidate->candidateProfile ? $candidate->candidateProfile->zipcode : '') }}"
                                        class="form-control">
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Skills -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Skills (comma separated)</h4>
                        </div>
                        <div class="card-body">
                            <input type="text" name="skills"
                                value="{{ old('skills', $candidate->candidateProfile ? $candidate->candidateProfile->skills : '') }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 text-end">
                        <button type="submit" class="btn btn-sm btn-success">Update Profile</button>
                        <button type="" class="btn btn-sm btn-danger"><a
                                href="{{ route('profile.candidate-profile') }}">Cancel</a></button>
                    </div>

                </div>





                <!-- Footer -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="py-3 text-center">© 2015 - 2025 Job Stock® Themezhub.</div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- ======================= dashboard Detail End ======================== -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>



@endsection