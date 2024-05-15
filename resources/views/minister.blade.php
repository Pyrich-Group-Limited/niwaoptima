@extends('layouts.app')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							
						</div>
						<!--end::Toolbar-->
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
								<!--end::Toolbar-->
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
												<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$branchtotal}}
												
												</div>
												<div class="fw-bold" style="color:green"><b>TOTAL NO. OF BRANCH OFFICES</b></div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>

                                    <div class="col-xl-3" >
										<!--begin::Statistics Widget 5-->
										<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
											<!--begin::Body-->
											<div class="card-body" data-toggle="modal" data-target="#exampleModalCenterxxRO">
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
												<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$regiontotal}}</div>
												<div class="fw-bold " style="color:green"><b>TOTAL NO. OF REGIONAL OFFICES</b></div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>

                                    <div class="col-xl-3">
										<!--begin::Statistics Widget 5-->
										<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
											<!--begin::Body-->
											<div class="card-body" data-toggle="modal" data-target="#exampleModalCenterxxDEP">
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
												<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$departmenttotal}}</div>
												<div class="fw-bold" style="color:green"><b>TOTAL NO. OF DEPARTMENTS</b></div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>
                                    <div class="col-xl-3">
										<!--begin::Statistics Widget 5-->
										<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
											<!--begin::Body-->
											<div class="card-body"  data-toggle="modal" data-target="#exampleModalCenterxxdigreg">
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
												<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">20</div>

												<div class="fw-bold " style="color:green"><strong>Digital Registration Centers</strong></div>

											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>
                                   <center><h3 class="fw-bolder">Financial Analysis
									</h3></center> 
									<div class="row g-5 g-xl-8 pt-5">

									<div class="col-sm-6 col-xl-4"  data-toggle="modal" data-target="#exampleModalCenterxxrevecs">
        <!--begin: Statistics Widget 6-->
        <div class="card  shadow bg-light-success card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body my-3">
                <span class="float-end">
                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">Revenue from ECS</div>
                </span>
                <a href="#" class="card-title fw-bold text-success fs-5 mb-3 d-block">ECS</a>

                <div class="py-1">
                    <span class="text-dark fs-1 fw-bold me-2">{{$revenuefromecs}}</span>
                    <!-- <span class="fw-semibold text-muted fs-7">Avarage</span> -->
                </div>
                <div class="progress h-7px bg-success bg-opacity-50 mt-7">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <!--end:: Body-->
        </div>
        <!--end: Statistics Widget 6-->
    </div>
    <div class="col-sm-6 col-xl-4" data-toggle="modal" data-target="#exampleModalCenterxxrevcerts">
        <!--begin: Statistics Widget 6-->
        <div class="card  shadow bg-light-warning card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body my-3">
                <span class="float-end">
                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Revenue from Certificate</div>
                </span>
                <a href="#" class="card-title fw-bold text-warning fs-5 mb-3 d-block">Certs</a>
                <div class="py-1">
                    <span class="text-white fs-1 fw-bold me-2">{{$revenuefromcertificate}}</span>
                    <!-- <span class="fw-semibold text-muted fs-7">Average</span> -->
                </div>
                <div class="progress h-7px bg-white bg-opacity-50 mt-7">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <!--end:: Body-->
        </div>
        <!--end: Statistics Widget 6-->
    </div>
    <div class="col-sm-6 col-xl-4">
        <!--begin: Statistics Widget 6-->
        <div class="card  shadow bg-light-primary card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body my-3">
                <span class="float-end">
                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">Revenue from Registration</div>
                </span>
                <a href="#" class="card-title fw-bold text-primary fs-5 mb-3 d-block">New</a>
                <div class="py-1">
                    <span class="text-dark fs-1 fw-bold me-2">{{$revenuefromregistration}}</span>
                    <!-- <span class="fw-semibold text-muted fs-7">High Compared to existing</span> -->
                </div>
                <div class="progress h-7px bg-secondary bg-opacity-50 mt-7">
                    <div class="progress-bar bg-secondry" role="progressbar" style="width: 76%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <!--end:: Body-->
        </div>
        <!--end: Statistics Widget 6-->
    </div>
</div>
<!--end::Row-->

    <div class="col-sm-6 col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card shadow bg-body hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor"></rect>
                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor"></rect>
                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor"></rect>
                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor"></rect>
                    </svg>
                </span>
                <span class="float-end">
                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">Staff Emolument</div>
                </span>
                <!--end::Svg Icon-->
                <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5" id="incrementingNumberw"></div>
                <div class="fw-semibold text-gray-400">Total Issued</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col-sm-6 col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card shadow bg-dark hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"></path>
                        <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"></path>
                        <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span class="float-end">
                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Overhead Cost</div>
                </span>
                <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5" id="incrementingNumber">
</div>
                <div class="fw-semibold text-gray-100">New Request</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col-sm-6 col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card shadow bg-warning hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor"></path>
                        <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span class="float-end">
                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Capital Expenditure</div>
                </span>
                <div class="text-white fw-bold fs-2 mb-2 mt-5">0
