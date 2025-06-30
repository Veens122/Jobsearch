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
                <div class="col-lg-12 col-md-12 mt-5">

                    <form method="GET" action="{{ route('search-jobs') }}">
                        <div class="full-search-2">
                            <div class="hero-search-content search-shadow">
                                <div class="row classic-search-box m-0 gx-2">

                                    <!-- Keyword Search -->
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 ">
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
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 ">
                                        <div class="form-group briod ">
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
                                                <!-- <i class="fa-solid fa-briefcase text-primary"></i> -->
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
                                                <!-- <i class="fa-solid fa-location-crosshairs text-primary"></i> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Search & Filter Buttons -->
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                        <div class="fliox-search-wiop">
                                            <!-- <div class="form-group me-2">
                                                <a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#filter" class="btn btn-filter-search"><i
                                                        class="fa-solid fa-filter"></i>Filter</a>
                                            </div> -->
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
                    <!-- <div class="row justify-content-center mb-5 mt-8">
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
                    </div> -->
                    <!-- Shorting Wrap End -->

                    <!-- Start All List -->
                    <div class="row justify-content-start gx-3 gy-4">
                        @foreach ($jobs as $job)
                        <div class="col-xl-6 col-lg-12 col-md-12">
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
                                            <div class="jbs-job-employer-wrap">
                                                <span>{{ $job->company_name }}</span>
                                            </div>
                                            <div class="jbs-job-title-wrap">
                                                <h4>
                                                    <a href="{{ route('job-detail', ['id' => $job->id]) }}"
                                                        class="jbs-job-title">
                                                        {{ $job->title }}
                                                    </a>
                                                </h4>
                                            </div>
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
                                                {{ $job->experience }} Years
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Quick Apply Button -->
                                    <div class="jbs-list-head-last mt-3">
                                        <a href="{{ route('job-detail', ['id' => $job->id]) }}"
                                            class="btn btn-md btn-primary px-4 quick-apply-btn">
                                            Apply
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

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
                            <h2 class="lh-base mb-3 text-light">Find The Perfect Job<br>on Job Veens That is Superb
                                For You</h2>
                            <p class="fs-6 text-light">At vero eos et accusamus et iusto odio dignissimos ducimus
                                qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                molestias</p>
                        </div>
                        <div class="call-action-buttons mt-3">
                            <!-- <a href="JavaScript:Void(0);"
                                class="btn btn-lg btn-primary fw-medium px-xl-5 px-lg-4 me-2">Upload resume</a> -->
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
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif


                        <form method="POST" action="{{ route('login') }}">
                            @csrf



                            <div class="form-floating mb-4">
                                <input type="email" name="email" class="form-control" placeholder="name@example.com"
                                    required>
                                <label for="email">Email</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                                <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                                    style="cursor: pointer;" onclick="togglePassword()">
                                    👁️
                                </span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary full-width font--bold btn-lg">
                                    Log In
                                </button>
                            </div>

                            <div class="modal-flex-item mb-3">
                                <div class="modal-flex-first">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>
                                </div>
                                <div class="modal-flex-last">
                                    <a href="{{ route('forgotPassword') }}">Forgot Password?</a>
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
                    <p>Don't have an account yet?<a href="{{ route('sign-up') }}"
                            class="text-primary font--bold ms-1">Sign
                            Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Filter Modal -->
    <!-- <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filtermodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered filter-popup" role="document">
            <div class="modal-content" id="filtermodal">
                <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="fas fa-close"></i></span>
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
                                                <input id="s-1" class="form-check-input" name="s-1" type="checkbox">
                                                <label for="s-1" class="form-check-label">IT Computers</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-2" class="form-check-input" name="s-2" type="checkbox">
                                                <label for="s-2" class="form-check-label">Web Design</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-3" class="form-check-input" name="s-3" type="checkbox">
                                                <label for="s-3" class="form-check-label">Web development</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-4" class="form-check-input" name="s-4" type="checkbox">
                                                <label for="s-4" class="form-check-label">SEO Services</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-5" class="form-check-input" name="s-5" type="checkbox">
                                                <label for="s-5" class="form-check-label">Financial Service</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-6" class="form-check-input" name="s-6" type="checkbox">
                                                <label for="s-6" class="form-check-label">Art, Design, Media</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-7" class="form-check-input" name="s-7" type="checkbox">
                                                <label for="s-7" class="form-check-label">Coach & Education</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-8" class="form-check-input" name="s-8" type="checkbox">
                                                <label for="s-8" class="form-check-label">Apps Developements</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-9" class="form-check-input" name="s-9" type="checkbox">
                                                <label for="s-9" class="form-check-label">IOS Development</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-10" class="form-check-input" name="s-10" type="checkbox">
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


    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

@if ($errors->has('email') || $errors->has('password'))
<script>
window.onload = () => {
    const loginModal = new bootstrap.Modal(document.getElementById('login'));
    loginModal.show();
};
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>






@endsection