{{-- <!-- Employer Id Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('employer_id', 'Employer Id:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('employer_id', null, ['class' => 'form-control form-control-solid border']) !!}
</div> --}}
<input type="hidden" name="employer_id" class="form-control" required value="{{ $employer }}">

<!-- Last Name Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('last_name', 'Last Name:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('last_name', null, ['class' => 'form-control form-control-solid border']) !!}
</div>

<!-- First Name Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('first_name', 'First Name:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('first_name', null, ['class' => 'form-control form-control-solid border']) !!}
</div>

<!-- Middle Name Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('middle_name', 'Middle Name:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('middle_name', null, ['class' => 'form-control form-control-solid border']) !!}
</div>

<!-- Date Of Birth Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('date_of_birth', 'Date Of Birth:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('date_of_birth', null, [
        'class' => 'form-control form-control-solid border',
        'id' => 'date_of_birth',
    ]) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_of_birth').datepicker()
    </script>
@endpush

<!-- Gender Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('gender', 'Gender:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::select('gender', enum_gender(), null, ['class' => 'form-control form-control-solid border', 'placeholder' => 'Enter Gender',]) !!}
</div>

<!-- Marital Status Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('marital_status', 'Marital Status:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::select('marital_status', enum_marital_status(), null, ['class' => 'form-control form-control-solid border', 'placeholder' => 'Enter Marital Status',]) !!}
</div>

<!-- Email Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('email', 'Email:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::email('email', null, ['class' => 'form-control form-control-solid border']) !!}
</div>

<!-- Employment Date Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('employment_date', 'Employment Date:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('employment_date', null, [
        'class' => 'form-control form-control-solid border',
        'id' => 'employment_date',
    ]) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#employment_date').datepicker()
    </script>
@endpush

<!-- Address Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row col-lg-6">
    {!! Form::label('address', 'Address:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::textarea('address', null, ['class' => 'form-control form-control-solid border', 'rows' => '3']) !!}
</div>



<!-- State Of Origin Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('state_of_origin', 'State Of Origin:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    <select id="state" name="state_of_origin" class="form-control">
        <option>Select State</option>
        @foreach ($state as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>

<!-- Local Govt Area Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('local_govt_area', 'Local Govt Area (You need to select a state):', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    <select id="local-dd" class="form-control">
    </select>
</div>

<!-- Phone Number Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('phone_number', 'Phone Number:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::number('phone_number', null, ['class' => 'form-control form-control-solid border']) !!}
</div>

<!-- Means Of Identification Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('means_of_identification', 'Means Of Identification:', [
        'class' => 'required fs-6 fw-semibold mb-2',
    ]) !!}
    {!! Form::text('means_of_identification', null, ['class' => 'form-control form-control-solid border']) !!}
</div>

<!-- Identity Number Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('identity_number', 'Identity Number:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::number('identity_number', null, ['class' => 'form-control form-control-solid border']) !!}
</div>

<!-- Identity Issue Date Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('identity_issue_date', 'Identity Issue Date:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('identity_issue_date', null, [
        'class' => 'form-control form-control-solid border',
        'id' => 'identity_issue_date',
    ]) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#identity_issue_date').datepicker()
    </script>
@endpush

<!-- Identity Expiry Date Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('identity_expiry_date', 'Identity Expiry Date:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('identity_expiry_date', null, [
        'class' => 'form-control form-control-solid border',
        'id' => 'identity_expiry_date',
    ]) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#identity_expiry_date').datepicker()
    </script>
@endpush

<!-- Next Of Kin Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('next_of_kin', 'Next Of Kin:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('next_of_kin', null, ['class' => 'form-control form-control-solid border']) !!}
</div>

<!-- Next Of Kin Phone Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('next_of_kin_phone', 'Next Of Kin Phone:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::number('next_of_kin_phone', null, ['class' => 'form-control form-control-solid border']) !!}
</div>

<!-- Monthly Renumeration Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('monthly_renumeration', 'Monthly Renumeration:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::text('monthly_renumeration', null, ['class' => 'form-control form-control-solid border']) !!}
</div>

<!-- Status Field -->
<div class="form-group d-flex flex-column col-md-6 mb-8 fv-row">
    {!! Form::label('status', 'Status:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
    {!! Form::select('status', enum_employee_status(), null, [
                'class' => 'form-control form-control-solid border',
                'placeholder' => 'Enter Status',
            ]) !!}
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
