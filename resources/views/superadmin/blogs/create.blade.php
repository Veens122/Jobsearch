@extends('layouts.superadmin_app')
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
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">Manage Category</h1>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <section>
                    <div class="container">
                        <div class="row">
                            <!-- Success Message -->
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            <!-- Error Message -->
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            <div class="row mb-4 align-items-center">
                                <div class="col-md-6">
                                    <h4 class="mb-0">Create New Blog</h4>
                                </div>
                                <div class="col-md-6">
                                    <!-- Create New Category Form -->

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <!-- Edit Blog Category Form -->
                                    <form action="{{ route('blogs.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Blog Title</label>
                                            <input type="text" name="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}" required>
                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="blog_category_id" class="form-label">Category</label>
                                            <select name="blog_category_id"
                                                class="form-select @error('blog_category_id') is-invalid @enderror"
                                                required>
                                                <option value="">-- Select Category --</option>
                                                @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ old('blog_category_id') == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->title }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('blog_category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea name="content" rows="6"
                                                class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                            @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Upload Image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i> Publish Blog
                                        </button>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </section>

            </div>

            <!-- Footer -->
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3 text-center">© 2024 - 2025 Job Veens® Ugochukwu.</div>
                </div>
            </div>
        </div>


        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script> -->



        @endsection