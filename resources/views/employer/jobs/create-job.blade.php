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
            <div class="dashboard-tlbar d-block mb-4">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="mb-1 fs-3 fw-medium">Post Jobs</h1>

                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">

                <!-- Card Row -->
                <div class="card">
                    <div class="card-header">
                        <h4>Basic Detail</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employer.jobs.store') }}" enctype="multipart/form-data">
                            @csrf

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="row">
                                {{-- Company Logo --}}
                                <div class="col-12 mb-3">
                                    <label>Company Logo</label>
                                    <div class="upload-btn-wrapper small">
                                        <button class="btn" type="button">Upload Logo</button>
                                        <input type="file" name="company_logo" accept="image/*">
                                    </div>
                                    @error('company_logo')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Company Name --}}
                                <div class="col-12 mb-3">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" id="company_name" class="form-control"
                                        placeholder="Enter company name" value="{{ old('company_name') }}" required>
                                    @error('company_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Job Title --}}
                                <div class="col-12 mb-3">
                                    <label for="title">Job Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Enter job title" value="{{ old('title') }}" required>
                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Job Description --}}
                                <div class="col-12 mb-3">
                                    <label for="description">Job Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="4"
                                        placeholder="Enter job description" required>{{ old('description') }}</textarea>
                                    @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Job Category --}}
                                <div class="col-md-6 mb-3">
                                    <label for="category_id">Job Category</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Job Type --}}
                                <div class="col-md-6 mb-3">
                                    <label for="type">Job Type</label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="">Select Job Type</option>
                                        @foreach (['full-time', 'part-time', 'contract', 'internship', 'temporary',
                                        'volunteer'] as $type)
                                        <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>
                                            {{ ucfirst(str_replace('-', ' ', $type)) }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Experience --}}
                                <div class="col-md-6 mb-3">
                                    <label for="experience">Experience</label>
                                    <input type="text" name="experience" id="experience" class="form-control"
                                        placeholder="e.g. 2+ years in software development"
                                        value="{{ old('experience') }}">
                                    @error('experience')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Age Limit --}}
                                <div class="col-md-6 mb-3">
                                    <label for="age_limit">Age Limit</label>
                                    <input type="text" name="age_limit" id="age_limit" class="form-control"
                                        placeholder="e.g. 25-35 years" value="{{ old('age_limit') }}">
                                    @error('age_limit')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                {{-- Education Level --}}
                                <div class="col-md-6 mb-3">
                                    <label for="education_level">Qualification</label>
                                    <select name="education_level" id="education_level" class="form-control" required>
                                        <option value="">Select Qualification</option>
                                        @foreach (['high_school' => 'High School', 'bachelor' => 'Bachelor Degree',
                                        'master' => 'Master Degree', 'postgraduate' => 'Post Graduate', 'other' =>
                                        'Other'] as $key => $label)
                                        <option value="{{ $key }}"
                                            {{ old('education_level') == $key ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('education_level')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Skills --}}
                                <div class="col-12 mb-3">
                                    <label for="skills">Skills (use commas to separate)</label>
                                    <input type="text" name="skills" id="skills" class="form-control"
                                        placeholder="e.g. PHP, JavaScript, Laravel" value="{{ old('skills') }}">
                                    @error('skills')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Country --}}
                                <div class="col-md-6 mb-3">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" class="form-control"
                                        placeholder="Enter country" value="{{ old('country') }}" required>
                                    @error('country')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- City --}}
                                <div class="col-md-6 mb-3">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        placeholder="Enter city" value="{{ old('city') }}" required>
                                    @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Start Date --}}
                                <div class="col-md-6 mb-3">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control"
                                        value="{{ old('start_date') }}">
                                    @error('start_date')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- End Date --}}
                                <div class="col-md-6 mb-3">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control"
                                        value="{{ old('end_date') }}">
                                    @error('end_date')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Expiry Date --}}
                                <div class="col-md-6 mb-3">
                                    <label for="expiry_date">Expiry Date</label>
                                    <input type="date" name="expiry_date" id="expiry_date" class="form-control"
                                        value="{{ old('expiry_date') }}">
                                    @error('expiry_date')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6 mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open
                                        </option>
                                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed
                                        </option>
                                    </select>
                                    @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Salary Min --}}
                                <div class="col-md-3 mb-3">
                                    <label for="salary_min">Salary Min</label>
                                    <input type="number" name="salary_min" id="salary_min" class="form-control"
                                        placeholder="Minimum Salary" value="{{ old('salary_min') }}">
                                    @error('salary_min')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Salary Max --}}
                                <div class="col-md-3 mb-3">
                                    <label for="salary_max">Salary Max</label>
                                    <input type="number" name="salary_max" id="salary_max" class="form-control"
                                        placeholder="Maximum Salary" value="{{ old('salary_max') }}">
                                    @error('salary_max')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Salary Type --}}
                                <div class="col-md-6 mb-3">
                                    <label for="salary_type">Salary Type</label>
                                    <select name="salary_type" id="salary_type" class="form-control">
                                        <option value="">Select Salary Type</option>
                                        <option value="weekly" {{ old('salary_type') == 'weekly' ? 'selected' : '' }}>
                                            Weekly</option>
                                        <option value="monthly" {{ old('salary_type') == 'monthly' ? 'selected' : '' }}>
                                            Monthly</option>
                                    </select>
                                    @error('salary_type')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Responsibilities --}}
                                <div class="col-12 mb-3">
                                    <label for="responsibilities">Responsibilities <small class="text-muted">(enter each
                                            responsibility on a new line)</small></label>
                                    <textarea name="responsibilities" id="responsibilities" class="form-control"
                                        rows="5"
                                        placeholder="Enter each responsibility on a new line">{{ old('responsibilities') }}</textarea>
                                    @error('responsibilities')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Other Qualifications --}}
                                <div class="col-12 mb-3">
                                    <label for="other_qualifications">Other Qualifications</label>
                                    <textarea name="other_qualifications" id="other_qualifications" class="form-control"
                                        rows="3"
                                        placeholder="List any other relevant qualifications or criteria">{{ old('other_qualifications') }}</textarea>
                                    @error('other_qualifications')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Submit --}}
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Create Job</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



            </div>


            <!-- footer -->
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3 text-center">© 2015 - 2025 Job Stock® Themezhub.</div>
                </div>
            </div>

        </div>

    </div>
    <!-- ======================= dashboard Detail End ======================== -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

@endsection