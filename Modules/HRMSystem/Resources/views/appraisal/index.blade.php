@extends('layouts.app')
@section('page-title')
    {{__('Manage Appraisal')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Appraisal')}}</li>
@endsection

@push('page_scripts')
    <script src="{{ asset('js/bootstrap-toggle.js') }}"></script>
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
            $("fieldset[id^='demo'] .stars").click(function () {
                alert($(this).val());
                $(this).attr("checked");
            });
        });

        $(document).ready(function () {
            var employee = $('#employee').val();
            getEmployee(employee);
        });

        $(document).on('change', 'select[name=branch]', function () {
            var branch = $(this).val();
            getEmployee(branch);
        });

        function getEmployee(did) {
            $.ajax({
                url: '{{route('branch.employee.json')}}',
                type: 'POST',
                data: {
                    "branch": did, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#employee').empty();
                    $('#employee').append('<option value="">{{__('Select Employee')}}</option>');
                    $.each(data, function (key, value) {
                        $('#employee').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }


    </script>
@endpush

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
        <div class="col-md-12">
            <div class="float-end">
                @can('create appraisal')
                   <a href="#" data-size="lg" data-url="{{ route('appraisal_index.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create New Appraisal')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
                    @endcan
                </div>
        </div>
        <div class="col-md-12">
            <div class="card">
            <div class="card-body table-border-style">
                    <div class="table-responsive">
                    <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('Branch')}}</th>
                                <th>{{__('Department')}}</th>
                                <th>{{__('Designation')}}</th>
                                <th>{{__('Employee')}}</th>
                                <th>{{ __('Target Rating') }}</th>
                                <th>{{__('Overall Rating')}}</th>
                                <th>{{__('Appraisal Date')}}</th>
                                @if( Gate::check('edit appraisal') ||Gate::check('delete appraisal') ||Gate::check('show appraisal'))
                                    <th width="200px">{{__('Action')}}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($appraisals as $appraisal)

                                @php
                                    $designation=!empty($appraisal->employees) && !empty($appraisal->employees->designation) ?  $appraisal->employees->designation->id : '-';
                                    $targetRating =  \Modules\Accounting\Models\Utility::getTargetrating($designation,$competencyCount);
                                    if(!empty($appraisal->rating)&&($competencyCount!=0))
                                    {
                                        $rating = json_decode($appraisal->rating,true);
                                        $starsum = array_sum($rating);
                                        $overallrating = $starsum/$competencyCount;
                                    }
                                    else{
                                        $overallrating = 0;
                                    }
                                @endphp

                                @php
                                    if(!empty($appraisal->rating)){
                                        $rating = json_decode($appraisal->rating,true);
                                        $starsum = !empty($rating)?array_sum($rating):0;
                                        $overallrating = ($starsum!=0)? $starsum/count($rating):0;
                                    }
                                    else{
                                        $overallrating = 0;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ !empty($appraisal->branches)?$appraisal->branches->branch_name:'' }}</td>
                                    <td>{{ !empty($appraisal->employees)?!empty($appraisal->staff->department)?$appraisal->staff->department->name:'':'' }}</td>
                                    <td>{{ !empty($appraisal->employees)?!empty($appraisal->employees->designation)?$appraisal->employees->designation->name:'':'' }}</td>
                                    <td>{{!empty($appraisal->employees)?$appraisal->employees->first_name.' '.$appraisal->employees->last_name:'' }}</td>

                                    <td >
                                        @for($i=1; $i<=5; $i++)
                                            @if($targetRating < $i)
                                                @if(is_float($targetRating) && (round($targetRating) == $i))
                                                    <i class="text-warning fas fa-star-half-alt"></i>
                                                @else
                                                    <i class="fas fa-star"></i>
                                                @endif
                                            @else
                                                <i class="text-warning fas fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="theme-text-color">({{number_format($targetRating,1)}})</span>
                                    </td>


                                    <td>

                                        @for($i=1; $i<=5; $i++)
                                            @if($overallrating < $i)
                                                @if(is_float($overallrating) && (round($overallrating) == $i))
                                                    <i class="text-warning fas fa-star-half-alt"></i>
                                                @else
                                                    <i class="fas fa-star"></i>
                                                @endif
                                            @else
                                                <i class="text-warning fas fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="theme-text-color">({{number_format($overallrating,1)}})</span>
                                    </td>
                                    <td>{{ $appraisal->appraisal_date}}</td>
                                    @if( Gate::check('edit appraisal') ||Gate::check('delete appraisal') ||Gate::check('show appraisal'))
                                        <td>
                                            @can('show appraisal')
                                            <div class="action-btn bg-info ms-2">
                                                <a href="#" data-url="{{ route('appraisal_index.show',$appraisal->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Appraisal Detail')}}" data-bs-toggle="tooltip" title="{{__('View')}}" data-original-title="{{__('View Detail')}}" class="mx-3 btn1 btn-sm align-items-center">
                                                    <i class="fa fa-eye text-white"></i></a>
                                            </div>
                                                @endcan
                                            @can('edit appraisal')
                                            <div class="action-btn bg-primary ms-2">
                                                <a href="#" data-url="{{ route('appraisal_index.edit',$appraisal->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Appraisal')}}" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}" class="mx-3 btn1 btn-sm align-items-center">
                                                <i class="fa fa-pencil text-white"></i></a>
                                            </div>
                                                @endcan
                                            @can('delete appraisal')
                                            <div class="action-btn bg-danger ms-2">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['appraisal_index.destroy', $appraisal->id],'id'=>'delete-form-'.$appraisal->id]) !!}
                                                <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm-yes="document.getElementById('delete-form-{{$appraisal->id}}').submit();">
                                                <i class="fa fa-trash text-white"></i></a>
                                                {!! Form::close() !!}
                                            </div>
                                            @endcan
                                        </td>
                                    @endif
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
