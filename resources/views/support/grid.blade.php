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
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Support')}}</li>
@endsection


@section('filter')
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
                <a href="{{ route('support.index') }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="{{__('List View')}}">
                    <i class="fa fa-list"></i>
                </a>
        
                <a href="#" data-size="lg" data-url="{{ route('support.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create Support')}}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                </a>
        
            </div>
        </div>
        @foreach($supports as $support)
            <div class="col-md-3">
                <div class="card card-fluid">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <a href="#" class="avatar rounded-circle">
                                    <img style="height: 50px;" alt="" class="" @if(!empty($support->createdBy) && !empty($support->createdBy->avatar)) src="{{asset(Storage::url('uploads/avatar')).'/'.$support->createdBy->avatar}}" @else  src="{{asset(Storage::url('uploads/avatar')).'/avatar.png'}}" @endif>
                                    @if($support->replyUnread()>0)
                                        <span class="avatar-child avatar-badge bg-success"></span>
                                    @endif
                                </a>
                            </div>
                            <div class="col">
                                <a href="#!" class="d-block h6 mb-0">{{!empty($support->createdBy)?$support->createdBy->name:''}}</a>
                                <small class="d-block text-muted">{{$support->subject}}</small>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col text-center">
                                <span class="h6 mb-0">{{$support->ticket_code}}</span>
                                <span class="d-block text-sm">{{__('Code')}}</span>
                            </div>
                            <div class="col text-center">
                                <span class="h6 mb-0">
                                     @if($support->priority == 0)
                                        <span  class="text-capitalize badge bg-primary rounded-pill badge-sm">   {{ __(\App\Models\Support::$priority[$support->priority]) }}</span>
                                    @elseif($support->priority == 1)
                                        <span  class="text-capitalize badge badge-info rounded-pill badge-sm">   {{ __(\App\Models\Support::$priority[$support->priority]) }}</span>
                                    @elseif($support->priority == 2)
                                        <span  class="text-capitalize badge badge-warning rounded-pill badge-sm">   {{ __(\App\Models\Support::$priority[$support->priority]) }}</span>
                                    @elseif($support->priority == 3)
                                        <span  class="text-capitalize badge badge-danger rounded-pill badge-sm">   {{ __(\App\Models\Support::$priority[$support->priority]) }}</span>
                                    @endif
                                </span>
                                <span class="d-block text-sm">{{__('Priority')}}</span>
                            </div>
                            <div class="col text-center">
                                <span class="h6 mb-0">
                                    @if(!empty($support->attachment))
                                        <a href="{{asset(Storage::url('uploads/supports')).'/'.$support->attachment}}" download="" class="btn btn-sm btn-secondary btn-icon rounded-pill" target="_blank"><span class="btn-inner--icon"><i class="fa fa-download"></i></span></a>

                                    @else
                                        -
                                    @endif
                                </span>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">

                            <div class="col-6 text-start">
                                <span data-toggle="tooltip" data-title="{{__('Created Date')}}">{{\Auth::user()->dateFormat($support->created_at)}}</span>
                            </div>
                            <div class="col-6 d-flex float-end">
                                <div class="action-btn bg-warning me-2">
                                    <a href="{{ route('support.reply',\Crypt::encrypt($support->id)) }}" data-title="{{__('Support Reply')}}" class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Reply')}}" data-original-title="{{__('Reply')}}">

                                        <i class="fa fa-reply text-white"></i>

                                    </a>
                                </div>
                                @if(\Auth::user()->id==$support->ticket_created)
                                    <div class="action-btn bg-primary me-2">
                                        <a href="#" data-size="lg" data-url="{{ route('support.edit',$support->id) }}" data-ajax-popup="true" data-title="{{__('Edit Support')}}" class="mx-3 btn1 btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}">
                                            <i class="fa fa-edit text-white"></i>
                                        </a>
                                    </div>
                                    <div class="action-btn bg-danger me-2">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['support.destroy', $support->id],'id'=>'delete-form-'.$support->id]) !!}

                                        <a href="#!" class="mx-3 btn1 btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$support->id}}').submit();">
                                            <i class="fa fa-trash text-white"></i>
                                        </a>
                                        {!! Form::close() !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

