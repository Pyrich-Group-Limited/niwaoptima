@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    Create DTA Requests
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'dtarequests.store','enctype' => 'multipart/form-data']) !!}

            <div class="card-body">

                <div class="row">
                    @include('dtarequests::dtarequests.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('dtarequests.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    <script>
        function validateFile(input) {
            if (input.files && input.files[0]) {
                var fileSize = input.files[0].size; // Size in bytes
                var maxSize = 1024 * 1024; // 1MB in bytes
    
                if (fileSize > maxSize) {
                    alert('File size exceeds the maximum limit of 1MB.');
                    input.value = ''; // Clear the file input
                }
            }
        }
    </script>
@endsection
