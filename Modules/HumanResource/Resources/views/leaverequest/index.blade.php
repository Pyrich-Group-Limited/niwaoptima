@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h4 class="card-title">
                LEAVE REQUEST HISTORY
            </h4>
           
            <div class="col-sm-6">
                <a class="btn btn-primary float-end" href="{{ route('leave_request.create') }}">
                    APPLY HERE
                </a>
            </div>
        </div>
        <div class="content px-3">
            @include('flash::message')
            <div class="clearfix"></div>
        </div>
        <div class="card">
            @include('humanresource::leaverequest.table')
        </div>
    </div>
@endsection
