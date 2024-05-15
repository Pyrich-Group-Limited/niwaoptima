<!-- Branch Name Field -->
<div class="col-sm-12">
    {!! Form::label('branch_name', 'Branch Name:') !!}
    <p>{{ $branch->branch_name }}</p>
</div>

<!-- Branch Region Field -->
<div class="col-sm-12">
    {!! Form::label('branch_region', 'Branch Region:') !!}
    <p>{{ !empty($branch->region->name) ? $branch->region->name  : 'NILL' }}</p>
</div>

<!-- Branch Code Field -->
<div class="col-sm-12">
    {!! Form::label('branch_code', 'Branch Code:') !!}
    <p>{{ $branch->branch_code }}</p>
</div>

<!-- Last Ecsnumber Field -->
<div class="col-sm-12">
    {!! Form::label('last_ecsnumber', 'Last Ecsnumber:') !!}
    <p>{{ $branch->last_ecsnumber }}</p>
</div>

<!-- Highest Rank Field -->
<div class="col-sm-12">
    {!! Form::label('highest_rank', 'Highest Rank:') !!}
    <p>{{ getRanks()[$branch->highest_rank] }}</p>
</div>

<!-- Staff Strength Field -->
<div class="col-sm-12">
    {!! Form::label('staff_strength', 'Staff Strength:') !!}
    <p>{{ $branch->staff_strength }}</p>
</div>

<!-- Managing Id Field -->
<div class="col-sm-12">
    {!! Form::label('managing_id', 'Managing Id:') !!}
    <p>{{ $branch->manager ? $branch->manager->email : '' }}</p>
</div>

<!-- Branch Email Field -->
<div class="col-sm-12">
    {!! Form::label('branch_email', 'Branch Email:') !!}
    <p>{{ $branch->branch_email }}</p>
</div>

<!-- Branch Phone Field -->
<div class="col-sm-12">
    {!! Form::label('branch_phone', 'Branch Phone:') !!}
    <p>{{ $branch->branch_phone }}</p>
</div>

<!-- Branch Address Field -->
<div class="col-sm-12">
    {!! Form::label('branch_address', 'Branch Address:') !!}
    <p>{{ $branch->branch_address }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $branch->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $branch->updated_at }}</p>
</div>
