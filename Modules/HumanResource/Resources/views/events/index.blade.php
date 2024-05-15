@extends('layouts.app')

@section('content')
   {{--  <h1>Events</h1> --}}
   <button id="add-event-button" class="btn btn-primary" data-toggle="modal" data-target="#event-modal">Add Event</button>
   <div id="calendar"></div>

   <!-- Event Modal -->
   <div id="event-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Event Details</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                <form id="event-form" method="POST">
                    @csrf
                    <input type="hidden" name="event_id" id="event_id">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="start">Start Date and Time</label>
                        <input type="datetime-local" class="form-control" id="start" name="start">
                    </div>
                    <div class="form-group">
                        <label for="end">End Date and Time</label>
                        <input type="datetime-local" class="form-control" id="end" name="end">
                    </div>
                    <div class="form-group">
                        <label for="departments">Departments</label>
                        <select multiple class="form-control" id="departments1" name="department_ids[]">
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rankings">Rankings</label>
                        <select multiple class="form-control" id="rankings1" name="ranking_ids[]">
                         
                        </select>
                    </div>                    
                   {{--  <button type="submit" class="btn btn-primary">Save</button> --}}
                   <button id="saveButton" type="submit" class="btn btn-primary">Save</button>
<div id="loadingAnimation" class="loading-animation"></div>

<style>
    .loading-animation {
  display: none; /* Initially hide the loading animation */
  width: 40px;
  height: 40px;
  border: 4px solid rgba(0, 0, 0, 0.1);
  border-left-color: #3498db;
  border-radius: 50%;
  animation: spin 1s linear infinite;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>
<script>
document.getElementById("saveButton").addEventListener("click", function() {
    
  // Hide the button
  this.style.display = "none";
  
  // Show the loading animation
  document.getElementById("loadingAnimation").style.display = "block";
  
  // Simulate a loading delay (replace with your actual AJAX call or operation)
 /*  setTimeout(function() {
    // Hide the loading animation when the operation is done
    document.getElementById("loadingAnimation").style.display = "none";
    
    // Optionally, show the button again
    document.getElementById("saveButton").style.display = "block";
  }, 2000); */ // Replace with your desired delay in milliseconds
});

</script>

                </form>
                
               </div>
           </div>
       </div>
   </div>

@endsection

{{-- @push('scripts')
    <script src="{{ asset('js/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('js/events.js') }}"></script>
@endpush --}}
