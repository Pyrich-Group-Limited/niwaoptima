<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="employees-table">
            <thead>
            <tr class="fw-bold text-muted bg-light">
                <th class="min-w-200px">Employer Id</th>
                <th class="min-w-200px">Last Name</th>
                <th class="min-w-200px">First Name</th>
                <th class="min-w-200px">Middle Name</th>
                <th class="min-w-200px">Date Of Birth</th>
                <th class="min-w-200px">Gender</th>
                <th class="min-w-200px">Marital Status</th>
                <th class="min-w-200px">Email</th>
                <th class="min-w-200px">Employment Date</th>
                <th class="min-w-200px">Address</th>
                <th class="min-w-200px">Local Govt Area</th>
                <th class="min-w-200px">State Of Origin</th>
                <th class="min-w-200px">Phone Number</th>
                <th class="min-w-200px">Means Of Identification</th>
                <th class="min-w-200px">Identity Number</th>
                <th class="min-w-200px">Identity Issue Date</th>
                <th class="min-w-200px">Identity Expiry Date</th>
                <th class="min-w-200px">Next Of Kin</th>
                <th class="min-w-200px">Next Of Kin Phone</th>
                <th class="min-w-200px">Monthly Renumeration</th>
                <th class="min-w-200px">Status</th>
                <th class="min-w-120px" colspan="1">Action</th>
            	<th class="min-w-200px text-end rounded-end"></th>
				</tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->employer_id }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->middle_name }}</td>
                    <td>{{ $employee->date_of_birth }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->marital_status }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->employment_date }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->local_govt_area }}</td>
                    <td>{{ $employee->state_of_origin }}</td>
                    <td>{{ $employee->phone_number }}</td>
                    <td>{{ $employee->means_of_identification }}</td>
                    <td>{{ $employee->identity_number }}</td>
                    <td>{{ $employee->identity_issue_date }}</td>
                    <td>{{ $employee->identity_expiry_date }}</td>
                    <td>{{ $employee->next_of_kin }}</td>
                    <td>{{ $employee->next_of_kin_phone }}</td>
                    <td>{{ $employee->monthly_renumeration }}</td>
                    <td>{{ $employee->status }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('employees.show', [$employee->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('employees.edit', [$employee->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
