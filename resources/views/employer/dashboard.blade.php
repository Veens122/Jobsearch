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
                        <h1 class="mb-1 fs-3 fw-medium"> Dashboard</h1>

                    </div>
                </div>
            </div>
            <!-- A div to welcome a registered emplyer -->
            <div class="dashboard-widg-bar d-block mb-4">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Welcome, {{ auth()->user()->name }}!</h4>
                            <p>Thank you for registering with us. You can now post jobs, manage applicants, and more.
                            </p>
                            <hr>
                            <p class="mb-0">If you have any questions, feel free to contact our support team.</p>
                        </div>
                    </div>
                </div>
                <div class="dashboard-widg-bar d-block">

                    <div class="dashboard-widg-bar d-block">

                        <!-- Row Start -->
                        <div class="row align-items-center gx-4 gy-4 mb-4">
                            <!-- Posted Jobs -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="dash-wrap-bloud">
                                    <div class="dash-wrap-bloud-icon">
                                        <div class="bloud-icon text-success bg-light-success">
                                            <i class="fa-solid fa-business-time"></i>
                                        </div>
                                    </div>
                                    <div class="dash-wrap-bloud-caption">
                                        <div class="dash-wrap-bloud-content">
                                            <h5 class="ctr">{{ $postedJobsCount }}</h5>
                                            <p>Posted Jobs</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Applicants -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="dash-wrap-bloud">
                                    <div class="dash-wrap-bloud-icon">
                                        <div class="bloud-icon text-danger bg-light-danger">
                                            <i class="fa-solid fa-user-clock"></i>
                                        </div>
                                    </div>
                                    <div class="dash-wrap-bloud-caption">
                                        <div class="dash-wrap-bloud-content">
                                            <h5 class="ctr">{{ $applicantsCount }}</h5>
                                            <p>Applicants</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Active Jobs -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="dash-wrap-bloud">
                                    <div class="dash-wrap-bloud-icon">
                                        <div class="bloud-icon text-primary bg-light-primary">
                                            <i class="fa-solid fa-briefcase"></i>
                                        </div>
                                    </div>
                                    <div class="dash-wrap-bloud-caption">
                                        <div class="dash-wrap-bloud-content">
                                            <h5 class="ctr">{{ $activeJobsCount }}</h5>
                                            <p>Active Jobs</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shortlisted -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="dash-wrap-bloud">
                                    <div class="dash-wrap-bloud-icon">
                                        <div class="bloud-icon text-warning bg-light-warning">
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="dash-wrap-bloud-caption">
                                        <div class="dash-wrap-bloud-content">
                                            <h5 class="ctr">{{ $shortlistedCount }}</h5>
                                            <p>Shortlisted</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Expired Jobs -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="dash-wrap-bloud">
                                    <div class="dash-wrap-bloud-icon">
                                        <div class="bloud-icon text-secondary bg-light-secondary">
                                            <i class="fa-solid fa-calendar-xmark"></i>
                                        </div>
                                    </div>
                                    <div class="dash-wrap-bloud-caption">
                                        <div class="dash-wrap-bloud-content">
                                            <h5 class="ctr">{{ $expiredJobsCount }}</h5>
                                            <p>Expired Jobs</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Total Reviews -->

                        </div>

                        <!-- Row End -->

                        <!-- Row Start -->
                        <div class="row gx-4 gy-4 mb-4">
                            <!-- <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
                            <div class="card d-none d-lg-block">
                                <div class="card-header">
                                    <h4 class="mb-0">Extra Area Chart</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="list-inline text-center m-t-40">
                                        <li>
                                            <h5><i class="fa fa-circle me-1 text-warning"></i>Active jobs</h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-circle me-1 text-danger"></i>Expired Jobs</h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-circle me-1 text-success"></i>Applied Applicants
                                            </h5>
                                        </li>
                                    </ul>
                                    <div class="chart" id="line-chart" style="height:300px;"></div>
                                </div>
                            </div>
                        </div> -->

                            <!-- <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Notifications</h4>
                                    </div>
                                    <div class="ground-list ground-list-hove">
                                        <div class="ground ground-single-list">
                                            <a href="JavaScript:Void(0);">
                                                <div class="btn-circle-40 text-warning bg-light-warning"><i
                                                        class="fas fa-home"></i></div>
                                            </a>

                                            <div class="ground-content">
                                                <h6><a href="JavaScript:Void(0);"><strong>Kr. Shaury Preet</strong>
                                                        Replied your message</a></h6>
                                                <span class="small">Just Now</span>
                                            </div>
                                        </div>

                                        <div class="ground ground-single-list">
                                            <a href="JavaScript:Void(0);">
                                                <div class="btn-circle-40 text-danger bg-light-danger"><i
                                                        class="fa-solid fa-comments"></i></div>
                                            </a>

                                            <div class="ground-content">
                                                <h6><a href="JavaScript:Void(0);">Mortin Denver accepted your resume on
                                                        <strong>Job Veens</strong></a></h6>
                                                <span class="small">20 min ago</span>
                                            </div>
                                        </div>

                                        <div class="ground ground-single-list">
                                            <a href="JavaScript:Void(0);">
                                                <div class="btn-circle-40 text-info bg-light-info"><i
                                                        class="fa-solid fa-heart"></i></div>
                                            </a>

                                            <div class="ground-content">
                                                <h6><a href="JavaScript:Void(0);">Your job #456256 expired yesterday
                                                        <strong>View More</strong></a></h6>
                                                <span class="small">1 day ago</span>
                                            </div>
                                        </div>

                                        <div class="ground ground-single-list">
                                            <a href="JavaScript:Void(0);">
                                                <div class="btn-circle-40 text-danger bg-light-danger"><i
                                                        class="fa-solid fa-thumbs-up"></i></div>
                                            </a>

                                            <div class="ground-content">
                                                <h6><a href="JavaScript:Void(0);"><strong>Daniel Kurwa</strong> has been
                                                        approved your resume!.</a></h6>
                                                <span class="small">10 days ago</span>
                                            </div>
                                        </div>

                                        <div class="ground ground-single-list">
                                            <a href="JavaScript:Void(0);">
                                                <div class="btn-circle-40 text-success bg-light-success"><i
                                                        class="fa-solid fa-comment-dots"></i></div>
                                            </a>

                                            <div class="ground-content">
                                                <h6><a href="JavaScript:Void(0);">Khushi Verma left a review on
                                                        <strong>Your Message</strong></a></h6>
                                                <span class="small">Just Now</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- Row End -->

                        <!-- Header Wrap -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Recent Posted Jobs</h6>
                                    </div>
                                    <div class="card-body">

                                        <!-- Start All List -->
                                        <div class="row justify-content-start gx-3 gy-4">

                                            <!-- Single Item -->
                                            @foreach ($jobs as $job)
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="jbs-list-box border">
                                                    <div class="jbs-list-head">
                                                        <div class="jbs-list-head-thunner">
                                                            <div class="jbs-list-emp-thumb jbs-verified">
                                                                <a href="{{ route('job-detail', $job->id) }}">
                                                                    <figure>



                                                                        <img src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : asset('assets/img/default-logo.png') }}"
                                                                            class="img-fluid"
                                                                            alt="{{ $job->company_name }}">
                                                                    </figure>

                                                                </a>
                                                            </div>
                                                            <div class="jbs-list-job-caption">
                                                                <div class="jbs-job-employer-wrap">
                                                                    <span>{{ $job->company_name ?? 'Unknown Company' }}</span>
                                                                </div>
                                                                <div class="jbs-job-title-wrap">
                                                                    <h4>
                                                                        <a href="{{ route('job-detail', $job->id) }}"
                                                                            class="jbs-job-title">
                                                                            {{ $job->title }}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="jbs-list-applied-users">
                                                            <span class="text-sm-muted text-light bg-warning label">
                                                                {{ $job->applications_count ?? 0 }} Applicants
                                                            </span>
                                                        </div>

                                                        <div class="jbs-list-postedinfo">
                                                            <p class="m-0 text-sm-muted">
                                                                <strong>Posted:</strong>
                                                                <span class="text-success">
                                                                    {{ $job->created_at ? $job->created_at->format('d M Y') : 'N/A' }}
                                                                </span>
                                                            </p>
                                                            <p class="m-0 text-sm-muted">
                                                                <strong>Expiry date:</strong>
                                                                <span class="text-danger">
                                                                    {{ $job->expiry_date ? \Carbon\Carbon::parse($job->expiry_date)->format('d M Y') : 'N/A' }}

                                                                </span>
                                                            </p>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach




                                        </div>
                                        <!-- End All Job List -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Header Wrap -->

                    </div>

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