@extends('layouts.app')

@section('page-title')
    {{__('Manage Leave')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Manage Leave')}}</li>
@endsection

@section('action-btn')
    
@endsection

@section('content')
@include('layouts.messages')
<style>
    .btn-sm1, .btn-group-sm > .btn {
    --bs-btn-padding-y: 0.25rem;
    --bs-btn-padding-x: 0.5rem;
    --bs-btn-font-size: 0.76563rem;
    --bs-btn-border-radius: 4px;
}
.btn1 {
    --bs-btn-padding-x: 1.3rem;
    --bs-btn-padding-y: 0.575rem;
    --bs-btn-font-family: ;
    --bs-btn-font-size: 0.875rem;
    --bs-btn-font-weight: 500;
    --bs-btn-line-height: 1.5;
    --bs-btn-color: #293240;
    --bs-btn-bg: transparent;
    --bs-btn-border-width: 1px;
    --bs-btn-border-color: transparent;
    --bs-btn-border-radius: 6px;
    --bs-btn-hover-border-color: transparent;
    --bs-btn-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
    --bs-btn-disabled-opacity: 0.65;
    --bs-btn-focus-box-shadow: 0 0 0 0.2rem rgba(var(--bs-btn-focus-shadow-rgb), .5);
    display: inline-block;
    font-family: var(--bs-btn-font-family);
    font-size: var(--bs-btn-font-size);
    font-weight: var(--bs-btn-font-weight);
    line-height: var(--bs-btn-line-height);
    color: var(--bs-btn-color);
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    background-color: var(--bs-btn-bg);
    padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
    border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
    border-radius: var(--bs-btn-border-radius);
    transition: color 0.15s ease-in-out 0s, background-color 0.15s ease-in-out 0s, border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
}
.mx-3 {
    margin-right: 1rem !important;
    margin-left: 1rem !important;
}
.action-btn {
    width: 29px;
    height: 28px;
    color: rgb(255, 255, 255);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
    border-radius: 9.3552px;
}
.bg-danger {
    --bs-bg-opacity: 1;
    background-color: rgba(var(--bs-danger-rgb), var(--bs-bg-opacity)) !important;
}
.ms-2 {
    margin-left: 0.5rem !important;
}
.btn1 i {
    display: inline-flex;
    font-size: 1rem;
    padding-right: 0.rem;
    vertical-align: middle;
    line-height: 0;
}
</style>
    <div class="row">
        <div class="col-xl-12">
            <div class="float-end">
                @can('create leave')
                    <a href="#" data-size="lg" data-url="{{ route('leave.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create Leave')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                @if(\Auth::user()->type!='Employee')
                                    <th>{{__('Employee')}}</th>
                                @endif
                                <th>{{__('Leave Type')}}</th>
                                <th>{{__('Applied On')}}</th>
                                <th>{{__('Start Date')}}</th>
                                <th>{{__('End Date')}}</th>
                                <th>{{__('Total Days')}}</th>
                                <th>{{__('Leave Reason')}}</th>
                                <th>{{__('status')}}</th>
                                @can('edit leave')
                                    <th width="200px">{{__('Action')}}</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($leaves as $leave)
                                <tr>
                                    @php
                                        $employee = \Auth::user()->getEmployee($leave->employee_id);
if ($employee) {
    $first_name = $employee->first_name;
    $last_name = $employee->last_name;
    // Now you have both first_name and last_name for the employee
} else {
    // Handle the case where no employee is found
    $first_name = '';
    $last_name = '';
}

                                    @endphp
                                    <td>{{ !empty(\Auth::user()->getEmployee($leave->employee_id))?$first_name.' '.$last_name:'' }}</td>
                                    <td>{{ !empty(\Auth::user()->getLeaveType($leave->leave_type_id))?\Auth::user()->getLeaveType($leave->leave_type_id)->name:'' }}</td>
                                    <td>{{ \Auth::user()->dateFormat($leave->applied_on )}}</td>
                                    <td>{{ \Auth::user()->dateFormat($leave->start_date ) }}</td>
                                    <td>{{ \Auth::user()->dateFormat($leave->end_date )  }}</td>
                                    <td>{{ $leave->total_leave_days }}</td>
                                    <td>{{ $leave->leave_reason }}</td>
                                    <td>

                                        @if($leave->status=="Pending")<div class="status_badge badge bg-warning p-2 px-3 rounded">{{ $leave->status }}</div>
                                        @elseif($leave->status=="Approved")
                                            <div class="status_badge badge bg-success p-2 px-3 rounded">{{ $leave->status }}</div>
                                        @else($leave->status=="Reject")
                                            <div class="status_badge badge bg-danger p-2 px-3 rounded">{{ $leave->status }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- @if(\Auth::user()->type == 'Employee')
                                            @if($leave->status == "Pending")
                                                @can('edit leave')
                                                    <div class="action-btn bg-primary ms-2">
                                                        <a href="#" data-url="{{ URL::to('leave/'.$leave->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Leave')}}" class="mx-3 btn btn-sm  align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="fa fa-pencil text-white"></i></a>
                                                    </div>
                                                @endcan
                                            @endif
                                        @else --}}
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="#" data-url="{{ URL::to('leave/'.$leave->id.'/action') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Leave Action')}}" class="mx-3 btn1 btn-sm  align-items-center" data-bs-toggle="tooltip" title="{{__('Leave Action')}}" data-original-title="{{__('Leave Action')}}">
                                                    <i class="fa fa-caret-right text-white"></i> </a>
                                            </div>
                                            @can('edit leave')
                                                <div class="action-btn bg-primary ms-2">
                                                    <a href="#" data-url="{{ URL::to('leave/'.$leave->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Leave')}}" class="mx-3 btn1 btn-sm  align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}">
                                                        <i class="fa fa-pencil text-white"></i></a>
                                                </div>
                                            @endcan
                                       {{--  @endif --}}
                                        @can('delete leave')
                                            <div class="action-btn bg-danger ms-2">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['leave.destroy', $leave->id],'id'=>'delete-form-'.$leave->id]) !!}
                                                <a href="#" class="mx-3 btn1 btn-sm  align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$leave->id}}').submit();">
                                                    <i class="fa fa-trash text-white"></i></a>
                                                {!! Form::close() !!}
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    <script>
        $(document).on('change', '#employee_id', function () {
            var employee_id = $(this).val();

            $.ajax({
                url: '{{route('leave.jsoncount')}}',
                type: 'POST',
                data: {
                    "employee_id": employee_id, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {

                    $('#leave_type_id').empty();
                    $('#leave_type_id').append('<option value="">{{__('Select Leave Type')}}</option>');

                    $.each(data, function (key, value) {

                        if (value.total_leave >= value.days) {
                            $('#leave_type_id').append('<option value="' + value.id + '" disabled>' + value.title + '&nbsp(' + value.total_leave + '/' + value.days + ')</option>');
                        } else {
                            $('#leave_type_id').append('<option value="' + value.id + '">' + value.title + '&nbsp(' + value.total_leave + '/' + value.days + ')</option>');
                        }
                    });

                }
            });
        });

    </script>
@endpush
