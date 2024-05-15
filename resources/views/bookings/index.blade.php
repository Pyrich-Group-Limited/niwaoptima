@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="card-title">Bookings.</h4>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-end" href="{{ route('bookings.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('bookings.table')
        </div>
    </div>
@endsection
