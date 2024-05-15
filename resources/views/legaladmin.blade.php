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
				<h4 class="text-black-50 pt-5"> LEGAL  :<b style="color: #000">Overview</b></h4>
				<!--end::Title-->
			</div>
			<!--end::Page title-->
		</div>
		<!--end::Toolbar container-->
	</div>
	<!--end::Toolbar-->
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content flex-column-fluid">
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
		<div class="row gy-5 g-xl-10">
			<!--begin::Col-->
			<div class="col-sm-6 col-xl-4 mb-xl-10">
				<!--begin::Card widget 2-->

				<!--end::Card widget 2-->
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-sm-6 col-xl-4 mb-xl-10">
				<!--begin::Card widget 2-->

				<!--end::Card widget 2-->
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-sm-6 col-xl-4 mb-xl-10">
				<!--begin::Card widget 2-->

				<!--end::Card widget 2-->
			</div>
			<!--end::Col-->
		</div>
		<!--end::Row-->

		<!--begin::Row-->
		<div class="row g-5 g-xl-8">
		@include('clokin')
			<!--begin::Col-->
			<div class="col-xl-4">
			<button id="showButton" onclick="showCards()">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10" />
        <line x1="12" y1="8" x2="12" y2="16" />
        <line x1="8" y1="12" x2="16" y2="12" />
    </svg>
</button>
				<!--begin::Mixed Widget 2-->
				<div class="shadow card card-xl-stretch mb-xl-8">
					<!--begin::Header-->
					<div class="card-header border-0 bg-dark py-5">
						<h3 class="card-title fw-bold text-white">Employers</h3>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body p-0">
						<!--begin::Chart-->
						<div class="mixed-widget-2-chart card-rounded-bottom bg-dark" data-kt-color="info" style="height: 200px"></div>
						<!--end::Chart-->
						<!--begin::Stats-->
						<div class="card-p mt-n20 position-relative">
							<!--begin::Row-->
							<div class="row g-0">
								<!--begin::Col-->
								<div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
									<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
									<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
											<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
											<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
											<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<a href="#" class="text-warning fw-semibold fs-6">Total: {{$totalemployers}}</a>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
									<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
									<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
											<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<a href="#" class="text-primary fw-semibold fs-6">Defaulter: 0</a>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->

						</div>
						<!--end::Stats-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Mixed Widget 2-->
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-4">
				<!--begin::Mixed Widget 2-->
				<div class="shadow card card-xl-stretch mb-xl-8">
					<!--begin::Header-->
					<div class="card-header border-0 bg-white py-5">
						<h3 class="card-title fw-bold text-dark">Litigations</h3>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body p-0">
						<!--begin::Chart-->
						<div class="mixed-widget-2-chart card-rounded-bottom bg-white" data-kt-color="white" style="height: 200px"></div>
						<!--end::Chart-->
						<!--begin::Stats-->
						<div class="card-p mt-n20 position-relative">
							<!--begin::Row-->
							<div class="row g-0">
								<!--begin::Col-->
								<div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
									<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
									<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
											<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
											<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
											<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<a href="#" class="text-warning fw-semibold fs-6">Pending: 0</a>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
									<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
									<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
											<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<a href="#" class="text-primary fw-semibold fs-6">Resolved: 0</a>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->

						</div>
						<!--end::Stats-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Mixed Widget 2-->
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-4">
				<!--begin::Mixed Widget 2-->
				<div class="shadow card card-xl-stretch mb-5 mb-xl-8">
					<!--begin::Header-->
					<div class="card-header border-0 bg-primary py-5">
						<h3 class="card-title fw-bold text-white">Memo/Notification </h3>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body p-0">
						<!--begin::Chart-->
						<div class="mixed-widget-2-chart card-rounded-bottom bg-primary" data-kt-color="primary" style="height: 200px"></div>
						<!--end::Chart-->
						<!--begin::Stats-->
						<div class="card-p mt-n20 position-relative">
							<!--begin::Row-->
							<div class="row g-0">
								<!--begin::Col-->
								<div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
									<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
									<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
											<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
											<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
											<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<a href="#" class="text-warning fw-semibold fs-6">New: 0</a>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col bg-light-primary px-4 py-8 rounded-2 mb-7">
									<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
									<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
											<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<a href="#" class="text-primary fw-semibold fs-6">Adviced: 0</a>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->

						</div>
						<!--end::Stats-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Mixed Widget 2-->
			</div>
			<!--end::Col-->


		<!--end::Row-->


        <div class="col-xl-12">
