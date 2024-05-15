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
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/font-awesome/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}" rel="stylesheet" type="text/css" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>

</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Theme mode setup on page load-->
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
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid flex-lg-row justify-content-center align-items-center h-100">
            <!--begin::Body-->
            <div class="card cardy w-md-550px">
                <!-- <div class="my-5 py-5">
                    <span style="color: #02a14d; font-size: 40px" class="text-center"> Welcome to The NIWA EBS</span>
                </div> -->
                <!--begin::Card-->
                <div class="card shadow rounded-3 w-md-450px">
                    <!--begin::Card body-->
                    <div class="card-body ">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-center flex-column-fluid">
                            <!--begin::Form-->
                            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                                action="{{ url('/login') }}" method="post">
                                @csrf
                                <!--begin::logo-->
                                <div class="text-center mb-11">
                                    <a href="{{ route('home') }}">
                                        <span class="app-brand-logo demo">
                                            <img src="{{ asset('assets/media/logos/logo-light.png') }}"
                                                style="width:100px;">
                                        </span>

                                    </a>
                                </div>
                                <!--end::logo-->

                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <h5 class="fw-bolder mb-3 fs-3 text"
                                        style="text-align:center; font-weight:bold; line-height:1.4;">National Inland
                                        WaterWays Authority Enterprise Business Suite (EBS)</h5>
                                    <!--end::Title-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group=-->
                                <div class="input-group mb-4">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        placeholder="Email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                    </div>
                                    @error('email')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!--end::Input group=-->
                                <div class="input-group mb-4">
                                    <input type="password" name="password" placeholder="Password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror

                                </div>
                                <!--end::Input group=-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                    <div class="col-6">
                                        <div class="text-blue icheck-primary">
                                            <input type="checkbox" id="remember">
                                            <label class="rmbrme-and-fgtpwd" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <!--begin::Link-->
                                    <a href="{{ route('password.request') }}" class="text-blue rmbrme-and-fgtpwd">Forgot
                                        Password ?</a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Submit button-->
                                <div class="d-grid mb-5">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg"
                                        style="background: #0d02a1; color: #fff">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Sign In</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        <!--end::Indicator progress-->
                                    </button>
                                </div>
                                <!--end::Submit button-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!-- Dots Images -->
                <div class="dots-top-left">
                    <div class="dots-img"></div>
                </div>
                <div class="dots-bottom-right">
                    <div class="dots-img-down-svg"></div>
                </div>
            </div>
            <!-- End Dots Images -->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const emailInput = document.getElementById('email');
            const email = emailInput.value;

            // Check if the email ends with "@niwa.com"
            if (!email.endsWith('@niwa.com')) {
                e.preventDefault(); // Prevent form submission
                alert('Only email addresses with @niwa.com domain are allowed.');
            }
        });
    </script>
</body>

</html>
