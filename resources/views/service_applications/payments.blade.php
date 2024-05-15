<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="service-applications-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Payment Type</th>
                    <th class="min-w-200px">Invoice Number</th>
                    <th class="min-w-200px">Remita RR</th>
                    <th class="min-w-200px">Amount</th>
                    <th class="min-w-200px">Payment Status</th>
                    <th class="min-w-200px">Payment Date</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($payments as $payment)
                    <tr class="fw-bold text-muted bg-light">
                        <td>{{ enum_payment_types()[$payment->payment_type] }}</td>
                        <td>{{ $payment->invoice_number }}</td>
                        <td>{{ $payment->rrr }}</td>
                        <td>&#8358;{{ number_format($payment->amount, 2) }}</td>
                        <td><span
                                class="tb-status text-{{ $payment->payment_status != 1 ? 'warning' : 'success' }}">{{ $payment->payment_status != 1 ? 'PENDING' : 'PAID' }}</span>
                        </td>
                        <td>{{ $payment->paid_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $payments])
        </div>
    </div>
</div>
