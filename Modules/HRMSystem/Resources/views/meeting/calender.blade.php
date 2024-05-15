@extends('layouts.app')

@section('page-title')
    {{__('Manage Meeting')}}
@endsection
@push('css-page')
    
@endpush
@php
    $setting = \Modules\Accounting\Models\Utility::settings();
@endphp
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Meeting')}}</li>
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
<link rel="stylesheet" href="{{ asset('new_assets/libs/fullcalendar/dist/fullcalendar.min.css') }}">
    <div class="row">
        <div class="col-md-12">
            @can('create meeting')
            <div class="float-end">
                <a href="{{ route('meeting.index') }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="{{__('List View')}}" data-original-title="{{__('List View')}}">
                    <i class="fa fa-list"></i>
                </a>
                <a href="#" data-size="lg" data-url="{{ route('meeting.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create New Meeting')}}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        @endcan
        </div>
        <div class="col-sm-12">
            <div class="mt-2" id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(array('route' => array('meeting.calender'),'method'=>'get','id'=>'meeting_filter')) }}
                        <div class="row align-items-center justify-content-end">
                            <div class="col-xl-10">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box"></div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box"></div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{Form::label('start_date',__('Start Date'),['class'=>'form-label'])}}
                                            {{Form::date('start_date',isset($_GET['start_date'])?$_GET['start_date']:'',array('class'=>'month-btn form-control'))}}
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{Form::label('end_date',__('End Date'),['class'=>'form-label'])}}
                                            {{Form::date('end_date',isset($_GET['end_date'])?$_GET['end_date']:'',array('class'=>'month-btn form-control '))}}                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="col-auto mt-4">
                                        <a href="#" class="btn btn-sm btn-primary" onclick="document.getElementById('meeting_filter').submit(); return false;" data-bs-toggle="tooltip" title="{{__('Apply')}}" data-original-title="{{__('apply')}}">
                                            <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                                        </a>
                                        <a href="{{route('meeting.calender')}}" class="btn btn-sm btn-danger " data-bs-toggle="tooltip"  title="{{ __('Reset') }}" data-original-title="{{__('Reset')}}">
                                            <span class="btn-inner--icon"><i class="fa fa-trash text-white-off "></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>{{ __('Calendar') }}</h5>
                        </div>
                        <div class="col-lg-6">
                            @if (isset($setting['google_calendar_enable']) && $setting['google_calendar_enable'] == 'on')
                                <select class="form-control" name="calender_type" id="calender_type" style="float: right;width: 150px;" onchange="get_data()">
                                    <option value="goggle_calender">{{__('Google Calender')}}</option>
                                    <option value="local_calender" selected="true">{{__('Local Calender')}}</option>
                                </select>
                            @endif
                            <input type="hidden" id="meeting_calendar" value="{{url('/')}}">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id='calendar' class='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4">{{__('Meeting List')}}</h4>
                    <ul class="event-cards list-group list-group-flush mt-3 w-100">
                        <li class="list-group-item card mb-3">
                            <div class="row align-items-center justify-content-between">
                                <div class=" align-items-center">
                                    @if(!$meetings->isEmpty())
                                        @foreach ($meetings as $meeting)
                                            <div class="card mb-3 border shadow-none">
                                                <div class="px-3">
                                                    <div class="row align-items-center">
                                                        <div class="col ml-n2">
                                                            <h5 class="text-sm mb-0">
                                                            </h5>
                                                            <p class="card-text small text-primary mb-0">
                                                                {{($meeting->title)}}
                                                            </p>
                                                            <p class="card-text small text-dark">
                                                                {{__('Meeting Date :')}}
                                                                {{  \Auth::user()->dateFormat($meeting->date) }}
                                                            </p>
                                                        </div>
                                                        <div class="col-auto text-right">
                                                            @can('edit interview schedule')
                                                                <div class="action-btn bg-primary ms-2">
                                                                    <a href="#" data-url="{{ route('meeting.edit',$meeting->id) }}" data-title="{{__('Edit Interview Schedule')}}" data-ajax-popup="true" class="mx-3 btn1 btn-sm  align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="fa fa-pencil text-white"></i></a>
                                                                </div>
                                                            @endcan
                                                            @can('delete interview schedule')
                                                                <div class="action-btn bg-danger ms-2">
                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['meeting.destroy', $meeting->id],'id'=>'delete-form-'.$meeting->id]) !!}
                                                                    <a href="#" class="mx-3 btn1 btn-sm  align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$meeting->id}}').submit();"><i class="fa fa-trash text-white"></i></a>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-center">
                                            {{__('No Interview Scheduled!')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('page_scripts')
    <script src="{{ asset('js/main.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function()
        {
            get_data();
        });
        function get_data()
        {
            var calender_type=$('#calender_type :selected').val();
            $('#calendar').removeClass('local_calender');
            $('#calendar').removeClass('goggle_calender');
            if(calender_type==undefined){
                $('#calendar').addClass('local_calender');
            }
            $('#calendar').addClass(calender_type);
            $.ajax({
                url: $("#meeting_calendar").val()+"/meeting/get_meeting_data" ,
                method:"POST",
                data: {"_token": "{{ csrf_token() }}",'calender_type':calender_type},
                success: function(data) {
                    (function () {
                        var etitle;
                        var etype;
                        var etypeclass;
                        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'timeGridDay,timeGridWeek,dayGridMonth'
                            },
                            buttonText: {
                                timeGridDay: "{{__('Day')}}",
                                timeGridWeek: "{{__('Week')}}",
                                dayGridMonth: "{{__('Month')}}"
                            },
                            slotLabelFormat: {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: false,
                            },
                            themeSystem: 'bootstrap',
                            // slotDuration: '00:10:00',
                            allDaySlot:false,
                            navLinks: true,
                            droppable: true,
                            selectable: true,
                            selectMirror: true,
                            editable: true,
                            dayMaxEvents: true,
                            handleWindowResize: true,
                            height: 'auto',
                            timeFormat: 'H(:mm)',
                            events: data,
                        });
                        calendar.render();
                    })();
                }
            });
        }
    </script>


    <script>

        $(document).ready(function () {
            var b_id = $('#branch_id').val();
            getDepartment(b_id);
        });
        $(document).on('change', 'select[name=branch_id]', function () {

            var branch_id = $(this).val();
            getDepartment(branch_id);
        });

        function getDepartment(bid) {

            $.ajax({
                url: '{{route('meeting.getdepartment')}}',
                type: 'POST',
                data: {
                    "branch_id": bid, "_token": "{{ csrf_token() }}",
                },

                success: function (data) {
                    console.log(data);
                    $('#department_id').empty();

                    $("#department_div").html('');
                    $('#department_div').append('<select class="form-control" id="department_id" name="department_id[]"  multiple></select>');

                    $('#department_id').append('<option value="">{{__('Select Department')}}</option>');

                    $('#department_id').append('<option value="0"> {{__('All Department')}} </option>');
                    $.each(data, function (key, value) {
                        console.log(key, value);
                        $('#department_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                    var multipleCancelButton = new Choices('#department_id', {
                        removeItemButton: true,
                    });


                }

            });
        }

        $(document).on('change', '#department_id', function () {
            var department_id = $(this).val();
            getEmployee(department_id);
        });

        function getEmployee(did) {

            $.ajax({
                url: '{{route('meeting.getemployee')}}',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    console.log(data);
                    $('#employee_id').empty();

                    $("#employee_div").html('');
                    $('#employee_div').append('<select class="form-control" id="employee_id" name="employee_id[]"  multiple></select>');


                    $('#employee_id').append('<option value="">{{__('Select Employee')}}</option>');
                    $('#employee_id').append('<option value="0"> {{__('All Employee')}} </option>');

                    $.each(data, function (key, value) {
                        $('#employee_id').append('<option value="' + key + '">' + value + '</option>');
                    });

                    var multipleCancelButton = new Choices('#employee_id', {
                        removeItemButton: true,
                    });
                }
            });
        }
    </script>

@endpush
