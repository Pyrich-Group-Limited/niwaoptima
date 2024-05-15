<div class="current" data-kt-stepper-element="content">
    @csrf
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">
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
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('ranking_id', 'Rank') !!}
                    {!! Form::select('ranking_id', $rank, null, [
                        'class' => 'form-control form-control-solid border border-2 form-select',
                    ]) !!}
                </div>

                <!-- Role Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('roles', 'Roles') !!}
                    {!! Form::select('roles[]', $roles, null, [
                        'class' => 'form-control form-control-solid border border-2 form-select',
                    ]) !!}
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
                    {!! Form::label(
                        'password',
                        'Password (Password must be a minimum of 12 characters including atleast a number and symbol)',
                    ) !!}
                    <div class="input-group">
                        {!! Form::password('password', [
                            'id' => 'password',
                            'class' => 'form-control form-control-solid border border-2',
                            'autocomplete' => 'off',
                        ]) !!}
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent border-left-0">
                                <i class="fa fa-eye" id="togglePassword"></i>
                            </span>
                        </div>
                        <div id="password-strength" class="form-text" style="color:brown;font-weight: bolder"></div>
                    </div>
                </div>

                <!-- Confirmation Password Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                    <div class="input-group">
                        {!! Form::password('password_confirmation', [
                            'id' => 'passwordConfirmation',
                            'class' => 'form-control form-control-solid border border-2',
                            'autocomplete' => 'off',
                        ]) !!}
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent border-left-0">
                                <i class="fa fa-eye" id="togglePassword"></i>
                            </span>
                        </div>
                        <div id="password-match" class="form-text"></div>
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
                <div class="col-sm-12" id="staffDiv" style="display: none; width: 100%;">
                    <div>
                        <!-- Department Field -->
                        <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                            {!! Form::label('department_id', 'Department') !!}
                            {!! Form::select('department_id', $department, null, [
                                'class' => 'form-control form-control-solid border border-2',
                            ]) !!}
                        </div>
                    </div>



                    <!-- Branch Field -->
                    <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                        {!! Form::label('branch_id', 'Area Office') !!}
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
            <div class="text-muted fw-semibold fs-6">tell us more about your self
                {{-- <a href="#" class="link-primary fw-bold">atp</a>. --}}
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
                    {!! Form::text('staff_id', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                </div>
                <!-- About Me Field -->
                <div class="d-flex flex-column col-md-12 mb-8 fv-row">
                    {!! Form::label('about_me', 'About Me') !!}
                    {!! Form::textarea('about_me', null, ['class' => 'form-control form-control-solid border border-2']) !!}
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



<!--begin::Step 6-->
<div data-kt-stepper-element="content">
    <!--begin::Wrapper-->
    {{-- <div class="w-100"> --}}
    <!--begin::Heading-->
    {{-- <div class="pb-8 pb-lg-10">
            <!--begin::Title-->
            <h2 class="fw-bold text-dark">Congratulations, you've reached the final step!</h2>
            <!--end::Title-->
            <!--begin::Notice-->

            <!--end::Notice-->
        </div> --}}
    <!--end::Heading-->
    <!--begin::Body-->

    {{-- <div class="mb-0"> --}}
    <!--begin::Text-->
    {{-- <div class="fs-6 text-gray-600 mb-5">Thank you for completing the form! Your Employer has been successfully
                Created</div> --}}
    <!--end::Text-->
    <!--begin::Alert-->
    <!--begin::Notice-->
    {{-- <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6"> --}}
    <!--begin::Icon-->
    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
    {{-- <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                    {{-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                    </svg> --}}
    <!-- </span> --}}
                <!--end::Svg Icon-->
    <!--end::Icon-->
    <!--begin::Wrapper-->
    {{-- <div class="d-flex flex-stack flex-grow-1"> --}}
    <!--begin::Content-->
    {{-- <div class="fw-semibold"> --}}
    {{-- <h4 class="text-gray-900 fw-bold">🎉 Hooray! You've conquered the form wizard! 🎉</h4> --}}

    {{-- <div class="fs-6 text-gray-700">
                            {{-- <p>Thank you for completing our form in style.</p> --}}
    {{-- <p>If all information submitted is correct, kindly click the submit button below!</p> --}}
    {{-- <div class="float-end">
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                            </div> --}}
    <!-- </div> --}}
                    </div>
                    <!--end::Content-->
    {{-- </div> --}}
    <!--end::Wrapper-->
    {{-- </div> --}}
    <!--end::Notice-->
    <!--end::Alert-->
    {{-- </div> --}}
    <!--end::Body-->

    {{-- </div> --}}
    <!--end::Wrapper-->
    <div class="fs-6 text-gray-700">
        <h4 class="card-title">REGISTRATION COMPLETED </h4>
        <p> kindly click the submit button </p>
        <div class="float-end">

            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('users.index') }}" class="btn btn-default"> Abort</a>
        </div>
    </div>
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
                    <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1"
                        fill="currentColor" />
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
        <button id="continueButton" type="button" class="btn btn-lg btn-primary"
            data-kt-stepper-action="next">Continue
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
            <span class="svg-icon svg-icon-4 ms-1 me-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                        transform="rotate(-180 18 13)" fill="currentColor" />
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
{{-- <div class="card-footer">
     {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default"> Cancel </a>
</div> --}}







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    const passwordInput = document.getElementById('password');
    const passwordConfirmationInput = document.getElementById('passwordConfirmation');
    const passwordStrength = document.getElementById('password-strength');
    const passwordMatch = document.getElementById('password-match');

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const strength = checkPasswordStrength(password);
        displayPasswordStrength(strength);
    });

    passwordConfirmationInput.addEventListener('input', function() {
        checkPasswordMatch();
    });

    function checkPasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = passwordConfirmationInput.value;

        if (password === confirmPassword) {
            passwordMatch.textContent = 'Passwords match.';
            passwordMatch.style.color = 'green';
        } else {
            passwordMatch.textContent = 'Passwords do not match.';
            passwordMatch.style.color = 'red';
        }
    }

    function checkPasswordStrength(password) {
        // Define your password strength rules here
        const minLength = 12;
        const minUppercase = 1;
        const minLowercase = 1;
        const minNumbers = 1;
        const minSpecialChars = 1;

        // Check password length
        if (password.length < minLength) {
            return 0; // Weak
        }

        // Check for uppercase letters
        const uppercaseRegex = /[A-Z]/;
        if (!uppercaseRegex.test(password)) {
            return 0; // Weak
        }

        // Check for lowercase letters
        const lowercaseRegex = /[a-z]/;
        if (!lowercaseRegex.test(password)) {
            return 0; // Weak
        }

        // Check for numbers
        const numbersRegex = /[0-9]/;
        if (!numbersRegex.test(password)) {
            return 0; // Weak
        }

        // Check for special characters
        const specialCharsRegex = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/;
        if (!specialCharsRegex.test(password)) {
            return 0; // Weak
        }

        // If all rules are satisfied, consider it strong
        return 2; // Strong
    }


    function displayPasswordStrength(strength) {
        const strengthLabels = ['Weak', 'Medium', 'Strong'];
        passwordStrength.textContent = `Password Strength: ${strengthLabels[strength]}`;
    }

    // Get the "Continue" button element
    const continueButton = document.querySelector('[data-kt-stepper-action="next"]');

    // Add an event listener to the password input
    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const strength = checkPasswordStrength(password);

        // Disable the "Continue" button if password strength is weak or medium
        continueButton.disabled = strength < 2;
    });
</script>
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