<div class="card card-flush">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Currency-->
                {{-- <span class="fs-4 fw-bold text-gray-400 me-1 align-self-start">$</span> --}}
                <!--end::Currency-->
                <!--begin::Amount-->
                {{-- <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">69,700</span> --}}
                <!--end::Amount-->
                <!--begin::Badge-->
                <span class="badge badge-success fs-base">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                {{-- <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->2.2%</span> --}}
                <!--end::Badge-->
            </div>
            <!--end::Info-->
            <!--begin::Subtitle-->
            <span class="text-gray-400 pt-1 fw-bold fs-6">Total No of Employers</span>
            <!--end::Subtitle-->
        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->
    <!--begin::Card body-->
    <div class="card-body pt-2 pb-4 d-flex align-items-center">
        <!--begin::Chart-->
        <div class="d-flex flex-center me-5 pt-2">
            <div id="kt_card_widget_4_chart" style="min-width: 50%; min-height: 70px" data-kt-size="70" data-kt-line="11"></div>
        </div>
        <!--end::Chart-->
        <!--begin::Labels-->
        <div class="d-flex flex-column content-justify-center w-100">
            <!--begin::Label-->
            <div class="d-flex fs-6 fw-bold align-items-center">
                <!--begin::Bullet-->
                <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                <!--end::Bullet-->
                <!--begin::Label-->
                <div class="text-gray-500 flex-grow-1 me-4">Defaulters</div>
                <!--end::Label-->
                <!--begin::Stats-->
                <div class="fw-boldest text-gray-700 text-xxl-end">0%</div>
                <!--end::Stats-->
            </div>
            <!--end::Label-->
            <!--begin::Label-->
            <div class="d-flex fs-6 fw-bold align-items-center my-3">
                <!--begin::Bullet-->
                <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                <!--end::Bullet-->
                <!--begin::Label-->
                <div class="text-gray-500 flex-grow-1 me-4">Complied Employers</div>
                <!--end::Label-->
                <!--begin::Stats-->
                <div class="fw-boldest text-gray-700 text-xxl-end">0%</div>
                <!--end::Stats-->
            </div>
            <!--end::Label-->
            <!--begin::Label-->
            <div class="d-flex fs-6 fw-bold align-items-center">
                <!--begin::Bullet-->
                <div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #E4E6EF"></div>
                <!--end::Bullet-->
                <!--begin::Label-->
                <div class="text-gray-500 flex-grow-1 me-4">Total</div>
                <!--end::Label-->
                <!--begin::Stats-->
                <div class="fw-boldest text-gray-700 text-xxl-end">0%</div>
                <!--end::Stats-->
            </div>
            <!--end::Label-->
        </div>
        <!--end::Labels-->
    </div>
    <!--end::Card body-->
</div>
        </div>



			<!--begin::Col-->
			<div class="col-xl-12 mb-5 mb-xl-5">
				<!--begin::Chart widget 4-->
				<div class="card card-flush overflow-hidden h-md-100">
					<!--begin::Header-->
					<div class="card-header py-5">
						<!--begin::Title-->
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bold text-dark">Litigations</span>
							<span class="text-gray-400 mt-1 fw-semibold fs-6">Total number of Litigation per Month</span>
						</h3>
						<!--end::Title-->
						<!--begin::Toolbar-->

						<!--end::Toolbar-->
					</div>
					<!--end::Header-->
					<!--begin::Card body-->
					<div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
						<!--begin::Chart-->
						<div id="kt_charts_widget_32_chart_1" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
						<!--end::Chart-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Chart widget 4-->
			</div>
			<!--end::Col-->
		</div>
		<!--end::Row-->
		<!--begin::Row-->
		<div class="row g-5 g-xl-8">
			<!--begin::Col-->
			<div class="col-xl-6">
				<!--begin::Mixed Widget 12-->

				<!--end::Mixed Widget 12-->
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
				<!--begin::Mixed Widget 12-->

				<!--end::Mixed Widget 12-->
			</div>
			<!--end::Col-->
		</div>
		<!--end::Row-->
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->

@endsection
