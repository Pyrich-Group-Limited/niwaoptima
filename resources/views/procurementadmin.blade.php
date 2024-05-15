@extends('layouts.app')
@section('content')

<header class="mb-7">
    <main>
        <div class="container">
            <!--begin::Page title-->
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <!--begin::Title-->

    <!--end::Title-->
  </div>
  <!--end::Page title-->
        </div>

    </main>
</header>
  <div class="mx-4">



{{-- for the cards now --}}
<!--begin::Row-->
<center> <h4 class="text-black-50 text-uppercase mb-4 pt-5">Procurement :<b style="color: #000"> Overview</b></h4></center>
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
<div class="row gy-5 g-xl-10 mt-5">
@include('clokin')
    <!--begin::Col-->

    <div class="col-sm-6 col-xl-6 mb-xl-2">
    <button id="showButton" onclick="showCards()">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10" />
        <line x1="12" y1="8" x2="12" y2="16" />
        <line x1="8" y1="12" x2="16" y2="12" />
    </svg>
</button>
        <!--begin::Card widget 2-->
        <div class="card h-lg-100 bg-light-success">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                <!--begin::Icon-->
                <div class="m-0">
                    <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                    <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor" />
                            <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Icon-->
                <!--begin::Section-->
                <div class="d-flex flex-column my-7">
                    <!--begin::Number-->
                    <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">0</span>
                    <!--end::Number-->
                    <!--begin::Follower-->
                    <div class="m-0">
                        <span class="fw-bold fs-6 	text-success ">No of Current External Contractors</span>
                    </div>
                    <!--end::Follower-->
                </div>
                <!--end::Section-->

            </div>
            <!--end::Body-->
        </div>
        <!--end::Card widget 2-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-sm-6 col-xl-6 mb-xl-2">
        <!--begin::Card widget 2-->
        <div class="card h-lg-100 bg-light">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                <!--begin::Icon-->
                <div class="m-0">
                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra001.svg-->
                    <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M14 3V21H10V3C10 2.4 10.4 2 11 2H13C13.6 2 14 2.4 14 3ZM7 14H5C4.4 14 4 14.4 4 15V21H8V15C8 14.4 7.6 14 7 14Z" fill="currentColor" />
                            <path d="M21 20H20V8C20 7.4 19.6 7 19 7H17C16.4 7 16 7.4 16 8V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Icon-->
                <!--begin::Section-->
                <div class="d-flex flex-column my-7">
                    <!--begin::Number-->
                    <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">0</span>
                    <!--end::Number-->
                    <!--begin::Follower-->
                    <div class="m-0">
                        <span class="fw-bold fs-6 text-success">Total Contract</span>
                    </div>
                    <!--end::Follower-->
                </div>
                <!--end::Section-->

            </div>
            <!--end::Body-->
        </div>
        <!--end::Card widget 2-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-sm-6 col-xl-6 mb-xl-2">
        <!--begin::Card widget 2-->
        <div class="card h-lg-100 bg-light">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                <!--begin::Icon-->
                <div class="m-0">
                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra001.svg-->
                    <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M14 3V21H10V3C10 2.4 10.4 2 11 2H13C13.6 2 14 2.4 14 3ZM7 14H5C4.4 14 4 14.4 4 15V21H8V15C8 14.4 7.6 14 7 14Z" fill="currentColor" />
                            <path d="M21 20H20V8C20 7.4 19.6 7 19 7H17C16.4 7 16 7.4 16 8V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Icon-->
                <!--begin::Section-->
                <div class="d-flex flex-column my-7">
                    <!--begin::Number-->
                    <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">0</span>
                    <!--end::Number-->
                    <!--begin::Follower-->
                    <div class="m-0">
                        <span class="fw-bold fs-6 text-success">Total Approved Vendors</span>
                    </div>
                    <!--end::Follower-->
                </div>
                <!--end::Section-->

            </div>
            <!--end::Body-->
        </div>
        <!--end::Card widget 2-->
    </div>
    <!--end::Col-->


      <!--begin::Col-->
      <div class="col-sm-6 col-xl-6 mb-xl-2">
        <!--begin::Card widget 2-->
        <div class="card h-lg-100 bg-light-success">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                <!--begin::Icon-->
                <div class="m-0">
                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra001.svg-->
                    <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M14 3V21H10V3C10 2.4 10.4 2 11 2H13C13.6 2 14 2.4 14 3ZM7 14H5C4.4 14 4 14.4 4 15V21H8V15C8 14.4 7.6 14 7 14Z" fill="currentColor" />
                            <path d="M21 20H20V8C20 7.4 19.6 7 19 7H17C16.4 7 16 7.4 16 8V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Icon-->
                <!--begin::Section-->
                <div class="d-flex flex-column my-7">
                    <!--begin::Number-->
                    <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">0</span>
                    <!--end::Number-->
                    <!--begin::Follower-->
                    <div class="m-0">
                        <span class="fw-bold fs-6 text-success">No Of Pending Vendors</span>
                    </div>
                    <!--end::Follower-->
                </div>
                <!--end::Section-->

            </div>
            <!--end::Body-->
        </div>
        <!--end::Card widget 2-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->


<!--begin::Row-->
<div class="row gy-5 g-xl-10 pt-2 mb-4">
    <!--begin::Col-->
    <div class="col-sm-6 col-xl-6 mb-xl-2">
        <!--begin::Card widget 2-->
        <div class="card h-lg-100 bg-light">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                <!--begin::Icon-->
                <div class="m-0">
                    <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                    <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor" />
                            <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Icon-->
                <!--begin::Section-->
                <div class="d-flex flex-column my-7">
                    <!--begin::Number-->
                    <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">0</span>
                    <!--end::Number-->
                    <!--begin::Follower-->
                    <div class="m-0">
                        <span class="fw-bold fs-6 text-success">Contract With External Contractors</span>
                    </div>
                    <!--end::Follower-->
                </div>
                <!--end::Section-->

            </div>
            <!--end::Body-->
        </div>
        <!--end::Card widget 2-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-sm-6 col-xl-6 mb-xl-2">
        <!--begin::Card widget 2-->
        <div class="card h-lg-100 bg-light-success">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                <!--begin::Icon-->
                <div class="m-0">
                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra001.svg-->
                    <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M14 3V21H10V3C10 2.4 10.4 2 11 2H13C13.6 2 14 2.4 14 3ZM7 14H5C4.4 14 4 14.4 4 15V21H8V15C8 14.4 7.6 14 7 14Z" fill="currentColor" />
                            <path d="M21 20H20V8C20 7.4 19.6 7 19 7H17C16.4 7 16 7.4 16 8V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Icon-->
                <!--begin::Section-->
                <div class="d-flex flex-column my-7">
                    <!--begin::Number-->
                    <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">0</span>
                    <!--end::Number-->
                    <!--begin::Follower-->
                    <div class="m-0">
                        <span class="fw-bold fs-6 text-success">No of Procurement Staff/Branch</span>
                    </div>
                    <!--end::Follower-->
                </div>
                <!--end::Section-->

            </div>
            <!--end::Body-->
        </div>
        <!--end::Card widget 2-->
    </div>
    <!--end::Col-->




</div>
<!--end::Row-->
</div>
@endsection
