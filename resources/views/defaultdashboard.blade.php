<div class="row g-5 g-xl-8 pt-5">
    <h4 class="text-black-50 pt-5"> Performance Analytics{{--  for <b style="color: #000">Registration Unit</b> --}}</h4>
    <div class="col-xl-3">
        <!--begin::Statistics Widget 3-->
        <div class="card mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">REGISTERED EMPLOYERS</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
                        </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span
                            class="symbol-label fs-5 fw-bold bg-light-success text-success">{{ $registered_employers }}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="success"
                    style="height: 50px"></div>

            </div>
            <!--end::Body-->
        </div>
        <!--end::Body-->
    </div>

    <div class="col-xl-3">
        <!--begin::Statistics Widget 3-->
        <div class="card mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">PENDING EMPLOYERS</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
                        </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span
                            class="symbol-label fs-5 fw-bold bg-light-success text-success">{{ $pending_employers }}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="success"
                    style="height: 50px"></div>

            </div>
            <!--end::Body-->
        </div>
        <!--end::Body-->
    </div>

    <div class="col-xl-3">
        <!--begin::Statistics Widget 3-->
        <div class="card mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">REGISTERED EMPLOYEES</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
                        </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span
                            class="symbol-label fs-5 fw-bold bg-light-success text-success">{{ $registered_employees }}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="success"
                    style="height: 50px"></div>

            </div>
            <!--end::Body-->
        </div>
        <!--end::Body-->
    </div>

    <div class="col-xl-3">
        <!--begin::Statistics Widget 3-->
        <div class="card mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">INCOMPLETE EMPLOYEES</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
                        </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span
                            class="symbol-label fs-5 fw-bold bg-light-success text-success">{{ $pending_employees }}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="success"
                    style="height: 50px"></div>

            </div>
            <!--end::Body-->
        </div>
        <!--end::Statistics Widget 3-->
    </div>
</div>
<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user();
?>

<!--end::Row-->

<!--begin::Row-->
<div class="row g-5 g-xl-8 pt-5">
    <h4 class="text-black-50 pt-5">Performance Analytics for <b
            style="color: #000">{{ $user->first_name . ' ' . $user->last_name }}</b></h4>
    <div class="col-xl-3">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                            fill="currentColor" />
                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">{{ $registered_employers }}</div>
                <div class="fw-semibold text-gray-400">REGISTERED EMPLOYERS</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>

    <div class="col-xl-3">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                            d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                            fill="currentColor" />
                        <path
                            d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                            fill="currentColor" />
                        <path
                            d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{ $pending_employers }}</div>
                <div class="fw-semibold text-gray-100">PENDING EMPLOYERS</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col-xl-3">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                            d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                            fill="currentColor" />
                        <path
                            d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-white fw-bold fs-2 mb-2 mt-5">{{ $registered_employees }}</div>
                <div class="fw-semibold text-white">REGISTERED EMPLOYEES</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col-xl-3">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                            d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z"
                            fill="currentColor" />
                        <path
                            d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-white fw-bold fs-2 mb-2 mt-5">{{ $pending_employees }}</div>
                <div class="fw-semibold text-white">INCOMPLETE EMPLOYEES</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
</div>
<!--end::Row-->

<!--begin::Row-->
<div class="row g-5 g-xl-8 pt-5">
    <h4 class="text-black-50 pt-5">INVENTORY <b style="color: #000"></b></h4>
    <div class="col-xl-3">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                            fill="currentColor" />
                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">0</div>
                <div class="fw-semibold text-gray-400">Number of Drivers on Site</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>

    <div class="col-xl-3">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                            d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                            fill="currentColor" />
                        <path
                            d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                            fill="currentColor" />
                        <path
                            d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">0</div>
                <div class="fw-semibold text-gray-100">Number Of Cleaners on duty</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col-xl-3">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                            d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                            fill="currentColor" />
                        <path
                            d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-white fw-bold fs-2 mb-2 mt-5">0</div>
                <div class="fw-semibold text-white">Number Of Stationaries</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col-xl-3">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                            d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z"
                            fill="currentColor" />
                        <path
                            d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="text-white fw-bold fs-2 mb-2 mt-5">0</div>
                <div class="fw-semibold text-white">Number Of Visitors Today</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
</div>
<!--end::Row-->

</div>


