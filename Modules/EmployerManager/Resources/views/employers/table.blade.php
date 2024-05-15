<div class="card-body p-5">
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pending-tab" data-bs-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending Client</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="approved-tab" data-bs-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Approved Client</a>
    </li>
</ul>

{{-- in here i will put the various tabs --}}
<div class="tab-content" id="myTabContent">
    {{-- the start of pending staff --}}
<div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="employers-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Client Number</th>
                    <th class="min-w-200px">Area Office</th>
                    <th class="min-w-200px">Company Name</th>
                    <th class="min-w-200px">Company Email</th>
                    <th class="min-w-200px">Address</th>
                    <th class="min-w-200px">Rc Number</th>
                    <th class="min-w-200px">Company Phone</th>
                    <th class="min-w-200px">Local Govt</th>
                    <th class="min-w-200px">State</th>
                    <th class="min-w-200px">Business Area</th>
                    <th class="min-w-200px">Certificate Of Incorporation</th>
                    <th class="min-w-200px">Status</th>
                    <th class="min-w-200px">Payment Status</th>

                    <th class="min-w-120px" colspan="1">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($pendingstaff as $employer)
                    <tr>
                        <td>{{ $employer->ecs_number }}</td>
                        <td>{{ $employer->branch ? $employer->branch->branch_name : 'NILL' }}</td>
                        <td>{{ $employer->company_name }}</td>
                        <td>{{ $employer->company_email }}</td>
                        <td>{{ $employer->company_address }}</td>
                        <td>{{ $employer->company_rcnumber }}</td>
                        <td>{{ $employer->company_phone }}</td>
                        <td>
                            @if($employer->company_localgovt)
                            {{isset($employer->localGovernment->name) ? $employer->localGovernment->name : null
                                
                            }}
                            @else
                            Not Specified
                            @endif
                        </td>
                        <td>
                            @if($employer->company_state)
                            {{ $employer->state->name }}
                            @else
                            Not Specified
                            @endif
                        </td>
                        <td>{{ $employer->business_area }}</td>
                        <td><a href="{{ $employer->certificate_of_incorporation }}" target="_blank">Download Certificate of Incorporation</a>
                        </td>
                        <td>
                            @if ($employer->status == 1)
                                Registered
                            @else
                                Pending
                            @endif
                        </td>
                        <td>
                            @if ($employer->paid_registration == 1)
                            <span class="btn btn-sm btn-success">Paid</span>
                            @else
                            <span class="btn btn-sm btn-danger">Pending</span>
                            @endif
                        </td>

                        <td style="width: 120px">
                            {!! Form::open(['route' => ['employers.destroy', $employer->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('employers.show', [$employer->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('employers.edit', [$employer->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('employer.employees', [$employer->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-user"></i>
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
            @include('adminlte-templates::common.paginate', ['records' => $pendingstaff])
        </div>
    </div>
</div>

</div>
{{-- the end of pending staff --}}


<div class="tab-pane fade"  id="approved" role="tabpanel" aria-labelledby="approved-tab">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="employers-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Client Number</th>
                    <th class="min-w-200px">Area Office</th>
                    <th class="min-w-200px">Company Name</th>
                    <th class="min-w-200px">Company Email</th>
                    <th class="min-w-200px">Address</th>
                    <th class="min-w-200px">Rc Number</th>
                    <th class="min-w-200px">Company Phone</th>
                    <th class="min-w-200px">Local Govt</th>
                    <th class="min-w-200px">State</th>
                    <th class="min-w-200px">Business Area</th>
                    <th class="min-w-200px">Status</th>

                    <th class="min-w-120px" colspan="1">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($activestaff as $employer)
                    <tr>
                        <td>{{ $employer->ecs_number }}</td>
                        <td>{{ $employer->branch ? $employer->branch->branch_name : 'NILL' }}</td>
                        <td>{{ $employer->company_name }}</td>
                        <td>{{ $employer->company_email }}</td>
                        <td>{{ $employer->company_address }}</td>
                        <td>{{ $employer->company_rcnumber }}</td>
                        <td>{{ $employer->company_phone }}</td>
                        <td>
                            @if($employer->company_localgovt)
                            {{!empty($employer->localGovernment->name) ? $employer->localGovernment->name : null
                                
                            }}
                            @else
                            Not Specified
                            @endif
                        </td>
                        <td>
                            @if($employer->company_state)
                            {{ $employer->state->name }}
                            @else
                            Not Specified
                            @endif
                        </td>
                        <td>{{ $employer->business_area }}</td>
                        <td>
                            @if ($employer->status == 1)
                                Registered
                            @else
                                Pending
                            @endif
                        </td>

                        <td style="width: 120px">
                            {!! Form::open(['route' => ['employers.destroy', $employer->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('employers.show', [$employer->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('employers.edit', [$employer->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('employer.employees', [$employer->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-user"></i>
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
            @include('adminlte-templates::common.paginate', ['records' => $activestaff])
        </div>
    </div>
</div>
  
</div>

{{-- the end of the entire tab content --}}
</div>



   