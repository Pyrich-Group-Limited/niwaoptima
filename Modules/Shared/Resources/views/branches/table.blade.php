<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="branches-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Branch Name</th>
                    <th class="min-w-200px">Branch Region</th>
                    <th class="min-w-200px">Branch Code</th>
                    <th class="min-w-200px">Last Ecsnumber</th>
                    <th class="min-w-200px">Highest Rank</th>
                    <th class="min-w-200px">Staff Strength</th>
                    <th class="min-w-200px">Managing Id</th>
                    <th class="min-w-200px">Branch Email</th>
                    <th class="min-w-200px">Branch Phone</th>
                    <th class="min-w-200px">Branch Address</th>
                    <th class="min-w-120px" colspan="1">Action</th>
                															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
            </thead>
            <tbody>
                @foreach ($branches as $branch)
                    <tr>
                        <td>{{ $branch->branch_name }}</td>
                        <td> {{ !empty($branch->region->name) ? $branch->region->name  : 'NILL' }}</td>
                        <td>{{ $branch->branch_code }}</td>
                        <td>{{ $branch->last_ecsnumber }}</td>
                        <td>{{ getRanks()[$branch->highest_rank] }}</td>
                        <td>{{ $branch->staff_strength }}</td>
                        <td>{{ $branch->manager ? $branch->manager->email : '' }}</td>
                        <td>{{ $branch->branch_email }}</td>
                        <td>{{ $branch->branch_phone }}</td>
                        <td>{{ $branch->branch_address }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['branches.destroy', $branch->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('branches.show', [$branch->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('branches.edit', [$branch->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {{-- {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!} --}}
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
            @include('adminlte-templates::common.paginate', ['records' => $branches])
        </div>
    </div>
</div>
