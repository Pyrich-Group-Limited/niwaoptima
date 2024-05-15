<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="order-listing">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Service</th>
                    <th class="min-w-200px">Name</th>
                    <th class="min-w-200px">Price</th>
                    <th class="min-w-200px">Metric</th>
                    <th class="min-w-200px">Sub-Service</th>
                    <th class="min-w-120px" colspan="1">Action</th>
                    <th class="min-w-200px text-end rounded-end"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipmentAndFees as $equipmentAndFee)
                    <tr class="fw-bold text-muted bg-light">
                        <td>{{ $equipmentAndFee->service ? $equipmentAndFee->service->name : '' }}</td>
                        <td>{{ $equipmentAndFee->name }}</td>
                        <td>{{ $equipmentAndFee->price }}</td>
                        <td>{{ enum_equipment_fees_metrics()[$equipmentAndFee->metric] }}</td>
                        <td>{{ $equipmentAndFee->subService ? $equipmentAndFee->subService->name : '' }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['equipmentAndFees.destroy', $equipmentAndFee->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('equipmentAndFees.show', [$equipmentAndFee->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('equipmentAndFees.edit', [$equipmentAndFee->id]) }}"
                                    class='btn btn-default btn-xs'>
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

    
</div>
