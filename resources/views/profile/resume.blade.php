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
    <div class="dashboard-wrap bg-light">
        <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
            aria-controls="MobNav">
            <i class="fas fa-bars mr-2"></i>Dashboard Navigation
        </a>

        <div class="dashboard-content">
            <div class="dashboard-tlbar d-block mb-4">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="mb-1 fs-3 fw-medium">My Resume</h1>

                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">

                <!-- Resume Section -->
                <div class="card ">

                    <div class="card-body ">
                        {{-- Upload Resume Form --}}
                        <form action="{{ route('profile.resume') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-4 gy-4 mb-3">
                                <div class="col-12">
                                    <div class="upload-btn-wrapper mb-3">
                                        <label class="form-label">Upload Resume</label>
                                        <input type="file" name="resume" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button type="submit" class="btn btn-primary">Save Resume</button>
                                </div>
                            </div>
                        </form>

                        {{-- Show Existing Resume --}}
                        @if (auth()->user()->candidateProfile && auth()->user()->candidateProfile->resume)
                        @php
                        $resumePath = auth()->user()->candidateProfile->resume;
                        $resumeUrl = asset('storage/' . $resumePath);
                        $isPdf = \Illuminate\Support\Str::endsWith($resumePath, '.pdf');
                        @endphp

                        <hr>
                        <h5 class="mt-4">Current Resume:</h5>

                        <div class="d-flex align-items-center gap-3 mt-2">
                            {{-- Download Link --}}
                            <a href="{{ $resumeUrl }}" class="btn btn-success" target="_blank">
                                Download Resume
                            </a>

                            {{-- Delete Resume Form --}}
                            <form action="{{ route('profile.resume.delete') }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete your resume?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Delete Resume
                                </button>
                            </form>
                        </div>

                        {{-- Preview Resume --}}
                        @if ($isPdf)
                        <h6 class="mt-4">Preview:</h6>
                        <iframe src="{{ $resumeUrl }}" width="100%" height="500px"
                            style="border: 1px solid #ccc;"></iframe>
                        @else
                        <p class="text-muted mt-3">Preview not available. Only PDF files can be previewed here.</p>
                        @endif
                        @endif
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