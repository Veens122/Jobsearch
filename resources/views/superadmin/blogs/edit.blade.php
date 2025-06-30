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
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif


                            <div class="row mb-4 align-items-center">
                                <div class="col-md-6">
                                    <h4 class="mb-0">Edit Blog Category</h4>
                                </div>
                                <div class="col-md-6">
                                    <!-- Create New Category Form -->

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <!-- Edit Blog Category Form -->
                                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Blog Title</label>
                                            <input name="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title', $blog->title) }}">
                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="mb-3">
                                            <label for="blog_category_id" class="form-label">Category</label>
                                            <select name="blog_category_id"
                                                class="form-control @error('blog_category_id') is-invalid @enderror">
                                                <option value="">Select a category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('blog_category_id', $blog->blog_category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('blog_category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <div class="mb-3">
                                            <label for="image" class="form-label">Blog Image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror">
                                            @if($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                                style="width: 100px; margin-top: 10px;">
                                            @endif
                                            @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="content" class="form-label">Blog Content</label>
                                            <textarea name="content" id="content" rows="5"
                                                class="form-control @error('content') is-invalid @enderror">{{ old('content', $blog->content) }}</textarea>
                                            @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('superadmin.blogs.index') }}" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left me-1"></i> Back
                                            </a>
                                            <button type="submit" class="btn btn-primary">Update
                                                Blog</button>
                                        </div>
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