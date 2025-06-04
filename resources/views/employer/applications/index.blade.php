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
                        <h1 class="mb-1 fs-3 fw-medium">Applied Jobs</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="#">Candidate</a></li>
                                <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="text-primary">Applied Jobs</a></li>
                            </ol>
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
                                    <div class="_mp-inner-first">
                                        <div class="search-inline">
                                            <input type="text" class="form-control"
                                                placeholder="Job title, Keywords etc.">
                                            <button type="button" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                    <div class="_mp_inner-last">
                                        <div class="item-shorting-box-right">
                                            <div class="shorting-by me-2 small">
                                                <select>
                                                    <option value="0">Short by (Default)</option>
                                                    <option value="1">Short by (Featured)</option>
                                                    <option value="2">Short by (Urgent)</option>
                                                    <option value="3">Short by (Post Date)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Start All List -->
                                <div class="row justify-content-start gx-3 gy-4">
                                    @forelse($applications as $application)
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="jbs-list-box border">
                                            <div class="jbs-list-head">
                                                <div class="jbs-list-head-thunner">
                                                    <div class="jbs-list-emp-thumb jbs-verified">
                                                        <a
                                                            href="{{ route('applications.index', $application->job->id) }}">
                                                            <figure>
                                                                <img src="{{ asset('assets/img/l-1.png') }}"
                                                                    class="img-fluid" alt="">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                    <div class="jbs-list-job-caption">
                                                        <div class="jbs-job-types-wrap">
                                                            <span
                                                                class="label text-success bg-light-success">{{ $application->job->job_type ?? 'N/A' }}</span>
                                                        </div>
                                                        <div class="jbs-job-title-wrap">
                                                            <h4>
                                                                <a href="{{ route('applications.show-candidate', $application->id) }}"
                                                                    class="jbs-job-title">
                                                                    {{ $application->job->title }}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div class="jbs-job-mrch-lists">
                                                            <div class="single-mrch-lists">
                                                                <span>{{ $application->job->company_name }}</span>.
                                                                <span><i
                                                                        class="fa-solid fa-location-dot me-1"></i>{{ $application->job->location }}</span>.
                                                                <span>{{ \Carbon\Carbon::parse($application->created_at)->format('d M Y') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="jbs-list-head-middle">
                                                    <div class="elsocrio-jbs">
                                                        <span class="text-sm-muted">Applied on
                                                            {{ $application->created_at->format('d M Y') }}</span>
                                                    </div>
                                                </div>

                                                <div class="jbs-list-head-middle">
                                                    <div class="elsocrio-jbs">
                                                        @php
                                                        $statusClass = match($application->status) {
                                                        'approved' => 'bg-success',
                                                        'shortlisted' => 'bg-info',
                                                        'ignored' => 'bg-secondary',
                                                        default => 'bg-warning'
                                                        };
                                                        @endphp
                                                        <span
                                                            class="text-sm-muted text-light {{ $statusClass }} py-2 px-3 rounded text-capitalize">
                                                            {{ $application->status }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="jbs-list-head-last">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                            type="button" id="dropdownMenuButton{{ $application->id }}"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton{{ $application->id }}">

                                                            {{-- Show only if the application is not already finalized --}}
                                                            @if (!in_array($application->status, ['ignored', 'approved',
                                                            'shortlisted']))
                                                            {{-- Shortlist Action --}}
                                                            <li>
                                                                <form
                                                                    action="{{ route('shortlist', $application->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Shortlist this candidate?');">
                                                                    @csrf
                                                                    <button
                                                                        class="dropdown-item text-green-600 hover:underline">Shortlist</button>
                                                                </form>
                                                            </li>

                                                            {{-- Reject Action --}}
                                                            <li>
                                                                <form action="{{ route('reject', $application->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Reject this candidate?');">
                                                                    @csrf
                                                                    <button
                                                                        class="dropdown-item text-red-600 hover:underline">Reject</button>
                                                                </form>
                                                            </li>
                                                            @endif

                                                            {{-- View Candidate --}}
                                                            <li>
                                                                <a href="{{ route('applications.show-candidate', $application->id) }}"
                                                                    class="dropdown-item">View</a>
                                                            </li>

                                                            {{-- Delete Application --}}
                                                            <li>
                                                                <form action="{{ route('destroy', $application->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Delete this application?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        class="dropdown-item text-gray-600 hover:underline">Delete</button>
                                                                </form>
                                                            </li>

                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12">
                                        <div class="alert alert-info">
                                            No applications found.
                                        </div>
                                    </div>
                                    @endforelse
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Wrap -->

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