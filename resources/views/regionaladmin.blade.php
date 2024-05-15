@extends('layouts.app')

@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
			
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">

	<!--begin::Container-->
	<div id="kt_content_container" class="container-xxl">
		<!--begin::Navbar-->
		
		<!--end::Navbar-->
		<!--begin::Toolbar-->
		<center><h3 class="fw-bolder">Funds'  Structural Composition
			</h3></center>
			

			<div class="d-flex flex-wrap flex-stack mb-6">
				<!--begin::Title-->
				
			</div>
		
			<!--begin::Row-->		
			<div class="row g-6 g-xl-9">

				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
									<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
									<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
									<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
								</svg>
							</span>
							
							<!--end::Svg Icon-->
							<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totalbranches}}
							
							</div>
							<div class="fw-bold" style="color:green"><b>TOTAL NO. OF BRANCHES </b></div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>


				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
									<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
									<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
									<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
								</svg>
							</span>
							
							<!--end::Svg Icon-->
							<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totalregional}}
							
							</div>
							<div class="fw-bold" style="color:green"><b>TOTAL NO. OF REGIONAL OFFICES</b></div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>


				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
									<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
									<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
									<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
								</svg>
							</span>
							
							<!--end::Svg Icon-->
							<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totaldepartment}}
							
							</div>
							<div class="fw-bold" style="color:green"><b>TOTAL NO OF DEPARTMENTS</b></div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>


				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
									<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
									<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
									<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
								</svg>
							</span>
							
							<!--end::Svg Icon-->
							<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">0
							
							</div>
							<div class="fw-bold" style="color:green"><b>TOTAL NO. OF DRC</b></div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>

				<center><h3 class="fw-bolder">Regional Office Structural Composition
				</h3></center> 
			

			</div>
			<!--begin::Row-->		
			<div class="row g-6 g-xl-9">

				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
									<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
									<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
									<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
								</svg>
							</span>
							
							<!--end::Svg Icon-->
							<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totalbranchinregion}}
							
							</div>
							<div class="fw-bold" style="color:green"><b>TOTAL NO. OF BRANCH IN MY REGION</b></div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>


				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
									<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
									<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
									<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
								</svg>
							</span>
							
							<!--end::Svg Icon-->
							<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totaldepartmentinregion}}
							
							</div>
							<div class="fw-bold" style="color:green"><b>TOTAL NO. OF DEPARTMENT</b></div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>


				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
									<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
									<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
									<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
								</svg>
							</span>
							
							<!--end::Svg Icon-->
							<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totalstaffinregion}}
							
							</div>
							<div class="fw-bold" style="color:green"><b>TOTAL NO. OF STAFF</b></div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>


				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
									<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
									<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
									<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
								</svg>
							</span>
							
							<!--end::Svg Icon-->
							<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totalunitinregion}}
							
							</div>
							<div class="fw-bold" style="color:green"><b>TOTAL NO. OF UNIT</b></div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>

				<center><h3 class="fw-bolder">Branch Office Structural Composition
				</h3></center> 
			

			</div>
			<!--begin::Row-->		
			<div class="row g-6 g-xl-9">

				<div class="col-xl-4">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
									<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
									<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
									<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
								</svg>
							</span>
							
							<!--end::Svg Icon-->
							<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totalemployersinbranch}}
							
							</div>
							<div class="fw-bold" style="color:green"><b>TOTAL NO. OF EMPLOYER</b></div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>


				<div class="col-xl-4">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
									<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
									<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
									<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
								</svg>
							</span>
							
							<!--end::Svg Icon-->
							<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totalcerticateinbranches}}
							
							</div>
							<div class="fw-bold" style="color:green"><b>TOTAL NO. OF CERTIFICATE ISSUED</b></div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>


				<div class="col-xl-4">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
									<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
									<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
									<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
								</svg>
							</span>
							
							<!--end::Svg Icon-->
							<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">0
							
							</div>
							<div class="fw-bold" style="color:green"><b>CLAIMS NOTIFICATION</b></div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>


				

			

			</div>
	
	
	

{{-- the end of parent Tag --}}
		</div>
</div>
</div>

@endsection