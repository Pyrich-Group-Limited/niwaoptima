@extends('layouts.app')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
                aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
    @endif
    @if ($errors->has('title'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button><strong>{{ $errors->first('title') }}</strong></div>
    @endif

    <!--Document List Start-->
    @php
        $ven = DB::table('vendors')->count();
    @endphp
        <div class=" container-fluid float-end">
            <a href="#" data-toggle="modal" data-target="#importProduct" class="btn btn-primary float-end"><i
                    class="bi bi-plus"></i>
                </a>

        </div>
    <div class="col-md-12 panel">
        <h1>{{ trans('Total Registered Vendors:') }}(<?php echo $ven; ?>)</h1>

        <div class="col-md-12 mt-4">
            <table id="document-table" class="table table-bordered table-striped">
                <thead>

                    <th>{{ trans('SL No') }}</th>
                    <th>{{ trans('Company Name') }}</th>
                    <th>{{ trans('Address') }}</th>
                    <th>{{ trans('Phone Number') }}</th>
                    <th>{{ trans('Email') }}</th>

                    {{-- <th class="text-center hidden-print not-exported">{{ trans('Option') }}</th> --}}
                </thead>
                <tbody>
                    @foreach ($data as $key => $document)
                        <td>{{ $document->id }}</td>
                        <td>{{ $document->name }}</td>
                        <td>{{ $document->address }}</td>

                        <td>{!! $document->phone_number !!}</td>
                        <td>{{ $document->email }}</td>
                        {{-- <td class="text-center hidden-print">

                            <div class="btn-group">
                                <button type="button" class="btn btn-default">{{ trans('Action') }}</button>
                                <button type="button" class="btn btn-default dropdown-toggle three-column" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <li><a title = "View" href="{{route('vendors.show',[$document->id])}}><i class="fa fa-eye"
                                                aria-hidden="true"></i>
                                            {{ trans('View') }}</a></li>
                                    <li class="divider"></li>
                                    <li><a title = "View" href="{{route('vendors.edit',[$document->id])}}><i class="fa fa-eye"
                                                aria-hidden="true"></i>
                                            {{ trans('Edit') }}</a></li>
                                    <li class="divider"></li>

                                    <li><a title = "Delete"
                                            href="{{route('vendors.destroy',[$document->id])}}"
                                            onclick='return confirmDelete()'><i class="fa fa-trash" aria-hidden="true"></i>
                                            {{ trans('Delete') }}</a></li>
                                    <li class="divider"></li>

                                </ul>
                            </div>
                        </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--Document List End-->


    <div id="importProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                {{-- {!! Form::open(['route' => 'documents.store', 'method' => 'post', 'files' => true]) !!} --}}

                <div class="modal-header">
                    <span style="font-weight: 850;">REGISTRATION OF VENDOR</span>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    @csrf
                    <form method="post" action="{{ route('vendors.store') }}" files="true"
                        enctype="multipart/form-data">
                        <div class="col-md-12">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="ldms_documentTitle">{{ trans('Company Name') }}</label>
                                <div class="form-group-inner">
                                    <div class="field-outer">
                                        <input class="form-control" type="text" name="name" id="ldms_documentTitle"
                                            placeholder="{{ trans('Name Of Company') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ldms_documentTitle">{{ trans('Address') }}</label>
                                <div class="form-group-inner">
                                    <div class="field-outer">
                                        <input class="form-control" type="text" name="address"
                                            id="ldms_documentvendor" placeholder="{{ trans('address') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ldms_documentTitle">{{ trans('Company Email') }}</label>
                                <div class="form-group-inner">
                                    <div class="field-outer">
                                        <input class="form-control" type="text" name="email"
                                            id="ldms_documentdescriptiom">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ldms_experiedDate">{{ trans('Phone Number') }} *</label>
                                <div class="form-group-inner">
                                    <div class="field-outer">
                                        <input id="ldms_experiedDate"  class="form-control"
                                            type="number" name="phone_number">
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="form-group submit text-right">
                            <label for="submit"></label>
                            <div class="form-group-inner">
                                <div class="field-outer">
                                    <input type="submit" name="submit" value="{{ trans('Submit') }}"
                                        class="btn btn-primary" id="createForm">
                                </div>
                            </div>
                        </div>


                    </form>

                    <script type="text/javascript">
                        var table = $('#document-table').DataTable({
                            "order": [],
                            'language': {
                                'lengthMenu': '_MENU_ {{ trans('file.records per page') }}',
                                "info": '{{ trans('file.Showing') }} _START_ - _END_ (_TOTAL_)',
                                "search": '{{ trans('file.Search') }}',
                                'paginate': {
                                    'previous': '{{ trans('file.Previous') }}',
                                    'next': '{{ trans('file.Next') }}'
                                }
                            },
                            'columnDefs': [{
                                    "orderable": false,
                                    'targets': [0, 6]
                                },
                                {
                                    'checkboxes': {
                                        'selectRow': true
                                    },
                                    'targets': 0
                                }
                            ],
                            'select': {
                                style: 'multi',
                                selector: 'td:first-child'
                            },
                            'lengthMenu': [
                                [10, 25, 50, -1],
                                [10, 25, 50, "All"]
                            ],
                            dom: 'Blfrtip',
                            buttons: [{
                                    extend: 'pdf',
                                    text: '{{ trans('file.PDF') }}',
                                    exportOptions: {
                                        columns: ':visible:Not(.not-exported)',
                                        modifier: {
                                            page: 'current'
                                        }
                                    },
                                    footer: true
                                },
                                {
                                    extend: 'csv',
                                    text: '{{ trans('file.CSV') }}',
                                    exportOptions: {
                                        columns: ':visible:Not(.not-exported)',
                                        modifier: {
                                            page: 'current'
                                        }
                                    },
                                    footer: true
                                },
                                {
                                    extend: 'print',
                                    text: '{{ trans('file.Print') }}',
                                    exportOptions: {
                                        columns: ':visible:Not(.not-exported)',
                                        modifier: {
                                            page: 'current'
                                        }
                                    },
                                    footer: true
                                },
                                {
                                    extend: 'colvis',
                                    text: '{{ trans('file.Column visibility') }}',
                                    columns: ':gt(0)'
                                },
                            ]
                        });

                        var ldms_experiedDate = $('#ldms_experiedDate');
                        ldms_experiedDate.datepicker({
                            format: "dd-mm-yyyy",
                            startDate: "<?php echo date('d-m-Y'); ?>",
                            autoclose: true,
                            todayHighlight: true
                        });

                        var createForm = $('#createForm');
                        createForm.on("click", function() {
                            var ldms_documentTitle = $.trim($('#ldms_documentTitle').val());
                            if (ldms_documentTitle == '') {
                                alert("Document Title can't be empty.");
                                $("#ldms_documentTitle").focus();
                                return false;
                            }
                            var ldms_email = $.trim($('#ldms_email').val());
                            if (ldms_email == '') {
                                alert("Alarm Sending Email can't be empty.");
                                $('#ldms_email').focus();
                                return false;
                            }
                            var ldms_documentvendor = $.trim($('#ldms_documentvendor').val());
                            if (ldms_documentvendor == '') {
                                alert("Name of Vendor can't be empty.");
                                $('#ldms_documentvendor').focus();
                                return false;
                            }
                            var ldms_documentdescriptiom = $.trim($('#ldms_documentdescriptiom').val());
                            if (ldms_documentdescriptiom == '') {
                                alert("Document Description can't be empty.");
                                $('#ldms_documentdescriptiom').focus();
                                return false;
                            }



                        });

                        var ldms_document_file = $("#ldms_documentFile");
                        ldms_document_file.change(function() {
                            var ldms_document_file_name = $("#ldms_document_file_name");
                            ldms_document_file_name.html($(":file").val());
                        });
                    </script>
                </div>
            </div>
        </div>



        <div id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['route' => 'document.import', 'method' => 'post', 'files' => true]) !!}
                    <div class="modal-header">
                        <span style="font-weight: 850;">Import Document</span>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <i><small>{{ trans('file.All field labels are required input fields.') }}</small></i><br><br>
                        {{-- <p>{{ trans('file.The correct column order is') }} (title, expiredDate(d-m-Y), email, mobile,
                            fileName) {{ trans('file.and you must follow this.') }}
                            {{ trans('file.Make sure expiredDate column is in text format.') }}
                            {{ trans('file.Files must be located in') }} public/document {{ trans('file.directory') }}.
                        </p> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><strong>{{ trans('file.Upload File') }} *</strong></label>
                                    {{ Form::file('file', ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><strong> {{ trans('file.Sample File') }}</strong></label>
                                    <a href="../public/sample/sample-doc.csv" class="btn btn-info btn-block btn-md"><i
                                            class="fa fa-download"></i> {{ trans('file.Download') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="operation_value"></div>
                        <input type="submit" name="submit" value="{{ trans('file.Submit') }}"
                            class="btn btn-primary">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <script>
            let table = new DataTable('#document-table')
        </script>
    @endsection
