@extends('layouts.app')
@section('content')

<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    <!-- <div class="header header-light head-shadow">
        <div class="container">
            <nav id="navigation" class="navigation navigation-landscape">
                <div class="nav-header">
                    <a class="nav-brand" href="#">
                        <img src="{{ asset('assets/img/logo.png') }}" class="logo" alt="">
                    </a>

                </div>

            </nav>
        </div>
    </div> -->
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ============================ Header Top Start================================== -->
    <!-- <section class="bg-cover primary-bg-dark position-relative py-4">
        <div class="position-absolute top-0 end-0 z-0">
            <img src="assets/img/shape-3-soft-light.svg" alt="SVG" width="100">
        </div>
        <div class="position-absolute top-0 start-0 me-10 z-0">
            <img src="assets/img/shape-1-soft-light.svg" alt="SVG" width="150">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-9 col-md-12">
                    <div class="bread-wraps breadcrumbs light">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="grid-style-1.html">Career</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sr. Front-end Designer</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ============================ Header Top End ================================== -->

    <!-- ================================  Job Detail ========================== -->
    <section class="gray-simple position-relative">
        <div class="position-absolute top-0 start-0 primary-bg-dark ht-200 end-0"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">

                    <div class="jbs-blocs style_03 border-0 b-0 mb-md-4 mb-sm-4">
                        <div class="jbs-blocs-body">
                            <div class="jbs-content px-4 py-4 border-bottom">
                                <div class="jbs-head-bodys-top">
                                    <div class="jbs-roots-y1 flex-column justify-content-start align-items-start">
                                        <div class="jbs-roots-y1-last">
                                            <div class="jbs-urt mb-2"><span
                                                    class="label text-light primary-2-bg">{{ $job->type }}</span></div>
                                            <div class="jbs-title-iop mb-1">
                                                <h2 class="m-0 fs-2">{{ $job->title }}</h2>
                                            </div>
                                            <div
                                                class="jbs-locat-oiu text-sm-muted text-light d-flex align-items-center">
                                                <span class="text-muted"><i
                                                        class="fa-solid fa-location-dot me-1"></i>{{ $job->country }}</span>

                                            </div>
                                        </div>

                                        <div class="jbs-roots-y6 py-1 d-flex align-items-start flex-wrap">
                                            <div class="exloip-wraps me-4 my-2">
                                                <div class="drixko-box d-flex align-items-center">
                                                    <div class="drixko-box-ico me-2">
                                                        <span
                                                            class="square--30 rounded-2 bg-light-primary text-primary"><i
                                                                class="fa-solid fa-briefcase"></i></span>
                                                    </div>
                                                    <div class="drixko-box-caps"><span
                                                            class="text-medium fw-medium">{{ $job->category_title }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="exloip-wraps me-4 my-2">
                                                <div class="drixko-box d-flex align-items-center">
                                                    <div class="drixko-box-ico me-2">
                                                        <span
                                                            class="square--30 rounded-2 bg-light-primary text-primary"><i
                                                                class="fa-brands fa-wordpress"></i></span>
                                                    </div>
                                                    <div class="drixko-box-caps"><span
                                                            class="text-medium fw-medium">{{ $job->experience_level }}
                                                            Years Experience</span></div>
                                                </div>
                                            </div>
                                            <div class="exloip-wraps my-2 mb-0">
                                                <div class="drixko-box d-flex align-items-center">
                                                    <div class="drixko-box-ico me-2">
                                                        <span
                                                            class="square--30 rounded-2 bg-light-primary text-primary"><i
                                                                class="fa-solid fa-sack-dollar"></i></span>
                                                    </div>
                                                    <div class="drixko-box-caps"><span
                                                            class="text-medium fw-medium">{{ $job->salary }} PA</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jbs-content px-4 py-4 border-bottom">
                                <h5>Job Description</h5>
                                <p>{{ $job->description }}</p>


                            </div>
                            <div class="jbs-content-body px-4 py-4">
                                <h5 class="mb-3">Job Requirements</h5>
                                <div class="jbs-content mb-3">
                                    <h6>Requirements:</h6>
                                    <ul class="simple-list">
                                        <li>Candidate must have a Bachelors or Masters degree in Computer. (B.tech, Bsc
                                            or BCA/MCA)</li>
                                        <li>Candidate must have a good working knowledge of Javascript and Jquery.</li>
                                        <li>Good knowledge of HTML and CSS is required.</li>
                                        <li>Experience in Word press is an advantage</li>
                                        <li>Jamshedpur, Jharkhand: Reliably commute or planning to relocate before
                                            starting work (Required)</li>
                                    </ul>
                                </div>

                                <div class="jbs-content mb-4">
                                    <h6>Responsibilities:</h6>
                                    <ul class="simple-list">
                                        <li>Write clean, maintainable and efficient code.</li>
                                        <li>Design robust, scalable and secure features.</li>
                                        <li>Collaborate with team members to develop and ship web applications within
                                            tight timeframes.</li>
                                        <li>Work on bug fixing, identifying performance issues and improving application
                                            performance</li>
                                        <li>Write unit and functional testcases.</li>
                                        <li>Continuously discover, evaluate, and implement new technologies to maximise
                                            development efficiency. Handling complex technical iss</li>
                                    </ul>
                                </div>

                                <div class="jbs-content mb-4">
                                    <h6>Qualifications and Educations</h6>
                                    <ul class="colored-list">
                                        <li>Minimum of {{ $job->education_level }}</li>

                                    </ul>
                                </div>

                                <div class="jbs-content">
                                    <h6>Required Skills</h6>
                                    <ul class="p-0 m-0 d-flex align-items-center flex-wrap">
                                        <li class="me-1 mb-1"><span
                                                class="label bg-light-success text-success fw-medium">
                                                {{ $job->skills }}</span></li>



                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="jbs-blox-footer">

                            <div class="blox-last-footer">
                                <div class="jbs-roots-action-btns">
                                    <p class="m-0"><span
                                            class="text-muted me-1">{{ $job->application_count }}</span>|<span
                                            class="text-muted ms-1">{{ $job->time_posted }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-12">
                    {{-- Show only for candidates --}}
                    @auth
                    @if(Auth::user()->role_id === 3) {{-- Candidate --}}
                    <div class="detail-side-block bg-white mb-4">
                        <div class="detail-side-heads mb-2">
                            <h3>Ready To Apply?</h3>
                        </div>
                        <form action="{{ route('job.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="job_id" value="{{ $job->id }}">

                            <div class="detail-side-middle">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" class="form-control" placeholder=""
                                        value="{{ Auth::user()->name }}" readonly>
                                    <label>Name:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" placeholder=""
                                        value="{{ Auth::user()->email }}" readonly>
                                    <label>Email:</label>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Upload Resume</label>
                                    <input type="file" name="resume" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Upload Cover Letter</label>
                                    <input type="file" name="resume" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary full-width fw-medium font-sm">
                                        Submit Application
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                    @else
                    {{-- For guests: redirect to login/register --}}
                    <div class="detail-side-block bg-white mb-4">
                        <div class="detail-side-heads mb-2">
                            <h3>Ready To Apply?</h3>

                            @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                        </div>
                        <div class="detail-side-middle text-center">
                            <p class="mb-3">You need to be logged in as a candidate to apply for this job.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary mb-2 full-width">Login</a>
                            <a href="{{ route('candidate.sign-up') }}" class="btn btn-outline-primary full-width">Sign
                                Up</a>
                        </div>
                    </div>
                    @endauth


                    <div class="side-jbs-info-blox bg-white mb-4">
                        <div class="side-jbs-info-header">
                            <div class="side-jbs-info-thumbs">
                                <figure> <img
                                        src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : asset('assets/img/default-logo.png') }}"
                                        class="img-fluid" alt="{{ $job->company_name }}"></figure>
                            </div>
                            <div class="side-jbs-info-captionyo ps-3">
                                <div class="sld-info-title">
                                    <h5 class="rtls-title mb-1">{{ $job->company_name }}</h5>
                                    <div class="jbs-locat-oiu text-sm-muted">
                                        <span class="me-1"><i
                                                class="fa-solid fa-location-dot me-1"></i>{{ $job->country }}</span>.<span
                                            class="ms-1">{{ $job->industry }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="side-jbs-info-middle">
                            <div class="side-full-info-groups">
                                <div class="single-side-info">
                                    <span class="text-sm-muted sld-subtitle">Company Founder:</span>
                                    <h6 class="sld-title">{{ $employer->name }}</h6>
                                </div>
                                <div class="single-side-info">
                                    <span class="text-sm-muted sld-subtitle">Industry:</span>
                                    <h6 class="sld-title">{{ $employer->industry }}</h6>
                                </div>
                                <div class="single-side-info">
                                    <span class="text-sm-muted sld-subtitle">Founded:</span>
                                    <h6 class="sld-title">{{ $job->date_founded }}</h6>
                                </div>
                                <div class="single-side-info">
                                    <span class="text-sm-muted sld-subtitle">Head Office:</span>
                                    <h6 class="sld-title">{{ $job->country }}</h6>
                                </div>
                                <div class="single-side-info">
                                    <span class="text-sm-muted sld-subtitle">Revenue</span>
                                    <h6 class="sld-title">$70B+</h6>
                                </div>

                                <div class="single-side-info">
                                    <span class="text-sm-muted sld-subtitle">Min Exp.</span>
                                    <h6 class="sld-title">{{ $job->experience }} </h6>
                                </div>
                                <div class="single-side-info">
                                    <span class="text-sm-muted sld-subtitle">Openings</span>
                                    <h6 class="sld-title">06 Openings</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="side-rtl-jbs-block">
                        <div class="side-rtl-jbs-head">
                            <h5 class="side-jbs-titles">Related Jobs</h5>
                        </div>
                        <div class="side-rtl-jbs-body">
                            <div class="side-rtl-jbs-groups">
                                @if($relatedJobs->count())
                                @foreach($relatedJobs as $related)
                                <div class="single-side-rtl-jbs">
                                    <div class="single-fliox">
                                        <div class="single-rtl-jbs-caption">
                                            <div class="hjs-rtls-titles">
                                                <div class="jbs-types mb-1">
                                                    <span
                                                        class="label text-success bg-light-success">{{ $related->type }}</span>
                                                </div>
                                                <h5 class="rtls-title">
                                                    <a
                                                        href="{{ route('job.details', $related->id) }}">{{ $related->title }}</a>
                                                </h5>
                                                <div class="jbs-locat-oiu text-sm-muted">
                                                    <span><i
                                                            class="fa-solid fa-location-dot me-1"></i>{{ $related->country }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="alert alert-warning text-center mt-3">
                                    No related jobs found.
                                </div>
                                @endif

                                <!-- Always visible link -->
                                <div class="text-center mt-3">
                                    <a href="{{ route('all-jobs') }}" class="btn btn-outline-primary">See All Jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </section>
    <!-- =============================== Job Detail ================================== -->


    <!-- ============================ Call To Action ================================== -->
    <section class="bg-cover call-action-container dark primary-bg-dark"
        style="background:url(assets/img/footer-bg-dark.png)no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">

                    <div class="call-action-wrap">
                        <div class="call-action-caption">
                            <h2 class="text-light">Are You Already Working With Us?</h2>
                            <p class="fs-6 text-light">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                            </p>
                        </div>
                        <div class="call-action-form">
                            <form>
                                <div class="newsltr-form">
                                    <input type="text" class="form-control" placeholder="Enter Your email">
                                    <button type="button" class="btn btn-subscribe">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Call To Action End ================================== -->




    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
@endsection