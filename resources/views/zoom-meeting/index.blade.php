@extends('layouts.app')
@section('page-title')
    {{__('Manage Zoom Meeting')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Zoom Meeting')}}</li>
@endsection
@php

   
    $profile = \Modules\Accounting\Models\Utility::get_file('uploads/avatar');
@endphp


@push('script-page')
    <script type="text/javascript">

        $(document).on("click", '.member_remove', function () {
            var rid = $(this).attr('data-id');
            $('.confirm_yes').addClass('m_remove');
            $('.confirm_yes').attr('uid', rid);
            $('#cModal').modal('show');
        });
        $(document).on('click', '.m_remove', function (e) {
            var id = $(this).attr('uid');
            var p_url = "{{url('zoom-meeting')}}"+'/'+id;
            var data = {id: id};
            deleteAjax(p_url, data, function (res) {
                toastrs(res.flag, res.msg);
                if(res.flag == 1){
                    location.reload();
                }
                $('#cModal').modal('hide');
            });
        });
    </script>
@endpush

@section('action-btn')
   
@endsection

@section('content')
    <div class="row">
        <div class="float-end my-5">

                   {{-- <a href="{{ route('zoom-meeting.calender') }}"  data-original-title="{{__('Calendar View')}}" class="btn btn-sm btn-primary">
                       <i class="ti ti-calendar"></i> {{__('Calendar View')}}
                   </a>
            <a href="{{ route('zoom-meeting.calender') }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="{{__('Calender View')}}" data-original-title="{{__('Calender View')}}">
                {{-- <i class="ti ti-calendar"></i> --}}
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">
                    <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                  </svg> --}}
            {{-- </a> --}} 
    
            <a href="#" data-size="lg" data-url="{{ route('zoom-meeting.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create  New Meeting')}}" class="btn btn-sm btn-primary">
                {{-- <i class="ti ti-plus"></i> --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
            </a>
    
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th> {{ __('Title') }} </th>
                                <th> {{ __('Project') }}  </th>
                                <th> {{ __('User') }}  </th>
                                <th >{{ __('Meeting Time') }}</th>
                                <th >{{ __('Duration') }}</th>
                                <th >{{ __('Join URL') }}</th>
                                <th >{{ __('Status') }}</th>
                                @if(\Auth::user()->type == 'company')
                                    <th class="text-end"> {{ __('Action') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($meetings as $item)
                                <tr>
                                    <td>{{$item->title}}</td>
                                    <td>{{ !empty($item->projectName)?$item->projectName:'' }}</td>
                                    <td>
                                        @if(!empty($projectUser))
                                            <div class="avatar-group">
                                                @foreach($item->users($item->user_id) as $projectUser)
                                                    <img alt="image" data-bs-toggle="tooltip" data-bs-placement="top"
                                                         title="{{$projectUser->name}}"
                                                         @if($projectUser->avatar)
                                                         src="{{$profile.'/'.$projectUser->avatar}}"
                                                         @else
                                                         src="{{$profile."avatar.png"}}"
                                                         @endif
                                                         class="avatar rounded-circle avatar-sm avatar-group" width="25" height="25">
                                                @endforeach
                                            </div>
                                        @else
                                            -
                                        @endif

                                    </td>
                                    <td>{{$item->start_date}}</td>
                                    <td>{{$item->duration}} {{__("Minutes")}}</td>

                                    <td>
                                        @if($item->created_by == \Auth::user()->id && $item->checkDateTime())
                                            <a href="{{$item->start_url}}" target="_blank"> {{__('Start meeting')}} <i class="ti ti-external-link-square-alt "></i></a>
                                        @elseif($item->checkDateTime())

                                            <a href="{{$item->join_url}}" target="_blank"> {{__('Join meeting')}} <i class="ti ti-external-link-square-alt "></i></a>
                                        @else
                                            -
                                        @endif


                                    </td>
                                    <td>
                                        @if($item->checkDateTime())
                                            @if($item->status == 'waiting')
                                                <span class="badge bg-info p-2 px-3 rounded status_badge">{{ucfirst($item->status)}}</span>
                                            @else
                                                <span class="badge bg-success p-2 px-3 rounded status_badge">{{ucfirst($item->status)}}</span>
                                            @endif
                                        @else
                                            <span class="badge bg-danger p-2 px-3 rounded status_badge">{{__("End")}}</span>
                                        @endif
                                    </td>
                                    @if(\Auth::user()->type == 'company')
                                        <td class="text-end">
                                            <div class="action-btn bg-danger ms-2">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['zoom-meeting.destroy', $item->id],'id'=>'delete-form-'.$item->id]) !!}

                                                <a href="#" class="mx-3 btn btn-sm  align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$item->id}}').submit();"><i class="ti ti-trash text-white"></i></a>
                                                {!! Form::close() !!}
                                            </div>

                                        </td>
                                    @endif
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


