<!-- Modal -->
<div class="modal fade" id="addCommentsModal" tabindex="-1" role="dialog" aria-labelledby="addCommentsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => 'correspondences.addComments']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Comments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <!-- Comments Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('comments', 'Comments:') !!}
                        {!! Form::textarea('comments', null, ['id' => 'comments_field', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- Correspondence Id Field -->
                {!! Form::hidden('correspondence_id', null, ['id' => 'comment_correspondence_id']) !!}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


