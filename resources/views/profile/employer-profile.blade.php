@extends('layouts.employer_app')
@section('content')
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->

<!-- ======================= dashboard Detail ======================== -->
<!-- <div class="dashboard-wrap bg-light"> -->
<a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
    aria-controls="MobNav">
    <i class="fas fa-bars mr-2"></i>Dashboard Navigation
</a>


<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-4">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <h1 class="mb-1 fs-3 fw-medium">Employer Profile</h1>

            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 text-end">
                <a href="{{ route('employer-profile.edit') }}" class="btn btn-sm btn-primary">Edit
                    Profile</a>
            </div>
        </div>
    </div>

    <div class="dashboard-widg-bar d-block">

        <!-- Profile Section -->
        <div class="dashboard-profle-wrapper mb-4">
            <div class="dash-prf-start">
                <div class="dash-prf-start-upper">
                    <div class="dash-prf-start-thumb">


                        <figure>
                            @php
                            $profile = Auth::user()->employerProfile;
                            $companyName = $profile->company_name ?? Auth::user()->name;
                            @endphp

                            @if($profile && $profile->logo)
                            <img src="{{ asset('storage/' . $profile->logo) }}" class="img-fluid circle"
                                alt="Profile Picture">
                            @else
                            <div class="default-profile-circle circle d-flex align-items-center justify-content-center"
                                style="width: 100px; height: 100px; background-color: #6c757d; color: white; font-size: 48px; font-weight: bold; border-radius: 50%;">
                                {{ strtoupper(substr($companyName, 0, 1)) }}
                            </div>
                            @endif
                        </figure>






                    </div>
                </div>
            </div>
            <div class="dash-prf-end">
                <div class="dash-prfs-caption">
                    <div class="dash-prfs-title">
                        <h4>{{ $employer->company_name }}</h4>
                    </div>
                    <div class="dash-prfs-subtitle">
                        <div class="jbs-job-mrch-lists">
                            <div class="single-mrch-lists">
                                <span>{{ $employer->employerProfile->industry ?? 'N/A' }}</span>.<span><i
                                        class="fa-solid fa-location-dot me-1"></i>
                                    {{ auth()->user()->employerProfile->country ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                    @if (!empty($employer->profile?->specialties))
                    <div class="jbs-grid-job-edrs-group mt-1">
                        @foreach (explode(',', $employer->employerProfile->specialty ?? 'N/A') as $specialty)

                        <span class="inline-block bg-gray-200 text-sm text-gray-700 px-2 py-1 rounded mr-1 mb-1">
                            {{ trim($specialty) }}
                        </span>
                        @endforeach
                    </div>
                    @endif

                </div>
                <div class="dash-prf-caption-end">
                    <div class="dash-prf-infos">
                        <div class="single-dash-prf-infos">
                            <div class="single-dash-prf-infos-icons"><i class="fa-solid fa-envelope-open-text"></i>
                            </div>
                            <div class="single-dash-prf-infos-caption">
                                <p class="text-sm-muted mb-0">Email</p>
                                <h5>{{ $employer->email }}</h5>
                            </div>
                        </div>
                        <div class="single-dash-prf-infos">
                            <div class="single-dash-prf-infos-icons"><i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="single-dash-prf-infos-caption">
                                <p class="text-sm-muted mb-0">Phone</p>
                                <h5>{{ $employer->employerProfile->phone ?? 'N/A' }}</h5>

                            </div>
                        </div>
                        <div class="single-dash-prf-infos">
                            <div class="single-dash-prf-infos-icons"><i class="fa-solid fa-users"></i></div>
                            <div class="single-dash-prf-infos-caption">
                                <p class="text-sm-muted mb-0">Size</p>
                                <h5>{{ $employer->employerProfile->company_size ?? 'N/A' }}</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Basic Details -->
        <div class="card">
            <div class="card-header">
                <h4>Basic Detail</h4>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                        <strong>Company Name:</strong>
                        <p>{{ $employer->employerProfile->company_name ?? 'N/A'}}</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                        <strong>Industry:</strong>
                        <p> {{ $employer->employerProfile->industry ?? 'N/A' }}</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                        <strong>Founded:</strong>
                        <p>{{ $employer->employerProfile->founded ?? 'N/A' }}</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                        <strong>Website:</strong>
                        <p> {{ $employer->employerProfile->website ?? 'N/A' }}</p>
                    </div>




                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                        <strong>Company Description:</strong>
                        <p>{{ $employer->employerProfile->company_description ?? 'N/A' }}</p>
                    </div>




                </div>
            </div>
        </div>

        <!-- Contact Detail -->
        <div class="card">
            <div class="card-header">
                <h4>Contact Detail</h4>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                        <strong>Email:</strong>
                        <p>{{ $employer->employerProfile->email ?? 'N/A' }}</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                        <strong>Phone:</strong>
                        <p>{{ $employer->employerProfile->phone ?? 'N/A'}}</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                        <strong>Address:</strong>
                        <p>{{ $employer->employerProfile->address ?? 'N/A' }}</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                        <strong>Country:</strong>
                        <p>{{ $employer->employerProfile->country ?? 'N/A'}}</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                        <strong>State/City:</strong>
                        <p>{{ $employer->employerProfile->city ?? 'N/A'}}</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                        <strong>Zip Code:</strong>
                        <p>{{ $employer->employerProfile->zipcode ?? 'N/A'}}</p>
                    </div>

                </div>
            </div>
        </div>



    </div>

    <!-- Footer -->
    <div class="row">
        <div class="col-md-12">
            <div class="py-3 text-center">© 2015 - 2025 Job Stock® Themezhub.</div>
        </div>
    </div>
</div>






<!-- </div> -->
<!-- ======================= dashboard Detail End ======================== -->

<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

@endsection