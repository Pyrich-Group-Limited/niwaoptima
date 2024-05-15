@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DTA Reviews</h1>
                    </div>

                </div>
            </div>
        </section>

        <div class="content px-3">

            @include('flash::message')

            <div class="clearfix"></div>
        </div>
        <div class="card">
            @include('dtarequests::dtareview.table')
        </div>
    </div>
@endsection
