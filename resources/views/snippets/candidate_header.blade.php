<div class="header header-light head-fixed">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/job veens logo light.png') }}" class="logo" alt="">
                </a>
                <div class="nav-toggle"></div>
                <ul class="mobile_nav dhsbrd">


                    <!-- <a href="{{ route('candidate.notifications') }}" class="relative">
                        <i class="fas fa-bell text-xl"></i>
                        @if(auth()->user()->unreadNotifications->count())
<span class="noti-status">
  {{ auth()->check() && auth()->user()->unreadNotifications->count() > 0 ? '•' : '' }}
</span>
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                        @endif
                    </a> -->




                    <li>
                        <div class="btn-group account-drop">
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa-regular fa-comments"></i>
                                <span
                                    class="noti-status">{{ auth()->user()->unreadNotifications->count() > 0 ? '•' : '' }}</span>
                            </button>

                            <div class="dropdown-menu pull-right animated flipInX" style="min-width: 300px;">
                                <div class="drp_menu_headr bg-primary">
                                    <h4>Notifications</h4>
                                </div>

                                <div class="ntf-list-groups">
                                    @forelse(auth()->user()->unreadNotifications as $notification)
                                    <div class="ntf-list-groups-single {{ $notification->read_at ? '' : 'bg-light' }}">
                                        <div class="ntf-list-groups-icon text-primary">
                                            <i class="fa-solid fa-bell"></i>
                                        </div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small mb-0">
                                                {!! $notification->data['message'] ?? 'No notification message' !!}
                                            </p>
                                            <small class="text-muted">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="ntf-list-groups-single">
                                        <p class="small text-muted text-center mb-0">No notifications found.</p>
                                    </div>
                                    @endforelse

                                    <div class="ntf-list-groups-single">
                                        <a href="{{ route('candidate.dashboard') }}"
                                            class="ntf-more d-block text-center mt-2">
                                            View All Notifications
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="btn-group account-drop">
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{ Auth::user()->candidateProfile && Auth::user()->candidateProfile->profile_picture
    ? asset('storage/' . Auth::user()->candidateProfile->profile_picture)
    : asset('assets/img/l-12.png') }}" class="img-fluid circle" alt="Profile Picture">

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
                                        </button>
                                    </div>
                                </div>
                                <ul>
                                    <li><a href="candidate-dashboard.html"><i
                                                class="fa fa-tachometer-alt"></i>Dashboard<span
                                                class="notti_coun style-1">4</span></a></li>
                                    <li><a href="{{ route('profile.candidate-profile') }}"><i
                                                class="fa fa-user-tie"></i>My
                                            Profile</a></li>
                                    <li><a href="{{ route('profile.resume') }}"><i class="fa fa-file"></i>My Resume</a>
                                    </li>
                                    <li><a href="candidate-saved-jobs.html"><i class="fa-solid fa-bookmark"></i>Saved
                                            Resume</a></li>
                                    <li><a href="{{ route('messages') }}"><i class="fa fa-envelope"></i>Messages<span
                                                class="notti_coun style-3">3</span></a></li>
                                    <li><a href="candidate-change-password.html"><i class="fa fa-unlock-alt"></i>Change
                                            Password</a></li>
                                    <li><a href="candidate-delete-account.html"><i
                                                class="fa-solid fa-trash-can"></i>Delete Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">

                    </li>
                    <li><a href="JavaScript:Void(0);">Home<span class="submenu-indicator"></span></a>

                    </li>



                </ul>
                </li>



                </li>

                </ul>
                </li>




                </ul>

                <ul class="nav-menu nav-menu-social align-to-right dhsbrd">
                    <!-- <li>
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
                                            <p class="small"><strong>Kr. Shaury Preet</strong> Replied Your Message
                                            </p>
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
                                            <p class="small"><strong>Daniel kurwa</strong> Has Been Approved Your
                                                Resume!.</p>
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
                    </li> -->
                    <li>
                        <div class="btn-group account-drop">
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">





                                <figure>
                                    @if(Auth::user()->candidateProfile &&
                                    Auth::user()->candidateProfile->profile_picture)
                                    <img src="{{ asset('storage/' . Auth::user()->candidateProfile->profile_picture) }}"
                                        class="img-fluid circle" alt="Profile Picture">
                                    @else
                                    <div class="default-profile-circle circle d-flex align-items-center justify-content-center"
                                        style="width: 30px; height: 30px; background-color: #6c757d; color: white; font-size: 18px; font-weight: bold; border-radius: 50%;">
                                        {{ strtoupper(substr($candidate->name ?? Auth::user()->name, 0, 1)) }}
                                    </div>
                                    @endif
                                </figure>




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
                                        </button>
                                    </div>
                                </div>
                                <ul>
                                    <li><a href="{{ route('candidate.dashboard') }}"><i
                                                class="fa fa-tachometer-alt"></i>Dashboard</a></li>
                                    <li><a href="{{ route('profile.candidate-profile') }}"><i
                                                class="fa fa-user-tie"></i>My
                                            Profile</a></li>
                                    <!-- <li><a href="{{ route('profile.resume') }}"><i class="fa fa-file"></i>My Resume<span
                                                class="notti_coun style-2">7</span></a></li> -->
                                    <li><a href="{{ route('profile.resume') }}"><i
                                                class="fa-solid fa-bookmark"></i>Saved
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
                    <!-- <li class="list-buttons ms-2">
                        <a href="employer-submit-job.html"><i class="fa-solid fa-cloud-arrow-up me-2"></i>Post
                            Job</a>
                    </li> -->
                </ul>
            </div>
        </nav>
    </div>
</div>