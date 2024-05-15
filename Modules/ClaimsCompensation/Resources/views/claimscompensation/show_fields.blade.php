<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $claimscompensations->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $claimscompensations->description }}</p>
</div>

<!-- Branch Id Field -->
<div class="col-sm-12">
    {!! Form::label('branch_id', 'Branch:') !!}
    <p>{{ $claimscompensations->branch ? $claimscompensations->branch->branch_name : '' }}</p>
</div>

<!-- Images Field -->
<div class="col-sm-4">
    {!! Form::label('images', 'Image Document') !!}
    <div class="form-group">
        <p>
            <img style="width: 50px;height: 50px" src="{{ url('storage/') }}{!! '/'.$claimscompensations->images !!}" alt="Image"></p>
    </div>
</div>

<!-- Regional Manager Status Field -->
<div class="col-sm-12">
    {!! Form::label('regional_manager_status', 'Regional Manager Status:') !!}
    <div class="">
        <p> @if (isset($claimscompensations->regional_manager_status) && $claimscompensations->regional_manager_status == 1)
            <label class="badge badge-info">Approved</label>
        @else
            <label class="badge badge-danger">Unapproved</label>
        @endif
            </p>
    </div>
</div>

<!-- Head Office Status Field -->
<div class="col-sm-12">
    {!! Form::label('head_office_status', 'Head Office Status:') !!}
    <div class="">
        <p> @if (isset($claimscompensations->head_office_status) && $claimscompensations->head_office_status == 1)
            <label class="badge badge-info">Approved</label>
        @else
            <label class="badge badge-danger">Unapproved</label>
        @endif
            </p>
    </div>
</div>

<!-- Medical Team Status Field -->
<div class="col-sm-12">
    {!! Form::label('medical_team_status', 'Medical Team Status:') !!}
    <div class="">
        <p> @if (isset($claimscompensations->medical_team_status) && $claimscompensations->medical_team_status == 1)
            <label class="badge badge-info">Approved</label>
        @else
            <label class="badge badge-danger">Unapproved</label>
        @endif
            </p>
    </div>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $claimscompensations->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $claimscompensations->updated_at }}</p>
</div>

