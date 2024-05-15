<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> -->
    <script src="{{ asset('public/js/jquery-3.7.0.min.js')}}"></script>
    <!-- Adding the apex chart -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.44.0/apexcharts.min.css"
        integrity="sha512-nnNXPeQKvNOEUd+TrFbofWwHT0ezcZiFU5E/Lv2+JlZCQwQ/ACM33FxPoQ6ZEFNnERrTho8lF0MCEH9DBZ/wWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.44.0/apexcharts.min.js"></script>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}" rel="stylesheet">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- endinject -->
    {{-- <link rel="shortcut icon" href="http://www.urbanui.com/" /> --}}
    @stack('third_party_stylesheets')

    @stack('page_css')
</head>

<body>
  <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            @include('layouts.header')
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                @include('layouts.sidebar')
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    @include('layouts.content')
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    @include('layouts.footer')
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
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
    <script>
        function clockIn() {
            const currentTime = new Date().toLocaleTimeString();

            const data = {
                employee_id: 123, // Replace with the actual employee ID
                // Add other data fields if required
            };

            $.ajax({
                url: '{{route('
                clock - in ')}}',
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
     <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

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
     <script src="{{ asset('assets/js/custom/utilities/modals/create-account.js') }}">
    </script>
    <script src="{{ asset('new_assets/assets/js/plugins/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/simple-datatables.js') }}"></script>

    <!-- Apex Chart p-->
    <script src="{{asset('new_assets/assets/js/plugins/apexcharts.min.js')}}"></script>
    <script src="{{asset('new_assets/assets/js/plugins/choices.min.js')}}"></script>
    <script src="{{asset('new_assets/assets/js/plugins/main.min.js')}}"></script>
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
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>





  <!-- plugins:js -->
  <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('assets/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/js/misc.js')}}"></script>
  <script src="{{asset('assets/js/settings.js')}}"></script>
  <script src="{{asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('assets/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
</body>

</html>
