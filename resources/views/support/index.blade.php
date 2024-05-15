@extends('layouts.app')
@push('script-page')
@endpush
@section('page-title')
    {{__('Support')}}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 ">{{__('Support')}}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Support')}}</li>
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
            <div class="float-end">
                <a href="{{ route('support.grid') }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="{{__('Grid View')}}">
                    <i class="fa fa-columns text-white"></i>
                </a>
                <a href="#" data-size="lg" data-url="{{ route('support.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create Support')}}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-primary">
                                    <i class="fa fa-cast"></i>
                                </div>
                                <div class="ms-3">
                                    <small class="text-muted">{{__('Total')}}</small>
                                    <h6 class="m-0">{{__('Ticket')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <h3 class="m-0">{{ $countTicket }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-info">
                                    <i class="fa fa-cast"></i>
                                </div>
                                <div class="ms-3">
                                    <small class="text-muted">{{__('Open')}}</small>
                                    <h6 class="m-0">{{__('Ticket')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <h3 class="m-0">{{ $countOpenTicket }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-warning">
                                    <i class="fa fa-cast"></i>
                                </div>
                                <div class="ms-3">
                                    <small class="text-muted">{{__('On Hold')}}</small>
                                    <h6 class="m-0">{{__('Ticket')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <h3 class="m-0">{{ $countonholdTicket }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-danger">
                                    <i class="fa fa-cast"></i>
                                </div>
                                <div class="ms-3">
                                    <small class="text-muted">{{__('Close')}}</small>
                                    <h6 class="m-0">{{__('Ticket')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <h3 class="m-0">{{ $countCloseTicket }}</h3>
                        </div>
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
                                <th scope="col">{{__('Created By')}}</th>
                                <th scope="col">{{__('Ticket')}}</th>
                                <th scope="col">{{__('Code')}}</th>
                                <th scope="col">{{__('Attachment')}}</th>
                                <th scope="col">{{__('Assign User')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th scope="col">{{__('Created At')}}</th>
                                <th scope="col" >{{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @php
                                $supportpath=\Modules\Accounting\Models\Utility::get_file('uploads/supports');
                            @endphp
                            @foreach($supports as $support)
                                <tr>
                                    <td scope="row">
                                        <div class="media align-items-center">
                                            <div>
                                                <div class="avatar-parent-child">
                                                    <img style="height: 50px;" alt="" class="avatar rounded-circle avatar-sm" @if(!empty($support->createdBy) && !empty($support->createdBy->avatar)) src="{{asset(Storage::url('uploads/avatar')).'/'.$support->createdBy->avatar}}" @else  src="{{asset(Storage::url('uploads/avatar')).'/avatar.png'}}" @endif>
                                                    @if($support->replyUnread()>0)
                                                        <span class="avatar-child avatar-badge bg-success"></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                {{!empty($support->createdBy)?$support->createdBy->first_name .' '.$support->createdBy->last_name:''}}
                                            </div>
                                        </div>
                                    </td>
                                    <td scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <a href="{{ route('support.reply',\Crypt::encrypt($support->id)) }}" class="name h6 mb-0 text-sm">{{$support->subject}}</a><br>
                                                @if($support->priority == 0)
                                                    <span data-toggle="tooltip" data-title="{{__('Priority')}}" class="text-capitalize badge bg-primary p-2 px-3 rounded">   {{ __(\App\Models\Support::$priority[$support->priority]) }}</span>
                                                @elseif($support->priority == 1)
                                                    <span data-toggle="tooltip" data-title="{{__('Priority')}}" class="text-capitalize badge bg-info p-2 px-3 rounded">   {{ __(\App\Models\Support::$priority[$support->priority]) }}</span>
                                                @elseif($support->priority == 2)
                                                    <span data-toggle="tooltip" data-title="{{__('Priority')}}" class="text-capitalize badge bg-warning p-2 px-3 rounded">   {{ __(\App\Models\Support::$priority[$support->priority]) }}</span>
                                                @elseif($support->priority == 3)
                                                    <span data-toggle="tooltip" data-title="{{__('Priority')}}" class="text-capitalize badge bg-danger p-2 px-3 rounded">   {{ __(\App\Models\Support::$priority[$support->priority]) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$support->ticket_code}}</td>
                                    <td>
                                        @if(!empty($support->attachment))
                                            <a  class="action-btn bg-primary ms-2 btn btn-sm align-items-center" href="{{ $supportpath . '/' . $support->attachment }}" download="">
                                                <i class="fa fa-download text-white"></i>
                                            </a>
                                            <a href="{{ $supportpath . '/' . $support->attachment }}"  class="action-btn bg-secondary ms-2 mx-3 btn btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Download')}}" target="_blank"><span class="btn-inner--icon"><i class="fa fa-crosshairs text-white" ></i></span></a>
                                        @else
                                            -
                                        @endif

                                    </td>
                                    <td>{{!empty($support->assignUser)?$support->assignUser->first_name .' '.$support->assignUser->last_name:'-'}}</td>
                                    <td>
                                        @if($support->status == 'Open')
                                            <span class="status_badge text-capitalize badge bg-success p-2 px-3 rounded">{{ __(\App\Models\Support::$status[$support->status]) }}</span>
                                        @elseif($support->status == 'Close')
                                            <span class="status_badge text-capitalize badge bg-danger p-2 px-3 rounded">{{ __(\App\Models\Support::$status[$support->status]) }}</span>
                                        @elseif($support->status == 'On Hold')
                                            <span  class="status_badge text-capitalize badge bg-warning p-2 px-3 rounded">{{ __(\App\Models\Support::$status[$support->status]) }}</span>
                                        @endif
                                    </td>
                                    <td>{{\Auth::user()->dateFormat($support->created_at)}}</td>
                                    <td class="Action">
                                    <span>
                                        <div class="action-btn bg-warning ms-2">
                                            <a href="{{ route('support.reply',\Crypt::encrypt($support->id)) }}" data-title="{{__('Support Reply')}}" class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Reply')}}" data-original-title="{{__('Reply')}}">
                                                <i class="fa fa-reply text-white"></i>
                                            </a>
                                        </div>
                                        @if(\Auth::user()->type=='company' || \Auth::user()->id==$support->ticket_created)
                                            <div class="action-btn bg-primary ms-2">
                                                <a href="#" data-size="lg" data-url="{{ route('support.edit',$support->id) }}" data-ajax-popup="true" data-title="{{__('Edit Support')}}" class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}">
                                                    <i class="fa fa-pencil text-white"></i>
                                                </a>
                                            </div>
                                            <div class="action-btn bg-danger ms-2">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['support.destroy', $support->id],'id'=>'delete-form-'.$support->id]) !!}
                                                    <a href="#!" class="mx-3 btn1 btn-sm  align-items-center bs-pass-para" data-bs-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" title="{{__('Delete')}}" data-confirm-yes="document.getElementById('delete-form-{{$support->id}}').submit();">
                                                        <i class="fa fa-trash text-white"></i>
                                                    </a>
                                                 {!! Form::close() !!}
                                            </div>

                                        @endif
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

