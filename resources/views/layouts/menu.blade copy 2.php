<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
            <!-- Dashboards -->
            <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!-- Your icon code for Dashboards -->
                    </span>
                    <span class="menu-title">Dashboards</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link active" href="{{ route('home') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Registration</span>
                        </a>
                    </div>
                    <div class="menu-inner flex-column collapse" id="kt_app_sidebar_menu_dashboards_collapse">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('home') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Project Dashboard</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-content">
                            <a class="btn btn-flex btn-color-primary d-flex flex-stack fs-base p-0 ms-2 mb-2 toggle collapsible collapsed" data-bs-toggle="collapse" href="#kt_app_sidebar_menu_dashboards_collapse" data-kt-toggle-text="Show Less">
                                <span data-kt-toggle-text-target="true">Show More</span>
                                <!-- Your icon code for Show Less -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Tasks -->
            <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!-- Your icon code for My Tasks -->
                    </span>
                    <span class="menu-title">My Tasks</span>
                    <span class="menu-arrow"></span>
                </span>
                <!-- Menu sub-items for My Tasks (if any) -->
            </div>

            <!-- General Tasks -->
            <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!-- Your icon code for General Tasks -->
                    </span>
                    <span class="menu-title">General Tasks</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    @include('workflowengine::layouts.menu')
                    @include('shared::layouts.menu')
                    @include('documentmanager::layouts.menu')
                    @include('claimscompensation::layouts.menu')
                    @include('employermanager::layouts.menu')
                    @include('dtarequests::layouts.menu')
                    @include('humanresource::layouts.menu')
                    @include('dtareview::layouts.menu')
                    <!-- ... -->
                </div>
            </div>

            <!-- Operational Tasks -->
            <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!-- Your icon code for Operational Tasks -->
                    </span>
                    <span class="menu-title">Operational Tasks</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <!-- Menu sub-items for User Management -->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">User Management</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a href="{{ route('users.index') }}" class="menu-link {{ Request::is('users*') ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Users List</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('users.create') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Create User</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Menu sub-items for Roles -->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Roles</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a href="{{ route('roles.index') }}" class="menu-link {{ Request::is('roles*') ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Roles List</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('roles.create') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Create Role</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--begin:Menu item-->
{{-- <div class="menu-item"> --}}
<!--begin:Menu link-->
{{-- <a href="{{ route('emsses.index') }}" class="nav-link {{ Request::is('emsses*') ? 'active' : '' }}">
<span class="menu-icon">
    <!--begin::Svg Icon | path: icons/duotune/abstract/abs014.svg-->
    <span class="svg-icon svg-icon-2">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3" d="M11.8 5.2L17.7 8.6V15.4L11.8 18.8L5.90001 15.4V8.6L11.8 5.2ZM11.8 2C11.5 2 11.2 2.1 11 2.2L3.8 6.4C3.3 6.7 3 7.3 3 7.9V16.2C3 16.8 3.3 17.4 3.8 17.7L11 21.9C11.3 22 11.5 22.1 11.8 22.1C12.1 22.1 12.4 22 12.6 21.9L19.8 17.7C20.3 17.4 20.6 16.8 20.6 16.2V7.9C20.6 7.3 20.3 6.7 19.8 6.4L12.6 2.2C12.4 2.1 12.1 2 11.8 2Z" fill="currentColor" />
            <path d="M11.8 8.69995L8.90001 10.3V13.7L11.8 15.3L14.7 13.7V10.3L11.8 8.69995Z" fill="currentColor" />
        </svg>
    </span>
    <!--end::Svg Icon-->
</span>
<span>Emsses</span>
</a>
</div> --}}
<!--begin:Menu item-->

<!--begin:Menu item-->
{{-- <div class="menu-item">
    <!--begin:Menu link-->
    <a href="{{ route('emailselfservices.index') }}" class="nav-link {{ Request::is('emailselfservices*') ? 'active' : '' }}">
<span class="menu-icon">
    <!--begin::Svg Icon | path: icons/duotune/abstract/abs014.svg-->
    <span class="svg-icon svg-icon-2">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3" d="M11.8 5.2L17.7 8.6V15.4L11.8 18.8L5.90001 15.4V8.6L11.8 5.2ZM11.8 2C11.5 2 11.2 2.1 11 2.2L3.8 6.4C3.3 6.7 3 7.3 3 7.9V16.2C3 16.8 3.3 17.4 3.8 17.7L11 21.9C11.3 22 11.5 22.1 11.8 22.1C12.1 22.1 12.4 22 12.6 21.9L19.8 17.7C20.3 17.4 20.6 16.8 20.6 16.2V7.9C20.6 7.3 20.3 6.7 19.8 6.4L12.6 2.2C12.4 2.1 12.1 2 11.8 2Z" fill="currentColor" />
            <path d="M11.8 8.69995L8.90001 10.3V13.7L11.8 15.3L14.7 13.7V10.3L11.8 8.69995Z" fill="currentColor" />
        </svg>
    </span>
    <!--end::Svg Icon-->
</span>
<span>Emailselfservices</span>
</a>
</div> --}}
<!--begin:Menu item-->