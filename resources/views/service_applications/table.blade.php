<div class="content px-3 mb-10">
    <div class="clearfix"></div>
    <div class="card-body p-5">
        <form method="GET" action="{{ route('serviceApplications.index') }}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table align-middle gs-0 gy-4" id="order-listing123">
                    <thead>
                        <tr>
                            <th>S/N</th>
                    <th class="min-w-100px">Client</th>
                    <th class="">Service</th>
                    <th class="">Application Form Payment Status</th>
                    <th class="">Date Of Inspection</th>
                    <th class="">Service Type</th>
                    <th class="">Status Summary</th>
                    @if (auth()->user()->staff && auth()->user()->staff->branch_id == 1)
                    <th class="">Zone/Units/Axis</th>
                    @endif
                    <th class="">Created</th>
                    <th class="" colspan="1">Action</th>
                    <th class="text-end rounded-end"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($serviceApplications  as $index => $serviceApplication)
                <tr>
                    <td>{{ $index + 1 }}</td>
                        <td>{{$serviceApplication->employer ? $serviceApplication->employer->company_name : 'NILL'}}</td>
                        <td>{{ $serviceApplication->theservice ? $serviceApplication->theservice->name : '' }}</td>
                        <td>{{ $serviceApplication->application_form_payment_status ? 'Paid' : 'Not Paid' }}</td>
                        <td>{{ $serviceApplication->date_of_inspection }}</td>
                        <td>{{ $serviceApplication->processingType ? $serviceApplication->processingType->name : '' }}</td>
                        <td>{{ $serviceApplication->status_summary }}</td>
                        @if (auth()->user()->staff && auth()->user()->staff->branch_id == 1)
                        <td>{{ $serviceApplication->axis ? $serviceApplication->axis->name : '' }}</td>
                        @endif
                        <td>{{ $serviceApplication->created_at }}</td>
                        <td style="width: 120px">
                            <div class='btn-group'>
                                <a href="{{ route('serviceApplications.show', [$serviceApplication->id]) }}"
                                    class='btn btn-default btn-xs' title="View & Make Service Approvals">
                                    <i class="far fa-eye"></i>
                                </a>
                            </div>
                            <div class='btn-group'>
                                <a href="{{ route('map.show', [$serviceApplication->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="fa fa-map-marker"></i>
                                </a>
                            </div>
                        </td>
                        <th class=" text-end rounded-end"></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>{{ $serviceApplications->links() }}</div>
</div>

    
</div>
