@extends('layouts.app')

@section('title', 'Service')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Inspection Fee</h3>
                <div class="nk-block-des text-soft">
                   
                </div>
            </div><!-- .nk-block-head-content -->
            <!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner mt-5 ml-4">
                <div><b>{{-- Location: {{ $inspection_fee->branch ? $inspection_fee->branch->branch_name : '' }}<br/>   --}}
                    Service Name: {{ $inspection_fee->service ? $inspection_fee->service->name : '' }} <br/> 
                    Processing Type: {{ $inspection_fee->processingType ? $inspection_fee->processingType->name : '' }}</br></div>
    
                <form action="{{ route('inspection_fee.update', $inspection_fee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('inspection_fee.form')
                </form>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}

@endsection



