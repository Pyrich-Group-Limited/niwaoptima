<div class="container mt-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link text-primary active" id="tab1-tab" href="#allstaff" data-bs-toggle="tab" role="tab"
                aria-controls="tab1" aria-selected="true">APPROVED STAFF</a>
        </li>


        <li class="nav-item" role="presentation">
            <a class="nav-link " id="tab2-tab" href="#pending" role="tab" data-bs-toggle="tab" aria-controls="tab2"
                aria-selected="false"> PENDING STAFF </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link text-primary" href="#approve" data-bs-toggle="tab">Approved Staff</a>
        </li> --}}
    </ul>

    <div class="tab-content" id="myTabContent">

        <!-- All Staff Table -->
        <div class="tab-pane fade show active" id="allstaff" role="tabpanel" aria-labelledby="tab1-tab">
            <div class="table-responsive">
                <table class="table mt-3 table-striped table-hover table-bordered" id="mytable1">
                    <thead>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col"> Role</th>
                            <th scope="col"> Department</th>
                            <th scope="col">Area Office</th>
                            {{-- <th scope="col">Approval Status</th> --}}
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $p)
                            <tr>
                                <td>{!! $p->first_name . ' ' . $p->middle_name . ' ' . $p->last_name !!}</td>
                                <td>{!! $p->email !!}</td>

                                <td>
                                    @if ($p->role)
                                        {!! $p->role !!}
                                    @else
                                        <span>No role yet</span>
                                    @endif

                                </td>

                                <td>{!! $p->name !!}</td>
                                <td>{!! $p->branch_name !!}</td>
                                {{-- <td>
                                 @if (isset($p->status) && $p->status == 1)
                                    <span class="btn btn-sm btn-success"><i class="fas fa-check "></i></span>
                                @else
                                    <span class="btn btn-sm btn-danger"><i class="fas fa-times "></i></i></span>
                                @endif
                            </td> --}}
                                <td style="width: 120px">
                                    {!! Form::open(['route' => ['users.destroy', $p->id], 'method' => 'delete']) !!}
                                    <div class='btn-group' id="aa">

                                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#abel">

                                        <i class="far fa-eye"></i>
                                    </button> --}}

                                        <button type="button" class="btn btn-primary btn-show-user"
                                            data-bs-toggle="modal" data-bs-target="#userModal"
                                            data-fullname="{{ $p->first_name . ' ' . $p->middle_name . ' ' . $p->last_name }}"
                                            data-email="{{ $p->email }}" data-role="{{ $p->role }}"
                                            data-department="{{ $p->name }}" data-branch="{{ $p->branch_name }}">
                                            <i class="far fa-eye"></i>
                                        </button>

                                        {{-- <a href="{{ route('users.show', [$p->id]) }}" class='btn btn-default btn-xs'>
                                    </a> --}}
                                        <a href="{{ route('users.edit', [$p->id]) }}" class='btn btn-default btn-xs'>
                                            <i class="far fa-edit"></i>
                                        </a>
                                        {{-- <i class="click-icon fas fa-chevron-down"></i> --}}
                                        {{-- <a href="{{ route('myedit', [$p->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="fas fa-toggle-on text-bg-secondary" title="change status" ></i>
                                    </a> --}}
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
                <div class="card-footer clearfix">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $users])
                    </div>
                </div>
            </div>
        </div>


        {{-- @include('users.show');  --}}

        <!-- PENDING Table -->
        <div class="tab-pane fade " id="pending" role="tabpanel" aria-labelledby="tab2-tab">
            <div class="table-responsive">
                <table class="table mt-3 table-striped table-hover table-bordered" id="mytable2">
                    <thead>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col"> Role</th>
                            <th scope="col"> Department</th>
                            <th scope="col">Branch</th>

                            <th scope="col">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($norole as $p)
                            <tr>
                                <td>{!! $p->first_name . ' ' . $p->middle_name . ' ' . $p->last_name !!}</td>
                                <td>{!! $p->email !!}</td>

                                <td>Not yet assigned a role</td>

                                <td>{!! $p->name !!}</td>
                                <td>{!! $p->branch_name !!}</td>

                                <td style="width: 120px">
                                    {!! Form::open(['route' => ['users.destroy', $p->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <button type="button" class="btn btn-primary btn-show-user"
                                            data-bs-toggle="modal" data-bs-target="#userModal"
                                            data-fullname="{{ $p->first_name . ' ' . $p->middle_name . ' ' . $p->last_name }}"
                                            data-email="{{ $p->email }}" data-role="{{ $p->role }}"
                                            data-department="{{ $p->name }}" data-branch="{{ $p->branch_name }}">
                                            <i class="far fa-eye"></i>
                                        </button>
                                        <a href="{{ route('users.edit', [$p->id]) }}" class='btn btn-default btn-xs'>
                                            <i class="far fa-edit"></i>
                                        </a>

                                        {{-- <a href="{{ route('myedit', [$p->id]) }}" class='btn btn-default btn-xs'>
                                <i class="fas fa-toggle-on text-bg-secondary" title="change status" ></i>
                            </a> --}}
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
                <div class="card-footer clearfix">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $norole])
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">User Details</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Full Name:</strong> <span id="modalFullName"></span></p>
                        <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                        <p><strong>Role:</strong> <span id="modalRole"></span></p>
                        <p><strong>Department:</strong> <span id="modalDepartment"></span></p>
                        <p><strong>Branch:</strong> <span id="modalBranch"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#mytable1').DataTable();
                $('#mytable2').DataTable();
            });


            //
        </script>


    </div>
</div>
<script>
    $('.btn-show-user').on('click', function() {
        var fullName = $(this).data('fullname');
        var email = $(this).data('email');
        var role = $(this).data('role');
        var department = $(this).data('department');
        var branch = $(this).data('branch');

        $('#modalFullName').text(fullName);
        $('#modalEmail').text(email);
        $('#modalRole').text(role);
        $('#modalDepartment').text(department);
        $('#modalBranch').text(branch);

        $('#userModal').modal('show');
    });
</script>
