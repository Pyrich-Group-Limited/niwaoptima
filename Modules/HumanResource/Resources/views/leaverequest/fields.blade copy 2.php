<div class="alert alert-danger d-none" id="notificationAlert" role="alert">
    <!-- Notification message will be displayed here -->
</div>

<div class="form-group col-sm-6">
    {!! Form::label('type', 'SELECT LEAVE TYPE.:') !!}
    <select name="type" class="form-control form-control-solid border border-2 form-select" required id="leave_type">
        @foreach ($leavetype as $item )
        <option value="{{$item->id}}">{{$item->name}} </option>

        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('date_start_new', 'DATE REQUESTED TO COMMENCE PRESENT LEAVE:') !!}
    {!! Form::date('date_start_new', null, ['class' => 'form-control form-control-solid border border-2 ','id'=>'date_start']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('number_days', 'NUMBER OF DAYS:') !!}
    {!! Form::number('number_days', null, ['class' => 'form-control form-control-solid border border-2 ','readonly'=>true,'id'=>'number_days']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('daystaken', 'Number of days to take:') !!}
    {!! Form::number('daystaken', null, ['class' => 'form-control form-control-solid border border-2 ','placeholder'=>'input the number of days to take','id'=>'days']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('home_address', 'HOME ADDRESS:') !!}
    {!! Form::text('home_address', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('home_number', 'HOUSE NUMBER:') !!}
    {!! Form::text('home_number', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('local_council', 'LOCAL COUNCIL/AREA COUNCIL:') !!}
    {!! Form::text('local_council', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'EXPECTED DATE TO RESUME:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control form-control-solid border border-2 ','placeholder'=>'the date for you to resume','id'=>'end_date','readonly'=>true]) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('state', 'STATE:') !!}
    {!! Form::select('state', getBranchRegions(), null, ['class' => 'form-control form-control-solid border border-2 form-select ']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'PHONE NUMBER:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('officer_relieve', 'NAME OF OFFICER TO RELIEVE:') !!}
    {!! Form::text('officer_relieve', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
</div>

<!-- Signature Field -->
<div class="col-sm-4 my-4">
    {!! Form::label('signature_path', 'UPLOAD SIGNATURE PDF ONLY') !!}
    <div class="form-group">
        {!! Form::file('signature_path',null, ['class' => 'form-control form-control-solid border border-2','accept' => 'image/*']) !!}
    </div>
</div>


<div class="form-group my-5 col-sm-6">
    {!!Form::button('Update',['class'=>'btn btn-info','id'=>'u']) !!}
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#leave_type').on('click', function() {
            const selectedId = $(this).val();
            if (selectedId !== '') {
                $.ajax({
                    url: `http://localhost:8000/leave_request_data/get-data/${selectedId}`,
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
    document.addEventListener('DOMContentLoaded', function() {
        let updatebtn = document.getElementById('u');
        updatebtn.addEventListener('click', () => {

            let datestart = document.getElementById('date_start');
            let numberofdays = document.getElementById('number_days');
            let daystaken = document.getElementById('days');
            let daytoresume = document.getElementById('end_date');

            let date = new Date(datestart.value)
            let day = parseInt(daystaken.value);
            let newdate = new Date(date.getTime() + (day * 24 * 60 * 60 * 1000));

            if (parseInt(daystaken.value) > parseInt(numberofdays.value)) {
                let notificationAlert = document.getElementById('notificationAlert');
                notificationAlert.textContent = daystaken.value + "   exceeds the allowed limit of " + numberofdays.value + "days";
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

        });
    });
</script>