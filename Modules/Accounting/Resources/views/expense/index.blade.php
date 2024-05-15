@extends('layouts.app')
@section('page-title')
    {{__('Manage Expenses')}}
@endsection
@push('page_scripts')
    <script>
        $('.copy_link').click(function (e) {
            e.preventDefault();
            var copyText = $(this).attr('href');

            document.addEventListener('copy', function (e) {
                e.clipboardData.setData('text/plain', copyText);
                e.preventDefault();
            }, true);

            document.execCommand('copy');
            show_toastr('success', 'Url copied to clipboard', 'success');
        });
    </script>
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Expense')}}</li>
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
                @can('create bill')
                    <a href="{{ route('expense.create',0) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="{{__('Create')}}">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
        </div>
        <div class="col-sm-12">
            <div class=" mt-2 " id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(array('route' => array('expense.index'),'method' => 'GET','id'=>'frm_submit')) }}
                        <div class="row align-items-center justify-content-end">
                            <div class="col-xl-10">
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-3"></div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 month">
                                        <div class="btn-box">
                                            {{Form::label('bill_date',__('Payment Date'),['class'=>'form-label'])}}
                                            {{ Form::text('bill_date', isset($_GET['bill_date'])?$_GET['bill_date']:null, array('class' => 'form-control month-btn','id'=>'pc-daterangepicker-1','readonly')) }}
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{ Form::label('category', __('Category'),['class'=>'form-label'])}}
                                            {{ Form::select('category',$category,isset($_GET['category'])?$_GET['category']:'', array('class' => 'form-control select')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto mt-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-sm btn-primary" onclick="document.getElementById('frm_submit').submit(); return false;" data-bs-toggle="tooltip" title="{{__('Apply')}}" data-original-title="{{__('apply')}}">
                                            <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                                        </a>
                                        <a href="{{route('expense.index')}}" class="btn btn-sm btn-danger " data-bs-toggle="tooltip"  title="{{ __('Reset') }}" data-original-title="{{__('Reset')}}">
                                            <span class="btn-inner--icon"><i class="fa fa-trash text-white-off "></i></span>
                                        </a>
                                    </div>
                                </div>
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
                                <th> {{__('Expense')}}</th>
                                <th> {{__('Category')}}</th>
                                <th> {{__('Date')}}</th>
                                <th>{{__('Status')}}</th>
                                @if(Gate::check('edit bill') || Gate::check('delete bill') || Gate::check('show bill'))
                                    <th width="10%"> {{__('Action')}}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($expenses as $expense)

                                <tr>
                                    <td class="Id">
                                        <a href="{{ route('expense.show',\Crypt::encrypt($expense->id)) }}" class="btn btn-outline-primary">{{ \Auth::user()->expenseNumberFormat($expense->bill_id) }}</a>
                                    </td>
                                    <td>{{ !empty($expense->category)?$expense->category->name:'-'}}</td>
                                    <td>{{ Auth::user()->dateFormat($expense->bill_date) }}</td>
                                    <td>
                                        <span class="status_badge badge bg-primary p-2 px-3 rounded">{{ __(\Modules\Accounting\Models\Invoice::$statues[$expense->status]) }}</span>
                                    </td>
                                    @if(Gate::check('edit bill') || Gate::check('delete bill') || Gate::check('show bill'))
                                        <td class="Action">
                                            <span>

                                                @can('show bill')
                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="{{ route('expense.show',\Crypt::encrypt($expense->id)) }}" class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Show')}}" data-original-title="{{__('Detail')}}">
                                                            <i class="fa fa-eye text-white"></i>
                                                        </a>
                                                    </div>
                                                @endcan
                                                @can('edit bill')
                                                    <div class="action-btn bg-primary ms-2">
                                                        <a href="{{ route('expense.edit',\Crypt::encrypt($expense->id)) }}" class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="Edit" data-original-title="{{__('Edit')}}">
                                                            <i class="fa fa-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                @endcan
                                                @can('delete bill')
                                                    <div class="action-btn bg-danger ms-2">
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['expense.destroy', $expense->id],'class'=>'delete-form-btn','id'=>'delete-form-'.$expense->id]) !!}
                                                        <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$expense->id}}').submit();">
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

