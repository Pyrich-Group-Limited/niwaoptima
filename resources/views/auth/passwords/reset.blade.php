<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                @php
                    if (!isset($token)) {
                        $token = \Request::route('token');
                        $email = $_GET['email'];
                    }
                @endphp

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group mb-3">
                    <input type="email" value="{{ $email }}"
                           name="email" readonly required
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           name="password" required
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="Password" id="password">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                    @endif
                    
                </div>
                <div id="password-strength" class="form-text" style="color:brown;font-weight: bolder"></div>
                <div class="input-group mb-3">
                    <input type="password"
                           name="password_confirmation" required
                           class="form-control"
                           placeholder="Confirm Password" id="passwordConfirmation">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                    
                </div>
                <div id="password-match" class="form-text"></div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block" id="reset">Reset Password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{ route('login') }}">Login</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>

</div>

<script src="{{ asset('js/app.js') }}" defer></script>

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
const continueButton = document.getElementById('reset');

// Add an event listener to the password input
passwordInput.addEventListener('input', function() {
    const password = this.value;
    const strength = checkPasswordStrength(password);

    // Disable the "Continue" button if password strength is weak or medium
    continueButton.disabled = strength < 2;
});

    </script>

</body>
</html>
