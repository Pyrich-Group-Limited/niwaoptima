<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/media/logos/NIWA-Logo-login.png') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <!--begin::Page bg image-->
    <style>
        body {
            background-image: url('assets/media/auth/Optimized-NIWA-login-img2.jpg');
        }

        [data-bs-theme="dark"] body {
            background-image: url('assets/media/auth/bg4-dark.jpg');
        }

        .text-center {
            font-size: 40px;
        }

        .text-dark {
            font-size: 30px;
        }

        .form-control {
            font-size: 18px;
        }

        .btn {
            font-size: 20px;
        }

        .rmbrme-and-fgtpwd {
            font-size: 18px;
        }
    </style>
    <!--end::Page bg image-->
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
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <!--begin::Aside-->
                <div class="d-flex flex-center flex-lg-start flex-column">
                    <!--begin::Logo-->
                    <a href="{{ route('home') }}" class="mb-7">
                        <img alt="Logo" class="img-fluid" style="max-height: 20vw;" src="{{ asset('assets/media/logos/NIWA-Logo-login.png') }}" />
                    </a>
                    <!--end::Logo-->
                </div>
                <!--begin::Aside-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="flex-center w-lg-50 p-10">
                <div class="my-5 py-5">
                    <span style="color: #02a14d; font-size: 40px" class="text-center"> Welcome to The NIWA EBS</span>
                </div>
                <!--begin::Card-->
                <div class="card shadow rounded-3 w-md-550px">
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-column p-10 p-lg-20 pb-lg-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
                            <!--begin::Form-->
                            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ url('/login') }}" method="post">
                                @csrf
                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <h4 class="text-dark fw-bolder mb-3 fs-1 text ">Sign In</h4>
                                    <!--end::Title-->
                                </div>
                                <!--begin::Heading-->
                                <!--begin::Input group=-->
                                <div class="input-group mb-4">
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control form-control-lg @error('email') is-invalid @enderror">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                    </div>
                                    @error('email')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!--end::Input group=-->
                                <div class="input-group mb-4">
                                    <input type="password" name="password" placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror">
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
                                        <div class="text-success icheck-primary">
                                            <input type="checkbox" id="remember">
                                            <label class="rmbrme-and-fgtpwd" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <!--begin::Link-->
                                    <a href="{{ route('password.request') }}" class="text-success rmbrme-and-fgtpwd">Forgot Password ?</a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Submit button-->
                                <div class="d-grid mb-8">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg" style="background: #02a14d; color: #fff">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Sign In</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
</body>

</html>