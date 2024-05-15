@extends('layouts.app')
@section('page-title')
    {{__('Manage Proposals')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Proposal')}}</li>
@endsection

@section('action-btn')
    

@endsection
@push('css-page')

@endpush
@push('script-page')

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
        <div class="col-sm-12">
            <div class="float-end">
        
                <a href="{{route('proposal.export')}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="{{__('Export')}}">
                    <i class="fa fa-file-export"></i>
                </a>
        
               {{--  @can('create proposal') --}}
                    <a href="{{ route('proposal.create',0) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="{{__('Create')}}">
                        <i class="fa fa-plus"></i>
                    </a>
               {{--  @endcan --}}
            </div>
        </div>
        <div class="col-sm-12">
            <div class=" mt-2 " id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
{{--                        @if(!\Auth::guard('customer')->check())--}}
                            {{ Form::open(array('route' => array('proposal.index'),'method' => 'GET','id'=>'frm_submit')) }}
{{--                        @else--}}
{{--                            {{ Form::open(array('route' => array('customer.proposal'),'method' => 'GET','id'=>'frm_submit')) }}--}}
{{--                        @endif--}}
                        <div class="d-flex align-items-center justify-content-end">
{{--                            @if(!\Auth::guard('customer')->check())--}}
{{--                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 me-2">--}}
{{--                                    <div class="btn-box">--}}
{{--                                        {{ Form::label('customer', __('Customer'),['class'=>'form-label']) }}--}}
{{--                                        {{ Form::select('customer',$customer,isset($_GET['customer'])?$_GET['customer']:'', array('class' => 'form-control select')) }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 me-2">
                                <div class="btn-box">
                                    {{ Form::label('issue_date', __('Date'),['class'=>'form-label']) }}
                                    {{ Form::text('issue_date', isset($_GET['issue_date'])?$_GET['issue_date']:null, array('class' => 'form-control month-btn','id'=>'pc-daterangepicker-1')) }}
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 ">
                                <div class="btn-box">
                                    {{ Form::label('status', __('Status'),['class'=>'form-label']) }}
                                    {{ Form::select('status', [ ''=>'Select Status'] + $status,isset($_GET['status'])?$_GET['status']:'', array('class' => 'form-control select')) }}
                                </div>
                            </div>
                            <div class="col-auto float-end ms-2 mt-4">

                                <a href="#" class="btn btn-sm btn-primary" onclick="document.getElementById('frm_submit').submit(); return false;" data-bs-toggle="tooltip" data-original-title="{{__('apply')}}">
                                    <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                                </a>
                                <a href="{{ route('productservice.index') }}" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                   title="{{ __('Reset') }}">
                                    <span class="btn-inner--icon"><i class="fa fa-trash text-white "></i></span>
                                </a>
                            </div>

                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th> {{__('Proposal')}}</th>
{{--                                @if(!\Auth::guard('customer')->check())--}}
{{--                                    <th> {{__('Customer')}}</th>--}}
{{--                                @endif--}}
                                <th> {{__('Category')}}</th>
                                <th> {{__('Issue Date')}}</th>
                                <th> {{__('Status')}}</th>
{{--                                 @if(Gate::check('edit proposal') || Gate::check('delete proposal') || Gate::check('show proposal'))
 --}}                                    <th width="10%"> {{__('Action')}}</th>
                               {{--  @endif --}}
                                {{-- <th>
                                    <td class="barcode">
                                        {!! DNS1D::getBarcodeHTML($invoice->sku, "C128",1.4,22) !!}
                                        <p class="pid">{{$invoice->sku}}</p>
                                    </td>
                                </th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($proposals as $proposal)
                                <tr class="font-style">
                                    <td class="Id">
                                        <a href="{{ route('proposal.show',\Crypt::encrypt($proposal->id)) }}" class="btn btn-outline-primary">{{ \Auth::user()->proposalNumberFormat($proposal->proposal_id) }}
                                        </a>
                                    </td>

                                    <td>{{ !empty($proposal->category)?$proposal->category->name:''}}</td>
                                    <td>{{ \Auth::user()->dateFormat($proposal->issue_date) }}</td>
                                    <td>
                                        @if($proposal->status == 0)
                                            <span class="status_badge badge bg-primary p-2 px-3 rounded">{{ __(\Modules\Accounting\Models\Proposal::$statues[$proposal->status]) }}</span>
                                        @elseif($proposal->status == 1)
                                            <span class="status_badge badge bg-info p-2 px-3 rounded">{{ __(\Modules\Accounting\Models\Proposal::$statues[$proposal->status]) }}</span>
                                        @elseif($proposal->status == 2)
                                            <span class="status_badge badge bg-success p-2 px-3 rounded">{{ __(\Modules\Accounting\Models\Proposal::$statues[$proposal->status]) }}</span>
                                        @elseif($proposal->status == 3)
                                            <span class="status_badge badge bg-warning p-2 px-3 rounded">{{ __(\Modules\Accounting\Models\Proposal::$statues[$proposal->status]) }}</span>
                                        @elseif($proposal->status == 4)
                                            <span class="status_badge badge bg-danger p-2 px-3 rounded">{{ __(\Modules\Accounting\Models\Proposal::$statues[$proposal->status]) }}</span>
                                        @endif
                                    </td>
{{--                                     @if(Gate::check('edit proposal') || Gate::check('delete proposal') || Gate::check('show proposal'))
 --}}                                        <td class="Action">
                                            @if($proposal->is_convert==0)
                                                {{-- @can('convert invoice') --}}
                                                    <div class="action-btn bg-warning ms-2">
                                                        {!! Form::open(['method' => 'get', 'route' => ['proposal.convert', $proposal->id],'id'=>'proposal-form-'.$proposal->id]) !!}

                                                        <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip"
                                                           title="{{__('Convert Invoice')}}" data-original-title="{{__('Convert to Invoice')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('You want to confirm convert to invoice. Press Yes to continue or Cancel to go back')}}" data-confirm-yes="document.getElementById('proposal-form-{{$proposal->id}}').submit();">
                                                            <i class="fa fa-exchange text-white"></i>
                                                            {!! Form::close() !!}
                                                        </a>
                                                    </div>
                                              {{--   @endcan --}}
                                            @else
                                               {{--  @can('show invoice') --}}
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="{{ route('invoice.show',\Crypt::encrypt($proposal->converted_invoice_id)) }}"
                                                           class="mx-3 btn1 btn-sm  align-items-center" data-bs-toggle="tooltip" title="{{__('Already convert to Invoice')}}" data-original-title="{{__('Already convert to Invoice')}}" >
                                                            <i class="fa fa-file text-white"></i>
                                                        </a>
                                                    </div>
                                              {{--   @endcan --}}
                                            @endif
                                            {{-- @can('duplicate proposal') --}}
                                                <div class="action-btn bg-success ms-2">
                                                    {!! Form::open(['method' => 'get', 'route' => ['proposal.duplicate', $proposal->id],'id'=>'duplicate-form-'.$proposal->id]) !!}

                                                    <a href="#" class="mx-3 btn1 btn-sm  align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Duplicate')}}" data-original-title="{{__('Duplicate')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('You want to confirm duplicate this invoice. Press Yes to continue or Cancel to go back')}}" data-confirm-yes="document.getElementById('duplicate-form-{{$proposal->id}}').submit();">
                                                        <i class="fa fa-copy text-white text-white"></i>
                                                        {!! Form::close() !!}
                                                    </a>
                                                </div>
                                          {{--   @endcan --}}
                                            {{-- @can('show proposal') --}}

                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="{{ route('proposal.show',\Crypt::encrypt($proposal->id)) }}" class="mx-3 btn1 btn-sm  align-items-center" data-bs-toggle="tooltip" title="{{__('Show')}}" data-original-title="{{__('Detail')}}">
                                                            <i class="fa fa-eye text-white text-white"></i>
                                                        </a>
                                                    </div>
                                            {{-- @endcan --}}
                                            {{-- @can('edit proposal') --}}
                                                <div class="action-btn bg-primary ms-2">
                                                    <a href="{{ route('proposal.edit',\Crypt::encrypt($proposal->id)) }}" class="mx-3 btn1 btn-sm  align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}">
                                                        <i class="fa fa-pencil text-white"></i>
                                                    </a>
                                                </div>
                                           {{--  @endcan --}}

                                            {{-- @can('delete proposal') --}}
                                                <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['proposal.destroy', $proposal->id],'id'=>'delete-form-'.$proposal->id]) !!}

                                                    <a href="#" class="mx-3 btn1 btn-sm  align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$proposal->id}}').submit();">
                                                        <i class="fa fa-trash text-white text-white"></i>
                                                    </a>
                                                    {!! Form::close() !!}
                                                </div>
                                           {{--  @endcan --}}
                                        </td>
                                   {{--  @endif --}}
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
