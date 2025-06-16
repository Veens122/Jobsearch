@extends('layouts.candidate_app')
@section('content')

<div id="main-wrapper">


    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ======================= dashboard Detail ======================== -->


    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="dashboard-content">
            <div class="dashboard-tlbar d-block mb-4">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <h1 class="mb-1 fs-3 fw-medium">Edit Candidate Profile</h1>
                    </div>

                </div>


            </div>



            <div class="dashboard-widg-bar d-block">

                <!-- Profile Image -->

                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Profile Picture</h4>
                    </div>
                    <div class="card-body">
                        @if(Auth::check() && Auth::user()->candidateProfile &&
                        Auth::user()->candidateProfile->profile_picture)
                        <img src="{{ asset('storage/' . Auth::user()->candidateProfile->profile_picture) }}"
                            class="img-fluid circle" alt="Candidate Profile Picture" id="profile-picture-preview">
                        @elseif(Auth::check())
                        <div class="img-fluid circle d-flex align-items-center justify-content-center bg-primary text-white fw-bold"
                            style="width: 90px; height: 90px; border-radius: 50%; font-size: 80px"
                            id="initials-preview">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        @endif


                        <input type="file" name="profile_picture" class="form-control mt-2">

                    </div>
                </div>









                <!-- Basic Info -->
                <div class="card">
                    <div class="card-header">
                        <h4>Basic Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Full name</strong></label>
                                <input type="text" name="full_name" value="{{ old('full_name', $candidate->name) }}"
                                    class="form-control">
                                @error('full_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>






                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>User name</strong></label>
                                <input type="text" name="username" value="{{ old('username', $candidate->username) }}"
                                    class="form-control">
                                @error('username')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>




                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Job title</strong></label>
                                <input type="text" name="job_title"
                                    value="{{ old('job_title', $candidate->candidateProfile->job_title) }}"
                                    class="form-control">
                                @error('job_title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Age</strong></label>
                                    <input type="text" name="age" autocomplete="off"
                                        value="{{ old('age', $candidate && $candidate->candidateProfile ? $candidate->candidateProfile->age : '') }}"
                                        class="form-control">
                                    @error('age')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div> -->


                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Experience</strong></label>
                                <input type="text" name="experience"
                                    value="{{ old('experience', $candidate->candidateProfile->experience ?? '') }}"
                                    class="form-control">
                                @error('experience')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>



                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Bio</strong></label>

                                <textarea name="bio" class="form-control @error('bio') is-invalid @enderror"
                                    rows="4">{{ old('bio', $candidate->candidateProfile && $candidate->candidateProfile->bio ? $candidate->candidateProfile->bio : '') }}</textarea>

                                @error('bio')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="card">
                    <div class="card-header">
                        <h4>Contact Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Email</strong></label>
                                <input type="email" name="email" value="{{ old('email', $candidate->email) }}"
                                    class="form-control">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Phone no.</strong></label>
                                <input type="text" name="phone"
                                    value="{{ old('phone', $candidate->candidateProfile->phone ?? '') }}"
                                    class="form-control">
                                @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>



                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Address</strong></label>
                                <input type="text" name="address"
                                    value="{{ old('address', $candidate &&$candidate->candidateProfile ? $candidate->candidateProfile->address : '') }}"
                                    class="form-control">
                                @error('address')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>



                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Country</strong></label>
                                <input type="text" name="country"
                                    value="{{ old('country', $candidate && $candidate->candidateProfile ? $candidate->candidateProfile->country : '') }}"
                                    class="form-control">
                                @error('country')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>State/City</strong></label>
                                <input type="text" name="city"
                                    value="{{ old('city', $candidate && $candidate->candidateProfile ? $candidate->candidateProfile->city : '') }}"
                                    class="form-control">
                                @error('city')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Zip Code</strong></label>
                                <input type="text" name="zipcode"
                                    value="{{ old('zipcode', $candidate && $candidate->candidateProfile ? $candidate->candidateProfile->zipcode : '') }}"
                                    class="form-control">
                                @error('zipcode')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>


                        </div>
                    </div>
                </div>

                <!-- Skills -->
                <div class="card">
                    <div class="card-header">
                        <h4>Skills (comma separated)</h4>
                    </div>
                    <div class="card-body">
                        <input type="text" name="skills"
                            value="{{ old('skills', $candidate && $candidate->candidateProfile ? $candidate->candidateProfile->skills : '') }}"
                            class="form-control">
                    </div>
                </div>



                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Education History</h4>
                        <button type="button" class="btn btn-sm btn-success" onclick="addEducation()">Add
                            Education</button>
                    </div>
                    <div class="card-body row" id="education-wrapper">
                        @php
                        if (old('education')) {
                        $educationHistory = collect(old('education'));
                        }
                        @endphp


                        @foreach ($educationHistory as $i => $edu)
                        <div class="education-item mb-3 border rounded p-3 col-12">
                            <div class="row">
                                <input type="hidden" name="education[{{ $i }}][id]"
                                    value="{{ $edu->id ?? $edu['id'] ?? '' }}">

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>School Attended</strong></label>
                                    <input type="text" name="education[{{ $i }}][institution]" class="form-control"
                                        value="{{ old("education.$i.institution", $edu->institution ?? $edu['institution'] ?? '') }}">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Year</strong></label>
                                    <input type="text" name="education[{{ $i }}][year]" class="form-control"
                                        value="{{ old("education.$i.year", $edu->year ?? $edu['year'] ?? '') }}">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Result Acquired</strong></label>
                                    <input type="text" name="education[{{ $i }}][result_acquired]" class="form-control"
                                        value="{{ old("education.$i.result_acquired", $edu->result_acquired ?? $edu['result_acquired'] ?? '') }}">
                                </div>

                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="removeEducation(this)">Remove</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                {{-- Template for new education input --}}
                <template id="education-template">
                    <div class="education-item mb-3 border rounded p-3 col-12">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>School Attended</strong></label>
                                <input type="text" name="education[__INDEX__][institution]" class="form-control">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Year Graduated</strong></label>
                                <input type="text" name="education[__INDEX__][year]" class="form-control">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Certificate </strong></label>
                                <input type="text" name="education[__INDEX__][result_acquired]" class="form-control">
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="removeEducation(this)">Remove</button>
                            </div>
                        </div>
                    </div>
                </template>


                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Job History</h4>
                        <button type="button" class="btn btn-sm btn-success" onclick="addJobHistory()">Add
                            Job</button>
                    </div>

                    <div class="card-body row" id="job-history-container">
                        @php
                        $jobHistory = old('job_history') ?? $jobHistory ?? [];
                        @endphp

                        @foreach ($jobHistory as $index => $job)
                        <div class="job-history-item mb-3 border rounded p-3 col-12">
                            <div class="row">
                                <input type="hidden" name="job_history[{{ $loop->index }}][id]"
                                    value="{{ $job['id'] ?? $job->id ?? '' }}">

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Job Title</strong></label>
                                    <input type="text" name="job_history[{{ $loop->index }}][job_title]"
                                        value="{{ old("job_history.{$loop->index}.job_title", $job['job_title'] ?? $job->job_title ?? '') }}"
                                        class="form-control">
                                    @error("job_history.{$loop->index}.job_title")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Work Starting Date</strong></label>
                                    <input type="date" name="job_history[{{ $loop->index }}][start_date]"
                                        class="form-control"
                                        value="{{ old("job_history.{$loop->index}.start_date", $job['start_date'] ?? $job->start_date ?? '') }}">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Work Ending Date</strong></label>
                                    <input type="date" name="job_history[{{ $loop->index }}][end_date]"
                                        class="form-control"
                                        value="{{ old("job_history.{$loop->index}.end_date", $job['end_date'] ?? $job->end_date ?? '') }}">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Company</strong></label>
                                    <input type="text" name="job_history[{{ $loop->index }}][company]"
                                        class="form-control"
                                        value="{{ old("job_history.{$loop->index}.company", $job['company'] ?? $job->company ?? '') }}">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label><strong>Company Address</strong></label>
                                    <input type="text" name="job_history[{{ $loop->index }}][company_address]"
                                        class="form-control"
                                        value="{{ old("job_history.{$loop->index}.company_address", $job['company_address'] ?? $job->company_address ?? '') }}">
                                </div>

                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="removeJobHistory(this)">Remove</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>



                {{-- Template for JavaScript to clone --}}
                <template id="job-history-template">
                    <div class="job-history-item mb-3 border rounded p-3 col-12">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Job Title</strong></label>
                                <input type="text" name="job_history[__INDEX__][job_title]" class="form-control">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Work Starting Date</strong></label>
                                <input type="date" name="job_history[__INDEX__][start_date]" class="form-control">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Work Ending Date</strong></label>
                                <input type="date" name="job_history[__INDEX__][end_date]" class="form-control">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Company</strong></label>
                                <input type="text" name="job_history[__INDEX__][company]" class="form-control">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label><strong>Company Address</strong></label>
                                <input type="text" name="job_history[__INDEX__][company_address]" class="form-control">
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="removeJobHistory(this)">Remove</button>
                            </div>
                        </div>
                    </div>
                </template>

















                <div class="col-xl-6 col-lg-6 col-md-6 text-end">
                    <button type="submit" class="btn btn-sm btn-success">Update Profile</button>
                    <a href="{{ route('profile.candidate-profile') }}" class="btn btn-sm btn-danger">Cancel</a>

                </div>

            </div>





            <!-- Footer -->
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3 text-center">© 2015 - 2025 Job Stock® Themezhub.</div>
                </div>
            </div>
        </div>
    </form>

</div>
<!-- ======================= dashboard Detail End ======================== -->

<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


<!-- To preview profile picture -->

<script>
    function previewProfilePicture(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-picture-preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>




</div>



@endsection