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
                    <h1 class="mb-1 fs-3 fw-medium">Blog Categories</h1>
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
                                    <h4 class="mb-0">All Blog Categories</h4>
                                </div>
                                <div class="col-md-6">
                                    <!-- Create New Category Form -->
                                    <form action="{{ route('blog-categories.store') }}" method="POST"
                                        class="d-inline-flex w-100">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Add a new category" required>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-plus me-1"></i> Add Category
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th width="5%">#</th>
                                                            <th>Category Title</th>
                                                            <th width="15%">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($categories as $category)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $category->title }}</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <!-- Edit Button -->
                                                                    <a href="{{ route('blog-categories.edit', $category->id) }}"
                                                                        class="btn btn-sm btn-outline-primary"
                                                                        title="Edit">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>


                                                                    <!-- Delete Form -->
                                                                    <form
                                                                        action="{{ route('blog-categories.destroy', $category->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-outline-danger"
                                                                            title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <!-- Edit Modal -->
                                                        <!-- <div class="modal fade" id="editModal{{ $category->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="editModalLabel{{ $category->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form
                                                                        action="{{ route('blog-categories.update', $category->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="editModalLabel{{ $category->id }}">
                                                                                Edit Category</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="title{{ $category->id }}"
                                                                                    class="form-label">Category
                                                                                    Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="title{{ $category->id }}"
                                                                                    name="title"
                                                                                    value="{{ $category->title }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                Changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        @empty
                                                        <tr>
                                                            <td colspan="3" class="text-center py-4">No blog categories
                                                                found.</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagination -->
                                    @if (method_exists($categories, 'hasPages') && $categories->hasPages())
                                    <div class="mt-3">
                                        {{ $categories->links() }}
                                    </div>
                                    @endif
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




        @endsection