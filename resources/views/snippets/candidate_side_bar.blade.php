<div class="dashboard-wrap bg-light">
    <div class="collapse" id="MobNav">
        <div class="collapse" id="MobNav">
            <div class="dashboard-nav">
                <div class="dash-user-blocks pt-5">
                    <div class="jbs-grid-usrs-thumb">
                        <div class="jbs-grid-yuo">
                            <a href="candidate-detail.html">
                                <figure>
                                    @if(Auth::user()->candidateProfile &&
                                    Auth::user()->candidateProfile->profile_picture)
                                    <img src="{{ asset('storage/' . Auth::user()->candidateProfile->profile_picture) }}"
                                        class="img-fluid circle" alt="Profile Picture">
                                    @else
                                    <div class="default-profile-circle circle d-flex align-items-center justify-content-center"
                                        style="width: 100px; height: 100px; background-color: #6c757d; color: white; font-size: 48px; font-weight: bold; border-radius: 50%;">
                                        {{ strtoupper(substr($candidate->name ?? Auth::user()->name, 0, 1)) }}
                                    </div>
                                    @endif
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div class="jbs-grid-usrs-caption mb-3">
                        <div class="jbs-kioyer">
                            <span class="label text-light theme-bg">05 Openings</span>
                        </div>
                        <div class="jbs-tiosk">
                            <h4 class="jbs-tiosk-title"><a href="candidate-detail.html">Instagram App</a></h4>
                            <div class="jbs-tiosk-subtitle"><span><i
                                        class="fa-solid fa-location-dot me-2"></i>Canada</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-inner">
                    <ul data-submenu-title="Main Navigation">
                        <li class="active"><a href="{{ route('candidate.dashboard') }}"><i
                                    class="fa-solid fa-gauge-high me-2"></i>
                                Dashboard</a></li>
                        <li><a href="{{ route('profile.candidate-profile') }}"><i
                                    class="fa-regular fa-user me-2"></i>User
                                Profile </a>
                        </li>
                        <li><a href="{{ route('all-jobs') }}"><i class="fa-solid fa-business-time me-2"></i>Jobs</a>
                        <li><a href="{{ route('profile.resume') }}"><i class="fa-solid fa-business-time me-2"></i>My
                                resume</a>
                        </li>
                        <li><a href="employer-submit-job.html"><i class="fa-solid fa-pen-ruler me-2"></i>Submit
                                Jobs</a></li>
                        <li><a href="employer-applicants-jobs.html"><i
                                    class="fa-solid fa-user-group me-2"></i>Applicants
                                Jobs</a></li>
                        <li><a href="employer-shortlist-candidates.html"><i
                                    class="fa-solid fa-user-clock me-2"></i>Shortlisted
                                Candidates</a></li>
                        <li><a href="employer-package.html"><i class="fa-solid fa-wallet me-2"></i>Package</a></li>
                        <li><a href="{{ route('messages') }}"><i class="fa-solid fa-comments me-2"></i>Messages</a>
                        </li>
                        <li><a href="employer-change-password.html"><i
                                    class="fa-solid fa-unlock-keyhole me-2"></i>Change
                                Password</a></li>
                        <li><a href="employer-delete-account.html"><i class="fa-solid fa-trash-can me-2"></i>Delete
                                Account</a></li>

                        <button type="button" class="btn btn-whites">
                            <div class="drp_menu_headr-right">

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="btn btn-whites"><i class="fa-solid fa-power-off me-2"></i>Log Out</a>
                            </div>
                            <form action="{{ route('logout') }}" method="post" style="display: none;" id="logout-form">
                                @csrf
                            </form></a>
                        </button>





                    </ul>
                </div>
            </div>
        </div>

    </div>