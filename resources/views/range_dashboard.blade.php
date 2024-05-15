@extends('layouts.app')

@section('content')
<style>
    .nav-link {
            font-weight: 600;
            color: blue !important;
        }

        .nav-link:hover {
            color: green !important;
        }

</style>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <h5 class="text-center mb-2">WELCOME {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h5>
            <h1 class="text-center text-primary mb-5 text-uppercase">LOCATION: <span class=" text-uppercase">
                {{ auth()->user()->staff->branch ? auth()->user()->staff->branch->branch_name : '' }} </span> </h1>
                <div class="row">
                    <div class=" justify-content-between">
                        <ul class="nav nav-tabs bg-primary" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="letter-tab" data-toggle="tab" href="#letter" role="tab" aria-controls="letter" aria-selected="true">My Departmental Document</a>
                            </li>
                              <li class="nav-item">
                                <a class="nav-link" id="letter1-tab" data-toggle="tab" href="#letter1" role="tab" aria-controls="letter1" aria-selected="true">
                                    @if(auth()->user()->staff && auth()->user()->staff->branch_id == 23)
                                    Incoming Letter
                                    @else
                                    Letter Of Intent
                                    @endif
                                </a>
                              </li>
                          </ul>
                          <div class="tab-content " id="myTabContent">
                            <div class="tab-pane fade show active" id="letter" role="tabpanel" aria-labelledby="letter-tab">
                                <div class="row g-5 g-xl-8">
                                <div class="row">
                                    <div class="col-md-3">
                                     {{-- {!! Form::label('department_id', 'Cick To Select User Department:', ['style' => 'font-weight:bold;']) !!}
                                     {!! Form::select('department_id', $departments_data1, null, ['class' => 'form-control', 'id' => 'deptSelect1']) !!}
                                    --}}
                                    <input type="hidden" id="deptSelect1" value="{{ auth()->user()->staff->department_id }}" />

                                        </div>
                                </div>
                                   <div class="row">
                                        <div class="col-md-12 depDoc1" id="depDoc1">

                                            <div class="card">

                                    <div class="card-body p-5">
                                        <h4 class="card-title">
                                                  <i class="fas fa-envelope"></i>
                                                 Latest 10 Departmental Document
                                                </h4>
                                        <div class="table-responsive1" style="overflow-y: auto;">
                                            <table class="table align-middle gs-0 gy-4" id="order-listing2">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Document Title</th>
                                                        <th>Created By</th>
                                                        <th>Assigned By</th>
                                                        <th>Assigned To</th>
                                                        <th>Document URL</th>
                                                        <th>Share User</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="documentsTableBody">
                            </tbody>
                                            </table>
                                        </div>


                                    </div>

                          {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    --}}
                                   <script>
                             document.addEventListener("DOMContentLoaded", function () {
                                // Fetch Departmental Documents based on selected department
                                document.getElementById('deptSelect1').addEventListener('change', function () {
                                    let departmentId = this.value;
                                    //alert(departmentId);
                                    fetchDocumentsData(departmentId);
                                });

                                // Initial Fetch on Page Load
                                let departmentId = document.getElementById('deptSelect1').value;
                                fetchDocumentsData(departmentId);
                            });

                            function fetchDocumentsData(departmentId) {
                                fetch(`/showDepartementalDocuments/${departmentId}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        displayDocumentsData(data);
                                    })
                                    .catch(error => console.error('Error:', error));
                            }

                            function displayDocumentsData(documents) {
                            let tableBody = document.getElementById('documentsTableBody');
                            tableBody.innerHTML = '';
                            //alert(JSON.stringify(documents));

                            if (documents.length === 0) {
                                let noResultsRow = `
                                    <tr>
                                        <td colspan="7" class="text-center text-danger"><strong>No results found</strong></td>
                                    </tr>
                                `;
                                tableBody.insertAdjacentHTML('beforeend', noResultsRow);
                            } else {
                                //alert(JSON.stringify(documents));
                                documents.forEach((document, index) => {
                                    var fullUrl = "{{ asset('') }}" + document.document_url;
                                    let row = `
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${document.title}</td>
                                            <td>${document.created_by_name}</td>
                                            <td>${document.assigned_by_name}</td>
                                            <td>${document.assigned_to_name}</td>
                                            <td><a class="document-link" target="_blank" onClick="saveData('${ document.document_url }')" href="${ fullUrl }">${ document.document_url.substr(10) }</a></td>
                                            <td><a class="open-modal-shareuser btn btn-primary" href="#" data-toggle="modal" data-target="#shareuserModal"
                                                                data-shareuser=${document.d_m_id}>User</a></td>
                                        </tr>
                                    `;
                                    tableBody.insertAdjacentHTML('beforeend', row);
                                });
                            }
                        }



                        </script>

                                </div>
                                        </div>
                                                  <div class="modal fade" id="shareuserModal" tabindex="-1" role="dialog" aria-labelledby="shareuserModalLabel"
                        aria-hidden="true" data-backdrop="false">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    {!! Form::open(['route' => 'documents_manager.shareuser', 'enctype' => 'multipart/form-data']) !!}
                                @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">User Permission</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            {!! Form::label('users', 'Select User(s):') !!}
                                            {!! Form::select('users[]', $users123, null, ['class' => 'form-control', 'id' => 'userSelect', 'multiple' => 'multiple']) !!}

                                            {!! Form::hidden('shareuser_id', null, ['id' => 'shareuser_id']) !!}
                                            {!! Form::hidden('notify_id', null, ['id' => 'notify_id']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::checkbox('specify_su', 0, null, ['id' => 'specify_su']) !!}
                                            {!! Form::label('specify_su', 'Specify the period') !!}
                                        </div>
                                        <div class="form-group" id="enable_date" style="display: none">
                                            {!! Form::label('start_date', 'Start Date') !!}
                                            {!! Form::date('start_date', null, ['class' => 'form-control','id' => 'start_date1']) !!}<br/>
                                            {!! Form::label('end_date', 'End Date') !!}
                                            {!! Form::date('end_date', null, ['class' => 'form-control','id' => 'end_date1']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::checkbox('is_download', 1, ['id' => 'is_download']) !!}
                                            {!! Form::label('is_download', 'Allow Download') !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::checkbox('allow_share', 1, ['id' => 'allow_share']) !!}
                                            {!! Form::label('allow_share', 'Allow Share') !!}
                                        </div>
                                        {!! Form::label('comment', 'Type your comment:') !!}
                                            <div class="form-group">
                                                <div class="custom-comment">
                                                    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>



                                </div>
                            </div>
                            </div>

                    <div class="tab-pane fade" id="demand" role="tabpanel" aria-labelledby="demand-tab" >
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="card" style="width: 800px;">
                            <div class="card-body p-5">
                                <h4 class="card-title">
                                          <i class="fas fa-envelope"></i>
                                         Latest Demand Notice
                                        </h4>
                                <div class="table-responsive1" style="overflow-y: auto;">
                                    <table class="table align-middle gs-0 gy-4" id="order-listing11">
                                                  <thead>
                                                      <tr>
                                                          <th>S/N</th>
                                                          <th>Client</th>
                                                          <th>Service</th>
                                                         {{--  <th>Service Type</th> --}}
                                                          <th>Amount</th>
                                                          <th>Created Date</th>
                                                          <th>Action</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>

                                                      @foreach ($service_applications as $index => $service_application)
                                                          @php @endphp
                                                          <tr>
                                                              <td>{{ $index + 1 }}</td>
                                                              <td>{{ $service_application->employer() ? $service_application->employer()->company_name : 'NILL' }}</td>
                                                              <td>{{ $service_application->service ? $service_application->service->name : '' }}</td>
{{--                                                               <td>{{ $service_application->processingTypes ? $service_application->processingTypes->name : 'NILL' }}</td>
 --}}                                 {{-- <td><?php //$type = \App\Models\ProcessingType::where('service_id', $service_application->id)->first(); ?>
                                      {{ $type->name ?? 'NILL' }}
                                             </td>               --}}

<td><?php if(isset($service_application->equipment_fees_list)){
    // Assuming $service_application->equipment_fees_list is the JSON string
    $equipment_fees_list = json_decode($service_application->equipment_fees_list, true); // Convert JSON to PHP array

    $sum = 0;
    foreach ($equipment_fees_list as $item) {
        $sum += $item['price'];
    } ?>
    {{ isset($service_application->equipment_fees_list) ? '₦'. number_format($sum, 2) : 'N/A' }}
<?php } ?>
</td>
<td>{{ $service_application->created_at ?? 'NILL' }}</td>
                                                               <td>
                                                                <a href="javascript:void(0)" onclick="confirmApproval('{{ route('approve_demand_notice', $service_application->id) }}')" class="btn btn-primary">Approve</a>
                                                            </td>

                                                          </tr>
                                                      @endforeach
                                                  </tbody>
                                              </table>
                                </div>
                                <script>
                                    function confirmApproval(url) {
                                        if (confirm('Are you sure you want to approve this demand notice?')) {
                                            window.location.href = url;
                                        }
                                    }
                                </script>

                            </div></div></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="revenue" role="tabpanel" aria-labelledby="revenue-tab">
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10 justify-content-end" style="">
                            <div class="col-5">
                                <div class="row">
                                    <!-- <div class="col-3">
                                        {!! Form::label('', 'Filter By', ['class'=>'form-label mt-2']) !!}
                                    </div> -->
                                    <div class="col-3">
                                     {!! Form::select('service_id', $services, null, ['class' => 'form-select', 'id' => 'serviceSelect']) !!}
                                    </div>

                                    <div class="col-3">
                                        <select class="form-select" id="monthSelect" name="month">
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
                                        <select class="form-select" id="yearSelect" name="year">
                @php
                    $currentYear = date('Y');
                    $startYear = 2024; // Adjust as needed
                    $endYear = $currentYear; // Adjust as needed
                @endphp
                @for ($year = $startYear; $year <= $endYear; $year++)
                    <option value="{{ $year }}" {{ $year == $currentYear ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endfor
            </select>

                                    </div>
                                    <div class="col-3">        <button type="button" id="searchBtn" class="btn btn-primary">SEARCH</button>
             </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-5 g-xl-8">
                            <div class="col-xl-3">
                                <!--begin::Statistics Widget 5-->
                                <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                        <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none">
                                                <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
                                                <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                                    fill="currentColor" />
                                                <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
                                                <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5" id="pending_application_forms"></div>
                                        <div class="fw-bold"><b>Total Number OF Pending Application Forms</b></div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Statistics Widget 5-->
                            </div>
                            <div class="col-xl-3">
                                <!--begin::Statistics Widget 5-->
                                <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                                        <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none">
                                                <path opacity="0.3"
                                                    d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5" id="pending_inspections"></div>
                                        <div class="fw-bold text-gray-100">Total Number Of Pending Inspections </div>
                                    </div>
                                    <!--end::Body-->
                                </a>


                                <!--end::Statistics Widget 5-->
                            </div>
                            <div class="col-xl-3">
                                <!--begin::Statistics Widget 5-->
                                <a href="#" class="card bg-info hoverable card-xl-stretch mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <!-- Path for the bank icon with opacity 0.3 -->
                                 <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
                                 <!-- Path for the bank icon -->
                                    <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
                                   </svg>
                                   </span>

                                        <!--end::Svg Icon-->

                                        <div class="text-white fw-bolder fs-2 mb-2 mt-5" id="total_amount">  </div>
                                        <div class="fw-bold text-white">Total Revenue Generated</div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Statistics Widget 5-->
                            </div>
                            <div class="col-xl-3">
                                <!--begin::Statistics Widget 5-->
                                <a href="#" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                                        <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none">
                                                <path opacity="0.3"
                                                    d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5" id="total_permit"></div>
                                        <div class="fw-bold text-gray-100">Total Permits And Licences Issued</div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Statistics Widget 5-->
                            </div>

                        </div>
</div>
<div class="tab-pane fade" id="letter1" role="tabpanel" aria-labelledby="letter1-tab">
    <div class="col-md-12 grid-margin stretch-card depDoc2" id="depDoc2">
         {{-- <div class="col-md-3">
                     {!! Form::label('department_id', 'Click to select user department:') !!}
                     {!! Form::select('department_id', $departments_data, null, ['class' => 'form-control', 'id' => 'inDeptSelect']) !!}

                        </div> --}}
                            <div class="card">
                    <div class="card-body p-5">
                        <h4 class="card-title">
                                  <i class="fas fa-envelope"></i>
                                  @if(auth()->user()->staff && auth()->user()->staff->branch_id == 23)
                                  Latest 10 Incoming Letter
                                  @else
                                  Latest 10 Letter Of Intent
                                  @endif
                                </h4>
                        <div class="table-responsive1" style="overflow-y: auto;">
                            <table class="table align-middle gs-0 gy-4" id="order-listing11">
                                          <thead>
                                              <tr>
                                                  {{-- <th>S/N</th> --}}
                                                  <th>Document Title</th>
                                                  <th>Sender Name</th>
                                                  <th>Sender Email</th>
                                                  <th>Sender Phone</th>
                                                  <th>Document URL</th>
                                                  <th>User Share</th>
                                                  <th>Subject</th>
                                                  <th>Created Date</th>
                                              </tr>
                                          </thead>
                                          <tbody>

                                              @foreach ($documents1 as $document)
                                                  @php @endphp
                                                  <tr>
                                                      {{-- <td>{{ $n++ }}</td> --}}
                                                      <td>{{ $document->title ?? 'NILL' }}</td>
                                                      <td>{{ $document->sender_full_name ?? 'NILL' }}</td>
                                                      <td>{{ $document->sender_email ?? 'NILL' }}</td>
                                                      <td>{{ $document->sender_phone ?? 'NILL' }}</td>
                                                      {{-- <td>{{ $document->description }}</td> --}}

                                                      <td>
                                                        <a class="document-link" target="_blank" onClick="saveData('{{ $document->document_url }}')" href="{{ asset($document->document_url) }}">{{ substr($document->document_url, 10) }}</a>
                                                    </td>
                                          <td><a class="open-modal-shareuser btn btn-primary" href="#" data-toggle="modal" data-target="#shareuserModal1"
                                            data-shareuser={{ $document->d_id }}>User</a></td>
                                                      <td>{{ $document->doc_description ?? 'NILL' }}</td>
                                                      <td>{{ $document->document_created_at ?? 'NILL' }}</td>


                                                  </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                        </div>


                    </div>



                   <script>
             document.addEventListener("DOMContentLoaded", function () {
                // Fetch Departmental Documents based on selected department
                document.getElementById('inDeptSelect').addEventListener('change', function () {
                    let departmentId = this.value;
                    fetchDocuments(departmentId);
                });

                // Initial Fetch on Page Load
                let departmentId = document.getElementById('inDeptSelect').value;
                fetchDocuments(departmentId);
            });

            function fetchDocuments(departmentId) {
                fetch(`/showIncomingDepartementalDocuments/${departmentId}`)
                    .then(response => response.json())
                    .then(data => {
                        displayDocuments(data);
                    })
                    .catch(error => console.error('Error:', error));
            }

            function displayDocuments(documents) {
            let tableBody = document.getElementById('incomingDocumentsTableBody');
            tableBody.innerHTML = '';

            documents.forEach((document, index) => {
                var fullUrl = "{{ asset('') }}" + document.document_url;
                let row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${document.title}</td>
                        <td>${document.sender_full_name}</td>
                        <td>${document.sender_email}</td>
                        <td>${document.sender_phone}</td>
                        <td><a target="_blank" class="document-link" onClick="saveData('${ document.document_url }')" href="${ fullUrl }">${ document.document_url.substr(10) }</a></td>
                        <td><a class="open-modal-shareuser btn btn-primary" href="#" data-toggle="modal" data-target="#shareuserModal1"
                                            data-shareuser=${document.d_m_id}>User</a></td>
                        <td>${document.doc_description}</td>
                        <td>${document.assigned_created_at}</td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
        }

        </script>

                </div>
                        </div>

                        <div class="modal fade" id="shareuserModal1" tabindex="-1" role="dialog" aria-labelledby="shareuserModalLabel1"
aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            {!! Form::open(['route' => 'incoming_documents_manager.shareuser', 'enctype' => 'multipart/form-data']) !!}
        @csrf
            <div class="modal-header">
                <h5 class="modal-title">User Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    {!! Form::label('users', 'Select User(s):') !!}
                    {!! Form::select('users[]', $users123, null, ['class' => 'form-control', 'id' => 'userSelect', 'multiple' => 'multiple']) !!}

                    {!! Form::hidden('shareuser_id', null, ['id' => 'shareuser1_id']) !!}
                    {!! Form::hidden('notify_id', null, ['id' => 'notify_id']) !!}
                </div>
                <div class="form-group">
                    {!! Form::checkbox('specify_su', 0, null, ['id' => 'specify_su']) !!}
                    {!! Form::label('specify_su', 'Specify the period') !!}
                </div>
                <div class="form-group" id="enable_date" style="display: none">
                    {!! Form::label('start_date', 'Start Date') !!}
                    {!! Form::date('start_date', null, ['class' => 'form-control','id' => 'start_date1']) !!}<br/>
                    {!! Form::label('end_date', 'End Date') !!}
                    {!! Form::date('end_date', null, ['class' => 'form-control','id' => 'end_date1']) !!}
                </div>
                <div class="form-group">
                    {!! Form::checkbox('is_download', 1, ['id' => 'is_download']) !!}
                    {!! Form::label('is_download', 'Allow Download') !!}
                </div>
                <div class="form-group">
                    {!! Form::checkbox('allow_share', 1, ['id' => 'allow_share']) !!}
                    {!! Form::label('allow_share', 'Allow Share') !!}
                </div>
                {!! Form::label('comment', 'Type your comment:') !!}
                    <div class="form-group">
                        <div class="custom-comment">
                            {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>
                          </div>

                     </div>
            </div>



            <br>
            <br>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on("click", ".open-modal-shareuser", function() {
        let shareuser = $(this).data('shareuser');
        $(".modal-body #shareuser_id").val(shareuser);
        $(".modal-body #shareuser1_id").val(shareuser);
    });

   $(document).ready(function() {
        // Function to update statistics based on selected options
        function updateStatistics() {
            var serviceId = $('#serviceSelect').val();
            var month = $('#monthSelect').val();
            var year = $('#yearSelect').val();

            $.ajax({
                url: '/get-for-area-manager/' + serviceId,
                type: 'GET',
                data: {
                    month: month,
                    year: year
                },
                success: function(data) {
                    // Update the statistics cards with the received data
                    $('#pending_application_forms').text(data.pending_application_forms);
                    $('#pending_inspections').text(data.pending_inspections);
                    $('#total_amount').text(data.total_amount);
                    $('#total_permit').text(data.total_permit);
                },
                error: function(xhr, status, error) {
                    // Handle error if any
                    console.error(error);
                }
            });
        }

        // Event listener for the search button
        $('#searchBtn').click(function() {
            updateStatistics();
        });

        // Initialize the month and year selects with current values
        var currentMonth = new Date().getMonth() + 1;
        var currentYear = new Date().getFullYear();

        $('#monthSelect').val(currentMonth);
        $('#yearSelect').val(currentYear);

        // Trigger initial statistics update
        updateStatistics();
    });

</script>


            @endsection
