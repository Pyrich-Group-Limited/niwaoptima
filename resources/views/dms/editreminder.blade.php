@extends('layouts.app')
@section('content')

<div class="container">

    <form class="form" action="{{ route('reminder.update',[$data->id]) }}" method="post">
        @csrf
@method('PUT')
        <div class="form-group">
            {!! Form::label('subject', 'Subject', ['class' => 'form-label']) !!}

            {!! Form::text('subject', $data->subject, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('message', 'Message', ['form-label']) !!}

            {!! Form::textarea('message', $data->message, ['class' => 'form-control']) !!}

        </div>



        <div class="row">
            <div class="col-4">
                <div class="form-group   justify-content-center align-items-center">
                    <input name="repeatreminderbtn" class="form-check-input" type="checkbox" value=""
                        id="reminderbtn">

                    <label class=" form-check-label" for="reminderbtn">
                        Repeate Reminder
                    </label>
                </div>
            </div>





            <div class="col-4">
                <div class="form-group">
                    <label class="form-check-label" for="sendemail">
                        <input name="sendemailbtn" class="form-check-input" type="checkbox" value="1"
                            id="sendemail">
                        Send Email
                    </label>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('users', 'Select Users', ['class' => 'form-label']) !!}
                    {{-- <select name="users[]" multiple class="form-select usersSelect" id="usersSelect">
                        @foreach ($users as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select> --}}
                    {!! Form::select('user_id[]', $users, $data->users, [
                        'class' => 'form-select usersSelect',
                        'id' => 'usersSelect',
                        'multiple' => 'true',
                    ]) !!}
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-6">
                {!! Form::label('reminderstart_date', 'Reminder Start Date', [
                    'class' => 'form-label',
                    'id' => 'reminderstart_datelabel',
                ]) !!}
                {!! Form::date('reminderstart_date', null, ['class' => 'form-control date', 'id' => 'reminderstart_dateinput']) !!}
            </div>

            <div id="enddatecol" class="col-6">
                {!! Form::label('reminderend_date', 'Reminder End Date', ['class' => 'form-label']) !!}
                {!! Form::date('reminderend_date', null, ['class' => 'form-control']) !!}
            </div>

        </div>


        <div class="row-12 d-flex">
            <div class="col-6">

                <div class="form-group  freqrow" id="freqrow">
                    {!! Form::label('frequency', 'Frequency', ['class' => 'form-label']) !!}

                    {!! Form::select('frequency', $freq, null, ['class' => 'form-select', 'id' => 'freqselect']) !!}
                </div>
            </div>
            <div class="col-6">

                <div class="form-group " id="">
                    {!! Form::label('documents_manager_id', 'Document (s)', ['class' => 'form-label']) !!}

                    {!! Form::select('documents_manager_id', $doc->pluck('title','id'), $data->doc, ['class' => 'form-select', 'id' => 'documentselect']) !!}
                </div>
            </div>


        </div>


        <div class="row mt-5 freqday" id="daily">
            <div class="d-flex justify-content-between">
                <label class=" form-check-label  fw-bolder"><input type="radio" class=" form-check-input"
                        name="days[]" value="Monday"> Monday</label>
                <label class=" form-check-label  fw-bolder"><input type="radio" class="form-check-input"
                        name="days[]" value="Tuesday"> Tuesday</label>
                <label class=" form-check-label  fw-bolder"><input type="radio" class="form-check-input"
                        name="days[]" value="Wednesday"> Wednesday</label>
                <label class=" form-check-label  fw-bolder"><input type="radio" class="form-check-input"
                        name="days[]" value="Thursday"> Thursday</label>
                <label class=" form-check-label  fw-bolder"><input type="radio" class="form-check-input"
                        name="days[]" value="Friday"> Friday</label>
                <label class=" form-check-label  fw-bolder"><input type="radio" class="form-check-input"
                        name="days[]" value="Saturday"> Saturday</label>
                <label class=" form-check-label  fw-bolder"><input type="radio" class="form-check-input"
                        name="days[]" value="Sunday"> Sunday</label>
            </div>
        </div>


        <div class="row mt-5 " id="weekly">
            <div class="freqweek d-flex justify-content-between">
                <label class=" form-check-label  fw-bolder"><input type="checkbox" class=" form-check-input"
                        name="weekly[]" value="Monday"> Monday</label>
                <label class=" form-check-label  fw-bolder"><input type="checkbox" class="form-check-input"
                        name="weekly[]" value="Tuesday"> Tuesday</label>
                <label class=" form-check-label  fw-bolder"><input type="checkbox" class="form-check-input"
                        name="weekly[]" value="Wednesday"> Wednesday</label>
                <label class=" form-check-label  fw-bolder"><input type="checkbox" class="form-check-input"
                        name="weekly[]" value="Thursday"> Thursday</label>
                <label class=" form-check-label  fw-bolder"><input type="checkbox" class="form-check-input"
                        name="weekly[]" value="Friday"> Friday</label>
                <label class=" form-check-label  fw-bolder"><input type="checkbox" class="form-check-input"
                        name="weekly[]" value="Saturday"> Saturday</label>
                <label class=" form-check-label  fw-bolder"><input type="checkbox" class="form-check-input"
                        name="weekly[]" value="Sunday"> Sunday</label>
            </div>

        </div>


        <div class="row" id="forquartely">
            <table>
                <thead>
                    <tr>
                        <th>Month</th>
                        <th> Day</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jan-Mar</td>
                        <td>
                            <select name="quartely[]" class="form-select select " id="">

                                <option value="">January</option>
                                <option value="">February</option>
                                <option value="">March</option>
                            </select>
                        </td>
                        <td>
                            <select name="quartely[]" class=" form-select select form-select-solid"
                                name="day" id="day">
                                <option value="">Select Day</option>
                                @for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y')); $i++)
                                    <option value="{{ $i }}" {{ $i == date('j') ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td>Apr-June</td>
                        <td>
                            <select name="quartely[]" class="form-select select " id="">

                                <option value="">April</option>
                                <option value="">May</option>
                                <option value="">June</option>
                            </select>
                        </td>
                        <td>
                            <select name="quartely[]" class=" form-select select form-select-solid"
                                name="day" id="day">
                                <option value="">Select Day</option>
                                @for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y')); $i++)
                                    <option value="{{ $i }}" {{ $i == date('j') ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td>Jul-Sept</td>
                        <td>
                            <select name="quartely[]" class="form-select select " id="">

                                <option value="">July</option>
                                <option value="">August</option>
                                <option value="">September</option>
                            </select>
                        </td>
                        <td>
                            <select name="quartely[]" class=" form-select select form-select-solid"
                                name="day" id="day">
                                <option value="">Select Day</option>
                                @for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y')); $i++)
                                    <option value="{{ $i }}" {{ $i == date('j') ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td>Oct-Dec</td>
                        <td>
                            <select name="quartely[]" class="form-select select " id="">
                                <option value=""></option>
                                <option value="">October</option>
                                <option value="">November</option>
                                <option value="">December</option>
                            </select>
                        </td>
                        <td>
                            <select name="quartely[]" class="form-select select form-select-solid" name="day"
                                id="day">
                                <option value="">Select Day</option>
                                @for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y')); $i++)
                                    <option value="{{ $i }}" {{ $i == date('j') ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </td>

                    </tr>
                </tbody>

            </table>
        </div>


        <div class="row" id="forhalfyear">
            <table class=" table table-responsive">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th> Day</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jan-Jun</td>
                        <td>
                            <select name="halfyear[]" class="form-select select " id="">
                                <option value=""></option>
                                <option value="">January</option>
                                <option value="">February</option>
                                <option value="">March</option>
                                <option value="">April</option>
                                <option value="">May</option>
                                <option value="">June</option>
                            </select>
                        </td>
                        <td>
                            <select name="halfyear[]" class=" form-select select form-select-solid"
                                name="day" id="day">
                                <option value="">Select Day</option>
                                @for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y')); $i++)
                                    <option value="{{ $i }}" {{ $i == date('j') ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </td>

                    </tr>


                    <tr>
                        <td>Jul-Dec</td>
                        <td>
                            <select name="halfyear[]" class="form-select select " id="">
                                <option value=""></option>
                                <option value="">July</option>
                                <option value="">August</option>
                                <option value="">September</option>
                                <option value="">October</option>
                                <option value="">November</option>
                                <option value="">December</option>
                            </select>
                        </td>
                        <td>
                            <select name="halfyear[]" class=" form-select select form-select-solid"
                                name="day" id="day">
                                <option value="">Select Day</option>
                                @for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y')); $i++)
                                    <option value="{{ $i }}" {{ $i == date('j') ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </td>

                    </tr>

                </tbody>

            </table>
        </div>

        <div class=" d-flex    my-4">
            <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-floppy">Update</i> </button>
            {{-- <button type="button" class=" btn btn-sm btn-danger"><i class="bi bi-x"></i> Cancel</button> --}}
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="container">
<script>
    var reminderbtn = $('#reminderbtn');
    var sendemailcheckbox = $('#sendemail');
    var userselect = $('#usersSelect');
    var documentselect = $('#documentselect');
    var startdatelabel = $('#reminderstart_datelabel');
    var startdateinput = $('#reminderstart_dateinput');
    var enddatediv = $('#enddatecol');
    var frequencydiv = $('#freqrow');
    var frequencyselectbtn = $('#freqselect');
    var dailydiv = $('#daily');
    var weeklydiv = $('#weekly');
    var quartelydiv = $('#forquartely');
    var halfyearlydiv = $('#forhalfyear');



    frequencydiv.hide();
    enddatediv.hide();
    dailydiv.hide();
    weeklydiv.hide();
    quartelydiv.hide();
    halfyearlydiv.hide();
    startdatelabel.text('Reminder Date')


    userselect.select2();
    documentselect.select2();
    // frequencyselectbtn.select2();
    $(document).ready(function() {
        // $('.usersSelect').select2();

        var currentDate = new Date().toISOString().split('T')[0];
        startdateinput.val(currentDate);



        reminderbtn.change(function() {
            if (this.checked) {

                frequencydiv.show(2000);
                startdatelabel.text('Reminder Start Date');
                enddatediv.show(1000);


                frequencyselectbtn.change(function() {

                    if (this.value == 'Daily') {
                        dailydiv.show(1000);
                        weeklydiv.hide(1000);
                        quartelydiv.hide(1000);
                        halfyearlydiv.hide(1000);

                    } else if (this.value == 'Weekly') {
                        dailydiv.hide(1000);
                        weeklydiv.show(1000);
                        quartelydiv.hide(1000);
                        halfyearlydiv.hide(1000);
                    } else if (this.value == 'Quartely') {
                        dailydiv.hide(1000);
                        weeklydiv.hide(1000);
                        quartelydiv.show(1000);
                        halfyearlydiv.hide(1000);
                    } else if (this.value == 'Half Yearly') {
                        dailydiv.hide(1000);
                        weeklydiv.hide(1000);
                        quartelydiv.hide(1000);
                        halfyearlydiv.show(1000);
                    } else {
                        dailydiv.hide(1000);
                        weeklydiv.hide(1000);
                        quartelydiv.hide(1000);
                        halfyearlydiv.hide(1000);
                    }

                }); // for the frequency closing


            } else {
                frequencydiv.hide(2000);
                enddatediv.hide(1000);
                startdatelabel.text('Reminder Date');

                dailydiv.hide(1000);
                weeklydiv.hide(1000);
                quartelydiv.hide(1000);
                halfyearlydiv.hide(1000);
            }

        })

    }); //where i end the dom ready
</script>
@endsection
