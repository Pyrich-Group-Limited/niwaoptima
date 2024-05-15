@extends('layouts.app')

@section('title', 'Service')


@push('styles')
@endpush


@section('content')

    
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Create Monitoring Fee</h3>
                <div class="nk-block-des text-soft">
                    
                </div>
            </div><!-- .nk-block-head-content -->
            <!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <form action="{{ route('monitoring_fee.store') }}" method="POST">
                    @csrf
                    @include('monitoring_fee.form')
                </form>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    

@endsection