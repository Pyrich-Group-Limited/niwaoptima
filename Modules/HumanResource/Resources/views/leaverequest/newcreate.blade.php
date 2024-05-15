@extends('layouts.app')
@section('content')
    <div class="container">


        <div class="card">
            <div class="  text-center my-2">
                <div class="alert alert-danger d-none" id="notificationAlert" role="alert">
                    <!-- Notification message will be displayed here -->
                </div>
                <span class="  text-success card-title text-center">

                    LEAVE APPLICATION PORTAL
                </span>

            </div>
            <div class="card-body">
                <form action="{{ route('gmleave') }}" class="form" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-6">

                            <div class="form-group">
                                {!! Form::label('type', 'Select The Type Of Leave:', ['class' => 'form-label']) !!}
                                {!! Form::select('type', $leavetype, null, [
                                    'class' => 'form-control form-select',
                                    'required' => 'true',
                                    'id' => 'leavetypeid',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-4">

                            <div class="form-group">
                                {!! Form::label('daystaken', 'ENTER NUMBER OF DAYS FOR LEAVE', ['class' => 'form-label']) !!}
                                {!! Form::number('daystaken', null, [
                                    'class' => 'form-control',
                                    'id' => 'daysinputed',
                                    'placeholder' => 'input the number of days to take from max leave type',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">

                            <div class="form-group">
                                {!! Form::label('date_start_new', 'PICK THE DATE YOU WANT TO COMMERCE LEAVE', ['class' => 'form-label']) !!}
                                {!! Form::date('date_start_new', null, ['class' => 'form-control form-date date', 'id' => 'date_start_newid']) !!}
                            </div>
                        </div>
                        <div class="col-4">

                            <div class="form-group">
                                {!! Form::label('end_date', 'EXPECTED DATE OF RESUMETION', ['class' => 'form-label']) !!}
                                {!! Form::text('end_date', null, ['class' => 'form-control', 'id' => 'end_date', 'readonly' => true]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row-8">

                        <button id="submitbtn" class="btn btn-success float-end" type="submit">Apply For Leave</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            let resumptiondate = $('#end_date');
            let dateselected = $('#date_start_newid');
            let daystotake = $('#daysinputed');
            let leavetype = $('#leavetypeid');
            let btn = $('#submitbtn');
            let notificationAlert = document.getElementById('notificationAlert');

            dateselected.on('change', function() {

                resumptiondate.val(calculateresumption(dateselected.val(), daystotake));

            });








        })

        function calculateresumption(startdate, daystaken) {
            var endDate = new Date(startdate);
            for (var i = 0; i < daystaken; i++) {
                endDate.setDate(endDate.getDate() + 1);
                if (endDate.getDay() === 0 || endDate.getDay() === 6) {
                    endDate.setDate(endDate.getDate() + 1);
                }
            }
            return endDate.toISOString().slice(0, 10);
        }
    </script>
@endsection
