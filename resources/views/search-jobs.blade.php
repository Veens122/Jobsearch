@extends('layouts.app')
@section('content')



<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->


    <!-- ============================ Page Title Start================================== -->
    <div class="page-title primary-bg-dark" style="background:url(assets/img/bg2.png) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <form method="GET" action="{{ route('search-jobs') }}">
                        <div class="full-search-2">
                            <div class="hero-search-content search-shadow">
                                <div class="row classic-search-box m-0 gx-2">

                                    <!-- Keyword Search -->
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                        <div class="form-group briod">
                                            <div class="input-with-icon">
                                                <input type="text" name="keyword" class="form-control"
                                                    placeholder="Skills, Designations, Keyword"
                                                    value="{{ request('keyword') }}">
                                                <i class="fa-solid fa-magnifying-glass text-primary"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Category Dropdown -->
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                        <div class="form-group briod">
                                            <div class="input-with-icon">
                                                <select class="form-control" name="category_id">
                                                    <option value="">All Categories</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <i class="fa-solid fa-briefcase text-primary"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- City Dropdown -->
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <select class="form-control" name="city">
                                                    <option value="">All Cities</option>
                                                    @foreach ($cities as $city)
                                                    <option value="{{ $city }}"
                                                        {{ request('city') == $city ? 'selected' : '' }}>
                                                        {{ $city }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <i class="fa-solid fa-location-crosshairs text-primary"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Search & Filter Buttons -->
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                        <div class="fliox-search-wiop">
                                            <div class="form-group me-2">
                                                <a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#filter" class="btn btn-filter-search"><i
                                                        class="fa-solid fa-filter"></i>Filter</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary full-width">Search</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ All List Wrap ================================== -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Shorting Box -->
                    <div class="row justify-content-center mb-5">
                        <div class="col-lg-12 col-md-12">
                            <div class="item-shorting-box">
                                <div class="item-shorting clearfix">
                                    <div class="left-column">
                                        <h4 class="m-sm-0 mb-2">Showing {{ $jobs->count() }} of {{ $jobs->total() }}
                                            Results</h4>
                                    </div>
                                </div>
                                <div class="item-shorting-box-right">
                                    <div class="shorting-by me-2 small">
                                        <select>
                                            <option value="0">Sort by (Default)</option>
                                            <option value="1">Sort by (Featured)</option>
                                            <option value="2">Sort by (Urgent)</option>
                                            <option value="3">Sort by (Post Date)</option>
                                        </select>
                                    </div>
                                    <div class="shorting-by small">
                                        <select>
                                            <option value="10">10 Per Page</option>
                                            <option value="20">20 Per Page</option>
                                            <option value="50">50 Per Page</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shorting Wrap End -->

                    <!-- Start All List -->
                    <div class="row justify-content-start gx-3 gy-4">
                        @foreach ($jobs as $job)
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="jbs-list-box border">
                                <div class="jbs-list-head">
                                    <div class="jbs-list-head-thunner">
                                        <div class="jbs-list-emp-thumb jbs-verified">
                                            <a href="#">
                                                <figure>
                                                    <img src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : asset('assets/img/default-logo.png') }}"
                                                        class="img-fluid" alt="{{ $job->company_name }}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="jbs-list-job-caption">
                                            <div class="jbs-job-employer-wrap">
                                                <span>{{ $job->company_name }}</span>
                                            </div>
                                            <div class="jbs-job-title-wrap">
                                                <h4><a href="#" class="jbs-job-title">{{ $job->title }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jbs-list-head-last">
                                        <a href="JavaScript:Void(0);" class="btn btn-md btn-primary px-4">Quick
                                            Apply</a>
                                    </div>
                                </div>
                                <div class="jbs-list-caption">
                                    <div class="jbs-info-ico-style">
                                        <div class="jbs-single-y1 style-1">
                                            <span><i class="fa-solid fa-location-dot"></i></span>
                                            {{ $job->city }}, {{ $job->country }}
                                        </div>
                                        <div class="jbs-single-y1 style-2">
                                            <span><i class="fa-solid fa-clock"></i></span>
                                            {{ ucfirst($job->type) }}
                                        </div>
                                        <div class="jbs-single-y1 style-3">
                                            <span><i class="fa-solid fa-briefcase"></i></span>
                                            {{ $job->experience_level }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- End All Job List -->

                    <!-- Pagination -->
                    <div class="row mt-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            {{ $jobs->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ============================ All List Wrap ================================== -->

    <!-- ============================ Call To Action ================================== -->
    <section class="bg-cover primary-bg-dark" style="background:url(assets/img/footer-bg-dark.png)no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">

                    <div class="call-action-wrap">
                        <div class="sec-heading center">
                            <h2 class="lh-base mb-3 text-light">Find The Perfect Job<br>on Job Stock That is Superb
                                For You</h2>
                            <p class="fs-6 text-light">At vero eos et accusamus et iusto odio dignissimos ducimus
                                qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                molestias</p>
                        </div>
                        <div class="call-action-buttons mt-3">
                            <a href="JavaScript:Void(0);"
                                class="btn btn-lg btn-primary fw-medium px-xl-5 px-lg-4 me-2">Upload resume</a>
                            <a href="JavaScript:Void(0);"
                                class="btn btn-lg btn-whites fw-medium px-xl-5 px-lg-4 text-primary">Join Our
                                Team</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Call To Action End ================================== -->

    <!-- ============================ Footer Start ================================== -->
    <footer class="footer skin-light-footer">

        <!-- Footer Top Start -->
        <div class="footer-top">
            <div class="container">
                <div class="row align-items-center justify-content-between">

                    <div class="col-xl-5 col-lg-5 col-md-5">
                        <div class="call-action-form rounded m-0">
                            <form class="ms-0">
                                <div class="newsltr-form gray-style">
                                    <input type="text" class="form-control" placeholder="Enter Your email">
                                    <button type="button" class="btn btn-subscribe">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-7 col-lg-7 col-md-7">
                        <div class="job-info-count-group lg-ctr">
                            <div class="single-jb-info-count">
                                <div class="jbs-y7">
                                    <h5 class="ctr">12</h5><span class="text-primary">K</span>
                                </div>
                                <div class="jbs-y5">
                                    <p>Job Posted</p>
                                </div>
                            </div>
                            <div class="single-jb-info-count">
                                <div class="jbs-y7">
                                    <h5 class="ctr">10</h5><span class="text-primary">M</span>
                                </div>
                                <div class="jbs-y5">
                                    <p>Happy Customers</p>
                                </div>
                            </div>
                            <div class="single-jb-info-count">
                                <div class="jbs-y7">
                                    <h5 class="ctr">76</h5><span class="text-primary">K</span>
                                </div>
                                <div class="jbs-y5">
                                    <p>Freelancers</p>
                                </div>
                            </div>
                            <div class="single-jb-info-count">
                                <div class="jbs-y7">
                                    <h5 class="ctr">200</h5><span class="text-primary">+</span>
                                </div>
                                <div class="jbs-y5">
                                    <p>Companies</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer Top End -->

        <div>
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-4">
                        <div class="footer-widget">
                            <img src="assets/img/logo.png" class="img-footer" alt="">
                            <div class="footer-add">
                                <p>Collins Street West, Victoria Near Bank Road<br>Australia QHR12456.</p>
                            </div>
                            <div class="foot-socials">
                                <ul>
                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-facebook"></i></a></li>
                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-linkedin"></i></a></li>
                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-google-plus"></i></a>
                                    </li>
                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="footer-widget">
                            <h4 class="widget-title text-primary">For Clients</h4>
                            <ul class="footer-menu">
                                <li><a href="JavaScript:Void(0);">Talent Marketplace</a></li>
                                <li><a href="JavaScript:Void(0);">Payroll Services</a></li>
                                <li><a href="JavaScript:Void(0);">Direct Contracts</a></li>
                                <li><a href="JavaScript:Void(0);">Hire Worldwide</a></li>
                                <li><a href="JavaScript:Void(0);">Hire in the USA</a></li>
                                <li><a href="JavaScript:Void(0);">How to Hire</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4">
                        <div class="footer-widget">
                            <h4 class="widget-title text-primary">Our Resources</h4>
                            <ul class="footer-menu">
                                <li><a href="JavaScript:Void(0);">Free Business tools</a></li>
                                <li><a href="JavaScript:Void(0);">Affiliate Program</a></li>
                                <li><a href="JavaScript:Void(0);">Success Stories</a></li>
                                <li><a href="JavaScript:Void(0);">Upwork Reviews</a></li>
                                <li><a href="JavaScript:Void(0);">Resources</a></li>
                                <li><a href="JavaScript:Void(0);">Help & Support</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="footer-widget">
                            <h4 class="widget-title text-primary">The Company</h4>
                            <ul class="footer-menu">
                                <li><a href="JavaScript:Void(0);">About Us</a></li>
                                <li><a href="JavaScript:Void(0);">Leadership</a></li>
                                <li><a href="JavaScript:Void(0);">Contact Us</a></li>
                                <li><a href="JavaScript:Void(0);">Investor Relations</a></li>
                                <li><a href="JavaScript:Void(0);">Trust, Safety & Security</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h4 class="widget-title text-primary">Download Apps</h4>
                            <div class="app-wrap">
                                <p><a href="JavaScript:Void(0);"><img src="assets/img/light-play.png" class="img-fluid"
                                            alt=""></a></p>
                                <p><a href="JavaScript:Void(0);"><img src="assets/img/light-ios.png" class="img-fluid"
                                            alt=""></a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center justify-content-center">

                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <p class="mb-0 text-center">© 2015 - 2025 Job Stock® Themezhub.</p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- ============================ Footer End ================================== -->

    <!-- Log In Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="loginmodal">
                <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="fas fa-close"></i></span>
                <div class="modal-header">
                    <div class="mdl-thumb"><img src="assets/img/ico.png" class="img-fluid" width="70" alt=""></div>
                    <div class="mdl-title">
                        <h4 class="modal-header-title">Hello, Again</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="modal-login-form">
                        <form>

                            <div class="form-floating mb-4">
                                <input type="email" class="form-control" placeholder="name@example.com">
                                <label>User Name</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" placeholder="Password">
                                <label>Password</label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary full-width font--bold btn-lg">Log
                                    In</button>
                            </div>

                            <div class="modal-flex-item mb-3">
                                <div class="modal-flex-first">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="savepassword"
                                            value="option1">
                                        <label class="form-check-label" for="savepassword">Save Password</label>
                                    </div>
                                </div>
                                <div class="modal-flex-last">
                                    <a href="JavaScript:Void(0);">Forget Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="social-login">
                        <ul>
                            <li><a href="JavaScript:Void(0);" class="btn connect-fb"><i
                                        class="fa-brands fa-facebook"></i>Facebook</a></li>
                            <li><a href="JavaScript:Void(0);" class="btn connect-google"><i
                                        class="fa-brands fa-google"></i>Google+</a></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <p>Don't have an account yet?<a href="signup.html" class="text-primary font--bold ms-1">Sign
                            Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Filter Modal -->
    <form id="jobFilterForm" method="GET" action="{{ route('jobs.filter') }}">
        <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filtermodal"
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

                                <!-- Place Of Work -->
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Place Of Work</h5>
                                    </div>
                                    <div class="single-tabs-group-content">
                                        <div class="d-flex flex-wrap">
                                            <div class="sing-btn-groups">
                                                <input type="checkbox" class="btn-check" id="anywhere"
                                                    name="work_place[]" value="Anywhere">
                                                <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                    for="anywhere">Anywhere</label>
                                            </div>
                                            <div class="sing-btn-groups">
                                                <input type="checkbox" class="btn-check" id="onsite" name="work_place[]"
                                                    value="On Site">
                                                <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                    for="onsite">On Site</label>
                                            </div>
                                            <div class="sing-btn-groups">
                                                <input type="checkbox" class="btn-check" id="remote" name="work_place[]"
                                                    value="Remote">
                                                <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                    for="remote">Fully Remote</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Type Of Contract -->
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Type Of Contract</h5>
                                    </div>
                                    <div class="single-tabs-group-content">
                                        <div class="d-flex flex-wrap">
                                            <div class="sing-btn-groups">
                                                <input type="checkbox" class="btn-check" id="employee1"
                                                    name="contract_type[]" value="Employee">
                                                <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                    for="employee1">Employee</label>
                                            </div>
                                            <div class="sing-btn-groups">
                                                <input type="checkbox" class="btn-check" id="freelancer1"
                                                    name="contract_type[]" value="Freelancer">
                                                <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                    for="freelancer1">Freelancer</label>
                                            </div>
                                            <div class="sing-btn-groups">
                                                <input type="checkbox" class="btn-check" id="contractor1"
                                                    name="contract_type[]" value="Contractor">
                                                <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                    for="contractor1">Contractor</label>
                                            </div>
                                            <div class="sing-btn-groups">
                                                <input type="checkbox" class="btn-check" id="internship1"
                                                    name="contract_type[]" value="Internship">
                                                <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                    for="internship1">Internship</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Type Of Employment -->
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Type Of Employment</h5>
                                    </div>
                                    <div class="single-tabs-group-content">
                                        <div class="d-flex flex-wrap">
                                            <div class="sing-btn-groups">
                                                <input type="checkbox" class="btn-check" id="fulltime"
                                                    name="employment_type[]" value="Full Time">
                                                <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                    for="fulltime">Full Time</label>
                                            </div>
                                            <div class="sing-btn-groups">
                                                <input type="checkbox" class="btn-check" id="parttime"
                                                    name="employment_type[]" value="Part Time">
                                                <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                    for="parttime">Part Time</label>
                                            </div>
                                            <div class="sing-btn-groups">
                                                <input type="checkbox" class="btn-check" id="freelance2"
                                                    name="employment_type[]" value="Freelance">
                                                <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                    for="freelance2">Freelance</label>
                                            </div>
                                            <div class="sing-btn-groups">
                                                <input type="checkbox" class="btn-check" id="internship2"
                                                    name="employment_type[]" value="Internship">
                                                <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                    for="internship2">Internship</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Location</h5>
                                    </div>
                                    <div class="single-tabs-group-content">
                                        <div class="form-group">
                                            <input type="text" name="location" class="form-control"
                                                placeholder="Search by country, City or State">
                                        </div>
                                    </div>
                                </div>

                                <!-- Explore Top Categories -->
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Explore Top Categories</h5>
                                    </div>
                                    <div class="single-tabs-group-content">
                                        <ul class="row p-0 m-0">
                                            @foreach (['IT Computers', 'Web Design', 'Web Development', 'SEO Services',
                                            'Financial Service', 'Art, Design, Media', 'Coach & Education', 'Apps
                                            Developments', 'IOS Development', 'Android Development'] as $i => $category)
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="cat-{{ $i }}" class="form-check-input"
                                                        name="categories[]" type="checkbox" value="{{ $category }}">
                                                    <label for="cat-{{ $i }}"
                                                        class="form-check-label">{{ $category }}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <!-- Keywords -->
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Keywords</h5>
                                    </div>
                                    <div class="single-tabs-group-content">
                                        <div class="form-group">
                                            <input type="text" name="keywords" class="form-control"
                                                placeholder="Design, Java, Python, WordPress etc...">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="filt-buttons-updates">
                            <button type="reset" class="btn btn-dark">Clear Filter</button>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- End Modal -->


    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
@endsection