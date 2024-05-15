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
        <h4 class="text-black-50 pt-5">Actualrial Planning and Resource Development:<b style="color: #000"> Overview</b></h4>
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
    <div id="kt_app_content_container" class="app-container container-xxl">
      <!--begin::Row-->
      <div class="row g-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-6 mb-md-5 mb-xl-10">
          <!--begin::Row-->
          <div class="row g-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-md-6 col-xl-6 mb-xxl-10">
              <!--begin::Card widget 8-->
              <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                  <!--begin::Statistics-->
                  <div class="mb-4 px-9">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center mb-2">
                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">45</span>
                      <!--begin::Value-->
                     
                      <!--end::Value-->
                      <!--begin::Label-->
                   
                      <!--end::Label-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-gray-400">Total Contributions</span>
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
                      <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">3</span>
                      <!--end::Amount-->
                      <!--begin::Badge-->
          
                      <!--end::Badge-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Subtitle-->
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Contribution From Public Sector</span>
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
              <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                  <!--begin::Statistics-->
                  <div class="mb-4 px-9">
                    <!--begin::Statistics-->
                    <div class="d-flex align-items-center mb-2">
                      <!--begin::Value-->
                      <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">473</span>
                      <!--end::Value-->
                      <!--begin::Label-->
                      <!--  -->
                      <!--end::Label-->
                    </div>
                    <!--end::Statistics-->
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-gray-400">Contribution from Private Sector</span>
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
                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">458</span>
                    <!--end::Amount-->
                    <!--begin::Subtitle-->
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Expenditure</span>
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
					<span class="card-label fw-bold fs-3 mb-1">Contribution Per Month</span>
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
					<span class="card-label fw-bold fs-3 mb-1">EXPENDITURE</span>
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