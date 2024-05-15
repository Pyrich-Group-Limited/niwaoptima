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
    <button type="submit" class="btn btn-primary">Save</button>
</form>
