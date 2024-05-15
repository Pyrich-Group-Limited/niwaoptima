<div class="card-body p-5">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pending-tab" data-bs-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending Certificates</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="approved-tab" data-bs-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Approved Certificates</a>
    </li>
</ul>

{{-- in here i will put the various tabs --}}
<div class="tab-content" id="myTabContent">
    {{-- the start of pending staff --}}
<div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
    <div class="table-responsive">
        <table class="datatable-init-export nowrap table" data-export-title="Export">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Processing Status</th>
                    {{-- <th>Download Certificate</th> --}}
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pending as $certificate)
                    <tr>
                        <td>&#8358;{{ number_format($certificate->payment_fee, 2) }}</td>
                        <td><span
                                class="tb-status text-{{ $certificate->payment_status == 0 ? 'warning' : 'success' }}">{{ $certificate->payment_status == 0 ? 'NOT PAID' : 'PAID' }}</span>
                        </td>
                        <td><span
                                class="tb-status text-{{ $certificate->processing_status == 0 ? 'warning' : 'success' }}">{{ $certificate->processing_status == 0 ? 'PENDING' : 'DONE' }}</span>
                        </td>
                        {{-- <td><a href="{{ route('certificate.details', ['certificateId' => $certificate->id]) }}">View Certificate Details</a>
                        </td> --}}
                        {{-- <td>
                            <a href="/approval/request/timeline"><span class="nk-menu-icon text-info"><em
                                        class="icon ni ni-eye"></em></span></a>
                        </td> --}}
                        <td>
                            <a href="{{ route('certificate.approve', ['certificateId' => $certificate->id]) }}"
                               onclick="return confirm('Are you sure you want to approve this certificate?')">Approve</a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $pending])
        </div>
    </div>
</div>

</div>
{{-- the end of pending staff --}}


<div class="tab-pane fade"  id="approved" role="tabpanel" aria-labelledby="approved-tab">
    <div class="table-responsive">
        <table class="datatable-init-export nowrap table" data-export-title="Export">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Processing Status</th>
                    <th>Download Certificate</th>
                   {{--  <th>Manage</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($certificates as $certificate)
                    <tr>
                        <td>&#8358;{{ number_format($certificate->payment_fee, 2) }}</td>
                        <td><span
                                class="tb-status text-{{ $certificate->payment_status == 0 ? 'warning' : 'success' }}">{{ $certificate->payment_status == 0 ? 'NOT PAID' : 'PAID' }}</span>
                        </td>
                        <td><span
                                class="tb-status text-{{ $certificate->processing_status == 0 ? 'warning' : 'success' }}">{{ $certificate->processing_status == 0 ? 'PENDING' : 'DONE' }}</span>
                        </td>
                        <td><a href="{{ route('certificate.details', ['certificateId' => $certificate->id]) }}">View Certificate Details</a>
                        </td>
                        {{-- <td><a href="{{ route('certificate.approve', ['certificateId' => $certificate->id]) }}">Approve</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $certificates])
        </div>
    </div>
</div>
  
</div>

{{-- the end of the entire tab content --}}
</div>



   