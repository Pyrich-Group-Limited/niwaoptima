<div class="card-body p-5">
    <div class="row">
        <div class="col-sm-6">
            <h3>Documents</h3>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-primary float-end" data-toggle="modal" data-target="#uploadDocumentModal">
                Upload document
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="documents-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Title</th>
                    <th class="min-w-200px">Description</th>
                    <th class="min-w-200px">Document Url</th>
                    <th class="min-w-200px">Folder</th>
                    <th class="min-w-200px">Created By</th>
                    <th class="min-w-120px" colspan="1">Action</th>
                    <th class="min-w-200px text-end rounded-end"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                    @php
                        $latestDocumentUrl = $document
                            ->documentVersions()
                            ->latest()
                            ->first()
                            ? $document
                                ->documentVersions()
                                ->latest()
                                ->first()->document_url
                            : '#';
                    @endphp
                    <tr>
                        <td><i class="fa fa-file"></i> {{ $document->title }}</td>
                        <td>{{ $document->description }}</td>
                        <td><a target="_blank" href="{{ asset($latestDocumentUrl) }}">View</a>
                        </td>
                        <td>{{ $document->folder ? $document->folder->name : '' }}</td>
                        <td>{{ $document->createdBy ? $document->createdBy->email : '' }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['documents.destroy', $document->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('folders.documents.documentVersions.index', [$document->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('folders.documents.edit', [$document->id, $folder->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <th class="min-w-200px text-end rounded-end"></th>
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
</div>


@include('documentmanager::folders.documents.upload_modal')
