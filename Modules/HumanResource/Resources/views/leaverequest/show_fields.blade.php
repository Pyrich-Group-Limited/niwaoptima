<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('statf_id', 'STAFF ID:') !!}
    <p>{{ $leaverequest->id }}</p>
</div>

<!-- NUMBER OF DAYS Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', 'PHONE NUMBER:') !!}
    <p>{{ $leaverequest->phone_number}}</p>
</div>

<!--  TYPE OF  LEAVE  Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'TYPE OF LEAVE:') !!}
    <p>{{ $leaverequest->type ? $leaverequest->leavetype->name:'' }}</p>
</div>

<!--  END OF LEAVE Field -->
<div class="col-sm-12">
    {!! Form::label('end_date', 'END OF LEAVE:') !!}
    <p>{{ $leaverequest->end_date}}</p>
</div>

<!-- Branch Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('staff', 'Branch:') !!}
    <p>{{ $leaverequest->staff_id ? $leaverequest->staff_id->user_id : '' }}</p>
</div> --}}

<!-- signature_path Field -->
<div class="col-sm-4">
    {!! Form::label('signature_path', 'PDF SIGNATURE Document') !!}
    <div class="form-group">
        <p>
            <img style="width: 50px;height: 50px" src="{{ url('storage/') }}{!! '/'.$leaverequest->signature_path !!}" alt="SIGNATURE"></p>
    </div>
</div>

<!-- SUPERVISOR  STATUS Field -->
<div class="col-sm-12">
    {!! Form::label('supervisor_office', 'SUPERVISOR  STATUS:') !!}
    <div class="">
        <p> @if (isset($leaverequest->supervisor_office) && $leaverequest->supervisor_office == 1)
            <label class="badge badge-info">Approved</label>
        @else
            <label class="badge badge-danger">Unapproved</label>
        @endif
            </p>
    </div>
</div>

<!-- MD HR Field -->
<div class="col-sm-12">
    {!! Form::label('md_hr', 'MD HR:') !!}
    <div class="">
        <p> @if (isset($leaverequest->md_hr) && $leaverequest->md_hr == 1)
            <label class="badge badge-info">Approved</label>
        @else
            <label class="badge badge-danger">Unapproved</label>
        @endif
            </p>
    </div>
</div>

<!-- LEAVE_OFFICE Field -->
<div class="col-sm-12">
    {!! Form::label('leaver_officer', 'LEAVE_OFFICE:') !!}
    <div class="">
        <p> @if (isset($leaverequest->leaver_officer) && $leaverequest->leaver_officer == 1)
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
    <p>{{ $leaverequest->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $leaverequest->updated_at }}</p>
</div>

