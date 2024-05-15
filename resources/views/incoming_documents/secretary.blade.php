@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Incoming Letters</h1>
                </div>
               {{--  @if(Auth::user()->hasRole('super-admin')) --}}
                <div class="col-sm-6">
                    <a class="btn btn-primary float-end"
                       href="{{ route('incoming_documents_manager.create') }}">
                        Add New Incoming Letter
                    </a>
                </div>
                {{-- @endif --}}
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>
     @can('view incoming letter and files')
    

        <div class="card">
            @include('incoming_documents.secretary_table')
        </div>
        @endcan
    </div>

@endsection
