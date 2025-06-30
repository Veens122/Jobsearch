@extends('layouts.app')
@section('content')

<div id="main-wrapper">


    <div class="clearfix"></div>


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
                                                            class="text-medium fw-medium">{{ $job->industry ?? 'N/A'}}</span>
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
                                                            class="text-medium fw-medium">{{ $job->experience }}
                                                            Years Experience</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="exloip-wraps my-2 mb-0">
                                                <div class="drixko-box d-flex align-items-center">
                                                    <div class="drixko-box-ico me-2">
                                                        <span
                                                            class="square--30 rounded-2 bg-light-primary text-primary"><i
                                                                class="fa-solid fa-sack-dollar"></i></span>
                                                    </div>
                                                    <div class="drixko-box-caps">
                                                        <span class="text-medium fw-medium">
                                                            @if ($job->salary_min && $job->salary_max)
                                                            ₦{{ $job->salary_min }} to ₦{{ $job->salary_max }}
                                                            @elseif ($job->salary_min)
                                                            {{ $job->salary_min }}
                                                            @elseif ($job->salary_max)
                                                            {{ $job->salary_max }}
                                                            @else
                                                            Not available
                                                            @endif
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="jbs-content-body px-4 py-4">
                                <h3 class="mb-3">Job Requirements</h3>

                                <div class="jbs-content mb-3">
                                    <h4>Job Description:</h4>
                                    <ul class="simple-list">
                                        <p>{!! nl2br(e($job->description)) !!}</p>
                                    </ul>
                                </div>

                                <div class="jbs-content mb-3">
                                    <h4>Qualifications:</h4>
                                    <ul class="simple-list">
                                        <p>{!! nl2br(e($job->education_level)) !!}</p>
                                    </ul>
                                </div>


                                <div class="jbs-content mb-4">
                                    <h4>Responsibilities:</h4>
                                    <p>{!! nl2br(e($job->responsibilities)) !!}</p>
                                </div>

                                <div class="jbs-content mb-4">
                                    <h6>Required Skills:</h6>
                                    <ul class="simple-list">
                                        <p>{!! nl2br(e($job->skills)) !!}</p>

                                    </ul>
                                </div>

                            </div>
                        </div>
                        <!-- 
                        <div class="blox-last-footer">
                            <div class="jbs-roots-action-btns">
                                <p class="m-0"><span class="text-muted me-1">{{ $job->application_count }}</span><span
                                        class="text-muted ms-1">{{ $job->time_posted }}</span></p>
                            </div>
                        </div> -->
                    </div>

                </div>

                <div class="col-lg-4 col-md-12">

                    {{-- Show session messages and validation errors for all users --}}
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

                    {{-- Show only for logged-in candidates --}}
                    @auth
                    @if(Auth::user()->role_id === 3)
                    <div class="detail-side-block bg-white mb-4">
                        <div class="detail-side-heads mb-2">
                            <h3>Ready To Apply?</h3>
                        </div>
                        <form action="{{ route('job.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="detail-side-middle">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"
                                        readonly>
                                    <label>Name:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control"
                                        value="{{ Auth::user()->email }}" readonly>
                                    <label>Email:</label>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Upload Resume (PDF, DOC, DOCX - Max 5MB)</label>
                                    <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Upload Cover Letter (Optional - PDF, DOC, DOCX - Max 5MB)</label>
                                    <input type="file" name="cover_letter" class="form-control"
                                        accept=".pdf,.doc,.docx">
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
                    {{-- Guest view --}}
                    <div class="detail-side-block bg-white mb-4">
                        <div class="detail-side-heads mb-2">
                            <h3>Ready To Apply?</h3>
                        </div>
                        <div class="detail-side-middle text-center">
                            <p class="mb-3">You need to be logged in as a candidate to apply for this job.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary mb-2 full-width">Login</a>
                            <a href="{{ route('candidate.sign-up') }}" class="btn btn-outline-primary full-width">Sign
                                Up</a>
                        </div>
                    </div>
                    @endauth

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