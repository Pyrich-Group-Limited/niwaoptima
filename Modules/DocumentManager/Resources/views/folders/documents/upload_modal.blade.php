<!-- Modal -->
<div class="modal fade" id="uploadDocumentModal" tabindex="-1" role="dialog" aria-labelledby="uploadDocumentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => 'documents.store', 'enctype' => 'multipart/form-data' ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Title Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <!-- Description Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <!-- Folder Id Field -->
                {!! Form::hidden('folder_id', $folder->id) !!}


                <!-- Document Url Field -->
                {{-- <div class="form-group col-sm-12">
                    {!! Form::label('file', 'Upload file:') !!}
                    <div class="input-group">
                        <div class="custom-file">
                            {!! Form::file('file', ['class' => 'custom-file-input']) !!}
                        </div>
                    </div>
                </div> --}}
                <div class="form-group col-sm-12">
                    <label>File upload</label>
                    <input type="file" name="file" class="file-upload-default" accept=".pdf">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload PDF File">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
