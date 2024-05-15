<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="order-listing">
            <thead>
            <tr>
                {{-- <th>Claim Type</th> --}}
                <th>Name</th>
                <th>Description</th>
                <th>Branch</th>
                <th>Documents</th>
                <th>Regional Manager Status (SUPERVISOR)</th>
                <th>Head Office Status (MD)</th>
                <th>Medical Team Status (HEALTH)</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            
            <tbody>
            @foreach($claimscompensations as $claimscompensation)
                <tr>
                    <td>{{$claimscompensation->claims? $claimscompensation->claims->name:'no type1 found'}}</td>
                    <td>{{ $claimscompensation->name }}</td>
                    <td>{{ $claimscompensation->description }}</td>
                    <td>{{ $claimscompensation->branch ? $claimscompensation->branch->branch_name : '' }}</td>
                    <td>
                        <img style="width: 50px;height: 50px" src="{{ url('storage/') }}{!! '/'.$claimscompensation->images !!}" alt="Image">
                    </td>
                    <td>
                        <p> @if (isset($claimscompensation->regional_manager_status) && $claimscompensation->regional_manager_status == 1)
                            <label class="badge badge-info">Approved</label>
                        @else
                            <label class="badge badge-danger">Unapproved</label>
                        @endif
                            </p>
                        </td>
                    <td>
                        <p> @if (isset($claimscompensation->head_office_status) && $claimscompensation->head_office_status == 1)
                            <label class="badge badge-info">Approved</label>
                        @else
                            <label class="badge badge-danger">Unapproved</label>
                        @endif
                            </p>
                        </td>
                    <td>
                        <p> @if (isset($claimscompensation->head_office_status) && $claimscompensation->head_office_status == 1)
                            <label class="badge badge-info">Approved</label>
                        @else
                            <label class="badge badge-danger">Unapproved</label>
                        @endif
                            </p>
                        {{ $claimscompensation->medical_team_status }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['claimscompensation.destroy', $claimscompensation->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('claimscompensation.show', [$claimscompensation->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('claimscompensation.edit', [$claimscompensation->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $claimscompensations])
        </div>
    </div>
</div>
