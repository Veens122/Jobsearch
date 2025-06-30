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
                    <h1 class="mb-1 fs-3 fw-medium">Manage Jobs</h1>

                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">

            <div class="dashboard-widg-bar d-block">

                <!-- Row Start -->


                <!-- Row End -->

                <section>
                    <div class="container">
                        <div class="row">
                            <h4>Manage Job List</h4>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <!-- Search Box -->
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <form action="{{ route('superadmin.jobs.manage-jobs') }}" method="GET">
                                            <div class="input-group">
                                                <input type="text" name="employer" class="form-control"
                                                    placeholder="Search by employer name"
                                                    value="{{ request('employer') }}">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>



                                <!-- Shorting Box -->
                                <div class="row justify-content-center mb-5">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="item-shorting-box">
                                            <div class="item-shorting clearfix">
                                                <div class="left-column">
                                                    <h4 class="m-sm-0 mb-2">Showing {{ $jobs->count() }} of
                                                        {{ $jobs->total() }}
                                                        Results
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Start All List -->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Job Title</th>
                                                <th>Company</th>
                                                <th>Location</th>
                                                <th>Type</th>
                                                <th>Experience</th>
                                                <th>Posted</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jobs as $job)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('job-detail', ['id' => $job->id]) }}"
                                                        class="text-primary fw-bold">
                                                        {{ $job->title }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : asset('assets/img/default-logo.png') }}"
                                                            class="rounded-circle me-2" width="40" height="40"
                                                            alt="{{ $job->company_name }}">
                                                        <a href="{{ route('employer-profile', $job->employer_id) }}"
                                                            class="text-dark">
                                                            {{ $job->company_name }}
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $job->city }}, {{ $job->country }}</td>
                                                <td>{{ ucfirst($job->type) }}</td>
                                                <td>{{ $job->experience }}</td>
                                                <td>
                                                    <span class="text-muted"
                                                        title="{{ $job->created_at->format('M d, Y h:i A') }}">
                                                        {{ $job->created_at->diffForHumans() }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('job-detail', ['id' => $job->id]) }}"
                                                            class="btn btn-sm btn-outline-primary" title="View Job">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        <form action="{{ route('superadmin.job.delete', $job->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                                onclick="return confirm('Are you sure you want to delete this job?')"
                                                                title="Delete Job">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <div class="row mt-4">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        {{ $jobs->appends(request()->query())->links() }}
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </section>




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