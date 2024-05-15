<!-- unit name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_name', 'Unit Name:') !!}
    {!! Form::text('unit_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- department Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_id', 'Departments:') !!}
    {!! Form::select('department_id', $departments, null, ['class' => 'form-control custom-select','id'=>'departmentSelect']) !!}
</div>

<!-- users Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'HEAD SECTION:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control custom-select','id'=>'userSelect']) !!}
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // JavaScript to handle the department selection and update user dropdown
    $('#departmentSelect').on('change', function () {
        const selectedDepartmentId = $(this).val();
        var homeUrl = window.location.origin;
        if (selectedDepartmentId) {
            $.get(`${homeUrl}/units/staff/${selectedDepartmentId}`, function (users) {
                $('#userSelect').empty().append('<option value="">Select Unit Head</option>');
                var u = JSON.stringify(users);
                    
                $.each(users, function (index, user) {
                    $('#userSelect').append(`<option value="${user.id}">${user.first_name} ${user.last_name}</option>`);
                });
            
            });
        } else {
            $('#userSelect').empty().append('<option value="">Select Unit Head</option>');
        }
    });
</script>
