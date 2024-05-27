<!-- Name Field -->


<!-- Destination Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('destination', 'Destination:') !!}
    {!! Form::text('destination', null, ['class' => 'form-control']) !!}
</div>

<!-- NUMBER OF DAYS -->
<div class="form-group col-sm-6">
    {!! Form::label('number_days', 'NUMBER OF DAYS:') !!}
    {!! Form::number('number_days',null, ['class' => 'form-control ']) !!}
</div>
{{-- Travel date --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('travel_date', 'TRAVEL DATE:') !!}
    {!! Form::date('travel_date',null, ['class' => 'form-control ']) !!}
</div>
{{-- Arrival date --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('arrival_date', 'ARRIVAL DATE:') !!}
    {!! Form::date('arrival_date',null, ['class' => 'form-control ']) !!}
</div>
{{--  estimated expenses --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('estimated_expenses', 'ESTIMATED EXPENSES:') !!}
    {!! Form::text('estimated_expenses',null, ['class' => 'form-control']) !!}
</div>
{{-- purpose of travel --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('purpose_travel ', 'PURPOSE OF TRAVEL:') !!}
    {!! Form::textarea('purpose_travel',null, ['class' => 'form-control']) !!}
</div>
{{-- <div class="form-group col-sm-6 my-4">
    {!! Form::label('branch_id', 'Branch') !!}
    {!! Form::select('branch_id',$branches,null, ['class' => 'form-control form-control-solid border border-2']) !!}
</div> --}}

<!-- document fields -->
<div class="col-sm-4 my-5">
    <div class="form-group">
        {!! Form::label('uploaded_doc', 'Upload any file') !!}
        {!! Form::file('uploaded_doc', ['class' =>'form-control', 'id' => 'fileInput']) !!}
    </div>
</div>


<script>
    /* document.getElementById('fileInput').addEventListener('change', function() {
        const file = this.files[0];
        const maxSize = 1048576; // 1MB in bytes
        const allowedFormats = ['application/pdf'];
        
        if (file) {
            if (!allowedFormats.includes(file.type)) {
                alert('Please select a valid file format PDF.');
                this.value = ''; // Clear the file input
            } else if (file.size > maxSize) {
                alert('File size exceeds the maximum limit of 1MB.');
                this.value = ''; // Clear the file input
            }
        }
    }); */
</script>