<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="memos-table">
            <thead>
                <tr>
                    <th>Title</th>
                    {{-- <th>Description</th> --}}
                    <th>Created By</th>
                    <th>Document URL</th>
                    <th>Assign</th>
                    <th>View Assignment</th>
                    <th>Created At</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memos as $memo)
                    @php
                        $latestDocumentUrl = $memo->document
                            ->documentVersions()
                            ->latest()
                            ->first()
                            ? $memo->document
                                ->documentVersions()
                                ->latest()
                                ->first()->document_url
                            : '#';
                    @endphp
                    <tr>
                        <td>{{ $memo->title }}</td>
                        {{-- <td>{{ $memo->description }}</td> --}}
                        <td>{{ $memo->createdBy ? $memo->createdBy->email : '' }}</td>
                        <td><a target="_blank" href="{{ asset($latestDocumentUrl) }}">View</a>
                        </td>
                        <td style="width: 120px;">
                            <div class="btn-group" role="group">
                                <a class="open-modal-departments btn btn-primary" href="#" data-toggle="modal"
                                    data-target="#assignToDepartmentsModal"
                                    data-memo={{ $memo->id }}>Departments</a>
                                <a class="open-modal-users btn btn-secondary" href="#" data-toggle="modal"
                                    data-target="#assignToUsersModal" data-memo={{ $memo->id }}>Users</a>
                            </div>
                        </td>
                        <td style="width: 120px;">
                            <div class="btn-group" role="group">
                                <a class="btn btn-primary" href="{{ route('memos.assignedDepartments', [$memo->id]) }}">Departments</a>
                                <a class="btn btn-secondary" href="{{ route('memos.assignedUsers', [$memo->id]) }}">Users</a>
                            </div>
                        </td>
                        <td>{{ $memo->created_at }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['memos.destroy', $memo->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('memos.show', [$memo->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('memos.memoVersions.index', [$memo->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="fa fa-code-fork"></i>
                                </a>
                                <a href="{{ route('memos.edit', [$memo->id]) }}" class='btn btn-default btn-xs'>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $memos])
        </div>
    </div>
</div>


@include('documentmanager::memos.assign_to_departments_modal')
@include('documentmanager::memos.assign_to_users_modal')


@push('page_scripts')
    {{-- @if ($errors->has('subject') || $errors->has('answer_1') || $errors->has('answer_2') || $errors->has('answer_3'))
        <script>
            $('#feedbackModal').modal();
        </script>
    @endif --}}

    <script>
        $(document).on("click", ".open-modal-users", function() {
            let memoId = $(this).data('memo');
            $(".modal-body #user_memo_id").val(memoId);
        });

        $(document).on("click", ".open-modal-departments", function() {
            let memoId = $(this).data('memo');
            $(".modal-body #department_memo_id").val(memoId);
        });
    </script>
@endpush
