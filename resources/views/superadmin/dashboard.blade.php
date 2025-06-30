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


    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">Admin Dashboard</h1>

                </div>
            </div>
        </div>


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
                                <h5 class="ctr">{{ $totalJobs }}</h5>
                                <p>Posted Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Categories -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-success bg-light-success">
                                <i class="fa-solid fa-business-time"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">{{ $totalCategories }}</h5>
                                <p>Categories</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- All Users -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-danger bg-light-danger">
                                <i class="fa-solid fa-user-clock"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">{{ $totalUsers }}</h5>
                                <p>Total Users</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Candidates -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-danger bg-light-danger">
                                <i class="fa-solid fa-user-clock"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">{{ $totalCandidates }}</h5>
                                <p>Candidates</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Employers -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-info bg-light-info">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">{{ $totalEmployers }}</h5>
                                <p>Total Employers</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Jobs -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-info bg-light-info">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">{{ $activeJobs }}</h5>
                                <p>Actiive Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-info bg-light-info">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">{{ $expiredJobs }}</h5>
                                <p>Expired Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Applied Jobs -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-info bg-light-info">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">{{ $appliedJobs }}</h5>
                                <p>Applied Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
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

                                @forelse($jobs as $job)
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">

                                            <!-- Logo and Job Title -->
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb jbs-verified">
                                                    <a href="{{ route('job-detail', $job->id) }}">
                                                        <figure>
                                                            <img src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : asset('assets/img/default-logo.png') }}"
                                                                class="img-fluid" alt="Company Logo">
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

                                            <!-- Applicants -->
                                            <div class="jbs-list-applied-users">
                                                <span class="text-sm-muted text-light bg-warning label">
                                                    {{ $job->applications_count ?? 0 }} Applicants
                                                </span>
                                            </div>

                                            <!-- Posting Info -->
                                            <div class="jbs-list-postedinfo">
                                                <p class="m-0 text-sm-muted"><strong>Posted:</strong>
                                                    <span
                                                        class="text-success">{{ $job->created_at->format('d M Y') }}</span>
                                                </p>
                                                <p class="m-0 text-sm-muted"><strong>Expiry Date:</strong>
                                                    <span class="text-danger">
                                                        {{ \Carbon\Carbon::parse($job->expiry_date)->format('d M Y') }}
                                                    </span>
                                                </p>
                                            </div>

                                            <!-- Delete Button -->
                                            <div class="jbs-list-head-last">
                                                <form action="{{ route('superadmin.job.delete', $job->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm text-danger bg-light-danger"
                                                        onclick="return confirm('Are you sure you want to delete this job?')">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <p class="text-center text-muted">No jobs found.</p>
                                </div>
                                @endforelse

                            </div>
                            <!-- End All Job List -->

                        </div>
                    </div>
                </div>
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

</div>
<!-- ======================= dashboard Detail End ======================== -->

<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

@endsection