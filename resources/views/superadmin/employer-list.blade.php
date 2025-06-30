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


    <!-- ============================ Page Title Start================================== -->
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">Manage Employers List</h1>

                </div>
            </div>
        </div>


        <div class="dashboard-widg-bar d-block">
            <!-- ============================ Page Title End ================================== -->

            <!-- ============================ All List Wrap ================================== -->
            <section>
                <div class="container">
                    <div class="row">



                        <!-- Job List Wrap -->
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <p>Filter by status:</p>
                            <form method="GET" action="{{ route('superadmin.employer-list') }}">
                                <select name="status" onchange="this.form.submit()" class="form-select">
                                    <option value="pending" @if(($status ?? '' )==='pending' ) selected @endif>
                                        Pending</option>
                                    <option value="approved" @if(($status ?? '' )==='approved' ) selected @endif>
                                        Approved
                                    </option>
                                    <option value="all" @if(($status ?? '' )==='all' ) selected @endif>All</option>
                                </select>
                            </form>
                        </div>






                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Registered At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employers as $index => $employer)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $employer->name }}</td>
                                    <td>{{ $employer->email }}</td>
                                    <td>{{ $employer->created_at->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $employer->is_approved ? 'success' : 'warning' }}">
                                            {{ $employer->is_approved ? 'Approved' : 'Pending' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info">View</a>

                                        @if(!$employer->is_approved)
                                        <form action="{{ route('superadmin.approve-employer', $employer->id) }}"
                                            method="POST" style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to approve this employer?');">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                        </form>

                                        <form action="{{ route('superadmin.decline-employer', $employer->id) }}"
                                            method="POST" style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to decline this employer?');">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($employers->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">No employers found for the selected status.</td>
                        </tr>
                        @endif
                        <!-- Job List Wrap End-->

                    </div>
                </div>
            </section>
            <!-- ============================ All List Wrap ================================== -->




        </div>

        <!-- Footer -->
        <div class="row">
            <div class="col-md-12">
                <div class="py-3 text-center">© 2024 - 2025 Job Veens® Ugochukwu.</div>
            </div>
        </div>
    </div>

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

@endsection