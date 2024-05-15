@extends('layouts.app')

@section('content')
    <style>
        .hidden1,
        .departmenthide,
        .depDoc1,
        .depDoc2 {
            display: none;
        }
        .nav-link {
            font-weight: 600;
            color: blue !important;
        }

        .nav-link:hover {
            color: green !important;
        }
        .btn.btn-primary:hover,
        .btn.btn-primary:focus {
            background: purple;
            border-color: purple;
        }
    </style>
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <h1 class="text-center mb-5">OVERVIEW</h1>
            <ul class="nav nav-tabs bg-primary" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="revenue-tab" data-toggle="tab" href="#revenue" role="tab"
                        aria-controls="revenue" aria-selected="false">Revenue Update</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="letter-tab" data-toggle="tab" href="#letter" role="tab"
                        aria-controls="letter" aria-selected="true">Incoming Letter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="demand-tab" data-toggle="tab" href="#demand" role="tab"
                        aria-controls="demand" aria-selected="false">My Departmental Documents</a>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="revenue" role="tabpanel" aria-labelledby="revenue-tab">

                    <div class="col-12 float-right">
                        <div class="row">

                            <div class="col-3">
                                {!! Form::select('branch_id', $branch, null, ['class' => ' form-select', 'id' => 'branchSelect']) !!}
                            </div>

                            <div class="col-3">
                                {!! Form::select('service_id', [], null, ['class' => 'form-select', 'id' => 'serviceSelect']) !!}
                            </div>

                            <div class="col-2">
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
                            <div class="col-2">
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
                            <div class="col-2"> <button type="button" id="searchBtn"
                                    class="btn btn-primary">SEARCH</button>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5"
                                                fill="currentColor" />
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                                fill="currentColor" />
                                            <rect x="18" y="11" width="3" height="8" rx="1.5"
                                                fill="currentColor" />
                                            <rect x="3" y="13" width="3" height="6" rx="1.5"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5" id="pending_application_forms">
                                    </div>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <!-- Path for the bank icon with opacity 0.3 -->
                                            <path opacity="0.3"
                                                d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                fill="currentColor" />
                                            <!-- Path for the bank icon -->
                                            <path
                                                d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->

                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5" id="total_amount"> </div>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
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
                <div class="tab-pane fade" id="letter" role="tabpanel" aria-labelledby="letter-tab">


                    <div class="col-md-12 grid-margin stretch-card">
                        <!-- <div class="col-md-3">
                                             {!! Form::label('department_id', 'Click to select user department:') !!}
                                             {!! Form::select('department_id', $departments_data, null, ['class' => 'form-control', 'id' => 'inDeptSelect']) !!}

                                                </div> -->
                        <div class="card">
                            <div class="card-body p-5">
                                <h4 class="card-title">
                                    <i class="fas fa-envelope"></i>
                                    Latest 10 Incoming Letter
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
                                                    <td><a class="document-link" target="_blank"
                                                            onClick="saveData('{{ $document->document_url }}')"
                                                            href="{{ asset($document->document_url) }}">{{ substr($document->document_url, 10) }}
                                                        </a>
                                                    </td>
                                                    <td><a class="open-modal-shareuser btn btn-primary" href="#"
                                                            data-toggle="modal" data-target="#shareuserModal1"
                                                            data-shareuser=${document.d_m_id}>User</a></td>
                                                    <td>{{ $document->doc_description ?? 'NILL' }}</td>
                                                    <td>{{ $document->assigned_created_at ?? 'NILL' }}</td>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>


                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Fetch Departmental Documents based on selected department
                                    document.getElementById('inDeptSelect').addEventListener('change', function() {
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
                </div>
                <div class="tab-pane fade" id="demand" role="tabpanel" aria-labelledby="demand-tab">
                    <div class="row grid-margin stretch-card">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                {!! Form::label('department_id', 'Cick To Select User Department:', ['style' => 'font-weight:bold;']) !!}
                                {!! Form::select('department_id', $departments_data, null, ['class' => 'form-control', 'id' => 'deptSelect1']) !!}

                            </div>
                        </div>
                        <div class="card ">
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


                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Fetch Departmental Documents based on selected department
                                    document.getElementById('deptSelect1').addEventListener('change', function() {
                                        let departmentId = this.value;
                                        fetchDocumentsData(departmentId);
                                    });

                                    // Initial Fetch on Page Load
                                    //let departmentId = document.getElementById('deptSelect').value;
                                    //fetchDocuments(departmentId);
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

                                    if (documents.length === 0) {
                                        let noResultsRow = `
                                        <tr>
                                            <td colspan="7" class="text-center text-danger"><strong>No results found</strong></td>
                                        </tr>
                                    `;
                                        tableBody.insertAdjacentHTML('beforeend', noResultsRow);
                                    } else {
                                        documents.forEach((document, index) => {
                                            var fullUrl = "{{ asset('') }}" + document.document_url;
                                            let row = `
                                            <tr>
                                                <td>${index + 1}</td>
                                                <td>${document.title}</td>
                                                <td>${document.created_by_name}</td>
                                                <td>${document.assigned_by_name}</td>
                                                <td>${document.assigned_to_name}</td>
                                                <td><a target="_blank" class="document-link"  onClick="saveData('${ document.document_url }')" href="${ fullUrl }">${ document.document_url.substr(10) }</a></td>
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
                </div>
            </div>
            {{-- <button onclick="toggleContent()" class="btn btn-primary" style="margin-bottom: 70px;background: purple;">Revenue Update</button>
            <button onclick="toggleDepartment()" class="btn btn-primary" style="margin-bottom: 70px;background: purple;">Incoming Letter Update</button>
            <button onclick="toggleDepartmentalDocument()" class="btn btn-primary" style="margin-bottom: 70px;background: purple;">Departmental Documents Updates</button>
             --}}<!-- <button onclick="toggleDepartmentalAuditDocument()" class="btn btn-primary" style="margin-bottom: 70px;">Departmental Documents Audit Trail Updates</button>
                <button onclick="toggleIncomingAuditDocument()" class="btn btn-primary" style="margin-bottom: 70px;">Incoming Letters Audit Trail Updates</button>
     -->





            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 justify-content-end">


                <div class="modal fade" id="shareuserModal" tabindex="-1" role="dialog"
                    aria-labelledby="shareuserModalLabel" aria-hidden="true" data-backdrop="false">
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
                                    {!! Form::select('users[]', $users123, null, [
                                        'class' => 'form-control',
                                        'id' => 'userSelect',
                                        'multiple' => 'multiple',
                                    ]) !!}

                                    {!! Form::hidden('shareuser_id', null, ['id' => 'shareuser_id']) !!}
                                    {!! Form::hidden('notify_id', null, ['id' => 'notify_id']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::checkbox('specify_su', 0, null, ['id' => 'specify_su']) !!}
                                    {!! Form::label('specify_su', 'Specify the period') !!}
                                </div>
                                <div class="form-group" id="enable_date" style="display: none">
                                    {!! Form::label('start_date', 'Start Date') !!}
                                    {!! Form::date('start_date', null, ['class' => 'form-control', 'id' => 'start_date1']) !!}<br />
                                    {!! Form::label('end_date', 'End Date') !!}
                                    {!! Form::date('end_date', null, ['class' => 'form-control', 'id' => 'end_date1']) !!}
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

                <div class="modal fade" id="shareuserModal1" tabindex="-1" role="dialog"
                    aria-labelledby="shareuserModalLabel1" aria-hidden="true" data-backdrop="false">
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
                                    {!! Form::select('users[]', $users123, null, [
                                        'class' => 'form-control',
                                        'id' => 'userSelect',
                                        'multiple' => 'multiple',
                                    ]) !!}

                                    {!! Form::hidden('shareuser_id', null, ['id' => 'shareuser1_id']) !!}
                                    {!! Form::hidden('notify_id', null, ['id' => 'notify_id']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::checkbox('specify_su', 0, null, ['id' => 'specify_su']) !!}
                                    {!! Form::label('specify_su', 'Specify the period') !!}
                                </div>
                                <div class="form-group" id="enable_date" style="display: none">
                                    {!! Form::label('start_date', 'Start Date') !!}
                                    {!! Form::date('start_date', null, ['class' => 'form-control', 'id' => 'start_date1']) !!}<br />
                                    {!! Form::label('end_date', 'End Date') !!}
                                    {!! Form::date('end_date', null, ['class' => 'form-control', 'id' => 'end_date1']) !!}
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


                <div class="col-md-3 grid-margin stretch-card" style="display: none;">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="far fa-futbol"></i>
                                Incoming Document Audit Trail
                            </h4>
                            <a class="nav-link" href="{{ route('incoming_documents_manager.audits') }}">View All</a>
                            @php
                                $documents = \DB::table('incoming_documents_manager')
                                    ->join('audits', 'incoming_documents_manager.id', '=', 'audits.auditable_id')
                                    ->join(
                                        'incoming_documents_has_users',
                                        'incoming_documents_manager.id',
                                        '=',
                                        'incoming_documents_has_users.document_id',
                                    )
                                    ->join(
                                        'users as assigned_to_user',
                                        'incoming_documents_has_users.user_id',
                                        '=',
                                        'assigned_to_user.id',
                                    )
                                    ->join(
                                        'incoming_documents_categories',
                                        'incoming_documents_manager.category_id',
                                        '=',
                                        'incoming_documents_categories.id',
                                    )
                                    ->select(
                                        'incoming_documents_categories.id as d_c_id',
                                        'incoming_documents_manager.*',
                                        'incoming_documents_manager.id as id',
                                        'audits.*',
                                        'assigned_to_user.first_name as assigned_to_first_name',
                                        'assigned_to_user.last_name as assigned_to_last_name',
                                        'incoming_documents_manager.created_at as createdAt',
                                        'incoming_documents_categories.name as category_name',
                                    )
                                    ->where('audits.auditable_type', 'App\Models\IncomingDocuments')
                                    ->latest('incoming_documents_manager.created_at')
                                    ->limit(3)
                                    ->distinct() // Ensure distinct results
                                    ->get();
                                $documentIds = $documents->pluck('d_c_id')->toArray();
                                $categories = \App\Models\IncomingDocumentsCategory::whereIn('id', $documentIds)
                                    ->get()
                                    ->keyBy('id');

                            @endphp
                            <ul class="solid-bullet-list">
                                @foreach ($documents as $document)
                                    @php
                                        $document->category = $categories[$document->category_id] ?? null;
                                    @endphp
                                    <li>
                                        <h5>{{ $document->title }}
                                            <span
                                                class="float-right text-muted font-weight-normal small">{{ date('M d, Y H:i A', strtotime($document->createdAt)) }}</span>
                                        </h5>
                                        <p class="text-muted">{{ $document->assigned_to_first_name }}
                                            {{ $document->assigned_to_last_name }}</p>
                                        <p class="text-muted">
                                            @if ($document->category)
                                                {{ $document->category->department->name ?? '' }}
                                                /
                                                {{ $document->category_name ?? 'NILL' }}
                                            @else
                                                {{ $document->category_name ?? 'NILL' }}
                                            @endif
                                        </p>
                                        <p class="text-muted"><a class="document-link" target="_blank"
                                                href="{{ asset($document->document_url) }}"
                                                onClick="saveData('{{ $document->document_url }}')">{{ substr($document->document_url, 10) }}
                                            </a>
                                        </p>
                                        <p class="text-muted">{{ $document->event }}</p>
                                    </li>
                                @endforeach
                            </ul>
                            {{-- <div class="border-top pt-3">
                          <div class="d-flex justify-content-between">
                            <button class="btn btn-outline-dark">More</button>
                            <button class="btn btn-primary btn-icon-text">
                            More
                            <i class="btn-icon-append fas fa-angle-double-right"></i>
                            </button>
                          </div>
                        </div> --}}
                        </div>
                    </div>
                </div>
                {{--  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="fas fa-gift"></i>
                                Document Analytics
                            </h4>
                            <canvas id="orders-chart1"></canvas>
                            <div id="orders-chart-legend1" class="orders-chart-legend"></div>
                        </div>
                    </div>
                </div>  --}}
                {{--  <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">
                          <i class="fas fa-calendar-alt"></i>
                          Reminder
                        </h4>
                        <div id="inline-datepicker-example1" class="datepicker"></div>
                      </div>
                    </div>
                  </div>

                  <div id="event-details"></div> --}}






            </div>




            <br>
            <br>









            <!-- Modal -->
            <div class="modal fade" id="thestate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="thestate" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fs-5" id="staticBackdropLabel">AREA OFFICES</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">LAGOS</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 row align-items-center">
                                <div class="col-auto">
                                    <a href="#" class="menu-link px-3">PORT HARCOURT</a>
                                </div>
                                <div class="col">
                                    <span>20</span>
                                </div>
                            </div>

                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">WARRI</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">ONITSHA</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">YENAGOA</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">EKET</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">ABEOKUTA</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">LOKOJA</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">CALABAR</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">KADUNA</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">JALINGO</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">HADEJIA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">MINNA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">SOKOTO</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">ABUJA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">MAIDUGURI</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">YOLA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">OGUTA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">IGBOKODA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">ONITSHA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">YALEWA/YAURI</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">BARO PORT</a>
                            </div>
                            <!--end::Menu item-->
                            <!-- Add all 36 states here -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staffbystate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="thestate" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fs-5" id="staticBackdropLabel">STAFF AREA OFFICES</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">LAGOS</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 row align-items-center">
                                <div class="col-auto">
                                    <a href="#" class="menu-link px-3">PORT HARCOURT</a>
                                </div>
                                <div class="col">
                                    <span>20</span>
                                </div>
                            </div>

                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">WARRI</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">ONITSHA</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">YENAGOA</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">EKET</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">ABEOKUTA</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">LOKOJA</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">CALABAR</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">KADUNA</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">JALINGO</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">HADEJIA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">MINNA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">SOKOTO</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">ABUJA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">MAIDUGURI</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">YOLA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">OGUTA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">IGBOKODA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">ONITSHA</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">YALEWA/YAURI</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">BARO PORT</a>
                            </div>
                            <!--end::Menu item-->
                            <!-- Add all 36 states here -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                //.hidden1, .departmenthide, .depDoc1, .depDoc2
                function toggleContent() {
                    var content = document.getElementById("contenthide");
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                }

                function toggleDepartment() {
                    var content = document.getElementById("depDoc2");
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                }

                function toggleDepartmentalDocument() {
                    var content = document.getElementById("depDoc1");
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                }
            </script>
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


            <script>
                // options = {
                //     series: [44, 55, 13, 33],
                //     labels: ['Apple', 'Mango', 'Orange', 'Watermelon']
                // }

                //var chart=new ApexCharts(document.querySelector('#md'),options);
                //chart.render();
            </script>
            <script>
                $(function() {
                    var chartdata = @json($data);

                    var names = chartdata.map(function(item) {
                        return item.name;
                    });
                    var numbers = chartdata.map(function(item) {
                        return item.num;
                    });

                    var options = {
                        chart: {
                            type: 'pie',
                        },
                        series: numbers,
                        labels: names,
                        setTitle: 'Hello.....................',
                        plotOptions: {
                            pie: {
                                size: 200
                            }
                        },
                    };

                    var thechart = new ApexCharts(document.querySelector('#md'), options);
                    thechart.render();
                });
            </script>
            <script>
                /* $(function() {
                if ($("#orders-chart1").length) {
                  var currentChartCanvas = $("#orders-chart1").get(0).getContext("2d");
                  var currentChart = new Chart(currentChartCanvas, {
                    type: 'bar',
                    data: {
                      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                      datasets: [{
                          label: 'Internal Documents',
                          data: [{!! $data1->pluck('num')->implode(',') !!}],
                          backgroundColor: '#392c70'
                        },
                        {
                          label: 'Incoming Documents',
                          data: [{!! $data2->pluck('num')->implode(',') !!}],
                          backgroundColor: '#d1cede'
                        }
                      ]
                    },
                    options: {
                      responsive: true,
                      maintainAspectRatio: true,
                      layout: {
                        padding: {
                          left: 0,
                          right: 0,
                          top: 20,
                          bottom: 0
                        }
                      },
                      scales: {
                        yAxes: [{
                          gridLines: {
                            drawBorder: false,
                          },
                          ticks: {
                            stepSize: 200,
                            fontColor: "#686868"
                          }
                        }],
                        xAxes: [{
                          stacked: true,
                          ticks: {
                            beginAtZero: true,
                            fontColor: "#686868"
                          },
                          gridLines: {
                            display: false,
                          },
                          barPercentage: 0.4
                        }]
                      },
                      legend: {
                        display: false
                      },
                      elements: {
                        point: {
                          radius: 0
                        }
                      },
                      legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul class="legend'+ chart.id +'">');
                        for (var i = 0; i < chart.data.datasets.length; i++) {
                          text.push('<li><span class="legend-label" style="background-color:' + chart.data.datasets[i].backgroundColor + '"></span>');
                          if (chart.data.datasets[i].label) {
                            text.push(chart.data.datasets[i].label);
                          }
                          text.push('</li>');
                        }
                        text.push('</ul>');
                        return text.join("");
                      },
                    }
                  });
                  document.getElementById('orders-chart-legend1').innerHTML = currentChart.generateLegend();
                }
            });
             */
            </script>

            {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
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
                        var branch = $('#branchSelect').val();
                        $('.loader-demo-box1').show();

                        $.ajax({
                            url: '/get-for-md/' + serviceId,
                            type: 'GET',
                            data: {
                                month: month,
                                year: year,
                                branch: branch
                            },
                            success: function(data) {
                                $('.loader-demo-box1').hide();
                                // Update the statistics cards with the received data
                                $('#pending_application_forms').text(data.pending_application_forms);
                                $('#pending_inspections').text(data.pending_inspections);
                                $('#total_amount').text(data.total_amount);
                                $('#total_permit').text(data.total_permit);
                            },
                            error: function(xhr, status, error) {
                                $('.loader-demo-box1').hide();
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

            <script>
                $(document).ready(function() {
                    // Listen for changes in the branch dropdown
                    $('#branchSelect').change(function() {
                        var branchId = $(this).val();
                        $('.loader-demo-box1').show();

                        // Make an AJAX request to fetch services based on the selected branch
                        $.ajax({
                            url: '/get-services', // Replace with the actual endpoint to fetch services
                            type: 'GET',
                            data: {
                                branch_id: branchId
                            },
                            success: function(response) {
                                $('.loader-demo-box1').hide();
                                // Populate the services dropdown with the fetched services
                                var services = response.data.services;
                                var options = '<option value="">Select Service</option>';
                                $.each(services, function(index, service) {
                                    options += '<option value="' + service.id + '">' + service
                                        .name + '</option>';
                                });
                                $('#serviceSelect').html(options);
                            },
                            error: function(response) {
                                $('.loader-demo-box1').hide();
                                console.error('Error fetching services:', response);
                            }
                        });
                    });
                });
            </script>
        @endsection
