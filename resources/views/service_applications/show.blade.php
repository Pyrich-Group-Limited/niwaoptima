@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            @include('flash::message')
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="card-title">
                        Application Details
                    </h4>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-secondary float-end" href="{{ route('serviceApplications.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('service_applications.show_fields')
                </div>
            </div>
        </div>
    </div>

    @if ($serviceApplication->current_step == 5)
        <div class="content px-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-6">
                        <h3>
                            Documents
                        </h3>
                    </div>
                    <div class="row">
                        @include('service_applications.documents')
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="content px-3 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6">
                    <h3>
                        Payments
                    </h3>
                </div>
                <div class="row">
                    @include('service_applications.payments')
                </div>
            </div>
        </div>
    </div>
@endsection
