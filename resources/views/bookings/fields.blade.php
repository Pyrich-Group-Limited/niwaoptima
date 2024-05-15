<!-- Departure Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departure_time', 'Departure Time:') !!}

    {!! Form::input('time', 'departure_time', date('H:i'), ['class' => 'form-control', 'id' => 'departure_time']) !!}

</div>



<!-- Departure Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departure_day', 'Departure Day:') !!}
    {{-- {!! Form::('departure_day', null, ['class' => 'form-control','id'=>'departure_day']) !!} --}}
    {!! Form::date('departure_day', null, ['class' => 'form-control']) !!}
</div>



<!-- Departure State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departure_state', 'Select Departure State:') !!}
    {!! Form::select('departure_state', $state->pluck('branch_name','id'), null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- No Of Passengers Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('no_of_passengers', 'No Of Passengers:') !!}
    {!! Form::number('no_of_passengers', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Trip Duration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trip_duration', 'Specify The Trip Duration:') !!}
    {!! Form::text('trip_duration', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Trip Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trip_type', 'Select The Trip Type:') !!}
    {!! Form::select('trip_type',$trip, null, ['class' => 'form-control form-select', 'required']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Specify The Price (Cost) Of Trip:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Arrival Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arrival_time', 'Arrival Time:') !!}

    {!! Form::input('time','arrival_time', date('H:i'),['class' => 'form-control', 'id' => 'arrival_time'])!!}
</div>



<!-- Arrival Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arrival_day', 'Arrival Day:') !!}
    {!! Form::date('arrival_day', null, ['class' => 'form-control','id'=>'arrival_day']) !!}
</div>



<!-- Arrival State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arrival_state', 'Arrival State:') !!}
    {!! Form::select('arrival_state', $state->pluck('branch_name','id'), null, ['class' => 'form-control form-select']) !!}
</div>
