<div class="current" data-kt-stepper-element="content">
    @csrf
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">Update Personal Information
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                    title="Provide accurate personal details"></i>
            </h2>
            <div class="text-muted fw-semibold fs-6">For security reasons, your information is safe.
                <a href="#" class="link-primary fw-bold">Privacy Policy</a>.
            </div>
        </div>
        <div class="fv-row">
            <div class="row">
                <!-- RANK -->
                
                <!-- Role Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('roles', 'Roles') !!}
                    {{-- {!! Form::select('roles[]',$roles,$userrole ,['class' => 'form-control form-control-solid border border-2 form-select']) !!} --}}
                    {!! Form::select('roles[]', $roles, $single_user->roles->pluck('id')->toArray(), [
                        'class' => 'form-control form-control-solid border border-2 form-select',
                        'multiple',
                    ]) !!}
                </div>
                <!-- Email Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('email', 'Email Address') !!}
                    {!! Form::email('email', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div>
                <!-- First Name Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('first_name', 'First Name') !!}
                    {!! Form::text('first_name', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div>
                <!-- Middle Name Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('middle_name', 'Middle Name') !!}
                    {!! Form::text('middle_name', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div>
                <!-- Last Name Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('last_name', 'Last Name') !!}
                    {!! Form::text('last_name', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div>
            </div>
        </div>
    </div>
</div>


<div data-kt-stepper-element="content">
    @csrf
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">Setup Password
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                    title="Provide accurate personal details"></i>
            </h2>
            <div class="text-muted fw-semibold fs-6">For security reasons, your information is safe.
                <a href="#" class="link-primary fw-bold">Privacy Policy</a>.
            </div>
        </div>
        <div class="fv-row">
            <div class="row">
                <!-- Password Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('password', 'Password') !!}
                    <div class="input-group">
                        {!! Form::password('password', ['class' => 'form-control form-control-solid border border-2']) !!}
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent border-left-0">
                                <i class="fa fa-eye" id="togglePassword"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Confirmation Password Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                    <div class="input-group">
                        {!! Form::password('password_confirmation', ['class' => 'form-control form-control-solid border border-2']) !!}
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent border-left-0">
                                <i class="fa fa-eye" id="togglePassword"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Checkbox Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row my-3">
                    <div class="form-check">
                        {!! Form::hidden('checkbox', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('checkbox', '1', 1, ['id' => 'newCheckbox', 'class' => 'form-check-input']) !!}
                        {!! Form::label('checkbox', 'Check this box if you want to register this user as a staff', [
                            'class' => 'form-check-label',
                        ]) !!}
                    </div>
                </div>

                <!-- Staff Form Fields -->
                <div class="flex-sm-12" id="staffDiv" style="display: none; width: 100%;">
                    <div class="row">
                        <!-- Department Field -->
                        <div class="d-flex flex-column col-md-6 mb-8 fv-row">
                            {!! Form::label('department_id', 'Department') !!}
                            {!! Form::select('department_id', $department, null, [
                                'class' => 'form-control form-control-solid border border-2',
                                'id' => 'departmentSelect',
                                'required' => 'required'
                            ]) !!}

                        </div>

                        <div class="d-flex flex-column col-md-6 mb-8 fv-row">
                            {!! Form::label('unit_id', 'SELECT UNIT') !!}
                            {!! Form::select('unit_id', [], null, [
                                'class' => 'form-control form-control-solid border border-2',
                                'id' => 'unitSelect',
                            ]) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('ranking_id', 'Ranks') !!}
                            {!! Form::select('ranking_id', $ranks, null, [
                                'class' => 'form-control form-control-solid border border-2 form-select',
                                'id' => 'ranking_id', // Add an ID for easier targeting in JavaScript
                                'required' => 'required'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('level_id', 'Levels') !!}
                            {!! Form::select('level_id', $levels, null, [
                                'class' => 'form-control form-control-solid border border-2 form-select',
                                'required' => 'required',
                            ]) !!}
                        </div>

                    </div>

                    <!-- Branch Field -->
                    <div class="form-group">
                        {!! Form::label('branch_id', 'Location') !!}
                        {!! Form::select('branch_id', $branch, null, ['class' => 'form-control form-control-solid border border-2']) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div data-kt-stepper-element="content">
    @csrf
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">Step 3
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                    title="Provide accurate personal details"></i>
            </h2>
            <div class="text-muted fw-semibold fs-6">
                <a href="#" class="link-primary fw-bold"></a>.
            </div>
        </div>
        <div class="fv-row">
            <div class="row">
                <!-- Gender Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('gender', 'Gender') !!}
                    <div class="">
                        {!! Form::radio('gender', 'Male', false) !!}&nbsp;Male&nbsp;&nbsp;
                        {!! Form::radio('gender', 'Female', true) !!}&nbsp;Female
                    </div>
                </div>
                <!-- StaffID Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('staff_id', 'Staff ID') !!}
                    {!! Form::text('staff_id', auth()->user()->staff->staff_id, [
                        'class' => 'form-control form-control-solid border border-2',
                    ]) !!}
                </div>
                <!-- About Me Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('about_me', 'About Me') !!}
                    {!! Form::textarea('about_me', auth()->user()->staff->about_me, [
                        'class' => 'form-control form-control-solid border border-2',
                    ]) !!}
                </div>
                {{-- do for only admins --}}
                {{-- <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('statusz', 'Status Of User') !!}
                    <div class="">
                        {!! Form::radio('statusz', 0, false) !!}&nbsp;Disapprove
                        {!! Form::radio('statusz', 1, true) !!}&nbsp;Approve&nbsp;&nbsp;
                    </div>
                </div> --}}
                <!-- Add more education details fields as needed -->
            </div>
        </div>
    </div>
</div>



<div data-kt-stepper-element="content">
    @csrf
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">Step 4
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                    title="Provide accurate personal details"></i>
            </h2>
            <div class="text-muted fw-semibold fs-6">your phonenumber is safe with us
                <a href="#" class="link-primary fw-bold">Privacy Policy</a>.
            </div>
        </div>
        <div class="fv-row">
            <div class="row">
                <!-- Region Field  -->
                {{-- <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('region', 'BRANCH') !!}
                    {!! Form::text('region', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div> --}}
                <!-- Phone Number Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('phone', 'Phone Number') !!}
                    {!! Form::number('phone', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div>
                <!-- Profile Picture Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('profile_picture', 'Profile Picture') !!}
                    {!! Form::file('profile_picture', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div>

                <!-- Status Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('status', 'Status') !!}
                    <div class="">
                        {!! Form::radio('statusz', 1, true) !!}&nbsp;Active&nbsp;
                        {!! Form::radio('statusz', 0, false) !!}&nbsp;In-Active
                    </div>
                </div>
                <!-- Add more skills and expertise fields as needed -->
            </div>
        </div>
    </div>
</div>



<div data-kt-stepper-element="content">
    @csrf
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">Step 5
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                    title="Provide accurate personal details"></i>
            </h2>
            <div class="text-muted fw-semibold fs-6">Kindly supply an alternative mail.
                {{-- <a href="#" class="link-primary fw-bold">Privacy Policy</a>. --}}
            </div>
        </div>
        <div class="fv-row">
            <div class="row">
                <!-- Alternate Email Address Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('alternative_email', 'Alternate Email Address') !!}
                    {!! Form::email('alternative_email', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div>
                <!-- Date Approved Field -->
                {{-- <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('date_approved', 'Date Approved') !!}
                    {!! Form::date('date_approved', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div> --}}
                <!-- Office Position Field -->
                {{-- <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('office_position', 'Office Position') !!}
                    {!! Form::text('office_position', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div> --}}
                <!-- Position Field -->
                {{-- <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('position', 'Position') !!}
                    {!! Form::text('position', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div> --}}
                <!-- Add more reference fields as needed -->
            </div>
        </div>
    </div>
</div>




<!--end::Actions-->
<div class="card-footer">
    {!! Form::submit('UPDATE', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default"> Cancel </a>
</div>








@push('page_scripts')

<script>
    // Get the checkbox element
    const checkbox = document.getElementById('newCheckbox');

    // Get the div element
    const div = document.getElementById('staffDiv');

    div.style.display = 'block';

    // Add a click event listener to the checkbox
    checkbox.addEventListener('click', function() {
        // Check if the checkbox is checked
        if (this.checked) {
            // Show the div
            div.style.display = 'block';
        } else {
            // Hide the div
            div.style.display = 'none';
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#state').on('change', function() {
            var idState = this.value;
            $("#local-dd").html('');
            $.ajax({
                url: "{{ url('api/fetch-locals') }}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#local-dd').html('<option value="">Select Local</option>');
                    $.each(result.local_govts, function(key, value) {
                        $("#local-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>


<script>
    $('#departmentSelect').on('change', function() {
    const selectedDepartmentId = $(this).val();
    var homeUrl = window.location.origin;
    if (selectedDepartmentId) {
        // Show loading animation before sending the AJAX request
        $('.loader-demo-box1').show();

        $.get(`${homeUrl}/dept/${selectedDepartmentId}`, function(units) {
            $('#unitSelect').empty().append('<option value="">Select Unit </option>');

            var u = JSON.stringify(units);

            $.each(units, function(index, unit) {
                $('#unitSelect').append(`<option value="${unit.id}">${unit.unit_name}</option>`);
            });
        });

        // Make an AJAX request to fetch ranks based on the selected department
        $.ajax({
            url: '/get-ranks', // Replace with the actual endpoint to fetch ranks
            type: 'GET',
            data: {
                department_id: selectedDepartmentId // Use selectedDepartmentId instead of undefined variable departmentId
            },
            success: function (response) {
                // Hide loading animation after successful response
                $('.loader-demo-box1').hide();

                // Populate the ranks dropdown with the fetched ranks
                var ranks = response.data.ranks;
                if (ranks.length > 0) {
                    var options = '';
                    $.each(ranks, function (index, rank) {
                        options += '<option value="' + rank.id + '">' + rank.name + '</option>';
                    });
                    $('#ranking_id').html(options);
                } else {
                    // Display message indicating no results found
                    $('#ranking_id').html('<option value="">No results found</option>');
                }
            },
            error: function (response) {
                // Hide loading animation in case of error
                $('.loader-demo-box1').hide();
                console.error('Error fetching ranks:', response);
            }
        });
    } else {
        $('#unitSelect').empty().append('<option value="">Select Unit </option>');
    }
});

</script>
@endpush