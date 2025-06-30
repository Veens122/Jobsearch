<div class="header header-light head-fixed">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href=" {{ route('home') }}">
                    <img src="{{ asset('assets/img/job veens logo.png') }}" class="logo" alt="">
                </a>
                <div class="nav-toggle"></div>
                <ul class="mobile_nav dhsbrd">
                    <li>
                        <div class="btn-group account-drop">
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa-regular fa-comments"></i><span class="noti-status"></span>
                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <div class="drp_menu_headr bg-primary">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="ntf-list-groups">
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-purple"><i
                                                class="fa-solid fa-house-medical-circle-check"></i></div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small"><strong>Kr. Shaury Preet</strong> Replied Your
                                                Message</p>
                                        </div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-warning"><i
                                                class="fa-solid fa-envelope"></i></div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small">Mortin Denver Accepted Your Resume <strong
                                                    class="text-success">On Job Veens</strong></p>
                                        </div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-success"><i
                                                class="fa-solid fa-sack-dollar"></i></div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small">Your Job #456256 Expired Yesterday <strong>View
                                                    job</strong></p>
                                        </div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-danger"><i
                                                class="fa-solid fa-comments"></i></div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small"><strong>Daniel kurwa</strong> Has Been Approved
                                                Your Resume!.</p>
                                        </div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-info"><i
                                                class="fa-solid fa-circle-dollar-to-slot"></i></div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small">Khushi Verma Left A Review On <strong
                                                    class="text-danger">Your Message</strong></p>
                                        </div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <a href="#" class="ntf-more">View All Notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group account-drop">
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                                <img src="{{ auth()->user()->profile_picture 
    ? asset('storage/' . auth()->user()->profile_picture) 
    : asset('assets/img/l-12.png') }}" class="img-fluid circle" alt="Admin Profile Picture">


                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <div class="drp_menu_headr bg-primary">
                                    <h4>
                                        <h4>Hi, {{ auth()->user()->name }}</h4>
                                    </h4>
                                    <div class="drp_menu_headr-right"><button type="button" class="btn btn-whites">
                                            <div class="drp_menu_headr-right">

                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    class="btn btn-whites">logout</a>
                                            </div>
                                            <form action="{{ route('logout') }}" method="post" style="display: none;"
                                                id="logout-form">
                                                @csrf
                                            </form></a>
                                        </button></div>
                                </div>
                                <ul>
                                    <li><a href="candidate-dashboard.html"><i
                                                class="fa fa-tachometer-alt"></i>Dashboard</a></li>
                                    <li><a href="candidate-profile.html"><i class="fa fa-user-tie"></i>My
                                            Profile</a></li>
                                    <li><a href="candidate-resume.html"><i class="fa fa-file"></i>My Resume<span
                                                class="notti_coun style-2">7</span></a></li>
                                    <li><a href="candidate-saved-jobs.html"><i class="fa-solid fa-bookmark"></i>Saved
                                            Resume</a></li>
                                    <!-- <li><a href="candidate-messages.html"><i class="fa fa-envelope"></i>Messages<span
                                                class="notti_coun style-3">3</span></a></li> -->
                                    <li><a href="{{ route('password.edit')}}"><i class="fa fa-unlock-alt"></i>Change
                                            Password</a></li>
                                    <!-- <li><a href="candidate-delete-account.html"><i
                                                class="fa-solid fa-trash-can"></i>Delete Account</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">

                    <li class="active"><a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="active"><a href="JavaScript:Void(0);">jobs</a>
                    </li>




                    </li>


                </ul>

                <ul class="nav-menu nav-menu-social align-to-right dhsbrd">
                    <li>
                        <!-- Notification will be activated later -->
                        <!-- <div class="btn-group account-drop">
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa-regular fa-comments"></i><span class="noti-status"></span>
                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <div class="drp_menu_headr bg-primary">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="ntf-list-groups">
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-purple"><i
                                                class="fa-solid fa-house-medical-circle-check"></i></div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small"><strong>Kr. Shaury Preet</strong> Replied Your
                                                Message</p>
                                        </div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-warning"><i
                                                class="fa-solid fa-envelope"></i></div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small">Mortin Denver Accepted Your Resume <strong
                                                    class="text-success">On Job Veens</strong></p>
                                        </div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-success"><i
                                                class="fa-solid fa-sack-dollar"></i></div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small">Your Job #456256 Expired Yesterday <strong>View
                                                    job</strong></p>
                                        </div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-danger"><i
                                                class="fa-solid fa-comments"></i></div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small"><strong>Daniel kurwa</strong> Has Been Approved
                                                Your Resume!.</p>
                                        </div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-info"><i
                                                class="fa-solid fa-circle-dollar-to-slot"></i></div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small">Khushi Verma Left A Review On <strong
                                                    class="text-danger">Your Message</strong></p>
                                        </div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <a href="#" class="ntf-more">View All Notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </li>
                    <li>
                        <div class="btn-group account-drop">
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user()->profile_picture)
                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                    class="img-fluid circle" alt="Admin Profile Picture">
                                @else
                                <div class="img-fluid circle d-flex align-items-center justify-content-center bg-primary text-white fw-bold"
                                    style="width: 40px; height: 40px; border-radius: 50%;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                @endif




                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <div class="drp_menu_headr bg-primary">
                                    <h4>Hi, {{ Auth::user()->name }}</h4>
                                    <div class="drp_menu_headr-right"><button type="button" class="btn btn-whites">
                                            <div class="drp_menu_headr-right">

                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    class="btn btn-whites">logout</a>
                                            </div>
                                            <form action="{{ route('logout') }}" method="post" style="display: none;"
                                                id="logout-form">
                                                @csrf
                                            </form></a>
                                        </button></div>
                                </div>
                                <ul>
                                    <li><a href="{{ route('superadmin.dashboard')}}"><i
                                                class="fa fa-tachometer-alt"></i>Dashboard</a></li>
                                    <li><a href="{{ route('admin-profile') }}"><i class="fa fa-user-tie"></i>My
                                            Profile</a></li>
                                    <li><a href="{{ route('users.users-list')}}"><i
                                                class="fa-solid fa-bookmark"></i>Users</a>
                                    </li>
                                    <!-- <li><a href="candidate-messages.html"><i class="fa fa-envelope"></i>Messages<span
                                                class="notti_coun style-3">3</span></a></li> -->
                                    <li><a href="{{ route('password.edit')}}"><i class="fa fa-unlock-alt"></i>Change
                                            Password</a></li>
                                    <!-- <li><a href="candidate-delete-account.html"><i
                                                class="fa-solid fa-trash-can"></i>Delete Account</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- <li class="list-buttons ms-2">
                        <a href="employer-submit-job.html"><i class="fa-solid fa-cloud-arrow-up me-2"></i>Post
                            Job</a>
                    </li> -->
                </ul>
            </div>
        </nav>
    </div>
</div>