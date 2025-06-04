@extends('layouts.candidate_app')

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
    <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
        aria-controls="MobNav">
        <i class="fas fa-bars mr-2"></i>Dashboard Navigation
    </a>



    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-5">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">Candidate Dashboard</h1>

                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">

            <!-- Row Start -->
            <div class="row align-items-center gx-4 gy-4 mb-4">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-success bg-light-success">
                                <i class="fa-solid fa-business-time"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">523</h5>
                                <p>Applied jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-warning bg-light-warning">
                                <i class="fa-solid fa-bookmark"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">523</h5>
                                <p>Saved Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-danger bg-light-danger">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">523</h5>
                                <p>Viewed Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="dash-wrap-bloud">
                        <div class="dash-wrap-bloud-icon">
                            <div class="bloud-icon text-info bg-light-info">
                                <i class="fa-sharp fa-solid fa-comments"></i>
                            </div>
                        </div>
                        <div class="dash-wrap-bloud-caption">
                            <div class="dash-wrap-bloud-content">
                                <h5 class="ctr">523</h5>
                                <p>Total Review</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row End -->

            <!-- Row Start -->
            <div class="row gx-4 gy-4 mb-4">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
                    <div class="card d-none d-lg-block">
                        <div class="card-header">
                            <h4 class="mb-0">Extra Area Chart</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline text-center m-t-40">
                                <li>
                                    <h5><i class="fa fa-circle me-1 text-warning"></i>Applied jobs</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle me-1 text-danger"></i>Viewed Jobs</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle me-1 text-success"></i>Saved jobs</h5>
                                </li>
                            </ul>
                            <div class="chart full-width" id="line-chart" style="height:300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Notifications</h4>
                        </div>
                        <div class="ground-list ground-list-hove">
                            @forelse($notifications as $notification)
                            <div class="ground ground-single-list">
                                <a href="{{ $notification->data['url'] ?? '#' }}">
                                    <div class="btn-circle-40 text-info bg-light-info">
                                        <i class="fa-solid fa-bell"></i>
                                    </div>
                                </a>

                                <div class="ground-content">
                                    <h6>
                                        <a href="{{ $notification->data['url'] ?? '#' }}">
                                            {{ $notification->data['message'] ?? 'New notification' }}
                                        </a>
                                    </h6>
                                    <span class="small">{{ $notification->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            @empty
                            <p class="px-3 py-2">No notifications found.</p>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
            <!-- Row End -->

            <!-- Row Start -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Shortlisted Jobs</h4>
                        </div>
                        <div class="card-body px-4 py-4">
                            <!-- Start All List -->
                            <div class="row justify-content-start gx-3 gy-4">

                                <!-- Single Item -->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    @forelse($shortlistedJobs as $job)
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb jbs-verified">
                                                    <a href="{{ route('job-detail', ['id' => $job->id]) }}">
                                                        <figure>
                                                            <img src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : asset('assets/img/default-logo.png') }}"
                                                                class="img-fluid" alt="{{ $job->company_name }}">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap">
                                                        <span
                                                            class="label text-success bg-light-success">{{ ucfirst($job->type) }}</span>
                                                    </div>
                                                    <div class="jbs-job-title-wrap">
                                                        <h4>
                                                            <a href="{{ route('job-detail', ['id' => $job->id]) }}"
                                                                class="jbs-job-title">
                                                                {{ $job->title }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>{{ $job->company_name }}</span>.
                                                            <span><i
                                                                    class="fa-solid fa-location-dot me-1"></i>{{ $job->country }}</span>.
                                                            <span>{{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs">
                                                    <div class="ilop-tr"><i class="fa-solid fa-sack-dollar"></i></div>
                                                    <h5 class="jbs-list-pack">
                                                        {{ $job->salary }} <span class="patype">/PA</span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="{{ route('job-detail', ['id' => $job->id]) }}"
                                                    class="btn btn-md btn-outline-secondary px-3 me-2">View Detail</a>
                                                <a href="#" class="btn btn-md btn-primary px-3">Quick Apply</a>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <p>No shortlisted jobs found.</p>
                                    @endforelse

                                </div>

                            </div>
                            <!-- End All Job List -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row End -->

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

@endsection