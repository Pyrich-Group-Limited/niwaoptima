
<div class="alert alert-danger d-none" id="notificationAlert" role="alert">
    <!-- Notification message will be displayed here -->
</div>
 


    {{-- <div class="form-group col-sm-6">
        {!! Form::label('type', 'SELECT LEAVE TYPE:') !!}
        {!! Form::select('type', $leavetype->pluck('name','id'), null, ['class' => 'form-control form-select', 'required','id'=>'leave_type','readonly'=>true]) !!}
    
    </div> --}}
    <div class="form-group col-sm-6">
        {!! Form::label('type', 'SELECT LEAVE TYPE:') !!}
        {!! Form::text('type',  $LeaveRequest->leavetype->name ??  null,  ['class' => 'form-control ', 'required','id'=>'leave_type','readonly'=>true]) !!}
    
    </div>



    
    {{-- <div class="form-group col-sm-6">
        {!! Form::label('date_start_new', 'DATE REQUESTED TO COMMENCE PRESENT LEAVE:') !!}
        {!! Form::text('date_start_new',  $LeaveRequest->pluck('date_start_new','id') ??   null, ['class' => 'form-control ','id'=>'date_start']) !!}
    </div> --}}
    <div class="form-group col-sm-6">
        {!! Form::label('date_start_new', 'DATE REQUESTED TO COMMENCE PRESENT LEAVE:') !!}
        {!! Form::text('date_start_new',  $LeaveRequest->date_start_new ??   null, ['class' => 'form-control ','id'=>'date_start','readonly'=>true]) !!}
    </div>
   
    
    <div class="form-group col-sm-6">
        {!! Form::label('number_days', 'NUMBER OF DAYS:') !!}
        {!! Form::number('number_days', $LeaveRequest->number_days ??  null, ['class' => 'form-control ','readonly'=>true,'id'=>'number_days','readonly'=>true]) !!}
    </div>
    
        <div class="form-group col-sm-6">
            {!! Form::label('daystaken', 'Number of days to take:') !!}
            {!! Form::number('daystaken',$LeaveRequest->daystaken ??  null, ['class' => 'form-control ','placeholder'=>'input the number of days to take','id'=>'days','readonly'=>true]) !!}
        </div>
    
    <div class="form-group col-sm-6">
        {!! Form::label('home_address', 'HOME ADDRESS:') !!}
        {!! Form::text('home_address',$LeaveRequest->home_address ??  null, ['class' => 'form-control','readonly'=>true]) !!}
    </div>
    
    <div class="form-group col-sm-6">
        {!! Form::label('home_number', 'HOUSE NUMBER:') !!}
        {!! Form::text('home_number', $LeaveRequest->home_number ?? null, ['class' => 'form-control','readonly'=>true]) !!}
    </div>










   
    <div class="form-group col-sm-6">
        {!! Form::label('local_council', 'LOCAL COUNCIL/AREA COUNCIL:') !!}
        {!! Form::text('local_council',$LeaveRequest->local_council ??  null, ['class' => 'form-control','readonly'=>true]) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('end_date', 'EXPECTED DATE TO RESUME:') !!}
        {!! Form::text('end_date',$LeaveRequest->end_date ??  null, ['class' => 'form-control ','placeholder'=>'the date for you to resume','id'=>'end_date','readonly'=>true]) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('state', 'STATE:') !!}
        {!! Form::select('state', getBranchRegions(), null, ['class' => 'form-control  ','readonly'=>true]) !!}
    </div>
    
    
    
    
    <div class="form-group col-sm-6">
        {!! Form::label('phone_number', 'PHONE NUMBER:') !!}
        {!! Form::text('phone_number', $LeaveRequest->phone_number ??  null, ['class' => 'form-control ','readonly'=>true]) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('officer_relieve', 'NAME OF OFFICER TO RELIEVE:') !!}
        {!! Form::text('officer_relieve', $LeaveRequest->officer_relieve ?? null, ['class' => 'form-control','readonly'=>true]) !!}
    </div>
    
    <!-- Signature Field -->
    <div class="col-sm-4 my-4">
        {!! Form::label('signature_path', 'UPLOAD SIGNATURE PDF ONLY') !!}
        @if ($LeaveRequest->signature_path)
