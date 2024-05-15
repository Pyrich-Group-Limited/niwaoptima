<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'LEAVE TYPE:') !!}
    <p>{{ $leavetype->name}}</p>
</div>

<!-- NUMBER OF DAYS Field -->
<div class="col-sm-12">
    {!! Form::label('duration', 'DURATION OF LEAVE:') !!}
    <p>{{ $leavetype->duration}}</p>
</div>

