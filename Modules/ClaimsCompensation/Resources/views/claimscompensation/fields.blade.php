{{-- COMPANY NAME --}}

{{-- <div class="form-group col-sm-6">
    {!! Form::label('company_name', 'COMPANY NAME:') !!}
    {!! Form::text('company_name', , null, ['class' => 'form-control form-control-md required']) !!}
</div> --}}
<div class="card">
    <div class="card-body mb-6">
        <h1>EMPLOYER NAME : {{$employer->company_name}} </h1>
        <h1>COMPANY ADDRESS : {{$employer->company_address}} </h1>
        <h1>COMPANY  EMAIL : {{$employer->company_email}} </h1>
        
    </div>
</div>



<div class="d-flex flex-column col-md-6 mb-2 fv-row">
    {!! Form::label('claimstype_id', 'TYPE OF CLAIM') !!}
    {!! Form::select('claimstype_id', $claimstype, null, ['class' => 'form-control form-control-solid border border-2 form-select']) !!}
</div>




<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name Of Employee :') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>
{{-- the claimstype --}}


<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch:') !!}
    {!! Form::select('branch_id', $branches, null, ['class' => 'form-control form-control-solid border border-2 form-select']) !!}
</div>

<!-- Image Field -->
<div class="col-sm-4">
    {!! Form::label('images', 'Image Document') !!}
    <div class="form-group">
    {!! Form::file('images',null, ['class' => 'form-control','accept' => 'image/*']) !!}
    </div>
    <?php $claimscompensation = isset($claimscompensations->images) ? $claimscompensations->images : ""; ?>
    <img style="width: 100%;height: 150px" src="{{ url('storage/') }}{!! '/'.$claimscompensation !!}" alt="Image document">
</div>

@role('SUPERVISOR')
<!-- Regional Manager Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regional_manager_status', 'Regional Manager Status') !!}
    <div class="">
    {!! Form::radio('regional_manager_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('regional_manager_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
@endrole
@role('MD')
<!-- Head Office Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('head_office_status', 'Head Office Status') !!}
    <div class="">
    {!! Form::radio('head_office_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('head_office_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
@endrole
@role('HEALTH')
<!-- Medical Team Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medical_team_status', 'Medical Team Status') !!}
    <div class="">
    {!! Form::radio('medical_team_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('medical_team_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
@endrole