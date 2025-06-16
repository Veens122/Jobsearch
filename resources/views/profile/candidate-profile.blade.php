@extends('layouts.candidate_app')
@section('content')

<div id="main-wrapper">


    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ======================= dashboard Detail ======================== -->






    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h1 class="mb-1 fs-3 fw-medium">Candidate Profile</h1>

                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 text-end">
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">




            <!-- Profile  -->
            <div class="dashboard-profle-wrapper mb-4">
                <div class="dash-prf-start">
                    <div class="dash-prf-start-upper">
                        <div class="dash-prf-start-thumb">
                            @php
                            $user = Auth::user();
                            $profile = $user->candidateProfile;
                            $full_name = $profile->full_name ?? $user->name;
                            $initial = strtoupper(substr($full_name, 0, 1));
                            @endphp

                            <figure>
                                @if($profile && $profile->profile_picture)
                                <img src="{{ asset('storage/' . $profile->profile_picture) }}" class="img-fluid circle"
                                    alt="Profile Picture"
                                    style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                                @else
                                <div class="default-profile-circle circle d-flex align-items-center justify-content-center"
                                    style="width: 100px; height: 100px; background-color: #6c757d; color: white; font-size: 48px; font-weight: bold; border-radius: 50%;">
                                    {{ $initial }}
                                </div>
                                @endif
                            </figure>

                        </div>
                    </div>
                </div>
                <div class="dash-prf-end">
                    <div class="dash-prfs-caption">
                        <div class="dash-prfs-title">
                            <h4>{{ $candidate->name }}</h4>
                        </div>
                        <div class="dash-prfs-subtitle">
                            <div class="jbs-job-mrch-lists">
                                <div class="single-mrch-lists">
                                    <span>{{ $candidate->candidateProfile->country ?? 'unknown country' }}</span>
                                    <span><i
                                            class="fa-solid fa-location-dot me-1"></i>{{ $candidate->candidateProfile->city ?? 'Unknown city' }}</span>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="dash-prf-caption-end">
                        <div class="dash-prf-infos">
                            <div class="single-dash-prf-infos">
                                <div class="single-dash-prf-infos-icons"><i class="fa-solid fa-envelope-open-text"></i>
                                </div>
                                <div class="single-dash-prf-infos-caption">
                                    <p class="text-sm-muted mb-0">Email</p>
                                    <h5>{{ $candidate->email }}</h5>
                                </div>
                            </div>
                            <div class="single-dash-prf-infos">
                                <div class="single-dash-prf-infos-icons"><i class="fa-solid fa-phone-volume"></i>
                                </div>
                                <div class="single-dash-prf-infos-caption">
                                    <p class="text-sm-muted mb-0">Call</p>
                                    <h5>

                                        <h5>{{ $candidate->candidateProfile->phone ?? 'N/A' }}</h5>

                                    </h5>
                                </div>
                            </div>
                            <div class="single-dash-prf-infos">
                                <div class="single-dash-prf-infos-icons"><i class="fa-solid fa-briefcase"></i></div>
                                <div class="single-dash-prf-infos-caption">
                                    <p class="text-sm-muted mb-0">Experience</p>
                                    <h5>{{ $candidate->candidateProfile->experience ?? 'No experience' }}</h5>
                                </div>
                            </div>
                        </div>
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
                            <p>{{ $candidate->name }}</p>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>Username:</strong>
                            <p>{{ $candidate->username }}</p>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>Job Title:</strong>
                            <p>{{ $candidate->candidateProfile->job_title ?? 'N/A'}}</p>
                        </div>
                        <!-- 
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>Age:</strong>
                            <p>{{ $candidate->candidateProfile->age ?? 'N/A'}}</p>
                        </div> -->


                        <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>Experience:</strong>
                            <p>{{ $candidate->candidateProfile->experience ?? 'N/A' }}</p>
                        </div>

                        <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>Language:</strong>
                            <p>{{ $candidate->candidateProfile->language ?? 'N/A' }}</p>
                        </div> -->

                        <div class="card">
                            <div class="card-header">
                                <h4>Skills</h4>
                            </div>
                            <div class="card-body">
                                <p>{{ $candidate->candidateProfile->skills ?? 'No skills listed' }}</p>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>Bio:</strong>
                            <p>{{ $candidate->candidateProfile->bio ?? 'N/A'}}</p>
                        </div>

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
                            <p>{{ $candidate->email }}</p>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>Phone no.:</strong>
                            <p>{{ $candidate->candidateProfile->phone ?? 'N/A' }}</p>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>Address:</strong>
                            <p>{{ $candidate->candidateProfile->address ?? 'N/A' }}</p>
                        </div>



                        <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>Country:</strong>
                            <p>{{ $candidate->candidateProfile->country ?? 'N/A'}}</p>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>City:</strong>
                            <p>{{ $candidate->candidateProfile->city ?? 'N/A'}}</p>
                        </div>

                        <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>City:</strong>
                            <p>{{ $candidate->candidateProfile->city ?? 'N/A'}}</p>
                        </div> -->

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <strong>Zip Code:</strong>
                            <p>{{ $candidate->candidateProfile->zipcode ?? 'N/A'}}</p>
                        </div>



                    </div>
                </div>
            </div>





            <!-- Education History Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Education History</h4>
                </div>
                <div class="card-body">
                    @if ($educationHistories->count())
                    @foreach ($educationHistories as $edu)
                    <div class="row">
                        <div class="col-md-4">
                            <strong>School:</strong>
                            <p>{{ $edu->institution }}</p>
                        </div>
                        <div class="col-md-4">
                            <strong>Year:</strong>
                            <p>{{ $edu->year }}</p>
                        </div>
                        <div class="col-md-4">
                            <strong>Result Acquired:</strong>
                            <p>{{ $edu->result_acquired }}</p>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>No education history available.</p>
                    @endif

                </div>
            </div>

            <!-- Job History Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Job History</h4>
                </div>
                <div class="card-body">
                    @if ($jobHistories->count())
                    @foreach ($jobHistories as $job)

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Job Title</strong>
                            <p>{{ $job->job_title ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Company</strong>
                            <p>{{ $job->company ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Company address</strong>
                            <p>{{ $job->company_address ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Start Date</strong>
                            <p>{{ $job->start_date ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>End Date</strong>
                            <p>{{ $job->end_date ?? 'Present' }}</p>
                        </div>
                        <!-- <div class="col-md-12">
                            <strong>Description</strong>
                            <p>{{ $job->description ?? '-' }}</p>
                        </div> -->
                    </div>
                    @endforeach
                    @else
                    <p>No job history available.</p>
                    @endif
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