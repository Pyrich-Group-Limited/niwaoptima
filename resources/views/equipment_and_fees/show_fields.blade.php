<!-- Service Id Field -->
<div class="col-sm-12">
    {!! Form::label('service_id', 'Service:') !!}
    <p>{{ $equipmentAndFee->service ? $equipmentAndFee->service->name : '' }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $equipmentAndFee->name }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $equipmentAndFee->price }}</p>
</div>

<!-- Metric Field -->
<div class="col-sm-12">
    {!! Form::label('metric', 'Metric:') !!}
    <p>{{ enum_equipment_fees_metrics()[$equipmentAndFee->metric] }}</p>
</div>

<!-- Sub Service Id Field -->
<div class="col-sm-12">
    {!! Form::label('sub_service_id', 'Sub-Service:') !!}
    <p>{{ $equipmentAndFee->subService ? $equipmentAndFee->subService->name : '' }}</p>
</div>


