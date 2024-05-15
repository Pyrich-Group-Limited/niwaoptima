<!--begin::Col for User Id Field -->
<div class="col-md-6 fv-row">
    <label class="required fs-6 fw-semibold mb-2">@lang('Staff') ( <small
            class="help-block text-success">@lang('Select a staff')</small>) </label>
    <select name="user_id" class="form-select form-select-solid" data-hide-search="true"
        data-placeholder="Select a Team Member">
        @foreach ($employers as $item)
            <option value="{{ $item->id }}">{{ $item->name . ' ' . $item->last_name . ' - ' . $item->email }}</option>
        @endforeach
    </select>
</div>
<!--end::Col for User Id Field -->
<!-- Ecs Number Field -->

<!--begin::ECS Number-->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('ecs_number', 'ECS Number:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('ecs_number', null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter ECS Number',
    ]) !!}
</div>
<!--end::ECS Number-->

<!-- Company Name Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('company_name', 'Company Name:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('company_name', null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter Company Name',
    ]) !!}
</div>

<!-- Company Email Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('company_email', 'Company Email:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::email('company_email', null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter Company Email',
    ]) !!}
</div>

<!-- Company Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('company_address', 'Company Address:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::textarea('company_address', null, [
        'class' => 'form-control form-control-solid border',
        'rows' => '3',
        'placeholder' => 'Enter Company Address',
    ]) !!}
</div>

<!-- Company Rcnumber Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('company_rcnumber', 'Company Rcnumber:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('company_rcnumber', null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter Company Rc number',
    ]) !!}
</div>

<!-- Company Contact person Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('contact_person', 'Company Contact Person:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('contact_person', null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter Company Contact Person',
    ]) !!}
</div>

<!-- Company Contact Number Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('contact_number', 'Company Contact Person Number: ', [
        'class' => 'required fs-6 fw-semibold mb-2',
    ]) !!}
    {!! Form::text('contact_number', null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter Company Contact Person Number',
    ]) !!}
</div>

<!-- Company CAC Reg year Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('cac_reg_year', 'Company CAC Reg Year: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::number('cac_reg_year', null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter Company CAC Registration Year',
    ]) !!}
</div>

<!-- Company Number of Employees Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('number_of_employees', 'Company Number of Employees ', [
        'class' => 'required fs-6 fw-semibold mb-2',
    ]) !!}
    {!! Form::number('number_of_employees', null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter Company Number of Employees',
    ]) !!}
</div>

<!-- Company Registered date Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('registered_date', 'Company Registered Date ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('registered_date', null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter Company Registered Date',
    ]) !!}
</div>

<!-- Company State Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('company_state', 'Company State: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    <select id="state" name="company_state" class="form-control" required="">
        <option>Select State</option>
        @foreach ($state as $item)
            <option value="{{ $item->id }}" {{ $employer->company_state == $item->id ? 'selected' : '' }}>
                {{ $item->name }}</option>
        @endforeach
    </select>
</div>

<!-- Company Localgovt Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('company_localgovt', 'Company Localgovt: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    <select id="local-dd" class="form-control">
    </select>
    {{-- <select id="local" name="company_localgovt" class="form-control" required="">
        <option>Select Local Government</option>
        @foreach ($local_govt as $item)
            <option value="{{ $item->id }}" {{ $employer->company_localgovt == $item->id ? 'selected' : '' }}>
                {{ $item->name }}</option>
        @endforeach
    </select> --}}
</div>



<!-- Business Area Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('business_area', 'Business Area: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('business_area', null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter Business Area',
    ]) !!}
</div>

<!-- Inspection Status Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('inspection_status', 'Inspection Status: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('inspection_status', null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter Inspection Status',
    ]) !!}
</div>

<!--  Status Field -->
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('status', 'Status: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::select('status', enum_employer_status(), null, [
        'class' => 'form-control form-control-solid border',
        'placeholder' => 'Enter Status',
    ]) !!}
</div>
<div class="d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('branch_id', 'Branch') !!}
    {!! Form::select('branch_id',$branches,null, ['class' => 'form-control form-control-solid border border-2']) !!}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#state').on('change', function () {
            var idState = this.value;
            $("#local-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-locals')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#local-dd').html('<option value="">Select Local</option>');
                    $.each(result.local_govts, function (key, value) {
                        $("#local-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