<img src="{{ asset('storage/' . $LeaveRequest->signature_path) }}" alt="Signature Of applicant" style="width: 100px;">
<div class="form-group">
    {{-- {!! Form::file('signature_path', null, ['class' => 'form-control','accept' => 'image/*','readonly'=>true]) !!} --}}
    @endif
        </div>
    </div>


   
       

        <div class="form-group col-sm-6 my-4">
            {!! Form::label('comments ', 'Comments:') !!}
            {!! Form::textarea('comments',null, ['class' => 'form-control']) !!}
        </div>


        @if(isset($unit_head_data))
        <!-- UNIT HEAD  Status Field -->
        <div class="form-group col-sm-6 my-5">
            {!! Form::label('supervisor_approval', 'Supervisor Status',['class'=>'h4']) !!} <br>
            <div class="form-control">
            {!! Form::radio('supervisor_approval', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
            <br>
            {!! Form::radio('supervisor_approval', 0, true) !!}&nbsp;Unapproved
            </div>
        </div>
        @endif
        
        @if(isset($department_head_data))
        <!-- HOD Status Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('department_approval', 'Department Status',['class'=>'h4']) !!}
            <div class="form-control">
            {!! Form::radio('department_approval', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
            {!! Form::radio('department_approval', 0, true) !!}&nbsp;Unapproved
            </div>
        </div>
        @endif
        
        @role('MD')
        <?php 
        if($LeaveRequest->department_approval == 1){
        ?>
        <!-- MD Status Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('hod_approval', 'HOD Status') !!}
            <div class="form-control">
            {!! Form::radio('hod_approval', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
            {!! Form::radio('hod_approval', 0, true) !!}&nbsp;Unapproved
            </div>
        </div>
        <?php } ?>
        @endrole
        @role('HR')
        <?php 
        if($LeaveRequest->supervisor_approval == 1 && $LeaveRequest->department_approval == 1){
        ?>
        <!-- Account Status Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('hr_approval', 'HUMAN RESOURCE') !!}
            <div class="">
            {!! Form::radio('hr_approval', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
            {!! Form::radio('hr_approval', 0, true) !!}&nbsp;Unapproved
            </div>
        </div>
        <?php } ?>
        @endrole

      






 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#leave_type').on('click', function() {
          const selectedId = $(this).val();          
       if (selectedId !== '') {
                    $.ajax({
                        url: `http://localhost:8000/leave_request_data/get-data/${selectedId}`,
                        type: 'GET',
                        data: {id: selectedId},
                        dataType: 'json',
                        //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(response) {
                            var du = JSON.stringify(response.duration);
                            $('#number_days').val('');
                            $('#number_days').val(du);
                            
                        },
                        error: function() {
                            alert('Failed to retrieve duration.');
                        }
                    });
                } else {
                    $('#number_days').val('');
                }
            });
        });
    </script>



<script>
      document.addEventListener('DOMContentLoaded', function() {
    let updatebtn = document.getElementById('u');
    updatebtn.addEventListener('click',()=>{
       
        let datestart=document.getElementById('date_start');
         let numberofdays=document.getElementById('number_days');
        let  daystaken =document.getElementById('days');
        let daytoresume= document.getElementById('end_date');

        let date = new Date(datestart.value)
        let day = parseInt(daystaken.value);
        let newdate= new Date(date.getTime() + (day *24 *60 *60 *1000));
       
        if (parseInt(daystaken.value)>parseInt(numberofdays.value)){
            let notificationAlert = document.getElementById('notificationAlert');
            notificationAlert.textContent = daystaken.value + "   exceeds the allowed limit of " + numberofdays.value + "days" ;
            notificationAlert.classList.remove('d-none');
          
        
        } 
        else {
            // If days taken is valid, hide the notification alert
            let notificationAlert = document.getElementById('notificationAlert');
            notificationAlert.classList.add('d-none');
            

        while (newdate.getDay()==0 || newdate.getDay()==6){
            day++
            newdate = new Date(date.getTime() + (day * 24 *60*60*1000 ));
        }
        if (newdate.getDate()==0){
            day +=2;
            newdate = new Date(date.getTime() + (day * 24 *60*60*1000 ));
            
        }

        daytoresume.value=newdate.toISOString().slice(0, 10);
//

// Enabling the submit button now
let submitbtn=document.getElementById('submit')

submitbtn.disabled = false;

    }
        
    });
});
</script>





















