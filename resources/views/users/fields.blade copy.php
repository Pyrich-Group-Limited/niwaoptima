{{-- RANK --}}
<div class="form-group col-sm-4">
    {!! Form::label('rank', 'Rank') !!}
    {!! Form::select('rank',$rank , null, ['class' => 'form-control form-select']) !!}
</div>

<!-- Role Field -->
<div class="col-sm-4">
    
    {!! Form::label('roles', 'Roles') !!}
    <div class="form-group">
    {{-- {!! Form::select('roles[]',$roles,null, ['multiple' => true,'class' => 'form-control']) !!} --}}
    {!! Form::select('roles[]',$roles,null, ['class' => 'form-control form-select']) !!}

    </div>
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>


<!-- First Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('first_name', 'First Name') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Middle Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('middle_name', 'Middle Name') !!}
    {!! Form::text('middle_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-4">
     
    {!! Form::label('last_name', 'Last Name') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>




<!-- Password Field -->
<div class="form-group col-sm-6">
    
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-sm-6">
      {!! Form::label('password_confirmation', 'Password Confirmation') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<!-- Checkbox Field -->
<div class="form-group col-sm-12 my-3">
    <div class="form-check">
        {!! Form::hidden('checkbox', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('checkbox', '1', null, ['id' => 'newCheckbox', 'class' => 'form-check-input']) !!}
        {!! Form::label('checkbox', 'Check this box if you want to register this user as a staff', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Staff Form Fields -->
<div class="col-sm-12" id="staffDiv" style="display: none; width: 100%;">
<div  style="display: flex;">

<!-- Department Field -->
<div class="col-sm-4">
    {!! Form::label('department_id', 'Department') !!}
    <div class="form-group">
    {!! Form::select('department_id',$department,null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Branch Field -->
<div class="col-sm-4">
    {!! Form::label('branch_id', 'Branch') !!}
    <div class="form-group">
    {!! Form::select('branch_id',$branch,null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Dash Field -->
{{-- <div class="form-group col-sm-4">
    {!! Form::label('dash_type', 'Dash Type') !!}
    {!! Form::number('dash_type', null, ['class' => 'form-control']) !!}
</div> --}}
</div>

<div  style="display: flex;">
<!-- Gender Field -->
<div class="form-group col-sm-4">
    {!! Form::label('gender', 'Gender') !!}
    <div class="">
    {!! Form::radio('gender', 'Male', false) !!}&nbsp;Male&nbsp;&nbsp;
    {!! Form::radio('gender', 'Female', true) !!}&nbsp;Female
    </div>

</div>

<!-- StaffID Field -->
<div class="form-group col-sm-4">
    {!! Form::label('staff_id', 'Staff ID') !!}
    {!! Form::text('staff_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Region Field -->
<div class="form-group col-sm-4">
    {!! Form::label('region', 'Region') !!}
    {!! Form::text('region', null, ['class' => 'form-control']) !!}
</div>

</div>

<div  style="display: flex;">

    <!-- Phone Number Field -->
    <div class="col-sm-4">
        {!! Form::label('phone', 'Phone Number') !!}
        <div class="form-group">
        {!! Form::number('phone',null, ['class' => 'form-control']) !!}
        </div>
    </div>
    
    <!-- Profile Picture Field -->
    <div class="col-sm-4">
        {!! Form::label('profile_picture', 'Profile Picture') !!}
        <div class="form-group">
        {!! Form::file('profile_picture',null, ['class' => 'form-control']) !!}
        </div>
    </div>
    
    <!-- Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('status', 'Status') !!}
    <div class="">
    {!! Form::radio('status', 1, false) !!}&nbsp;Active&nbsp;&nbsp;
    {!! Form::radio('status', 0, true) !!}&nbsp;In-Active
    </div>

</div>
</div>

<div  style="display: flex;">
    <!-- Alternate Email Address Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('alternative_email', 'Alternate Email Address') !!}
        {!! Form::email('alternative_email', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Created By Field -->
    {{-- <div class="form-group col-sm-4">
        {!! Form::label('created_by', 'Created By') !!}
        {!! Form::text('created_by', null, ['class' => 'form-control']) !!}
    </div>
     --}}
    <!-- Date Approved Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('date_approved', 'Date Approved') !!}
        {!! Form::date('date_approved', null, ['class' => 'form-control']) !!}
    </div>
    
</div>
{{-- <div  style="display: flex;">
    <!-- Approved By Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('approved_by', 'Approved By') !!}
        {!! Form::text('approved_by', null, ['class' => 'form-control']) !!}
    </div> --}}
    
    <!-- Security Key Field -->
    {{-- <div class="form-group col-sm-4">
        {!! Form::label('security_key', 'Security Key') !!}
        {!! Form::text('security_key', null, ['class' => 'form-control']) !!}
    </div>
     --}}
    <!-- Date Modified Field -->
    {{-- <div class="form-group col-sm-4">
        {!! Form::label('date_modified', 'Date Modified') !!}
        {!! Form::date('date_modified', null, ['class' => 'form-control']) !!}
    </div> --}}
    
</div>
<div  style="display: flex;">
    <!-- Modified By Field -->
    {{-- <div class="form-group col-sm-4">
        {!! Form::label('modified_by', 'Modified By') !!}
        {!! Form::text('modified_by', null, ['class' => 'form-control']) !!}
    </div> --}}
    
    <!-- Office Position Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('office_position', 'Office Position') !!}
        {!! Form::text('office_position', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Position Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('position', 'Position') !!}
        {!! Form::text('position', null, ['class' => 'form-control']) !!}
    </div>
    
</div>

<div  style="display: flex;">
    <!-- About Me Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('about_me', 'About Me') !!}
        {!! Form::textarea('about_me', null, ['class' => 'form-control']) !!}
    </div>

    {{-- do for only admins --}}
    {{-- <div class="form-group  form-check col-sm-4">
        {!! Form::label('status', 'STATUS OF USER ') !!}
        <br>
        <input type="radio" name="status" value="1"  class=" form-radio-input">
        <label for="status1">APPROVE</label>
        <input type="radio" name="status" value="0" class="form-radio-input">
        <label for="status2">DISAPPROVE</label>
    </div> --}}
    
    <div class="form-group col-sm-4">
        {!! Form::label('statusz', 'Status Of User') !!}
        <div class="">
        {!! Form::radio('statusz', 0, false) !!}&nbsp;Disapprove
        {!! Form::radio('statusz', 1, true) !!}&nbsp;Approve&nbsp;&nbsp;
        </div>
    
    </div>
    </div>

   {{--  <!-- Total Received Email Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total_received_email', 'Total Received Email') !!}
        {!! Form::number('total_received_email', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Total Sent Email Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total_sent_email', 'Total Sent Email') !!}
        {!! Form::number('total_sent_email', null, ['class' => 'form-control']) !!}
    </div> --}}
    
</div>

{{-- <div  style="display: flex;">
    
    <!-- Total Draft Email Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total_draft_email', 'Total Draft Email') !!}
        {!! Form::number('total_draft_email', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Total Event Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total_event', 'Total Event') !!}
        {!! Form::number('total_event', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- My Groups Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('my_groups', 'My Groups') !!}
        {!! Form::textarea('my_groups', null, ['class' => 'form-control']) !!}
    </div>

</div> --}}

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
