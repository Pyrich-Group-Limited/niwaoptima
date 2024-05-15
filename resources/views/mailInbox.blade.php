@extends('layouts.app')

@section('content')
<!-- Begin::mailInbox -->
<div class="d-flex flex-column flex-lg-row">
    <!--begin::Sidebar-->
    <div class="d-none d-lg-flex flex-column flex-lg-row-auto w-100 w-lg-275px" data-kt-drawer="true" data-kt-drawer-name="inbox-aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_inbox_aside_toggle">
        <!--begin::Sticky aside-->
        <div class="card card-flush mb-0" data-kt-sticky="true" data-kt-sticky-name="inbox-aside-sticky" data-kt-sticky-offset="{default: false, xl: '100px'}" data-kt-sticky-width="{lg: '275px'}" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
            <!--begin::Aside content-->
            <div class="card-body">
                <!--begin::Button-->
                <a href="{{ route('compose_mail') }}" class="btn btn-primary fw-bold w-100 mb-8">New Message</a>
                <!--end::Button-->
                <!--begin::Menu-->
                <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary mb-10">
                    <!--begin::Menu item-->
                    <div class="menu-item mb-3">
                        <!--begin::Inbox-->
                        <a href="{{route('mail_inbox')}}" class="menu-link active">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                <span class="svg-icon svg-icon-2 me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="currentColor"></path>
                                        <path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title fw-bold">Inbox</span>
                            <span class="badge badge-light-success">3</span>
                        </a>
                        <!--end::Inbox-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item mb-3">
                        <!--begin::Marked-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs024.svg-->
                                <span class="svg-icon svg-icon-2 me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M7.16973 20.95C6.26973 21.55 5.16972 20.75 5.46972 19.75L7.36973 14.05L2.46972 10.55C1.56972 9.95005 2.06973 8.55005 3.06973 8.55005H20.8697C21.9697 8.55005 22.3697 9.95005 21.4697 10.55L7.16973 20.95Z" fill="currentColor"></path>
                                        <path d="M11.0697 2.75L7.46973 13.95L16.9697 20.85C17.8697 21.45 18.9697 20.65 18.6697 19.65L13.1697 2.75C12.7697 1.75 11.3697 1.75 11.0697 2.75Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title fw-bold">Marked</span>
                        </span>
                        <!--end::Marked-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item mb-3">
                        <!--begin::Draft-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen009.svg-->
                                <span class="svg-icon svg-icon-2 me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M21 22H14C13.4 22 13 21.6 13 21V3C13 2.4 13.4 2 14 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                        <path d="M10 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H10C10.6 2 11 2.4 11 3V21C11 21.6 10.6 22 10 22Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title fw-bold">Draft</span>
                            <span class="badge badge-light-warning">5</span>
                        </span>
                        <!--end::Draft-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item mb-3">
                        <!--begin::Sent-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen016.svg-->
                                <span class="svg-icon svg-icon-2 me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="currentColor"></path>
                                        <path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title fw-bold">Sent</span>
                        </span>
                        <!--end::Sent-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item">
                        <!--begin::Trash-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                <span class="svg-icon svg-icon-2 me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title fw-bold">Trash</span>
                        </span>
                        <!--end::Trash-->
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
                <!--begin::Menu-->
                <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary">
                    <!--begin::Menu item-->
                    <div class="menu-item mb-3">
                        <!--begin::Custom work-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs009.svg-->
                                <span class="svg-icon svg-icon-6 svg-icon-danger me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 6C8.7 6 6 8.7 6 12C6 15.3 8.7 18 12 18C15.3 18 18 15.3 18 12C18 8.7 15.3 6 12 6Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title fw-semibold">Custom Work</span>
                            <span class="badge badge-light-danger">6</span>
                        </span>
                        <!--end::Custom work-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item mb-3">
                        <!--begin::Partnership-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs009.svg-->
                                <span class="svg-icon svg-icon-6 svg-icon-success me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 6C8.7 6 6 8.7 6 12C6 15.3 8.7 18 12 18C15.3 18 18 15.3 18 12C18 8.7 15.3 6 12 6Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title fw-semibold">Partnership</span>
                        </span>
                        <!--end::Partnership-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item mb-3">
                        <!--begin::In progress-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs009.svg-->
                                <span class="svg-icon svg-icon-6 svg-icon-info me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 6C8.7 6 6 8.7 6 12C6 15.3 8.7 18 12 18C15.3 18 18 15.3 18 12C18 8.7 15.3 6 12 6Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title fw-semibold">In Progress</span>
                        </span>
                        <!--end::In progress-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item">
                        <!--begin::Add label-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                <span class="svg-icon svg-icon-2 me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title fw-semibold">Add Label</span>
                        </span>
                        <!--end::Add label-->
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Aside content-->
        </div>
        <!--end::Sticky aside-->
    </div>
    <!--end::Sidebar-->
    <!--begin::Content-->
    <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
        <!--begin::Card-->
        <div class="card">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Actions-->
                <div class="d-flex flex-wrap gap-2">
                    <!--begin::Checkbox-->
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-4 me-lg-7">
                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_inbox_listing .form-check-input" value="1">
                    </div>
                    <!--end::Checkbox-->
                    <!--begin::Reload-->
                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top" aria-label="Reload" data-bs-original-title="Reload" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr029.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.5 20.7259C14.6 21.2259 14.2 21.826 13.7 21.926C13.2 22.026 12.6 22.0259 12.1 22.0259C9.5 22.0259 6.9 21.0259 5 19.1259C1.4 15.5259 1.09998 9.72592 4.29998 5.82592L5.70001 7.22595C3.30001 10.3259 3.59999 14.8259 6.39999 17.7259C8.19999 19.5259 10.8 20.426 13.4 19.926C13.9 19.826 14.4 20.2259 14.5 20.7259ZM18.4 16.8259L19.8 18.2259C22.9 14.3259 22.7 8.52593 19 4.92593C16.7 2.62593 13.5 1.62594 10.3 2.12594C9.79998 2.22594 9.4 2.72595 9.5 3.22595C9.6 3.72595 10.1 4.12594 10.6 4.02594C13.1 3.62594 15.7 4.42595 17.6 6.22595C20.5 9.22595 20.7 13.7259 18.4 16.8259Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M2 3.62592H7C7.6 3.62592 8 4.02592 8 4.62592V9.62589L2 3.62592ZM16 14.4259V19.4259C16 20.0259 16.4 20.4259 17 20.4259H22L16 14.4259Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Reload-->
                    <!--begin::Archive-->
                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Archive-->
                    <!--begin::Delete-->
                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Delete-->
                    <!--begin::Filter-->
                    <div>
                        <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-inbox-listing-filter="show_all">All</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-inbox-listing-filter="show_read">Read</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-inbox-listing-filter="show_unread">Unread</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-inbox-listing-filter="show_starred">Starred</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-inbox-listing-filter="show_unstarred">Unstarred</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Filter-->
                    <!--begin::Sort-->
                    <span>
                        <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top" aria-label="Sort" data-bs-original-title="Sort" data-kt-initialized="1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                            <span class="svg-icon svg-icon-3 m-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                    <rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                    <rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-inbox-listing-filter="filter_newest">Newest</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-inbox-listing-filter="filter_oldest">Oldest</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-inbox-listing-filter="filter_unread">Unread</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </span>
                    <!--end::Sort-->
                </div>
                <!--end::Actions-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-2 position-absolute ms-4">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-inbox-listing-filter="search" class="form-control form-control-sm form-control-solid mw-100 min-w-125px min-w-lg-150px min-w-xxl-200px ps-12" placeholder="Search Inbox">
                    </div>
                    <!--end::Search-->
                    <!--begin::Toggle-->
                    <a href="#" class="btn btn-sm btn-icon btn-color-primary btn-light btn-active-light-primary" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top" id="kt_inbox_aside_toggle" aria-label="Toggle inbox menu" data-bs-original-title="Toggle inbox menu" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen059.svg-->
                        <span class="svg-icon svg-icon-3 m-0">
                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect y="6" width="16" height="3" rx="1.5" fill="currentColor"></rect>
                                <rect opacity="0.3" y="12" width="8" height="3" rx="1.5" fill="currentColor"></rect>
                                <rect opacity="0.3" width="12" height="3" rx="1.5" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Toggle-->
                </div>
                <!--end::Actions-->
            </div>
            <div class="card-body p-0">
                <!--begin::Table-->
                <div id="kt_inbox_listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table table-hover table-row-dashed fs-6 gy-5 my-0 dataTable no-footer" id="kt_inbox_listing">
                            <!--begin::Table head-->
                            <thead class="d-none">
                                <tr>
                                    <th class="sorting" tabindex="0" aria-controls="kt_inbox_listing" rowspan="1" colspan="1" aria-label="Checkbox: activate to sort column ascending" style="width: 0px;">Checkbox</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_inbox_listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 0px;">Actions</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_inbox_listing" rowspan="1" colspan="1" aria-label="Author: activate to sort column ascending" style="width: 0px;">Author</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_inbox_listing" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" style="width: 0px;">Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_inbox_listing" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 0px;">Date</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>













                                <tr class="odd">
                                    <td class="ps-9">
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-sm form-check-custom form-check-solid mt-3">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                        <!--end::Checkbox-->
                                    </td>
                                    <td class="min-w-80px">
                                        <!--begin::Star-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Star-->
                                        <!--begin::Important-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                            <span class="svg-icon svg-icon-4 mt-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Important-->
                                    </td>
                                    <!--begin::Author-->
                                    <td class="w-150px w-md-175px">
                                        <a href="{{ route('view_reply_mail') }}" class="d-flex align-items-center text-dark">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-danger">
                                                    <span class="text-danger">M</span>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <span class="fw-semibold">Melody Macy</span>
                                            <!--end::Name-->
                                        </a>
                                    </td>
                                    <!--end::Author-->
                                    <!--begin::Title-->
                                    <td>
                                        <div class="text-dark mb-1">
                                            <!--begin::Heading-->
                                            <a href="{{ route('view_reply_mail') }}" class="text-dark">
                                                <span class="fw-bold">Digital PPV Customer Confirmation</span>
                                                <span class="fw-bold d-none d-md-inine">-</span>
                                                <span class="d-none d-md-inine text-muted">Thank you for ordering UFC 240 Holloway vs Edgar Alternate camera angles...</span>
                                            </a>
                                            <!--end::Heading-->
                                        </div>
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">inbox</div>
                                        <div class="badge badge-light-warning">task</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Title-->
                                    <!--begin::Date-->
                                    <td class="w-100px text-end fs-7 pe-9">
                                        <span class="fw-semibold">8:30 PM</span>
                                    </td>
                                    <!--end::Date-->
                                </tr>
                                <tr class="even">
                                    <td class="ps-9">
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-sm form-check-custom form-check-solid mt-3">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                        <!--end::Checkbox-->
                                    </td>
                                    <td class="min-w-80px">
                                        <!--begin::Star-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Star-->
                                        <!--begin::Important-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                            <span class="svg-icon svg-icon-4 mt-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Important-->
                                    </td>
                                    <!--begin::Author-->
                                    <td class="w-150px w-md-175px">
                                        <a href="{{ route('view_reply_mail') }}" class="d-flex align-items-center text-dark">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-danger">
                                                    <span class="text-danger">MS</span>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <span class="fw-semibold">Max Smith</span>
                                            <!--end::Name-->
                                        </a>
                                    </td>
                                    <!--end::Author-->
                                    <!--begin::Title-->
                                    <td>
                                        <div class="text-dark mb-1">
                                            <!--begin::Heading-->
                                            <a href="{{ route('view_reply_mail') }}" class="text-dark">
                                                <span class="fw-bold">Your iBuy.com grocery shopping confirmation</span>
                                                <span class="fw-bold d-none d-md-inine">-</span>
                                                <span class="d-none d-md-inine text-muted">Please make sure that you have one of the following cards with you when we deliver your order...</span>
                                            </a>
                                            <!--end::Heading-->
                                        </div>
                                    </td>
                                    <!--end::Title-->
                                    <!--begin::Date-->
                                    <td class="w-100px text-end fs-7 pe-9">
                                        <span class="fw-semibold">day ago</span>
                                    </td>
                                    <!--end::Date-->
                                </tr>
                                <tr class="odd">
                                    <td class="ps-9">
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-sm form-check-custom form-check-solid mt-3">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                        <!--end::Checkbox-->
                                    </td>
                                    <td class="min-w-80px">
                                        <!--begin::Star-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Star-->
                                        <!--begin::Important-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                            <span class="svg-icon svg-icon-4 mt-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Important-->
                                    </td>
                                    <!--begin::Author-->
                                    <td class="w-150px w-md-175px">
                                        <a href="{{ route('view_reply_mail') }}" class="d-flex align-items-center text-dark">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-danger">
                                                    <span class="text-danger">S</span>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <span class="fw-semibold">Sean Bean</span>
                                            <!--end::Name-->
                                        </a>
                                    </td>
                                    <!--end::Author-->
                                    <!--begin::Title-->
                                    <td>
                                        <div class="text-dark mb-1">
                                            <!--begin::Heading-->
                                            <a href="{{ route('view_reply_mail') }}" class="text-dark">
                                                <span class="fw-bold">Your Order #224820998666029 has been Confirmed</span>
                                                <span class="fw-bold d-none d-md-inine">-</span>
                                                <span class="d-none d-md-inine text-muted">Your Order #224820998666029 has been placed on Saturday, 29 June</span>
                                            </a>
                                            <!--end::Heading-->
                                        </div>
                                    </td>
                                    <!--end::Title-->
                                    <!--begin::Date-->
                                    <td class="w-100px text-end fs-7 pe-9">
                                        <span class="fw-semibold text-muted">11:20 PM</span>
                                    </td>
                                    <!--end::Date-->
                                </tr>
                                <tr class="even">
                                    <td class="ps-9">
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-sm form-check-custom form-check-solid mt-3">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                        <!--end::Checkbox-->
                                    </td>
                                    <td class="min-w-80px">
                                        <!--begin::Star-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Star-->
                                        <!--begin::Important-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                            <span class="svg-icon svg-icon-4 mt-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Important-->
                                    </td>
                                    <!--begin::Author-->
                                    <td class="w-150px w-md-175px">
                                        <a href="{{ route('view_reply_mail') }}" class="d-flex align-items-center text-dark">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-danger">
                                                    <span class="text-danger">BC</span>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <span class="fw-semibold">Brian Cox</span>
                                            <!--end::Name-->
                                        </a>
                                    </td>
                                    <!--end::Author-->
                                    <!--begin::Title-->
                                    <td>
                                        <div class="text-dark mb-1">
                                            <!--begin::Heading-->
                                            <a href="{{ route('view_reply_mail') }}" class="text-dark">
                                                <span class="fw-bold">Payment Notification DLOP2329KD</span>
                                                <span class="fw-bold d-none d-md-inine">-</span>
                                                <span class="d-none d-md-inine text-muted">Your payment of 4500USD to AirCar has been authorized and confirmed, thank you your account. This...</span>
                                            </a>
                                            <!--end::Heading-->
                                        </div>
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-danger">new</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Title-->
                                    <!--begin::Date-->
                                    <td class="w-100px text-end fs-7 pe-9">
                                        <span class="fw-semibold text-muted">2 days ago</span>
                                    </td>
                                    <!--end::Date-->
                                </tr>
                                <tr class="odd">
                                    <td class="ps-9">
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-sm form-check-custom form-check-solid mt-3">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                        <!--end::Checkbox-->
                                    </td>
                                    <td class="min-w-80px">
                                        <!--begin::Star-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Star-->
                                        <!--begin::Important-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                            <span class="svg-icon svg-icon-4 mt-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Important-->
                                    </td>
                                    <!--begin::Author-->
                                    <td class="w-150px w-md-175px">
                                        <a href="{{ route('view_reply_mail') }}" class="d-flex align-items-center text-dark">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-warning">
                                                    <span class="text-warning">C</span>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <span class="fw-semibold">Mikaela Collins</span>
                                            <!--end::Name-->
                                        </a>
                                    </td>
                                    <!--end::Author-->
                                    <!--begin::Title-->
                                    <td>
                                        <div class="text-dark mb-1">
                                            <!--begin::Heading-->
                                            <a href="{{ route('view_reply_mail') }}" class="text-dark">
                                                <span class="fw-bold">Congratulations on your iRun Coach subscription</span>
                                                <span class="fw-bold d-none d-md-inine">-</span>
                                                <span class="d-none d-md-inine text-muted">Congratulations on your iRun Coach subscription. You made no space for excuses and you</span>
                                            </a>
                                            <!--end::Heading-->
                                        </div>
                                    </td>
                                    <!--end::Title-->
                                    <!--begin::Date-->
                                    <td class="w-100px text-end fs-7 pe-9">
                                        <span class="fw-semibold text-muted">July 25</span>
                                    </td>
                                    <!--end::Date-->
                                </tr>
                                <tr class="even">
                                    <td class="ps-9">
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-sm form-check-custom form-check-solid mt-3">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                        <!--end::Checkbox-->
                                    </td>
                                    <td class="min-w-80px">
                                        <!--begin::Star-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Star-->
                                        <!--begin::Important-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                            <span class="svg-icon svg-icon-4 mt-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Important-->
                                    </td>
                                    <!--begin::Author-->
                                    <td class="w-150px w-md-175px">
                                        <a href="{{ route('view_reply_mail') }}" class="d-flex align-items-center text-dark">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-danger">
                                                    <span class="text-danger">F</span>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <span class="fw-semibold">Francis Mitcham</span>
                                            <!--end::Name-->
                                        </a>
                                    </td>
                                    <!--end::Author-->
                                    <!--begin::Title-->
                                    <td>
                                        <div class="text-dark mb-1">
                                            <!--begin::Heading-->
                                            <a href="{{ route('view_reply_mail') }}" class="text-dark">
                                                <span class="fw-bold">Pay bills &amp; win up to 600$ Cashback!</span>
                                                <span class="fw-bold d-none d-md-inine">-</span>
                                                <span class="d-none d-md-inine text-muted">Congratulations on your iRun Coach subscription. You made no space for excuses and you decided on a healthier and happier life...</span>
                                            </a>
                                            <!--end::Heading-->
                                        </div>
                                    </td>
                                    <!--end::Title-->
                                    <!--begin::Date-->
                                    <td class="w-100px text-end fs-7 pe-9">
                                        <span class="fw-semibold text-muted">July 24</span>
                                    </td>
                                    <!--end::Date-->
                                </tr>
                                <tr class="odd">
                                    <td class="ps-9">
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-sm form-check-custom form-check-solid mt-3">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                        <!--end::Checkbox-->
                                    </td>
                                    <td class="min-w-80px">
                                        <!--begin::Star-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Star-->
                                        <!--begin::Important-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                            <span class="svg-icon svg-icon-4 mt-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Important-->
                                    </td>
                                    <!--begin::Author-->
                                    <td class="w-150px w-md-175px">
                                        <a href="{{ route('view_reply_mail') }}" class="d-flex align-items-center text-dark">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-danger">
                                                    <span class="text-danger">O</span>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <span class="fw-semibold">Olivia Wild</span>
                                            <!--end::Name-->
                                        </a>
                                    </td>
                                    <!--end::Author-->
                                    <!--begin::Title-->
                                    <td>
                                        <div class="text-dark mb-1">
                                            <!--begin::Heading-->
                                            <a href="{{ route('view_reply_mail') }}" class="text-dark">
                                                <span class="fw-bold">Activate your LIPO Account today</span>
                                                <span class="fw-bold d-none d-md-inine">-</span>
                                                <span class="d-none d-md-inine text-muted">Thank you for creating a LIPO Account. Please click the link below to activate your account.</span>
                                            </a>
                                            <!--end::Heading-->
                                        </div>
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-warning">task</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Title-->
                                    <!--begin::Date-->
                                    <td class="w-100px text-end fs-7 pe-9">
                                        <span class="fw-semibold text-muted">July 13</span>
                                    </td>
                                    <!--end::Date-->
                                </tr>
                                <tr class="even">
                                    <td class="ps-9">
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-sm form-check-custom form-check-solid mt-3">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                        <!--end::Checkbox-->
                                    </td>
                                    <td class="min-w-80px">
                                        <!--begin::Star-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Star-->
                                        <!--begin::Important-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                            <span class="svg-icon svg-icon-4 mt-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Important-->
                                    </td>
                                    <!--begin::Author-->
                                    <td class="w-150px w-md-175px">
                                        <a href="{{ route('view_reply_mail') }}" class="d-flex align-items-center text-dark">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-primary">
                                                    <span class="text-primary">N</span>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <span class="fw-semibold">Neil Owen</span>
                                            <!--end::Name-->
                                        </a>
                                    </td>
                                    <!--end::Author-->
                                    <!--begin::Title-->
                                    <td>
                                        <div class="text-dark mb-1">
                                            <!--begin::Heading-->
                                            <a href="{{ route('view_reply_mail') }}" class="text-dark">
                                                <span class="fw-bold">About your request for PalmLake</span>
                                                <span class="fw-bold d-none d-md-inine">-</span>
                                                <span class="d-none d-md-inine text-muted">What you requested can't be arranged ahead of time but PalmLake said they'll do their best to accommodate you upon arrival....</span>
                                            </a>
                                            <!--end::Heading-->
                                        </div>
                                    </td>
                                    <!--end::Title-->
                                    <!--begin::Date-->
                                    <td class="w-100px text-end fs-7 pe-9">
                                        <span class="fw-semibold text-muted">May 25</span>
                                    </td>
                                    <!--end::Date-->
                                </tr>
                                <tr class="odd">
                                    <td class="ps-9">
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-sm form-check-custom form-check-solid mt-3">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                        <!--end::Checkbox-->
                                    </td>
                                    <td class="min-w-80px">
                                        <!--begin::Star-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Star-->
                                        <!--begin::Important-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                            <span class="svg-icon svg-icon-4 mt-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Important-->
                                    </td>
                                    <!--begin::Author-->
                                    <td class="w-150px w-md-175px">
                                        <a href="{{ route('view_reply_mail') }}" class="d-flex align-items-center text-dark">
                                            <!--begin::Avatar-->
                                            <!-- <div class="symbol symbol-35px me-3">
                                                <span class="symbol-label" style="background-image:url(assets/media/avatars/300-23.jpg)"></span>
                                            </div> -->
                                            <!--end::Avatar-->

                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-danger">
                                                    <span class="text-danger">DW</span>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <span class="fw-semibold">Dan Wilson</span>
                                            <!--end::Name-->
                                        </a>
                                    </td>
                                    <!--end::Author-->
                                    <!--begin::Title-->
                                    <td>
                                        <div class="text-dark mb-1">
                                            <!--begin::Heading-->
                                            <a href="{{ route('view_reply_mail') }}" class="text-dark">
                                                <span class="fw-bold">Welcome, Patty</span>
                                                <span class="fw-bold d-none d-md-inine">-</span>
                                                <span class="d-none d-md-inine text-muted">Discover interesting ideas and unique perspectives. Read, explore and follow your interests. Get personalized recommendations delivered to you....</span>
                                            </a>
                                            <!--end::Heading-->
                                        </div>
                                    </td>
                                    <!--end::Title-->
                                    <!--begin::Date-->
                                    <td class="w-100px text-end fs-7 pe-9">
                                        <span class="fw-semibold">April 15</span>
                                    </td>
                                    <!--end::Date-->
                                </tr>
                                <tr class="even">
                                    <td class="ps-9">
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-sm form-check-custom form-check-solid mt-3">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                        <!--end::Checkbox-->
                                    </td>
                                    <td class="min-w-80px">
                                        <!--begin::Star-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Star-->
                                        <!--begin::Important-->
                                        <a href="#" class="btn btn-icon btn-color-gray-400 btn-active-color-primary w-35px h-35px" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                            <span class="svg-icon svg-icon-4 mt-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--end::Important-->
                                    </td>
                                    <!--begin::Author-->
                                    <td class="w-150px w-md-175px">
                                        <a href="{{ route('view_reply_mail') }}" class="d-flex align-items-center text-dark">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-danger">
                                                    <span class="text-danger">E</span>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <span class="fw-semibold">Emma Bold</span>
                                            <!--end::Name-->
                                        </a>
                                    </td>
                                    <!--end::Author-->
                                    <!--begin::Title-->
                                    <td>
                                        <div class="text-dark mb-1">
                                            <!--begin::Heading-->
                                            <a href="{{ route('view_reply_mail') }}" class="text-dark">
                                                <span class="fw-bold">Free Video Marketing Guide</span>
                                                <span class="fw-bold d-none d-md-inine">-</span>
                                                <span class="d-none d-md-inine text-muted">Video has rolled into every marketing platform or channel, leaving...</span>
                                            </a>
                                            <!--end::Heading-->
                                        </div>
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-success">project</div>
                                        <!--end::Badges-->
                                    </td>
                                    <!--end::Title-->
                                    <!--begin::Date-->
                                    <td class="w-100px text-end fs-7 pe-9">
                                        <span class="fw-semibold text-muted">April 3</span>
                                    </td>
                                    <!--end::Date-->
                                </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <div class="row px-9 pt-3 pb-5">
                        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                            <div class="dataTables_length" id="kt_inbox_listing_length"><label><select name="kt_inbox_listing_length" aria-controls="kt_inbox_listing" class="form-select form-select-sm form-select-solid">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select></label></div>
                        </div>
                        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="dataTables_paginate paging_simple_numbers" id="kt_inbox_listing_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="kt_inbox_listing_previous"><a href="#" aria-controls="kt_inbox_listing" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="kt_inbox_listing" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="kt_inbox_listing" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item next" id="kt_inbox_listing_next"><a href="#" aria-controls="kt_inbox_listing" data-dt-idx="3" tabindex="0" class="page-link"><i class="next"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Table-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content-->
</div>
<!-- End::mailInbox -->

@endsection