</div>
                <div class="fw-semibold text-white">Total Defaulters</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>



									<div class="col-xl-4 mb-xl-10">
										<!--begin::List widget 8-->
										<div class="card card-flush">
											<!--begin::Header-->
											<div class="card-header pt-7 mb-5">
												<!--begin::Title-->
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder text-gray-800">Revenue</span>
													<!-- <span class="text-gray-400 mt-1 fw-bold fs-6">20 countries share 97% visits</span> -->
												</h3>
												<!--end::Title-->
												<!--begin::Toolbar-->
												
												<!--end::Toolbar-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0">
												<!--begin::Item-->
												<div class="d-flex flex-stack">
													<!--begin::Flag-->
													<!-- <img src="assets/media/flags/united-states.svg" class="me-4 w-25px" style="border-radius: 4px" alt="" /> -->
													<!--end::Flag-->
													<!--begin::Section-->
													<div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
														<!--begin::Content-->
														<div class="me-5">
															<!--begin::Title-->
															<a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6"> Revenue from ECS</a>
															<!--end::Title-->
															<!--begin::Desc-->
															<!-- <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Direct link clicks</span> -->
															<!--end::Desc-->
														</div>
														<!--end::Content-->
														<!--begin::Info-->
														<div class="d-flex align-items-center">
															<!--begin::Number-->
															<span class="text-gray-800 fw-bolder fs-6 me-3 d-block">0</span>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="m-0">
																<!--begin::Label-->
														
																<!--end::Label-->
															</div>
															<!--end::Label-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
												<!--begin::Separator-->
												<div class="separator separator-dashed my-3"></div>
												<!--end::Separator-->
												<!--begin::Item-->
												<div class="d-flex flex-stack">
													<!--begin::Flag-->
													<!-- <img src="assets/media/flags/brazil.svg" class="me-4 w-25px" style="border-radius: 4px" alt="" /> -->
													<!--end::Flag-->
													<!--begin::Section-->
													<div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
														<!--begin::Content-->
														<div class="me-5">
															<!--begin::Title-->
															<a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Revenue from Certificate </a>
															<!--end::Title-->
															<!--begin::Desc-->
															<!-- <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">All Social Channels</span> -->
															<!--end::Desc-->
														</div>
														<!--end::Content-->
														<!--begin::Info-->
														<div class="d-flex align-items-center">
															<!--begin::Number-->
															<span class="text-gray-800 fw-bolder fs-6 me-3 d-block">0</span>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="m-0">
																<!--begin::Label-->
																
															</div>
															<!--end::Label-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
												<!--begin::Separator-->
												<div class="separator separator-dashed my-3"></div>
												<!--end::Separator-->
												<!--begin::Item-->
												<div class="d-flex flex-stack">
													<!--begin::Flag-->
													<!-- <img src="assets/media/flags/turkey.svg" class="me-4 w-25px" style="border-radius: 4px" alt="" /> -->
													<!--end::Flag-->
													<!--begin::Section-->
													<div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
														<!--begin::Content-->
														<div class="me-5">
															<!--begin::Title-->
															<a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Revenue from Registration </a>
															<!--end::Title-->
															<!--begin::Desc-->
															<!-- <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Mailchimp Campaigns</span> -->
															<!--end::Desc-->
														</div>
														<!--end::Content-->
														<!--begin::Info-->
														<div class="d-flex align-items-center">
															<!--begin::Number-->
															<span class="text-gray-800 fw-bolder fs-6 me-3 d-block">0</span>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="m-0">
																<!--begin::Label-->
																
															</div>
															<!--end::Label-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
												<!--begin::Separator-->
												
											</div>
											<!--end::Body-->
										</div>
										<!--end::LIst widget 8-->
									</div>
									
									<div class="col-xl-4 mb-xl-10">
										<!--begin::List widget 8-->
										<div class="card card-flush">
											<!--begin::Header-->
											<div class="card-header pt-7 mb-5">
												<!--begin::Title-->
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder text-gray-800">Expenditure</span>
													<!-- <span class="text-gray-400 mt-1 fw-bold fs-6">20 countries share 97% visits</span> -->
												</h3>
												<!--end::Title-->
												<!--begin::Toolbar-->
												
												<!--end::Toolbar-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0">
												<!--begin::Item-->
												<div class="d-flex flex-stack">
													<!--begin::Flag-->
													<!-- <img src="assets/media/flags/united-states.svg" class="me-4 w-25px" style="border-radius: 4px" alt="" /> -->
													<!--end::Flag-->
													<!--begin::Section-->
													<div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
														<!--begin::Content-->
														<div class="me-5">
															<!--begin::Title-->
															<a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Staff Emolument</a>
															<!--end::Title-->
															<!--begin::Desc-->
															<!-- <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Direct link clicks</span> -->
															<!--end::Desc-->
														</div>
														<!--end::Content-->
														<!--begin::Info-->
														<div class="d-flex align-items-center">
															<!--begin::Number-->
															<span class="text-gray-800 fw-bolder fs-6 me-3 d-block">0</span>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="m-0">
																<!--begin::Label-->
																<span class="badge badge-success fs-base">
																<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
																
																<!--end::Label-->
															</div>
															<!--end::Label-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
												<!--begin::Separator-->
												<div class="separator separator-dashed my-3"></div>
												<!--end::Separator-->
												<!--begin::Item-->
												<div class="d-flex flex-stack">
													<!--begin::Flag-->
													<!-- <img src="assets/media/flags/brazil.svg" class="me-4 w-25px" style="border-radius: 4px" alt="" /> -->
													<!--end::Flag-->
													<!--begin::Section-->
													<div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
														<!--begin::Content-->
														<div class="me-5">
															<!--begin::Title-->
															<a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Overhead Cost</a>
															<!--end::Title-->
															<!--begin::Desc-->
															<!-- <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">All Social Channels</span> -->
															<!--end::Desc-->
														</div>
														<!--end::Content-->
														<!--begin::Info-->
														<div class="d-flex align-items-center">
															<!--begin::Number-->
															<span class="text-gray-800 fw-bolder fs-6 me-3 d-block">0</span>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="m-0">
																<!--begin::Label-->
																
																<!--end::Label-->
															</div>
															<!--end::Label-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
												<!--begin::Separator-->
												<div class="separator separator-dashed my-3"></div>
												<!--end::Separator-->
												<!--begin::Item-->
												<div class="d-flex flex-stack">
													<!--begin::Flag-->
													<!-- <img src="assets/media/flags/turkey.svg" class="me-4 w-25px" style="border-radius: 4px" alt="" /> -->
													<!--end::Flag-->
													<!--begin::Section-->
													<div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
														<!--begin::Content-->
														<div class="me-5">
															<!--begin::Title-->
															<a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Capital Expenditure</a>
															<!--end::Title-->
															<!--begin::Desc-->
															<!-- <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Mailchimp Campaigns</span> -->
															<!--end::Desc-->
														</div>
														<!--end::Content-->
														<!--begin::Info-->
														<div class="d-flex align-items-center">
															<!--begin::Number-->
															<span class="text-gray-800 fw-bolder fs-6 me-3 d-block">0</span>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="m-0">
																<!--begin::Label-->
																
																<!--end::Label-->
															</div>
															<!--end::Label-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
												<!--begin::Separator-->
												
											</div>
											<!--end::Body-->
										</div>
										<!--end::LIst widget 8-->
									</div>
									
									<!--begin::Col-->
									<div class="col-sm-6 col-xl-2">
										<!--begin::Card-->
										<div class="card">
										<div class="card-body d-flex justify-content-between align-items-start flex-column">
												<!--begin::Icon-->
												<div class="m-0">
													<!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
													<span class="svg-icon svg-icon-2hx svg-icon-gray-600">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor"></path>
															<path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor"></path>
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
														<span class="fw-bold fs-6 text-gray-400">Total Revenue</span>
													</div>
													<!--end::Follower-->
												</div>
												<!--end::Section-->
												<!--begin::Badge-->
												
												<!--end::Badge-->
											</div>











											<!--begin::Card header-->
											
											<!--end::Card header-->
											<!--begin::Card body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-sm-6 col-xl-2">
										<!--begin::Card-->
										<div class="card">
										<div class="card-body d-flex justify-content-between align-items-start flex-column">
												<!--begin::Icon-->
												<div class="m-0">
													<!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
													<span class="svg-icon svg-icon-2hx svg-icon-gray-600">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor"></path>
															<path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor"></path>
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
														<span class="fw-bold fs-6 text-gray-400">Total Expenditure</span>
													</div>
													<!--end::Follower-->
												</div>
												<!--end::Section-->
												<!--begin::Badge-->
												
												<!--end::Badge-->
											</div>











											<!--begin::Card header-->
											
											<!--end::Card header-->
											<!--begin::Card body-->
										</div>
										<!--end::Card-->
									</div>

									<div class="col-xxl-6">
										<!--begin::Chart widget 23-->
										<div class="card card-flush overflow-hidden h-md-100">
											<!--begin::Header-->
                                            
                                            <div class="card-header py-5">
                                                <!--begin::Title-->
                                                <h3 class="card-title fw-bold text-gray-800">Total Expenditure</h3>
                                                <!--end::Title-->
                                                <!--begin::Toolbar-->
                                                <div class="card-toolbar">
                                                    <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                                                    <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4">
                                                        <!--begin::Display range-->
                                                        <div class="text-gray-600 fw-bold">Loading date range...</div>
                                                        <!--end::Display range-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                        <span class="svg-icon svg-icon-1 ms-2 me-0">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex justify-content-between flex-column pb-0 px-0 pt-1">
                                                <!--begin::Items-->
                                                <div class="d-flex flex-wrap d-grid gap-5 px-9 mb-5">
                                                    <!--begin::Item-->
                                                    <div class="me-md-2">
                                                        <!--begin::Statistics-->
                                                        <div class="d-flex mb-2">
                                                            <span class="fs-4 fw-semibold text-gray-400 me-1">%</span>
                                                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">0</span>
                                                        </div>
                                                        <!--end::Statistics-->
                                                        <!--begin::Description-->
                                                        <span class="fs-6 fw-semibold text-gray-400">Budget for April</span>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="border-start-dashed border-end-dashed border-1 border-gray-300 px-5 ps-md-10 pe-md-7 me-md-5">
                                                        <!--begin::Statistics-->
                                                        <div class="d-flex mb-2">
                                                            <span class="fs-4 fw-semibold text-gray-400 me-1">%</span>
                                                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">0</span>
                                                        </div>
                                                        <!--end::Statistics-->
                                                        <!--begin::Description-->
                                                        <span class="fs-6 fw-semibold text-gray-400">Actual for April</span>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="m-0">
                                                        <!--begin::Statistics-->
                                                        <div class="d-flex align-items-center mb-2">
                                                            <!--begin::Currency-->
                                                             {{-- <span class="fs-4 fw-semibold text-gray-400 align-self-start me-1">%</span> --}}
                                                            <!--end::Currency-->
                                                            <!--begin::Value-->
                                                       {{-- <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">40</span> --}}
                                                            <!--end::Value-->
                                                            <!--begin::Label-->
                                                            {{-- <span class="badge badge-light-success fs-base">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
                                                                <span class="svg-icon svg-icon-7 svg-icon-success ms-n1">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.5" d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z" fill="currentColor" />
                                                                        <path d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z" fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->50%</span> --}}
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Statistics-->
                                                        <!--begin::Description-->
                                                        {{-- <span class="fs-6 fw-semibold text-gray-400">GAP</span> --}}
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Items-->
                                                <!--begin::Chart-->
                                                <div id="kt_charts_widget_20" class="min-h-auto ps-4 pe-6" data-kt-chart-info="Revenue" style="height: 300px"></div>
                                                <!--end::Chart-->
                                            </div>
                                            <!--end::Card body-->
                                        
											
											<!--end::Card body-->
										</div>
										<!--end::Chart widget 23-->
									</div>
									<div class="col-xxl-6 mb-5 mb-xl-10">
										<!--begin::Chart widget 13-->
										<div class="card card-flush h-md-100">
											<!--begin::Header-->
											
                                            <div class="card-header pt-7">
												<!--begin::Title-->
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder text-gray-800"> Total Revenue</span>
													<span class="text-gray-400 mt-1 fw-bold fs-6"></span>
												</h3>
												<!--end::Title-->
												<!--begin::Toolbar-->
												<div class="card-toolbar">
													<!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
													<div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4">
														<!--begin::Display range-->
														<div class="text-gray-600 fw-bolder">Loading date </div>
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
												<div id="kt_charts_widget_18_chart" class="h-325px w-100 min-h-auto ps-4 pe-6"></div>
												<!--end::Chart-->
											</div>

                                            
                                            
											<!--end::Body-->
										</div>
										<!--end::Chart widget 13-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<h3 class="fw-bolder my-2">Human Resources Management Data
									</h3>
									<br>
									<div class="col-sm-6 col-xl-4">
										<!--begin::Card-->
										<div class="card h-100">
											<!--begin::Card header-->
											<div class="card-header flex-nowrap border-0 pt-9">
												<!--begin::Card title-->
												<div class="card-title m-0">
													<!--begin::Icon-->
													<div class="symbol symbol-45px w-45px bg-light me-5">
														<img src="assets/media/svg/brand-logos/twitch.svg" alt="image" class="p-3" />
													</div>
													<!--end::Icon-->
													<!--begin::Title-->
													<a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">TOTAL NO. OF FUNDS STAFFS</a>
													<!--end::Title-->
												</div>
												<!--end::Card title-->
												<!--begin::Card toolbar-->
												<div class="card-toolbar m-0">
													<!--begin::Menu-->
													<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
														<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
																	<rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
													<!--begin::Menu 3-->
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
														<!--begin::Heading-->
														<div class="menu-item px-3">
															<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
														</div>
														<!--end::Heading-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Create Invoice</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link flex-stack px-3">Create Payment
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Generate Bill</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
															<a href="#" class="menu-link px-3">
																{{-- <span class="menu-title">Subscription</span> --}}
																<span class="menu-arrow"></span>
															</a>
															<!--begin::Menu sub-->
															<div class="menu-sub menu-sub-dropdown w-175px py-4">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Plans</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Billing</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Statements</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator my-2"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3">
																		<!--begin::Switch-->
																		<label class="form-check form-switch form-check-custom form-check-solid">
																			<!--begin::Input-->
																			<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																			<!--end::Input-->
																			<!--end::Label-->
																			<span class="form-check-label text-muted fs-6">Recuring</span>
																			<!--end::Label-->
																		</label>
																		<!--end::Switch-->
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu sub-->
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3 my-1">
															<a href="#" class="menu-link px-3">Settings</a>
														</div>
														<!--end::Menu item-->
													</div>
													<!--end::Menu 3-->
													<!--end::Menu-->
												</div>
												<!--end::Card toolbar-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body d-flex flex-column px-9 pt-6 pb-8">
												<!--begin::Heading-->
												<div class="fs-2tx fw-bolder mb-3">{{$totalstaff}}</div>
												<!--end::Heading-->
												<!--begin::Stats-->
												
												<!--end::Stats-->
												<!--begin::Indicator-->
												<div class="d-flex align-items-center fw-bold">
													{{-- <span class="badge bg-light text-gray-700 px-3 py-2 me-2">40%</span>
													<span class="text-gray-400 fs-7">Impressions</span> --}}
													<i class="fas fa-exclamation-circle fs-7 ms-2" data-bs-toggle="tooltip" title="This is the total number of new non-trial"></i>
												</div>
												<!--end::Indicator-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									
									<div class="col-sm-6 col-xl-4">
										<!--begin::Card-->
										<div class="card h-100">
											<!--begin::Card header-->
											<div class="card-header flex-nowrap border-0 pt-9">
												<!--begin::Card title-->
												<div class="card-title m-0">
													<!--begin::Icon-->
													<div class="symbol symbol-45px w-45px bg-light me-5">
														<img src="assets/media/svg/brand-logos/twitch.svg" alt="image" class="p-3" />
													</div>
													<!--end::Icon-->
													<!--begin::Title-->
													<a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">TOTAL NO. OF MANAGEMENT STAFF</a>
													<!--end::Title-->
												</div>
												<!--end::Card title-->
												<!--begin::Card toolbar-->
												<div class="card-toolbar m-0">
													<!--begin::Menu-->
													<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
														<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
																	<rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
													<!--begin::Menu 3-->
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
														<!--begin::Heading-->
														<div class="menu-item px-3">
															<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">MANAGEMENT STAFF..</div>
														</div>
														<!--end::Heading-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">ED</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link flex-stack px-3">GM
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">AGM</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
															<a href="#" class="menu-link px-3">
																<span class="menu-title">OTHERS</span>
																<span class="menu-arrow"></span>
															</a>
															<!--begin::Menu sub-->
															<div class="menu-sub menu-sub-dropdown w-175px py-4">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">OFFICER 1</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">OFFICER 2</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">USERS</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator my-2"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3">
																		<!--begin::Switch-->
																		{{-- <label class="form-check form-switch form-check-custom form-check-solid">
																			<!--begin::Input-->
																			<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																			<!--end::Input-->
																			<!--end::Label-->
																			<span class="form-check-label text-muted fs-6"></span>
																			<!--end::Label-->
																		</label> --}}
																		<!--end::Switch-->
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu sub-->
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														{{-- <div class="menu-item px-3 my-1">
															<a href="#" class="menu-link px-3">Settings</a>
														</div> --}}
														<!--end::Menu item-->
													</div>
													<!--end::Menu 3-->
													<!--end::Menu-->
												</div>
												<!--end::Card toolbar-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body d-flex flex-column px-9 pt-6 pb-8">
												<!--begin::Heading-->
												<div class="fs-2tx fw-bolder mb-3">11</div>
												<!--end::Heading-->
												<!--begin::Stats-->
												
												<!--begin::Indicator-->
												<div class="d-flex align-items-center fw-bold">
													<i class="fas fa-exclamation-circle fs-7 ms-2" data-bs-toggle="tooltip" title="This is the total number of new non-trial"></i>
												</div>
												<!--end::Indicator-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									
									<div class="col-sm-6 col-xl-4">
										<!--begin::Card-->
										<div class="card h-100" data-toggle="modal" data-target="#exampleModalCenterxxDEP">
											<!--begin::Card header-->
											<div class="card-header flex-nowrap border-0 pt-9">
												<!--begin::Card title-->
												<div class="card-title m-0">
													<!--begin::Icon-->
													<div class="symbol symbol-45px w-45px bg-light me-5">
														<img src="assets/media/svg/brand-logos/twitch.svg" alt="image" class="p-3" />
													</div>
													<!--end::Icon-->
													<!--begin::Title-->
													<a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">TOTAL NO. OF STAFF PER DEPARTMENT</a>
													<!--end::Title-->
												</div>
												<!--end::Card title-->
												<div class="card-toolbar m-0">
													<!--begin::Menu-->
													{{-- <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
														<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
																	<rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button> --}}
													<!--begin::Menu 3-->
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
														<!--begin::Heading-->
														<div class="menu-item px-3">
															<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">ICT</div>
														</div>
														<!--end::Heading-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">HR</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link flex-stack px-3">LEGAL
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">INFORMAL SECTOR</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
															{{-- <a href="#" class="menu-link px-3">
																<span class="menu-title">Subscription</span>
																<span class="menu-arrow"></span>
															</a> --}}
															<!--begin::Menu sub-->
															<div class="menu-sub menu-sub-dropdown w-175px py-4">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	{{-- <a href="#" class="menu-link px-3">Plans</a> --}}
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																{{-- <div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Billing</a>
																</div> --}}
																<!--end::Menu item-->
																<!--begin::Menu item-->
																{{-- <div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Statements</a>
																</div> --}}
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator my-2"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3">
																		<!--begin::Switch-->
																		{{-- <label class="form-check form-switch form-check-custom form-check-solid">
																			<!--begin::Input-->
																			<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																			<!--end::Input-->
																			<!--end::Label-->
																			<span class="form-check-label text-muted fs-6">Recuring</span>
																			<!--end::Label-->
																		</label>
																		<!--end::Switch--> --}}
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu sub-->
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														{{-- <div class="menu-item px-3 my-1">
															<a href="#" class="menu-link px-3">Settings</a>
														</div> --}}
														<!--end::Menu item-->
													</div>
													<!--end::Menu 3-->
													<!--end::Menu-->
												</div>
												<!--end::Card toolbar-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body d-flex flex-column px-9 pt-6 pb-8">
												<!--begin::Heading-->
												<div class="fs-2tx fw-bolder mb-3">{{$totalstaff}}</div>
												<!--end::Heading-->
												<!--begin::Stats-->
												
												<!--begin::Indicator-->
												<div class="d-flex align-items-center fw-bold">
													{{-- <span class="badge bg-light text-gray-700 px-3 py-2 me-2">40%</span>
													<span class="text-gray-400 fs-7">Dispute</span> --}}
													<i class="fas fa-exclamation-circle fs-7 ms-2" data-bs-toggle="tooltip" title="This is the total number of new non-trial"></i>
												</div>
												<!--end::Indicator-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-sm-6 col-xl-4">
										<!--begin::Card-->
										<div class="card h-100">
											<!--begin::Card header-->
											<div class="card-header flex-nowrap border-0 pt-9">
												<!--begin::Card title-->
												<div class="card-title m-0">
													<!--begin::Icon-->
													<div class="symbol symbol-45px w-45px bg-light me-5">
														<img src="assets/media/svg/brand-logos/twitch.svg" alt="image" class="p-3" />
													</div>
													<!--end::Icon-->
													<!--begin::Title-->

													<a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">TOTAL NO OF REGISTERED EMPLOYERS</a>

													<!--end::Title-->
												</div>
												<!--end::Card title-->
												<!--begin::Card toolbar-->
												<div class="card-toolbar m-0">
													<!--begin::Menu-->
													<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
														<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
																	<rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
													<!--begin::Menu 3-->
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
														<!--begin::Heading-->
														<div class="menu-item px-3">
															<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
														</div>
														<!--end::Heading-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Create Invoice</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link flex-stack px-3">Create Payment
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Generate Bill</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
															<a href="#" class="menu-link px-3">
																<span class="menu-title">Subscription</span>
																<span class="menu-arrow"></span>
															</a>
															<!--begin::Menu sub-->
															<div class="menu-sub menu-sub-dropdown w-175px py-4">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Plans</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Billing</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Statements</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator my-2"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3">
																		<!--begin::Switch-->
																		<label class="form-check form-switch form-check-custom form-check-solid">
																			<!--begin::Input-->
																			<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																			<!--end::Input-->
																			<!--end::Label-->
																			<span class="form-check-label text-muted fs-6">Recuring</span>
																			<!--end::Label-->
																		</label>
																		<!--end::Switch-->
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu sub-->
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3 my-1">
															<a href="#" class="menu-link px-3">Settings</a>
														</div>
														<!--end::Menu item-->
													</div>
													<!--end::Menu 3-->
													<!--end::Menu-->
												</div>
												<!--end::Card toolbar-->
											</div>


											
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body d-flex flex-column px-9 pt-6 pb-8">
												<!--begin::Heading-->
												<div class="fs-2tx fw-bolder mb-3">{{$totalemployers}}</div>
												<!--end::Heading-->
												
												<!--begin::Indicator-->
												<div class="d-flex align-items-center fw-bold">
													{{-- <span class="badge bg-light text-gray-700 px-3 py-2 me-2">40%</span> --}}
													{{-- <span class="text-gray-400 fs-7">Subscribers</span> --}}
												</div>
												<!--end::Indicator-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card-->
									</div>

									
									<div class="col-sm-6 col-xl-4">
										<!--begin::Card-->
										<div class="card h-100">
											<!--begin::Card header-->
											<div class="card-header flex-nowrap border-0 pt-9">
												<!--begin::Card title-->
												<div class="card-title m-0">
													<!--begin::Icon-->
													<div class="symbol symbol-45px w-45px bg-light me-5">
														<img src="assets/media/svg/brand-logos/twitch.svg" alt="image" class="p-3" />
													</div>
													<!--end::Icon-->
													<!--begin::Title-->

													<a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">TOTAL NO. OF REGISTERED EMPLOYEES</a>

													<!--end::Title-->
												</div>
												<!--end::Card title-->
												<!--begin::Card toolbar-->
												<div class="card-toolbar m-0">
													<!--begin::Menu-->
													<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
														<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
																	<rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
													<!--begin::Menu 3-->
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
														<!--begin::Heading-->
														<div class="menu-item px-3">
															<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
														</div>
														<!--end::Heading-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Create Invoice</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link flex-stack px-3">Create Payment
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Generate Bill</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
															<a href="#" class="menu-link px-3">
																<span class="menu-title">Subscription</span>
																<span class="menu-arrow"></span>
															</a>
															<!--begin::Menu sub-->
															<div class="menu-sub menu-sub-dropdown w-175px py-4">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Plans</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Billing</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Statements</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator my-2"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3">
																		<!--begin::Switch-->
																		<label class="form-check form-switch form-check-custom form-check-solid">
																			<!--begin::Input-->
																			<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																			<!--end::Input-->
																			<!--end::Label-->
																			<span class="form-check-label text-muted fs-6">Recuring</span>
																			<!--end::Label-->
																		</label>
																		<!--end::Switch-->
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu sub-->
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3 my-1">
															<a href="#" class="menu-link px-3">Settings</a>
														</div>
														<!--end::Menu item-->
													</div>
													<!--end::Menu 3-->
													<!--end::Menu-->
												</div>
												<!--end::Card toolbar-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body d-flex flex-column px-9 pt-6 pb-8">
												<!--begin::Heading-->
												<div class="fs-2tx fw-bolder mb-3">{{$totalemployees}}</div>
												<!--end::Heading-->
												<!--begin::Stats-->
											
												<!--begin::Indicator-->
												<div class="d-flex align-items-center fw-bold">
													{{-- <span class="badge bg-light text-gray-700 px-3 py-2 me-2">40%</span> --}}
													{{-- <span class="text-gray-400 fs-7">Dispute</span> --}}
													<i class="fas fa-exclamation-circle fs-7 ms-2" data-bs-toggle="tooltip" title="This is the total number of new non-trial"></i>
												</div>
												<!--end::Indicator-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->

									<div class="col-sm-6 col-xl-4">
										<!--begin::Card-->
										<div class="card h-100">
											<!--begin::Card header-->
											<div class="card-header flex-nowrap border-0 pt-9">
												<!--begin::Card title-->
												<div class="card-title m-0">
													<!--begin::Icon-->
													<div class="symbol symbol-45px w-45px bg-light me-5">
														<img src="assets/media/svg/brand-logos/twitch.svg" alt="image" class="p-3" />
													</div>
													<!--end::Icon-->
													<!--begin::Title-->
													<a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">TOTAL NO. OF ISSUED CERTIFICATES</a>
													<!--end::Title-->
												</div>
												<!--end::Card title-->
												<!--begin::Card toolbar-->
												<div class="card-toolbar m-0">
													<!--begin::Menu-->
													<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
														<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
																	<rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	<rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
													<!--begin::Menu 3-->
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
														<!--begin::Heading-->
														<div class="menu-item px-3">
															<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
														</div>
														<!--end::Heading-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Create Invoice</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link flex-stack px-3">Create Payment
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Generate Bill</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
															<a href="#" class="menu-link px-3">
																<span class="menu-title">Subscription</span>
																<span class="menu-arrow"></span>
															</a>
															<!--begin::Menu sub-->
															<div class="menu-sub menu-sub-dropdown w-175px py-4">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Plans</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Billing</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Statements</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator my-2"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3">
																		<!--begin::Switch-->
																		<label class="form-check form-switch form-check-custom form-check-solid">
																			<!--begin::Input-->
																			<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																			<!--end::Input-->
																			<!--end::Label-->
																			<span class="form-check-label text-muted fs-6">Recuring</span>
																			<!--end::Label-->
																		</label>
																		<!--end::Switch-->
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu sub-->
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3 my-1">
															<a href="#" class="menu-link px-3">Settings</a>
														</div>
														<!--end::Menu item-->
													</div>
													<!--end::Menu 3-->
													<!--end::Menu-->
												</div>
												<!--end::Card toolbar-->
											</div>
											<!--end::Card header-->
                                           
											<!--begin::Card body-->
											<div class="card-body d-flex flex-column px-9 pt-6 pb-8">
												<!--begin::Heading-->
												<div class="fs-2tx fw-bolder mb-3">{{$totalcertificate}}</div>
												<!--end::Heading-->
												<!--begin::Stats-->
											
												<!--begin::Indicator-->
												<div class="d-flex align-items-center fw-bold">
													{{-- <span class="badge bg-light text-gray-700 px-3 py-2 me-2">40%</span> --}}
													{{-- <span class="text-gray-400 fs-7">Dispute</span> --}}
													<i class="fas fa-exclamation-circle fs-7 ms-2" data-bs-toggle="tooltip" title="This is the total number of new non-trial"></i>
												</div>
												<!--end::Indicator-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card-->
									</div>
                                    
									</div>

                                    <br>
									<br>
									<h3 class="fw-bolder my-2">
										
										</h3>



                                  

                                  
									<!--end::Col-->
								</div>
								

								<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Total Number of branch officers</h3>
		      
										



				  <table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th style="background-color: green">Region</th>
      <th style="background-color: grey; font-family: Verdana">Cities</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Lagos Region</td>
      <td>APAPA, AGEGE, ISLAND, IKEJA, MAINLAND, OTTA, LEKKI, IKORUDU, SATELLITE</td>
    </tr>
    <tr>
      <td>Ibadan Region</td>
      <td>IBADAN, EKITI, ABEOKUTA, OSOGBO, AKURE</td>
    </tr>
    <tr>
      <td>Port Harcourt</td>
      <td>PH, TRANS AMADI, ONNE, CALABAR, UYO</td>
    </tr>
    <tr>
      <td>Asaba Region</td>
      <td>ASABA, BENIN, SAPELE, WARRI, YENAGOA</td>
    </tr>
    <tr>
      <td>Enugu Region</td>
      <td>ENUGU, ABA, OWERRI, ONITSHA, UMUAHIA, ABAKALIKI, AWKA, NNEWI</td>
    </tr>
    <tr>
      <td>Jos Region</td>
      <td>JOS, MAKURDI, LAFIA</td>
    </tr>
    <tr>
      <td>Abuja Region</td>
      <td>FCT, GWAGWLADA, KAGINI, MARARABA, MINNA, ILORIN, LOKOLA, JAHI</td>
    </tr>
    <tr>
      <td>Kaduna Region</td>
      <td>KADUNA, KATSINA, ZARIA</td>
    </tr>
    <tr>
      <td>Kano Region</td>
      <td>KANO, DUTSE, SOKOTO, KEBBI, GUSAU</td>
    </tr>
    <tr>
      <td>Maiduguri Region</td>
      <td>MAIDUGURI, DAMATURU, YOLA</td>
    </tr>
    <tr>
      <td>Bauchi Region</td>
      <td>BAUCHI, GOMBE, JALINGO</td>
    </tr>
  </tbody>
</table>











										
		      </div>
		    </div>
		  </div>
		</div>



		<div class="modal fade" id="exampleModalCenterxxd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<h3 class="text-center mb-3">TOTAL NUMBER OF DEPARTMENTS</h3>
		      <hr />
				
				  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
   
		    </div>
		  </div>
		</div>
		</div>




		<div class="modal fade" id="exampleModalCenterxxdigreg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<h3 class="text-center mb-3">DIGITAL REGISTRATION CENTERS</h3>
		      <hr />
				
				  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Center No</th>
        <th>Name</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>001</td>
        <td>Gotham</td>
        <td>342 center 23</td>
      </tr>
      <tr>
        <td>002</td>
        <td>Everteen</td>
        <td>aba kaduna center4 </td>
      </tr>
      <tr>
        <td>003</td>
        <td>Dooley</td>
        <td>312 light street</td>
      </tr>
    </tbody>
  </table>
   <hr />
		    </div>
		  </div>
		</div>
													</div>




		<div class="modal fade" id="exampleModalCenterxxrevecs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<h3 class="text-center mb-3">Revenue From ECS</h3>
				<br>
				
		      <hr />
				
				 <center><h4>No Data Available At The Moment🙁...</h4><center>
					<br>
   <hr />
		    </div>
		  </div>
		</div>
													</div>




		<div class="modal fade" id="exampleModalCenterxxrevcerts" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<h2 class="text-center mb-3">Revenue From Certificates</h2>
				<br>
				
		      <hr />
				
				 <center><h4>No Records Available At The Moment🙁...</h4><br><b>Please try again later!</b><center>
					<br>
   <hr />
		    </div>
		  </div>
		</div>
													</div>

		





		<div class="modal fade" id="exampleModalCenterxx" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">TOTAL NO. OF FUNDS STAFFS</h3>
		      
				  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
   
      
		    </div>
		  </div>
		</div>
		</div>





		<div class="modal fade XL" id="exampleModalCenterxxDEP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h3 class="text-center ">TOTAL NUMBER OF DEPARTMENTs</h3>
        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="ion-ios-close">X</span>
        </button>
		
      </div>
      <div class="modal-body p-4 py-5 p-md-5 lg" style="max-height: 500px; overflow-y: scroll;">
     
        <table class="table table-bordered table-sm" >
          <thead>
            <tr>
              <th>NO</th>
              <th>DEPARTMENTS</th>
              <th>DESCRIPTION</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>General Administration & Services</td>
              <td>Oversees the overall administration and operations of the organization.</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Human Resource Management</td>
              <td>Responsible for the recruitment, selection, training, and development of staff.</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Information and Communication Technology (ICT)</td>
              <td>Provides IT support to the organization.</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Legal</td>
              <td>Provides legal advice and services to the organization.</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Investment and Treasury Management</td>
              <td>Manages the organization's investments and treasury.</td>
            </tr>
            <tr>
              <td>6</td>
              <td>Finance and Accounts</td>
              <td>Manages the organization's finances and accounts.</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Procurement</td>
              <td>Manages the organization's procurement activities.</td>
            </tr>
            <tr>
              <td>8</td>
              <td>Servicom</td>
              <td>Provides customer service to the organization's stakeholders.</td>
            </tr>
            <tr>
              <td>9</td>
              <td>Compliance</td>
              <td>Ensures that the organization complies with all applicable laws and regulations.</td>
            </tr>
            <tr>
              <td>10</td>
              <td>Informal Sector</td>
              <td>Provides social security benefits to informal sector workers.</td>
            </tr>
            <tr>
              <td>11</td>
              <td>Risk Management</td>
              <td>Identifies and manages the risks faced by the organization.</td>
            </tr>
            <tr>
              <td>12</td>
              <td>Actuarial Planning, Research, and Development</td>
              <td>Develops actuarial models and plans for the organization.</td>
            </tr>
            <tr>
              <td>13</td>
              <td>Estate and Maintenance</td>
              <td>Maintains the organization's physical assets.</td>
            </tr>
            <tr>
              <td>14</td>
              <td>Social Security Development</td>
              <td>Develops new social security programs and policies.</td>
            </tr>
            <tr>
              <td>15</td>
              <td>Inspections</td>
              <td>Inspects the organization's operations to ensure compliance with laws and regulations.</td>
      </tr>
      <tr>
        <td>16</td>
        <td>Claims and Compensation</td>
        <td>Processes claims for benefits and provides compensation to beneficiaries.</td>
      </tr>
      <tr>
        <td>17</td>
        <td>Health Safety & Environment</td>
        <td>Ensures the health, safety, and environmental compliance of the organization.</td>
      </tr>
      <tr>
        <td>18</td>
        <td>Corporate Affairs</td>
        <td>Manages the organization's public relations and communications.</td>
      </tr>
      <tr>
        <td>19</td>
        <td>General</td>
        <td>Handles other matters that do not fall under any specific department.</td>
		<tr>
        <td>20</td>
        <td>ED Directorate</td>
        <td>The Directorate of the Executive Director.</td>
      </tr>
      <tr>
        <td>21</td>
        <td>MD Directorate</td>
        <td>The Directorate of the Managing Director.</td>
      </tr>
    </tbody>
  </table>
      
		    </div>
		  </div>
		</div>
		</div>








		<div class="modal fade" id="exampleModalCenterxxRO" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">TOTAL NO. OF REGIONAL OFFICESS</h3>
		      
				  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Locations</th>
        <th>COUNTRY</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>LAGOS</td>
        <td>NIGERIA</td>
      </tr>
      <tr>
        <td>2</td>
        <td>IBADAN</td>
        <td>NIGERIA</td>
      </tr>
	  <tr>
        <td>3</td>
        <td>PORT-HARCOURT</td>
        <td>NIGERIA</td>
      </tr>
	  <tr>
        <td>4</td>
        <td>ASABA</td>
        <td>NIGERIA</td>
      </tr>
	  <tr>
        <td>5</td>
        <td>ENUGU</td>
        <td>NIGERIA</td>
      </tr> <tr>
        <td>6</td>
        <td>JOS</td>
        <td>NIGERIA</td>
      </tr> <tr>
        <td>7</td>
        <td>ABUJA</td>
        <td>NIGERIA</td>
      </tr> <tr>
        <td>8</td>
        <td>KADUNA</td>
        <td>NIGERIA</td>
      </tr> <tr>
        <td>9</td>
        <td>KANO</td>
        <td>NIGERIA</td>
      </tr> <tr>
        <td>11</td>
        <td>MAIDUGURI</td>
        <td>NIGERIA</td>
      </tr> 
	  <tr>
        <td>12</td>
        <td>BAUCHI</td>
        <td>NIGERIA</td>
      </tr> <tr>
        <td>13</td>
        <td>IBADAN</td>
        <td>NIGERIA</td>
      </tr>`
      <tr>
        <td>14</td>
        <td>PORT-HARCOURT</td>
        <td>NIGERIA</td>
      </tr>
    </tbody>
  </table>
 
		    </div>
		  </div>
		</div>








								<!--end::Pagination-->
								<!--begin::Modals-->
								<!--begin::Modal - Offer A Deal-->
								<div class="modal fade" id="kt_modal_offer_a_deal" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-1000px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Modal header-->
											<div class="modal-header py-7 d-flex justify-content-between">
												<!--begin::Modal title-->
												<h2>Offer a Deal</h2>
												<!--end::Modal title-->
												<!--begin::Close-->
												<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
												<!--end::Close-->
											</div>
											<!--begin::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body scroll-y m-5">
												<!--begin::Stepper-->
												<div class="stepper stepper-links d-flex flex-column" id="kt_modal_offer_a_deal_stepper">
													<!--begin::Nav-->
													<div class="stepper-nav justify-content-center py-2">
														<!--begin::Step 1-->
														<div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
															<h3 class="stepper-title">Deal Type</h3>
														</div>
														<!--end::Step 1-->
														<!--begin::Step 2-->
														<div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
															<h3 class="stepper-title">Deal Details</h3>
														</div>
														<!--end::Step 2-->
														<!--begin::Step 3-->
														<div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
															<h3 class="stepper-title">Finance Settings</h3>
														</div>
														<!--end::Step 3-->
														<!--begin::Step 4-->
														<div class="stepper-item" data-kt-stepper-element="nav">
															<h3 class="stepper-title">Completed</h3>
														</div>
														<!--end::Step 4-->
													</div>
													<!--end::Nav-->
													<!--begin::Form-->
													<form class="mx-auto mw-500px w-100 pt-15 pb-10" novalidate="novalidate" id="kt_modal_offer_a_deal_form">
														<!--begin::Type-->
														<div class="current" data-kt-stepper-element="content">
															<!--begin::Wrapper-->
															<div class="w-100">
																<!--begin::Heading-->
																<div class="mb-13">
																	<!--begin::Title-->
																	<h2 class="mb-3">Deal Type</h2>
																	<!--end::Title-->
																	<!--begin::Description-->
																	<div class="text-muted fw-bold fs-5">If you need more info, please check out
																	<a href="#" class="link-primary fw-bolder">FAQ Page</a>.</div>
																	<!--end::Description-->
																</div>
																<!--end::Heading-->
																<!--begin::Input group-->
																<div class="fv-row mb-15" data-kt-buttons="true">
																	<!--begin::Option-->
																	<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 mb-6 active">
																		<!--begin::Input-->
																		<input class="btn-check" type="radio" checked="checked" name="offer_type" value="1" />
																		<!--end::Input-->
																		<!--begin::Label-->
																		<span class="d-flex">
																			<!--begin::Icon-->
																			<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
																			<span class="svg-icon svg-icon-3hx">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="currentColor" />
																					<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																			<!--end::Icon-->
																			<!--begin::Info-->
																			<span class="ms-4">
																				<span class="fs-3 fw-bolder text-gray-900 mb-2 d-block">Personal Deal</span>
																				<span class="fw-bold fs-4 text-muted">If you need more info, please check it out</span>
																			</span>
																			<!--end::Info-->
																		</span>
																		<!--end::Label-->
																	</label>
																	<!--end::Option-->
																	<!--begin::Option-->
																	<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6">
																		<!--begin::Input-->
																		<input class="btn-check" type="radio" name="offer_type" value="2" />
																		<!--end::Input-->
																		<!--begin::Label-->
																		<span class="d-flex">
																			<!--begin::Icon-->
																			<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																			<span class="svg-icon svg-icon-3hx">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
																					<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
																					<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
																					<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																			<!--end::Icon-->
																			<!--begin::Info-->
																			<span class="ms-4">
																				<span class="fs-3 fw-bolder text-gray-900 mb-2 d-block">Corporate Deal</span>
																				<span class="fw-bold fs-4 text-muted">Create corporate account to manage users</span>
																			</span>
																			<!--end::Info-->
																		</span>
																		<!--end::Label-->
																	</label>
																	<!--end::Option-->
																</div>
																<!--end::Input group-->
																<!--begin::Actions-->
																<div class="d-flex justify-content-end">
																	<button type="button" class="btn btn-lg btn-primary" data-kt-element="type-next">
																		<span class="indicator-label">Offer Details</span>
																		<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																	</button>
																</div>
																<!--end::Actions-->
															</div>
															<!--end::Wrapper-->
														</div>
														<!--end::Type-->
														<!--begin::Details-->
														<div data-kt-stepper-element="content">
															<!--begin::Wrapper-->
															<div class="w-100">
																<!--begin::Heading-->
																<div class="mb-13">
																	<!--begin::Title-->
																	<h2 class="mb-3">Deal Details</h2>
																	<!--end::Title-->
																	<!--begin::Description-->
																	<div class="text-muted fw-bold fs-5">If you need more info, please check out
																	<a href="#" class="link-primary fw-bolder">FAQ Page</a>.</div>
																	<!--end::Description-->
																</div>
																<!--end::Heading-->
																<!--begin::Input group-->
																<div class="fv-row mb-8">
																	<!--begin::Label-->
																	<label class="required fs-6 fw-bold mb-2">Customer</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" name="details_customer">
																		<option></option>
																		<option value="1" selected="selected">Keenthemes</option>
																		<option value="2">CRM App</option>
																	</select>
																	<!--end::Input-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="fv-row mb-8">
																	<!--begin::Label-->
																	<label class="required fs-6 fw-bold mb-2">Deal Title</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<input type="text" class="form-control form-control-solid" placeholder="Enter Deal Title" name="details_title" value="Marketing Campaign" />
																	<!--end::Input-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="fv-row mb-8">
																	<!--begin::Label-->
																	<label class="fs-6 fw-bold mb-2">Deal Description</label>
																	<!--end::Label-->
																	<!--begin::Label-->
																	<textarea class="form-control form-control-solid" rows="3" placeholder="Enter Deal Description" name="details_description">Experience share market at your fingertips with TICK PRO stock investment mobile trading app</textarea>
																	<!--end::Label-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="fv-row mb-8">
																	<label class="required fs-6 fw-bold mb-2">Activation Date</label>
																	<div class="position-relative d-flex align-items-center">
																		<!--begin::Icon-->
																		<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																		<span class="svg-icon svg-icon-2 position-absolute mx-4">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																				<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																				<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																		<!--end::Icon-->
																		<!--begin::Datepicker-->
																		<input class="form-control form-control-solid ps-12" placeholder="Pick date range" name="details_activation_date" />
																		<!--end::Datepicker-->
																	</div>
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="fv-row mb-15">
																	<!--begin::Wrapper-->
																	<div class="d-flex flex-stack">
																		<!--begin::Label-->
																		<div class="me-5">
																			<label class="required fs-6 fw-bold">Notifications</label>
																			<div class="fs-7 fw-bold text-muted">Allow Notifications by Phone or Email</div>
																		</div>
																		<!--end::Label-->
																		<!--begin::Checkboxes-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-10">
																				<!--begin::Input-->
																				<input class="form-check-input h-20px w-20px" type="checkbox" value="email" name="details_notifications[]" />
																				<!--end::Input-->
																				<!--begin::Label-->
																				<span class="form-check-label fw-bold">Email</span>
																				<!--end::Label-->
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<!--begin::Input-->
																				<input class="form-check-input h-20px w-20px" type="checkbox" value="phone" checked="checked" name="details_notifications[]" />
																				<!--end::Input-->
																				<!--begin::Label-->
																				<span class="form-check-label fw-bold">Phone</span>
																				<!--end::Label-->
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Checkboxes-->
																	</div>
																	<!--begin::Wrapper-->
																</div>
																<!--end::Input group-->
																<!--begin::Actions-->
																<div class="d-flex flex-stack">
																	<button type="button" class="btn btn-lg btn-light me-3" data-kt-element="details-previous">Deal Type</button>
																	<button type="button" class="btn btn-lg btn-primary" data-kt-element="details-next">
																		<span class="indicator-label">Financing</span>
																		<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																	</button>
																</div>
																<!--end::Actions-->
															</div>
															<!--end::Wrapper-->
														</div>
														<!--end::Details-->
														<!--begin::Budget-->
														<div data-kt-stepper-element="content">
															<!--begin::Wrapper-->
															<div class="w-100">
																<!--begin::Heading-->
																<div class="mb-13">
																	<!--begin::Title-->
																	<h2 class="mb-3">Finance</h2>
																	<!--end::Title-->
																	<!--begin::Description-->
																	<div class="text-muted fw-bold fs-5">If you need more info, please check out
																	<a href="#" class="link-primary fw-bolder">FAQ Page</a>.</div>
																	<!--end::Description-->
																</div>
																<!--end::Heading-->
																<!--begin::Input group-->
																<div class="fv-row mb-8">
																	<!--begin::Label-->
																	<label class="d-flex align-items-center fs-6 fw-bold mb-2">
																		<span class="required">Setup Budget</span>
																		<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="&lt;div class='p-4 rounded bg-light'&gt; &lt;div class='d-flex flex-stack text-muted mb-4'&gt; &lt;i class='fas fa-university fs-3 me-3'&gt;&lt;/i&gt; &lt;div class='fw-bold'&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack fw-bold text-gray-600'&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class='separator separator-dashed my-2'&gt;&lt;/div&gt; &lt;div class='d-flex flex-stack text-dark fw-bolder mb-2'&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;KEENTHEMES*&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted mb-2'&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted'&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;"></i>
																	</label>
																	<!--end::Label-->
																	<!--begin::Dialer-->
																	<div class="position-relative w-lg-250px" id="kt_modal_finance_setup" data-kt-dialer="true" data-kt-dialer-min="50" data-kt-dialer-max="50000" data-kt-dialer-step="100" data-kt-dialer-prefix="$" data-kt-dialer-decimals="2">
																		<!--begin::Decrease control-->
																		<button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen042.svg-->
																			<span class="svg-icon svg-icon-1">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
																					<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																		</button>
																		<!--end::Decrease control-->
																		<!--begin::Input control-->
																		<input type="text" class="form-control form-control-solid border-0 ps-12" data-kt-dialer-control="input" placeholder="Amount" name="finance_setup" readonly="readonly" value="$50" />
																		<!--end::Input control-->
																		<!--begin::Increase control-->
																		<button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen041.svg-->
																			<span class="svg-icon svg-icon-1">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
																					<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
																					<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																		</button>
																		<!--end::Increase control-->
																	</div>
																	<!--end::Dialer-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="fv-row mb-8">
																	<!--begin::Label-->
																	<label class="fs-6 fw-bold mb-2">Budget Usage</label>
																	<!--end::Label-->
																	<!--begin::Row-->
																	<div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
																		<!--begin::Col-->
																		<div class="col-md-6 col-lg-12 col-xxl-6">
																			<!--begin::Option-->
																			<label class="btn btn-outline btn-outline-dashed btn-outline-default active d-flex text-start p-6" data-kt-button="true">
																				<!--begin::Radio-->
																				<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																					<input class="form-check-input" type="radio" name="finance_usage" value="1" checked="checked" />
																				</span>
																				<!--end::Radio-->
																				<!--begin::Info-->
																				<span class="ms-5">
																					<span class="fs-4 fw-bolder text-gray-800 mb-2 d-block">Precise Usage</span>
																					<span class="fw-bold fs-7 text-gray-600">Withdraw money to your bank account per transaction under $50,000 budget</span>
																				</span>
																				<!--end::Info-->
																			</label>
																			<!--end::Option-->
																		</div>
																		<!--end::Col-->
																		<!--begin::Col-->
																		<div class="col-md-6 col-lg-12 col-xxl-6">
																			<!--begin::Option-->
																			<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
																				<!--begin::Radio-->
																				<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																					<input class="form-check-input" type="radio" name="finance_usage" value="2" />
																				</span>
																				<!--end::Radio-->
																				<!--begin::Info-->
																				<span class="ms-5">
																					<span class="fs-4 fw-bolder text-gray-800 mb-2 d-block">Extreme Usage</span>
																					<span class="fw-bold fs-7 text-gray-600">Withdraw money to your bank account per transaction under $50,000 budget</span>
																				</span>
																				<!--end::Info-->
																			</label>
																			<!--end::Option-->
																		</div>
																		<!--end::Col-->
																	</div>
																	<!--end::Row-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="fv-row mb-15">
																	<!--begin::Wrapper-->
																	<div class="d-flex flex-stack">
																		<!--begin::Label-->
																		<div class="me-5">
																			<label class="fs-6 fw-bold">Allow Changes in Budget</label>
																			<div class="fs-7 fw-bold text-muted">If you need more info, please check budget planning</div>
																		</div>
																		<!--end::Label-->
																		<!--begin::Switch-->
																		<label class="form-check form-switch form-check-custom form-check-solid">
																			<input class="form-check-input" type="checkbox" value="1" name="finance_allow" checked="checked" />
																			<span class="form-check-label fw-bold text-muted">Allowed</span>
																		</label>
																		<!--end::Switch-->
																	</div>
																	<!--end::Wrapper-->
																</div>
																<!--end::Input group-->
																<!--begin::Actions-->
																<div class="d-flex flex-stack">
																	<button type="button" class="btn btn-lg btn-light me-3" data-kt-element="finance-previous">Project Settings</button>
																	<button type="button" class="btn btn-lg btn-primary" data-kt-element="finance-next">
																		<span class="indicator-label">Build Team</span>
																		<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																	</button>
																</div>
																<!--end::Actions-->
															</div>
															<!--end::Wrapper-->
														</div>
														<!--end::Budget-->
														<!--begin::Complete-->
														<div data-kt-stepper-element="content">
															<!--begin::Wrapper-->
															<div class="w-100">
																<!--begin::Heading-->
																<div class="mb-13">
																	<!--begin::Title-->
																	<h2 class="mb-3">Deal Created!</h2>
																	<!--end::Title-->
																	<!--begin::Description-->
																	<div class="text-muted fw-bold fs-5">If you need more info, please check out
																	<a href="#" class="link-primary fw-bolder">FAQ Page</a>.</div>
																	<!--end::Description-->
																</div>
																<!--end::Heading-->
																<!--begin::Actions-->
																<div class="d-flex flex-center pb-20">
																	<button type="button" class="btn btn-lg btn-light me-3" data-kt-element="complete-start">Create New Deal</button>
																	<a href="#" class="btn btn-lg btn-primary" data-bs-toggle="tooltip" title="Coming Soon">View Deal</a>
																</div>
																<!--end::Actions-->
																<!--begin::Illustration-->
																<div class="text-center px-4">
																	<img src="assets/media/illustrations/sketchy-1/20.png" alt="" class="mw-100 mh-300px" />
																</div>
																<!--end::Illustration-->
															</div>
														</div>
														<!--end::Complete-->
													</form>
													<!--end::Form-->
												</div>
												<!--end::Stepper-->
											</div>
											<!--begin::Modal body-->
										</div>
									</div>
								</div>
								<!--end::Modal - Offer A Deal-->
								<!--end::Modals-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>


@endsection



