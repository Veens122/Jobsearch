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
                             <figure>@if(Auth::user()->profile_picture)
                                 <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                     class="img-fluid circle" alt="Admin Profile Picture">
                                 @else
                                 <div class="img-fluid circle d-flex align-items-center justify-content-center bg-primary text-white fw-bold"
                                     style="width: 90px; height: 90px;  border-radius: 50%; font-size: 80px">
                                     {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                 </div>
                                 @endif

                             </figure>
                         </a>
                     </div>
                 </div>
                 <div class="jbs-grid-usrs-caption mb-3">

                     <div class="jbs-tiosk">
                         <h4 class="jbs-tiosk-title"><a href="">{{ Auth::user()->name }}</a></h4>
                         <div class="jbs-tiosk-subtitle"><span><i
                                     class="fa-solid fa-location-dot me-2"></i>{{ $admin->adminProfile->country ?? 'N/A' }}</span>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="dashboard-inner">
                 <ul data-submenu-title="Main Navigation">
                     <li class="active"><a href="{{ route('superadmin.dashboard') }}"><i
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
                                 class="fa-solid fa-pen-ruler me-2"></i>Manage Employers</a></li>
                     <li><a href="{{ route('users.users-list') }}"><i class="fa-solid fa-user-clock me-2"></i>All
                             Users</a></li>
                     <li><a href="{{ route('blog-categories.index') }}"><i
                                 class="fa-solid fa-user-clock me-2"></i>Manage Blog Categories</a></li>

                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" role="button"
                             data-bs-toggle="dropdown" aria-expanded="false">
                             <i class="fa-solid fa-list-check me-2"></i>Manage Blogs
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="blogDropdown">
                             <!-- <li><a class="dropdown-item" href="">Manage Blog
                                     Categories</a></li> -->
                             <!-- <li><a class="dropdown-item" href="{{ route('blogs.create') }}"> Blog</a>
                             </li> -->
                             <li><a class="dropdown-item" href="{{ route('blogs.create') }}">Add Blog</a>
                             </li>
                             <li><a class="dropdown-item" href="{{ route('superadmin.blogs.index') }}">View Blog
                                     lists</a></li>
                         </ul>
                     </li>



                     <!-- Message to be implemented later if time permits -->
                     <!-- <li><a href="employer-messages.html"><i class="fa-solid fa-comments me-2"></i>Messages</a>
                     </li> -->
                     <li><a href="{{ route('password.edit')}}"><i class="fa-solid fa-unlock-keyhole me-2"></i>Change
                             Password</a></li>
                     <!-- <li><a href="employer-delete-account.html"><i class="fa-solid fa-trash-can me-2"></i>Delete
                             Account</a></li> -->

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