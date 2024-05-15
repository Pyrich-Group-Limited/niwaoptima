@extends('layouts.app')

@section('content')

<div class="container-fluid">
  {{-- Start::Sweet-alert --}}
  @include('flash::message')
  {{-- end::Sweet-alert --}}
  <!--begin::Row-->
  <h4 class="text-black-50 pt-5">Marine: <b style="color: #000">Overview</b></h4>
  @include('clokin')
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
  <div class="row g-5 g-xl-8 pt-5">
    <div class="col-xl-12">
    <button id="showButton" onclick="showCards()">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10" />
        <line x1="12" y1="8" x2="12" y2="16" />
        <line x1="8" y1="12" x2="16" y2="12" />
    </svg>
</button>
      <div class="row">
        <div class="col-xl-4">
          <a href="#" class="card shadow bg-success hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
              <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
                  <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
                </svg>
              </span>
              <div class="text-white fw-bold fs-2 mb-2 mt-5">{{$diseaseclaims}}</div>
              <div class="fw-semibold text-white">PERMANENT DISABILITY & INJURY</div>
            </div>
            <!--end::Body-->
          </a>
          <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-4">
          <!--begin::Statistics Widget 5-->
          <a href="#" class="card shadow bg-white hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
              <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
              <span class="svg-icon svg-icon-dark svg-icon-3x ms-n1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
                  <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
                  <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
                  <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
              <div class="text-dark fw-bold fs-2 mb-2 mt-5">{{$deathclaims}}</div>
              <div class="fw-semibold text-dark">Claims (Death)</div>
            </div>
            <!--end::Body-->
          </a>
          <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-4">
          <!--begin::Statistics Widget 5-->
          <a href="#" class="card shadow bg-dark hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
              <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
              <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.3" d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z" fill="currentColor" />
                  <path d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
              <div class="text-white fw-bold fs-2 mb-2 mt-5">{{$registered_employees}}</div>
              <div class="fw-semibold text-white">RETIRIES NOTIFICATION</div>
            </div>
            <!--end::Body-->
          </a>
          <!--end::Statistics Widget 5-->
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-xl-8">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card shadow bg-body hoverable card-xl-stretch mb-xl-8">
          <!--begin::Body-->
          <div class="card-body">


            <!--begin::Chart widget 18-->
            <div class="card shadow card-flush h-xl-100">
              <!--begin::Header-->
              <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                  <span class="card-label fw-bolder text-gray-800">Monthly Notifications Analytics</span>
                  <span class="text-gray-400 mt-1 fw-bold fs-6">Hours per course</span>
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                  <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                  <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4">
                    <!--begin::Display range-->
                    <div class="text-gray-600 fw-bolder">Loading date range...</div>
                    <!--end::Display range-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <span class="svg-icon svg-icon-1 ms-2 me-0">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                        <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                        <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                      </svg>
                    </span>
                    <!--end::Svg Icon-->
                  </div>
                  <!--end::Daterangepicker-->
                </div>
                <!--end::Toolbar-->
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body d-flex align-items-end px-0 pt-3 pb-5">
                <!--begin::Chart-->
                <div id="kt_charts_widget_100_chart" class="h-325px w-100 min-h-auto ps-4 pe-6"></div>
                <!--end::Chart-->
              </div>
              <!--end: Card shadow Body-->
            </div>
            <!--end::Chart widget 18-->

          </div>
          <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
      </div>
      <div class="col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card shadow bg-white hoverable card-xl-stretch mb-xl-8">
          <!--begin::Body-->
          <div class="card-body">
            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
            <span class="svg-icon svg-icon-dark-100 svg-icon-3x ms-n1">
              <svg width="54" height="54" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor" />
                <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor" />
                <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor" />
              </svg>
            </span>

            <!--end::Svg Icon-->
            <!-- <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{$pending_employers}}</div> -->
            <hr />
            <div class="fw-semibold ">REHABILITATION CASE</div>

            <div class="progress">
              <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                60%
              </div>

            </div>

          </div>
          <!--end::Body-->
        </a>

        <div class="card shadow card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">TOTAL COMPENSATION AMOUNT PAID</h5>
                <!-- <span class="h2 font-weight-bold mb-0">2,356</span> -->
              </div>
              <div class="col-auto">
                <div class="icon icon-shape  text-white rounded-circle shadow">
                  <i class="fas fa-chart-pie" style="font-size:25px;color:green"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
              <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
              <span class="text-nowrap">Since last week</span>
            </p>
            <hr />
            <div class="fw-semibold ">PROSTHESIS CASE</div>
            <div class="progress">
              <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                60%
              </div>

            </div>

          </div>

          <div class="card-body">


            <!--end::Svg Icon-->
            <!-- <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{$pending_employers}}</div> -->
            <hr />
            <div class="fw-semibold ">AVERAGE TURNAROUND TIME</div>

            <div class="progress">
              <div class="progress-bar bg-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                60%
              </div>

            </div>
            <!--end::Statistics Widget 5-->
          </div>

        </div>

        <!--end::Row-->
      </div>


      <div class="row">
        <div class="col-xl-4">
          <!--begin::Statistics Widget 3-->
          <div class="card shadow mb-xl-8">


            <div class="card shadow card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">PENDING CLAIMS</h5>
                    <span class="h2 font-weight-bold mb-0">{{$pendingclaims}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape text-white rounded-circle shadow">
                      <i class="fas fa-chart-bar" style="font-size:25px;color:purple"></i>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <div class="card shadow card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">APPROVED CLAIMS</h5>
                  <span class="h2 font-weight-bold mb-0">{{$approvedclaims}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape  text-white rounded-circle shadow">
                    <i class="fas fa-chart-pie" style="font-size:25px;color:green"></i>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-6">
          <div class="card shadow card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">DISCONTINUED CLAIMS</h5>
                  <span class="h2 font-weight-bold mb-0">0</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape  text-white rounded-circle shadow">
                    <i class="fas fa-chart-pie" style="font-size:25px;color:green"></i>
                  </div>
                </div>
              </div>
              <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p> -->
            </div>
          </div>
        </div>








        <div id="kt_app_content" class="app-content flex-column-fluid">
          <!--begin::Content container-->
          <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Tables Widget 12-->
            <div class="card shadow mb-5 mb-xl-8">
              <!--begin::Header-->

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

              <!--begin::Body-->
            </div>
            <!--end::Tables Widget 12-->
          </div>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
          <script>
            var xValues = ["Italy", "France", "Spain", "USA", "Argentina", "Health", "Staffs", "Argentina", "Health", "Staffs"];
            var yValues = [55, 49, 44, 24, 25, 45, 35, 25, 45, 35];
            var barColors = ["red", "green", "blue", "orange", "brown", "goldenrod", "purple", "brown", "goldenrod", "purple", ];

            new Chart("imyChart", {
              type: "bar",
              data: {
                labels: xValues,
                datasets: [{
                  backgroundColor: barColors,
                  data: yValues
                }]
              },
              options: {
                legend: {
                  display: false
                },
                title: {
                  display: true,
                  text: "World Wine Production 2018"
                }
              }
            });
          </script>
          <script>
            var xValues = ["Approved", "Denied", "Review"];
            var yValues = [55, 49, 44, 24, 15];
            var barColors = [
              "#b91d47",
              "#00aba9",
              "#2b5797"
            ];

            new Chart("myChart", {
              type: "doughnut",
              data: {
                labels: xValues,
                datasets: [{
                  backgroundColor: barColors,
                  data: yValues
                }]
              },
              options: {
                title: {
                  display: true,
                  text: "Claim Status:"
                }
              }
            });
          </script>
        </div>
        @endsection
