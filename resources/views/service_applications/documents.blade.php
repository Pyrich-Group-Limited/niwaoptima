<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="service-applications-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">S/N</th>
                    <th class="min-w-200px">Document Name</th>
                    <th class="min-w-200px">Document (PDF)</th>
                    <th class="min-w-200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($documents as $document)
                    <tr class="fw-bold text-muted bg-light">
                        <td>
                            @php
                                echo $no++;
                            @endphp
                        </td>
                        <td>{{ $document->name }}</td>
                        <td>
                            <a href="{{ env('DOCUMENT_URL').'storage/' . $document->path }}" target="_blank">
                                View PDF
                            </a>
                        </td>
                        <td>
                            {!! Form::open([
                                'route' => ['application.approve.document', $document->id],
                                'method' => 'post',
                                'id' => 'document_approval_form',
                            ]) !!}
                            <div class='btn-group'>

                                <input type="hidden" name="selected_button" value="approve" id="selected_button_input">
                                <input type="hidden" name="document_id" value="" id="document_id">

                                @can('approve or decline service application documents')
                                @if ($document->approval_status == 0)
                                    {!! Form::button('Decline', [
                                        'type' => 'button',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => "setSelectedStatusSingleDocument('decline', $document->id)",
                                    ]) !!}
                                @endif

                                @if ($document->approval_status == 0)
                                    {!! Form::button('Approve', [
                                        'type' => 'button',
                                        'class' => 'btn btn-success btn-xs',
                                        'onclick' => "setSelectedStatusSingleDocument('approve', $document->id)",
                                    ]) !!}
                                @endif
                                @endcan

                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $documents])
        </div>
    </div>

    @if ($serviceApplication->current_step == 5)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Documents Approval</h3>
        {!! Form::open([
            'route' => ['application.final.documents.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}
        <div class="form-group col-sm-6 mb-5">
            {!! Form::label('mse_document_verification_comment', 'Comments:') !!}
            {!! Form::textarea('mse_document_verification_comment', $serviceApplication->mse_document_verification_comment, [
                'class' => 'form-control',
                'id' => 'mse_document_verification_comment',
            ]) !!}
        </div>
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            @can('approve or decline service application documents')
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
            @endcan
        </div>
        {!! Form::close() !!}
    </div>
@endif
</div>


<script>
    function setSelectedStatusSingleDocument(value, id) {
        document.getElementById('selected_button_input').value = value;
         document.getElementById('document_id').value = id;
        let confirmation = confirm("Are you sure you want to proceed?");
        if (confirmation) {
            document.getElementById('document_approval_form').submit(); // Submit the form
        }
    }
</script>
