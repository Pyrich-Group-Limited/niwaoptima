@extends('layouts.app')
@section('page-title')
    {{__('Manage Bank Account')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Bank Account')}}</li>
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
        <div class="col-12">
            <div class="float-end">
                {{-- @can('create bank account') --}}
                    <a href="#" data-url="{{ route('bank-account.create') }}" data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create New Bank Account')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
        
             {{--    @endcan --}}
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('Chart Of Account')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Bank')}}</th>
                                <th>{{__('Account Number')}}</th>
                                <th>{{__('Current Balance')}}</th>
                                <th>{{__('Contact Number')}}</th>
                                <th>{{__('Bank Branch')}}</th>
                                <th width="10%"> {{__('Action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($accounts as $account)
                                <tr class="font-style">
                                    <td>{{ (!empty($account->chartAccount)?$account->chartAccount->name :'-') }}</td>
                                    <td>{{  $account->holder_name}}</td>
                                    <td>{{  $account->bank_name}}</td>
                                    <td>{{  $account->account_number}}</td>
                                    <td>{{  \Auth::user()->priceFormat($account->opening_balance)}}</td>
                                    <td>{{  $account->contact_number}}</td>
                                    <td>{{  $account->bank_address}}</td>
                                    {{-- @if(Gate::check('edit bank account') || Gate::check('delete bank account')) --}}
                                        <td class="Action">
                                            <span>
                                                @if($account->holder_name!='Cash')
                                                    {{-- @can('edit bank account') --}}
                                                        <div class="action-btn bg-primary ms-2">
                                                            <a href="#" class="mx-3 btn1 btn-sm align-items-center" data-url="{{ route('bank-account.edit',$account->id) }}" data-ajax-popup="true" title="{{__('Edit')}}" data-title="{{__('Edit Bank Account')}}"data-bs-toggle="tooltip"  data-size="lg"  data-original-title="{{__('Edit')}}">
                                                                <i class="fa fa-pencil text-white"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan
                                                    @can('delete bank account') --}}
                                                        <div class="action-btn bg-danger ms-2">
                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['bank-account.destroy', $account->id],'id'=>'delete-form-'.$account->id]) !!}
                                                                <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$account->id}}').submit();">
                                                                    <i class="fa fa-trash text-white text-white"></i>
                                                                </a>
                                                                {!! Form::close() !!}
                                                            </div>
                                                    {{-- @endcan --}}
                                                @else
                                                    -
                                                @endif
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
