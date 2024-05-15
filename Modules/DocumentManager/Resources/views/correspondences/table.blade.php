<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="correspondences-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Subject</th>
                    <th class="min-w-200px">Date</th>
                    <th class="min-w-200px">Sender</th>
                    <th class="min-w-200px">Document URL</th>
                    <th class="min-w-200px">Assign</th>
                    <th class="min-w-200px">View Assignment</th>
                    <th class="min-w-200px">Reference Number</th>
                    <th class="min-w-200px">Description</th>
                    <th class="min-w-120px" colspan="1">Action</th>
                    <th class="min-w-200px text-end rounded-end"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($correspondences as $correspondence)
                    @php
                        $latestDocumentUrl = $correspondence->document
                            ->documentVersions()
                            ->latest()
                            ->first()
                            ? $correspondence->document
                                ->documentVersions()
                                ->latest()
                                ->first()->document_url
                            : '#';
                    @endphp
                    <tr class="fw-bold text-muted bg-light">
                        <td>{{ $correspondence->subject }}</td>
                        <td>{{ $correspondence->date }}</td>
                        <td>{{ $correspondence->sender }}</td>
                        <td><a target="_blank" href="{{ asset($latestDocumentUrl) }}">View</a>
                        </td>
                        <td style="width: 120px;">
                            <div class="btn-group" role="group">
                                @can('assign correspondence to department')
                                    <a class="open-modal-departments btn btn-primary" href="#" data-toggle="modal"
                                        data-target="#assignToDepartmentsModal"
                                        data-correspondence={{ $correspondence->id }}>Departments</a>
                                @endcan
                                @can('assign correspondence to users')
                                    <a class="open-modal-users btn btn-secondary" href="#" data-toggle="modal"
                                        data-target="#assignToUsersModal"
                                        data-correspondence={{ $correspondence->id }}>Users</a>
                                @endcan
                            </div>
                        </td>
                        <td style="width: 120px;">
                            <div class="btn-group" role="group">
                                @can('read department-correspondence memo Assigned')
                                    <a class="btn btn-primary"
                                        href="{{ route('correspondences.assignedDepartments', [$correspondence->id]) }}">Departments</a>
                                @endcan
                                @can('read user-correspondence  memo Assigned')
                                    <a class="btn btn-secondary"
                                        href="{{ route('correspondences.assignedUsers', [$correspondence->id]) }}">Users</a>
                                @endcan
                            </div>
                        </td>
                        <td>{{ $correspondence->reference_number }}</td>
                        <td>{{ $correspondence->description }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['correspondences.destroy', $correspondence->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('correspondences.show', [$correspondence->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('correspondences.correspondenceVersions.index', [$correspondence->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="fa fa-code-fork"></i>
                                </a>
                                @can('add comment to correspondence')
                                    <a class="open-modal-comments btn btn-default btn-xs" href="#" data-toggle="modal"
                                        data-target="#addCommentsModal" data-correspondence={{ $correspondence->id }}>
                                        <i class="far fa-comments"></i>
                                    </a>
                                @endcan
                                <a href="{{ route('correspondences.edit', [$correspondence->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $correspondences])
        </div>
    </div>
</div>

@include('documentmanager::correspondences.assign_to_departments_modal')
@include('documentmanager::correspondences.assign_to_users_modal')
@include('documentmanager::correspondences.add_comments_modal')

@push('page_scripts')
    {{-- @if ($errors->has('subject') || $errors->has('answer_1') || $errors->has('answer_2') || $errors->has('answer_3'))
        <script>
            $('#feedbackModal').modal();
        </script>
    @endif --}}

    <script>
        $(document).on("click", ".open-modal-users", function() {
            let correspondenceId = $(this).data('correspondence');
            $(".modal-body #user_correspondence_id").val(correspondenceId);
        });

        $(document).on("click", ".open-modal-departments", function() {
            let correspondenceId = $(this).data('correspondence');
            $(".modal-body #department_correspondence_id").val(correspondenceId);
        });

        $(document).on("click", ".open-modal-comments", function() {
            let correspondenceId = $(this).data('correspondence');

            if (correspondenceId) {
                // Make the AJAX request
                $.ajax({
                    url: "{{ url('api/documentmanager/correspondences') }}" + '/' + correspondenceId,
                    method: 'GET',
                    success: function(response) {
                        var comments = response.data.comments;

                        // Fill the 'comments' input field with the response value
                        $('#comments_field').val(comments);
                    },
                    error: function() {
                        // Handle the error case
                        console.error('Failed to retrieve correspondence data.');
                    }
                });
            }
            $(".modal-body #comment_correspondence_id").val(correspondenceId);
        });
    </script>
@endpush
