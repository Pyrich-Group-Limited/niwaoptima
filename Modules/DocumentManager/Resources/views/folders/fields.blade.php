<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Id Field -->
<div id="branch_id_div" class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch:') !!}
    {!! Form::select('branch_id', $branches, null, ['class' => 'form-control custom-select','id'=>'branchSelect']) !!}
</div>

<!-- Department Id Field -->
<div id="department_id_div" class="form-group col-sm-6">
    {!! Form::label('department_id', 'Department:') !!}
    {!! Form::select('department_id', $departments, null, ['class' => 'form-control custom-select','id'=>'departmentSelect']) !!}
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    // JavaScript to handle the department selection and update user dropdown
    $('#branchSelect').on('change', function () {
        const selectedDepartmentId = $(this).val();
        
        
        var homeUrl = window.location.origin;
        
        if (selectedDepartmentId) {

            $.get(`${homeUrl}/units/branches/${selectedDepartmentId}`
            
            , function (users) {
              
                $('#departmentSelect').empty().append('<option value="">Select Department</option>');
                //
                var u = JSON.stringify(users);
               
                    
                $.each(users, function (index, user) {
                    $('#departmentSelect').append(`<option value="${user.id}">${user.name}</option>`);
                // alert('ff');
                });
            
            });
        } else {
            $('#departmentSelect').empty().append('<option value="">Select Department</option>');
        }
    });
</script> --}}
{{-- <script>
    // JavaScript to handle the department selection and update user dropdown
    $('#branchSelect').on('change', function () {
        const selectedDepartmentId = $(this).val();
        
        
        var homeUrl = window.location.origin;
        
        if (selectedDepartmentId) {

            $.get(`${homeUrl}/units/branches/${selectedDepartmentId}`
            
            , function (users) {
              
                $('#departmentSelect').empty().append('<option value="">Select Department</option>');
                //
                var u = JSON.stringify(users);
               
                    
                $.each(users, function (index, user) {
                    $('#departmentSelect').append(`<option value="${user.id}">${user.name}</option>`);
                // alert('ff');
                });
            
            });
        } else {
            $('#departmentSelect').empty().append('<option value="">Select Department</option>');
        }
    });
</script> --}}



{{-- @push('page_scripts')
    <script type="text/javascript">
        const departmentId = "{{ !empty($folder) ? $folder->department_id : '' }}";
        const branchId = $("#branch_id").val() || "{{ old('branch_id') }}";

        if (branchId) {
            getDepartments(branchId);
        }

        function getDepartments(selectedValue) {
            // Make an ajax call to the branches.departments.get route
            $.ajax({
                url: `{{ url('/shared/branches/departments/get') }}/${selectedValue}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Fill the options of the select element with the departments
                    $('#department_id').empty();
                    $('#department_id').append(`<option value="">Select department</option>`);
                    for (var i = 0; i < data.length; i++) {
                        if (departmentId == data[i].id) {
                            $('#department_id').append(
                                `<option selected value="${data[i].id}">${data[i].name}</option>`);
                        } else {
                            $('#department_id').append(
                                `<option value="${data[i].id}">${data[i].name}</option>`);
                        }
                    }
                }
            });
        }

        $('#branch_id').on('change', function() {
            const selectedValue = $(this).val();
            getDepartments(selectedValue);
        });
    </script>
@endpush
 --}}