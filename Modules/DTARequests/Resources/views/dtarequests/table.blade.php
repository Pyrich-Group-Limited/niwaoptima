<div class="card-body">
    <div class="card-title">DTA Request Table</div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table" id="order-listing">
                    <thead>
                        <tr>
                            {{-- <th> TRAVEL PURPOSE</th> --}}
                            <th>DESTINATION</th>
                            <th>NUMBER OF DAYS</th>
                            <th>TRAVEL DATE</th>
                            <th>ARRIVAL DATE</th>
                            <th>ESTIMATED EXPENSES</th>
                            {{-- <th>ACCOUNT OFFICER STATUS</th>
                            <th>HOD STATUS</th>
                            <th>MD STATUS</th>
                            <th>ACCOUNT STATUS</th>
                            <th>APPROVAL STATUS</th> --}}
                           {{--  <th>STATUS</th> --}}
                            {{-- <th>UPLOADED DOC</th> --}}
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dtarequests as $dtarequests)
                        <tr>
                            <td>{{ $dtarequests->destination }}</td>
                            <td>{{ $dtarequests->number_days }}</td>
                            <td>{{ $dtarequests->travel_date}}</td>
                            <td>{{ $dtarequests->arrival_date}}</td>
                            <td>₦{{ $dtarequests->estimated_expenses}}</td>
                           {{--  <td><p> @if (isset($dtarequests->supervisor_status) && $dtarequests->supervisor_status == 1)
                                <span class="btn btn-sm btn-success">Approved</span>
                            @else
                                <span class="btn btn-sm btn-danger">Unapproved</span>
                            @endif
                                </p>
                                </td>
                            <td>  <p> @if (isset($dtarequests->hod_status) && $dtarequests->hod_status == 1)
                                <span class="btn btn-sm btn-success">Approved</span>
                            @else
                                <span class="btn btn-sm btn-danger">Unapproved</span>
                            @endif
                                </p>
                                </td>
                            <td><p> @if (isset($dtarequests->md_status) && $dtarequests->md_status == 1)
                                <span class="btn btn-sm btn-success">Approved</span>
                            @else
                                <span class="btn btn-sm btn-danger">Unapproved</span>
                            @endif
                                </p>
                                </td>
                            <td><p> @if (isset($dtarequests->account_status) && $dtarequests->account_status == 1)
                                <span class="btn btn-sm btn-success">Approved</span>
                            @else
                                <span class="btn btn-sm btn-danger">Unapproved</span>
                            @endif
                                </p>
                                </td>
                            <td><p> @if (isset($dtarequests->approval_status) && $dtarequests->approval_status == 1)
                                <span class="btn btn-sm btn-success">Approved</span>
                            @else
                                <span class="btn btn-sm btn-danger">Unapproved</span>
                            @endif
                                </p>
                                </td>
         --}}                    {{-- <td>{{ $dtarequests->status}}</td> --}}
                            
                            
                            <td  style="width: 120px">
                               {{--  @hasanyrole('HOD|MD|ED FINANCE & ACCOUNT|SUPERVISOR|super-admin') --}}
                                {!! Form::open(['route' => ['dtarequests.destroy', $dtarequests->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('dtarequests.show', [$dtarequests->id]) }}"
                                       class='btn btn-default btn-xs'>
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a title="Approve this DTA request" href="{{ route('dtarequests.edit', [$dtarequests->id]) }}"
                                       class='btn btn-default btn-xs'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                    {{-- {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                                </div>
                                {!! Form::close() !!}
                               {{--  @endhasanyrole --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            {{-- @include('adminlte-templates::common.paginate', ['records' => $dtarequests]) --}}
        </div>
    </div>
</div>
