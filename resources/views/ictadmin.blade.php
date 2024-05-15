@extends('layouts.app')

@section('content')
<div class="mx-7">
    <center><h2 class="text-center fw-bolder text-success">ICT DEPARTMENT <b class="text-black text-active-warningg">overview</b></h2></center>

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
            <div class="card-body bg-success">
              <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">

                  <div class="statistics-item ">
                    <p>
                      <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                      TOTAL NUMBER OF ICT STAFF
                    </p>
                    <h2>30</h2>
                    {{-- <label class="badge badge-outline-dark badge-pill">30</label> --}}
                  </div>
                  <div class="statistics-item">
                    <p>
                      <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                      TOTAL NUMBER OF STAFF WITH WORK TOOLS
                    </p>
                    <h2>3500</h2>
                    {{-- <label class="badge badge-outline-success badge-pill">12% increase</label> --}}
                  </div>
                  <div class="statistics-item">
                    <p>
                      <i class="icon-sm fas fa-check-circle mr-2"></i>
                      NUMBER OF STAFF WITH WORKTOOLS BUT NOT FUNCTIONAL
                    </p>
                    <h2>7</h2>
                    {{-- <label class="badge badge-outline-success badge-pill">57% increase</label> --}}
                  </div>
                  <div class="statistics-item">
                    <p>
                      <i class="icon-sm fas fa-chart-line mr-2"></i>
                     OTHER ICT EQUIPMENT
                    </p>
                    <h2>9</h2>
                    {{-- <label class="badge badge-outline-success badge-pill">10% increase</label> --}}
                  </div>
                  <div class="statistics-item">
                    <p>
                      <i class="icon-sm fas fa-circle-notch mr-2"></i>
                     TOTAL NUMBER OF NEW SYSTEM
                    </p>
                    <h2>7500</h2>
                    {{-- <label class="badge badge-outline-danger badge-pill">16% decrease</label> --}}
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- first row end -->
      <!-- second row start row end -->
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">
                <i class="fas fa-gift"></i>
                ANNUAL PERFORMANCE OF THE DEPARTMENT
              </h4>
              <canvas id="orders-chart"></canvas>
              <div id="orders-chart-legend" class="orders-chart-legend"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                <i class="fas fa-chart-line"></i>
               ANNUAL PERFORMANCE OF SYSTEM IN THE FUND
              </h4>
              <h2 class="mb-5">56000 <span class="text-muted h4 font-weight-normal"></span></h2>
              <canvas id="sales-chart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!--second row end -->
</div>

@endsection
