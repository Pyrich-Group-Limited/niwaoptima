@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4 class="card-title">
                        Edit User
                    </h4>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($user, ['route' => ['users.update', $user->userId], 'method' => 'patch','enctype' => 'multipart/form-data']) !!}
            <a href="{{ route('users.index') }}" class="btn btn-default"> Back  </a>
            <div class="card-body">
                <div class="row">
                    {{-- @include('users.fields') --}}
                    @include('users.editfield')
                    {{-- do a different view in persnal , then put the edit to change the edit button --}}
                </div>
            </div>

            {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('users.index') }}" class="btn btn-default"> Cancel </a>
            </div> --}}

            {!! Form::close() !!}

        </div>
    </div>
@endsection
