@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        LEAVE REQUEST
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($LeaveRequest, ['route' => ['leave_request.update', $LeaveRequest->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('humanresource::leaverequest.editfield')
                </div>
            </div>

            <div class="card-footer">
                @if(isset($unit_head_data))
                {!! Form::submit('Approve & Send To HOD', ['class' => 'btn btn-primary']) !!}
                @endif
                @if(isset($department_head_data))
                {!! Form::submit('Approve & Send To HR', ['class' => 'btn btn-primary']) !!}
                @endif
                @role('HR')
                {!! Form::submit('Approve ', ['class' => 'btn btn-primary']) !!}
                @endrole
                {{-- @role('ED ADMIN')
                {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
                @endrole --}}




                {!! Form::submit('Reject', ['class' => 'btn btn-primary']) !!}
                {{-- <a href="{{ route('leave_request.index') }}" class="btn btn-danger"> Cancel </a> --}}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
