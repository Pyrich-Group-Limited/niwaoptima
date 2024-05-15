<div class="row">

    <!-- Departure Time Field -->
    <div class="col-sm-6">
        {!! Form::label('departure_time', 'Departure Time:') !!}
        <p>{{ $booking->departure_time }}</p>
    </div>

    <!-- Departure Day Field -->
    <div class="col-sm-6">
        {!! Form::label('departure_day', 'Departure Day:') !!}
        <p>{{ $booking->departure_day }}</p>
    </div>
</div>

<div class="row">

    <!-- Departure State Field -->
    <div class="col-sm-6">
        {!! Form::label('departure_state', 'Departure State:') !!}
        <p>{{ $booking->departure->branch_name }}</p>
    </div>

    <!-- No Of Passengers Field -->


    <!-- Trip Duration Field -->
    <div class="col-sm-6">
        {!! Form::label('trip_duration', 'Trip Duration:') !!}
        <p>{{ $booking->trip_duration }}</p>
    </div>
</div>

<div class="row">

    <div class="col-sm-6">
        {!! Form::label('trip_type', 'Trip Type:') !!}
        <p class=" text-uppercase">{{ $booking->trip_type }}</p>
    </div>

    <!-- Price Field -->
    <div class="col-sm-6">
        {!! Form::label('price', 'Price:') !!}
        <p>{{ $booking->price }}</p>
    </div>
</div>
<!-- Trip Type Field -->

<div class="row">

    <!-- Arrival Time Field -->
    <div class="col-sm-6">
        {!! Form::label('arrival_time', 'Arrival Time:') !!}
        <p>{{ $booking->arrival_time }}</p>
    </div>

    <!-- Arrival Day Field -->
    <div class="col-sm-6">
        {!! Form::label('arrival_day', 'Arrival Day:') !!}
        <p>{{ $booking->arrival_day }}</p>
    </div>
</div>

<div class="row">


    <!-- Arrival State Field -->
    <div class="col-sm-6">
        {!! Form::label('arrival_state', 'Arrival State:') !!}
        <p>{{ $booking->arrival->branch_name  }}</p>
    </div>

    <!-- Created At Field -->
    <div class="col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $booking->created_at }}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $booking->updated_at }}</p>
</div>

