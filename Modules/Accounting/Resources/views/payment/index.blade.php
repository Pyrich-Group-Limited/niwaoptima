@extends('layouts.app')
@section('page-title')
    {{__('Manage Payments')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Payment')}}</li>
@endsection

@section('action-btn')
    
@endsection

@section('content')
@extends('layouts.messages')
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

                @can('create payment')
                    <a href="#" data-url="{{ route('payment.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip"  data-size="lg" data-title="{{__('Create New Payment')}}"  title="{{__('Create')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
        </div>
        <div class="col-sm-12">
            <div class=" mt-2 " id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(array('route' => array('payment.index'),'method' => 'GET','id'=>'payment_form')) }}
                        <div class="row align-items-center justify-content-end">
                            <div class="col-xl-10">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{ Form::label('date', __('Date'),['class'=>'form-label']) }}
                                            {{ Form::date('date', isset($_GET['date'])?$_GET['date']:'', array('class' => 'form-control month-btn ','id'=>'pc-daterangepicker-1')) }}
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{ Form::label('account', __('Account'),['class'=>'form-label']) }}
                                            {{ Form::select('account',$account,isset($_GET['account'])?$_GET['account']:'', array('class' => 'form-control select' ,'id'=>'choices-multiple')) }}
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{ Form::label('vender', __('Vendor'),['class'=>'form-label']) }}
                                            {{ Form::select('vender',$vender,isset($_GET['vender'])?$_GET['vender']:'', array('class' => 'form-control select','id'=>'choices-multiple1')) }}
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{ Form::label('category', __('Category'),['class'=>'form-label']) }}
                                            {{ Form::select('category',$category,isset($_GET['category'])?$_GET['category']:'', array('class' => 'form-control select','id'=>'choices-multiple2')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto mt-4">
                                <div class="row">
                                    <div clas="col-auto">
                                        <a href="#" class="btn btn-sm btn-primary" onclick="document.getElementById('payment_form').submit(); return false;" data-toggle="tooltip" title="{{__('Apply')}}" data-original-title="{{__('apply')}}">
                                            <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                                        </a>

                                        <a href="{{ route('productservice.index') }}" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                           title="{{ __('Reset') }}">
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Amount')}}</th>
                                <th>{{__('Account')}}</th>
                                <th>{{__('Vendor')}}</th>
                                <th>{{__('Category')}}</th>
                                <th>{{__('Reference')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Payment Receipt')}}</th>
                                @if(Gate::check('edit payment') || Gate::check('delete payment'))
                                    <th>{{__('Action')}}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $paymentpath=\Modules\Accounting\Models\Utility::get_file('uploads/payment');
                            @endphp


                            @foreach ($payments as $payment)
                                <tr class="font-style">
                                    <td>{{  Auth::user()->dateFormat($payment->date)}}</td>
                                    <td>{{  Auth::user()->priceFormat($payment->amount)}}</td>
                                    <td>{{ !empty($payment->bankAccount)?$payment->bankAccount->bank_name.' '.$payment->bankAccount->holder_name:''}}</td>
                                    <td>{{  !empty($payment->vender)?$payment->vender->first_name . ' ' .$payment->vender->last_name:'-'}}</td>
                                    <td>{{  !empty($payment->category)?$payment->category->name:'-'}}</td>
                                    <td>{{  !empty($payment->reference)?$payment->reference:'-'}}</td>
                                    <td>{{  !empty($payment->description)?$payment->description:'-'}}</td>
                                    <td>
                                        @if(!empty($payment->add_receipt))
                                            <a  class="action-btn bg-primary ms-2 btn1 btn-sm align-items-center" href="{{ $paymentpath . '/' . $payment->add_receipt }}" download="">
                                                <i class="fa fa-download text-white"></i>
                                            </a>
                                            <a href="{{ $paymentpath . '/' . $payment->add_receipt }}"  class="action-btn bg-secondary ms-2 mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Download')}}" target="_blank"><span class="btn-inner--icon"><i class="fa fa-crosshairs text-white" ></i></span></a>
                                        @else
                                            -
                                        @endif

                                    </td>

                                    @if(Gate::check('edit revenue') || Gate::check('delete revenue'))
                                        <td class="action text-end">
                                            @can('edit payment')
                                                <div class="action-btn bg-primary ms-2">
                                                    <a href="#" class="mx-3 btn1 btn-sm align-items-center" data-url="{{ route('payment.edit',$payment->id) }}" data-ajax-popup="true" data-title="{{__('Edit Payment')}}" data-size="lg" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}">
                                                        <i class="fa fa-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            @endcan
                                            @can('delete payment')
                                                <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['payment.destroy', $payment->id],'id'=>'delete-form-'.$payment->id]) !!}
                                                    <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" data-original-title="{{__('Delete')}}" title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$payment->id}}').submit();">
                                                        <i class="fa fa-trash text-white"></i>
                                                    </a>
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
