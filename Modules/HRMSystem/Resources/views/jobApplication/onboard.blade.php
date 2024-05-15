@extends('layouts.app')
@section('page-title')
    {{__('Manage Job On-boarding')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Job On-boarding')}}</li>
@endsection
@section('action-btn')
    <div class="float-end">
    @can('create interview schedule')

            <a href="#" data-url="{{ route('job.on.board.create',0)}}"  data-bs-toggle="tooltip" title="{{__('Create')}}" data-ajax-popup="true" class="btn btn-sm btn-primary" data-title="{{__('Create New Job OnBoard')}}">
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
            <div class="card">
            <div class="card-body table-border-style">
                    <div class="table-responsive">
                    <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Job')}}</th>
                                <th>{{__('Branch')}}</th>
                                <th>{{__('Applied at')}}</th>
                                <th>{{__('Joining at')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($jobOnBoards as $job)
                                <tr>
                                    <td>{{ !empty($job->applications)?$job->applications->name:'-' }}</td>
                                    <td>{{!empty($job->applications)?!empty($job->applications->jobs)?$job->applications->jobs->title:'-':'-'}}</td>
                                    <td>{{!empty($job->applications)?!empty($job->applications->jobs)?!empty($job->applications->jobs)?!empty($job->applications->jobs->branches)?$job->applications->jobs->branches->branch_name:'-':'-':'-':'-'}}</td>
                                    <td>{{\Auth::user()->dateFormat(!empty($job->applications)?$job->applications->created_at:'-' )}}</td>
                                    <td>{{\Auth::user()->dateFormat($job->joining_date)}}</td>
                                    <td>
                                        @if($job->status=='pending')
                                            <span class="badge bg-warning p-2 px-3 rounded">{{\Modules\HRMSystem\Models\JobOnBoard::$status[$job->status]}}</span>
                                        @elseif($job->status=='cancel')
                                            <span class="badge bg-danger p-2 px-3 rounded">{{\Modules\HRMSystem\Models\JobOnBoard::$status[$job->status]}}</span>
                                        @else
                                            <span class="badge bg-success p-2 px-3 rounded">{{\Modules\HRMSystem\Models\JobOnBoard::$status[$job->status]}}</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($job->status=='confirm' && $job->convert_to_employee==0)
                                        <div class="action-btn bg-warning ms-2">

{{--                                            <a href="{{route('job.on.board.convert', $job->id)}}" class="mx-3 btn btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" data-original-title="{{__('Convert to Employee')}}"><i class="fa fa-exchange text-white"></i></a>--}}
                                            {!! Form::open(['method' => 'get', 'route' => ['job.on.board.convert', $job->id],'id'=>'job-form-'.$job->id]) !!}
                                            <a href="#" class="mx-3 btn btn-sm  align-items-center bs-pass-para" data-bs-toggle="tooltip"
                                               data-original-title="{{__('Convert to Employee')}}" title="{{__('Convert to Employee')}}"
                                               data-confirm="You want to confirm convert to invoice. Press Yes to continue or Cancel to go back"
                                               data-confirm-yes="document.getElementById('job-form-{{$job->id}}').submit();">
                                                <i class="fa fa-exchange text-white"></i>
                                            </a>
                                            {!! Form::close() !!}

                                        </div>
                                            @elseif($job->status=='confirm' && $job->convert_to_employee!=0)
                                            <div class="action-btn bg-info ms-2">
                                                <a href="{{route('employee.show', \Crypt::encrypt($job->convert_to_employee))}}" class="mx-3 btn btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('View')}}" data-original-title="{{__('Employee Detail')}}"><i class="fa fa-eye text-white"></i></a>
                                            </div>
                                            @endif

                                            <div class="action-btn bg-primary ms-2">
                                                <a href="#" data-url="{{route('job.on.board.edit', $job->id)}}" data-ajax-popup="true" class="mx-3 btn btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="fa fa-pencil text-white"></i></a>
                                            </div>

                                            <div class="action-btn bg-danger ms-2">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['job.on.board.delete', $job->id],'id'=>'delete-form-'.$job->id]) !!}
                                                <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$job->id}}').submit();"><i class="fa fa-trash text-white"></i></a>
                                                {!! Form::close() !!}
                                            </div>

                                            @if ($job->status == 'confirm' )
                                                <div class="action-btn bg-secondary ms-2">
                                                    <a href="{{route('offerlatter.download.pdf',$job->id)}}" class="mx-3 btn btn-sm  align-items-center " data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('OfferLetter PDF')}}" target="_blanks"><i class="fa fa-download text-white"></i></a>
                                                </div>
                                                <div class="action-btn bg-secondary ms-2">
                                                    <a href="{{route('offerlatter.download.doc',$job->id)}}" class="mx-3 btn btn-sm  align-items-center " data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('OfferLetter DOC')}}" target="_blanks"><i class="fa fa-download text-white"></i></a>
                                                </div>
                                            @endif

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
