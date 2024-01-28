<div class="modal fade scheduleTimeModal" id="scheduleTimeModal" tabindex="-1" role="dialog" aria-labelledby="scheduleTimeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduleTimeModalLabel">Schedule Time</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Schedule Time Form -->
                <form id="scheduleTimeForm">
                    @csrf

                    <div class="form-group">
                        <label for="start_time">Start Time:</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" required>
                    </div>

                    <div class="form-group">
                        <label for="end_time">End Time:</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" required>
                    </div>

                    <div class="form-group">
                        <label for="schedule_id">Day of the Week:</label>
                        <select class="form-control" id="schedule_id" name="schedule_id" required>
                            @foreach($daysOfTheWeek as $day)
                                <option value="{{ $day->id }}"> {{ $day->day_of_week }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="scheduleable_id">Scheduleable ID:</label>
                        <input type="number" class="form-control" id="scheduleable_id" name="scheduleable_id" required>
                    </div>

                    <div class="form-group">
                        <label for="scheduleable_type">Scheduleable Type:</label>
                        <select class="form-control" id="scheduleable_type" name="scheduleable_type" required>
                            <!-- Options for scheduleable_type -->
                        </select>
                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveScheduleTime()">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
