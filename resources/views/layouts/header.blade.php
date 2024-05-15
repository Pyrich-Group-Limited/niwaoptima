<?php

 use Illuminate\Support\Facades\Auth;

 $user = Auth::user();

 ?>

 <style>
     .text-bg-primary {
         background-color: #309241 !important;
         color: #ffffff !important;
     }
     .clicked-link {
    color: black; /* Change the color to black for clicked links */
}
 </style>
 <?php 
          if (Auth::user()->hasRole('super-admin')) {
            $value = 'superadmin';
        } else if (Auth::user()->level && Auth::user()->level->id == 20) {
            $value = 'md_user';
        }else if (Auth::user()->level && Auth::user()->level->id == 19) {
            $value = 'ta_dashboard';
        } else if (Auth::user()->level && Auth::user()->level->id == 18)
        {
            $value = 's_dashboard';
        } else if (Auth::user()->level && Auth::user()->level->id == 17)
        {
            $value = 'gm_dashboard';
        } else if (Auth::user()->level && Auth::user()->level->id == 3)
        {
            $value = 'areamanager';
        } else if (Auth::user()->level && 
        Auth::user()->level->id >= 14 && 
        Auth::user()->level->id <= 16)
        {
            $value = 'range_dashboard';
        } else {
            $value = "home";
            
        } 
 ?>
 <!--begin::Header-->
 <!-- partial:partials/_navbar.html -->
 <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
     <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

         {{-- <a class="navbar-brand brand-logo h-100px w-100px border-50%" href="{{ route('home') }}">
public\assets\media\logos\
            <img class=" border-50%"  width="250" height="150"  src="{{ asset('assets/media/logos/niwaebs.jpg') }}" alt="optima logo"/></a> --}}
         <a class="navbar-brand brand-logo h-100px w-100px border-50%" href="{{ route($value) }}">

            <img class=" border-50%"  width="250" height="150"  src="{{ asset('assets/media/logos/NIWA Optima-transparent.png') }}" alt="optima logo"/></a>
         <a class="navbar-brand brand-logo-mini" href="{{ route($value) }}"><img src="{{ asset('assets/media/logos/NIWA Optima-transparent.png') }}" alt="logo" class="h-60px w-100px"/></a>
     </div>
     {{-- <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
         <a href="#" class="navbar-brand brand-logo">
             <img alt="Logo" src="{{ asset('assets/media/logos/niwalogo.jpeg') }}" class="h-30px" />
         </a>
     </div> --}}
     <div class="text-center navbar-menu-wrapper d-flex align-items-stretch">
         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
             <span class="fas fa-bars"></span>
         </button>
         <ul class="navbar-nav">
             <li class="nav-item nav-search d-none d-md-flex">
                 <div class="nav-link">
                     <div class="input-group">
                         <div class="input-group-prepend">
                             <span class="input-group-text">
                                 <i class="fas fa-search"></i>
                             </span>
                         </div>
                         <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                     </div>
                 </div>
             </li>
         </ul>

         <ul class="navbar-nav navbar-nav-right">

             <li class="nav-item dropdown">
                 <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                     data-toggle="dropdown">
                     <i class="fas fa-bell mx-0"></i>
                     {{-- <span class="count">16</span> --}}
                 </a>
                 <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="notificationDropdown">
                     <a class="dropdown-item">
                         <p class="mb-0 font-weight-normal float-left">You have 16 new notifications
                         </p>
                         <span class="badge badge-pill badge-warning float-right">View all</span>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item preview-item">
                         <div class="preview-thumbnail">
                             <div class="preview-icon bg-danger">
                                 <i class="fas fa-exclamation-circle mx-0"></i>
                             </div>
                         </div>
                         <div class="preview-item-content">
                             <h6 class="preview-subject font-weight-medium">Application Error</h6>
                             <p class="font-weight-light small-text">
                                 Just now
                             </p>
                         </div>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item preview-item">
                         <div class="preview-thumbnail">
                             <div class="preview-icon bg-warning">
                                 <i class="fas fa-wrench mx-0"></i>
                             </div>
                         </div>
                         <div class="preview-item-content">
                             <h6 class="preview-subject font-weight-medium">Settings</h6>
                             <p class="font-weight-light small-text">
                                 Private message
                             </p>
                         </div>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item preview-item">
                         <div class="preview-thumbnail">
                             <div class="preview-icon bg-info">
                                 <i class="far fa-envelope mx-0"></i>
                             </div>
                         </div>
                         <div class="preview-item-content">
                             <h6 class="preview-subject font-weight-medium">New user registration</h6>
                             <p class="font-weight-light small-text">
                                 2 days ago
                             </p>
                         </div>
                     </a>
                 </div>
             </li>
             <li class="nav-item dropdown">
                 <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                     data-toggle="dropdown" aria-expanded="false">
                     <i class="fas fa-envelope mx-0"></i>
                     {{-- <span class="count">25</span> --}}
                 </a>

                 <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="messageDropdown">
                     <div class="dropdown-item">
                         <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                         </p>
                         <span class="badge badge-info badge-pill float-right">View all</span>
                     </div>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item preview-item">
                         <div class="preview-thumbnail">
                             <img src="" alt="image" class="profile-pic">
                             {{-- <img src="images/faces/face4.jpg" alt="image" class="profile-pic"> --}}
                         </div>
                         <div class="preview-item-content flex-grow">
                             <h6 class="preview-subject ellipsis font-weight-medium">David Grey
                                 <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                             </h6>
                             <p class="font-weight-light small-text">
                                 The meeting is cancelled
                             </p>
                         </div>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item preview-item">
                         <div class="preview-thumbnail">
                             <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                         </div>
                         <div class="preview-item-content flex-grow">
                             <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook
                                 <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                             </h6>
                             <p class="font-weight-light small-text">
                                 New product launch
                             </p>
                         </div>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item preview-item">
                         <div class="preview-thumbnail">
                             <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                         </div>
                         <div class="preview-item-content flex-grow">
                             <h6 class="preview-subject ellipsis font-weight-medium"> Johnson
                                 <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                             </h6>
                             <p class="font-weight-light small-text">
                                 Upcoming board meeting
                             </p>
                         </div>
                     </a>
                 </div>
             </li>
             <li class="app-navbar-item ms-1 ms-md-3">
                 <!--begin::Menu toggle-->
                 <a class="nav-link" href="#">
                     {{-- <i class="fas fa-ellipsis-h"></i> --}}
                     {{-- <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div> --}}
                     <div id="theme-settings" class="settings-panel">
                         <i class="settings-close fa fa-times"></i>
                         <p class="settings-heading">SIDEBAR SKINS</p>
                         <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                             <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                         </div>
                         <div class="sidebar-bg-options" id="sidebar-dark-theme">
                             <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                         </div>
                         <p class="settings-heading mt-2">HEADER SKINS</p>
                         <div class="color-tiles mx-0 px-4">
                             <div class="tiles primary"></div>
                             <div class="tiles success"></div>
                             <div class="tiles warning"></div>
                             <div class="tiles danger"></div>
                             <div class="tiles info"></div>
                             <div class="tiles dark"></div>
                             <div class="tiles default"></div>
                         </div>
                     </div>
                 </a>

                 <!--end::Menu-->
             </li>
             <li class="nav-item nav-profile dropdown">
                 <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                     @if (auth()->check() && auth()->user()->staff->profile_picture)
                         <img src="{{ asset('storage/' . auth()->user()->staff->profile_picture) }}"
                             alt="{{ auth()->user()->staff->profile_picture }}">
                     @else

                         <img src="assets/media/avatars/images.jpeg" alt="image" />
                     @endif
                 </a>
                 <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                     <a class="dropdown-item">
                         <div class="symbol symbol-50px me-5">
                             @if (auth()->check() && auth()->user()->staff->profile_picture)
                                 <img src="{{ asset('storage/' . auth()->user()->staff->profile_picture) }}"
                                     alt="{{ auth()->user()->staff->profile_picture }}">
                             @else
                                 <img src="assets/media/avatars/images.jpeg" alt="image" />
                             @endif
                             {{-- <img alt="Logo" src="{{asset('assets/media/avatars/blank.png')}}" /> --}}
                         </div>
                         <!--end::Avatar-->
                         <!--begin::Username-->
                         <div class="d-flex flex-column">
                             <div class="fw-bold d-flex align-items-center fs-5">
                                @if (auth()->check())

                                {{ $user->first_name . ' ' . $user->last_name }}
                                {{-- <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{auth()->user()->roles->pluck('name')[0]}}</span> --}}
                                <span
                                class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ auth()->user()->roles->isNotEmpty()? auth()->user()->roles->pluck('name')->first(): 'no role yet' }}</span>
                            </div>
                            @endif
                             <!-- <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a> -->
                         </div>
                         <!--end::Username-->
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="{{ route('view-profile') }}" class="dropdown-item">
                         <i class="fas fa-power-off text-primary"></i>
                         My Profile
                     </a>
                     <div class="dropdown-divider"></div>
                     <!--begin::Menu item-->
                     <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                         data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">

                         {{-- <a href="{{ route('home') }}" class="menu-link px-5"> --}}
                         {{-- <span class="menu-title">My Activities</span> --}}
                         {{-- <span class="menu-arrow"></span> --}}
                         </a>
                         <!--begin::Menu sub-->
                         <div class="menu-sub menu-sub-dropdown w-175px py-4">
                             <!--begin::Menu item-->
                             <div class="menu-item px-3">
                                 <a href="{{ route('home') }}" class="menu-link px-5">Deleted</a>
                             </div>
                             <!--end::Menu item-->
                             <!--begin::Menu item-->
                             <div class="menu-item px-3">
                                 <a href="{{ route('home') }}" class="menu-link px-5">Updated</a>
                             </div>
                             <!--end::Menu item-->
                             <!--begin::Menu item-->
                             <div class="menu-item px-3">
                                 <a href="{{ route('home') }}" class="menu-link px-5">Created</a>
                             </div>
                             <!--end::Menu item-->
                             <!--begin::Menu separator-->
                             <div class="separator my-2"></div>
                             <!--end::Menu separator-->
                             <!--begin::Menu item-->
                             <div class="menu-item px-3">
                                 <div class="menu-content px-3">
                                     <label class="form-check form-switch form-check-custom form-check-solid">
                                         <input class="form-check-input w-30px h-20px" type="checkbox" value="1"
                                             checked="checked" name="notifications" />
                                         <span class="form-check-label text-muted fs-7">Notifications</span>
                                     </label>
                                 </div>
                             </div>
                             <!--end::Menu item-->
                         </div>
                         <!--end::Menu sub-->
                     </div>
                     <!--end::Menu item-->

                     <div class="dropdown-divider"></div>
                     <a href="{{ route('profile') }}" class="dropdown-item">
                         <i class="fas fa-power-off text-primary"></i>
                         Account Settings
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="{{ route('change.email.password.form') }}" class="dropdown-item">
                         <i class="fas fa-power-off text-primary"></i>
                         Change Password
                     </a>
                     <div class="dropdown-divider"></div>

                     <a href="#" class="dropdown-item"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="fas fa-power-off text-primary"></i>
                         Sign out
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </div>
             </li>
             <li class="nav-item nav-settings d-none d-lg-block">
                 <a class="nav-link" href="#">
                     <i class="fas fa-ellipsis-h"></i>
                 </a>
             </li>
         </ul>
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
             data-toggle="offcanvas">
             <span class="fas fa-bars"></span>
         </button>
     </div>
 </nav>
 <!-- partial -->
 <!--end::Header-->
