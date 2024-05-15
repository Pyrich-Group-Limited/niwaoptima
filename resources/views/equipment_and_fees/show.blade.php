@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="card-title">
                        Equipment and Fee Details
                    </h4>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-secondary float-end" href="{{ route('equipmentAndFees.index') }}">
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
                    @include('equipment_and_fees.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
