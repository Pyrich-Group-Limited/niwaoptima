<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('unit_name', 'Section :') !!}
    <p>{{ $unit->unit_name }}</p>
</div>

<!-- department Id Field -->
<div class="col-sm-12">
    {!! Form::label('unit_name', 'Section Name:') !!}
    <p>{{ $unit->department ? $unit->department->name : '' }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $unit->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $unit->updated_at }}</p>
</div>

