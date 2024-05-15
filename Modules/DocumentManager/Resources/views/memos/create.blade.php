@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Create Memos
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'memos.store', 'enctype' => 'multipart/form-data']) !!}
            @csrf

            <div class="card-body">

                <div class="row">
                    @include('documentmanager::memos.fields')

                    <div class="col-sm-12">
                        <h3>Assign to users and departments</h3>
                    </div>

                    <div class="col-sm-12 row mb-3">
                        <!-- department Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('departments', 'Department(s):') !!}
    {!! Form::select('departments[]', $departments, null, ['class' => 'form-control','id'=>'departmentSelect','multiple']) !!}
</div>

<!-- users Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users', 'User(s):') !!}
    {!! Form::select('users[]', $users, null, ['class' => 'form-control multiple','id'=>'userSelect','multiple']) !!}
</div> --}}
<div class="form-group col-sm-6">
    {!! Form::label('departments', 'Department(s):') !!}
    {!! Form::select('departments[]', $departments, null, ['class' => 'form-control', 'id' => 'departmentSelect', 'multiple' => 'multiple']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('users', 'User(s):') !!}
    {!! Form::select('users[]', $users, null, ['class' => 'form-control', 'id' => 'userSelect', 'multiple' => 'multiple']) !!}
</div>


                    </div>
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('memos.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@push('page_scripts')
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
<style>
    textarea.select2-search__field{
       width: 100%;
       
    }
    .select2-container .select2-search--inline .select2-search__field {
    box-sizing: border-box;
    border: none;
    font-size: 100%;
    margin-top: 0px;
    margin-left: 5px;
    padding: 0;
    max-width: 300px;
    resize: none;
    height: 25px;
    vertical-align: top;
    font-family: sans-serif;
    overflow: hidden;
    word-break: keep-all;
    }
</style>
<script>
    $(document).ready(function () {
        $('.form-control[multiple]').select2({
            theme: 'bootstrap',
            //placeholder: 'Select options',
            allowClear: true
        });
    });
</script>


@endpush

{{-- @push('page_scripts')
    <script>
        $(document).ready(function() {
            $("#user_select").select2({
                placeholder: "Search for user",
                minimumInputLength: 2,
                allowClear: true,
                ajax: {
                    url: "{{ url('api/users') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: {
                                email: params.term
                            },
                            limit: 10 // Number of users per page
                        };
                    },
                    processResults: function(data, params) {
                        var options = [];
                        $.each(data.data, function(index, user) {
                            options.push({
                                id: user.id,
                                text: user.email
                            });
                        });


                        return {
                            results: options,
                        };
                    },
                    cache: true
                },
                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
            });

            $("#department_select").select2({
                placeholder: "Search for department",
                minimumInputLength: 2,
                allowClear: true,
                ajax: {
                    url: "{{ url('api/shared/departments') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: {
                                name: params.term
                            },
                            limit: 10 // Number of departments per page
                        };
                    },
                    processResults: function(data, params) {

                        var options = [];
                        $.each(data.data, function(index, department) {
                            options.push({
                                id: department.id,
                                text: department.name
                            });
                        });

                        return {
                            results: options,
                        };
                    },
                    cache: true
                },
                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
            });
        })
    </script>
@endpush --}}
