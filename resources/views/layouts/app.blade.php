@php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_favicon = \Modules\Accounting\Models\Utility::getValByName('company_favicon');
    $SITE_RTL = \Modules\Accounting\Models\Utility::getValByName('SITE_RTL');
    $setting = \Modules\Accounting\Models\Utility::colorset();
    $color = 'theme-3';
    if (!empty($setting['color'])) {
        $color = $setting['color'];
    }
    $mode_setting = \Modules\Accounting\Models\Utility::mode_layout();
    $getseo = \Modules\Accounting\Models\Utility::getSeoSetting();
    $metatitle = isset($getseo['meta_title']) ? $getseo['meta_title'] : '';
    $metsdesc = isset($getseo['meta_desc']) ? $getseo['meta_desc'] : '';
    $meta_image = \Modules\Accounting\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($getseo['meta_image']) ? $getseo['meta_image'] : '';
    $get_cookie = \Modules\Accounting\Models\Utility::getCookieSetting();

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="{{ asset('atp/js/html5shiv.js') }}"></script>

    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    {{-- <style>
        #aa a{
            display: none
        }
    </style> --}}

    {{-- adding the fullcalender css here, the js is inside the main file, e.g dash for documenr --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css"
        integrity="sha512-Aa1748paT82yMtcPGgMq/zDsqZwwGFSYhKrWsO5nv74pShnz/Y4si5ip6GE/6ce/tePBlm2GwyomKp1NFyJgYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/fullcalender/fullcalender.3.10.0.min.css') }}"
        integrity="sha512-Aa1748paT82yMtcPGgMq/zDsqZwwGFSYhKrWsO5nv74pShnz/Y4si5ip6GE/6ce/tePBlm2GwyomKp1NFyJgYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('dar_css')


    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/new/fontawesome/font-awesome.5.14.0.min.css') }}"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    {{-- <script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script> --}}

    <!-- Adding the apex chart -->

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.44.0/apexcharts.min.css"
        integrity="sha512-nnNXPeQKvNOEUd+TrFbofWwHT0ezcZiFU5E/Lv2+JlZCQwQ/ACM33FxPoQ6ZEFNnERrTho8lF0MCEH9DBZ/wWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/apexcharts/css/apexcharts.3.44.0.min.css') }}"
        integrity="sha512-nnNXPeQKvNOEUd+TrFbofWwHT0ezcZiFU5E/Lv2+JlZCQwQ/ACM33FxPoQ6ZEFNnERrTho8lF0MCEH9DBZ/wWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.44.0/apexcharts.min.js"></script> --}}
    <script src="{{ asset('assets/apexcharts/js/apexcharts.3.44.0.min.js') }}"></script>

    <!-- Custom Asset Start -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"> --}}
    {{-- removed datatables --}}
    {{-- <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"> --}}

    <!-- Start::bootstrap-sweet-alert -->
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- end::bootstrap-sweet-alert -->

    <link rel="stylesheet" href="{{ asset('new_assets/assets/css/plugins/flatpickr.min.css') }}">

    {{-- for the document management system --}}

    {{-- for the document management system --}}


    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link href="{{ asset('assets/dist/select2.min.css') }}" rel="stylesheet" />

    <!-- Custom Asset end -->
    {{-- all the assets --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.9/pdfmake.min.js" integrity="sha512-5wC3oH3tojdOtHBV6B4TXjlGc0E2uk3YViSrWnv1VUmmVlQDAs1lcupsqqpwjh8jIuodzADYK5xCL5Dkg/ving==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.9/pdfmake.js" integrity="sha512-cXLS4U14Rm+shV7jwsUiq97QCKtYB9tgsxDncZ5j2Emaye4wi/lYWrEK1472KFFykPdHug7L6NBNzGT8s7U1lA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.9/pdfmake.js.map"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.9/pdfmake.min.js.map"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.9/vfs_fonts.js" integrity="sha512-nNkHPz+lD0Wf0eFGO0ZDxr+lWiFalFutgVeGkPdVgrG4eXDYUnhfEj9Zmg1QkrJFLC0tGs8ZExyU/1mjs4j93w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.9/vfs_fonts.min.js" integrity="sha512-EFlschXPq/G5zunGPRSYqazR1CMKj0cQc8v6eMrQwybxgIbhsfoO5NAMQX3xFDQIbFlViv53o7Hy+yCWw6iZxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.9/fonts/Roboto/Roboto-Italic.ttf"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.9/fonts/Roboto/Roboto-Medium.ttf"></script> --}}
    @stack('third_party_stylesheets')

    @stack('page_css')
    {{-- @stack('dar_css') --}}
    <style>
        .nk-block-title {
            margin-left: 30px;
        }

        #clockInCard,
        #announcementCard {
            transition: opacity 3s;
        }

        .hidden {
            opacity: 0;
            display: none;
        }

        #showButton {
            /* position: fixed;
            top: 10px;
            left: 10px; */
            background-color: green;
            color: white;
            padding: 10px;
            margin-bottom: 5px;
            border: none;
            cursor: pointer;
            display: none;
            border-radius: 100%;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .form-control,
        .custom-select,
        .dataTable-selector,
        .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.575rem 1rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #293240;
            background-color: #ffffff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 6px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {

            .form-control,
            .custom-select,
            .dataTable-selector,
            .dataTable-input {
                transition: none;
            }
        }

        .form-control[type="file"],
        .custom-select[type="file"],
        .dataTable-selector[type="file"],
        .dataTable-input[type="file"] {
            overflow: hidden;
        }

        .form-control[type="file"]:not(:disabled):not([readonly]),
        .custom-select[type="file"]:not(:disabled):not([readonly]),
        .dataTable-selector[type="file"]:not(:disabled):not([readonly]),
        .dataTable-input[type="file"]:not(:disabled):not([readonly]) {
            cursor: pointer;
        }

        .form-control:focus,
        .custom-select:focus,
        .dataTable-selector:focus,
        .dataTable-input:focus {
            color: #293240;
            background-color: #ffffff;
            border-color: #51459d;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(81, 69, 157, 0.25);
        }

        .form-control::-webkit-date-and-time-value,
        .custom-select::-webkit-date-and-time-value,
        .dataTable-selector::-webkit-date-and-time-value,
        .dataTable-input::-webkit-date-and-time-value {
            height: 1.5em;
        }

        .form-control::-moz-placeholder,
        .custom-select::-moz-placeholder,
        .dataTable-selector::-moz-placeholder,
        .dataTable-input::-moz-placeholder {
            color: #6c757d;
            opacity: 1;
        }

        .form-control::placeholder,
        .custom-select::placeholder,
        .dataTable-selector::placeholder,
        .dataTable-input::placeholder {
            color: #6c757d;
            opacity: 1;
        }

        .form-control:disabled,
        .custom-select:disabled,
        .dataTable-selector:disabled,
        .dataTable-input:disabled {
            background-color: #e9ecef;
            opacity: 1;
        }

        .form-control::file-selector-button,
        .custom-select::file-selector-button,
        .dataTable-selector::file-selector-button,
        .dataTable-input::file-selector-button {
            padding: 0.575rem 1rem;
            margin: -0.575rem -1rem;
            -webkit-margin-end: 1rem;
            margin-inline-end: 1rem;
            color: #293240;
            background-color: #f8f9fd;
            pointer-events: none;
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            border-inline-end-width: 1px;
            border-radius: 0;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {

            .form-control::file-selector-button,
            .custom-select::file-selector-button,
            .dataTable-selector::file-selector-button,
            .dataTable-input::file-selector-button {
                transition: none;
            }
        }

        .form-control:hover:not(:disabled):not([readonly])::file-selector-button,
        .custom-select:hover:not(:disabled):not([readonly])::file-selector-button,
        .dataTable-selector:hover:not(:disabled):not([readonly])::file-selector-button,
        .dataTable-input:hover:not(:disabled):not([readonly])::file-selector-button {
            background-color: #ecedf0;
        }

        .dataTable-wrapper.no-header .dataTable-container {
            border-top: 1px solid #d9d9d9;
        }

        .dataTable-wrapper.no-footer .dataTable-container {
            border-bottom: 1px solid #d9d9d9;
        }

        .dataTable-top,
        .dataTable-bottom {
            padding: 8px 10px;
        }

        .dataTable-top>nav:first-child,
        .dataTable-top>div:first-child,
        .dataTable-bottom>nav:first-child,
        .dataTable-bottom>div:first-child {
            float: left;
        }

        .dataTable-top>nav:last-child,
        .dataTable-top>div:last-child,
        .dataTable-bottom>nav:last-child,
        .dataTable-bottom>div:last-child {
            float: right;
        }

        .dataTable-selector {
            padding: 6px;
        }

        .dataTable-input {
            padding: 6px 12px;
        }

        .dataTable-info {
            margin: 7px 0;
        }

        /* PAGER */
        .dataTable-pagination ul {
            margin: 0;
            padding-left: 0;
        }

        .dataTable-pagination li {
            list-style: none;
            float: left;
        }

        .dataTable-pagination a {
            border: 1px solid transparent;
            float: left;
            margin-left: 2px;
            padding: 6px 12px;
            position: relative;
            text-decoration: none;
            color: #333;
        }

        .dataTable-pagination a:hover {
            background-color: #d9d9d9;
        }

        .dataTable-pagination .active a,
        .dataTable-pagination .active a:focus,
        .dataTable-pagination .active a:hover {
            background-color: #d9d9d9;
            cursor: default;
        }

        .dataTable-pagination .ellipsis a,
        .dataTable-pagination .disabled a,
        .dataTable-pagination .disabled a:focus,
        .dataTable-pagination .disabled a:hover {
            cursor: not-allowed;
        }

        .dataTable-pagination .disabled a,
        .dataTable-pagination .disabled a:focus,
        .dataTable-pagination .disabled a:hover {
            cursor: not-allowed;
            opacity: 0.4;
        }

        .dataTable-pagination .pager a {
            font-weight: bold;
        }

        /* TABLE */
        .dataTable-table {
            max-width: 100%;
            width: 100%;
            border-spacing: 0;
            border-collapse: separate;
        }

        .dataTable-table>tbody>tr>td,
        .dataTable-table>tbody>tr>th,
        .dataTable-table>tfoot>tr>td,
        .dataTable-table>tfoot>tr>th,
        .dataTable-table>thead>tr>td,
        .dataTable-table>thead>tr>th {
            vertical-align: top;
            padding: 8px 10px;
        }

        .dataTable-table>thead>tr>th {
            vertical-align: bottom;
            text-align: left;
            border-bottom: 1px solid #d9d9d9;
        }

        .dataTable-table>tfoot>tr>th {
            vertical-align: bottom;
            text-align: left;
            border-top: 1px solid #d9d9d9;
        }

        .dataTable-table th {
            vertical-align: bottom;
            text-align: left;
        }

        .dataTable-table th a {
            text-decoration: none;
            color: inherit;
        }

        .dataTable-sorter {
            display: inline-block;
            height: 100%;
            position: relative;
            width: 100%;
        }

        .dataTable-sorter::before,
        .dataTable-sorter::after {
            content: "";
            height: 0;
            width: 0;
            position: absolute;
            right: 4px;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            opacity: 0.2;
        }

        .dataTable-sorter::before {
            border-top: 4px solid #000;
            bottom: 0px;
        }

        .dataTable-sorter::after {
            border-bottom: 4px solid #000;
            border-top: 4px solid transparent;
            top: 0px;
        }

        .asc .dataTable-sorter::after,
        .desc .dataTable-sorter::before {
            opacity: 0.6;
        }

        .dataTables-empty {
            text-align: center;
        }

        .dataTable-top::after,
        .dataTable-bottom::after {
            clear: both;
            content: " ";
            display: table;
        }

        .dataTable-dropdown label {
            display: flex;
            align-items: center;
            white-space: nowrap;
        }

        .dataTable-dropdown label select.dataTable-selector1 {
            width: 75px;
            margin-right: 10px;
        }

        p,
        h6,
        a {
            font-size: larger !important;
        }

        .loader-demo-box1 {
  position: fixed; /* Change from absolute to fixed for full screen coverage */
  top: 0;
  left: 0;
  width: 100%; /* Full width of the viewport */
  height: 100%; /* Full height of the viewport */
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
  background-color: rgba(255, 255, 255, 0.8); /* Light background color */
}


.btn-outline-primary{
    background: #392C70 !important;
    color: #fff !important;
}
    </style>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script> --}}

