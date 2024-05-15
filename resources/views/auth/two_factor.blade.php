<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />


    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link rel="stylesheet" href="{{ asset('sh_assets/vendors/iconfonts/font-awesome/css/all.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('sh_assets/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('sh_assets/vendors/css/vendor.bundle.addons.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('sh_assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/NIWA-Logo-login.png') }}" />


    <style>
        input {
            font-size: large !important;
        }

        .btn-check:checked+.btn.btn-primary,
        .btn-check:active+.btn.btn-primary,
        .btn.btn-primary:focus:not(.btn-active),
        .btn.btn-primary:hover:not(.btn-active),
        .btn.btn-primary:active:not(.btn-active),
        .btn.btn-primary.active,
        .btn.btn-primary.show,
        .show>.btn.btn-primary {
            background-color: #59A766 !important;
            color: #ffffff;
        }

        .font {
            font-size: large !important;
        }

        label {
            font-size: large !important;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/media/logos/logo-light.png') }}" style="width:100px;">
                            </div>
                            <h3>National Inland WaterWays Authority Staff InterFace</h3>
                            {{-- <h4 class="card-title">Welcome back!</h4> --}}
                            <h6 class="font-weight-light">Happy to see you again!</h6>
                            <form class="pt-3" action="{{ route('verify.store') }}" method="post">
                                @csrf

                                @php
                                    if (!isset($token)) {
                                        $token = \Request::route('token');
                                    }
                                @endphp
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group">
                                    <label for="exampleInputEmail">Two Factor Code</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="fa fa-user text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="two_factor_code" id="two_factor_code" name="two_factor_code"
                                            placeholder="Two Factor Code" class="form-control form-control-lg border-left-0"
                                            id="exampleInputEmail" placeholder="Two Factor Code">
                                    </div>
                                    @error('two_factor_code')
                                        <span class="error invalid-feedback">{{ $errors->first('two_factor_code') }}</span>
                                    @enderror
                                </div>

                                <div class="my-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        type="submit">Submit</button>
                                </div>
                                {{-- <div class="mb-2 d-flex">
                                    <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                                        <i class="fab fa-facebook-f mr-2"></i>Facebook
                                    </button>
                                    <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                                        <i class="fab fa-google mr-2"></i>Google
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="register-2.html" class="text-primary">Create</a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end font">Copyright
                            &copy;
                            2024 All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('sh_assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('sh_assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('sh_assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('sh_assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('sh_assets/js/misc.js') }}"></script>
    <script src="{{ asset('sh_assets/js/settings.js') }}"></script>
    <script src="{{ asset('sh_assets/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
    <!-- endinject -->
    <script>
        /* document.querySelector('form').addEventListener('submit', function(e) {
                                const emailInput = document.getElementById('email');
                                const email = emailInput.value;

                                // Check if the email ends with "@niwa.com"
                                if (!email.endsWith('@niwa.com')) {
                                    e.preventDefault(); // Prevent form submission
                                    alert('Only email addresses with @niwa.com domain are allowed.');
                                }
                            }); */
    </script>
</body>

</html>
