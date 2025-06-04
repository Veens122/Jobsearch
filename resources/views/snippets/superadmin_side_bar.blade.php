 <div class="dashboard-wrap bg-light">
     <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
         aria-controls="MobNav">
         <i class="fas fa-bars mr-2"></i>Dashboard Navigation
     </a>

     <div class="collapse" id="MobNav">
         <div class="dashboard-nav">
             <div class="dash-user-blocks pt-5">
                 <div class="jbs-grid-usrs-thumb">
                     <div class="jbs-grid-yuo">
                         <a href="candidate-detail.html">
                             <figure><img src="{{ Auth::user()->profile_picture 
    ? asset('storage/' . Auth::user()->profile_picture) 
    : asset('assets/img/l-12.png') }}" class="img-fluid circle" alt="Admin Profile Picture">
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
                     <li class="active"><a href="employer-dashboard.html"><i
                                 class="fa-solid fa-gauge-high me-2"></i>Admin
                             Dashboard</a></li>
                     <li><a href="{{ route('admin-profile') }}"><i class="fa-regular fa-user me-2"></i>My Profile
                         </a>
                     </li>
                     <li><a href="{{ route('superadmin.jobs.manage-jobs') }}"><i
                                 class="fa-solid fa-briefcase me-2"></i>Manage
                             Jobs</a>
                     </li>
                     <li><a href="{{ route('categories.index') }}"><i class="fa-solid fa-list-check me-2"></i>View All
                             Job Category</a></li>
                     <li><a href="{{ route('superadmin.employer-list') }}"><i
                                 class="fa-solid fa-pen-ruler me-2"></i>Employers list</a></li>
                     <li><a href="{{ route('users.users-list') }}"><i class="fa-solid fa-user-clock me-2"></i>All
                             Users</a></li>
                     <li><a href="employer-messages.html"><i class="fa-solid fa-comments me-2"></i>Messages</a>
                     </li>
                     <li><a href="employer-change-password.html"><i class="fa-solid fa-unlock-keyhole me-2"></i>Change
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