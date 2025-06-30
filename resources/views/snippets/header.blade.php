<div class="header header-transparent change-logo">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand static-logo" href="{{ route('home') }}"><img
                        src="{{ asset('assets/img/job veens logo light.png') }}" class="logo" alt=""></a>
                <a class="nav-brand fixed-logo" href="{{ route('home') }}"><img
                        src="{{ asset('assets/img/job veens logo.png') }}" class="logo" alt=""></a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        @guest
                        <li class="list-buttons">
                            <a href="{{ route('login')}}" data-bs-toggle="modal" data-bs-target="#login"><i
                                    class="fas fa-sign-in-alt me-2"></i>Log In</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">

                    <li><a href="{{ route('about') }}">About Us</a></li>

                    <li><a href="{{ route('all-jobs') }}">Jobs</a></li>

                    <li><a href="{{ route('contact')}}">Contact Us</a></li>


                    <li><a href="{{ route('blogs.index') }}">Blogs</a></li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <li>
                        @guest
                        <a href="J{{ route('login')}}" data-bs-toggle="modal" data-bs-target="#login"><i
                                class="fas fa-sign-in-alt me-2"></i>Sign In</a>
                        @endguest
                    </li>
                    @auth
                    @if (auth()->user()->role_id == 1)
                    <!-- Admin -->
                    <li class="list-buttons">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    @elseif (auth()->user()->role_id == 2)
                    <!-- Employer -->
                    <li class="list-buttons">
                        <a href="{{ route('employer.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    @elseif (auth()->user()->role_id == 3)
                    <!-- Candidate -->
                    <li class="list-buttons">
                        <a href="{{ route('candidate.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    @endif
                    @endauth

                </ul>
            </div>
        </nav>
    </div>
</div>