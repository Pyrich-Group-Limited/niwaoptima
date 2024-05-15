<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Middle Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('middle_name', 'Middle Name') !!}
    {!! Form::text('middle_name', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', $user->email, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Password Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div> --}}

<!-- Confirmation Password Field -->
{{-- <div class="form-group col-sm-6">
      {!! Form::label('password_confirmation', 'Password Confirmation') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div> --}}

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_two_factor_enabled', 'Enable Two Factor') !!}
    {!! Form::select('is_two_factor_enabled', [1 => 'Yes', 0 => 'No'], $user->is_two_factor_enabled, [
        'class' => 'form-control',
    ]) !!}
</div>


<div class="form-group col-sm-6 mt-2">
    {!! Form::label('profile_picture', 'Profile Picture', ['class' => 'form-label mt-5']) !!}
    <br>
    {!! Form::file('profile_picture', ['class' => 'form-control pt-5']) !!}
</div>
{{-- <img src="{{ asset('public/profile_pictures/' . $user->profile_picture) }}" alt="No Profile Picture yet" width="100"> --}}

<!-- Staff Form Fields -->
<div class="col-sm-12" id="staffDiv" style="display: none; width: 100%;">
    <div style="display: flex;">

        <div style="display: flex;">

            <!-- Phone Number Field -->
            <div class="col-sm-4">
                {!! Form::label('phone', 'Phone Number') !!}
                <div class="form-group">
                    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <!-- Profile Picture Field -->
            {{-- <div class="col-sm-4"> --}}
            {{-- {!! Form::label('profile_picture', 'Profile Picture') !!} --}}
            {{-- <div class="form-group">
        {!! Form::file('profile_picture',null, ['class' => 'form-control']) !!}
        </div> --}}
            {{-- </div> --}}

        </div>



    </div>

    <script></script>
