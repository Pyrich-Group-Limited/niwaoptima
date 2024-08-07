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

    <div class="content px-3" style="margin-bottom: 100px;">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($dtarequests, ['route' => ['dtarequests.update', $dtarequests->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('dtarequests::dtarequests.edit_fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('SUBMIT', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
