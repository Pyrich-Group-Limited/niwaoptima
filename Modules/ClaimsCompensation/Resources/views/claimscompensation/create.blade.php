@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    Create Claims & Compensations
                    </h1>
                    
                
                </div>
                <div class="card">
                    <div class="form-group col-sm-6">
              
                    

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'claimscompensation.store','enctype' => 'multipart/form-data']) !!}

            <div class="card-body">

                <div class="row">
                    @include('claimscompensation::claimscompensation.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('claimscompensation.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
