$(document).ready(function() {
    $('#add-event-button').on('click', function() {
        console.log('Add Event button clicked.'); // Debug line
        $('#event-modal').modal('show',{
            backdrop: false
        });
    });
    
    $('#event-modal').on('click', '.close', function() {
        $('#event-modal').modal('hide');
        $('.modal-backdrop').remove(); // Remove the backdrop manually
    });
    
    var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
        initialView: 'dayGridMonth',
        events: 'index_json',
        eventClick: function(info) {
            openEventModal(info.event);
        }
    });
    calendar.render();

    function openEventModal(event) {
        $('#event_id').val(event.id);
        $('#title').val(event.title);
        $('#start').val(event.start);
        $('#end').val(event.end);
        $('#event-modal').modal('show');
    }

    $(document).on('submit', '#event-form', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var eventId = $('#event_id').val();
        var url = eventId ? 'events/' + eventId : 'events';
        $.ajax({
            url: url,
            method: eventId ? 'PUT' : 'POST',
            data: formData,
            success: function(response) {
                calendar.refetchEvents();
                $('#event-modal').modal('hide');
            }
        });
    });

    $(document).on('click', '.delete-event', function() {
        var eventId = $(this).data('event-id');
        $.ajax({
            url: 'events/' + eventId,
            method: 'DELETE',
            success: function(response) {
                calendar.refetchEvents();
            }
        });
    });

    $.ajax({
        url: 'index_json_data',
        method: 'GET',
        success: function(response) {
            var departmentsDropdown = $('#departments1');
            var rankingsDropdown = $('#rankings1');

            // Populate departments dropdown
            response.departments.forEach(function(department) {
                departmentsDropdown.append($('<option>', {
                    value: department.id,
                    text: department.name
                }));
            });

            // Populate rankings dropdown
            response.rankings.forEach(function(ranking) {
                rankingsDropdown.append($('<option>', {
                    value: ranking.id,
                    text: ranking.name
                }));
            });

          
        }
    });
});



