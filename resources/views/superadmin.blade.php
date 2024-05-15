@extends('layouts.app')

<style>
    body {
        font-family: sans-serif;
        font-size: 14px;
    }

    .container {
        border: 1px solid #a0a0a0;
        border-radius: 4px;
        padding: 16px;
        margin: 30px auto;
        width: 800px;
    }

    #map-area {
        width: 504px;
        margin: 0 auto;
    }
</style>

@section('content')
    <!--begin::Content wrapper-->
    <!-- partial -->
    <div class="content-wrapper">
        {{-- <center> --}}
        <h1 class="uppercase bold mb-5">Super Admin Dashboard</h1>
        {{-- </center> --}}

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
        <!--begin::Row-->
        <div class="row gy-5 g-xl-10 mb-4 mt-5">
            @include('clokin')
            <button id="showButton" onclick="showCards()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="16" />
                    <line x1="8" y1="12" x2="16" y2="12" />
                </svg>
            </button>

            <!--end::Col-->
        </div>
        <!--end::Row-->

        <div class="row">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Active Projects</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class=" ml-1 mb-0">Updated: 9:10am</small>
                                    </div>
                                </div>

                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-chart-pie text-info icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Completion Rate</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class="ml-1 mb-0">Updated: 05:42pm</small>
                                    </div>

                                </div>

                            </div>
                            <div class="d-inline-block">
                                {{-- <i class="fas fa-shopping-cart text-danger icon-lg"></i> --}}
                                <span class="m-3 badge badge-outline-success badge-pill">0% increase</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Total Revenue</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class=" ml-1 mb-0">Updated: 9:10am</small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-chart-pie text-info icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Total Expenses</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class="ml-1 mb-0">Updated: 05:42pm</small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-shopping-cart text-danger icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Net Profit</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class=" ml-1 mb-0">Updated: 9:10am</small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-chart-pie text-info icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Profit Margin Percentage</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <label class="badge badge-outline-danger badge-pill">0% decrease</label>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class="ml-1 mb-0">Updated: 05:42pm</small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-shopping-cart text-danger icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Overall Budget Utilization Percentage</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <label class="badge badge-outline-danger badge-pill">0% decrease</label>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class=" ml-1 mb-0">Updated: 9:10am</small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-chart-pie text-info icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Variances in Key Budget Categories</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class="ml-1 mb-0">Updated: 05:42pm</small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-shopping-cart text-danger icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-4 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs048.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                        fill="currentColor" />
                                    <path
                                        d="M8.70001 6C8.10001 5.7 7.39999 5.40001 6.79999 5.10001C7.79999 4.00001 8.90001 3 10.1 2.2C10.7 2.1 11.4 2 12 2C12.7 2 13.3 2.1 13.9 2.2C12 3.2 10.2 4.5 8.70001 6ZM12 8.39999C13.9 6.59999 16.2 5.30001 18.7 4.60001C18.1 4.00001 17.4 3.6 16.7 3.2C14.4 4.1 12.2 5.40001 10.5 7.10001C11 7.50001 11.5 7.89999 12 8.39999ZM7 20C7 20.2 7 20.4 7 20.6C6.2 20.1 5.49999 19.6 4.89999 19C4.59999 18 4.00001 17.2 3.20001 16.6C2.80001 15.8 2.49999 15 2.29999 14.1C4.99999 14.7 7 17.1 7 20ZM10.6 9.89999C8.70001 8.09999 6.39999 6.9 3.79999 6.3C3.39999 6.9 2.99999 7.5 2.79999 8.2C5.39999 8.6 7.7 9.80001 9.5 11.6C9.8 10.9 10.2 10.4 10.6 9.89999ZM2.20001 10.1C2.10001 10.7 2 11.4 2 12C2 12 2 12 2 12.1C4.3 12.4 6.40001 13.7 7.60001 15.6C7.80001 14.8 8.09999 14.1 8.39999 13.4C6.89999 11.6 4.70001 10.4 2.20001 10.1ZM11 20C11 14 15.4 9.00001 21.2 8.10001C20.9 7.40001 20.6 6.8 20.2 6.2C13.8 7.5 9 13.1 9 19.9C9 20.4 9.00001 21 9.10001 21.5C9.80001 21.7 10.5 21.8 11.2 21.9C11.1 21.3 11 20.7 11 20ZM19.1 19C19.4 18 20 17.2 20.8 16.6C21.2 15.8 21.5 15 21.7 14.1C19 14.7 16.9 17.1 16.9 20C16.9 20.2 16.9 20.4 16.9 20.6C17.8 20.2 18.5 19.6 19.1 19ZM15 20C15 15.9 18.1 12.6 22 12.1C22 12.1 22 12.1 22 12C22 11.3 21.9 10.7 21.8 10.1C16.8 10.7 13 14.9 13 20C13 20.7 13.1 21.3 13.2 21.9C13.9 21.8 14.5 21.7 15.2 21.5C15.1 21 15 20.5 15 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="h2 mb-0">0</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="card-title">Revenue From Certificate</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        {{-- <!--begin::Badge-->
							<span class="badge badge-light-danger fs-base">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
								<span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
										<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->0.47%</span>
							<!--end::Badge--> --}}
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-4 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <!--begin::Svg Icon | path: icons/duotune/maps/map002.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.7 4.19995L4 6.30005V18.8999L8.7 16.8V19L3.1 21.5C2.6 21.7 2 21.4 2 20.8V6C2 5.4 2.3 4.89995 2.9 4.69995L8.7 2.09998V4.19995Z"
                                        fill="currentColor" />
                                    <path
                                        d="M15.3 19.8L20 17.6999V5.09992L15.3 7.19989V4.99994L20.9 2.49994C21.4 2.29994 22 2.59989 22 3.19989V17.9999C22 18.5999 21.7 19.1 21.1 19.3L15.3 21.8998V19.8Z"
                                        fill="currentColor" />
                                    <path opacity="0.3" d="M15.3 7.19995L20 5.09998V17.7L15.3 19.8V7.19995Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M8.70001 4.19995V2L15.4 5V7.19995L8.70001 4.19995ZM8.70001 16.8V19L15.4 22V19.8L8.70001 16.8Z"
                                        fill="currentColor" />
                                    <path opacity="0.3" d="M8.7 16.8L4 18.8999V6.30005L8.7 4.19995V16.8Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="h2 mb-0">0</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="card-title">Revenue From ECS</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        {{-- <!--begin::Badge-->
							<span class="badge badge-light-success fs-base">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
								<span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
										<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->2.1%</span>
							<!--end::Badge--> --}}
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-4 mb-5 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs037.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M2.10001 10C3.00001 5.6 6.69998 2.3 11.2 2L8.79999 4.39999L11.1 7C9.60001 7.3 8.30001 8.19999 7.60001 9.59999L4.5 12.4L2.10001 10ZM19.3 11.5L16.4 14C15.7 15.5 14.4 16.6 12.7 16.9L15 19.5L12.6 21.9C17.1 21.6 20.8 18.2 21.7 13.9L19.3 11.5Z"
                                        fill="currentColor" />
                                    <path
                                        d="M13.8 2.09998C18.2 2.99998 21.5 6.69998 21.8 11.2L19.4 8.79997L16.8 11C16.5 9.39998 15.5 8.09998 14 7.39998L11.4 4.39998L13.8 2.09998ZM12.3 19.4L9.69998 16.4C8.29998 15.7 7.3 14.4 7 12.8L4.39999 15.1L2 12.7C2.3 17.2 5.7 20.9 10 21.8L12.3 19.4Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="h2 mb-0">0</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="card-title">Staff Emolument </span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        {{-- <!--begin::Badge-->
							<span class="badge badge-light-danger fs-base">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
								<span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
										<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->0.647%</span>
							<!--end::Badge--> --}}
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                <button class="btn btn-social-icon btn-facebook btn-rounded">
                                    <i class="fas fa-user"></i>
                                </button>
                                <div class="ml-4">
                                    <h5 class="mb-0">Total Officers</h5>
                                    <p class="mb-0">0</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                <button class="btn btn-social-icon btn-twitter btn-rounded">
                                    <i class="fa fa-building"></i>
                                </button>
                                <div class="ml-4">
                                    <h5 class="mb-0">Total Departments</h5>
                                    <p class="mb-0">0</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                <button class="btn btn-social-icon btn-google btn-rounded">
                                    <i class="fas fa-user"></i>
                                </button>
                                <div class="ml-4">
                                    <h5 class="mb-0">Total Clients</h5>
                                    <p class="mb-0">0</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-social-icon btn-linkedin btn-rounded">
                                    <i class="fas fa-fighter-jet"></i>
                                </button>
                                <div class="ml-4">
                                    <h5 class="mb-0">Total Private Jets</h5>
                                    <p class="mb-0">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row grid-margin">
            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fa fa-table mr-2"></i>
                                    Desk Utilization
                                </p>
                                <h6>Total Desks: 0</h6>
                                <h6>Used Desks: 0</h6>
                                <label class="badge badge-outline-success badge-pill">Remaining Desks: 1000</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fa fa-computer mr-2"></i>
                                    Computer Utilization
                                </p>
                                <h6>Total Computers: 0</h6>
                                <h6>Used Computers: 0</h6>
                                <label class="badge badge-outline-success badge-pill">Remaining Computers: 1000</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                    Main Facility Utilization Metrics
                                </p>
                                <h6>Condition: Good</h6>
                                <label class="badge badge-outline-success badge-pill">Usage: 0%</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                    Second Facility Utilization Metrics
                                </p>
                                <h6>Structure Condition: Good</h6>
                                <label class="badge badge-outline-success badge-pill">Usage: 0%</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="chartjs-size-monitor"
                            style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <h4 class="card-title">
                            <i class="fas fa-gift"></i>
                            Client Distribution Chart
                        </h4>
                        <canvas id="orders-chart" width="681" height="340"
                            style="display: block; height: 272px; width: 545px;" class="chartjs-render-monitor"></canvas>
                        <div id="orders-chart-legend" class="orders-chart-legend">
                            <ul class="legend0">
                                <li><span class="legend-label" style="background-color:#392c70"></span>Registered</li>
                                <li><span class="legend-label" style="background-color:#d1cede"></span>Active</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="chartjs-size-monitor"
                            style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <h4 class="card-title">
                            <i class="fas fa-chart-line"></i>
                            Debt Analysis
                        </h4>
                        <h2 class="mb-5">0<span class="text-muted h4 font-weight-normal">debtors</span></h2>
                        <canvas id="sales-chart" width="681" height="340"
                            style="display: block; height: 272px; width: 545px;" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">
                            <i class="fas fa-chart-pie"></i>
                            Project Distribution
                        </h4>
                        <h2 class="mb-5">0<span class="text-muted h4 font-weight-normal">Total Projects</span></h2>
                        <div class="flex-grow-1 d-flex flex-column justify-content-between">
                            <div class="chartjs-size-monitor"
                                style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="sales-status-chart" class="mt-3 chartjs-render-monitor" width="425"
                                height="212" style="display: block; height: 170px; width: 340px;"></canvas>
                            <div class="pt-4">
                                <div id="sales-status-chart-legend" class="sales-status-chart-legend">
                                    <ul class="legend2">
                                        <li><span class="legend-label"
                                                style="background-color:#392c70"></span>Completed<label
                                                class="badge badge-light badge-pill legend-percentage ml-auto">75%</label>
                                        </li>
                                        <li><span class="legend-label" style="background-color:#04b76b"></span>In
                                            Progress<label
                                                class="badge badge-light badge-pill legend-percentage ml-auto">25%</label>
                                        </li>
                                        <li><span class="legend-label" style="background-color:#ff5e6d"></span>On
                                            Hold<label
                                                class="badge badge-light badge-pill legend-percentage ml-auto">15%</label>
                                        </li>
                                        <li><span class="legend-label"
                                                style="background-color:#eeeeee"></span>Cancelled<label
                                                class="badge badge-light badge-pill legend-percentage ml-auto">10%</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">
                            <i class="fas fa-tachometer-alt"></i>
                            Document Distribution Overview
                        </h4>
                        <p class="card-description">Document Distribution Overview per month</p>
                        <div class="flex-grow-1 d-flex flex-column justify-content-between">
                            <div class="chartjs-size-monitor"
                                style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="daily-sales-chart" class="mt-3 mb-3 mb-md-0 chartjs-render-monitor"
                                width="425" height="212"
                                style="display: block; height: 170px; width: 340px;"></canvas>
                            <div id="daily-sales-chart-legend" class="daily-sales-chart-legend pt-4 border-top">
                                <ul class="legend3">
                                    <li><span class="legend-label" style="background-color:#392c70"></span>Standard
                                        Operating Procedures (SOPs)</li>
                                    <li><span class="legend-label" style="background-color:#04b76b"></span>Environmental
                                        Impact Assessments (EIAs)</li>
                                    <li><span class="legend-label" style="background-color:#e9e8ef"></span>Project Reports
                                    </li>
                                    <li><span class="legend-label" style="background-color:#ff5e6d"></span>Other Document
                                        Types</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Total Files</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class=" ml-1 mb-0">Updated: 9:10am</small>
                                    </div>
                                </div>

                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-chart-pie text-info icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Total Files</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class="ml-1 mb-0">Updated: 05:42pm</small>
                                    </div>
                                </div>

                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-shopping-cart text-danger icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Locations</h4>
                        <div class="container">
                            <div class="mapcontainer mapeal-example-1">
                                <div id="map-area">
                                    <div class="map">
                                        <span>Alternative content for the map</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Example 2</h4>
                        <div class="container">
                            <div class="mapcontainer mapeal-example-2 bg-blue">
                                <div class="map">
                                    <span>Alternative content for the map</span>
                                </div>
                                <div class="ml-auto">
                                    <div class="population float-left mr-5">
                                        <span>Alternative content for the legend</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>


        <div class="row grid-margin">
            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fa fa-user mr-2"></i>
                                    Number Of Employee
                                </p>
                                <h2>{{ $staff }}</h2>
                                <label class="badge badge-outline-success badge-pill">0% increase</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                                    Staff On Leave
                                </p>
                                <h2>0</h2>
                                <label class="badge badge-outline-success badge-pill">0% decrease</label>
                            </div>
                            {{-- <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                    Average Time to Hire
                                </p>
                                <h2>0 hour</h2>
                                <label class="badge badge-outline-success badge-pill">0% increase</label>
                            </div> --}}
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-check-circle mr-2"></i>
                                    Training Completed

                                </p>
                                <h2>0</h2>
                                <label class="badge badge-outline-success badge-pill">0% increase</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-chart-line mr-2"></i>
                                    Employee Satisfaction Score
                                </p>
                                <h2>0%</h2>
                                <label class="badge badge-outline-success badge-pill">0% increase</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-circle-notch mr-2"></i>
                                    Top Training Programs
                                </p>
                                <h2>0</h2>
                                <label class="badge badge-outline-danger badge-pill">0% decrease</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">STAFF ON LEAVE</h4>

                        <div class="row">
                            <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                <table id="sortable-table-1" class="table">
                                    <thead>
                                        <tr>
                                            <th class="sortStyle">Employee ID<i class="fa fa-angle-down"></i></th>
                                            <th class="sortStyle">First Name<i class="fa fa-angle-down"></i></th>
                                            <th class="sortStyle">Last Name<i class="fa fa-angle-down"></i></th>
                                            <th class="sortStyle">Date of Departure<i class="fa fa-angle-down"></i></th>
                                            <th class="sortStyle">Reason<i class="fa fa-angle-down"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Sulaiman</td>
                                            <td>Ajishape</td>
                                            <td>12/12/2023</td>
                                            <td>Travel</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Thrent</td>
                                            <td>David</td>
                                            <td>01/12/2023</td>
                                            <td>Child Birth</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Samuel</td>
                                            <td>Andrew</td>
                                            <td>29/09/2023</td>
                                            <td>Education</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>James</td>
                                            <td>Alex</td>
                                            <td>24/12/2022</td>
                                            <td>Travel</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!--end::Content wrapper-->
@endsection
<script>
    let table = new DataTable('sortable-table-1');
    let tablee = new DataTable('table table-bordered');
</script>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@endpush
