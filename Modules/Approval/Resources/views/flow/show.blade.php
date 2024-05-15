@extends('layouts.app')

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Approval Flow</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-end" href="{{ route('flow.edit') }}">
                        Edit Flow
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>



    </div>
@endsection
