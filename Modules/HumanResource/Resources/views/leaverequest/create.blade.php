@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-danger d-none" id="notificationAlert" role="alert">
                            <!-- Notification message will be displayed here -->
                        </div>
                        <h4 class="card-title">REQUEST FOR LEAVE</h4>
                        <form id="example-vertical-wizard" method="POST" action="{{ route('leave_request.store') }}">
                            @csrf

                            <div>
                                <h3>Step 1</h3>
                                <section>
                                    {{-- <h4 class="card-title">LEAVE DETAILS</h4> --}}
                                    <div class="form-group ">
                                        {!! Form::label('type', 'SELECT LEAVE TYPE.:') !!}
                                        <select name="type"
                                            class="form-control form-control-solid border border-2 form-select" required
                                            id="leave_type">
                                            @foreach ($leavetype as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group ">
                                        {!! Form::label('date_start_new', 'DATE REQUESTED TO COMMENCE PRESENT LEAVE:') !!}
                                        {!! Form::date('date_start_new', null, [
                                            'class' => 'form-control form-control-solid border border-2 ',
                                            'id' => 'date_start',
                                        ]) !!}
                                    </div>


                                    <div class="form-group ">
                                        {!! Form::label('number_days', 'NUMBER OF DAYS:') !!}
                                        {!! Form::number('number_days', null, [
                                            'class' => 'form-control form-control-solid border border-2 ',
                                            'readonly' => true,
                                            'id' => 'number_days',
                                        ]) !!}
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            {!! Form::label('daystaken', 'Number of days to take:') !!}
                                            {!! Form::number('daystaken', null, [
                                                'class' => 'form-control form-control-solid border border-2 ',
                                                'placeholder' => 'input the number of days to take',
                                                'id' => 'days',
                                            ]) !!}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {!! Form::label('end_date', 'EXPECTED DATE TO RESUME:', ['style' => 'font-size: 0.8125rem;']) !!}

                                            {!! Form::text('end_date', null, [
                                                'class' => 'form-control form-control-solid border border-2 ',
                                                'placeholder' => 'the date for you to resume',
                                                'id' => 'end_date',
                                                'readonly' => true,
                                            ]) !!}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {!! Form::label('Update', 'EXPECTED DATE TO RESUME:', ['style' => 'font-size: 0.8125rem;color: white']) !!}
                                            {!! Form::button('Update', ['class' => 'btn btn-info', 'id' => 'u', 'onclick' => 'resumeDate()']) !!}
                                        </div>
                                    </div>
                                    {{--  <div class="form-group ">
                                        {!! Form::label('end_date', 'EXPECTED DATE TO RESUME:') !!}
                                        {!! Form::text('end_date', null, [
                                            'class' => 'form-control form-control-solid border border-2 ',
                                            'placeholder' => 'the date for you to resume',
                                            'id' => 'end_date',
                                            'readonly' => true,
                                        ]) !!}
                                    </div>
                                    <div class="form-group my-5 ">
                                        {!! Form::button('Update', ['class' => 'btn btn-info', 'id' => 'u']) !!}
                                    </div> --}}

                                </section>
                                <h3>Step 2</h3>
                                <section>
                                    <h4 class="card-title">RESUME DATE, ADDRESS, LGA</h4>
                                    <div class="row">
                                        {{-- {!! Form::label('end_date', 'EXPECTED DATE TO RESUME:', ['style' => 'font-size: 0.8125rem;']) !!}
                                        <div class="form-group col-md-10">
                                            
                                            {!! Form::text('end_date', null, [
                                                'class' => 'form-control form-control-solid border border-2 ',
                                                'placeholder' => 'the date for you to resume',
                                                'id' => 'end_date',
                                                'readonly' => true,
                                            ]) !!}
                                        </div>
                                        <div class="form-group col-md-2">
                                           
                                            {!! Form::button('Update', ['class' => 'btn btn-info', 'id' => 'u', 'onclick' => 'resumeDate()']) !!}
                                        </div> --}}
                                    </div>
                                    <div class="form-group ">
                                        {!! Form::label('home_address', 'LEAVE DESTINATION ADDRESS:') !!}
                                        {!! Form::text('home_address', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                                    </div>
                                    <div class="form-group ">
                                        {!! Form::label('local_council', 'LOCAL COUNCIL/AREA COUNCIL:') !!}
                                        {!! Form::text('local_council', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                                    </div>

                                </section>
                                <h3>Step 3</h3>
                                <section>
                                    <h4 class="card-title">Additional fields</h4>
                                    <div class="form-group ">
                                        {!! Form::label('state', 'STATE:') !!}
                                        {!! Form::select('state', getBranchRegions(), null, [
                                            'class' => 'form-control form-control-solid border border-2 form-select ',
                                        ]) !!}
                                    </div>

                                    <div class="form-group ">
                                        {!! Form::label('phone_number', 'PHONE NUMBER:') !!}
                                        {!! Form::text('phone_number', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                                    </div>
                                    <div class="form-group ">
                                        {!! Form::label('officer_relieve', 'NAME OF OFFICER TO RELIEVE:') !!}
                                        {!! Form::text('officer_relieve', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                                    </div>
                                </section>


                                <h3>Finish</h3>
                                <section>
                                    <h4 class="card-title">YOU ARE ABOUT APPLYING FOR A LEAVE</h4>
                                    <!-- Signature Field -->
                                    <div class="col-sm-4 my-4">
                                        {!! Form::label('signature_path', 'UPLOAD SIGNATURE PDF ONLY') !!}
                                        <div class="form-group">
                                            {!! Form::file('signature_path', [
                                                'class' => 'form-control form-control-solid border border-2',
                                                'accept' => '.pdf',
                                                'onchange' => 'validateFile(this)',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            {{-- <input class="checkbox" type="checkbox"> --}}
                                            UPLOAD SIGNATURE AND CONFIRM BY PRESSING THE APPLY BUTTON
                                        </label>
                                    </div>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#leave_type').on('click', function() {
                const selectedId = $(this).val();
                const port = location.protocol + '//' + location.host;

                if (selectedId !== '') {
                    $.ajax({
                        url: `${port}/leave_request_data/get-data/${selectedId}`,
                        type: 'GET',
                        data: {
                            id: selectedId
                        },
                        dataType: 'json',
                        //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(response) {
                            var du = JSON.stringify(response.duration);
                            $('#number_days').val('');
                            $('#number_days').val(du);

                        },
                        error: function() {
                            alert('Failed to retrieve duration.');
                        }
                    });
                } else {
                    $('#number_days').val('');
                }
            });
        });
    </script>
    <script>
        function resumeDate() {
            /*  document.addEventListener('DOMContentLoaded', function() { */
            //let updatebtn = document.getElementById('u');
            // updatebtn.addEventListener('click', () => {

            let datestart = document.getElementById('date_start');
            let numberofdays = document.getElementById('number_days');
            let daystaken = document.getElementById('days');
            let daytoresume = document.getElementById('end_date');

            let date = new Date(datestart.value)
            let day = parseInt(daystaken.value);
            let newdate = new Date(date.getTime() + (day * 24 * 60 * 60 * 1000));

            if (parseInt(daystaken.value) > parseInt(numberofdays.value)) {
                let notificationAlert = document.getElementById('notificationAlert');
                notificationAlert.textContent = daystaken.value + "   exceeds the allowed limit of " + numberofdays.value +
                    "days";
                notificationAlert.classList.remove('d-none');


            } else {
                // If days taken is valid, hide the notification alert
                let notificationAlert = document.getElementById('notificationAlert');
                notificationAlert.classList.add('d-none');


                while (newdate.getDay() == 0 || newdate.getDay() == 6) {
                    day++
                    newdate = new Date(date.getTime() + (day * 24 * 60 * 60 * 1000));
                }
                if (newdate.getDate() == 0) {
                    day += 2;
                    newdate = new Date(date.getTime() + (day * 24 * 60 * 60 * 1000));

                }

                daytoresume.value = newdate.toISOString().slice(0, 10);
                //

                // Enabling the submit button now
                let submitbtn = document.getElementById('submit')

                submitbtn.disabled = false;

            }

        }; // });
        /*  }); */
    </script>
    <script>
        function validateFile(input) {
            if (input.files && input.files[0]) {
                var fileSize = input.files[0].size; // Size in bytes
                var maxSize = 1024 * 1024; // 1MB in bytes

                if (fileSize > maxSize) {
                    alert('File size exceeds the maximum limit of 1MB.');
                    input.value = ''; // Clear the file input
                }
            }
        }
    </script>
@endsection
