<!--start::Step 1-->
<div class="current" data-kt-stepper-element="content">
    @csrf
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Additional fields for admin users"></i>
            </h2>
            <div class="text-muted fw-semibold fs-6"><!-- Check if a user is authenticated before displaying their name -->
                @if (Auth::check())
                    <p>Hello,  {{ Auth::user()->first_name }}</p>
                @endif
                
                <a href="#" class="link-primary fw-bold"></a>.
            </div>
            <div class="alert alert-danger d-none" id="notificationAlert" role="alert">
                <!-- Notification message will be displayed here -->
            </div>
        </div>
        <div class="fv-row">
            <div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::label('type', 'SELECT LEAVE TYPE.:') !!}
                    <select name="type" class="form-control form-control-solid border border-2 form-select" required id="leave_type">
                        @foreach ($leavetype as $item )
                        <option value="{{$item->id}}">{{$item->name}} </option>

                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('date_start_new', 'DATE REQUESTED TO COMMENCE PRESENT LEAVE:') !!}
                    {!! Form::date('date_start_new', null, ['class' => 'form-control form-control-solid border border-2 ','id'=>'date_start']) !!}
                </div>


                <div class="form-group col-sm-6">
                    {!! Form::label('number_days', 'NUMBER OF DAYS:') !!}
                    {!! Form::number('number_days', null, ['class' => 'form-control form-control-solid border border-2 ','readonly'=>true,'id'=>'number_days']) !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('daystaken', 'Number of days to take:') !!}
                    {!! Form::number('daystaken', null, ['class' => 'form-control form-control-solid border border-2 ','placeholder'=>'input the number of days to take','id'=>'days']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('end_date', 'EXPECTED DATE TO RESUME:') !!}
                    {!! Form::text('end_date', null, ['class' => 'form-control form-control-solid border border-2 ','placeholder'=>'the date for you to resume','id'=>'end_date','readonly'=>true]) !!}
                </div>
                <div class="form-group my-5 col-sm-6">
                    {!!Form::button('Update',['class'=>'btn btn-info','id'=>'u']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Step 1-->


<!--start::Step 2-->
<div data-kt-stepper-element="content">
    @csrf
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Additional fields for admin users"></i>
            </h2>
            <div class="text-muted fw-semibold fs-6">
                <a href="#" class="link-primary fw-bold"></a>.
            </div>
        </div>
        <div class="fv-row">
            <div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::label('home_address', 'LEAVE DESTINATION ADDRESS:') !!}
                    {!! Form::text('home_address', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                </div>
                {{-- <div class="form-group col-sm-6">
                    {!! Form::label('home_number', 'HOUSE NUMBER:') !!}
                    {!! Form::text('home_number', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                </div> --}}


                <div class="form-group col-sm-6">
                    {!! Form::label('local_council', 'LOCAL COUNCIL/AREA COUNCIL:') !!}
                    {!! Form::text('local_council', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                </div>

            </div>
        </div>
    </div>
</div>
<!--end::Step 2-->

<!--start::Step 3-->
<div data-kt-stepper-element="content">
    @csrf
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Additional fields for admin users"></i>
            </h2>
            <div class="text-muted fw-semibold fs-6">
                <a href="#" class="link-primary fw-bold"></a>.
            </div>
        </div>
        <div class="fv-row">
            <div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::label('state', 'STATE:') !!}
                    {!! Form::select('state', getBranchRegions(), null, ['class' => 'form-control form-control-solid border border-2 form-select ']) !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('phone_number', 'PHONE NUMBER:') !!}
                    {!! Form::text('phone_number', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('officer_relieve', 'NAME OF OFFICER TO RELIEVE:') !!}
                    {!! Form::text('officer_relieve', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                </div>

                <!-- Signature Field -->
                <div class="col-sm-4 my-4">
                    {!! Form::label('signature_path', 'UPLOAD SIGNATURE PDF ONLY') !!}
                    <div class="form-group">
                        {!! Form::file('signature_path',null, ['class' => 'form-control form-control-solid border border-2','accept' => 'image/*']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Step 3-->




<!--begin::Step 4-->
<div data-kt-stepper-element="content">
    <!--begin::Wrapper-->
    <div class="w-100">
        <!--begin::Heading-->
        <div class="pb-8 pb-lg-10">
            <!--begin::Title-->
            <h2 class="fw-bold text-dark">YOU ARE ABOUT APPLYING FOR A LEAVE </h2>
            <!--end::Title-->
            <!--begin::Notice-->

            <!--end::Notice-->
        </div>
        <!--end::Heading-->
        <!--begin::Body-->
        <div class="mb-0">
            <!--begin::Text-->
            <div class="fs-6 text-gray-600 mb-5">CONFIRM BY PRESSING THE APPLY BUTTON 
                </div>
                <div class="d-flex justify-content-between">

                    <button type="button" class="btn btn-lg btn-light me-3" data-kt-stepper-action="previous">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                        <span class="svg-icon svg-icon-4 me-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Back
                    </button>
              
                <div class="">
                    {!! Form::submit('Apply', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
           
        </div>
        <!--end::Body-->
    </div>
    <!--end::Wrapper-->
</div>

<!--end::Step 4-->

<!--begin::Actions-->
<div class="d-flex flex-stack pt-10">
    <!--begin::Wrapper-->
    <div class="mr-2">
      
    </div>
    <!--end::Wrapper-->

    <!--begin::Wrapper-->
    <div>
        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
            <span class="svg-icon svg-icon-4 ms-1 me-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Actions-->
<div class="card-footer">
    <!-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} -->
    {{-- <a href="{{ route('leave_request.index') }}" class="btn btn-default"> Cancel </a> --}}
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#leave_type').on('click', function() {
            const selectedId = $(this).val();
            const port = location.protocol + '//' + location.host;

            if (selectedId !== '') {
                $.ajax({
                    url: `${port}/leave_request_data/get-data/${selectedId}`,
                    type: 'GET',
                    data: {
                        id: selectedId
                    },
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
        updatebtn.addEventListener('click', () => {

            let datestart = document.getElementById('date_start');
            let numberofdays = document.getElementById('number_days');
            let daystaken = document.getElementById('days');
            let daytoresume = document.getElementById('end_date');

            let date = new Date(datestart.value)
            let day = parseInt(daystaken.value);
            let newdate = new Date(date.getTime() + (day * 24 * 60 * 60 * 1000));

            if (parseInt(daystaken.value) > parseInt(numberofdays.value)) {
                let notificationAlert = document.getElementById('notificationAlert');
                notificationAlert.textContent = daystaken.value + "   exceeds the allowed limit of " + numberofdays.value + "days";
                notificationAlert.classList.remove('d-none');


            } else {
                // If days taken is valid, hide the notification alert
                let notificationAlert = document.getElementById('notificationAlert');
                notificationAlert.classList.add('d-none');


                while (newdate.getDay() == 0 || newdate.getDay() == 6) {
                    day++
                    newdate = new Date(date.getTime() + (day * 24 * 60 * 60 * 1000));
                }
                if (newdate.getDate() == 0) {
                    day += 2;
                    newdate = new Date(date.getTime() + (day * 24 * 60 * 60 * 1000));

                }

                daytoresume.value = newdate.toISOString().slice(0, 10);
                //

                // Enabling the submit button now
                let submitbtn = document.getElementById('submit')

                submitbtn.disabled = false;

            }

        });
    });
</script>