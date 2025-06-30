@extends('layouts.employer_app')
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



        <div class="dashboard-content">
            <div class="dashboard-tlbar d-block mb-4">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="mb-1 fs-3 fw-medium">Shortlisted Candidates</h1>

                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">


                <!-- Header Wrap -->
                <div class="row">
                    @foreach($applications as $application)
                    @php
                    $candidate = $application->user;
                    $profile = $candidate->candidateProfile ?? null;
                    @endphp <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <div class="jbs-list-box border">
                            <div class="jbs-list-head m-0">
                                <div class="jbs-list-head-thunner">
                                    <div class="jbs-list-usrs-thumb jbs-verified">
                                        <a href="{{ route('employer.applications.show-candidate', $application->id) }}">
                                            <figure>
                                                <img src="{{ $profile && $profile->profile_picture ? asset('storage/' . $profile->profile_picture) : asset('assets/img/default-logo.png') }}"
                                                    alt="{{ $profile->full_name ?? $candidate->name ?? 'Candidate' }}"
                                                    class="img-fluid">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="jbs-list-job-caption">
                                        <div class="jbs-job-title-wrap">
                                            <h4>
                                                <a href="{{ route('employer.applications.show-candidate', $application->id) }}"
                                                    class="jbs-job-title">
                                                    {{ $candidate->name }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div class="jbs-job-mrch-lists">
                                            <div class="single-mrch-lists">
                                                <span>{{ $candidate->candidateProfile->job_title ?? 'N/A' }}</span>
                                                <span>
                                                    <i class="fa-solid fa-location-dot me-1"></i>
                                                    {{ $candidate->candidateProfile->city ?? 'Unknown' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="jbs-grid-job-edrs-group mt-1">
                                            @foreach(explode(',', $candidate->candidateProfile->skills ?? '') as $skill)
                                            <span>{{ trim($skill) }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="jbs-list-head-middle">
                                    <div class="elsocrio-jbs sm">
                                        <div class="ilop-tr"><i class="fa-solid fa-coins"></i></div>
                                        <h5 class="jbs-list-pack">
                                            {{ $candidate->candidateProfile->experience ?? 'N/A' }} Exp.
                                        </h5>
                                    </div>
                                </div>
                                <div class="jbs-list-head-last text-end">
                                    <!-- Dropdown Actions -->
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-md dropdown-toggle" type="button"
                                            id="actionDropdown{{ $candidate->id }}" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="actionDropdown{{ $candidate->id }}">
                                            <li>
                                                <a class="dropdown-item text-info"
                                                    href="{{ route('employer.applications.show-candidate', $application->id) }}">
                                                    <i class="fa-solid fa-eye me-2"></i> View Profile
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-success"
                                                    href="mailto:{{ $candidate->email }}">
                                                    <i class="fa-solid fa-envelope me-2"></i> Email Candidate
                                                </a>
                                            </li>
                                            <li>
                                                <form
                                                    action="{{ route('employer.applications.remove', $application->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to remove this candidate from the shortlist?');">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="fa-solid fa-trash-can me-2"></i> Delete
                                                    </button>
                                                </form>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- Header Wrap -->

            </div>

            <!-- footer -->
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3 text-center">© 2024 - 2025 Job Veens® Ugochukwu.</div>
                </div>
            </div>

        </div>

        <!-- ======================= dashboard Detail End ======================== -->

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>

    @endsection