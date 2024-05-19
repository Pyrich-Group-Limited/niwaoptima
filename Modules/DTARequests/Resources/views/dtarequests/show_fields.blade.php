<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Destination:') !!}
    <p>{{ $dtarequests->destination }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Purpose of travel:') !!}
    <p>{{ $dtarequests->purpose_travel }}</p>
</div>

<!-- Branch Id Field -->
<div class="col-sm-12">
    {!! Form::label('branch_id', 'Branch:') !!}
    <p>{{ $dtarequests->branch ? $dtarequests->branch->branch_name : '' }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('department', 'Department:') !!}
    <p>{{ $dtarequests->department ? $dtarequests->department->name : '' }}</p>
</div>

<!-- Images Field -->
<div class="col-sm-4">
    {!! Form::label('images', 'PDF Document') !!}
    <div class="form-group">
        <p>
            <a target="_blank" href="{{ url('storage') }}{!! '/'.$dtarequests->uploaded_doc !!}" alt="PDF file">View PDF in browser</a></p>
    </div>
</div>

<!-- Regional Manager Status Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('regional_manager_status', 'Regional Manager Status:') !!}
    <div class="">
        <p> @if (isset($dtarequests->regional_manager_status) && $dtarequests->regional_manager_status == 1)
            <label class="badge badge-info">Approved</label>
        @else
            <label class="badge badge-danger">Unapproved</label>
        @endif
            </p>
    </div>
</div> --}}

<!-- Head Office Status Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('head_office_status', 'Head Office Status:') !!}
    <div class="">
        <p> @if (isset($dtarequests->head_office_status) && $dtarequests->head_office_status == 1)
            <label class="badge badge-info">Approved</label>
        @else
            <label class="badge badge-danger">Unapproved</label>
        @endif
            </p>
    </div>
</div> --}}

<!-- Medical Team Status Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('medical_team_status', 'Medical Team Status:') !!}
    <div class="">
        <p> @if (isset($dtarequests->medical_team_status) && $dtarequests->medical_team_status == 1)
            <label class="badge badge-info">Approved</label>
        @else
            <label class="badge badge-danger">Unapproved</label>
        @endif
            </p>
    </div>
</div> --}}

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
@if ($dtarequests->edited != 1)
<div class="col-md-6" style="margin-left: 0px;padding-left:0px;">
    <a title="Edit this DTA request" href="{{ route('dtarequests.edit', [$dtarequests->id]) }}"
        class='btn btn-primary btn-xs'>
         <i class="far fa-edit"></i> Edit Application
     </a>
</div>
@endif
