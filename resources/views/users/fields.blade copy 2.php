 <!-- RANK  -->
<div class="d-flex flex-column col-md-12 mb-8 fv-row">
    {!! Form::label('rank', 'Rank') !!}
    {!! Form::select('rank',$rank , null, ['class' => 'form-control form-control-solid border border-2 form-select']) !!}
</div>

<!-- Role Field -->
<div class="d-flex flex-column col-md-12 mb-8 fv-row">
    {!! Form::label('roles', 'Roles') !!}
    {!! Form::select('roles[]',$roles,null, ['class' => 'form-control form-control-solid border border-2 form-select']) !!}
</div>

<!-- Email Field -->
<div class="d-flex flex-column col-md-12 mb-8 fv-row">
    {!! Form::label('email', 'Email') !!}
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




<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control form-control-solid border border-2']) !!}
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Password Confirmation') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control form-control-solid border border-2']) !!}
</div>

<!-- Checkbox Field -->
<div class="d-flex flex-column col-md-12 mb-8 fv-row my-3">
    <div class="form-check">
        {!! Form::hidden('checkbox', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('checkbox', '1', null, ['id' => 'newCheckbox', 'class' => 'form-check-input']) !!}
        {!! Form::label('checkbox', 'Check this box if you want to register this user as a staff', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Staff Form Fields -->
<div class="col-sm-12" id="staffDiv" style="display: none; width: 100%;">
    <div>
        <!-- Department Field -->
        <div class="d-flex flex-column col-md-12 mb-8 fv-row">
            {!! Form::label('department_id', 'Department') !!}
            {!! Form::select('department_id',$department,null, ['class' => 'form-control form-control-solid border border-2']) !!}
        </div>
    </div>

    <!-- Branch Field -->
    <div class="d-flex flex-column col-md-12 mb-8 fv-row">
        {!! Form::label('branch_id', 'Branch') !!}
        {!! Form::select('branch_id',$branch,null, ['class' => 'form-control form-control-solid border border-2']) !!}
    </div>
</div>

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
        {!! Form::text('staff_id', null, ['class' => 'form-control form-control-solid border border-2']) !!}
    </div>

    <!-- Region Field -->
    <div class="d-flex flex-column col-md-12 mb-8 fv-row">
        {!! Form::label('region', 'Region') !!}
        {!! Form::text('region', null, ['class' => 'form-control form-control-solid border border-2']) !!}
    </div>



    <!-- Phone Number Field -->
    <div class="d-flex flex-column col-md-12 mb-8 fv-row">
        {!! Form::label('phone', 'Phone Number') !!}
        {!! Form::number('phone',null, ['class' => 'form-control form-control-solid border border-2']) !!}
    </div>

<!-- Profile Picture Field -->
<div class="d-flex flex-column col-md-12 mb-8 fv-row">
    {!! Form::label('profile_picture', 'Profile Picture') !!}
    {!! Form::file('profile_picture',null, ['class' => 'form-control form-control-solid border border-2']) !!}
</div>

<!-- Status Field -->
<div class="d-flex flex-column col-md-12 mb-8 fv-row">
    {!! Form::label('status', 'Status') !!}
    <div class="">
        {!! Form::radio('status', 1, false) !!}&nbsp;Active&nbsp;&nbsp;
        {!! Form::radio('status', 0, true) !!}&nbsp;In-Active
    </div>

</div>

    <!-- Alternate Email Address Field -->
    <div class="d-flex flex-column col-md-12 mb-8 fv-row">
        {!! Form::label('alternative_email', 'Alternate Email Address') !!}
        {!! Form::email('alternative_email', null, ['class' => 'form-control form-control-solid border border-2']) !!}
    </div>

    <!-- Date Approved Field -->
    <div class="d-flex flex-column col-md-12 mb-8 fv-row">
        {!! Form::label('date_approved', 'Date Approved') !!}
        {!! Form::date('date_approved', null, ['class' => 'form-control form-control-solid border border-2']) !!}
    </div>
    <!-- Office Position Field -->
    <div class="d-flex flex-column col-md-12 mb-8 fv-row">
        {!! Form::label('office_position', 'Office Position') !!}
        {!! Form::text('office_position', null, ['class' => 'form-control form-control-solid border border-2']) !!}
    </div>

    <!-- Position Field -->
    <div class="d-flex flex-column col-md-12 mb-8 fv-row">
        {!! Form::label('position', 'Position') !!}
        {!! Form::text('position', null, ['class' => 'form-control form-control-solid border border-2']) !!}
    </div>
    <!-- About Me Field -->
    <div class="d-flex flex-column col-md-12 mb-8 fv-row">
        {!! Form::label('about_me', 'About Me') !!}
        {!! Form::textarea('about_me', null, ['class' => 'form-control form-control-solid border border-2']) !!}
    </div>

    {{-- do for only admins --}}
    <div class="d-flex flex-column col-md-12 mb-8 fv-row">
        {!! Form::label('statusz', 'Status Of User') !!}
        <div class="">
            {!! Form::radio('statusz', 0, false) !!}&nbsp;Disapprove
            {!! Form::radio('statusz', 1, true) !!}&nbsp;Approve&nbsp;&nbsp;
        </div>
    </div>

<script>
    // Get the checkbox element
    const checkbox = document.getElementById('newCheckbox');

    // Get the div element
    const div = document.getElementById('staffDiv');

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