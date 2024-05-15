@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Received Letters</h1>
                </div>
               {{--  @if(Auth::user()->hasRole('super-admin')) --}}
                {{-- <div class="col-sm-6">
                    <a class="btn btn-primary float-end"
                       href="{{ route('incoming_documents_manager.create') }}">
                        Add New Incoming Manual Document
                    </a>
                </div> --}}
                {{-- @endif --}}
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('incoming_documents.table')
        </div>
    </div>

@endsection
