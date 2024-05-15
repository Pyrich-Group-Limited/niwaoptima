@extends('layouts.app')
@section('page-title')
    {{__('Manage Invoices')}}
@endsection
@push('page_scripts')
    <script>
        function copyToClipboard(element) {

            var copyText = element.id;
            navigator.clipboard.writeText(copyText);
            // document.addEventListener('copy', function (e) {
            //     e.clipboardData.setData('text/plain', copyText);
            //     e.preventDefault();
            // }, true);
            //
            // document.execCommand('copy');
            show_toastr('success', 'Url copied to clipboard', 'success');
        }
    </script>
@endpush


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Invoice')}}</li>
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
                {{--            <i class="fa fa-filter"></i>--}}
                {{--        </a>--}}
        
                <a href="{{ route('invoice.export') }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="{{__('Export')}}">
                    <i class="fa fa-file-export"></i>
                </a>
        
                @can('create invoice')
                    <a href="{{ route('invoice.create', 0) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="{{__('Create')}}">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
        </div>
        <div class="col-sm-12">
            <div class="mt-2 " id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(['route' => ['invoice.index'], 'method' => 'GET', 'id' => 'customer_submit']) }}
                        <div class="row d-flex align-items-center justify-content-end">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mr-2">
                                <div class="btn-box">
                                    {{ Form::label('issue_date', __('Issue Date'),['class'=>'form-label'])}}
                                    {{ Form::date('issue_date', isset($_GET['issue_date'])?$_GET['issue_date']:'', array('class' => 'form-control month-btn','id'=>'pc-daterangepicker-1')) }}
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mr-2">
                                <div class="btn-box">
                                    {{ Form::label('customer', __('Customer'),['class'=>'form-label'])}}
                                    {{ Form::select('customer', $customer, isset($_GET['customer']) ? $_GET['customer'] : '', ['class' => 'form-control select']) }}
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="btn-box">
                                    {{ Form::label('status', __('Status'),['class'=>'form-label'])}}
                                    {{ Form::select('status', [''=>'Select Status'] + $status,isset($_GET['status'])?$_GET['status']:'', array('class' => 'form-control select')) }}
                                </div>
                            </div>
                            <div class="col-auto float-end ms-2 mt-4">
                                <a href="#" class="btn btn-sm btn-primary"
                                   onclick="document.getElementById('customer_submit').submit(); return false;"
                                   data-toggle="tooltip" data-original-title="{{ __('apply') }}">
                                    <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                                </a>
                                <a href="{{ route('invoice.index') }}" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                   data-original-title="{{ __('Reset') }}">
                                    <span class="btn-inner--icon"><i class="fa fa-trash text-white-off"></i></span>
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
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th> {{ __('Invoice') }}</th>
    {{--                                @if (!\Auth::guard('customer')->check())--}}
    {{--                                    <th>{{ __('Customer') }}</th>--}}
    {{--                                @endif--}}
                                    <th>{{ __('Issue Date') }}</th>
                                    <th>{{ __('Due Date') }}</th>
                                    <th>{{ __('Due Amount') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    @if (Gate::check('edit invoice') || Gate::check('delete invoice') || Gate::check('show invoice'))
                                        <th>{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($invoices as $invoice)
                                <tr>
                                    <td class="Id">
                                        <a href="{{ route('invoice.show', \Crypt::encrypt($invoice->id)) }}" class="btn btn-outline-primary">{{ \Auth::user()->invoiceNumberFormat($invoice->invoice_id) }}</a>
                                    </td>
                                    <td>{{ \Auth::user()->dateFormat($invoice->issue_date) }}</td>
                                    <td>
                                        @if ($invoice->due_date < date('Y-m-d'))
                                            <p class="text-danger mt-3">
                                                {{ \Auth::user()->dateFormat($invoice->due_date) }}</p>
                                        @else
                                            {{ \Auth::user()->dateFormat($invoice->due_date) }}
                                        @endif
                                    </td>
                                    <td>{{ \Auth::user()->priceFormat($invoice->getDue()) }}</td>
                                    <td>
                                        @if ($invoice->status == 0)
                                            <span
                                                class="status_badge badge bg-secondary p-2 px-3 rounded">{{ __(\Modules\Accounting\Models\Invoice::$statues[$invoice->status]) }}</span>
                                        @elseif($invoice->status == 1)
                                            <span
                                                class="status_badge badge bg-warning p-2 px-3 rounded">{{ __(\Modules\Accounting\Models\Invoice::$statues[$invoice->status]) }}</span>
                                        @elseif($invoice->status == 2)
                                            <span
                                                class="status_badge badge bg-danger p-2 px-3 rounded">{{ __(\Modules\Accounting\Models\Invoice::$statues[$invoice->status]) }}</span>
                                        @elseif($invoice->status == 3)
                                            <span
                                                class="status_badge badge bg-info p-2 px-3 rounded">{{ __(\Modules\Accounting\Models\Invoice::$statues[$invoice->status]) }}</span>
                                        @elseif($invoice->status == 4)
                                            <span
                                                class="status_badge badge bg-primary p-2 px-3 rounded">{{ __(\Modules\Accounting\Models\Invoice::$statues[$invoice->status]) }}</span>
                                        @endif
                                    </td>
                                    @if (Gate::check('edit invoice') || Gate::check('delete invoice') || Gate::check('show invoice'))
                                        <td class="Action">
                                            <span>
                                                @php $invoiceID= Crypt::encrypt($invoice->id); @endphp

                                                    @can('copy invoice')
                                                        <div class="action-btn bg-warning ms-2">
                                                            <a href="#" id="{{ route('invoice.link.copy',[$invoiceID]) }}"
                                                               class="mx-3 btn1 btn-sm align-items-center"   onclick="copyToClipboard(this)"
                                                               data-bs-toggle="tooltip" title="{{__('Copy Invoice')}}" data-original-title="{{__('Copy Invoice')}}"><i class="fa fa-link text-white"></i></a>
                                                        </div>
                                                    @endcan
                                                    @can('duplicate invoice')
                                                        <div class="action-btn bg-success ms-2">
                                                           {!! Form::open(['method' => 'get', 'route' => ['invoice.duplicate', $invoice->id], 'id' => 'duplicate-form-' . $invoice->id]) !!}

                                                            <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-toggle="tooltip"
                                                               data-original-title="{{ __('Duplicate') }}" data-bs-toggle="tooltip" title="Duplicate Invoice"
                                                               data-original-title="{{ __('Delete') }}"
                                                               data-confirm="You want to confirm this action. Press Yes to continue or Cancel to go back"
                                                               data-confirm-yes="document.getElementById('duplicate-form-{{ $invoice->id }}').submit();">
                                                                <i class="fa fa-copy text-white"></i>
                                                                {!! Form::open(['method' => 'get', 'route' => ['invoice.duplicate', $invoice->id], 'id' => 'duplicate-form-' . $invoice->id]) !!}
                                                                {!! Form::close() !!}
                                                            </a>
                                                        </div>
                                                    @endcan
                                                    @can('show invoice')
{{--                                                        @if (\Auth::guard('customer')->check())--}}
{{--                                                            <div class="action-btn bg-info ms-2">--}}
{{--                                                                    <a href="{{ route('customer.invoice.show', \Crypt::encrypt($invoice->id)) }}"--}}
{{--                                                                       class="mx-3 btn btn-sm align-items-center" data-bs-toggle="tooltip" title="Show "--}}
{{--                                                                       data-original-title="{{ __('Detail') }}">--}}
{{--                                                                        <i class="fa fa-eye text-white"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                        @else--}}
                                                            <div class="action-btn bg-info ms-2">
                                                                    <a href="{{ route('invoice.show', \Crypt::encrypt($invoice->id)) }}"
                                                                       class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="Show "
                                                                       data-original-title="{{ __('Detail') }}">
                                                                        <i class="fa fa-eye text-white"></i>
                                                                    </a>
                                                                </div>
{{--                                                        @endif--}}
                                                    @endcan
                                                    @can('edit invoice')
                                                        <div class="action-btn bg-primary ms-2">
                                                                <a href="{{ route('invoice.edit', \Crypt::encrypt($invoice->id)) }}"
                                                                   class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="Edit "
                                                                   data-original-title="{{ __('Edit') }}">
                                                                    <i class="fa fa-pencil text-white"></i>
                                                                </a>
                                                            </div>
                                                    @endcan
                                                    @can('delete invoice')
                                                        <div class="action-btn bg-danger ms-2">
                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['invoice.destroy', $invoice->id], 'id' => 'delete-form-' . $invoice->id]) !!}
                                                                    <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para " data-bs-toggle="tooltip" title="{{__('Delete')}}"
                                                                       data-original-title="{{ __('Delete') }}"
                                                                       data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                                                       data-confirm-yes="document.getElementById('delete-form-{{ $invoice->id }}').submit();">
                                                                        <i class="fa fa-trash text-white"></i>
                                                                    </a>
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
