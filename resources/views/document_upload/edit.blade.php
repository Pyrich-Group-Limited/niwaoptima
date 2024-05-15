@extends('layouts.app')

@section('title', 'Service')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Document Name</h3>
                <div class="nk-block-des text-soft">
                   
                </div>
            </div><!-- .nk-block-head-content -->
            <!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner mt-5 ml-4">
                <div class="mb-5"><b>{{-- Location: {{ $document_upload->branch ? $document_upload->branch->branch_name : '' }}<br/>  --}} 
                    Service Name: {{ $document_upload->service ? $document_upload->service->name : '' }} <br/> 
                    Document Name: {{ $document_upload->name ? $document_upload->name : '' }}</br></div>
                <form action="{{ route('document_upload.update', $document_upload->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('document_upload.form')
                </form>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}

@endsection



