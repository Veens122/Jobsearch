@extends('layouts.app')
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
    <div class="page-title primary-bg-dark" style="background:url(assets/img/bg2.png) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">Categories List </h2>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ All List Wrap ================================== -->
    <!-- resources/views/superadmin/categories/create.blade.php -->

    <section>
        <div class="container">

            <div class="row mb-4">
                <div class="col-md-8">
                    <h4>Create New Job Category</h4>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
                </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">Create Category</button>
            </form>

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
                            <h2 class="lh-base mb-3 text-light">Find The Perfect Job<br>on Job Stock That is Superb For
                                You</h2>
                            <p class="fs-6 text-light">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                            </p>
                        </div>
                        <div class="call-action-buttons mt-3">
                            <a href="JavaScript:Void(0);"
                                class="btn btn-lg btn-primary fw-medium px-xl-5 px-lg-4 me-2">Upload resume</a>
                            <a href="JavaScript:Void(0);"
                                class="btn btn-lg btn-whites fw-medium px-xl-5 px-lg-4 text-primary">Join Our Team</a>
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
                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-google-plus"></i></a></li>
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

    <!-- End Modal -->


    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

@endsection