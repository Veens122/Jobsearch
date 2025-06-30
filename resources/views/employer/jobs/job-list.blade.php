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
                        <h1 class="mb-1 fs-3 fw-medium">Manage jobs</h1>
                        <nav aria-label="breadcrumb">

                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">


                <!-- Header Wrap -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="_mp-inner-content elior">
                                    <div class="_mp-inner-first w-100">
                                        <form method="GET" action="{{ route('employer.jobs.job-list') }}"
                                            class="d-flex w-100">
                                            <input type="text" name="search" class="form-control w-100"
                                                placeholder="Job title, Keywords etc." value="{{ request('search') }}">
                                            <button type="submit" class="btn btn-primary ms-2">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>




                            <div class="card-body">
                                <!-- Row -->
                                @php use Illuminate\Support\Str; @endphp

                                <div class="row mb-3">
                                    @foreach($jobs as $job)
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="jbs-list-box border">
                                            <div class="jbs-list-head">
                                                <div class="jbs-list-head-thunner">
                                                    <div class="jbs-list-emp-thumb jbs-verified">
                                                        <a href="{{ route('job-detail', $job->id) }}">
                                                            <figure> <img
                                                                    src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : asset('assets/img/default-logo.png') }}"
                                                                    class="img-fluid" alt="{{ $job->company_name }}">
                                                            </figure>
                                                    </div>

                                                    <div class="jbs-job-employer-wrap">
                                                        <span>{{ $job->employer->employerProfile->company_name ?? 'Unknown Company' }}</span>
                                                    </div>

                                                    <div class="jbs-list-job-caption">
                                                        <div class="jbs-job-employer-wrap">
                                                            <span>{{ $employer->company_name }}</span>
                                                        </div>
                                                        <div class="jbs-job-title-wrap">
                                                            <h4>
                                                                <a href="{{ route('job-detail', $job->id) }}"
                                                                    class="jbs-job-title">{{ $job->title }}</a>


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
                                                    <p class="m-0 text-sm-muted"><strong>Posted:</strong>
                                                        <span
                                                            class="text-success">{{ $job->created_at ? $job->created_at->format('d M Y') : 'N/A' }}</span>
                                                    </p>
                                                    <p class="m-0 text-sm-muted"><strong>Expiry Date:</strong>
                                                        <span
                                                            class="text-danger">{{ $job->expiry_date ? \Carbon\Carbon::parse($job->expiry_date)->format('d M Y') : 'N/A' }}
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="jbs-list-head-last">
                                                    <a href="{{ route('employer.jobs.edit-job', $job->id) }}"
                                                        class="rounded btn-md text-success bg-light-success px-3">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </a>
                                                    <form method="POST"
                                                        action="{{ route('employer.jobs.destroy', $job->id) }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="rounded btn-md text-danger bg-light-danger px-3"
                                                            onclick="return confirm('Are you sure you want to delete this job?')">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>



                                <!-- End Row -->

                                <!-- Start All List -->
                                <div class="row justify-content-start gx-3 gy-4">




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