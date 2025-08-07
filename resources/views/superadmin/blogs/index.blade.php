@extends('layouts.app') {{-- Or your actual layout --}}

@section('content')
<!-- To view list of all the posted blogs -->
<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-4">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <h1 class="mb-1 fs-3 fw-medium">All Blogs</h1>
            </div>
        </div>
    </div>

    <div class="dashboard-widg-bar d-block">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Blogs List</h4>
                            <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus me-1"></i> Add New Blog
                            </a>
                        </div>

                        <div class="card-body">
                            @if($blogs->isEmpty())
                            <p>No blogs found.</p>
                            @else
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->id }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>
                                            @if($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                                style="width: 100px;">
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('blog.details', $blog->slug) }}">
                                                            <i class="fas fa-eye me-1"></i> View
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('blogs.edit', $blog->slug) }}">
                                                            <i class="fas fa-edit me-1"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('blogs.destroy', $blog->slug) }}"
                                                            method="POST" onsubmit="return confirm('Are you sure?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item text-danger" type="submit">
                                                                <i class="fas fa-trash-alt me-1"></i> Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                    <li>
                                                        @if($blog->status === 'published')
                                                        <form action="{{ route('blogs.unpublish', $blog->slug) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="dropdown-item text-warning">
                                                                <i class="fas fa-eye-slash me-1"></i> Unpublish
                                                            </button>
                                                        </form>
                                                        @else
                                                        <form action="{{ route('blogs.publish', $blog->slug) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="dropdown-item text-success">
                                                                <i class="fas fa-upload me-1"></i> Publish
                                                            </button>
                                                        </form>
                                                        @endif
                                                    </li>

                                                    </li>

                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</div>
@endsection