<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Tables Widget 12-->
        {{-- <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">REGISTRATION SHORTCUT</span>
                    <!-- <span class="text-muted mt-1 fw-semibold fs-7">Over 500 new members</span> -->
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!-- Tabs navs -->
                <ul class="nav nav-tabs" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ex2-tab-1" data-bS-toggle="tab" href="#ex2-tabs-1" role="tab" aria-controls="ex2-tabs-1" aria-selected="true">REGISTERED EMPLOYERS</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex2-tab-2" data-bs-toggle="tab" href="#ex2-tabs-2" role="tab" aria-controls="ex2-tabs-2" aria-selected="false">PENDING EMPLOYERS</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex2-tab-3" data-bs-toggle="tab" href="#ex2-tabs-3" role="tab" aria-controls="ex2-tabs-3" aria-selected="false">REGISTERED EMPLOYEES</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex2-tab-4" data-bs-toggle="tab" href="#ex2-tabs-4" role="tab" aria-controls="ex2-tabs-4" aria-selected="false">INCOMPLETE EMPLOYEES</a>
                    </li>
                </ul>
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content" id="ex2-content">
                    <div class="tab-pane fade show active" id="ex2-tabs-1" role="tabpanel" aria-labelledby="ex2-tab-1">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-muted bg-light">
                                        <th class="ps-4 min-w-200px rounded-start">ECS Number</th>
                                        <th class="min-w-200px">Company Name</th>
                                        <th class="min-w-200px">Company Email</th>
                                        <th class="min-w-200px">Business Area</th>
                                        <th class="min-w-200px text-end rounded-end">ACTIONS</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            {{ $item->ecs_number }}
                                        </td>
                                        <td>
                                            {{ $item->company_name }}
                                        </td>
                                        <td>
                                            {{ $item->company_email }}
                                        </td>
                                        <td>
                                            {{ $item->business_area }}
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('employers.show', [$item->id]) }}" class='btn btn-default btn-xs'>
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{ route('employer.employees', [$item->id]) }}" class='btn btn-default btn-xs'>
                                                <i class="far fa-user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <div class="card-footer clearfix">
                                <div class="float-right">
                                    @include('adminlte-templates::common.paginate', [
                                    'records' => $data,
                                    ])
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <div class="tab-pane fade" id="ex2-tabs-2" role="tabpanel" aria-labelledby="ex2-tab-2">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bold text-muted bg-light">
                                            <th class="ps-4 min-w-200px rounded-start">REGISTERED EMPLOYERS</th>
                                            <th class="min-w-200px">PENDING EMPLOYERS</th>
                                            <th class="min-w-200px">REGISTERED EMPLOYEES</th>
                                            <th class="min-w-200px">INCOMPLETE EMPLOYEES</th>
                                            <th class="min-w-200px text-end rounded-end">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$8,000,000</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Pending</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$5,400</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Paid</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                                    Design</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                                    Design</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                                                <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <div class="tab-pane fade" id="ex2-tabs-3" role="tabpanel" aria-labelledby="ex2-tab-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bold text-muted bg-light">
                                            <th class="ps-4 min-w-200px rounded-start">REGISTERED EMPLOYERS</th>
                                            <th class="min-w-200px">PENDING EMPLOYERS</th>
                                            <th class="min-w-200px">REGISTERED EMPLOYEES</th>
                                            <th class="min-w-200px">INCOMPLETE EMPLOYEES</th>
                                            <th class="min-w-200px text-end rounded-end">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$8,000,000</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Pending</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$5,400</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Paid</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                                    Design</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                                    Design</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                                                <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <div class="tab-pane fade" id="ex2-tabs-4" role="tabpanel" aria-labelledby="ex2-tab-4">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bold text-muted bg-light">
                                            <th class="ps-4 min-w-200px rounded-start">REGISTERED EMPLOYERS</th>
                                            <th class="min-w-200px">PENDING EMPLOYERS</th>
                                            <th class="min-w-200px">REGISTERED EMPLOYEES</th>
                                            <th class="min-w-200px">INCOMPLETE EMPLOYEES</th>
                                            <th class="min-w-200px text-end rounded-end">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$8,000,000</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Pending</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$5,400</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Paid</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                                    Design</span>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                                    Design</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                                                <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                    </div>
                    <!-- Tabs content -->
                </div>
                <!-- Tabs content -->
            </div>
            <!--begin::Body-->
        </div> --}}
        <!--end::Tables Widget 12-->
    </div>
