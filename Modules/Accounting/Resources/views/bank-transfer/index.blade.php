@extends('layouts.app')
@section('page-title')
    {{__('Bank Balance Transfer')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Bank Balance Transfer')}}</li>
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
            <div class="float-end">
                {{--        <a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" data-bs-toggle="tooltip" title="{{__('Filter')}}">--}}
                {{--            <i class="ti ti-filter"></i>--}}
                {{--        </a>--}}
                {{-- @can('create bank transfer') --}}
                    <a href="#" data-url="{{ route('bank-transfer.create') }}" data-ajax-popup="true" data-title="{{__('Create Bank-Transfer')}}" data-bs-toggle="tooltip" title="{{__('Create')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
                {{-- @endcan --}}
            </div>
        </div>
        <div class="col-sm-12">
            <div class=" mt-2 " id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(array('route' => array('bank-transfer.index'),'method' => 'GET','id'=>'transfer_form')) }}
                        <div class="row align-items-center justify-content-end">
                            <div class="col-xl-10">
                                <div class="row">

                                    <div class="col-3">
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 month">
                                        <div class="btn-box">
                                            {{ Form::label('date', __('Date'),['class'=>'form-label'])}}
                                            {{ Form::text('date', isset($_GET['date'])?$_GET['date']:null, array('class' => 'form-control month-btn','id'=>'pc-daterangepicker-1','readonly')) }}

                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 date">
                                        <div class="btn-box">
                                            {{ Form::label('f_account', __('From Account'),['class'=>'form-label'])}}
                                            {{ Form::select('f_account',$account,isset($_GET['f_account'])?$_GET['f_account']:'', array('class' => 'form-control select')) }}
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{ Form::label('t_account', __('To Account'),['class'=>'form-label'])}}
                                            {{ Form::select('t_account', $account,isset($_GET['t_account'])?$_GET['t_account']:'', array('class' => 'form-control select')) }}
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-auto mt-4">
                                <div class="row">
                                    <div class="col-auto">

                                        <a href="#" class="btn1 btn-sm btn-primary" onclick="document.getElementById('transfer_form').submit(); return false;" data-bs-toggle="tooltip" title="{{__('Apply')}}" data-original-title="{{__('apply')}}">
                                            <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                                        </a>

                                        <a href="{{route('bank-transfer.index')}}" class="btn1 btn-sm btn-danger " data-bs-toggle="tooltip"  title="{{ __('Reset') }}" data-original-title="{{__('Reset')}}">
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th> {{__('Date')}}</th>
                                <th> {{__('From Account')}}</th>
                                <th> {{__('To Account')}}</th>
                                <th> {{__('Amount')}}</th>
                                <th> {{__('Reference')}}</th>
                                <th> {{__('Description')}}</th>
                                {{-- @if(Gate::check('edit transfer') || Gate::check('delete transfer')) --}}
                                    <th width="10%"> {{__('Action')}}</th>
                                {{-- @endif --}}
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($transfers as $transfer)
                                <tr class="font-style">
                                    <td>{{ \Auth::user()->dateFormat( $transfer->date) }}</td>
                                    <td>{{ !empty($transfer->fromBankAccount())? $transfer->fromBankAccount()->bank_name.' '.$transfer->fromBankAccount()->holder_name:''}}</td>
                                    <td>{{!empty( $transfer->toBankAccount())? $transfer->toBankAccount()->bank_name.' '. $transfer->toBankAccount()->holder_name:''}}</td>
                                    <td>{{  \Auth::user()->priceFormat( $transfer->amount)}}</td>
                                    <td>{{  $transfer->reference}}</td>
                                    <td>{{  $transfer->description}}</td>
                                    {{-- @if(Gate::check('edit transfer') || Gate::check('delete transfer')) --}}
                                        <td class="Action">
                                            <span>
                                            {{-- @can('edit transfer') --}}
                                                    <div class="action-btn bg-primary ms-2">
                                                        <a href="#" class="mx-3 btn1 btn-sm align-items-center" data-url="{{ route('bank-transfer.edit',$transfer->id) }}" data-ajax-popup="true" title="{{__('Edit')}}" data-title="{{__('Edit Transfer')}}" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                            <i class="fa fa-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                {{-- @endcan
                                                @can('delete transfer') --}}
                                                    <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['bank-transfer.destroy', $transfer->id],'id'=>'delete-form-'.$transfer->id]) !!}

                                                        <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" data-original-title="{{__('Delete')}}" title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$transfer->id}}').submit();">
                                                            <i class="fa fa-trash text-white text-white text-white"></i>
                                                        </a>
                                                    {!! Form::close() !!}
                                                    </div>
                                                {{-- @endcan --}}
                                            </span>
                                        </td>
                                    {{-- @endif --}}
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

