@extends('layouts.app')
@section('page-title')
    {{__('Manage Chart of Accounts')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Chart of Account')}}</li>
@endsection
{{-- @push('script-page') --}}
    
{{-- @endpush --}}

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
                {{-- @can('create chart of account') --}}
                    <a href="#" data-url="{{ route('chart-of-account.create') }}" data-bs-toggle="tooltip" title="{{__('Create')}}" data-size="lg" data-ajax-popup="true" data-title="{{__('Create New Account')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
               {{--  @endcan --}}
            </div>
        </div>
        <div class="col-md-12">
        @foreach($chartAccounts as $type=>$accounts)
            
                <div class="card">
                    <div class="card-header">
                        <h6>{{$type}}</h6>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th> {{__('Code')}}</th>
                                    <th> {{__('Name')}}</th>
                                    <th> {{__('Type')}}</th>
                                    <th> {{__('Journal Balance')}}</th>
                                    <th> {{__('Transaction Balance')}}</th>
                                    <th> {{__('Status')}}</th>
                                    <th width="10%"> {{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($accounts as $account)
                                    @php
                                        $balance = 0;
                                        $totalDebit   = 0;
                                        $totalCredit  = 0;
                                        $totalBalance =Modules\Accounting\Models\Utility::getAccountBalance($account->id);
                                    @endphp

                                    <tr>
                                        <td>{{ $account->code }}</td>
                                        <td><a href="{{ route('chart-of-account.show',$account->id) }}?account={{$account->id}}">{{ $account->name }}</a></td>
                                        <td>{{!empty($account->subType)?$account->subType->name:'-'}}</td>
                                        <td>
                                            @if(!empty($account->balance()) && $account->balance()['netAmount']<0)
                                                {{__('Dr').'. '.\Auth::user()->priceFormat(abs($account->balance()['netAmount']))}}
                                            @elseif(!empty($account->balance()) && $account->balance()['netAmount']>0)
                                                {{__('Cr').'. '.\Auth::user()->priceFormat($account->balance()['netAmount'])}}
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td>
                                            @if(!empty($totalBalance))
                                                {{\Auth::user()->priceFormat($totalBalance)}}
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td>
                                            @if($account->is_enabled==1)
                                                <span class="badge bg-primary p-2 px-3 rounded">{{__('Enabled')}}</span>
                                            @else
                                                <span class="badge bg-danger p-2 px-3 rounded">{{__('Disabled')}}</span>
                                            @endif
                                        </td>
                                        <td class="Action">
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="{{ route('chart-of-account.show',$account->id) }}?account={{$account->id}}" class="mx-3 btn1 btn-sm align-items-center " data-bs-toggle="tooltip" title="{{__('Transaction Summary')}}" data-original-title="{{__('Detail')}}">
                                                    <i class="fa fa-eye text-white"></i>
                                                </a>

                                            </div>
                                            {{-- <div class="action-btn bg-info ms-2">
                                                <a href="{{route('report.ledger')}}?account={{$account->id}}" class="mx-3 btn btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Ledger Summary')}}" data-original-title="{{__('Ledger Summary')}}">
                                                    <i class="ti ti-eye text-white"></i>
                                                </a>
                                            </div> --}}
                                            {{-- @can('edit chart of account') --}}
                                                <div class="action-btn bg-primary ms-2">
                                                    <a href="#" class="mx-3 btn1 btn-sm align-items-center" data-url="{{ route('chart-of-account.edit',$account->id) }}" data-ajax-popup="true" data-title="{{__('Edit Account')}}" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}">
                                                        <i class="fa fa-pencil text-white"></i>
                                                    </a>
                                                </div>
                                         {{--    @endcan --}}
                                           {{--  @can('delete chart of account') --}}
                                                <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['chart-of-account.destroy', $account->id],'id'=>'delete-form-'.$account->id]) !!}
                                                    <a href="#" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$account->id}}').submit();">
                                                        <i class="fa fa-trash text-white"></i>
                                                    </a>
                                                    {!! Form::close() !!}
                                                </div>
                                          {{--   @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
        @endforeach
    </div>
    </div>
    <script>
        $(document).on('change', '#type', function () {
            var type = $(this).val();
            $.ajax({
                url: '{{route('charofAccount.subType')}}',
                type: 'POST',
                data: {
                    "type": type,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#sub_type').empty();
                    $.each(data, function (key, value) {
                        $('#sub_type').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
                error: function (data){
                    //alert(JSON.stringify(data) +" error msg");
                }
            });
        });
    </script>
@endsection
