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

            <!-- ============================ Page Title End ================================== -->

            <!-- ================================  Job Detail ========================== -->
            <section class="gray-simple over-lg-top pt-0 pb-0">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-11 col-lg-12 col-md-12">

                            <div class="jbs-dts-block styl-01">
                                <div class="jbs-dts-header">
                                    <div class="jbs-dts-header-thumbs">
                                        <div class="jbs-dts-hgiu mb-2">
                                            <figure><img
                                                    src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : asset('assets/img/default-logo.png') }}"
                                                    class="img-fluid" alt="{{ $job->company_name }}">
                                            </figure>
                                        </div>
                                        <!-- <div class="jbs-dts-iop">
                                            <span>04 More Openings</span>
                                        </div> -->
                                    </div>
                                    <div class="jbs-dts-header-caption">
                                        <div class="jbs-dts-topper-block mb-4">
                                            <div class="jbs-urt"><span
                                                    class="label text-success bg-light-success">{{ $job->type }}</span>
                                            </div>
                                            <div class="jbs-title-iop">
                                                <h2 class="m-0">{{ $job->title }}</h2>
                                            </div>
                                            <div class="jbs-locat-oiu text-sm-muted"><span><i
                                                        class="fa-solid fa-location-dot me-1"></i>{{ $job->country }}</span>
                                            </div>
                                        </div>
                                        <div class="jbs-dts-mid-block mb-4">
                                            <div class="jbs-mid-groups">
                                                <div class="jbs-single-iou">
                                                    <span class="jhu-subtitle">Role</span>
                                                    <h4 class="jhu-title">{{ $job->title }}</h4>
                                                </div>
                                                <div class="jbs-single-iou">
                                                    <span class="jhu-subtitle">Experience</span>
                                                    <h4 class="jhu-title">{{ $job->experience_level }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jbs-dts-foot-block">
                                            <span class="jhu-subtitle"> Skills</span>
                                            <div class="sprpower-skills">
                                                <span><i class="fa-regular fa-star"></i>{{ $job->skills }}</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="jbs-dts-body bg-white rounded full-width px-lg-4 px-3 py-4">
                                    <div class="jbs-dts-body-content">
                                        <ul class="nav nav-pills small-jbs-tab d-inline-flex gap-2 mb-3" id="pills-tab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="job-description-tab"
                                                    data-bs-toggle="pill" data-bs-target="#job-description"
                                                    type="button" role="tab" aria-controls="job-description"
                                                    aria-selected="true">Job Description</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="job-requirements-tab" data-bs-toggle="pill"
                                                    data-bs-target="#job-requirements" type="button" role="tab"
                                                    aria-controls="job-requirements" aria-selected="false">Job
                                                    Requirements</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="company-review-tab" data-bs-toggle="pill"
                                                    data-bs-target="#company-review" type="button" role="tab"
                                                    aria-controls="company-review" aria-selected="false">Company
                                                    Review</button>
                                            </li>
                                        </ul>


                                        <div class="tab-content" id="pills-tabContent">
                                            <!-- Job Description-->
                                            <div class="tab-pane fade show active" id="job-description" role="tabpanel"
                                                aria-labelledby="job-description-tab" tabindex="0">
                                                <div class="row">
                                                    <div class="col-xl-9 col-lg-10 col-md-12">
                                                        <div class="jbs-content">
                                                            <p>{{ $job->description }}</p>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Job Requirements -->
                                            <div class="tab-pane fade" id="job-requirements" role="tabpanel"
                                                aria-labelledby="job-requirements-tab" tabindex="0">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                                        <div class="jbs-content mb-4">
                                                            <h6>Requirements:</h6>
                                                            <ul class="simple-list">
                                                                <li>Candidate must have a Bachelors or Masters
                                                                    degree in Computer. (B.tech, Bsc or BCA/MCA)
                                                                </li>
                                                                <li>Candidate must have a good working knowledge of
                                                                    Javascript and Jquery.</li>
                                                                <li>Good knowledge of HTML and CSS is required.</li>
                                                                <li>Experience in Word press is an advantage</li>
                                                                <li>Jamshedpur, Jharkhand: Reliably commute or
                                                                    planning to relocate before starting work
                                                                    (Required)</li>
                                                            </ul>
                                                        </div>

                                                        <div class="jbs-content mb-4">
                                                            <h6>Responsibilities:</h6>
                                                            <ul class="simple-list">
                                                                <li>Write clean, maintainable and efficient code.
                                                                </li>
                                                                <li>Design robust, scalable and secure features.
                                                                </li>
                                                                <li>Collaborate with team members to develop and
                                                                    ship web applications within tight timeframes.
                                                                </li>
                                                                <li>Work on bug fixing, identifying performance
                                                                    issues and improving application performance
                                                                </li>
                                                                <li>Write unit and functional testcases.</li>
                                                                <li>Continuously discover, evaluate, and implement
                                                                    new technologies to maximise development
                                                                    efficiency. Handling complex technical iss</li>
                                                            </ul>
                                                        </div>

                                                        <div class="jbs-content">
                                                            <h6>Qualifications and Skills</h6>
                                                            <ul class="colored-list">
                                                                <li>
                                                                <li>Minimum of {{ $job->education_level }}</li>
                                                                </li>
                                                                <li>
                                                                <li>{{ $job->skills }}</li>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Company Review -->
                                            <div class="tab-pane fade" id="company-review" role="tabpanel"
                                                aria-labelledby="company-review-tab" tabindex="0">
                                                <div class="row">
                                                    <div class="col-xl-9 col-lg-12 col-md-12">

                                                        <div class="single-cdtsr-block pt-4 pb-2">
                                                            <div class="single-cdtsr-body">
                                                                <div
                                                                    class="row align-items-center justify-content-between gy-4">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="cdtx-infr-box">
                                                                            <div class="cdtx-infr-icon"><i
                                                                                    class="fa-solid fa-envelope-open-text"></i>
                                                                            </div>
                                                                            <div class="cdtx-infr-captions">
                                                                                <h5>
                                                                                    <li>{{ $job->company_email }}</li>
                                                                                </h5>
                                                                                <p>Mail Address</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="cdtx-infr-box">
                                                                            <div class="cdtx-infr-icon"><i
                                                                                    class="fa-solid fa-phone-volume"></i>
                                                                            </div>
                                                                            <div class="cdtx-infr-captions">
                                                                                <h5>{{ $job->phone }}</h5>
                                                                                <p>Phone No.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="cdtx-infr-box">
                                                                            <div class="cdtx-infr-icon"><i
                                                                                    class="fa-regular fa-user"></i>
                                                                            </div>
                                                                            <div class="cdtx-infr-captions">
                                                                                <h5>{{ $job->gender }}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="cdtx-infr-box">
                                                                            <div class="cdtx-infr-icon"><i
                                                                                    class="fa-solid fa-cake-candles"></i>
                                                                            </div>
                                                                            <div class="cdtx-infr-captions">
                                                                                <h5>{{ $job->age_limit }}</h5>
                                                                                <p>Age</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="cdtx-infr-box">
                                                                            <div class="cdtx-infr-icon"><i
                                                                                    class="fa-solid fa-wallet"></i>
                                                                            </div>

                                                                            <div class="cdtx-infr-captions">
                                                                                <h5>{{ $job->salary }}</h5>
                                                                                <p>Offerd Sallary</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="cdtx-infr-box">
                                                                            <div class="cdtx-infr-icon"><i
                                                                                    class="fa-solid fa-briefcase"></i>
                                                                            </div>
                                                                            <div class="cdtx-infr-captions">
                                                                                <h5>{{ $job->experience_level }}</h5>
                                                                                <p>Experience</p>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="cdtx-infr-box">
                                                                            <div class="cdtx-infr-icon"><i
                                                                                    class="fa-solid fa-user-graduate"></i>
                                                                            </div>
                                                                            <div class="cdtx-infr-captions">
                                                                                <h5>{{ $job->education_level }}</h5>
                                                                                <p>Qualification</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                                        <div class="cdtx-infr-box">
                                                                            <div class="cdtx-infr-icon"><i
                                                                                    class="fa-solid fa-layer-group"></i>
                                                                            </div>
                                                                            <div class="cdtx-infr-captions">
                                                                                <h5>{{ $job->type }}</h5>
                                                                                <p>Work Type</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="my-4 position-relative">
                                            <!-- <button type="button" class="btn btn-md btn-primary fw-medium me-3"
                                                data-bs-toggle="modal" data-bs-target="#applyjob">Apply Now</button> -->
                                            <button type="button" class="btn btn-md btn-gray fw-medium"><i
                                                    class="fa-solid fa-heart me-2"></i>Save</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- =============================== Job Detail ================================== -->




            <!-- Log In Modal -->

            <!-- End Modal -->

            <!-- Apply Job Modal -->
            <section class="applyjob-section py-5">
                <div class="container applyjob-pop-form">
                    <div class="applyjob-box p-4 bg-white rounded shadow">
                        <div class="detail-side-heads mb-4">
                            <h3>Ready To Apply?</h3>
                            <p>Complete the eligibility checklist now and get started with your online application</p>
                        </div>
                        <div class="detail-side-middle">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="">
                                <label>Name:</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="">
                                <label>Email:</label>
                            </div>
                            <div class="form-group mb-3">
                                <div class="upload-btn-wrapper full-width">
                                    <button class="btn full-width">Upload Resume</button>
                                    <input type="file" name="myfile">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <button type="button" class="btn btn-primary full-width fw-medium font-sm">Submit
                                    Application</button>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <p>Don't have an account yet? <a href="signup.html" class="text-primary font--bold">Sign
                                    Up</a></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- End Modal -->

            <!-- Filter Modal -->
            <!-- <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filtermodal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered filter-popup" role="document">
                    <div class="modal-content" id="filtermodal">
                        <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i
                                class="fas fa-close"></i></span>
                        <div class="modal-header">
                            <h4 class="modal-header-sub-title">Start Your Filter</h4>
                        </div>
                        <div class="modal-body p-0">
                            <div class="filter-content">
                                <div class="full-tabs-group">
                                    <div class="single-tabs-group">
                                        <div class="single-tabs-group-header">
                                            <h5>Job Match Score</h5>
                                        </div>

                                        <div class="single-tabs-group-content">
                                            <div class="d-flex flex-wrap">
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="msix">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="msix">6.0</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="msixfive">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="msixfive">6.5</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="mseven">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="mseven">7.0</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="msevenfive">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="msevenfive">7.5</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="meight">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="meight">8.0</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="meightfive">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="meightfive">8.5</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="mnine">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="mnine">9.0</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="mninefive">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="mninefive">9.5</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="mten">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="mten">10</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-tabs-group">
                                        <div class="single-tabs-group-header">
                                            <h5>Job Value Score</h5>
                                        </div>

                                        <div class="single-tabs-group-content">
                                            <div class="d-flex flex-wrap">
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="vsix">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="vsix">6.0</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="vsixfive">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="vsixfive">6.5</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="vseven">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="vseven">7.0</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="vsevenfive">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="vsevenfive">7.5</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="veight">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="veight">8.0</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="veightfive">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="veightfive">8.5</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="vnine">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="vnine">9.0</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="vninefive">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="vninefive">9.5</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="vten">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="vten">10</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-tabs-group">
                                        <div class="single-tabs-group-header">
                                            <h5>Place Of Work</h5>
                                        </div>

                                        <div class="single-tabs-group-content">
                                            <div class="d-flex flex-wrap">
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="anywhere" checked>
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="anywhere">Anywhere</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="onsite">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="onsite">On Site</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="remote">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="remote">Fully Remote</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-tabs-group">
                                        <div class="single-tabs-group-header">
                                            <h5>Type Of Contract</h5>
                                        </div>

                                        <div class="single-tabs-group-content">
                                            <div class="d-flex flex-wrap">
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="employee1">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="employee1">Employee</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="frelancers1">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="frelancers1">Freelancer</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="contractor1">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="contractor1">Contractor</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="internship1">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="internship1">Internship</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-tabs-group">
                                        <div class="single-tabs-group-header">
                                            <h5>Type Of Employment</h5>
                                        </div>

                                        <div class="single-tabs-group-content">
                                            <div class="d-flex flex-wrap">
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="fulltime">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="fulltime">Full Time</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="parttime">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="parttime">Part Time</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="freelance2" checked>
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="freelance2">Freelance</label>
                                                </div>
                                                <div class="sing-btn-groups">
                                                    <input type="checkbox" class="btn-check" id="internship2">
                                                    <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                        for="internship2">Internship</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-tabs-group">
                                        <div class="single-tabs-group-header">
                                            <h5>Radius In Miles</h5>
                                        </div>

                                        <div class="single-tabs-group-content">
                                            <div class="rg-slider">
                                                <input type="text" class="js-range-slider" name="my_range" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-tabs-group">
                                        <div class="single-tabs-group-header">
                                            <h5>Explore Top Categories</h5>
                                        </div>

                                        <div class="single-tabs-group-content">
                                            <ul class="row p-0 m-0">
                                                <li class="col-lg-6 col-md-6 p-0">
                                                    <div class="form-check form-check-inline">
                                                        <input id="s-1" class="form-check-input" name="s-1"
                                                            type="checkbox">
                                                        <label for="s-1" class="form-check-label">IT
                                                            Computers</label>
                                                    </div>
                                                </li>
                                                <li class="col-lg-6 col-md-6 p-0">
                                                    <div class="form-check form-check-inline">
                                                        <input id="s-2" class="form-check-input" name="s-2"
                                                            type="checkbox">
                                                        <label for="s-2" class="form-check-label">Web Design</label>
                                                    </div>
                                                </li>
                                                <li class="col-lg-6 col-md-6 p-0">
                                                    <div class="form-check form-check-inline">
                                                        <input id="s-3" class="form-check-input" name="s-3"
                                                            type="checkbox">
                                                        <label for="s-3" class="form-check-label">Web
                                                            development</label>
                                                    </div>
                                                </li>
                                                <li class="col-lg-6 col-md-6 p-0">
                                                    <div class="form-check form-check-inline">
                                                        <input id="s-4" class="form-check-input" name="s-4"
                                                            type="checkbox">
                                                        <label for="s-4" class="form-check-label">SEO
                                                            Services</label>
                                                    </div>
                                                </li>
                                                <li class="col-lg-6 col-md-6 p-0">
                                                    <div class="form-check form-check-inline">
                                                        <input id="s-5" class="form-check-input" name="s-5"
                                                            type="checkbox">
                                                        <label for="s-5" class="form-check-label">Financial
                                                            Service</label>
                                                    </div>
                                                </li>
                                                <li class="col-lg-6 col-md-6 p-0">
                                                    <div class="form-check form-check-inline">
                                                        <input id="s-6" class="form-check-input" name="s-6"
                                                            type="checkbox">
                                                        <label for="s-6" class="form-check-label">Art, Design,
                                                            Media</label>
                                                    </div>
                                                </li>
                                                <li class="col-lg-6 col-md-6 p-0">
                                                    <div class="form-check form-check-inline">
                                                        <input id="s-7" class="form-check-input" name="s-7"
                                                            type="checkbox">
                                                        <label for="s-7" class="form-check-label">Coach &
                                                            Education</label>
                                                    </div>
                                                </li>
                                                <li class="col-lg-6 col-md-6 p-0">
                                                    <div class="form-check form-check-inline">
                                                        <input id="s-8" class="form-check-input" name="s-8"
                                                            type="checkbox">
                                                        <label for="s-8" class="form-check-label">Apps
                                                            Developements</label>
                                                    </div>
                                                </li>
                                                <li class="col-lg-6 col-md-6 p-0">
                                                    <div class="form-check form-check-inline">
                                                        <input id="s-9" class="form-check-input" name="s-9"
                                                            type="checkbox">
                                                        <label for="s-9" class="form-check-label">IOS
                                                            Development</label>
                                                    </div>
                                                </li>
                                                <li class="col-lg-6 col-md-6 p-0">
                                                    <div class="form-check form-check-inline">
                                                        <input id="s-10" class="form-check-input" name="s-10"
                                                            type="checkbox">
                                                        <label for="s-10" class="form-check-label">Android
                                                            Development</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="single-tabs-group">
                                        <div class="single-tabs-group-header">
                                            <h5>Keywords</h5>
                                        </div>

                                        <div class="single-tabs-group-content">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Design, Java, Python, WordPress etc...">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="filt-buttons-updates">
                                <button type="button" class="btn btn-dark">Clear Filter</button>
                                <button type="button" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- End Modal -->



            <div class="col-xl-12 col-lg-12 col-md-12">
                <p class="mb-0 text-center">© 2015 - 2025 Job Stock® Themezhub.</p>
            </div>

            <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


        </div>


        <!-- footer -->


    </div>
    <!-- ======================= dashboard Detail End ======================== -->

</div>

@endsection