<div class="preview-block">
    <div class="row gy-4 mt-5">
        
        <div class="col-md-12">
            <div class="col-lg-4 col-10 ml-3">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <div class="form-icon form-icon-right">
                            <em class="icon ni ni-user"></em>
                        </div>
                        <label class="form-label-outlined" for="service_id">Select A Service</label>
                        <select class="form-control" name="service_id" id="service_id">
                            <option value="">Select Service</option>
                            @foreach($services as $service)
                        <option value="{{ $service->id }}">
                            {{ $service->name }}
                        </option>
                        @endforeach
                        </select>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="col-lg-4 col-10 ml-3">
                <div class="form-group">
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
            </div>
        </div>
        <div class="col-lg-4 col-10 ml-4">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <label class="form-label-outlined" for="amount">Application Fee</label>
                    <input type="number" class="form-control form-control-xl form-control-outlined"
                        id="amount" name="amount" value="{{old('amount', $application_form_fee->amount ?? '')}}">
                    
                </div>
            </div>
        </div>
    </div>
    

    <div class="row g-4 ml-4">
        <div class="col-3">
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary"><em
                        class="icon ni ni-save me-2"></em> SUBMIT</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
    $('#service_id').change(function () {
        var serviceId = $(this).val();
       // var branchId = $('#branch_id').val(); // Get the selected service_id
        $('.loader-demo-box1').show();
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

$(document).ready(function () {
    $('#branch_id').change(function () {
        var branchId = $(this).val();
        $('.loader-demo-box1').show();
         if (branchId) {
            $.ajax({
                type: "GET",
                url: "/services/" + branchId + "/get-services",
                success: function (data) {
                    $('.loader-demo-box1').hide();
                    $('#service_id').empty();
                    if (data.length > 0) {
                        $.each(data, function (key, value) {
                            $('#service_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $('#service_id').append('<option value="0">No result</option>');
                    }
                     // Trigger change event to set the selected value
                $('#service_id').trigger('change');
                }
            });
        } else {
            $('.loader-demo-box1').hide();
            $('#service_id').empty();
        }
    });
});
</script>
