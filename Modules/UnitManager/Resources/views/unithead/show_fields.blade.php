<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Unit Head Name:') !!}
    <p>{{ $unithead->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $unithead->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $unithead->updated_at }}</p>
</div>

