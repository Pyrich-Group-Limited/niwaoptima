

<!-- Service Id Field -->
<div class="form-group col-sm-6">
    <div class="form-group">
        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-user"></em>
            </div>
            <label class="form-label-outlined" for="service_id">Select A Service</label>
            <select class="form-control" name="service_id" id="service_id">
                <option value="">Select Service</option>
                @foreach($services as $service)
                <option value="{{ $service->id }}" >
                    {{ $service->name }}
                </option>
            @endforeach
            </select>
            
        </div>
    </div>
</div>

<!-- Sub Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_service_id', 'Sub-Service:') !!}
    {!! Form::select('sub_service_id', [], null, ['class' => 'form-control custom-select', 'id' => 'sub_service_id']) !!}
</div>

<div class="form-group col-sm-6">
        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-user"></em>
            </div>
            <label class="form-label-outlined" for="processing_type_id">Processing Service Type</label>
            <select class="form-control" name="processing_type_id" id="processing_type_id">
                <option>Select Service Type</option>
            </select>
            
        </div>
    </div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name (Equipment, tools and measurement):') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Metric Field -->
<div class="form-group col-sm-6">
    {!! Form::label('metric', 'Metric:') !!}
    {!! Form::select('metric', enum_equipment_fees_metrics(), null, ['class' => 'form-control custom-select']) !!}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
    $('#service_id').change(function () {
        var serviceId = $(this).val();
        $('.loader-demo-box1').show();
        if (serviceId) {
            $.ajax({
                type: "GET",
                url: "/subservice/" + serviceId + "/subservice-types",
                success: function (data) {
                   // $('.loader-demo-box1').hide();
                    $('#sub_service_id').empty();
                    if (data.length > 0) {
                        $.each(data, function (key, value) {
                            $('#sub_service_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $('#sub_service_id').append('<option value="0">No result</option>');
                    }
                     // Trigger change event to set the selected value
                $('#sub_service_id').trigger('change');
                }
            });
        } else {
           // $('.loader-demo-box1').hide();
            $('#sub_service_id').empty();
        }

        if (serviceId) {
            $.ajax({
                type: "GET",
                url: "/services/" + serviceId + "/processing-types",
                data: { service_id: serviceId }, // Pass service_id in the request
                success: function (data) {
                    $('.loader-demo-box1').hide();
                    $('#processing_type_id').empty();
                    if (data.length > 0) {
                        $.each(data, function (key, value) {
                            $('#processing_type_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $('#processing_type_id').append('<option value="0">No result</option>');
                    }
                    // Trigger change event to set the selected value
                    $('#processing_type_id').trigger('change');
                }
            });
        } else {
            $('.loader-demo-box1').hide();
            $('#processing_type_id').empty();
        }
    });
});
</script>
<script>
    $(document).ready(function () {
    
});
</script>