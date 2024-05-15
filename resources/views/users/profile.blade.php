@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4 class="card-title">
                        Change Details
                    </h4>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        @include('flash::message')

        <div class="card">

            {!! Form::model($user, ['route' => ['profile-update', $user->id], 'method' => 'post','enctype' => 'multipart/form-data']) !!}
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    @include('users.profile_fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('users.index') }}" class="btn btn-default"> Cancel </a>
                <a href="{{ route('change.email.password.form') }}" class="btn btn-secondary"> Change Password  </a>
            </div>

            
            {!! Form::close() !!}

        </div>
    </div>
@endsection
