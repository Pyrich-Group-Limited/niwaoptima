@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            @include('flash::message')
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="card-title">
                        Raise Demand Notice For {{ $client->company_name }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-secondary float-end" href="{{ route('areamanager') }}">
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
                    @if ($errors->any())
                                @foreach ($errors as $error)
                                    <small class="text-danger">{{ $error }}</small>
                                @endforeach
                            @endif
                            
                            <div class="data">
                                <div class="data-group">
                                    <div class="form-group w-100">
                                        <form method="POST" action="{{ route('demand.notice.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="row col-12">

                                                    {{-- <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="cp1-team-size">Select
                                                                Location <span class="text-danger">*</span></label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select js-select2" id="branch_id"
                                                                    name="branch_id" data-placeholder="Select Area Office"
                                                                    data-search="on" required>
                                                                    <option value="">Select
                                                                        Location</option>
                                                                    @foreach ($branches as $branch)
                                                                        <option
                                                                            value="{{ $branch->id ?? $branch->branch_id }}">
                                                                            {{ $branch->branch_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <input type="hidden" value="{{ auth()->user()->staff->branch_id }}" class="form-control"
                                                                        name="branch_id" id="branch_id" />
                                                    @if (auth()->user()->staff->branch_id == 1)
                                                     <div class="col-sm-6" style="" id="my_axis_id">
                                                        <div class="form-group">
                                                            <label class="form-label" for="axis_id">Select
                                                                Zone/Units/Axis</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-control" id="axis_id"
                                                                    name="axis_id">
                                                                    @foreach ($axis as $axis)
                                                                        <option
                                                                            value="{{ $axis->id }}">
                                                                            {{ $axis->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                    @endif
                                                    
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="service_id">Select Service Type:</label>
                                                        <select
                                                            class="form-select js-select2"data-placeholder="Select A Service"
                                                            data-ui="xl" id="service_id2" name="service_id"
                                                            data-search="on" required>
                                                            <option value="">Select A Service</option>
                                                            @foreach($services as $service)
                        <option value="{{ $service->id }}">
                            {{ $service->name }}
                        </option>
                        @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label for="service_type_id">Sub-Service Type:</label>
                                                        <select class="form-select js-select2" data-ui="xl"
                                                            id="service_type_id2" name="service_type_id" required>
                                                            <option>Select Sub-Service Type</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-12 mb-3 ml-5 mt-3">
                                                        <label for="service_type_id">Do you know the coordinates:</label>
                                                        <div class="form-control-wrap form-check">
                                                            <input name="show-coordinates" class="form-check-input"
                                                                type="radio" name="toggle" value="show"
                                                                id="showCoordinates">
                                                            <p>Yes</p>
                                                        </div>
                                                        <div class="form-control-wrap form-check">
                                                            <input name="show-coordinates" class="form-check-input"
                                                                type="radio" name="toggle" value="hide" checked
                                                                id="hideCoordinates">
                                                            <p>No</p>

                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 row" id="targetDiv">
                                                        <div class="col-sm-12 mb-1">Coordinate 1:</div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-3">
                                                                <label for="latitude">Latitude (Optional):</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        name="latitude1" id="latitude1" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="longitude">Longitude (Optional):</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        name="longitude1" id="longitude1" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mb-1">Coordinate 2:</div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="latitude">Latitude (Optional):</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        name="latitude2" id="latitude2" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="longitude">Longitude (Optional):</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        name="longitude2" id="longitude2" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                    <input type="hidden" class="form-control" value="10" name="current_step" id="current_step" />
                    <input type="hidden" class="form-control" value="{{ $client->id }}" name="user_id" id="user_id" />

                                                    <div class="col-sm-3">
                                                        <button type="submit"
                                                            class="mt-5 btn btn-success btn-lg mt-2"><em
                                                                class="icon ni ni-save me-2"></em>NEXT</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    @push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#service_id1').change(function() {
                document.getElementById('loader').style.display = 'block';
                var serviceId = $(this).val();
                if (serviceId) {
                    $.ajax({
                        type: "GET",
                        url: "/services/" + serviceId + "/service-processing-types",
                        success: function(data) {
                            $('#service_type_id1').empty();
                            if (data.length > 0) {
                                $.each(data, function(key, value) {
                                    $('#service_type_id1').append('<option value="' +
                                        value.id + '">' + value.name + '</option>');
                                });
                            } else {
                                $('#service_type_id1').append(
                                    '<option value="none">No result</option>');
                            }
                            document.getElementById('loader').style.display = 'none';
                        }
                    });
                } else {
                    $('#service_type_id1').empty();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
        

            $('#service_id2').change(function() {
                var serviceId = $(this).val();
                document.getElementById('loader').style.display = 'block';
                if (serviceId) {
                    $.ajax({
                        type: "GET",
                        url: "/services/" + serviceId + "/service-processing-types",
                        success: function(data) {
                            $('#service_type_id2').empty();
                            if (data.length > 0) {
                                $.each(data, function(key, value) {
                                    $('#service_type_id2').append('<option value="' +
                                        value.id + '">' + value.name + '</option>');
                                });
                            } else {
                                $('#service_type_id2').append(
                                    '<option value="0">No result</option>');
                            }
                            document.getElementById('loader').style.display = 'none';
                        }
                    });
                } else {
                    $('#service_type_id2').empty();
                }
            });
        });
    </script>
    {{-- </div><!-- .components-preview --> --}}

    <script>
        $(document).ready(function() {
            const formRadios = document.querySelectorAll(`input[type='radio'][name='show-coordinates']`);
            const targetDiv = document.getElementById('targetDiv');

            targetDiv.style.display = 'none';
            formRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'show') {
                        targetDiv.style.display = 'block';
                    } else {
                        targetDiv.style.display = 'none';
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#branch_id').change(function() {
                var branchId = $(this).val();
                if(branchId == 1){
                    $('#my_axis_id').show();
                }else {
                    $('#my_axis_id').hide();
                }
            });
        });
    </script>  
    @endpush
@endsection
