@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Approval Steps > {{ $type->name }}</h1>
                </div>
                <div class="col-sm-6">
                    {{-- <a class="btn btn-primary float-end"
                       href="{{ route('flow.create') }}">
                        Add New Flow
                    </a> --}}
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        @if ($errors->any())
            <div class="example-alert">
                <div class="alert alert-danger alert-icon alert-dismissible">
                    <em class="icon ni ni-alert-circle"></em>
                    <strong>Error:</strong>
                    <p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </p>
                    <button class="close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        <div class="clearfix"></div>

        <div class="card mt-5">
            <div class="card-body p-5">
                <h5>Create Approval Steps</h5>
                <hr>

                <form action="{{ route('flow.store', $type->id) }}" method="POST">
                    @csrf
                    {{-- <h6 class="text-muted mb-5">Details</h6>
                    <div class="row mb-5">
                        <div class="col-4">
                            <label for="approval_type_id">Approval Type</label>
                            <select name="approval_type_id" id="approval_type_id" class="form-control">
                                <option value="">- Select Approval Type -</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="duration_metric">Duration Metric</label>
                            <select name="duration_metric" id="duration_metric" class="form-control">
                                <option value="">- Select Duration Metric -</option>
                                <option>Days</option>
                                <option>Weeks</option>
                                <option>Months</option>
                                <option>Years</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="duration_period">Duration Period</label>
                            <input type="number" name="duration_period" id="duration_period" value="1"
                                class="form-control" min="1">
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-4">
                            <label for="scope">Scope</label>
                            <select name="scope" id="scope" class="form-control" size="3">
                                <option>All</option>
                                <option>Region</option>
                                <option>Branch</option>
                                <option>Department</option>
                            </select>
                        </div>
                        <div class="col-4 region_div d-none">
                            <label for="region">Region</label>
                            <select name="region" id="region" class="form-control" multiple size="3">
                                <option value="0">All</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 branch_div d-none">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control" multiple size="3">
                                <option value="0">All</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 department_div d-none">
                            <label for="department">Department</label>
                            <select name="department" id="department" class="form-control" multiple size="3">
                                <option value="0">All</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br />
                    <hr> --}}
                    <h6 class="text-muted mb-5">Flow Steps</h6>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered" id="flow-steps-table">
                                <thead class="text-muted bg-light">
                                    <tr>
                                        <th>Order/Step</th>
                                        <th>Scope</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <button type="button" class="btn btn-primary add-row">
                                                <i class="fa fa-plus"></i> Add Step
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-lg mt-5">Create Approval Steps</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection



@push('page_scripts')
    <script>
        $(document).ready(function() {
            /**
             * APPROVAL SCOPE
             */
            /* $('#scope').on('change', function() {
                if ($(this).val() == 'Region') {
                    $('.region_div').removeClass('d-none');
                    $('.branch_div').addClass('d-none');
                    $('.department_div').addClass('d-none');
                } else if ($(this).val() == 'Department') {
                    $('.region_div').addClass('d-none');
                    $('.branch_div').addClass('d-none');
                    $('.department_div').removeClass('d-none');
                } else if ($(this).val() == 'Branch') {
                    $('.region_div').addClass('d-none');
                    $('.branch_div').removeClass('d-none');
                    $('.department_div').addClass('d-none');
                } else {
                    $('.region_div').addClass('d-none');
                    $('.branch_div').addClass('d-none');
                    $('.department_div').addClass('d-none');
                }
            }); */

            /**
             * STEPS
             */
            //remove row
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
            });

            var departments = '';
            var dp = {!! json_encode($departments) !!};
            dp.forEach(el => {
                departments += '<option value="' + el.id + '">' + el.name + '</option>';
            });

            var branches = '';
            var dp = {!! json_encode($branches) !!};
            dp.forEach(el => {
                branches += '<option value="' + el.id + '">' + el.branch_name + '</option>';
            });

            var roles = '';
            var dp = {!! json_encode($roles) !!};
            dp.forEach(el => {
                roles += '<option value="' + el.id + '">' + el.name + '</option>';
            });

            var actions = '';
            var dp = {!! json_encode($actions) !!};
            dp.forEach(el => {
                actions += '<option value="' + el.id + '">' + el.name + '</option>';
            });

            $('.add-row').on('click', function() {

                var counter = $('#flow-steps-table tbody tr').length;

                //add row
                var row = '<tr>' +
                    '<td>' +
                    '<input type="number" name="approval_order[' + counter + ']" id="approval_order[' +
                    counter + ']" class="form-control" min="1" size="10">' +
                    '</td>' +
                    '<td>' +
                    '<select name="approval_scopeable_type[' + counter + ']" id="approval_scopeable_type[' +
                    counter + ']" class="form-select step-scope">' +
                    '<option selected>Parent</option>' +
                    '<option>Branch</option>' +
                    '<option>Department</option>' +
                    //'<option>Unit</option>' +
                    '</select>' +
                    '<br/>' +
                    '<select name="approval_scopeable_id[' + counter + ']" id="approval_scopeable_id[' +
                    counter + ']" class="form-select branch-scope-id d-none">' +
                    '<option value="">-Select-</option>' +
                    branches +
                    '</select>' +
                    '<select name="approval_scopeable_id[' + counter + ']" id="approval_scopeable_id[' +
                    counter + ']" class="form-select department-scope-id d-none">' +
                    '<option value="">-Select-</option>' +
                    departments +
                    '</select>' +
                    '</td>' +

                    '<td>' +
                    '<select name="approval_roles[' + counter + '][]" id="approval_roles[' + counter +
                    '][]" class="form-select" multiple>' +
                    '<option value="">-Select Role-</option>' +
                    roles +
                    '</select>' +
                    '</td>' +
                    '<td>' +
                    '<select name="approval_actions[' + counter + '][]" id="approval_actions[' + counter +
                    '][]" class="form-select" multiple>' +
                    '<option value="">-Select Actions-</option>' +
                    actions +
                    '</select>' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-danger remove-row"><i class="fa fa-trash"></i></button>' +
                    '</td>' +
                    '</tr>';
                $('#flow-steps-table tbody').append(row);

                var trs = $('#flow-steps-table tbody tr');

                trs.each(function(index) {
                    var tr = $(this);

                    //add numbering to table
                    //tr.find("[id='num[]']").html(index + 1);

                    //tr.find("[id='approval_scopeable_type[" + index + "]']").on('change',
                    tr.find("[id='approval_scopeable_type[" + index + "]']").on('change',
                        function() {
                            if ($(this).val() == 'Parent') {
                                tr.find("[id='approval_scopeable_id[" + index + "]']")
                                    .addClass('d-none');
                            } else {
                                tr.find("[id='approval_scopeable_id[" + index + "]']")
                                    .removeClass(
                                        'd-none');
                                //tr.find("[id='scopeable_id[]']").empty().append(branches);
                                let scope = $(this).val().toLowerCase();
                                if (scope == 'branch') {
                                    tr.find(".branch-scope-id").removeClass('d-none');
                                    tr.find(".department-scope-id").addClass('d-none');
                                } else {
                                    tr.find(".branch-scope-id").addClass('d-none');
                                    tr.find(".department-scope-id").removeClass('d-none');
                                }
                            }
                        })
                });
                counter++;
            });

            //attach first row
            //$('#flow-steps-table tbody').append(row);
            $('.add-row').trigger('click');
        });
    </script>
@endpush
