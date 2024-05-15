@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Review/Comment DTA Requests
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($dtarequests, ['route' => ['dtarequests.update', $dtarequests->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('dtarequests::dtarequests.edit_fields')
                </div>
            </div>

            <div class="card-footer">
                @if(isset($unit_head_data))
                {!! Form::submit('Approve & Send To HOD', ['class' => 'btn btn-primary']) !!}
                @endif
                @if(isset($department_head_data))
                {!! Form::submit('Approve & Send To MD', ['class' => 'btn btn-primary']) !!}
                @endif
                @role('MD')
                {!! Form::submit('Approve & Send To ED FINANCE & ACCOUNT', ['class' => 'btn btn-primary']) !!}
                @endrole
                @role('ED FINANCE & ACCOUNT')
                {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
                @endrole
                {!! Form::submit('Reject', ['class' => 'btn btn-danger']) !!}
                {{-- <a href="{{ route('dtarequests.index') }}" class="btn btn-default"> Reject </a> --}}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
