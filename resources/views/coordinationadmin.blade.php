@extends('layouts.app')
@section('content')
<div class="mx-9 text-center">
    <center><h3 class=" text-uppercase text-center  text-primary-emphasis bold fw-bolder  mb-7">CO-ORDINATINATION DEPARTMENT <b>Overview</b></h3></center>

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
    <div class="row mt-7">
        @include('clokin')
        <button id="showButton" onclick="showCards()">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="12" cy="12" r="10" />
    <line x1="12" y1="8" x2="12" y2="16" />
    <line x1="8" y1="12" x2="16" y2="12" />
</svg>
</button>
        <div class="col-sm-4 mb-3 mt-4  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">TOTAL PROJECTS</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{0}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="warning" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>
        <div class="col-sm-4 mb-3 mt-4  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">TOTAL TASK</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{0}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="warning" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>
        <div class="col-sm-4 mb-3 mt-4  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">TOTAL STAFF</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{0}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="warning" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>


      </div>
    <div class="row mt-7">
        <div class="col-sm-4 mb-3  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">TOTOTAL REGISTERED VENDORS</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{0}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="warning" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>
        <div class="col-sm-4 mb-3  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">TOTAL DEFAULTER</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{0}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="warning" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>
        <div class="col-sm-4 mb-3  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">TOTAL NOTIFICATION</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{20}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="warning" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>


      </div>

      <div class="row mt-6">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">PROJECT STATISTICS </h4>
                <canvas id="pieChart"></canvas>
              </div>
            </div>
        </div>

            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">TASK STATISTICS</h4>
                    <canvas id="areaChart"></canvas>
                  </div>
                </div>
            </div>

      </div>


  </div>

@endsection
