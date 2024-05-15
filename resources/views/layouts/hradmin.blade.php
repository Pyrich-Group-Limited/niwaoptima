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
        <h4 class="text-black-50 pt-5">Human Resource :<b style="color: #000"> Overview</b></h4>
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
                      <!--begin::Value-->
                      <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">{{$registered_employees}}</span>
                      <!--end::Value-->
                      <!--begin::Label-->
                      <span class="badge badge-light-success fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->2.2%</span>
                      <!--end::Label-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-gray-400">Total Employees</span>
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
                      <span class="badge badge-light-danger fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                            <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->2.2%</span>
                      <!--end::Badge-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Subtitle-->
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Promotions This Month</span>
                    <!--end::Subtitle-->
                  </div>
                  <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end pt-0">
                  <!--begin::Progress-->
                  <div class="d-flex align-items-center flex-column mt-3 w-100">
                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                      <span class="fw-bolder fs-6 text-dark">1,048 to Goal</span>
                      <span class="fw-bold fs-6 text-gray-400">62%</span>
                    </div>
                    <div class="h-8px mx-3 w-100 bg-light-success rounded">
                      <div class="bg-success rounded h-8px" role="progressbar" style="width: 62%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
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
                      <span class="badge badge-light-success fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->2.6%</span>
                      <!--end::Label-->
                    </div>
                    <!--end::Statistics-->
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-gray-400">Active Loans</span>
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
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Retirement Approaching</span>
                    <!--end::Subtitle-->
                  </div>
                  <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex flex-column justify-content-end pe-0">
                  <!--begin::Title-->
                  <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s Heroes</span>
                  <!--end::Title-->
                  <!--begin::Users group-->
                  <div class="symbol-group symbol-hover flex-nowrap">
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
                      <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                    </div>

                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                      <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                    </div>

                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Perry Matthew">
                      <span class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
                    </div>

                    <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                      <span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
                    </a>
                  </div>
                  <!--end::Users group-->
                </div>
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
        <div class="col-xxl-6 mb-5 mb-xl-10">
          <!--begin::Maps widget 1-->
          <div class="card card-flush h-md-100">
            <!--begin::Header-->
            <div class="card-header flex-nowrap pt-5">
              <!--begin::Title-->
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-dark">Industrial Relation and Staff Matters</span>
                <span class="text-gray-400 pt-2 fw-semibold fs-6">Graphical representations of Industrial Relation and Staff Matters</span>
              </h3>
              <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-5 ps-6">
              <div id="kt_charts_widget_5" class="min-h-auto"></div>
            </div>
            <!--end::Body-->
          </div>
          <!--end::Maps widget 1-->
        </div>
        <!--end::Col-->
      </div>
      <!--end::Row-->


      <!--begin::Row-->
      <div class="row">
        <!--begin::Col-->
        <div class="col-xxl-12 col-md-12 mb-5 mb-xl-10">
          <!--begin::Maps widget 1-->
          <div class="card card-flush h-md-100">
            <!--begin::Header-->
            <div class="card-header flex-nowrap pt-5">
              <!--begin::Title-->
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-dark">Events Calendar</span>
                <span class="text-gray-400 pt-2 fw-semibold fs-6">All events and schedule</span>
              </h3>
              <div class="float-end">
                <button id="add-event-button" class="btn btn-primary py-3" data-toggle="modal" data-target="#event-modal">Add Event</button>
              </div>
              <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-5 ps-6">
              <div class="p-5" id="calendar"></div>
            </div>
            <!--end::Body-->
          </div>
          <!--end::Maps widget 1-->
        </div>
        <!--end::Col-->

        <!-- Event Modal -->
        <!--begin::Modal - New Card-->
        <div id="event-modal" class="modal fade" tabindex="-1" aria-hidden="true" role="dialog" aria-hidden="true" data-backdrop="false">
          <!--begin::Modal dialog-->
          <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
              <!--begin::Modal header-->
              <div class="modal-header">
                <!--begin::Modal title-->
                <h4 class="card-title">Event Details</h4>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
              <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="event-form" class="kt_modal_new_card_form" method="POST">
                  @csrf
                  <input type="hidden" name="event_id" id="event_id">
                  <div class="d-flex flex-column mb-7 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span for="title" class="required">Title</span>
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify event's title"></i>
                    </label>
                    <input type="text" class="form-control form-control-solid" id="title" name="title">
                  </div>
                  <div class="d-flex flex-column mb-7 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span for="start" class="required">Start Date and Time</span>
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify start date and time"></i>
                    </label>
                    <input type="datetime-local" class="form-control form-control-solid" id="start" name="start">
                  </div>
                  <div class="d-flex flex-column mb-7 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span for="title" class="required">End Date and Time</span>
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify end date and time"></i>
                    </label>
                    <input type="datetime-local" class="form-control form-control-solid" id="end" name="end">
                  </div>
                  <div class="d-flex flex-column mb-7 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span for="departments" class="required">Departments</span>
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify event's departments"></i>
                    </label>
                    <select multiple class="form-control form-control-solid" id="departments1" name="department_ids[]">

                    </select>
                  </div>
                  <div class="d-flex flex-column mb-7 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span for="rankings" class="required">Rankings</span>
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify event's ranking"></i>
                    </label>
                    <select multiple class="form-control form-control-solid" id="rankings1" name="ranking_ids[]">

                    </select>
                  </div>
                  <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                  <!--begin::Actions-->
                  <div class="text-center pt-15">
                    <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_modal_new_card_submit" class="btn submit btn-primary">
                      <span class="indicator-label">Save</span>
                      <span class="indicator-progress">Please wait...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                  </div>
                  <!--end::Actions-->
                </form>
                <!--end::Form-->
              </div>
              <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
          </div>
          <!--end::Modal dialog-->
        </div>
        <!--end::Modal - New Card-->

      </div>


      <div class="row g-5 g-xl-10">
        <div class="col-xxl-12 mb-5 mb-xl-10">
          <!--begin::Chart widget 13-->
          <div class="card card-flush h-md-100">
            <!--begin::Header-->
            <div class="card-header pt-7">
              <!--begin::Title-->
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-dark">Workforce Dynamics Overview</span>
                <span class="text-gray-400 pt-2 fw-semibold fs-6">Tracking Promotions, New Hires, and Retirements</span>
              </h3>
              <!--end::Title-->
              <!--begin::Toolbar-->
              <div class="card-toolbar">
                <!--begin::Menu-->
                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                  <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                  <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor" />
                      <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                      <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                      <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </button>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-100px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Remove</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Mute</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Settings</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
                <!--end::Menu-->
              </div>
              <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-5">
              <!--begin::Chart container-->
              <div id="kt_charts_widget_13_chart" class="w-100 h-325px"></div>
              <!--end::Chart container-->
            </div>
            <!--end::Body-->
          </div>
          <!--end::Chart widget 13-->
        </div>
        <!--end::Col-->
      </div>
      <!-- Begin::Row -->
      <div class="row g-5 g-xl-10">
        <div class="col-xxl-12 mb-5 mb-xl-10">
          <!--begin::Tables Widget 12-->
          <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">REGISTRATION SHORTCUT</span>
                <!-- <span class="text-muted mt-1 fw-semibold fs-7">Over 500 new members</span> -->
              </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
              <!-- Tabs navs -->
              <ul class="nav nav-tabs" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="ex2-tab-1" data-bS-toggle="tab" href="#ex2-tabs-1" role="tab" aria-controls="ex2-tabs-1" aria-selected="true">REGISTERED EMPLOYERS</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="ex2-tab-2" data-bs-toggle="tab" href="#ex2-tabs-2" role="tab" aria-controls="ex2-tabs-2" aria-selected="false">PENDING EMPLOYERS</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="ex2-tab-3" data-bs-toggle="tab" href="#ex2-tabs-3" role="tab" aria-controls="ex2-tabs-3" aria-selected="false">REGISTERED EMPLOYEES</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="ex2-tab-4" data-bs-toggle="tab" href="#ex2-tabs-4" role="tab" aria-controls="ex2-tabs-4" aria-selected="false">INCOMPLETE EMPLOYEES</a>
                </li>
              </ul>
              <!-- Tabs navs -->

              <!-- Tabs content -->
              <div class="tab-content" id="ex2-content">
                <div class="tab-pane fade show active" id="ex2-tabs-1" role="tabpanel" aria-labelledby="ex2-tab-1">
                  <!--begin::Table container-->
                  <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4">
                      <!--begin::Table head-->
                      <thead>
                        <tr class="fw-bold text-muted bg-light">
                          <th class="ps-4 min-w-200px rounded-start">ECS Number</th>
                          <th class="min-w-200px">Company Name</th>
                          <th class="min-w-200px">Company Email</th>
                          <th class="min-w-200px">Business Area</th>
                          <th class="min-w-200px text-end rounded-end">ACTIONS</th>
                        </tr>
                      </thead>
                      <!--end::Table head-->
                      <!--begin::Table body-->
                      <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <td>
                            {{ $item->ecs_number }}
                          </td>
                          <td>
                            {{ $item->company_name }}
                          </td>
                          <td>
                            {{ $item->company_email }}
                          </td>
                          <td>
                            {{ $item->business_area }}
                          </td>
                          <td class="text-end">
                            <a href="{{ route('employers.show', [$item->id]) }}" class='btn btn-default btn-xs'>
                              <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('employer.employees', [$item->id]) }}" class='btn btn-default btn-xs'>
                              <i class="far fa-user"></i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <!--end::Table body-->
                    </table>
                    <div class="card-footer clearfix">
                      <div class="float-right">
                        @include('adminlte-templates::common.paginate', [
                        'records' => $data,
                        ])
                      </div>
                    </div>
                    <!--end::Table-->
                  </div>
                  <div class="tab-pane fade" id="ex2-tabs-2" role="tabpanel" aria-labelledby="ex2-tab-2">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                      <!--begin::Table-->
                      <table class="table align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                          <tr class="fw-bold text-muted bg-light">
                            <th class="ps-4 min-w-200px rounded-start">REGISTERED EMPLOYERS</th>
                            <th class="min-w-200px">PENDING EMPLOYERS</th>
                            <th class="min-w-200px">REGISTERED EMPLOYEES</th>
                            <th class="min-w-200px">INCOMPLETE EMPLOYEES</th>
                            <th class="min-w-200px text-end rounded-end">ACTIONS</th>
                          </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                          <tr>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$8,000,000</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Pending</span>
                            </td>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$5,400</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Paid</span>
                            </td>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                Design</span>
                            </td>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                Design</span>
                            </td>
                            <td class="text-end">
                              <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                              <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                            </td>
                          </tr>
                        </tbody>
                        <!--end::Table body-->
                      </table>
                      <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                  </div>
                  <div class="tab-pane fade" id="ex2-tabs-3" role="tabpanel" aria-labelledby="ex2-tab-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                      <!--begin::Table-->
                      <table class="table align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                          <tr class="fw-bold text-muted bg-light">
                            <th class="ps-4 min-w-200px rounded-start">REGISTERED EMPLOYERS</th>
                            <th class="min-w-200px">PENDING EMPLOYERS</th>
                            <th class="min-w-200px">REGISTERED EMPLOYEES</th>
                            <th class="min-w-200px">INCOMPLETE EMPLOYEES</th>
                            <th class="min-w-200px text-end rounded-end">ACTIONS</th>
                          </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                          <tr>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$8,000,000</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Pending</span>
                            </td>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$5,400</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Paid</span>
                            </td>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                Design</span>
                            </td>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                Design</span>
                            </td>
                            <td class="text-end">
                              <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                              <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                            </td>
                          </tr>
                        </tbody>
                        <!--end::Table body-->
                      </table>
                      <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                  </div>
                  <div class="tab-pane fade" id="ex2-tabs-4" role="tabpanel" aria-labelledby="ex2-tab-4">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                      <!--begin::Table-->
                      <table class="table align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                          <tr class="fw-bold text-muted bg-light">
                            <th class="ps-4 min-w-200px rounded-start">REGISTERED EMPLOYERS</th>
                            <th class="min-w-200px">PENDING EMPLOYERS</th>
                            <th class="min-w-200px">REGISTERED EMPLOYEES</th>
                            <th class="min-w-200px">INCOMPLETE EMPLOYEES</th>
                            <th class="min-w-200px text-end rounded-end">ACTIONS</th>
                          </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                          <tr>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$8,000,000</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Pending</span>
                            </td>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$5,400</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Paid</span>
                            </td>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                Design</span>
                            </td>
                            <td>
                              <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">Intertico</a>
                              <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX
                                Design</span>
                            </td>
                            <td class="text-end">
                              <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                              <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                            </td>
                          </tr>
                        </tbody>
                        <!--end::Table body-->
                      </table>
                      <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                  </div>
                </div>
                <!-- Tabs content -->
              </div>
              <!-- Tabs content -->
            </div>
            <!--begin::Body-->
          </div>
          <!--end::Tables Widget 12-->
          <div class="card">
            <div class="card-body">
              {{-- <h4 class="card-title">Events</h4> --}}
              <button id="add-event-button" class="btn btn-primary" data-toggle="modal" data-target="#event-modal">Add Event</button>
              <div id="calendar"></div>

              <!-- Event Modal -->
              <div id="event-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Event Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form id="event-form" method="POST">
                        @csrf
                        <input type="hidden" name="event_id" id="event_id">
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                          <label for="start">Start Date and Time</label>
                          <input type="datetime-local" class="form-control" id="start" name="start">
                        </div>
                        <div class="form-group">
                          <label for="end">End Date and Time</label>
                          <input type="datetime-local" class="form-control" id="end" name="end">
                        </div>
                        <div class="form-group">
                          <label for="departments">Departments</label>
                          <select multiple class="form-control" id="departments1" name="department_ids[]">

                          </select>
                        </div>
                        <div class="form-group">
                          <label for="rankings">Rankings</label>
                          <select multiple class="form-control" id="rankings1" name="ranking_ids[]">

                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End::Row -->
    </div>
    <!--end::Content container-->
  </div>
  <!--end::Content-->
</div>
<!--end::Content wrapper-->

@endsection


@push('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> --}}
<script src="{{ asset('public/js/jquery-3.7.0.min.js')}}"></script>
@endpush
