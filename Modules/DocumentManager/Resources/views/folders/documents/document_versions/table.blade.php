<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="document-versions-table">
            <thead>
            <tr class="fw-bold text-muted bg-light">
                <th class="min-w-200px">Version Number</th>
                <th class="min-w-200px">Document Url</th>
                <th class="min-w-200px">Created By</th>
                <th class="min-w-120px" colspan="1">Action</th>
            															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
            </thead>
            <tbody>
            @foreach($documentVersions as $documentVersion)
                <tr>
                    <td>{{ $documentVersion->version_number }}</td>
                    <td><a target="_blank" href="{{ asset($documentVersion->document_url) }}">View</a></td>
                    <td>{{ $documentVersion->createdBy ? $documentVersion->createdBy->email : '' }}</td>
                    <td  style="width: 120px">
                        <div class='btn-group'>
                            <a href="{{ asset($documentVersion->document_url) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                        </div>
                    </td>
                															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $documentVersions])
        </div>
    </div>
</div>
