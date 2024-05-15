@extends('layouts.app')

@section('page-title')
    {{__('Manage Award')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Award')}}</li>
@endsection

@section('action-button')
    
@endsection
@section('action-btn')
    <div class="float-end">
        @can('create award')
            <a href="#" data-size="lg" data-url="{{ route('award.create') }}" data-ajax-popup="true"
               data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create New Award')}}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus"></i>
            </a>


        @endcan
    </div>
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
            <div class="all-button-box row d-flex justify-content-end">
                @can('create award')
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                        <a href="#" data-url="{{ route('award.create') }}" class="btn btn-xs btn-white btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Award')}}">
                            <i class="fa fa-plus"></i> {{__('Create')}}
                        </a>
                    </div>
        
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
                                @role('super-admin')
                                <th>{{__('Employee')}}</th>
                                @endrole
                                <th>{{__('Award Type')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Gift')}}</th>
                                <th>{{__('Description')}}</th>
                                @if(Gate::check('edit award') || Gate::check('delete award'))
                                    <th width="200px">{{__('Action')}}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($awards as $award)
                                <tr>

                                    @role('super-admin')
                                    <td>{{!empty( $award->employee())? $award->employee()->first_name.' '.$award->employee()->last_name:'' }}</td>
                                    @endrole
                                    <td>{{ !empty($award->awardType())?$award->awardType()->name:'' }}</td>
                                    <td>{{  \Auth::user()->dateFormat($award->date )}}</td>
                                    <td>{{ $award->gift }}</td>
                                    <td>{{ $award->description }}</td>

                                    @if(Gate::check('edit award') || Gate::check('delete award'))
                                        <td class="Action">
                                            <span>
                                                @can('edit award')
                                                    <div class="action-btn bg-primary ms-2">
                                                    <a href="#" data-url="{{ URL::to('award/'.$award->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Award')}}" class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}">
                                                        <i class="fa fa-pencil text-white"></i></a>
                                                </div>
                                                @endcan
                                                @can('delete award')
                                                    <div class="action-btn bg-danger ms-2">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['award.destroy', $award->id],'id'=>'delete-form-'.$award->id]) !!}
                                                 <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$award->id}}').submit();">
                                                     <i class="fa fa-trash text-white"></i></a>
                                                    {!! Form::close() !!}
                                                    </div>
                                                @endcan
                                            </span>
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
