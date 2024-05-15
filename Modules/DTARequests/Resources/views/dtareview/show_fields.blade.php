<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $dtarequests->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $dtarequests->description }}</p>
</div>

<!-- Branch Id Field -->
<div class="col-sm-12">
    {!! Form::label('branch_id', 'Branch:') !!}
    <p>{{ $dtarequests->branch ? $dtarequests->branch->branch_name : '' }}</p>
</div>

<!-- Images Field -->
<div class="col-sm-4">
    {!! Form::label('images', 'Image Document') !!}
    <div class="form-group">
        <p>
            <img style="width: 50px;height: 50px" src="{{ url('storage/') }}{!! '/'.$dtarequests->images !!}" alt="Image"></p>
    </div>
</div>

<!-- Regional Manager Status Field -->
<div class="col-sm-12">
    {!! Form::label('regional_manager_status', 'Regional Manager Status:') !!}
    <div class="">
        <p> @if (isset($dtarequests->regional_manager_status) && $dtarequests->regional_manager_status == 1)
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
        <p> @if (isset($dtarequests->head_office_status) && $dtarequests->head_office_status == 1)
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
        <p> @if (isset($dtarequests->medical_team_status) && $dtarequests->medical_team_status == 1)
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
    <p>{{ $dtarequests->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $dtarequests->updated_at }}</p>
</div>

