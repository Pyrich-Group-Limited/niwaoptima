@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="card-title">NIWA Payments </h4>
                </div>

            </div>
        </div>
    </section>

    <div class="content px-3">

        {{-- @include('layouts.messages') --}}

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Payments Table</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="datatable-init-export table" data-export-title="Export" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Applicant Name</th>
                                        <th>Payment Type</th>
                                        <th>Invoice Number</th>
                                        <th>Remita RR</th>
                                        <th>Amount</th>
                                        <th>Area Office</th>
                                        <th>Payment Status</th>
                                        <th>Payment Date</th>
                                        <th>Confirmation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>
                                                @if (!empty($payment->employer))
                                                    {{ $payment->employer->contact_firstname . ' ' . $payment->employer->contact_surname }}
                                                @endif
                                            </td>
                                            <td>{{ $payment->payment_type == 1 ? 'Registration Fee' : ($payment->payment_type == 4 ? 'Application Fee + Processing Fee' : 'Inspection Fee ' . $payment->contribution_year . ($payment->contribution_period == 'Monthly' ? ' (' . $payment->contribution_months . ' months)' : '')) }}
                                            </td>
                                            <td>{{ $payment->invoice_number }}</td>
                                            <td>{{ $payment->rrr }}</td>
                                            <td>&#8358;{{ number_format($payment->amount, 2) }}</td>
                                            <td>{{ isset($payment->branch) ? $payment->branch->branch_name : 'NILL' }}</td>
                                            <td><span
                                                    class="tb-status text-{{ $payment->payment_status != 1 ? 'warning' : 'success' }}">{{ $payment->payment_status != 1 ? 'PENDING' : 'PAID' }}</span>
                                            </td>
                                            <td>{{ $payment->paid_at }}</td>
                                            <td>
                                                <span
                                                    class="tb-status text-{{ $payment->approval_status == 0 ? 'warning' : ($payment->approval_status == 1 ? 'success' : 'danger') }}">
                                                    {{ $payment->approval_status == null ? 'Pending Approval' : ($payment->approval_status == 1 ? 'Approved' : 'Not Approved') }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($payment->payment_status == 1)
                                                    <form action="{{ route('approvePayment', $payment->id) }}"
                                                        method="post" id="approveForm{{ $payment->id }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        @if ($payment->approval_status != 1)
                                                            <a class="btn" href="#" title="Approve Payment"
                                                                onclick="confirmApprove({{ $payment->id }})">
                                                                <i class="fas fa-check-circle text-success"></i> Approve
                                                            </a>
                                                        @endif
                                                    </form>
                                                    <form action="{{ route('rejectPayment', $payment->id) }}"
                                                        method="post" id="rejectForm{{ $payment->id }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        @if ($payment->approval_status != 1)
                                                            <a class="btn" href="#" title="Reject Payment"
                                                                onclick="confirmReject({{ $payment->id }})">
                                                                <i class="fas fa-times-circle text-danger"></i> Reject
                                                            </a>
                                                        @endif
                                                    </form>
                                                @endif
                                            </td>


                                            <script>
                                                function confirmApprove(paymentId) {
                                                    var confirmation = window.confirm('Are you sure you want to approve this payment?');

                                                    if (confirmation) {
                                                        // If the user clicks "OK" in the confirmation dialog, submit the form
                                                        document.getElementById('approveForm' + paymentId).submit();
                                                    } else {
                                                        // If the user clicks "Cancel" in the confirmation dialog, do nothing
                                                    }
                                                }

                                                function confirmReject(paymentId) {
                                                    var confirmation = window.confirm('Are you sure you want to reject this payment?');

                                                    if (confirmation) {
                                                        // If the user clicks "OK" in the confirmation dialog, submit the form
                                                        document.getElementById('rejectForm' + paymentId).submit();
                                                    } else {
                                                        // If the user clicks "Cancel" in the confirmation dialog, do nothing
                                                    }
                                                }
                                            </script>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Display pagination links -->
                            {{ $payments->links() }}
                        </div>
                    </div>
                </div>
            </div><!-- .card-preview -->

        </div>
    </div>
@endsection
