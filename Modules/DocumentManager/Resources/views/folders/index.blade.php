@extends('layouts.app')

@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <!--begin::Card-->
        <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('assets/media/illustrations/sketchy-1/4.png')">
            <!--begin::Card header-->
            <div class="card-header pt-10">
                <div class="d-flex align-items-center">
                    <!--begin::Icon-->
                    <div class="symbol symbol-circle me-5">
                        <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs020.svg-->
                            <span class="svg-icon svg-icon-2x svg-icon-primary">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.302 11.35L12.002 20.55H21.202C21.802 20.55 22.202 19.85 21.902 19.35L17.302 11.35Z" fill="currentColor" />
                                    <path opacity="0.3" d="M12.002 20.55H2.802C2.202 20.55 1.80202 19.85 2.10202 19.35L6.70203 11.45L12.002 20.55ZM11.302 3.45L6.70203 11.35H17.302L12.702 3.45C12.402 2.85 11.602 2.85 11.302 3.45Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column">
                        <h2 class="mb-1">Documents Manager</h2>
                        <div class="text-muted fw-bold">
                            <a href="#">NIWAEBS</a>
                            <span class="mx-3">|</span>
                            <a href="#">Documents Manager</a>
                        </div>
                    </div>
                    <!--end::Title-->
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pb-0">
                <!--begin::Navs-->
                <div class="d-flex overflow-auto h-55px">
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-semibold flex-nowrap">
                        <!--begin::Nav item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary me-6 active" href="">Files</a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                </div>
                <!--begin::Navs-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header pt-8">
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-filemanager-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Files" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                        <!--begin::Export-->
                        <a href="{{ route('folders.create') }}">
                            <button type="button" class="btn btn-light-primary me-3">
                                <!--begin::Svg Icon | path: icons/duotune/files/fil013.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                        <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.2C9.7 3 10.2 3.20001 10.4 3.60001ZM16 12H13V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V12H8C7.4 12 7 12.4 7 13C7 13.6 7.4 14 8 14H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V14H16C16.6 14 17 13.6 17 13C17 12.4 16.6 12 16 12Z" fill="currentColor" />
                                        <path opacity="0.3" d="M11 14H8C7.4 14 7 13.6 7 13C7 12.4 7.4 12 8 12H11V14ZM16 12H13V14H16C16.6 14 17 13.6 17 13C17 12.4 16.6 12 16 12Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->create files</button>
                        </a>
                        <!--end::Export-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-filemanager-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-filemanager-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-filemanager-table-select="delete_selected">Delete Selected</button>
                    </div>
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Table header-->
                <div class="d-flex flex-stack">
                    <!--begin::Folder path-->
                    <div class="badge badge-lg badge-light-primary">
                        <div class="d-flex align-items-center flex-wrap">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs039.svg-->
                            <span class="svg-icon svg-icon-2 svg-icon-primary me-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M14.1 15.013C14.6 16.313 14.5 17.813 13.7 19.113C12.3 21.513 9.29999 22.313 6.89999 20.913C5.29999 20.013 4.39999 18.313 4.39999 16.613C5.09999 17.013 5.99999 17.313 6.89999 17.313C8.39999 17.313 9.69998 16.613 10.7 15.613C11.1 15.713 11.5 15.813 11.9 15.813C12.7 15.813 13.5 15.513 14.1 15.013ZM8.5 12.913C8.5 12.713 8.39999 12.513 8.39999 12.313C8.39999 11.213 8.89998 10.213 9.69998 9.613C9.19998 8.313 9.30001 6.813 10.1 5.513C10.6 4.713 11.2 4.11299 11.9 3.71299C10.4 2.81299 8.49999 2.71299 6.89999 3.71299C4.49999 5.11299 3.70001 8.113 5.10001 10.513C5.80001 11.813 7.1 12.613 8.5 12.913ZM16.9 7.313C15.4 7.313 14.1 8.013 13.1 9.013C14.3 9.413 15.1 10.513 15.3 11.713C16.7 12.013 17.9 12.813 18.7 14.113C19.2 14.913 19.3 15.713 19.3 16.613C20.8 15.713 21.8 14.113 21.8 12.313C21.9 9.513 19.7 7.313 16.9 7.313Z" fill="currentColor" />
                                    <path d="M9.69998 9.61307C9.19998 8.31307 9.30001 6.81306 10.1 5.51306C11.5 3.11306 14.5 2.31306 16.9 3.71306C18.5 4.61306 19.4 6.31306 19.4 8.01306C18.7 7.61306 17.8 7.31306 16.9 7.31306C15.4 7.31306 14.1 8.01306 13.1 9.01306C12.7 8.91306 12.3 8.81306 11.9 8.81306C11.1 8.81306 10.3 9.11307 9.69998 9.61307ZM8.5 12.9131C7.1 12.6131 5.90001 11.8131 5.10001 10.5131C4.60001 9.71306 4.5 8.91306 4.5 8.01306C3 8.91306 2 10.5131 2 12.3131C2 15.1131 4.2 17.3131 7 17.3131C8.5 17.3131 9.79999 16.6131 10.8 15.6131C9.49999 15.1131 8.7 14.1131 8.5 12.9131ZM18.7 14.1131C17.9 12.8131 16.7 12.0131 15.3 11.7131C15.3 11.9131 15.4 12.1131 15.4 12.3131C15.4 13.4131 14.9 14.4131 14.1 15.0131C14.6 16.3131 14.5 17.8131 13.7 19.1131C13.2 19.9131 12.6 20.5131 11.9 20.9131C13.4 21.8131 15.3 21.9131 16.9 20.9131C19.3 19.6131 20.1 16.5131 18.7 14.1131Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <a href="#">Files</a>
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                            <span class="svg-icon svg-icon-2 svg-icon-primary mx-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <!--end::Folder path-->
                    <!--begin::Folder Stats-->

                    <!--end::Folder Stats-->
                </div>
                <!--end::Table header-->
                <!--begin::Table-->
                @include('documentmanager::folders.table')
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--begin::Upload template-->
        <table class="d-none">
            <tr id="kt_file_manager_new_folder_row" data-kt-filemanager-template="upload">
                <td></td>
                <td id="kt_file_manager_add_folder_form" class="fv-row">
                    <div class="d-flex align-items-center">
                        <!--begin::Folder icon-->
                        <!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
                        <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Folder icon-->
                        <!--begin:Input-->
                        <input type="text" name="new_folder_name" placeholder="Enter the folder name" class="form-control mw-250px me-3" />
                        <!--end:Input-->
                        <!--begin:Submit button-->
                        <button class="btn btn-icon btn-light-primary me-3" id="kt_file_manager_add_folder">
                            <span class="indicator-label">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr085.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.89557 13.4982L7.79487 11.2651C7.26967 10.7068 6.38251 10.7068 5.85731 11.2651C5.37559 11.7772 5.37559 12.5757 5.85731 13.0878L9.74989 17.2257C10.1448 17.6455 10.8118 17.6455 11.2066 17.2257L18.1427 9.85252C18.6244 9.34044 18.6244 8.54191 18.1427 8.02984C17.6175 7.47154 16.7303 7.47154 16.2051 8.02984L11.061 13.4982C10.7451 13.834 10.2115 13.834 9.89557 13.4982Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="indicator-progress">
                                <span class="spinner-border spinner-border-sm align-middle"></span>
                            </span>
                        </button>
                        <!--end:Submit button-->
                        <!--begin:Cancel button-->
                        <button class="btn btn-icon btn-light-danger" id="kt_file_manager_cancel_folder">
                            <span class="indicator-label">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
                                        <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="indicator-progress">
                                <span class="spinner-border spinner-border-sm align-middle"></span>
                            </span>
                        </button>
                        <!--end:Cancel button-->
                    </div>
                </td>
                <td></td>
                <td></td>
                <td></td>
            															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
        </table>
        <!--end::Upload template-->
        <!--begin::Rename template-->
        <div class="d-none" data-kt-filemanager-template="rename">
            <div class="fv-row">
                <div class="d-flex align-items-center">
                    <span id="kt_file_manager_rename_folder_icon"></span>
                    <input type="text" id="kt_file_manager_rename_input" name="rename_folder_name" placeholder="Enter the new folder name" class="form-control mw-250px me-3" value="" />
                    <button class="btn btn-icon btn-light-primary me-3" id="kt_file_manager_rename_folder">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr085.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.89557 13.4982L7.79487 11.2651C7.26967 10.7068 6.38251 10.7068 5.85731 11.2651C5.37559 11.7772 5.37559 12.5757 5.85731 13.0878L9.74989 17.2257C10.1448 17.6455 10.8118 17.6455 11.2066 17.2257L18.1427 9.85252C18.6244 9.34044 18.6244 8.54191 18.1427 8.02984C17.6175 7.47154 16.7303 7.47154 16.2051 8.02984L11.061 13.4982C10.7451 13.834 10.2115 13.834 9.89557 13.4982Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <button class="btn btn-icon btn-light-danger" id="kt_file_manager_rename_folder_cancel">
                        <span class="indicator-label">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
                                    <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="indicator-progress">
                            <span class="spinner-border spinner-border-sm align-middle"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <!--end::Rename template-->
        <!--begin::Action template-->
        <div class="d-none" data-kt-filemanager-template="action">
            <div class="d-flex justify-content-end">
                <!--begin::Share link-->
                <div class="ms-2" data-kt-filemanger-table="copy_link">
                    <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/coding/cod007.svg-->
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M18.4 5.59998C18.7766 5.9772 18.9881 6.48846 18.9881 7.02148C18.9881 7.55451 18.7766 8.06577 18.4 8.44299L14.843 12C14.466 12.377 13.9547 12.5887 13.4215 12.5887C12.8883 12.5887 12.377 12.377 12 12C11.623 11.623 11.4112 11.1117 11.4112 10.5785C11.4112 10.0453 11.623 9.53399 12 9.15698L15.553 5.604C15.9302 5.22741 16.4415 5.01587 16.9745 5.01587C17.5075 5.01587 18.0188 5.22741 18.396 5.604L18.4 5.59998ZM20.528 3.47205C20.0614 3.00535 19.5074 2.63503 18.8977 2.38245C18.288 2.12987 17.6344 1.99988 16.9745 1.99988C16.3145 1.99988 15.661 2.12987 15.0513 2.38245C14.4416 2.63503 13.8876 3.00535 13.421 3.47205L9.86801 7.02502C9.40136 7.49168 9.03118 8.04568 8.77863 8.6554C8.52608 9.26511 8.39609 9.91855 8.39609 10.5785C8.39609 11.2384 8.52608 11.8919 8.77863 12.5016C9.03118 13.1113 9.40136 13.6653 9.86801 14.132C10.3347 14.5986 10.8886 14.9688 11.4984 15.2213C12.1081 15.4739 12.7616 15.6039 13.4215 15.6039C14.0815 15.6039 14.7349 15.4739 15.3446 15.2213C15.9543 14.9688 16.5084 14.5986 16.975 14.132L20.528 10.579C20.9947 10.1124 21.3649 9.55844 21.6175 8.94873C21.8701 8.33902 22.0001 7.68547 22.0001 7.02551C22.0001 6.36555 21.8701 5.71201 21.6175 5.10229C21.3649 4.49258 20.9947 3.93867 20.528 3.47205Z" fill="currentColor" />
                                <path d="M14.132 9.86804C13.6421 9.37931 13.0561 8.99749 12.411 8.74695L12 9.15698C11.6234 9.53421 11.4119 10.0455 11.4119 10.5785C11.4119 11.1115 11.6234 11.6228 12 12C12.3766 12.3772 12.5881 12.8885 12.5881 13.4215C12.5881 13.9545 12.3766 14.4658 12 14.843L8.44699 18.396C8.06999 18.773 7.55868 18.9849 7.02551 18.9849C6.49235 18.9849 5.98101 18.773 5.604 18.396C5.227 18.019 5.0152 17.5077 5.0152 16.9745C5.0152 16.4413 5.227 15.93 5.604 15.553L8.74701 12.411C8.28705 11.233 8.28705 9.92498 8.74701 8.74695C8.10159 8.99737 7.5152 9.37919 7.02499 9.86804L3.47198 13.421C2.52954 14.3635 2.00009 15.6417 2.00009 16.9745C2.00009 18.3073 2.52957 19.5855 3.47202 20.528C4.41446 21.4704 5.69269 21.9999 7.02551 21.9999C8.35833 21.9999 9.63656 21.4704 10.579 20.528L14.132 16.975C14.5987 16.5084 14.9689 15.9544 15.2215 15.3447C15.4741 14.735 15.6041 14.0815 15.6041 13.4215C15.6041 12.7615 15.4741 12.108 15.2215 11.4983C14.9689 10.8886 14.5987 10.3347 14.132 9.86804Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-300px" data-kt-menu="true">
                        <!--begin::Card-->
                        <div class="card card-flush">
                            <div class="card-body p-5">
                                <!--begin::Loader-->
                                <div class="d-flex" data-kt-filemanger-table="copy_link_generator">
                                    <!--begin::Spinner-->
                                    <div class="me-5" data-kt-indicator="on">
                                        <span class="indicator-progress">
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </div>
                                    <!--end::Spinner-->
                                    <!--begin::Label-->
                                    <div class="fs-6 text-dark">Generating Share Link...</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Loader-->
                                <!--begin::Link-->
                                <div class="d-flex flex-column text-start d-none" data-kt-filemanger-table="copy_link_result">
                                    <div class="d-flex mb-3">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr085.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-success me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.89557 13.4982L7.79487 11.2651C7.26967 10.7068 6.38251 10.7068 5.85731 11.2651C5.37559 11.7772 5.37559 12.5757 5.85731 13.0878L9.74989 17.2257C10.1448 17.6455 10.8118 17.6455 11.2066 17.2257L18.1427 9.85252C18.6244 9.34044 18.6244 8.54191 18.1427 8.02984C17.6175 7.47154 16.7303 7.47154 16.2051 8.02984L11.061 13.4982C10.7451 13.834 10.2115 13.834 9.89557 13.4982Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="fs-6 text-dark">Share Link Generated</div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" value="https://path/to/file/or/folder/" />
                                    <div class="text-muted fw-normal mt-2 fs-8 px-3">Read only.
                                        <a href="../../demo1/dist/apps/file-manager/settings/.html" class="ms-2">Change permissions</a>
                                    </div>
                                </div>
                                <!--end::Link-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Share link-->
                <!--begin::More-->
                <div class="ms-2">
                    <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor" />
                                <rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor" />
                                <rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Download Documents</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-filemanager-table="rename">Rename</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-filemanager-table-filter="move_row" data-bs-toggle="modal" data-bs-target="#kt_modal_move_to_folder">Move to folder</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link text-danger px-3" data-kt-filemanager-table-filter="delete_row">Delete</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::More-->
            </div>
        </div>
        <!--end::Action template-->
        <!--begin::Checkbox template-->
        <div class="d-none" data-kt-filemanager-template="checkbox">
            <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
            </div>
        </div>
        <!--end::Checkbox template-->
        <!--begin::Modals-->
        <!--begin::Modal - Upload Documents-->
        <div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <form class="form" action="none" id="kt_modal_upload_form">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Upload files</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body pt-10 pb-15 px-lg-17">
                            <!--begin::Input group-->
                            <div class="form-group">
                                <!--begin::Dropzone-->
                                <div class="dropzone dropzone-queue mb-2" id="kt_modal_upload_dropzone">
                                    <!--begin::Controls-->
                                    <div class="dropzone-panel mb-4">
                                        <a class="dropzone-select btn btn-sm btn-primary me-2">Attach files</a>
                                        <a class="dropzone-upload btn btn-sm btn-light-primary me-2">Upload All</a>
                                        <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove All</a>
                                    </div>
                                    <!--end::Controls-->
                                    <!--begin::Items-->
                                    <div class="dropzone-items wm-200px">
                                        <div class="dropzone-item p-5" style="display:none">
                                            <!--begin::Documents-->
                                            <div class="dropzone-file">
                                                <div class="dropzone-filename text-dark" title="some_image_file_name.jpg">
                                                    <span data-dz-name="">some_image_file_name.jpg</span>
                                                    <strong>(
                                                        <span data-dz-size="">340kb</span>)</strong>
                                                </div>
                                                <div class="dropzone-error mt-0" data-dz-errormessage=""></div>
                                            </div>
                                            <!--end::Documents-->
                                            <!--begin::Progress-->
                                            <div class="dropzone-progress">
                                                <div class="progress bg-light-primary">
                                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                                </div>
                                            </div>
                                            <!--end::Progress-->
                                            <!--begin::Toolbar-->
                                            <div class="dropzone-toolbar">
                                                <span class="dropzone-start">
                                                    <i class="bi bi-play-fill fs-3"></i>
                                                </span>
                                                <span class="dropzone-cancel" data-dz-remove="" style="display: none;">
                                                    <i class="bi bi-x fs-3"></i>
                                                </span>
                                                <span class="dropzone-delete" data-dz-remove="">
                                                    <i class="bi bi-x fs-1"></i>
                                                </span>
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Dropzone-->
                                <!--begin::Hint-->
                                <span class="form-text fs-6 text-muted">Max file size is 1MB per file.</span>
                                <!--end::Hint-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Modal body-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!--end::Modal - Upload Documents-->
        <!--begin::Modal - New Product-->
        <div class="modal fade" id="kt_modal_move_to_folder" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <form class="form" action="#" id="kt_modal_move_to_folder_form">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Move to folder</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body pt-10 pb-15 px-lg-17">
                            <!--begin::Input group-->
                            <div class="form-group fv-row">
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio" value="0" id="kt_modal_move_to_folder_0" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_0">
                                            <div class="fw-bold">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                                        <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->account
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio" value="1" id="kt_modal_move_to_folder_1" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_1">
                                            <div class="fw-bold">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                                        <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->apps
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio" value="2" id="kt_modal_move_to_folder_2" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_2">
                                            <div class="fw-bold">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                                        <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->widgets
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio" value="3" id="kt_modal_move_to_folder_3" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_3">
                                            <div class="fw-bold">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                                        <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->assets
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio" value="4" id="kt_modal_move_to_folder_4" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_4">
                                            <div class="fw-bold">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                                        <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->documentation
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio" value="5" id="kt_modal_move_to_folder_5" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_5">
                                            <div class="fw-bold">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                                        <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->layouts
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio" value="6" id="kt_modal_move_to_folder_6" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_6">
                                            <div class="fw-bold">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                                        <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->modals
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio" value="7" id="kt_modal_move_to_folder_7" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_7">
                                            <div class="fw-bold">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                                        <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->authentication
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio" value="8" id="kt_modal_move_to_folder_8" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_8">
                                            <div class="fw-bold">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                                        <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->dashboards
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio" value="9" id="kt_modal_move_to_folder_9" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_9">
                                            <div class="fw-bold">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                                        <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->pages
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Action buttons-->
                            <div class="d-flex flex-center mt-12">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" id="kt_modal_move_to_folder_submit">
                                    <span class="indicator-label">Save</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--begin::Action buttons-->
                        </div>
                        <!--end::Modal body-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!--end::Modal - Move file-->
        <!--end::Modals-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


<!--end::Modal - Invite Friend-->
<!--end::Modals-->
<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('assets/js/custom/apps/file-manager/list.js') }}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
@endsection
