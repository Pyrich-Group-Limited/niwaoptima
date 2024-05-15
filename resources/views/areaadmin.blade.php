@extends('layouts.app')

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">

            <center>
                <h3 class="fw-bolder">AREA MANAGER
                </h3>
            </center>
            <!--begin::Toolbar-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 justify-content-end">
                <div class="col-4">
                    <div class="row">
                        <div class="col-3">
                            {!! Form::label('', 'Filter By', ['class'=>'form-label mt-2']) !!}
                        </div>
                        <div class="col-3">
                           {!! Form::select('branch_id', $branch->pluck('branch_name','id'), null, ['class'=>' form-select']) !!}
                        </div>

                        <div class="col-3">
                            <select class="form-select" id="monthSelect">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-select" id="yearSelect">
                                @php
                                    $currentYear = date('Y');
                                    $startYear = $currentYear - 10; // Adjust as needed
                                    $endYear = $currentYear + 10; // Adjust as needed
                                @endphp
                                @for ($year = $startYear; $year <= $endYear; $year++)
                                    <option value="{{ $year }}" {{ $year == $currentYear ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            {{-- where the card start from --}}
            <div class="row grid-margin">
                <div class="col-12">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                                <div class="statistics-item">
                                    {{-- <p>
                                                  <i class="icon-sm fa fa-user mr-2"></i>
                                                  New users
                                                </p> --}}
                                    <h2>Total Revenue</h2>
                                    <label class="badge badge-outline-success badge-pill">0</label>
                                </div>
                                <div class="statistics-item">
                                    {{-- <p>
                                                  <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                                                  Avg Time
                                                </p> --}}
                                    <h2>Total Budget</h2>
                                    <label class="badge badge-outline-danger badge-pill">0</label>
                                </div>
                                <div class="statistics-item">
                                    {{-- <p>
                                                  <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                                  Downloads
                                                </p> --}}
                                    <h2>Total Customers Registered</h2>
                                    <label class="badge badge-outline-success badge-pill">12</label>
                                </div>
                                <div class="statistics-item">
                                    {{-- <p>
                                                  <i class="icon-sm fas fa-check-circle mr-2"></i>
                                                  Update
                                                </p> --}}
                                    <h2> Registered Vessels With us</h2>
                                    <label class="badge badge-outline-success badge-pill">57</label>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row gy-5 g-xl-10">




            </div>

            <!--begin::Toolbar-->

            <!--begin::Row-->
            <div class="row g-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xxl-6 mb-md-5 mb-xl-10">
                    <div class="row g-5 g-xl-10">
                        <div class="col-md-6 col-xl-6 mb-xxl-10">
                            <!--begin::Card widget 8-->
                            <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                    <!--begin::Statistics-->
                                    <div class="mb-4 px-9">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Currency-->
                                            <span class="fs-4 fw-bold text-gray-400 align-self-start me-1&gt;"></span>
                                            <!--end::Currency-->
                                            <!--begin::Value-->

                                            <span
                                                class="fs-2hx fw-bolder text-gray-800 me-2 lh-1">{{ $totaldept }}</span>
                                            <!--end::Value-->
                                            <!--begin::Label-->

                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Description-->
                                        <span class="fs-6 fw-bold text-gray-400">Total Department </span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Chart-->
                                    <div id="kt_card_widget_8_chart" class="min-h-auto" style="height: 125px"></div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 8-->
                            <!--begin::Card widget 5-->
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Amount-->
                                            <span
                                                class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $allstaff }}</span>
                                            <!--end::Amount-->
                                            <!--begin::Badge-->

                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-bold fs-6">
                                            Total Number of Certified Inspection</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">


                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 5-->
                        </div>
                        <div class="col-md-6 col-xl-6 mb-xxl-10">
                            <!--begin::Card widget 9-->
                            <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                    <!--begin::Statistics-->
                                    <div class="mb-4 px-9">
                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Value-->
                                            <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1">0</span>
                                            <!--end::Value-->
                                            <!--begin::Label-->

                                            <!--end::Label-->
                                        </div>
                                        <!--end::Statistics-->
                                        <!--begin::Description-->
                                        <span class="fs-6 fw-bold text-gray-400">
                                            Total No of Certificate Issued</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Chart-->
                                    <div id="kt_card_widget_9_chart" class="min-h-auto" style="height: 125px"></div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 9-->
                            <!--begin::Card widget 7-->
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">

                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">0</span>
                                        <!--end::Amount-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-bold fs-6">
                                            Number Of Licences Issued</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->

                            </div>
                            <!--end::Card widget 7-->
                        </div>
                    </div>
                </div>



                <div class="col-xl-6">
                    <!--begin::Chart widget 15-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Statistics Of Certificate Issued</span>
                                <!-- <span class="text-gray-400 pt-2 fw-bold fs-6">per Year</span> -->
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                    data-kt-menu-overflow="true">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4"
                                                fill="currentColor" />
                                            <rect x="11" y="11" width="2.6" height="2.6" rx="1.3"
                                                fill="currentColor" />
                                            <rect x="15" y="11" width="2.6" height="2.6" rx="1.3"
                                                fill="currentColor" />
                                            <rect x="7" y="11" width="2.6" height="2.6" rx="1.3"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-100px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Remove</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Mute</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                                <!--end::Menu-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Chart container-->
                            <div id="kt_charts_widget_15_chart" class="min-h-auto ps-4 pe-6 mb-3 h-350px"></div>
                            <!--end::Chart container-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Chart widget 15-->
                </div>
            @endsection
