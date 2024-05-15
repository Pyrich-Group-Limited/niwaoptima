@extends('layouts.app')

@section('content')
    <!--begin::Content wrapper-->
    <!-- partial -->
    <div class="content-wrapper">
        {{-- <center> --}}
            <h1 class="uppercase  bold mb-3">Human Resources Department</h1>
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

        <div class="row  grid-margin">
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
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">STAFF ON LEAVE</h4>
                        {{-- <p class="page-description">Add class <code></code></p> --}}
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
