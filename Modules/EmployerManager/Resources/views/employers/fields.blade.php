<!--begin::Step 1-->
<div class="current" data-kt-stepper-element="content">
    @csrf
    <!--begin::Heading-->
    <div class="pb-10 pb-lg-15 pt-10">
        <h4 class="fw-bold d-flex align-items-center text-dark">
            Employer and Company Details
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                title="Fill all fields before proceeding to the next please"></i>
        </h4>
    </div>
    <!--end::Heading-->

    <!--begin::Input group-->
    <div class="row">
        <!-- User Id Field -->
        <input type="hidden" name="user_id" value="1" />
        <input type="hidden" name="inspection_status" value="1" />
        {{-- <div class="col-md-6 mb-8">
            <label class="required fs-6 fw-semibold mb-2">@lang('Staff') ( <small
                    class="help-block text-success">@lang('Select a staff')</small>) </label>
            <select name="user_id" class="form-select form-select-solid select-box" data-hide-search="true"
                data-placeholder="Select a Team Member">
                @foreach ($employers as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->name . ' ' . $item->last_name . ' - ' . $item->email }}</option>
                @endforeach
            </select>
        </div> --}}

        <!-- Company Name Field -->
        <div class="col-md-6 mb-8">
            {!! Form::label('company_name', 'Company Name:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::text('company_name', null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Enter Company Name',
            ]) !!}
        </div>

        <!-- Company Email Field -->
        <div class="col-md-6 mb-8">
            {!! Form::label('company_email', 'Company Email:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::email('company_email', null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Enter Company Email',
            ]) !!}
        </div>

        <!-- Certificate Of Incorporation Field -->
        <div class="col-md-6 mb-8">
            {!! Form::label('certificate_of_incorporation', 'Certificate Of Incorporation:') !!}
            {!! Form::file('certificate_of_incorporation', ['class' => 'form-control', 'accept' => 'application/pdf']) !!}
        </div>
    </div>
    <!--end::Input group-->
</div>
<!--end::Step 1-->

<!--begin::Step 2-->
<div data-kt-stepper-element="content">
    <!--begin::Heading-->
    <div class="pb-10 pb-lg-15">
        <h4 class="fw-bold text-dark">Company Information</h4>
    </div>
    <!--end::Heading-->

    <div class="row">
        <!-- Company Address Field -->
        <div class="col-md-12 mb-8">
            {!! Form::label('company_address', 'Company Address:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::textarea('company_address', null, [
                'class' => 'form-control form-control-solid',
                'rows' => '3',
                'placeholder' => 'Enter Company Address',
            ]) !!}
        </div>

        <!-- Company Rcnumber Field -->
        <div class="col-md-12 mb-8">
            {!! Form::label('company_rcnumber', 'Company Rcnumber:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::text('company_rcnumber', null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Enter Company Rc number',
            ]) !!}
        </div>

        <!-- Company Contact Person First Name Field -->
        <div class="col-md-6 mb-8">
            {!! Form::label('contact_firstname', 'Company Contact Person First name:', [
                'class' => 'required fs-6 fw-semibold mb-2',
            ]) !!}
            {!! Form::text('contact_firstname', null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Enter Company Contact Person First name',
            ]) !!}
        </div>

        <!-- Company Contact Person Surname Field -->
        <div class="col-md-6 mb-8">
            {!! Form::label('contact_surname', 'Company Contact Person Surname:', [
                'class' => 'required fs-6 fw-semibold mb-2',
            ]) !!}
            {!! Form::text('contact_surname', null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Enter Company Contact Person Surname',
            ]) !!}
        </div>
    </div>
</div>
<!--end::Step 2-->

<!--begin::Step 3-->
<div data-kt-stepper-element="content">
    <!--begin::Heading-->
    <div class="pb-10 pb-lg-12">
        <h4 class="fw-bold text-dark">Account Details</h4>
    </div>
    <!--end::Heading-->

    <div class="row">
        <!-- Company Contact Number Field -->
        <div class="col-md-12 mb-8">
            {!! Form::label('contact_number', 'Company Contact Person Number: ', [
                'class' => 'required fs-6 fw-semibold mb-2',
            ]) !!}
            {!! Form::text('contact_number', null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Enter Company Contact Person Number',
            ]) !!}
        </div>

        <!-- Company CAC Reg Year Field -->
        <div class="col-md-12 mb-8">
            {!! Form::label('cac_reg_year', 'Company CAC Reg Year: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::number('cac_reg_year', null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Enter Company CAC Registration Year',
            ]) !!}
        </div>

        <!-- Company Number of Employees Field -->
        <div class="col-md-12 mb-8">
            {!! Form::label('number_of_employees', 'Company Number of Employees ', [
                'class' => 'required fs-6 fw-semibold mb-2',
            ]) !!}
            {!! Form::number('number_of_employees', null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Enter Company Number of Employees',
            ]) !!}
        </div>
    </div>
</div>
<!--end::Step 3-->

<!--begin::Step 4-->
<div data-kt-stepper-element="content">
    <!--begin::Heading-->
    <div class="pb-10 pb-lg-15">
        <h4 class="fw-bold text-dark">Business Details</h4>
    </div>
    <!--end::Heading-->

    <div class="row">
        <!-- Company Registered Date Field -->
        <div class="col-md-12 mb-8">
            {!! Form::label('registered_date', 'Company Registered Date ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::text('registered_date', null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Enter Company Registered Date',
            ]) !!}
        </div>

        <!-- Company State Field -->
        <div class="col-md-6 mb-8">
            {!! Form::label('company_state', 'Company State: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            <select id="state" name="company_state" class="form-control">
                <option>Select State</option>
                @foreach ($state as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Company Local Government Field -->
        <div class="col-md-6 mb-8">
            {!! Form::label('company_localgovt', 'Company Local Government: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            <select id="local-dd" name="company_localgovt" class="form-control">
                <option>Select Local Government</option>
                <!-- Options should be populated dynamically if needed -->
            </select>
        </div>
    </div>
</div>
<!--end::Step 4-->

<!--begin::Step 5-->
<div class="pb-20">
    <!--begin::Heading-->
    <div class="pb-8 pb-lg-10">
        <h4 class="fw-bold text-dark">Business Status Details</h4>
    </div>
    <!--end::Heading-->

    <div class="row pb-8">
        <!-- Business Area Field -->
        <div class="col-md-12 mb-8">
            {!! Form::label('business_area', 'Business Area: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::text('business_area', null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Enter Business Area',
            ]) !!}
        </div>

        <!-- Inspection Status Field -->
        {{-- <div class="col-md-12 mb-8">
            {!! Form::label('inspection_status', 'Inspection Status: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::text('inspection_status', null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Enter Inspection Status',
            ]) !!}
        </div> --}}

        <!-- Status Field -->
        <div class="col-md-6">
            {!! Form::label('status', 'Status: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::select('status', enum_employer_status(), null, [
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Select Status',
            ]) !!}
        </div>
        <div class="col-md-6 mb-8">
            <label class="form-label" for="user_type">Select User Type<span
                    class="text-danger">*</span></label>
            <div class="form-control-wrap">
                <select class="form-control" id="user_type" name="user_type" >
                    <option value="private">Private </option>
                    <option value="company">Registered Company</option>
                    <option value="e-promota">e-Promota</option>
                </select>
            </div>
        </div>
        
        <div class="col-md-12 mb-8">
            {!! Form::submit('Save', ['class' => 'btn btn-primary',]) !!} 
        </div>
    </div>
</div>
<!--end::Step 5-->






{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
@push('page_scripts')
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
@endpush