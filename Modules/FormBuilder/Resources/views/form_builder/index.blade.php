@extends('layouts.app')
@section('page-title')
    {{__('Manage Form Builder')}}
@endsection

@section('content')
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
@push('page_scripts')
<script>
    $(document).ready(function () {
        $('.cp_link').on('click', function () {
            var value = $(this).attr('data-link');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(value).select();
            document.execCommand("copy");
            $temp.remove();
            show_toastr('success', '{{__('Link Copy on Clipboard')}}')
        });
    });

    $(document).ready(function () {
        $('.iframe_link').on('click', function () {
            var value = $(this).attr('data-link');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(value).select();
            document.execCommand("copy");
            $temp.remove();
            show_toastr('success', '{{__('Link Copy on Clipboard')}}')
        });
    });
</script>   
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Form Builder')}}</li>
@endsection

    <div class="row">
        <div class="col-xl-12">
{{-- @section('action-btn') --}}
<div class="float-end">
    <a href="#" data-size="md" data-url="{{ route('form_builder.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create New Form')}}" class="btn btn-sm btn-primary">
        <i class="fa fa-plus"></i>
    </a>
</div>
{{-- @endsection --}}
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Response')}}</th>
                                {{-- @if(\Auth::user()->type=='company') --}}
                                    <th class="text-end" width="250px">{{__('Action')}}</th>
                               {{--  @endif --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($forms as $form)
                                <tr>
                                    <td>{{ $form->name }}</td>
                                    <td>
                                        {{ $form->response->count() }}
                                    </td>
                                   {{--  @if(\Auth::user()->type=='company') --}}
                                        <td class="text-end">


                                            <div class="action-btn bg-primary ms-2">
                                                <a href="#" class="mx-3 btn1 btn-sm d-inline-flex align-items-center cp_link" data-link="{{url('/form/'.$form->code)}}" data-bs-toggle="tooltip" title="{{__('Click to copy link')}}"><i class="fa fa-copy text-white"></i></a>
                                            </div>

                                            <div class="action-btn bg-primary ms-2">
                                                <a href="#" class="mx-3 btn1 btn-sm d-inline-flex align-items-center cp_link" data-link="<iframe src='{{url('/form/'.$form->code)}}' title='{{ $form->name }}'></iframe>" data-bs-toggle="tooltip" title="{{__('Click to copy iframe link')}}"><i class="fa fa-code text-white"></i></a>
                                            </div>

                                            {{-- <div class="action-btn bg-secondary ms-2">
                                                <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-url="{{ route('form.field.bind',$form->id) }}" data-ajax-popup="true" data-size="md" data-bs-toggle="tooltip" title="{{__('Convert into Lead Setting')}}" data-title="{{__('Convert into Lead Setting')}}">
                                                    <i class="ti ti-exchange text-white"></i>
                                                </a>
                                            </div> --}}

                                            @can('manage form field')
                                                <div class="action-btn bg-secondary ms-2">
                                                    <a href="{{route('form_builder.show',$form->id)}}" class="mx-3 btn1 btn-sm d-inline-flex align-items-center" data-bs-toggle="tooltip" title="{{__('Click to create forms')}}"><i class="fa fa-table text-white"></i></a>
                                                </div>
                                            @endcan

                                            @can('view form response')
                                                <div class="action-btn bg-warning ms-2">
                                                    <a href="{{route('form.response',$form->id)}}" class="mx-3 btn1 btn-sm d-inline-flex align-items-center" data-bs-toggle="tooltip" title="{{__('View sent responses')}}"><i class="fa fa-eye text-white"></i></a>
                                                </div>
                                            @endcan
                                            @can('edit form builder')
                                                <div class="action-btn bg-info ms-2">
                                                    <a href="#" class="mx-3 btn1 btn-sm d-inline-flex align-items-center" data-url="{{ route('form_builder.edit',$form->id) }}" data-ajax-popup="true" data-size="md" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-title="{{__('Form Builder Edit')}}">
                                                        <i class="fa fa-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            @endcan
                                            @can('delete form builder')
                                                <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['form_builder.destroy', $form->id],'id'=>'delete-form-'.$form->id]) !!}
                                                    <a href="#"  class="mx-3 btn1 btn-sm  align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}"><i class="fa fa-trash text-white"></i></a>
                                                    {!! Form::close() !!}
                                                </div>
                                            @endcan
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
