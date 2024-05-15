@extends('layouts.app')

@section('title', 'Service')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Processing Type</h3>
                <div class="nk-block-des text-soft">
                   
                </div>
            </div><!-- .nk-block-head-content -->
            <!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner mt-5 ml-4">
                <div><b>{{-- Location: {{ $processing_type->branch ? $processing_type->branch->branch_name : '' }}<br/>   --}}
                    Service Name: {{ $processing_type->service ? $processing_type->service->name : '' }} <br/> 
                    Processing Type: {{ $processing_type->name ? $processing_type->name : '' }}</br></div>
    
                <form action="{{ route('processing_type.update', $processing_type->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('processing_type.form')
                </form>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}

@endsection



