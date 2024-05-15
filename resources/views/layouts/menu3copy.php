<style>
    /* Space between main menu items */
    .main-menu-item {
        margin-bottom: 40px;
    }

    /* Light green color on main menu hover */
    .menu-link:hover {
        background-color: #7fc89f;
    }

    /* Light grey color on submenu active */
    .menu-sub-accordion>.menu-item.show>.menu-link {
        background-color: lightgrey;
    }

    /* Space between main menu and submenu */
    .menu-item.show>.menu-sub {
        margin-top: 10px;
    }

    /* Add borders to submenus */
    .menu-sub {
        background-color: #f1f1f1;
        /* Gray background for the entire submenu */
        border: 1px solid #ccc;
        border-radius: 10px;
        margin-top: 5px;
    }
</style>


@php
$departmentData = getDepartmentData();
@endphp
<!-- Begin::Menu-Code -->

<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="kt_app_sidebar_menu" data-kt-menu="true">
            <!--Start Main Menu 1: Dashboards -->
            <div class="menu-item main-menu-item">

<div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link active" href="{{ route('home') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
            <!--end:Menu link-->
        </div>


                <div class="menu-sub menu-sub-accordion menu-active-bg">


                    @include('layouts.dashboard')
                </div>
            </div>
            <!--End Main Menu 1: Operational Tasks -->

            <!--Start Main Menu 2: My Tasks -->
            <div class="menu-item main-menu-item">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">My Tasks</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    @if (in_array(Auth()->user()->staff->department_id, $departmentData['departmentIdsToCheck1']))

                    @include('employermanager::layouts.menu')
                    @endif
                    
                </div>
            </div>
            <!--End Main Menu 2: Operational Tasks -->

            <!--Start Main Menu 3: General Tasks -->
            <div class="menu-item main-menu-item">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Operational Tasks</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    @include('documentmanager::layouts.menu')



                </div>
            </div>
            <!--End Main Menu 3: Operational Tasks -->

            

            <!--Start Main Menu 4: Operational Tasks -->
            <div class="menu-item main-menu-item">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="currentColor"></path>
                                <path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">General Tasks</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                   {{--  @if (in_array(Auth()->user()->staff->department_id, $departmentData['hrIdToCheck'])) --}}
                    @include('dtarequests::layouts.menu')
                   {{--  @endif --}}

                    @include('humanresource::layouts.menu')

                    @if (in_array(Auth()->user()->staff->department_id,  $departmentData['hrIdToCheck']) || $departmentData['loggedInUserId'] == 1)
                    @include('layouts.user')
                    @endif
                    
                </div>
            </div>
            <!--End Main Menu 4: Operational Tasks -->


            <!--Start Main Menu 5: Operational Tasks -->
            <div class="menu-item main-menu-item">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"></path>
                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">MailBox</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    @include('layouts.mailmenu')
                </div>
            </div>
            <!--End Main Menu 5: Operational Tasks -->

            <!--Start Main Menu 5: Operational Tasks -->
            <div class="menu-item main-menu-item">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"></path>
                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Approval</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    @include('approval::layouts.menu')
                </div>
            </div>

           <!--Begin change password -->
           {{--  <div class="menu-item main-menu-item">
                <a href="{{ route('change.email.password.form') }}" class="menu-link menu-toggle1">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="currentColor"></path>
                                <path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Change Password</span>
                </a>
               
            </div> --}}
            <!--End change password -->

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!-- End::Menu-Code -->

<!-- JavaScript Code -->
<script>
    // Function to close all dropdowns
    function closeAllDropdowns() {
        const dropdownMenus = document.querySelectorAll('.menu-item');

        dropdownMenus.forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    }

    // Function to toggle dropdown on click
    function toggleDropdown(event) {
        const currentMenu = event.target.closest('.menu-item');
        const allMenus = document.querySelectorAll('.menu-item');

        allMenus.forEach(menu => {
            if (menu !== currentMenu && menu.classList.contains('show')) {
                menu.classList.remove('show');
            }
        });

        currentMenu.classList.toggle('show');
    }

    // Add click event listener to menu toggles
    const menuToggles = document.querySelectorAll('.menu-link.menu-toggle');
    menuToggles.forEach(toggle => {
        toggle.addEventListener('click', toggleDropdown);
    });

    // Close all dropdowns on load or reload
    window.addEventListener('load', closeAllDropdowns);
</script>







