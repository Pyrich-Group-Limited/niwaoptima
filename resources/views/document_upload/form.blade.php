<div class="preview-block">
   
    <div class="row gy-4">
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
        <div class="col-lg-4 col-10 ml-4">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <label class="form-label-outlined" for="name">Document Name</label>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="name" name="name" value="{{old('name', $document_upload->name ?? '')}}">
                    
                </div>
            </div>
        </div>
    </div>
   
    <div class="row g-4 ml-4">
        <div class="col-3">
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary "><em
                        class="icon ni ni-save me-2"></em> SUBMIT</button>
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
<script>
    /* $(document).ready(function () {
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
}); */
</script>
