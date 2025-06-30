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




        <div id="main-wrapper">
            <div class="dashboard-wrap bg-light">
                <div class="dashboard-content">
                    <div class="dashboard-tlbar d-block mb-4">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <h1 class="mb-1 fs-3 fw-medium">Edit Employer Profile</h1>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('employer.employer-profile.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif




                        <!-- Profile Picture -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Profile Picture</h4>
                            </div>
                            <div class="card-body">
                                @if ($employer->profile_picture)
                                <img src="{{ $employer->employerProfile && $employer->employerProfile->logo 
                ? asset('storage/' . $employer->employerProfile->logo) 
                : asset('assets/img/l-12.png') }}" class="img-fluid circle" alt="Company Logo">

                                @endif
                                <input type="file" name="logo" class="form-control mt-2">

                            </div>
                        </div>

                        <!-- Basic Detail -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Basic Detail</h4>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-6 mb-3">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name"
                                        value="{{ old('company_name', $employer->employerProfile->company_name) }}"
                                        class="form-control">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Industry</label>
                                    <input type="text" name="industry"
                                        value="{{ old('industry', $employer->employerProfile->industry) }}"
                                        class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Website</label>
                                    <input type="text" name="website"
                                        value="{{ old('website', $employer->employerProfile->website) }}"
                                        class="form-control">

                                </div>
                                <div class="col-12 mb-3">
                                    <label>Company decription</label>
                                    <textarea name="bio"
                                        class="form-control">{{ old('company_description', $employer->employerProfile->company_description) }}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Specialties (comma separated)</label>
                                    <input type="text" name="specialties"
                                        value="{{ old('specialities', $employer->employerProfile->specialities) }}"
                                        class="form-control">
                                </div>
                                <!-- <div class="col-12 mb-3">
                                    <label>Company Size</label>
                                    <input type="text" name="company_size"
                                        value="{{ $employer->profile->company_size ?? '' }}" class="form-control">
                                </div> -->
                            </div>
                        </div>

                        <!-- Contact Detail -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Contact Detail</h4>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email', $employer->email) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="phone"
                                        value="{{ old('phone', $employer->employerProfile->phone) }}">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Address</label>
                                    <input type="text" name="address"
                                        value="{{ old('address', $employer->employerProfile->address) }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Country</label>
                                    <input type="text" name="country"
                                        value="{{ old('country', $employer->employerProfile->country) }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>State/City</label>
                                    <input type="text" name="city"
                                        value="{{ old('city', $employer->employerProfile->city) }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Zip Code</label>
                                    <input type="text" name="zipcode"
                                        value="{{ old('zipcode', $employer->employerProfile->zipcode) }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update Profile</button>

                            <button class="btn btn-danger"> <a href="{{ route('employer-profile')}}">Cancel</a>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- ======================= dashboard Detail End ======================== -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

@endsection