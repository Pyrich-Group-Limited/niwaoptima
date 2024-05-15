@extends('layouts.app')
@section('page-title')
    {{__('Manage Budget Planner')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Budget Planner')}}</li>
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
        <div class="col-sm-12">
            @can('create budget plan')
            <div class="float-end">
                <a href="{{ route('budget.create',0) }}" data-bs-toggle="tooltip" title="{{__('Create')}}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        @endcan
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th> {{__('Name')}}</th>
                                <th> {{__('From')}}</th>
                                {{--                                <th> {{__('To')}}</th>--}}
                                <th> {{__('Budget Period')}}</th>
                                <th width="10%"> {{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($budgets as $budget)
                                <tr>
                                    <td class="font-style">{{ $budget->name }}</td>
                                    <td class="font-style">{{ $budget->from }}</td>
                                    {{--                                    <td class="font-style">{{ $budget->to }}</td>--}}
                                    <td class="font-style">{{ __(\Modules\Accounting\Models\Budget::$period[$budget->period]) }}</td>
                                    <td class="Action">
                                        <span>
                                            @can('edit budget plan')
                                                <div class="action-btn bg-primary ms-2">
                                                 <a href="{{ route('budget.edit',Crypt::encrypt($budget->id)) }}" class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}">
                                                    <i class="fa fa-pencil text-white"></i>
                                                </a>
                                            </div>
                                            @endcan
                                            @can('view budget plan')
                                                <div class="action-btn bg-info ms-2">
                                                    <a href="{{ route('budget.show',\Crypt::encrypt($budget->id)) }}" class="mx-3 btn1 btn-sm align-items-center " data-bs-toggle="tooltip" title="{{__('View')}}" data-original-title="{{__('Detail')}}">
                                                        <i class="fa fa-eye text-white"></i>
                                                    </a>
                                            </div>
                                            @endcan
                                            @can('delete budget plan')
                                                <div class="action-btn bg-danger ms-2">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['budget.destroy', $budget->id],'id'=>'delete-form-'.$budget->id]) !!}

                                                <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$budget->id}}').submit();">
                                                    <i class="fa fa-trash text-white"></i>
                                                </a>
                                                {!! Form::close() !!}
                                            </div>
                                            @endcan
                                        </span>
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
