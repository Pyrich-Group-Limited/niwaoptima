<!--begin::Step 1-->
<div class="current" data-kt-stepper-element="content">
    @csrf
    <!--begin::Wrapper-->
    <div class="w-100">
        <!--begin::Heading-->
        <div class="pb-10 pb-lg-15">
            <!--begin::Title-->
            <h2 class="fw-bold d-flex align-items-center text-dark">Employer and Company Details
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                    title="Fill all field before proceeding to the next please"></i>
            </h2>
            <!--end::Title-->
            <!--begin::Notice-->
            <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                <a href="#" class="link-primary fw-bold">Help Page</a>.
            </div>
            <!--end::Notice-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="fv-row">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col for User Id Field -->
                <div class="col-md-6 fv-row">
                    <label class="required fs-6 fw-semibold mb-2">@lang('Staff') ( <small
                            class="help-block text-success">@lang('Select a staff')</small>) </label>
                    <select name="user_id" class="form-select form-select-solid select-box" data-hide-search="true"
                        data-placeholder="Select a Team Member">
                        @foreach ($employers as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name . ' ' . $item->last_name . ' - ' . $item->email }}</option>
                        @endforeach
                    </select>
                </div>
                <!--end::Col for User Id Field -->
                <!-- Ecs Number Field -->

                <!--begin::ECS Number-->
                {{-- <div class="d-flex flex-column col-md-6 mb-8 fv-row">
                    {!! Form::label('ecs_number', 'ECS Number:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
                    {!! Form::text('ecs_number', null, [
                        'class' => 'form-control form-control-solid border',
                        'placeholder' => 'Enter ECS Number',
                    ]) !!}
                </div> --}}
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

                <div class="d-flex flex-column col-md-6 mb-8 fv-row">
                    {!! Form::label('certificate_of_incorporation ', 'Certificate Of Incorporation:') !!}
                    {!! Form::file('certificate_of_incorporation',null, ['class' =>'form-control','accept' => 'application/pdf','readonly' => true]) !!}
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Step 1-->

<!--begin::Step 2-->
<div data-kt-stepper-element="content">
    <!--begin::Wrapper-->
    <div class="w-100">
        <!--begin::Heading-->
        <div class="pb-10 pb-lg-15">
            <!--begin::Title-->
            <h2 class="fw-bold text-dark">Company Information</h2>
            <!--end::Title-->
            <!--begin::Notice-->
            <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                <a href="#" class="link-primary fw-bold">Help Page</a>.
            </div>
            <!--end::Notice-->
        </div>
        <!--end::Heading-->
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
        <div class="d-flex flex-column col-md-12 mb-8 fv-row">
            {!! Form::label('company_rcnumber', 'Company Rcnumber:', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::text('company_rcnumber', null, [
                'class' => 'form-control form-control-solid border',
                'placeholder' => 'Enter Company Rc number',
            ]) !!}
        </div>

        <div class="row">
            <!-- Company Contact person Field -->
            <div class=" col-md-6 mb-8">
                {!! Form::label('contact_firstname', 'Company Contact Person First name:', [
                    'class' => 'required fs-6 fw-semibold mb-2',
                ]) !!}
                {!! Form::text('contact_firstname', null, [
                    'class' => 'form-control form-control-solid border',
                    'placeholder' => 'Enter Company Contact Person First name',
                ]) !!}
            </div>
            <!-- Company Contact person Field -->
            <div class="col-md-6 mb-8">
                {!! Form::label('contact_surname', 'Company Contact Person Surname:', [
                    'class' => 'required fs-6 fw-semibold mb-2',
                ]) !!}
                {!! Form::text('contact_surname', null, [
                    'class' => 'form-control form-control-solid border',
                    'placeholder' => 'Enter Company Contact Person Surname',
                ]) !!}
            </div>
        </div>
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Step 2-->

<!--begin::Step 3-->
<div data-kt-stepper-element="content">
    <!--begin::Wrapper-->
    <div class="w-100">
        <!--begin::Heading-->
        <div class="pb-10 pb-lg-12">
            <!--begin::Title-->
            <h2 class="fw-bold text-dark">Account Details</h2>
            <!--end::Title-->
            <!--begin::Notice-->
            <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                <a href="#" class="link-primary fw-bold">Help Page</a>.
            </div>
            <!--end::Notice-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <!-- Company Contact Number Field -->
        <div class="d-flex flex-column col-md-12 mb-8 fv-row">
            {!! Form::label('contact_number', 'Company Contact Person Number: ', [
                'class' => 'required fs-6 fw-semibold mb-2',
            ]) !!}
            {!! Form::text('contact_number', null, [
                'class' => 'form-control form-control-solid border',
                'placeholder' => 'Enter Company Contact Person Number',
            ]) !!}
        </div>

        <!-- Company CAC Reg year Field -->
        <div class="d-flex flex-column col-md-12 mb-8 fv-row">
            {!! Form::label('cac_reg_year', 'Company CAC Reg Year: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::number('cac_reg_year', null, [
                'class' => 'form-control form-control-solid border',
                'placeholder' => 'Enter Company CAC Registration Year',
            ]) !!}
        </div>

        <!-- Company Number of Employees Field -->
        <div class="d-flex flex-column col-md-12 mb-8 fv-row">
            {!! Form::label('number_of_employees', 'Company Number of Employees ', [
                'class' => 'required fs-6 fw-semibold mb-2',
            ]) !!}
            {!! Form::number('number_of_employees', null, [
                'class' => 'form-control form-control-solid border',
                'placeholder' => 'Enter Company Number of Employees',
            ]) !!}
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Step 3-->

<!--begin::Step 4-->
<div data-kt-stepper-element="content">
    <!--begin::Wrapper-->
    <div class="w-100">
        <!--begin::Heading-->
        <div class="pb-10 pb-lg-15">
            <!--begin::Title-->
            <h2 class="fw-bold text-dark">Business Details</h2>
            <!--end::Title-->
            <!--begin::Notice-->
            <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                <a href="#" class="text-primary fw-bold">Help Page</a>.
            </div>
            <!--end::Notice-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <!-- Company Registered date Field -->
        <div class="d-flex flex-column col-md-12 mb-8 fv-row">
            {!! Form::label('registered_date', 'Company Registered Date ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::text('registered_date', null, [
                'class' => 'form-control form-control-solid border',
                'placeholder' => 'Enter Company Registered Date',
            ]) !!}
        </div>

        <!-- Company State Field -->
        <div class="d-flex flex-column col-md-12 mb-8 fv-row">
            {!! Form::label('company_state', 'Company State: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            <select id="state" name="company_state" class="form-control">
                <option>Select State</option>
                @foreach ($state as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <!--end::Input group-->

        {{-- <!-- Company State Field -->
        <div class="d-flex flex-column col-md-6 mb-8 fv-row">
            {!! Form::label('company_state', 'Company State: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            <select id="state" name="company_state" class="form-control" required="">
                <option>Select State</option>
                @foreach ($state as $item)
                    <option value="{{ $item->id }}" {{ $employer->company_state == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </div> --}}

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


    </div>
    <!--end::Wrapper-->
</div>
<!--end::Step 4-->

<!--begin::Step 5-->
<div data-kt-stepper-element="content">
    <!--begin::Wrapper -->
    <div class="w-100">
        <!--begin::Heading-->
        <div class="pb-8 pb-lg-10">
            <!--begin::Title-->
            <h2 class="fw-bold text-dark">Business Status Details</h2>
            <!--end::Title-->
        </div>
        <!--end::Heading-->

        <!-- Business Area Field -->
        <div class="d-flex flex-column col-md-12 mb-8 fv-row">
            {!! Form::label('business_area', 'Business Area: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::text('business_area', null, [
                'class' => 'form-control form-control-solid border',
                'placeholder' => 'Enter Business Area',
            ]) !!}
        </div>

        <!-- Inspection Status Field -->
        <div class="d-flex flex-column col-md-12 mb-8 fv-row">
            {!! Form::label('inspection_status', 'Inspection Status: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::text('inspection_status', null, [
                'class' => 'form-control form-control-solid border',
                'placeholder' => 'Enter Inspection Status',
            ]) !!}
        </div>

        <!--  Status Field -->
        <div class="d-flex flex-column col-md-12 mb-8 fv-row">
            {!! Form::label('status', 'Status: ', ['class' => 'required fs-6 fw-semibold mb-2']) !!}
            {!! Form::select('status', enum_employer_status(), null, [
                'class' => 'form-control form-control-solid border',
                'placeholder' => 'Enter Status',
            ]) !!}
        </div>
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Step 5-->

<!--begin::Step 6-->
<div data-kt-stepper-element="content">
    <!--begin::Wrapper-->
    <div class="w-100">
        <!--begin::Heading-->
        <div class="pb-8 pb-lg-10">
            <!--begin::Title-->
            <h2 class="fw-bold text-dark">Congratulations, you've reached the final step!</h2>
            <!--end::Title-->
            <!--begin::Notice-->

            <!--end::Notice-->
        </div>
        <!--end::Heading-->
        <!--begin::Body-->
        <div class="mb-0">
            <!--begin::Text-->
            <div class="fs-6 text-gray-600 mb-5">Thank you for completing the form! Your Employer has been successfully
                Created</div>
            <!--end::Text-->
            <!--begin::Alert-->
            <!--begin::Notice-->
            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                <!--begin::Icon-->
                <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                            fill="currentColor" />
                        <rect x="11" y="14" width="7" height="2" rx="1"
                            transform="rotate(-90 11 14)" fill="currentColor" />
                        <rect x="11" y="17" width="2" height="2" rx="1"
                            transform="rotate(-90 11 17)" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <!--end::Icon-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-grow-1">
                    <!--begin::Content-->
                    <div class="fw-semibold">
                        <h4 class="text-gray-900 fw-bold">🎉 Hooray! You've conquered the form wizard! 🎉</h4>
                        <div class="fs-6 text-gray-700">
                            <p>Thank you for completing our form in style.</p>
                            <p>If all information submitted is correct, kindly click the submit button below!</p>
                            <div class="float-end">
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Notice-->
            <!--end::Alert-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Step 6-->

<!--begin::Actions-->
<div class="d-flex flex-stack pt-10">
    <!--begin::Wrapper-->
    <div class="mr-2">
        <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
            <span class="svg-icon svg-icon-4 me-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="11" width="13" height="2"
                        rx="1" fill="currentColor" />
                    <path
                        d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->Back
        </button>
    </div>
    <!--end::Wrapper-->
    <!--begin::Wrapper-->
    <div>
        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
            <span class="svg-icon svg-icon-4 ms-1 me-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="18" y="13" width="13" height="2"
                        rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                    <path
                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Actions-->
<div class="card-footer">
    <!-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} -->
    <a href="{{ route('employers.index') }}" class="btn btn-default"> Cancel </a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
