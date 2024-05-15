@extends('layouts.app')

@section('content')

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
  <!--begin::Toolbar-->
  <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
      <!--begin::Page title-->
      <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <!--begin::Title-->
        <h4 class="text-black-50 pt-5">PORTS AND ENVIRONMENT SERVICES:<b style="color: #000"> Overview</b></h4>
        <!--end::Title-->
    </div>
    <!--end::Page title-->
</div>
<!--end::Toolbar container-->
</div>
<!--end::Toolbar-->
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="mx-7">
        <!--begin::Row-->
        <center><h1 class=" pt-5 text-center mb-7 text-primary">PORTS AND ENVIRONMENT SERVICES:<b class="text-uppercase" style="color: #000"> Overview</b></h1></center>
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
        <div class="row g-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-6 mb-md-5 mb-xl-10">
          <!--begin::Row-->
          <div class="row g-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-md-6 col-xl-6 mb-xxl-10">
              <!--begin::Card widget 8-->
              <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10 bg-primary">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                  <!--begin::Statistics-->
                  <div class="mb-4 px-9">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center mb-2">
                    <span class="fs-2hx fw-bold text-white me-2 lh-1">0</span>
                      <!--begin::Value-->

                      <!--end::Value-->
                      <!--begin::Label-->

                      <!--end::Label-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-light-success">NUMBER OF PORTS</span>
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
              <div class="card card-flush h-md-50 mb-xl-10 bg-primary">
                <!--begin::Header-->
                <div class="card-header pt-5">
                  <!--begin::Title-->
                  <div class="card-title d-flex flex-column">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center">
                      <!--begin::Amount-->
                      <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">0</span>
                      <!--end::Amount-->
                      <!--begin::Badge-->

                      <!--end::Badge-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Subtitle-->
                    <span class="text-light-success pt-1 fw-semibold fs-6">NOT REGISTERED VESSELS</span>
                    <!--end::Subtitle-->
                  </div>
                  <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end pt-0">
                  <!--begin::Progress-->

                  <!--end::Progress-->
                </div>
                <!--end::Card body-->
              </div>
              <!--end::Card widget 5-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 col-xl-6 mb-xxl-10">
              <!--begin::Card widget 9-->
              <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10 bg-primary">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                  <!--begin::Statistics-->
                  <div class="mb-4 px-9">
                    <!--begin::Statistics-->
                    <div class="d-flex align-items-center mb-2">
                      <!--begin::Value-->
                      <span class="fs-2hx fw-bold text-white me-2 lh-1">0</span>
                      <!--end::Value-->
                      <!--begin::Label-->
                      <!--  -->
                      <!--end::Label-->
                    </div>
                    <!--end::Statistics-->
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-light-success">BERTHIN SERVICES</span>
                    <!--end::Description-->
                  </div>
                  <!--end::Statistics-->
                  <!--begin::Chart-->
                  <div id="kt_card_widget_9_chart" class="min-h-auto " style="height: 125px"></div>
                  <!--end::Chart-->
                </div>
                <!--end::Card body-->
              </div>
              <!--end::Card widget 9-->
              <!--begin::Card widget 7-->
              <div class="card card-flush h-md-50 mb-xl-10 bg-primary">
                <!--begin::Header-->
                <div class="card-header pt-5">
                  <!--begin::Title-->
                  <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">0</span>
                    <!--end::Amount-->
                    <!--begin::Subtitle-->
                    <span class="text-light-success pt-1 fw-semibold fs-6">NUMBER OF PILOTS</span>
                    <!--end::Subtitle-->
                  </div>
                  <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->

                <!--end::Card body-->
              </div>
              <!--end::Card widget 7-->
            </div>
            <!--end::Col-->
          </div>
          <!--end::Row-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Charts Widget 5-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1 text-center">VESSELS STATUS</span>
					<!-- <span class="text-muted fw-semibold fs-7">More than 500 new customers</span> -->
				</h3>
				<!--begin::Toolbar-->
				<div class="card-toolbar" data-kt-buttons="true" data-kt-initialized="1">
					<a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 me-1" id="kt_charts_widget_5_year_btn">Year</a>
					<a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 me-1" id="kt_charts_widget_5_month_btn">Month</a>
					<!-- <a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 active" id="kt_charts_widget_5_week_btn">Week</a> -->
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<!--begin::Chart-->
				<div id="kt_charts_widget_3_chart" style="height: 350px"></div>
				<!--end::Chart-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Charts Widget 5-->
	</div>
        <!--end::Col-->
      </div>
      <!--end::Row-->


      <!--begin::Row-->
      <div class="row">
        <!--begin::Col-->
        <div class="col-xl-12">
		<!--begin::Charts Widget 5-->
		<div class="card card-xl-stretch mb-xl-8">
			<!--begin::Header-->
			<div class="card-header border-0 pt-5">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bold fs-3 mb-1">BERTHIN SERVICES YTD</span>
					<!-- <span class="text-muted fw-semibold fs-7">More than 500 new customers</span> -->
				</h3>
				<!--begin::Toolbar-->
				<div class="card-toolbar" data-kt-buttons="true" data-kt-initialized="1">
					<a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 me-1" id="kt_charts_widget_5_year_btn">Year</a>
					<a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 me-1" id="kt_charts_widget_5_month_btn">Month</a>
					<!-- <a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 active" id="kt_charts_widget_5_week_btn">Week</a> -->
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<!--begin::Chart-->
				<div id="kt_charts_widget_18_chart" style="height: 350px"></div>
				<!--end::Chart-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Charts Widget 5-->
	</div>
        <!--end::Col-->
      </div>
          </div>
          <!--end::Maps widget 1-->
        </div>
        <!--end::Col-->

        <!-- Event Modal -->
        <!--begin::Modal - New Card-->

        <!--end::Modal - New Card-->

      </div>


      <!-- Begin::Row -->

      <!-- End::Row -->
    </div>
    <!--end::Content container-->
  </div>
  <!--end::Content-->
</div>
<!--end::Content wrapper-->

@endsection


@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@endpush
