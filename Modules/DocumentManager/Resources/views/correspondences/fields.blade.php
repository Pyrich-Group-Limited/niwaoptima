<!-- Subject Field -->
<div class="form-group col-sm-6 mb-3">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::text('subject', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6 mb-3">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date').datepicker()
    </script>
@endpush

<!-- Sender Field -->
<div class="form-group col-sm-6 mb-3">
    {!! Form::label('sender', 'Sender:') !!}
    {!! Form::text('sender', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Reference Number Field -->
<div class="form-group col-sm-6 mb-3">
    {!! Form::label('reference_number', 'Reference Number:') !!}
    {!! Form::text('reference_number', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Document Url Field -->
<div class="form-group col-sm-12 mb-3">
    {!! Form::label('file', 'Upload file:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('file', ['class' => 'custom-file-input form-control']) !!}
        </div>
    </div>
</div>
