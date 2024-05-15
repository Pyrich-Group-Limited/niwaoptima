<!-- Title Field -->
<div class="form-group col-sm-12 mb-3">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
</div>


<!-- Document Url Field -->
{{-- <div class="form-group col-sm-12 mb-5">
    {!! Form::label('file', 'Upload file:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('file', ['class' => 'custom-file-input form-control']) !!}
        </div>
    </div>
</div> --}}
<div class="form-group col-sm-12 col-lg-12 mb-3">
    <label>File upload</label>
    <input type="file" name="file" class="file-upload-default" accept=".pdf">
    <div class="input-group col-xs-12">
      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload PDF File">
      <span class="input-group-append">
        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
      </span>
    </div>
  </div>


