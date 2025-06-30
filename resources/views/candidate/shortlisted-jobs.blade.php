@extends('layouts.candidate_app')

@section('content')

<div id="main-wrapper">



    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->

    <!-- ======================= dashboard Detail ======================== -->
    <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
        aria-controls="MobNav">
        <i class="fas fa-bars mr-2"></i>Dashboard Navigation
    </a>


    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">Applied Jobs</h1>
                    <p class="mb-0">Here you can find all the jobs you have applied for.</p>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">

            <!-- Header Wrap -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        {{-- FILTER FORM --}}
                        <div class="card-header">
                            <form method="GET" action="{{ route('candidate.shortListed-jobs') }}" class="w-100">
                                <div
                                    class="_mp-inner-content elior d-flex justify-content-between align-items-center flex-wrap gap-2">
                                    <div class="_mp-inner-first">
                                        <div class="search-inline">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Job title, Keywords etc." value="{{ request('search') }}">
                                            <button type="submit" class="btn btn-primary ms-2">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- JOB LIST --}}
                        <div class="card-body">
                            <div class="row justify-content-start gx-3 gy-4">
                                @forelse($shortlistedJobs as $application)
                                @php
                                $job = $application->job;
                                $employer = $job->employer->employerProfile ?? null;
                                @endphp
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            {{-- Employer Logo --}}
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb jbs-verified">
                                                    <a href="{{ route('employer-profile', $job->employer_id) }}">
                                                        <figure><img
                                                                src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : asset('assets/img/default-logo.png') }}"
                                                                class="img-fluid" alt="{{ $job->company_name }}">
                                                        </figure>
                                                    </a>
                                                </div>

                                                {{-- Job + Employer Info --}}
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap">
                                                        <span class="label text-success bg-light-success">
                                                            {{ $job->type ?? 'N/A' }}
                                                        </span>
                                                    </div>
                                                    <div class="jbs-job-title-wrap">
                                                        <h4>
                                                            <a href="{{ route('job-detail', $job->id) }}"
                                                                class="jbs-job-title">
                                                                {{ $job->title }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>{{ $employer->company_name ?? 'N/A' }}</span>.
                                                            <span><i
                                                                    class="fa-solid fa-location-dot me-1"></i>{{ $job->city ?? 'N/A' }}</span>.
                                                            <span>{{ $application->updated_at->format('d M Y') }}</span>
                                                            {{-- Shortlisted Date --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Status --}}
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs">
                                                    <span class="text-sm-muted text-light bg-success py-2 px-3 rounded">
                                                        {{ ucfirst($application->status) }}
                                                    </span>
                                                </div>
                                            </div>

                                            {{-- View Buttons --}}
                                            <div class="jbs-list-head-last">
                                                <a href="{{ route('employer-profile', $job->employer_id) }}"
                                                    class="btn btn-md btn-light-primary px-3" title="View Employer">
                                                    <i class="fa-solid fa-building"></i>
                                                </a>
                                                <a href="{{ route('job-detail', $job->id) }}"
                                                    class="btn btn-md btn-light-secondary px-3" title="View Job">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <p class="text-center text-muted">You have not been shortlisted for any jobs yet.
                                    </p>
                                </div>
                                @endforelse

                                {{-- Pagination --}}
                                <div class="col-12 mt-3">
                                    {{ $shortlistedJobs->links() }}
                                </div>
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
                <div class="py-3 text-center">© 2024 - 2025 Job Veens® Ugochukwu.</div>
            </div>
        </div>

    </div>



</div>
<!-- ======================= dashboard Detail End ======================== -->

<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

<!-- ======================= dashboard Detail End ======================== -->
@endsection