
<div class="container-fluid">
    <div class="row">
        <div class="col-6" id="clockInCard">
            <div class="card" style="padding-top: 10px;">
                <div class="card-header">
                    <h4 class="card-title">Mark Attendance</h4>
                </div>
                <div class="card-body dash-card-body">
                    <h5 class="text-muted pb-0-5">My Office Time: 08:00am to 05:00pm </h5>
                    <br>
                    <center>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" id="clock_in" class="btn btn-success" @if(auth()->user()->hasClockedInToday()) disabled @endif onclick="hideCards()">CLOCK IN</button>
                            </div>
                            
                            <div class="col-md-6">
                                <button type="button" id="clock_out" class="btn btn-danger" disabled>CLOCK OUT</button>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-6" id="announcementCard">
            <div class="card list_card" style="padding-top: 10px;">
                <div class="card-header">
                    <h4 class="card-title">{{__('Announcement List')}}</h4>
                </div>
                <div class="card-body dash-card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>                            
                                <tr>
                                   <th><b style="font-size:15px">{{__('Title')}}</b></th></b>
                                    <th><b style="font-size:15px">{{__('Start Date')}}</b></th>
                                    <th><b style="font-size:15px">{{__('End Date')}}</b></th>
                                    <th><b style="font-size:15px">{{__('Description')}}</b></th>

                                  
                                </tr>
                            </thead>
                            
                            <tbody>
                                <!-- Dummy Data -->
                                
                                <!-- End of Dummy Data -->
                            </tbody>
                        </table>
                        <center><b>No any announcements at the moment</b></center>
                    </div>
                    <BR>
                </div>
            </div>
        </div>
    </div>
</div>




