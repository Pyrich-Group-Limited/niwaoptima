@extends('layouts.app')

@section('content')

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
            <div class="card-header align-items-center py-5 gap-5">
                <!--begin::Actions-->
                <div class="d-flex">
                    <!--begin::Back-->
                    <a href="{{ route('mail_inbox') }}" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Back" data-bs-original-title="Back" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                        <span class="svg-icon svg-icon-1 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor"></rect>
                                <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Back-->
                    <!--begin::Archive-->
                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                        <span class="svg-icon svg-icon-2 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Archive-->
                    <!--begin::Spam-->
                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Spam" data-bs-original-title="Spam" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                        <span class="svg-icon svg-icon-2 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                                <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
                                <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Spam-->
                    <!--begin::Delete-->
                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                        <span class="svg-icon svg-icon-2 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Delete-->
                    <!--begin::Mark as read-->
                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Mark as read" data-bs-original-title="Mark as read" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen028.svg-->
                        <span class="svg-icon svg-icon-2 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="7" y="2" width="14" height="16" rx="3" fill="currentColor"></rect>
                                <rect x="3" y="6" width="14" height="16" rx="3" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Mark as read-->
                    <!--begin::Move-->
                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Move" data-bs-original-title="Move" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
                        <span class="svg-icon svg-icon-2 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="currentColor"></rect>
                                <path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="currentColor"></path>
                                <path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Move-->
                </div>
                <!--end::Actions-->
                <!--begin::Pagination-->
                <div class="d-flex align-items-center">
                    <!--begin::Pages info-->
                    <span class="fw-semibold text-muted me-2">1 - 50 of 235</span>
                    <!--end::Pages info-->
                    <!--begin::Prev page-->
                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Previous message" data-bs-original-title="Previous message" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                        <span class="svg-icon svg-icon-2 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Prev page-->
                    <!--begin::Next page-->
                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Next message" data-bs-original-title="Next message" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-2 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Next page-->
                    <!--begin::Settings menu-->
                    <div>
                        <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Settings" data-bs-original-title="Settings" data-kt-initialized="1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                            <span class="svg-icon svg-icon-2 m-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                    <rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                    <rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-250px py-4" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-3 me-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->New Group</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                    <span class="svg-icon svg-icon-3 me-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Contacts</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com014.svg-->
                                    <span class="svg-icon svg-icon-3 me-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor"></path>
                                            <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor"></rect>
                                            <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor"></path>
                                            <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Groups
                                    <span class="badge badge-light-primary ms-auto">new</span></a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs030.svg-->
                                    <span class="svg-icon svg-icon-3 me-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.5 7C5.88071 7 7 5.88071 7 4.5C7 3.11929 5.88071 2 4.5 2C3.11929 2 2 3.11929 2 4.5C2 5.88071 3.11929 7 4.5 7Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M14 4.5C14 5.9 12.9 7 11.5 7C10.1 7 9 5.9 9 4.5C9 3.1 10.1 2 11.5 2C12.9 2 14 3.1 14 4.5ZM18.5 2C17.1 2 16 3.1 16 4.5C16 5.9 17.1 7 18.5 7C19.9 7 21 5.9 21 4.5C21 3.1 19.9 2 18.5 2ZM4.5 9C3.1 9 2 10.1 2 11.5C2 12.9 3.1 14 4.5 14C5.9 14 7 12.9 7 11.5C7 10.1 5.9 9 4.5 9ZM11.5 9C10.1 9 9 10.1 9 11.5C9 12.9 10.1 14 11.5 14C12.9 14 14 12.9 14 11.5C14 10.1 12.9 9 11.5 9ZM18.5 9C17.1 9 16 10.1 16 11.5C16 12.9 17.1 14 18.5 14C19.9 14 21 12.9 21 11.5C21 10.1 19.9 9 18.5 9ZM4.5 16C3.1 16 2 17.1 2 18.5C2 19.9 3.1 21 4.5 21C5.9 21 7 19.9 7 18.5C7 17.1 5.9 16 4.5 16ZM11.5 16C10.1 16 9 17.1 9 18.5C9 19.9 10.1 21 11.5 21C12.9 21 14 19.9 14 18.5C14 17.1 12.9 16 11.5 16ZM18.5 16C17.1 16 16 17.1 16 18.5C16 19.9 17.1 21 18.5 21C19.9 21 21 19.9 21 18.5C21 17.1 19.9 16 18.5 16Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Calls</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                    <span class="svg-icon svg-icon-3 me-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="currentColor"></path>
                                            <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Settings</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="separator my-5"></div>
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-3 me-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Help</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen051.svg-->
                                    <span class="svg-icon svg-icon-3 me-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                            <path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Privacy
                                    <span class="badge badge-light-danger ms-auto">5</span></a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--begin::Settings menu-->
                </div>
                <!--end::Pagination-->
            </div>
            <div class="card-body">
                <!--begin::Title-->
                <div class="d-flex flex-wrap gap-2 justify-content-between mb-8">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <!--begin::Heading-->
                        <h2 class="fw-semibold me-3 my-1">Trip Reminder. Thank you for flying with us!</h2>
                        <!--begin::Heading-->
                        <!--begin::Badges-->
                        <span class="badge badge-light-primary my-1 me-2">inbox</span>
                        <span class="badge badge-light-danger my-1">important</span>
                        <!--end::Badges-->
                    </div>
                    <div class="d-flex">
                        <!--begin::Sort-->
                        <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Sort" data-bs-original-title="Sort" data-kt-initialized="1">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr032.svg-->
                            <span class="svg-icon svg-icon-2 m-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 6.59998V20C7 20.6 7.4 21 8 21C8.6 21 9 20.6 9 20V6.59998H7ZM15 17.4V4C15 3.4 15.4 3 16 3C16.6 3 17 3.4 17 4V17.4H15Z" fill="currentColor"></path>
                                    <path opacity="0.3" d="M3 6.59999H13L8.7 2.3C8.3 1.9 7.7 1.9 7.3 2.3L3 6.59999ZM11 17.4H21L16.7 21.7C16.3 22.1 15.7 22.1 15.3 21.7L11 17.4Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--end::Sort-->
                        <!--begin::Print-->
                        <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print" data-kt-initialized="1">
                            <i class="bi bi-printer-fill fs-2"></i>
                        </a>
                        <!--end::Print-->
                    </div>
                </div>
                <!--end::Title-->
                <!--begin::Message accordion-->
                <div data-kt-inbox-message="message_wrapper">
                    <!--begin::Message header-->
                    <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer" data-kt-inbox-message="header">
                        <!--begin::Author-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-35px me-3">
                                <div class="symbol-label bg-light-danger">
                                    <span class="text-danger">ES</span>
                                </div>
                            </div>
                            <!--end::Avatar-->
                            <div class="pe-5">
                                <!--begin::Author details-->
                                <div class="d-flex align-items-center flex-wrap gap-1">
                                    <a href="#" class="fw-bold text-dark text-hover-primary">Emma Smith</a>
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                    <span class="svg-icon svg-icon-7 svg-icon-success mx-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <circle fill="currentColor" cx="12" cy="12" r="8"></circle>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="text-muted fw-bold">1 day ago</span>
                                </div>
                                <!--end::Author details-->
                                <!--begin::Message details-->
                                <div data-kt-inbox-message="details">
                                    <span class="text-muted fw-semibold">to me</span>
                                    <!--begin::Menu toggle-->
                                    <a href="#" class="me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--end::Menu toggle-->
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-300px p-4" data-kt-menu="true">
                                        <!--begin::Table-->
                                        <table class="table mb-0">
                                            <tbody>
                                                <!--begin::From-->
                                                <tr>
                                                    <td class="w-75px text-muted">From</td>
                                                    <td>Emma Bold</td>
                                                </tr>
                                                <!--end::From-->
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">Date</td>
                                                    <td>21 Feb 2023, 5:30 pm</td>
                                                </tr>
                                                <!--end::Date-->
                                                <!--begin::Subject-->
                                                <tr>
                                                    <td class="text-muted">Subject</td>
                                                    <td>Trip Reminder. Thank you for flying with us!</td>
                                                </tr>
                                                <!--end::Subject-->
                                                <!--begin::Reply-to-->
                                                <tr>
                                                    <td class="text-muted">Reply-to</td>
                                                    <td>emma@intenso.com</td>
                                                </tr>
                                                <!--end::Reply-to-->
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Message details-->
                                <!--begin::Preview message-->
                                <div class="text-muted fw-semibold mw-450px d-none" data-kt-inbox-message="preview">With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part....</div>
                                <!--end::Preview message-->
                            </div>
                        </div>
                        <!--end::Author-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <!--begin::Date-->
                            <span class="fw-semibold text-muted text-end me-3">22 Sep 2023, 10:10 pm</span>
                            <!--end::Date-->
                            <div class="d-flex">
                                <!--begin::Star-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Star-->
                                <!--begin::Mark as important-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Mark as important-->
                                <!--begin::Reply-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Reply" data-bs-original-title="Reply" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen055.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"></path>
                                            <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"></path>
                                            <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Reply-->
                                <!--begin::Settings-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Settings" data-bs-original-title="Settings" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen053.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                            <rect x="10" y="3" width="4" height="4" rx="2" fill="currentColor"></rect>
                                            <rect x="10" y="17" width="4" height="4" rx="2" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Settings-->
                            </div>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Message header-->
                    <!--begin::Message content-->
                    <div class="collapse fade show" data-kt-inbox-message="message">
                        <div class="py-5">
                            <p>Hi Bob,</p>
                            <p>With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part of any article is the title.Without a compelleing title, your reader won't even get to the first sentence.After the title, however, the first few sentences of your article are certainly the most important part.</p>
                            <p>Jornalists call this critical, introductory section the "Lede," and when bridge properly executed, it's the that carries your reader from an headine try at attention-grabbing to the body of your blog post, if you want to get it right on of these 10 clever ways to omen your next blog posr with a bang</p>
                            <p>Best regards,</p>
                            <p class="mb-0">Jason Muller</p>
                        </div>
                    </div>
                    <!--end::Message content-->
                </div>
                <!--end::Message accordion-->
                <div class="separator my-6"></div>
                <!--begin::Message accordion-->
                <div data-kt-inbox-message="message_wrapper">
                    <!--begin::Message header-->
                    <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer" data-kt-inbox-message="header">
                        <!--begin::Author-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-35px me-3">
                                <div class="symbol-label bg-light-danger">
                                    <span class="text-danger">MS</span>
                                </div>
                            </div>
                            <!--end::Avatar-->
                            <div class="pe-5">
                                <!--begin::Author details-->
                                <div class="d-flex align-items-center flex-wrap gap-1">
                                    <a href="#" class="fw-bold text-dark text-hover-primary">Max Smith</a>
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                    <span class="svg-icon svg-icon-7 svg-icon-success mx-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <circle fill="currentColor" cx="12" cy="12" r="8"></circle>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="text-muted fw-bold">2 days ago</span>
                                </div>
                                <!--end::Author details-->
                                <!--begin::Message details-->
                                <div class="d-none" data-kt-inbox-message="details">
                                    <span class="text-muted fw-semibold">to me</span>
                                    <!--begin::Menu toggle-->
                                    <a href="#" class="me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--end::Menu toggle-->
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-300px p-4" data-kt-menu="true">
                                        <!--begin::Table-->
                                        <table class="table mb-0">
                                            <tbody>
                                                <!--begin::From-->
                                                <tr>
                                                    <td class="w-75px text-muted">From</td>
                                                    <td>Emma Bold</td>
                                                </tr>
                                                <!--end::From-->
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">Date</td>
                                                    <td>20 Dec 2023, 8:43 pm</td>
                                                </tr>
                                                <!--end::Date-->
                                                <!--begin::Subject-->
                                                <tr>
                                                    <td class="text-muted">Subject</td>
                                                    <td>Trip Reminder. Thank you for flying with us!</td>
                                                </tr>
                                                <!--end::Subject-->
                                                <!--begin::Reply-to-->
                                                <tr>
                                                    <td class="text-muted">Reply-to</td>
                                                    <td>emma@intenso.com</td>
                                                </tr>
                                                <!--end::Reply-to-->
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Message details-->
                                <!--begin::Preview message-->
                                <div class="text-muted fw-semibold mw-450px" data-kt-inbox-message="preview">Jornalists call this critical, introductory section the "Lede," and when bridge properly executed....</div>
                                <!--end::Preview message-->
                            </div>
                        </div>
                        <!--end::Author-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <!--begin::Date-->
                            <span class="fw-semibold text-muted text-end me-3">05 May 2023, 8:43 pm</span>
                            <!--end::Date-->
                            <div class="d-flex">
                                <!--begin::Star-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-warning m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Star-->
                                <!--begin::Mark as important-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Mark as important-->
                                <!--begin::Reply-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Reply" data-bs-original-title="Reply" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen055.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"></path>
                                            <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"></path>
                                            <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Reply-->
                                <!--begin::Settings-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Settings" data-bs-original-title="Settings" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen053.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                            <rect x="10" y="3" width="4" height="4" rx="2" fill="currentColor"></rect>
                                            <rect x="10" y="17" width="4" height="4" rx="2" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Settings-->
                            </div>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Message header-->
                    <!--begin::Message content-->
                    <div class="fade collapse" data-kt-inbox-message="message" style="">
                        <div class="py-5">
                            <p>Hi Bob,</p>
                            <p>With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part of any article is the title.Without a compelleing title, your reader won't even get to the first sentence.After the title, however, the first few sentences of your article are certainly the most important part.</p>
                            <p>Jornalists call this critical, introductory section the "Lede," and when bridge properly executed, it's the that carries your reader from an headine try at attention-grabbing to the body of your blog post, if you want to get it right on of these 10 clever ways to omen your next blog posr with a bang</p>
                            <p>Best regards,</p>
                            <p class="mb-0">Jason Muller</p>
                        </div>
                    </div>
                    <!--end::Message content-->
                </div>
                <!--end::Message accordion-->
                <div class="separator my-6"></div>
                <!--begin::Message accordion-->
                <div data-kt-inbox-message="message_wrapper">
                    <!--begin::Message header-->
                    <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer" data-kt-inbox-message="header">
                        <!--begin::Author-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50 me-4">
                                <span class="symbol-label" style="background-image:url(assets/media/avatars/blank.png);"></span>
                            </div>
                            <!--end::Avatar-->
                            <div class="pe-5">
                                <!--begin::Author details-->
                                <div class="d-flex align-items-center flex-wrap gap-1">
                                    <a href="#" class="fw-bold text-dark text-hover-primary">Sean Bean</a>
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                    <span class="svg-icon svg-icon-7 svg-icon-success mx-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <circle fill="currentColor" cx="12" cy="12" r="8"></circle>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="text-muted fw-bold">3 days ago</span>
                                </div>
                                <!--end::Author details-->
                                <!--begin::Message details-->
                                <div class="d-none" data-kt-inbox-message="details">
                                    <span class="text-muted fw-semibold">to me</span>
                                    <!--begin::Menu toggle-->
                                    <a href="#" class="me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--end::Menu toggle-->
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-300px p-4" data-kt-menu="true">
                                        <!--begin::Table-->
                                        <table class="table mb-0">
                                            <tbody>
                                                <!--begin::From-->
                                                <tr>
                                                    <td class="w-75px text-muted">From</td>
                                                    <td>Emma Bold</td>
                                                </tr>
                                                <!--end::From-->
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">Date</td>
                                                    <td>05 May 2023, 10:10 pm</td>
                                                </tr>
                                                <!--end::Date-->
                                                <!--begin::Subject-->
                                                <tr>
                                                    <td class="text-muted">Subject</td>
                                                    <td>Trip Reminder. Thank you for flying with us!</td>
                                                </tr>
                                                <!--end::Subject-->
                                                <!--begin::Reply-to-->
                                                <tr>
                                                    <td class="text-muted">Reply-to</td>
                                                    <td>emma@intenso.com</td>
                                                </tr>
                                                <!--end::Reply-to-->
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Message details-->
                                <!--begin::Preview message-->
                                <div class="text-muted fw-semibold mw-450px" data-kt-inbox-message="preview">Jornalists call this critical, introductory section the "Lede," and when bridge properly executed....</div>
                                <!--end::Preview message-->
                            </div>
                        </div>
                        <!--end::Author-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <!--begin::Date-->
                            <span class="fw-semibold text-muted text-end me-3">25 Oct 2023, 2:40 pm</span>
                            <!--end::Date-->
                            <div class="d-flex">
                                <!--begin::Star-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Star" data-bs-original-title="Star" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Star-->
                                <!--begin::Mark as important-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Mark as important" data-bs-original-title="Mark as important" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen056.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Mark as important-->
                                <!--begin::Reply-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Reply" data-bs-original-title="Reply" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen055.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"></path>
                                            <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"></path>
                                            <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Reply-->
                                <!--begin::Settings-->
                                <a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Settings" data-bs-original-title="Settings" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen053.svg-->
                                    <span class="svg-icon svg-icon-2 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                            <rect x="10" y="3" width="4" height="4" rx="2" fill="currentColor"></rect>
                                            <rect x="10" y="17" width="4" height="4" rx="2" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Settings-->
                            </div>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Message header-->
                    <!--begin::Message content-->
                    <div class="collapse fade" data-kt-inbox-message="message">
                        <div class="py-5">
                            <p>Hi Bob,</p>
                            <p>With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part of any article is the title.Without a compelleing title, your reader won't even get to the first sentence.After the title, however, the first few sentences of your article are certainly the most important part.</p>
                            <p>Jornalists call this critical, introductory section the "Lede," and when bridge properly executed, it's the that carries your reader from an headine try at attention-grabbing to the body of your blog post, if you want to get it right on of these 10 clever ways to omen your next blog posr with a bang</p>
                            <p>Best regards,</p>
                            <p class="mb-0">Jason Muller</p>
                        </div>
                    </div>
                    <!--end::Message content-->
                </div>
                <!--end::Message accordion-->
                <!--begin::Form-->
                <form id="kt_inbox_reply_form" class="rounded border mt-10">
                    <!--begin::Body-->
                    <div class="d-block">
                        <!--begin::To-->
                        <div class="d-flex align-items-center border-bottom px-8 min-h-50px">
                            <!--begin::Label-->
                            <div class="text-dark fw-bold w-75px">To:</div>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <tags class="tagify  form-control border-0" tabindex="-1">
                                <tag title="e.smith@kpmg.com.au" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="1" name="Emma Smith" avatar="avatars/blank.png" email="e.smith@kpmg.com.au">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div class="d-flex align-items-center">
                                        <div class="tagify__tag__avatar-wrap ps-0"><img onerror="this.style.visibility='hidden'" class="rounded-circle w-25px me-2" src="assets/media/avatars/blank.png"></div><span class="tagify__tag-text">Emma Smith</span>
                                    </div>
                                </tag>
                                <tag title="max@kt.com" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="2" name="Max Smith" avatar="avatars/blank.png" email="max@kt.com">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div class="d-flex align-items-center">
                                        <div class="tagify__tag__avatar-wrap ps-0"><img onerror="this.style.visibility='hidden'" class="rounded-circle w-25px me-2" src="assets/media/avatars/blank.png"></div><span class="tagify__tag-text">Max Smith</span>
                                    </div>
                                </tag>
                                <tag title="sean@dellito.com" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="3" name="Sean Bean" avatar="avatars/blank.png" email="sean@dellito.com">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div class="d-flex align-items-center">
                                        <div class="tagify__tag__avatar-wrap ps-0"><img onerror="this.style.visibility='hidden'" class="rounded-circle w-25px me-2" src="assets/media/avatars/blank.png"></div><span class="tagify__tag-text">Sean Bean</span>
                                    </div>
                                </tag><span contenteditable="" tabindex="0" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                                ​
                            </tags><input type="text" class="form-control border-0" name="compose_to" value="e.smith@kpmg.com.au, max@kt.com, sean@dellito.com" data-kt-inbox-form="tagify" tabindex="-1">
                            <!--end::Input-->
                            <!--begin::CC & BCC buttons-->
                            <div class="ms-auto w-75px text-end">
                                <span class="text-muted fs-bold cursor-pointer text-hover-primary me-2" data-kt-inbox-form="cc_button">Cc</span>
                                <span class="text-muted fs-bold cursor-pointer text-hover-primary" data-kt-inbox-form="bcc_button">Bcc</span>
                            </div>
                            <!--end::CC & BCC buttons-->
                        </div>
                        <!--end::To-->
                        <!--begin::CC-->
                        <div class="d-none align-items-center border-bottom ps-8 pe-5 min-h-50px" data-kt-inbox-form="cc">
                            <!--begin::Label-->
                            <div class="text-dark fw-bold w-75px">Cc:</div>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <tags class="tagify form-control border-0 tagify--noTags tagify--empty" tabindex="-1">
                                <span contenteditable="" tabindex="0" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                                ​
                            </tags><input type="text" class="form-control border-0" name="compose_cc" value="" data-kt-inbox-form="tagify" tabindex="-1">
                            <!--end::Input-->
                            <!--begin::Close-->
                            <span class="btn btn-clean btn-xs btn-icon" data-kt-inbox-form="cc_close">
                                <i class="la la-close"></i>
                            </span>
                            <!--end::Close-->
                        </div>
                        <!--end::CC-->
                        <!--begin::BCC-->
                        <div class="d-none align-items-center border-bottom inbox-to-bcc ps-8 pe-5 min-h-50px" data-kt-inbox-form="bcc">
                            <!--begin::Label-->
                            <div class="text-dark fw-bold w-75px">Bcc:</div>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <tags class="tagify form-control border-0 tagify--noTags tagify--empty" tabindex="-1">
                                <span contenteditable="" tabindex="0" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                                ​
                            </tags><input type="text" class="form-control border-0" name="compose_bcc" value="" data-kt-inbox-form="tagify" tabindex="-1">
                            <!--end::Input-->
                            <!--begin::Close-->
                            <span class="btn btn-clean btn-xs btn-icon" data-kt-inbox-form="bcc_close">
                                <i class="la la-close"></i>
                            </span>
                            <!--end::Close-->
                        </div>
                        <!--end::BCC-->
                        <!--begin::Subject-->
                        <div class="border-bottom">
                            <input class="form-control border-0 px-8 min-h-45px" name="compose_subject" placeholder="Subject">
                        </div>
                        <!--end::Subject-->
                        <!--begin::Message-->
                        <div class="ql-toolbar ql-snow px-5 border-top-0 border-start-0 border-end-0"><span class="ql-formats"><span class="ql-header ql-picker"><span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-0"><svg viewBox="0 0 18 18">
                                            <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon>
                                            <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon>
                                        </svg></span><span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-0"><span tabindex="0" role="button" class="ql-picker-item" data-value="1"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="2"></span><span tabindex="0" role="button" class="ql-picker-item ql-selected"></span></span></span><select class="ql-header" style="display: none;">
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option selected="selected"></option>
                                </select></span><span class="ql-formats"><button type="button" class="ql-bold"><svg viewBox="0 0 18 18">
                                        <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path>
                                        <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path>
                                    </svg></button><button type="button" class="ql-italic"><svg viewBox="0 0 18 18">
                                        <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line>
                                        <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line>
                                        <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line>
                                    </svg></button><button type="button" class="ql-underline"><svg viewBox="0 0 18 18">
                                        <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path>
                                        <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect>
                                    </svg></button></span><span class="ql-formats"><button type="button" class="ql-image"><svg viewBox="0 0 18 18">
                                        <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect>
                                        <circle class="ql-fill" cx="6" cy="7" r="1"></circle>
                                        <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>
                                    </svg></button><button type="button" class="ql-code-block"><svg viewBox="0 0 18 18">
                                        <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"></polyline>
                                        <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"></polyline>
                                        <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line>
                                    </svg></button></span></div>
                        <div id="kt_inbox_form_editor" class="border-0 h-250px px-3 ql-container ql-snow">
                            <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true" data-placeholder="Type your text here...">
                                <p><br></p>
                            </div>
                            <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                            <div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>
                        </div>
                        <!--end::Message-->
                        <!--begin::Attachments-->
                        <div class="dropzone dropzone-queue px-8 py-4" id="kt_inbox_reply_attachments" data-kt-inbox-form="dropzone">
                            <div class="dropzone-items">

                            </div>
                            <div class="dz-default dz-message"><button class="dz-button" type="button">Drop files here to upload</button></div>
                        </div>
                        <!--end::Attachments-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center me-3">
                            <!--begin::Send-->
                            <div class="btn-group me-4">
                                <!--begin::Submit-->
                                <span class="btn btn-primary fs-bold px-6" data-kt-inbox-form="send">
                                    <span class="indicator-label">Send</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </span>
                                <!--end::Submit-->
                                <!--begin::Send options-->
                                <span class="btn btn-primary btn-icon fs-bold" role="button">
                                    <span class="btn btn-icon" data-kt-menu-trigger="click" data-kt-menu-placement="top-start">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-2 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Schedule send</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Save &amp; archive</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Cancel</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </span>
                                <!--end::Send options-->
                            </div>
                            <!--end::Send-->
                            <!--begin::Upload attachement-->
                            <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary me-2 dz-clickable" id="kt_inbox_reply_attachments_select" data-kt-inbox-form="dropzone_upload">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com008.svg-->
                                <span class="svg-icon svg-icon-2 m-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M4.425 20.525C2.525 18.625 2.525 15.525 4.425 13.525L14.825 3.125C16.325 1.625 18.825 1.625 20.425 3.125C20.825 3.525 20.825 4.12502 20.425 4.52502C20.025 4.92502 19.425 4.92502 19.025 4.52502C18.225 3.72502 17.025 3.72502 16.225 4.52502L5.82499 14.925C4.62499 16.125 4.62499 17.925 5.82499 19.125C7.02499 20.325 8.82501 20.325 10.025 19.125L18.425 10.725C18.825 10.325 19.425 10.325 19.825 10.725C20.225 11.125 20.225 11.725 19.825 12.125L11.425 20.525C9.525 22.425 6.425 22.425 4.425 20.525Z" fill="currentColor"></path>
                                        <path d="M9.32499 15.625C8.12499 14.425 8.12499 12.625 9.32499 11.425L14.225 6.52498C14.625 6.12498 15.225 6.12498 15.625 6.52498C16.025 6.92498 16.025 7.525 15.625 7.925L10.725 12.8249C10.325 13.2249 10.325 13.8249 10.725 14.2249C11.125 14.6249 11.725 14.6249 12.125 14.2249L19.125 7.22493C19.525 6.82493 19.725 6.425 19.725 5.925C19.725 5.325 19.525 4.825 19.125 4.425C18.725 4.025 18.725 3.42498 19.125 3.02498C19.525 2.62498 20.125 2.62498 20.525 3.02498C21.325 3.82498 21.725 4.825 21.725 5.925C21.725 6.925 21.325 7.82498 20.525 8.52498L13.525 15.525C12.325 16.725 10.525 16.725 9.32499 15.625Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Upload attachement-->
                            <!--begin::Pin-->
                            <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-2 m-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor"></path>
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Pin-->
                        </div>
                        <!--end::Actions-->
                        <!--begin::Toolbar-->
                        <div class="d-flex align-items-center">
                            <!--begin::More actions-->
                            <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary me-2" data-toggle="tooltip" title="More actions">
                                <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="currentColor"></path>
                                        <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::More actions-->
                            <!--begin::Dismiss reply-->
                            <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary" data-inbox="dismiss" data-toggle="tooltip" title="Dismiss reply">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Dismiss reply-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content-->
</div>

@endsection