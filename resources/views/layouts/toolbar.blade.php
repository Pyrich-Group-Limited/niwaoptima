<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                 <li class="breadcrumb-item">
                    <span class="text-primary text-hover-primary">
                        {{-- <a href="{{ route($value) }}"
                        class="text-primary text-hover-primary"> Dashboard
                    </a> --}}
                    </span>
                </li>
            </ul>
            <!--begin::Title-->
            {{-- <h4 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">NIWA STAFF
                INTERFACE
            </h4> --}}
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            {{-- <ul class="breadcrumb">
                @yield('breadcrumb')
            </ul> --}}

            {{-- <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1"> --}}
                <!--begin::Item-->
                {{-- <li class="breadcrumb-item">
                    <span class="text-primary text-hover-primary">{{auth()->user()->staff ?auth()->user()->staff->branch->branch_name:'nadcccccccccccc'}} </span>
                </li> --}}
                <!--end::Item-->
                <!--begin::Item-->
                {{-- <li class="breadcrumb-item text-muted">
                    <a href="{{ route('home') }}"
                        class="text-primary text-hover-primary">{{ auth()->user()->staff ? auth()->user()->staff->department->name : 'no department' }}
                    </a>
                </li> --}}
                {{-- <li class="breadcrumb-item text-muted">
                    <a href="{{ route('home') }}"
                        class="text-primary text-hover-primary">{{ auth()->user()->staff ? auth()->user()->staff->branch->branch_name : 'no branch' }}
                    </a>
                </li> --}}


                <!--end::Item-->
                <!--begin::Item-->
                {{-- <li class="breadcrumb-item text-muted">@yield('page_title')</li> --}}
                <!--end::Item-->
            {{-- </ul> --}}
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->
