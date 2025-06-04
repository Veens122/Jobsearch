@extends('layouts.app')
@section('content')
<!-- <div class="container">
    <h1>Application Details</h1>

    <p><strong>Candidate Name:</strong> {{ $application->user->name ?? 'N/A' }}</p>
    <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>
    <p><strong>Job Title:</strong> {{ $application->job->title ?? 'N/A' }}</p>
    <p><strong>Resume:</strong> <a href="{{ asset('storage/' . $application->resume) }}" target="_blank">Download</a>
    </p>
</div> -->

<div id="main-wrapper">


    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ============================ Header Information Start================================== -->
    <section class="gray-simple">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="cndt-head-block">
                        <div class="cndt-head-left">
                            <div class="cndt-head-thumb">
                                <figure>
                                    <img src="{{ $candidateProfile && $candidateProfile->profile_picture ? asset('storage/' . $candidateProfile->profile_picture) : asset('assets/img/default-logo.png') }}"
                                        class="img-fluid"
                                        alt="{{ $candidateProfile ? $candidateProfile->full_name : ($candidate->full_name ?? 'Candidate') }}">
                                </figure>

                            </div>
                            <div class="cndt-head-caption">
                                <div class="cndt-head-caption-top">
                                    <div class="cndt-yior-1">
                                        <span class="label text-sm-muted text-success bg-light-success">Featured</span>
                                    </div>
                                    <div class="cndt-yior-2">
                                        <h4 class="cndt-title">
                                            {{ $candidateProfile ? $candidateProfile->full_name : ($candidate->full_name ?? 'Candidate') }}
                                        </h4>
                                    </div>
                                    <div class="cndt-yior-3">
                                        <span><i
                                                class="fa-solid fa-user-graduate me-1"></i>{{ $candidateProfile ? $candidateProfile->job_title : ($candidate->job_title ?? 'Candidate') }}
                                        </span>
                                        <span><i
                                                class="fa-solid fa-location-dot me-1"></i>{{ $candidateProfile ? $candidateProfile->full_name : ($candidate->full_name ?? 'Candidate') }}

                                            {{ $candidateProfile ? $candidateProfile->city : ($candidate->city ?? 'city') }},
                                            {{ $candidateProfile ? $candidateProfile->country : $candidateProfile ?? 'country' }}</span>
                                        <span><i
                                                class="fa-solid fa-sack-dollar me-1"></i>{{ $candidateProfile ? $candidateProfile->expected_salary : ($candidate->expected_salary ?? 'Candidate') }}
                                        </span>
                                        <span><i
                                                class="fa-solid fa-cake-candles me-1"></i>{{ $candidateProfile ? $candidateProfile->date_of_birth : ($candidate->date_of_birth ?? 'Candidate') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="cndt-head-caption-bottom">
                                    <div class="cndt-yior-skills">
                                        @if($candidateProfile && $candidateProfile->skills)
                                        @foreach(explode(',', $candidateProfile->skills) as $skill)
                                        <span class="skills-tag">{{ trim($skill) }}</span>
                                        @endforeach
                                        @else
                                        <span class="text-muted">No skills listed</span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($candidateProfile)
                        <div class="cndt-head-right">
                            @if($candidateProfile->resume)
                            <a href="{{ asset('storage/' . $candidateProfile->resume) }}" download
                                class="btn btn-primary">
                                Download CV<i class="fa-solid fa-download ms-2"></i>
                            </a>
                            @endif
                            <button type="button" class="btn btn-outline-primary ms-2">
                                <i class="fa-solid fa-bookmark"></i>
                            </button>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="cdtsr-groups-block">
                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>About Candidate</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                @if($candidateProfile && $candidateProfile->bio)
                                <p>{{ $candidateProfile->bio }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>All Information</h5>
                            </div>
                            @if($candidateProfile)
                            <div class="single-cdtsr-body">
                                <div class="row gy-4">
                                    @php
                                    $info = [
                                    ['icon' => 'fa-envelope-open-text', 'label' => 'Mail Address', 'value' =>
                                    $candidateProfile->email],
                                    ['icon' => 'fa-phone-volume', 'label' => 'Phone No.', 'value' =>
                                    $candidateProfile->phone],
                                    ['icon' => 'fa-user', 'label' => 'Gender', 'value' => $candidateProfile->gender],
                                    ['icon' => 'fa-cake-candles', 'label' => 'Age', 'value' =>
                                    $candidateProfile->date_of_birth],
                                    ['icon' => 'fa-briefcase', 'label' => 'Experience', 'value' =>
                                    $candidateProfile->experience . ' Years'],
                                    ['icon' => 'fa-user-graduate', 'label' => 'Qualification', 'value' =>
                                    $candidateProfile->qualification],
                                    ['icon' => 'fa-layer-group', 'label' => 'Work Type', 'value' =>
                                    $candidateProfile->work_type],
                                    ];
                                    @endphp

                                    @foreach($info as $item)
                                    @if(!empty($item['value']))
                                    <div class="col-md-6">
                                        <div class="cdtx-infr-box">
                                            <div class="cdtx-infr-icon"><i class="fa-solid {{ $item['icon'] }}"></i>
                                            </div>
                                            <div class="cdtx-infr-captions">
                                                <h5>{{ $item['value'] }}</h5>
                                                <p>{{ $item['label'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif

                        </div>

                        @if($candidateProfile && $candidateProfile->resume)
                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>Resume</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="single-resumes-blocks d-flex justify-content-between align-items-center">
                                    <div class="single-resumes-left d-flex align-items-center">
                                        <i class="fa-solid fa-file-word fs-3 text-primary me-3"></i>
                                        <div>
                                            <h5>{{ basename($candidateProfile->resume) }}</h5>
                                            <small class="text-muted">Uploaded on
                                                {{ \Carbon\Carbon::parse($candidateProfile->updated_at)->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="single-resumes-right">
                                        <a href="{{ asset('storage/' . $candidateProfile->resume) }}" download
                                            class="btn btn-md btn-light-success">
                                            Download <i class="fa-solid fa-circle-down ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                        @if($candidateProfile)
                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>Work Experience</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="single-experinc-block d-flex">
                                    <div class="single-experinc-rght">
                                        <div class="experinc-emp-title">
                                            <p>{!! nl2br(e($candidateProfile->work_history)) !!}</p>
                                            <span
                                                class="label text-success bg-light-success">{{ $candidateProfile->work_type }}</span>
                                        </div>
                                        <div class="experinc-post-title">
                                            <h6>{{ $candidateProfile->job_title }}</h6>
                                            <div class="experinc-infos-list">
                                                <span class="exp-start">{{ $candidateProfile->experience }} Years</span>
                                                <span
                                                    class="work-exp-date">{{ $candidateProfile->work_ending_date }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                        @if($candidateProfile)
                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>Education</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="single-educations-block d-flex">
                                    <div class="single-educations-rght">
                                        @if($candidateProfile->university_attended)
                                        <div class="educations-emp-title">
                                            <h5>{{ $candidateProfile->university_attended }}</h5>
                                        </div>
                                        @endif
                                        @if($candidateProfile->degree)
                                        <div class="educations-post-title">
                                            <h6>{{ $candidateProfile->degree }}</h6>
                                        </div>
                                        @endif
                                        @if($candidateProfile->year_graduated)
                                        <div class="educations-infos-list">
                                            <span>{{ $candidateProfile->year_graduated }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                        @if(!empty($candidateProfile->skills))
                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>Skills</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="cndts-all-skills-list">
                                    @foreach(explode(',', $candidateProfile->skills) as $skill)
                                    <span class="badge bg-primary text-white me-1">{{ trim($skill) }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif


                        @if($relatedCandidates->isNotEmpty())
                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>Related Candidates</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="row gx-3 gy-4">
                                    @foreach($relatedCandidates as $related)
                                    <div class="col-12">
                                        <div class="jbs-list-box border">
                                            <div
                                                class="jbs-list-head m-0 d-flex align-items-center justify-content-between">
                                                <div class="jbs-list-head-thunner d-flex align-items-center">
                                                    <div class="jbs-list-usrs-thumb">
                                                        <figure><img
                                                                src="{{ $related->profile_picture ? asset('storage/' . $related->profile_picture) : asset('assets/img/default-logo.png') }}"
                                                                class="img-fluid circle" alt=""></figure>
                                                    </div>
                                                    <div class="jbs-list-job-caption ms-3">
                                                        <h4><a href="{{ route('candidate.detail', $related->user_id) }}"
                                                                class="jbs-job-title">{{ $related->full_name }}</a></h4>
                                                        <div class="jbs-job-mrch-lists">
                                                            <span>{{ $related->job_title }}</span> |
                                                            <span><i
                                                                    class="fa-solid fa-location-dot me-1"></i>{{ $related->city }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="{{ route('candidate.detail', $related->user_id) }}"
                                                        class="btn btn-md btn-primary">View Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Contact Candidate -->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="sidefr-usr-block mb-4">
                        <div class="sidefr-usr-header">
                            {{ $candidateProfile ? $candidateProfile->full_name : ($candidate->full_name ?? 'Candidate') }}
                        </div>
                        <div class="sidefr-usr-body">
                            <form method="POST" action="{{ route('candidate.contact') }}">
                                @csrf
                                <input type="hidden" name="candidate_id"
                                    value="{{ $candidateProfile->user_id ?? $candidate->id ?? '' }}">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject"
                                        required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Your Message"
                                        required></textarea>
                                </div>
                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary fw-medium full-width">Send
                                        Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================ Full Candidate Details End ================================== -->





    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

@endsection