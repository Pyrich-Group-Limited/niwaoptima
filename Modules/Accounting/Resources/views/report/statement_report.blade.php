@extends('layouts.app')
@section('page-title')
    {{__('Account Statement Summary')}}
@endsection
@push('script-page')

    <script>
        var filename = $('#filename').val();

        function saveAsPDF() {
            var element = document.getElementById('printableArea');
            var opt = {
                margin: 0.3,
                filename: filename,
                image: {type: 'jpeg', quality: 1},
                html2canvas: {scale: 4, dpi: 72, letterRendering: true},
                jsPDF: {unit: 'in', format: 'A4'}
            };
            html2pdf().set(opt).from(element).save();
        }

        $(document).ready(function () {
            var filename = $('#filename').val();
            $('#report-dataTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        title: filename
                    },
                    {
                        extend: 'pdf',
                        title: filename
                    },  {
                        extend: 'csv',
                        title: filename
                    }
                ]
            });
        });
    </script>
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Account Statement Summary')}}</li>
@endsection


@section('action-btn')
    <div class="float-end">
        {{--        <a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" data-bs-toggle="tooltip" title="{{__('Filter')}}">--}}
        {{--            <i class="ti ti-filter"></i>--}}
        {{--        </a>--}}

        <a href="{{route('accountstatement.export')}}" data-bs-toggle="tooltip" title="{{__('Export')}}" class="btn btn-sm btn-primary">
            <i class="ti ti-file-export"></i>
        </a>

        <a href="#" class="btn btn-sm btn-primary" onclick="saveAsPDF()"data-bs-toggle="tooltip" title="{{__('Download')}}" data-original-title="{{__('Download')}}">
            <span class="btn-inner--icon"><i class="ti ti-download"></i></span>
        </a>

    </div>
@endsection


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="mt-2 " id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(array('route' => array('report.account.statement'),'method'=>'get','id'=>'report_account')) }}
                        <div class="row align-items-center justify-content-end">
                            <div class="col-xl-10">
                                <div class="row">

                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{ Form::label('start_month', __('Start Month'),['class'=>'form-label'])}}
                                            {{Form::month('start_month',isset($_GET['start_month'])?$_GET['start_month']:date('Y-m', strtotime("-5 month")),array('class'=>'month-btn form-control'))}}
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{ Form::label('end_month', __('End Month'),['class'=>'form-label'])}}
                                            {{Form::month('end_month',isset($_GET['end_month'])?$_GET['end_month']:date('Y-m'),array('class'=>'month-btn form-control'))}}
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{ Form::label('account', __('Account'),['class'=>'form-label'])}}
                                            {{Form::select('account', $account,isset($_GET['account'])?$_GET['account']:'', array('class' => 'form-control select')) }}
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            {{ Form::label('type', __('Category'),['class'=>'form-label'])}}
                                            {{ Form::select('type',$types,isset($_GET['type'])?$_GET['type']:'', array('class' => 'form-control select','placeholder'=>__('Select Category'))) }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="col-auto mt-4">

                                        <a href="#" class="btn btn-sm btn-primary" onclick="document.getElementById('report_account').submit(); return false;" data-bs-toggle="tooltip" title="{{__('Apply')}}" data-original-title="{{__('apply')}}">
                                            <span class="btn-inner--icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-up" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 3.707 2.354 9.354a.5.5 0 1 1-.708-.708l6-6z"/>
                                                <path fill-rule="evenodd" d="M7.646 6.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 7.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                                              </svg></span>
                                        </a>

                                        <a href="{{route('report.account.statement')}}" class="btn btn-sm btn-danger " data-bs-toggle="tooltip"  title="{{ __('Reset') }}" data-original-title="{{__('Reset')}}">
                                            <span class="btn-inner--icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                                              </svg></span>
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

    <div id="printableArea">
        <div class="row mt-3">
            <div class="col">
                <input type="hidden" value="{{__('Account Statement').' '.$filter['type'].' '.'Report of'.' '.$filter['startDateRange'].' to '.$filter['endDateRange']}}" id="filename">
                <div class="card p-4 mb-4">
                    <h7 class="report-text gray-text mb-0">{{__('Report')}} :</h7>
                    <h6 class="report-text mb-0">{{__('Account Statement Summary')}}</h6>
                </div>
            </div>
            @if($filter['account']!=__('All'))
                <div class="col">
                    <div class="card p-4 mb-4">
                        <h7 class="report-text gray-text mb-0">{{__('Account')}} :</h7>
                        <h6 class="report-text mb-0">{{$filter['account']}}</h6>
                    </div>
                </div>
            @endif
            @if($filter['type']!=__('All'))
                <div class="col">
                    <div class="card p-4 mb-4">
                        <h7 class="report-text gray-text mb-0">{{__('Type')}} :</h7>
                        <h6 class="report-text mb-0">{{$filter['type']}}</h6>
                    </div>
                </div>
            @endif
            <div class="col">
                <div class="card p-4 mb-4">
                    <h7 class="report-text gray-text mb-0">{{__('Duration')}} :</h7>
                    <h6 class="report-text mb-0">{{$filter['startDateRange'].' to '.$filter['endDateRange']}}</h6>
                </div>
            </div>
        </div>

        @if(!empty($reportData['revenueAccounts']))
            <div class="row">
                @foreach($reportData['revenueAccounts'] as $account)
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="card p-4 mb-4">
                            @if($account->holder_name =='Cash')
                                <h7 class="report-text gray-text mb-0">{{$account->holder_name}}</h7>
                            @elseif(empty($account->holder_name))
                                <h7 class="report-text gray-text mb-0">{{__('Stripe / Paypal')}}</h7>
                            @else
                                <h7 class="report-text gray-text mb-0">{{$account->holder_name.' - '.$account->bank_name}}</h7>
                            @endif
                            <h6 class="report-text mb-0">{{\Auth::user()->priceFormat($account->total)}}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if(!empty($reportData['paymentAccounts']))
            <div class="row">
                @foreach($reportData['paymentAccounts'] as $account)
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="card p-4 mb-4">
                            @if($account->holder_name =='Cash')
                                <h5 class="report-text gray-text mb-0">{{$account->holder_name}}</h5>
                            @elseif(empty($account->holder_name))
                                <h5 class="report-text gray-text mb-0">{{__('Stripe / Paypal')}}</h5>
                            @else
                                <h5 class="report-text gray-text mb-0">{{$account->holder_name.' - '.$account->bank_name}}</h5>
                            @endif
                            <h5 class="report-text mb-0">{{\Auth::user()->priceFormat($account->total)}}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Amount')}}</th>
                                <th>{{__('Description')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($reportData['revenues']))
                                @foreach ($reportData['revenues'] as $revenue)
                                    <tr class="font-style">
                                        <td>{{ Auth::user()->dateFormat($revenue->date) }}</td>
                                        <td>{{ Auth::user()->priceFormat($revenue->amount) }}</td>
                                        <td>{{$revenue->description}} </td>
                                    </tr>
                                @endforeach
                            @endif
                            @if(!empty($reportData['payments']))
                                @foreach ($reportData['payments'] as $payments)
                                    <tr class="font-style">
                                        <td>{{ Auth::user()->dateFormat($payments->date) }}</td>
                                        <td>{{ Auth::user()->priceFormat($payments->amount) }}</td>
                                        <td>{{!empty($payments->description)?$payments->description:'-'}} </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
