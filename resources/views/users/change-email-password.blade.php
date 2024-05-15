
@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <h4 class="card-title">Change Email Password & EBS Password</h4>
            <p>Password must be a minimum of 12 characters including atleast a number and a symbol </p>
            @include('flash::message')
            <form method="post" action="{{ route('change.email.password') }}">
                @csrf
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    <div id="password-strength" class="form-text" style="color:brown;font-weight: bolder"></div>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="passwordConfirmation" required>
                    <div id="password-match" class="form-text"></div>
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
      </div>
    </div>

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
@endsection
