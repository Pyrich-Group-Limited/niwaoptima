@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4 class="card-title">
                        UPDATE STAFF STATUS
                    </h4>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($user, ['route' => ['myupdate', $user->userId], 'method' => 'put','enctype' => 'multipart/form-data']) !!}

            <div class="card-body">
                <div class="row">
                    
<div class="form-group col-sm-4">
    {!! Form::label('status', 'Change Staff Status') !!}
    <div class="">
        {!! Form::radio('status', 1,false) !!}&nbsp;APPROVE
    {!! Form::radio('status', 0,true) !!}&nbsp;DISAPPROVE&nbsp;&nbsp;
   
    </div>

</div>
</div> 
                    
                </div>
            </div>

            <div class="card-footer mt-6">
                {!! Form::submit('UPDATE', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('users.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

