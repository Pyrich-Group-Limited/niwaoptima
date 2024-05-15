<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="employees-table">
            <thead>
            <tr class="fw-bold text-muted bg-light">

                <th class="min-w-200px">Last Name</th>
                <th class="min-w-200px">First Name</th>
                <th class="min-w-200px">Middle Name</th>
                <th class="min-w-200px">Date Of Birth</th>
                <th class="min-w-200px">Gender</th>
                <th class="min-w-200px">Marital Status</th>
                <th class="min-w-200px">Email</th>
                <th class="min-w-200px">Employment Date</th>
                <th class="min-w-200px">Monthly Renumeration</th>
                <th class="min-w-200px">Status</th>
                <th class="min-w-120px" colspan="1">Action</th>
            															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->middle_name }}</td>
                    <td>{{ $employee->date_of_birth }}</td>
                    <td>
                        @if ($employee->gender == 1)
                            Male
                        @elseif($employee->gender == 2)
                            Female
                        @else
                            Others
                        @endif
                    </td>
                    <td>
                        @switch($employee->marital_status)
                            @case(1)
                                Single
                            @break

                            @case(2)
                                Married
                            @break

                            @case(3)
                                Separated
                            @break

                            @case(4)
                                Divorced
                            @break

                            @case(5)
                                Separated
                            @break

                            @default
                            Not Specified
                        @endswitch
                    </td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->employment_date }}</td>
                    <td>{{ $employee->monthly_renumeration }}</td>
                    <td>
                        @if ($employee->status == 1)
                            Registered
                        @else
                            Incomplete
                        @endif
                    </td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('employees.show', [$employee->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('employees.edit', [$employee->id]) }}" class='btn btn-default btn-xs'>
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
            @include('adminlte-templates::common.paginate', ['records' => $employees])
        </div>
    </div>
</div>
