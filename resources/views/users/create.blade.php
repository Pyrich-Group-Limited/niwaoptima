@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">REGISTRATION PORTAL</h4>
                        <form id="example-vertical-wizard" method="POST" action="{{ route('users.store') }}">

                            @csrf

                            <div class="cmxform">
                                <h3>PERSONAL INFORMATION</h3>
                                <section>
                                    <h4 class="card-title">POSITION ATTAINED</h4>
                                    <div class="form-group">
                                        {!! Form::label('department_id', 'Departments') !!}
                                        {!! Form::select('department_id', $departments, null, [
                                            'class' => 'form-control form-control-solid border border-2',
                                            'id' => 'department_id', // Add an ID for easier targeting in JavaScript
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('ranking_id', 'Ranks') !!}
                                        {!! Form::select('ranking_id', [], null, [
                                            'class' => 'form-control form-control-solid border border-2 form-select',
                                            'id' => 'ranking_id', // Add an ID for easier targeting in JavaScript
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('level_id', 'Levels') !!}
                                        {!! Form::select('level_id', $levels, null, [
                                            'class' => 'form-control form-control-solid border border-2 form-select',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                    

                                </section>
                                <h3>PERSONAL INFORMATION</h3>
                                <section>
                                    <h4 class="card-title">PERSONAL INFORMATION</h4>

                                    <div class="form-group">
                                        {!! Form::label('first_name', 'First Name') !!}
                                        {!! Form::text('first_name', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('middle_name', 'Middle Name') !!}
                                        {!! Form::text('middle_name', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('last_name', 'Last Name') !!}
                                        {!! Form::text('last_name', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                </section>
                                <h3>PASSKEY AREA </h3>
                                <section>
                                    <h4 class="card-title">CREDENTIALS AREA </h4>
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::email('email', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label(
                                            'password',
                                            'Password (Password must be a minimum of 12 characters including atleast a number and symbol)',
                                        ) !!}
                                        {!! Form::password('password', [
                                            'id' => 'password',
                                            'class' => 'form-control form-control-solid border border-2',
                                            'autocomplete' => 'off',
                                        ]) !!}
                                        <div id="password-strength" class="form-text"
                                            style="color:brown;font-weight: bolder"></div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                                        {!! Form::password('password_confirmation', [
                                            'id' => 'passwordConfirmation',
                                            'class' => 'form-control form-control-solid border border-2',
                                            'autocomplete' => 'off',
                                        ]) !!}
                                        <div id="password-match" class="form-text"></div>
                                    </div>
                                    
                                </section>
                                <h3>OTHER INFORMATION</h3>
                                <section>
                                    <h4 class="card-title">OTHER INFORMATION</h4>

                                    <div class="form-group">
                                        {!! Form::label('staff_id', 'Staff ID') !!}
                                        {!! Form::text('staff_id', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Phone Number') !!}
                                        {!! Form::number('phone', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('about_me', 'About Me') !!}
                                        {!! Form::textarea('about_me', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>

                                </section>

                                <h3>Finish</h3>
                                <section>

                                    <h4 class="card-title">Finish</h4>
                                    <div class="form-group">
                                        {!! Form::label('branch_id', 'Location') !!}
                                        {!! Form::select('branch_id', $branch, null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                    <div class="form-group">

                                        {!! Form::label('roles', 'Roles') !!}
                                        {!! Form::select('roles[]', $roles, null, [
                                            'class' => 'form-control form-control-solid border border-2 form-select',
                                        ]) !!}
                                    </div>

                                    

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            I agree with the Terms and Conditions.
                                        </label>
                                    </div>
                                </section>
                            </div>
                            {{-- {!!Form::submit('Submit',['class'=>'btn btn-blue'])!!}
                        <a href="{{route('users.index')}}" class="btn btn-default"> Abort</a> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('page_scripts')
<script>
   $(document).ready(function () {
    // Listen for changes in the department dropdown
    $('#department_id').change(function () {
        var departmentId = $(this).val();
        // Show loading animation before sending the AJAX request
        $('.loader-demo-box1').show();
        // Make an AJAX request to fetch ranks based on the selected department
        $.ajax({
            url: '/get-ranks', // Replace with the actual endpoint to fetch ranks
            type: 'GET',
            data: {
                department_id: departmentId
            },
            success: function (response) {
                // Hide loading animation after successful response
                $('.loader-demo-box1').hide();

                // Populate the ranks dropdown with the fetched ranks
                var ranks = response.data.ranks;
                if (ranks.length > 0) {
                    var options = '';
                    $.each(ranks, function (index, rank) {
                        options += '<option value="' + rank.id + '">' + rank.name + '</option>';
                    });
                    $('#ranking_id').html(options);
                } else {
                    // Display message indicating no results found
                    $('#ranking_id').html('<option value="">No results found</option>');
                }
            },
            error: function (response) {
                // Hide loading animation in case of error
                $('.loader-demo-box1').hide();
                console.error('Error fetching ranks:', response);
            }
        });
    });
});

</script>
@endpush
@endsection
