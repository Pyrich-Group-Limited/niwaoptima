@extends('layouts.app')
@section('page-title')
    {{__('Manage Indicator')}}
@endsection

@push('page_scripts')
    <script src="{{ asset('js/bootstrap-toggle.js') }}"></script>
    <script>

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
            $("fieldset[id^='demo'] .stars").click(function () {
                $(this).attr("checked");
            });
        });


        $(document).ready(function () {
            var d_id = $('#department_id').val();
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department]', function () {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        function getDesignation(did) {
            $.ajax({
                url: '{{route('employee.json')}}',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#designation_id').empty();
                    $('#designation_id').append('<option value="">{{__('Select Designation')}}</option>');
                    $.each(data, function (key, value) {
                        $('#designation_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
    </script>
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Indicator')}}</li>
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
        <div class="col-md-12">
            <div class="float-end">
                @can('create indicator')
                    <a href="#" data-size="lg" data-url="{{ route('indicator.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create New Indicator')}}" class="btn btn-sm btn-primary">
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
                                <th>{{__('Overall Rating')}}</th>
                                <th>{{__('Added By')}}</th>
                                <th>{{__('Created At')}}</th>
                                @if( Gate::check('edit indicator') ||Gate::check('delete indicator') ||Gate::check('show indicator'))
                                    <th width="200px">{{__('Action')}}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="font-style">


                            @foreach ($indicators as $indicator)

                                @php
                                    if(!empty($indicator->rating)){
                                        $rating = json_decode($indicator->rating,true);
                                        if(!empty($rating)){
                                            $starsum = array_sum($rating);
                                            $overallrating = $starsum/count($rating);
                                        }else{
                                                $overallrating = 0;
                                        }

                                    }
                                    else{
                                        $overallrating = 0;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ !empty($indicator->branches)?$indicator->branches->branch_name:'' }}</td>
                                    <td>{{ !empty($indicator->departments)?$indicator->departments->name:'' }}</td>
                                    <td>{{ !empty($indicator->designations)?$indicator->designations->name:'' }}</td>
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


                                    <td>{{ !empty($indicator->user)?$indicator->user->first_name.' '.$indicator->user->last_name:'' }}</td>
                                    <td>{{ \Auth::user()->dateFormat($indicator->created_at) }}</td>
                                    @if( Gate::check('edit indicator') ||Gate::check('delete indicator') || Gate::check('show indicator'))
                                        <td>
                                            @can('show indicator')
                                                <div class="action-btn bg-info ms-2">
                                                    <a href="#" data-url="{{ route('indicator.show',$indicator->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Indicator Detail')}}" class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('View')}}" data-original-title="{{__('View Detail')}}">
                                                        <i class="fa fa-eye text-white"></i></a>
                                                </div>
                                            @endcan
                                            @can('edit indicator')
                                                <div class="action-btn bg-primary ms-2">
                                                    <a href="#" data-url="{{ route('indicator.edit',$indicator->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Indicator')}}" class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}">
                                                        <i class="fa fa-pencil text-white"></i></a>
                                                </div>
                                            @endcan
                                            @can('delete indicator')
                                                <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['indicator.destroy', $indicator->id],'id'=>'delete-form-'.$indicator->id]) !!}

                                                    <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$indicator->id}}').submit();">
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
