@extends('layouts.app')

@section('content')
<h4 class="text-black-50 pt-5">SOCIAL SECURITY:<b style="color: #000"> Overview</b></h4>
<br>

<!--begin::Row-->
<div class="row g-5 g-xl-8">
    <div class="col-sm-6 col-xl-4">
        <!--begin: Statistics Widget 6-->
        <div class="card  shadow bg-light-success card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body my-3">
                <span class="float-end">
                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5"></div>
                </span>
                <a href="#" class="card-title fw-bold text-success fs-5 mb-3 d-block">Number Of Project Completed</a>

                <div class="py-1">
                    <span class="text-dark fs-1 fw-bold me-2">0</span>
                    <span class="fw-semibold text-muted fs-7"></span>
                </div>
                {{-- <div class="progress h-7px bg-success bg-opacity-50 mt-7">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
            </div>
            <!--end:: Body-->
        </div>
        <!--end: Statistics Widget 6-->
    </div>

    <div class="col-sm-6 col-xl-4">
        <!--begin: Statistics Widget 6-->
        <div class="card  shadow bg-light-warning card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body my-3">
                <span class="float-end">
                    <div class="text-white fw-bold fs-2 mb-2 mt-5"></div>
                </span>
                <a href="#" class="card-title fw-bold text-black fs-5 mb-3 d-block">New Notifications(incoming Logbook)</a>
                <div class="py-1">
                    <span class="text-white fs-1 fw-bold me-2">0</span>
                    <span class="fw-semibold text-muted fs-7"></span>
                </div>
                {{-- <div class="progress h-7px bg-white bg-opacity-50 mt-7">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
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
                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5"></div>
                </span>
                <a href="#" class="card-title fw-bold text-primary fs-5 mb-3 d-block">Treated Notification (Outgoing Logbook)</a>
                <div class="py-1">
                    <span class="text-dark fs-1 fw-bold me-2">0</span>
                    <span class="fw-semibold text-muted fs-7"></span>
                </div>
                {{-- <div class="progress h-7px bg-secondary bg-opacity-50 mt-7">
                    <div class="progress-bar bg-secondry" role="progressbar" style="width: 76%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
            </div>
            <!--end:: Body-->
        </div>
        <!--end: Statistics Widget 6-->
    </div>
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
                <span class="card-label fw-bold text-dark">New WorkShop Seminar</span>
                <span class="text-gray-400 pt-2 fw-semibold fs-6">Schedule</span>
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




@endsection