{{-- <link rel="stylesheet" href="//cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/new/dataTables/dataTables.min.css') }}">
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
<script src="{{ asset('assets/jquery/jquery-3.7.1.min.js') }}" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
{{-- <script src="//cdn.datatables.net/2.0.5/js/dataTables.min.js"></script> --}}
<script src="{{ asset('assets/js/simple-datatables.js') }}"></script>
{{-- <script>
    let table= new DataTable('#atpdata-table');
</script> --}}

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('sh_assets/vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sh_assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('sh_assets/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('sh_assets/css/style.css') }}?v=1">
    <!-- endinject -->

    {{-- removed datatables --}}
    <!-- for the css datatable -->
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css"> --}}
</head>

<body data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default">
    <!--begin::Theme mode setup on page load-->
    {{-- <body data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default"
    data-kt-app-sidebar-minimize="{{ auth()->user()->hasRole('minister') ||auth()->user()->hasRole('permsec')? 'on': 'off' }}">
    <!--begin::Theme mode setup on page load--> --}}



    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

     {{-- <div class="col-md-4 col-sm-6 grid-margin stretch-card"> --}}
    <div class="loader-demo-box1" id="loader">
        <div class="dot-opacity-loader">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    {{-- </div> --}}
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="container-scroller">

        <!--begin::Header-->
        @if (auth()->check())
            @include('layouts.header')
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_settings-panel.html -->

                <!--begin::Sidebar-->
                @include('layouts.sidebar')
                <!--end::Sidebar-->
                <!--begin::Main-->
                <!--begin::Content wrapper-->
                <!-- main-panel starts -->
                <div class="main-panel">
                    @include('layouts.content')
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    @include('layouts.footer')
                    <!--end::Footer-->
                </div>
        @endif
        <!-- main-panel ends -->
        <!--end:::Main-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::App-->


    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

    <script>
        function hideCards() {
            var clockInCard = document.getElementById("clockInCard");
            var announcementCard = document.getElementById("announcementCard");

            clockInCard.style.opacity = "0";
            announcementCard.style.opacity = "0";

            setTimeout(() => {
                clockInCard.classList.add("hidden");
                announcementCard.classList.add("hidden");
                document.getElementById("showButton").style.display = "block";
            }, 3000);
        }

        function showCards() {
            var clockInCard = document.getElementById("clockInCard");
            var announcementCard = document.getElementById("announcementCard");
            var showButton = document.getElementById("showButton");

            clockInCard.classList.remove("hidden");
            announcementCard.classList.remove("hidden");

            setTimeout(() => {
                clockInCard.style.opacity = "1";
                announcementCard.style.opacity = "1";
                showButton.style.display = "none";
            }, 100); // Adjust the delay if needed
        }
    </script>

{{-- removed datatables --}}
    {{-- <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script> --}}

    <script>
        function clockIn() {
            const currentTime = new Date().toLocaleTimeString();

            const data = {
                employee_id: 123, // Replace with the actual employee ID
                // Add other data fields if required
            };

            $.ajax({
                url: '{{ route('clock-in') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    ...data, // Spread the data object
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Display a success message using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Clocked In Successfully!',
                            text: `You clocked in at ${currentTime}`,
                            showConfirmButton: false,
                        });

                        // Disable the "CLOCK IN" button and change its color to light green
                        document.getElementById("clock_in").disabled = true;
                        document.getElementById("clock_in").classList.remove("btn-success");
                        document.getElementById("clock_in").classList.add("btn-light");
                    } else {
                        console.error('Clock-in request failed.');
                        // Optionally, you can show an error message using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Clocked In Successfully!',
                            text: `You clocked in at ${currentTime}`,
                            showConfirmButton: false,
                        });
                    }
                },
                error: function(error) {
                    // Handle network errors
                    console.error('Network error:', error);
                    // Optionally, you can show an error message using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Clock In Failed',
                        text: 'There was a network error during clock in.',
                    });
                },
            });
        }

        document.getElementById("clock_in").addEventListener("click", clockIn);
    </script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var hostUrl = "asset/";
    </script>

    <!-- Start::bootstrap-sweet-alert -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <!-- end::bootstrap-sweet-alert -->



    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    {{-- <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script> --}}
    <script src="{{ asset('js/events.js') }}"></script>
    {{-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script> --}}
    <script src="{{ asset('assets/amcharts/index.js') }}"></script>
    {{-- <script src="https://cdn.amcharts.com/lib/5/xy.js"></script> --}}
    <script src="{{ asset('assets/amcharts/xy.js') }}"></script>
    {{-- <script src="https://cdn.amcharts.com/lib/5/percent.js"></script> --}}
    <script src="{{ asset('assets/amcharts/percent.js') }}"></script>
    {{-- <script src="https://cdn.amcharts.com/lib/5/radar.js"></script> --}}
    <script src="{{ asset('assets/amcharts/radar.js') }}"></script>
    {{-- <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script> --}}
    <script src="{{ asset('assets/amcharts/Animated.js') }}"></script>
    {{-- <script src="https://cdn.amcharts.com/lib/5/map.js"></script> --}}
    <script src="{{ asset('assets/amcharts/map.js') }}"></script>
    {{-- <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script> --}}
    <script src="{{ asset('assets/amcharts/worldLow.js') }}"></script>
    {{-- <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script> --}}
    <script src="{{ asset('assets/amcharts/continentsLow.js') }}"></script>
    {{-- <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script> --}}
    <script src="{{ asset('assets/amcharts/usaLow.js') }}"></script>
    {{-- <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script> --}}
    <script src="{{ asset('assets/amcharts/worldTimeZonesLow.js') }}"></script>
    {{-- <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script> --}}
    <script src="{{ asset('assets/amcharts/worldTimeZoneAreasLow.js') }}"></script>
    {{-- removed datatables --}}
    {{-- <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script> --}}
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/apps/inbox/listing.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js - Copy/custom/widgets.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script> -->
    <script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    <script src="{{ asset('assets/js/custom/utilities/modals/create-account.js') }}"></script>
    <script src="{{ asset('new_assets/assets/js/plugins/flatpickr.min.js') }}"></script>
    {{-- removed datatables --}}
    {{-- <script src="{{ asset('assets/js/simple-datatables.js') }}"></script> --}}

    <!-- Apex Chart p-->
    <script src="{{ asset('new_assets/assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('new_assets/assets/js/plugins/choices.min.js') }}"></script>
    {{-- <script src="{{asset('new_assets/assets/js/plugins/flatpickr.min.js')}}"></script> --}}
    <script src="{{ asset('new_assets/assets/js/plugins/main.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            /* if ($(".datatable").length > 0) {
                const dataTable =  new simpleDatatables.DataTable(".datatable");
            } */

            //select2();
            //summernote();
            daterange();
            // loadConfirm();
        });


        function daterange() {
            if ($("#pc-daterangepicker-1").length > 0) {
                document.querySelector("#pc-daterangepicker-1").flatpickr({
                    mode: "range"
                });
            }
        }
        $(document).ready(function() {
            if ($(".datatable").length > 0) {
                const dataTable = new simpleDatatables.DataTable(".datatable");
            }
        });
    </script>
    @stack('third_party_scripts')

    @stack('page_scripts')

    <script>
        var botmanWidget = {
            aboutText: 'Start the conversation with hi',
            introMessage: "WELCOME TO  NIWA chatbots",
            title: 'NIWA Chat Bots ',
            mainColor: '#0000FF',
            bubbleBackground: '#0000FF',
            aboutLink: 'niwa.gov.ng'

        };
    </script>

    {{-- <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
 --}}




    <!-- plugins:js -->
    <script src="{{ asset('sh_assets/vendors/js/vendor.bundle.base.js') }}"></script>

    <script src="{{ asset('sh_assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('sh_assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('sh_assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('sh_assets/js/misc.js') }}"></script>
    <script src="{{ asset('sh_assets/js/settings.js') }}"></script>
    <script src="{{ asset('sh_assets/js/todolist.js') }}"></script>
    <script src="{{ asset('sh_assets/js/file-upload.js') }}"></script>


    <script src="{{ asset('sh_assets/js/google-maps.js') }}"></script>
    <!-- End custom js for this page-->
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('sh_assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
    <!-- Custom js for this page-->
    <script src="{{ asset('sh_assets/js/wizard.js') }}"></script>
    <script src="{{ asset('sh_assets/js/chart.js') }}"></script>
    <script src="{{ asset('sh_assets/js/flot-chart.js') }}"></script>
    <script src="{{ asset('sh_assets/js/morris.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="{{ asset('sh_assets/js/data-table.js') }}"></script>
    <!-- Custom Mapeal js for this page-->
    <script src="{{ asset('sh_assets/js/mapeal.js') }}"></script>
    <script src="{{ asset('sh_assets/js/mapeal_example_1.js') }}"></script>
    <script src="{{ asset('sh_assets/js/mapeal_example_2.js') }}"></script>
    <!-- End custom Mapeal js for this page-->

    <script src="{{ asset('jquery-mapael-nigeria/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('jquery-mapael-nigeria/js/raphael-2.2.7.min.js') }}"></script>
    <script src="{{ asset('jquery-mapael-nigeria/js/jquery-mapael-2.1.0.js') }}"></script>
    <script src="{{ asset('jquery-mapael-nigeria/nigeria.js') }}"></script>
    <script src="{{ asset('jquery-mapael-nigeria/scripts/major-city-plots.js') }}"></script>

    <script>
        $('#historyModal').on('hidden.bs.modal', function(e) {
            $('.modal-backdrop').remove();
        });
        $('#uploadsModal').on('hidden.bs.modal', function(e) {
            $('.modal-backdrop').remove();
        });
        $('#commentModal').on('hidden.bs.modal', function(e) {
            $('.modal-backdrop').remove();
        });
        $('#sendEmailModal').on('hidden.bs.modal', function(e) {
            $('.modal-backdrop').remove();
        });
        $('#shareModal').on('hidden.bs.modal', function(e) {
            $('.modal-backdrop').remove();
        });
    </script>

    <!-- for the form repeater  -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script> --}}
    <!-- for the form repeater  -->


    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="body">
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="commonModalOver" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commonModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    @include('partials.admin.footer')

    <script>
document.addEventListener("DOMContentLoaded", function() {
  // DOMContentLoaded event is fired when the initial HTML document has been completely loaded and parsed

  // Get references to the loader elements
  var loaderBox = document.querySelector('.loader-demo-box1');
  var dotLoader = document.querySelector('.dot-opacity-loader');

  // Hide the loader elements
  loaderBox.style.display = 'none';
  dotLoader.style.display = 'none';
});

  </script>
</body>

</html>
