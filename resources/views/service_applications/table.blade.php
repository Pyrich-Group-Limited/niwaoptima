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
                    <th class="min-w-100px">Client..</th>
                    <th class="">Service</th>
                    <th class="">Application Form Payment Status</th>
                    <th class="">Date Of Inspection</th>
                    <th class="">Service Type</th>
                    <th class="">Status Summary</th>
                    @if (auth()->user()->staff && auth()->user()->staff->branch_id == 1)
                    <th class="">Zone/Units/Axis</th>
                    @endif
                    <th class="">Created At</th>
                    <th>Expired At</th>
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
                        <td>{{ date('d M, Y', strtotime($serviceApplication->created_at)); }}</td>
                        <td>{{ $serviceApplication->expiry_date ? date('d M, Y', strtotime($serviceApplication->expiry_date)) : 'NILL'; }}</td>
                        <td style="width: 120px">
                            <div class='btn-group'>
                                <a href="{{ route('serviceApplications.show', [$serviceApplication->id]) }}"
                                    class='btn btn-default btn-xs' title="View & Make Service Approvals">
                                    <i class="far fa-eye"></i>
                                </a>
                            </div>
                            @if (auth()->user()->level_id == 3)
                            <div class='btn-group'>
                                <a class="open-modal-shareuser123 btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#shareuserModal"
                                data-shareuser123={{ $serviceApplication->id }} title="View & Assign to a staff">
                                    <i class="far fa-user"></i>
                                </a>
                            </div>
                            @endif
                            {{-- <div class='btn-group'>
                                <a href="{{ route('map.show', [$serviceApplication->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="fa fa-map-marker"></i>
                                </a>
                            </div> --}}
                        </td>
                        <th class=" text-end rounded-end"></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>{{ $serviceApplications->links() }}</div>
</div>

<div class="modal fade" id="shareuserModal" tabindex="-1" role="dialog" aria-labelledby="shareuserModalLabel"
aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            {!! Form::open(['route' => 'assign.permissions', 'enctype' => 'multipart/form-data']) !!}
        @csrf
            <div class="modal-header">
                <h5 class="modal-title">Assign To Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    {!! Form::label('user_id', 'Select Staff:') !!}
                    {!! Form::select('user_id', $users, null, ['class' => 'form-control', 'id' => 'userSelect', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('role_id', 'Select Role:') !!}
                    {!! Form::select('role_id', $roles, null, ['class' => 'form-control', 'id' => 'roleSelect', 'required']) !!}
                    {!! Form::hidden('shareuser_id', null, ['id' => 'shareuser_id123']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('permissions[]', 'Permissions:') !!}
                    <div class="flex flex-wrap justify-start mb-4">
                        <div class="row">
                
                  @if($groupedPermissions)
                            @foreach ($groupedPermissions as $groupName => $permissions)
                            <div class="row">
                                <h4 class="mb-3 mt-5">{{ $groupName }}</h4>
                                 @foreach ($permissions as $permission)
                                    <div class="col-6 mb-3">
                                        {!! Form::checkbox('permissions[]', $permission->id, $permission->assigned, [
                                            'class' => 'form-checkbox h-4 w-4 ' . $groupName, // Added group name as a class
                                        ]) !!}
                                        <span class="">{{ $permission->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        @endif
                
                        </div>
                    </div>
               

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
            {!! Form::close() !!}
        </div>
      
    </div>
</div>
</div>
@push('page_scripts')
<script>
    $(document).on("click", ".open-modal-shareuser123", function() {
        let shareuser = $(this).data('shareuser123');
        $(".modal-body #shareuser_id123").val(shareuser);
    });
    $(document).ready(function() {
       $('.check-all-link').click(function(e) {
           e.preventDefault();
           var groupName = $(this).data('group');
           var groupCheckboxes = $('.' + groupName);

           // Check if any checkbox in the group is checked
           var anyChecked = groupCheckboxes.is(':checked');

           // Toggle the checked state of all checkboxes in the group
           groupCheckboxes.prop('checked', !anyChecked);
       });
   });
</script>    
@endpush