@extends('layouts.app')
@section('content')
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
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


    <!-- ============================ Hero Banner  Start================================== -->
    <div class="image-cover hero-header primary-bg-dark" data-overlay="0">
        <div class="position-absolute top-0 end-0 z-0">
            <img src="assets/img/shape-3-soft-light.svg" alt="SVG" width="500">
        </div>
        <div class="position-absolute top-0 start-0 me-10 z-0">
            <img src="assets/img/shape-1-soft-light.svg" alt="SVG" width="250">
        </div>
        <div
            class="container d-flex flex-column justify-content-center position-relative zindex-2 pt-sm-3 pt-md-4 pt-xl-5">

            <div class="row justify-content-between align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <h6 class="primary-2-cl fw-medium d-inline-flex align-items-center mb-3"><span
                            class="primary-2-bg w-10 h-05 me-2"></span>Get Hot & Trending Jobs</h6>
                    <h1 class="mb-4">Find & Hire<br><span>Top Experts on Job Veens</span></h1>
                    <p class="fs-5">Getting a new job is never easy. Check what new jobs we have in store for you on
                        Job Veens.</p>
                    <div class="lios-vrst">
                        <ul>
                            <li>
                                <div class="lios-parts">
                                    <h2><span class="ctr">{{ number_format($activeJobsCount) }}</span></h2>
                                    <h6>Active Jobs</h6>
                                </div>
                            </li>

                            <li>
                                <div class="lios-parts">
                                    <h2><span class="ctr">{{ number_format($totalEmployers) }}</span></h2>
                                    <h6>Registered Companies</h6>
                                </div>
                            </li>

                            <li>
                                <div class="lios-parts">
                                    <h2><span class="ctr">{{ number_format($totalCandidates) }}</span><span
                                            class="primary-2-cl">K</span></h2>
                                    <h6>Registered Users</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">

                    <form method="GET" action="{{ route('search-jobs') }}">
                        <div class="hero-search-wrap">
                            <div class="hero-search">
                                <h1>Grow Your Career with <span class="text-primary">Job Veens</span></h1>
                            </div>
                            <div class="hero-search-content verticle-space">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <input type="text" name="keyword" class="form-control border"
                                                    placeholder="Search Job Keywords..">
                                                <img src="{{ asset('assets/img/pin.svg') }}" width="18" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">Job Category</label>
                                            <div style="position: relative;">
                                                <input type="text" class="form-control" placeholder="Select Category"
                                                    readonly id="categoryInput" onclick="toggleCategoryDropdown()" />
                                                <div id="categoryDropdown"
                                                    style="display: none; position: absolute; top: 100%; left: 0; right: 0; max-height: 200px; overflow-y: auto; border: 1px solid #ddd; background: white; z-index: 1000;">
                                                    @foreach($categories as $category)
                                                    <div onclick="selectCategory('{{ $category->id }}', '{{ $category->title }}')"
                                                        style="padding: 8px; cursor: pointer; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $category->title }}
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <input type="hidden" name="category" id="selectedCategoryId" />
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Job Type</label>
                                            <select name="type" class="form-control">
                                                <option value="">All Type</option>
                                                <option value="Full-time">Full Time</option>
                                                <option value="Part-time">Part Time</option>
                                                <option value="Contract">Contract</option>
                                                <option value="Internship">Internship</option>
                                                <option value="Temporary">Temporary</option>
                                                <option value="Volunteer">Volunteer</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select name="country" class="form-control">
                                                <option value="">Any Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country }}"
                                                    {{ request('country') == $country ? 'selected' : '' }}>
                                                    {{ ucfirst($country) }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Experience</label>
                                            <select name="experience" class="form-control">
                                                <option value="">Any</option>
                                                <option value="1">1 Year</option>
                                                <option value="2">2 Years</option>
                                                <option value="5">5+ Years</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Salary Type</label>
                                            <select name="salary_type" class="form-control">
                                                <option value="">Select Salary Type</option>
                                                <option value="WEEKLY">Weekly</option>
                                                <option value="MONTHLY">Monthly</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Salary Range</label>
                                            <select name="salary">
                                                <option value="">Select Salary Range</option>
                                                <option value="0-500">₦10,000 - ₦50,000</option>
                                                <option value="501-1000">₦51,000 - ₦200,000</option>
                                                <option value="1001-2000">₦201,000 - ₦1,000,000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary full-width">Search Result</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>


            </div>

        </div>

        <div class="position-absolute bottom-0 start-0 z-0">
            <img src="assets/img/shape-2-soft-light.svg" alt="SVG" width="400">
        </div>
    </div>

    <!-- For category scrolling -->
    <script>
        function toggleCategoryDropdown() {
            const dropdown = document.getElementById('categoryDropdown');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }

        function selectCategory(id, name) {
            document.getElementById('selectedCategoryId').value = id;
            document.getElementById('categoryInput').value = name;
            document.getElementById('categoryDropdown').style.display = 'none';
        }

        // Close dropdown if clicked outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('categoryDropdown');
            const input = document.getElementById('categoryInput');
            if (!dropdown.contains(e.target) && !input.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>

    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Our Partners Start ================================== -->
    <section class="min">
        <div class="container">

            <div class="row justify-content-center mb-2">
                <div class="col-xl-4 col-lg-7 col-md-10 text-center">
                    <div class="center mb-4">
                        <h5 class="fw-medium lh-lg">Join over 2,000 companies around the world that trust the <span
                                class="text-primary">Job Veens</span> platforms</h5>
                    </div>
                </div>
            </div>

            <div
                class="row align-items-center justify-content-center row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-3 gx-3 gy-3">
                <div class="col">
                    <figure class="single-brand thumb-figure">
                        <img src="assets/img/brand/layar-primary.svg" class="img-fluid" alt="">
                    </figure>
                </div>

                <div class="col">
                    <figure class="single-brand thumb-figure">
                        <img src="assets/img/brand/mailchimp-primary.svg" class="img-fluid" alt="">
                    </figure>
                </div>

                <div class="col">
                    <figure class="single-brand thumb-figure">
                        <img src="assets/img/brand/fitbit-primary.svg" class="img-fluid" alt="">
                    </figure>
                </div>

                <div class="col">
                    <figure class="single-brand thumb-figure">
                        <img src="assets/img/brand/capsule-primary.svg" class="img-fluid" alt="">
                    </figure>
                </div>

                <div class="col">
                    <figure class="single-brand thumb-figure">
                        <img src="assets/img/brand/vidados-primary.svg" class="img-fluid" alt="">
                    </figure>
                </div>

            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ============================ Our Partners End ================================== -->


    <!-- ============================ Featured Jobs Start ================================== -->
    <section class="pt-2">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>Featured Jobs</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-xl-3 gx-3 gy-4">

                <!-- Single Item -->
                @foreach($jobs as $job)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-instructor-layout border">
                        {{-- Tags --}}
                        <div class="left-tags-capt">
                            @if($job->is_featured)
                            <span class="featured-text">Featured</span>
                            @endif
                            @if($job->is_urgent)
                            <span class="urgent">Urgent</span>
                            @endif
                        </div>

                        {{-- Job Type --}}
                        <div class="brows-job-type">
                            <span class="enternship">{{ ucfirst($job->type) }}</span>
                        </div>

                        {{-- Company Logo --}}
                        <div class="job-instructor-thumb">
                            <a href="{{ route('job-detail', ['id' => $job->id]) }}">
                                <img src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : asset('assets/img/default-logo.png') }}"
                                    class="img-fluid" alt="{{ $job->company_name }}">
                            </a>
                        </div>

                        {{-- Job Info --}}
                        <div class="job-instructor-content">
                            <h4 class="instructor-title">
                                <a href="{{ route('job-detail', ['id' => $job->id]) }}">{{ $job->title }}</a>
                            </h4>
                            <div class="instructor-skills">
                                {{ $job->skills ?? 'Not specified' }}
                            </div>
                        </div>

                        {{-- Footer --}}
                        <div class="job-instructor-footer">
                            <div class="instructor-students">
                                <h5 class="instructor-scount">{{ $job->salary_min }} - {{ $job->salary_max }}</h5>
                            </div>
                            <!-- <div class="instructor-corses">
                                <span class="c-counting">{{ $job->vacancies ?? 'N/A' }} Open</span>
                            </div> -->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>





        </div>
    </section>
    <!-- ============================ Featured Jobs End ================================== -->


    <!-- ============================ Top Job Categories Start ================================== -->
    <section class="gray-simple">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>Explore Top Categories</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-4 gy-4">

                <!-- Single Item -->
                @foreach($categories as $category)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="category-box">
                        <div class="category-desc">
                            <div class="category-icon">
                                <i class="fa-solid fa-file-invoice text-primary"></i>
                                <i class="fa-solid fa-file-invoice abs-icon"></i>
                            </div>
                            <div class="category-detail category-desc-text">
                                <h4 class="fs-5">
                                    <a href="{{ route('all-jobs', ['category' => $category->id]) }}">
                                        {{ $category->title }}
                                    </a>
                                </h4>
                                <p class="block">{{ $category->active_jobs_count }} Active Jobs</p>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>

        </div>
    </section>
    <!-- ============================ Top Job Categories End ================================== -->


    <!-- ============================ Top Features & Process Start ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10">
                    <div class="sec-heading center">
                        <h2>Features & Process</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-xl-4 gx-lg-4">

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1">
                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i class="fa-solid fa-file-shield text-primary"></i></span>
                        </div>
                        <div class="work-process-caption">
                            <h4>Search Job</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i class="fa-solid fa-paste text-primary"></i></span>
                        </div>
                        <div class="work-process-caption">
                            <h4>FIND JOB</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i class="fa-solid fa-unlock text-primary"></i></span>
                        </div>
                        <div class="work-process-caption">
                            <h4>Create Account</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process">
                        <div class="work-process-icon"><span><i class="fa-solid fa-user-clock text-primary"></i></span>
                        </div>
                        <div class="work-process-caption">
                            <h4>HIRE EMPLOYEE</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 order-xl-2 order-lg-3 order-md-3">
                    <div class="eslio-pincc m-auto">
                        <img src="assets/img/wp-iphone.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 order-xl-3 order-lg-2 order-md-2">
                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i class="fa-solid fa-laptop-file text-primary"></i></span>
                        </div>
                        <div class="work-process-caption">
                            <h4>START WORK</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i
                                    class="fa-solid fa-business-time text-primary"></i></span></div>
                        <div class="work-process-caption">
                            <h4>Submit Bid</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process mb-5">
                        <div class="work-process-icon"><span><i class="fa-solid fa-sack-dollar text-primary"></i></span>
                        </div>
                        <div class="work-process-caption">
                            <h4>PAY MONEY</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>

                    <div class="work-process">
                        <div class="work-process-icon"><span><i
                                    class="fa-regular fa-face-laugh-wink text-primary"></i></span></div>
                        <div class="work-process-caption">
                            <h4>HAPPY USER</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum
                                congue posuere lacus</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Top Features & Process End ================================== -->


    <!-- ============================ Video Help Start ================================== -->
    <section class="bg-cover" style="background:#17ac6a url(assets/img/video-bg.jpg)no-repeat;" data-overlay="4">
        <div class="ht-200"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12">

                    <div class="overlio-vedio-box">
                        <a href="#" class="play-video-btn text-primary"><i class="fa-solid fa-play"></i></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="ht-200"></div>
    </section>
    <!-- ============================ Video Help End ================================== -->

    <!-- ============================ Good Reviews By Customers ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>Good Reviews By Customers</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-4 gy-4">

                <!-- Single Review
        <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="jobstock-reviews-box">
                <div class="jobstock-reviews-desc">
                    <h6 class="review-title-yui">"The best useful website"</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                </div>
                <div class="jobstock-reviews-flex">
                    <div class="jobstock-reviews-thumb">
                        <div class="jobstock-reviews-figure"><img src="assets/img/team-1.jpg" class="img-fluid circle"
                                alt=""></div>
                    </div>
                    <div class="jobstock-reviews-caption">
                        <div class="jobstock-reviews-title">
                            <h4>Lucia E. Nugent</h4>
                        </div>
                        <div class="jobstock-reviews-designation"><span>CEO of Climber</span></div>
                        <div class="jobstock-reviews-rates">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star deactive"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Review -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="jobstock-reviews-box">
                        <div class="jobstock-reviews-desc">
                            <h6 class="review-title-yui">"Ranking is the #1"</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                        </div>
                        <div class="jobstock-reviews-flex">
                            <div class="jobstock-reviews-thumb">
                                <div class="jobstock-reviews-figure"><img src="assets/img/team-2.jpg"
                                        class="img-fluid circle" alt=""></div>
                            </div>
                            <div class="jobstock-reviews-caption">
                                <div class="jobstock-reviews-title">
                                    <h4>Brenda R. Smith</h4>
                                </div>
                                <div class="jobstock-reviews-designation"><span>Founder of Yeloower</span></div>
                                <div class="jobstock-reviews-rates">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Review -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="jobstock-reviews-box">
                        <div class="jobstock-reviews-desc">
                            <h6 class="review-title-yui">"The website is eco friendly"</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                        </div>
                        <div class="jobstock-reviews-flex">
                            <div class="jobstock-reviews-thumb">
                                <div class="jobstock-reviews-figure"><img src="assets/img/team-3.jpg"
                                        class="img-fluid circle" alt=""></div>
                            </div>
                            <div class="jobstock-reviews-caption">
                                <div class="jobstock-reviews-title">
                                    <h4>Brian B. Wilkerson</h4>
                                </div>
                                <div class="jobstock-reviews-designation"><span>CEO of Mark Soft</span></div>
                                <div class="jobstock-reviews-rates">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Review -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="jobstock-reviews-box">
                        <div class="jobstock-reviews-desc">
                            <h6 class="review-title-yui">"100% save and secure website"</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                        </div>
                        <div class="jobstock-reviews-flex">
                            <div class="jobstock-reviews-thumb">
                                <div class="jobstock-reviews-figure"><img src="assets/img/team-4.jpg"
                                        class="img-fluid circle" alt=""></div>
                            </div>
                            <div class="jobstock-reviews-caption">
                                <div class="jobstock-reviews-title">
                                    <h4>Miguel L. Benbow</h4>
                                </div>
                                <div class="jobstock-reviews-designation"><span>Founder of Mitche LTD</span></div>
                                <div class="jobstock-reviews-rates">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star deactive"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Review -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="jobstock-reviews-box">
                        <div class="jobstock-reviews-desc">
                            <h6 class="review-title-yui">"Very developer friendly website"</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                        </div>
                        <div class="jobstock-reviews-flex">
                            <div class="jobstock-reviews-thumb">
                                <div class="jobstock-reviews-figure"><img src="assets/img/team-5.jpg"
                                        class="img-fluid circle" alt=""></div>
                            </div>
                            <div class="jobstock-reviews-caption">
                                <div class="jobstock-reviews-title">
                                    <h4>Hilda A. Sheppard</h4>
                                </div>
                                <div class="jobstock-reviews-designation"><span>CEO of Doodle</span></div>
                                <div class="jobstock-reviews-rates">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Good Reviews By Customers ================================== -->


    <!-- ============================ Call To Action ================================== -->
    <section class="bg-cover call-action-container dark primary-bg-dark"
        style="background:url(assets/img/footer-bg-dark.png)no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">

                    <div class="call-action-wrap">
                        <div class="call-action-caption">
                            <h2 class="text-light">Are You Already Working With Us?</h2>
                            <p class="fs-6 text-light">At vero eos et accusamus et iusto odio dignissimos ducimus
                                qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                molestias</p>
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
    <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filtermodal" aria-hidden="true">
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
    </div>
    <!-- End Modal -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>





</div>

<!-- To keep modal open after a login error -->
@if ($errors->has('email') || $errors->has('password'))
<script>
    window.onload = () => {
        const loginModal = new bootstrap.Modal(document.getElementById('login'));
        loginModal.show();
    };
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

@endsection