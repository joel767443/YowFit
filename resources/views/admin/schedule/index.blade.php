@extends('layouts.app')

@section('content')
    <style>
        .rounded-box {
            margin-bottom: 8px;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
    <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div class="container">
        <!-- Include Schedule Time Modal -->
        @include('admin.schedule.partials.schedule_time_modal')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-start">Weekly Schedule</h5>
                        <span class="float-end">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#scheduleTimeModal">
                                Add Schedule Time
                            </button>
                        </span>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">Sunday</th>
                            <th scope="col" class="text-center">Monday</th>
                            <th scope="col" class="text-center">Tuesday</th>
                            <th scope="col" class="text-center">Wednesday</th>
                            <th scope="col" class="text-center">Thursday</th>
                            <th scope="col" class="text-center">Friday</th>
                            <th scope="col" class="text-center">Saturday</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-center">
                            @foreach($data as $day => $dayData)
                                <td>
                                    @foreach($dayData["activities"] as $items)
                                        <div class="event rounded-box">
                                            <span class="event-name">{{ $items['activity'] }}</span>
                                            <br>
                                            <span class="time">{{ $items['start_time'] }}~{{ $items['end_time'] }}</span>
                                            <button type="button" class="btn btn-info" onclick="openEditModal('{{ $day }}', {{ $dayData["scheduleId"] }}, '{{ $items['start_time'] }}', '{{ $items['end_time'] }}', {{ $dayData["scheduleId"] }}, {{ 1 }}, '{{ 'Meal' }}')">Edit</button>
                                        </div>
                                    @endforeach
                                </td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // JavaScript logic for saving schedule time
    function saveScheduleTime() {
        // Fetch form data and perform AJAX request to save data
        // Example: use axios or jQuery.ajax to send the form data to a controller method
        // Update the URL below with the actual route to handle the form submission
        const formData = new FormData(document.getElementById('scheduleTimeForm'));

        // Example using axios
        axios.post('/schedule-times/1', formData)
            .then(response => {
                // Handle success (e.g., close the modal, refresh the page, etc.)
                $('#scheduleTimeModal').modal('hide');
            })
            .catch(error => {
                // Handle error (e.g., display validation errors)
                console.error(error);
            });
    }

    function openEditModal(dayOfTheWeek, scheduleTimeId, startTime, endTime, scheduleId, scheduleableId, scheduleableType) {
        $('#scheduleTimeId').val(scheduleTimeId);
        $('#start_time').val(startTime);
        $('#end_time').val(endTime);
        $('#schedule_id').val(scheduleId);
        $('#scheduleable_id').val(scheduleableId);
        $('#scheduleable_type').val(scheduleableType);
        $('#scheduleTimeModal').modal('show');
    }
</script>
