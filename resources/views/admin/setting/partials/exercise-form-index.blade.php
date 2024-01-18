<div class="tab" id="exercise">
    <h5>
        Exercises
        <span id="showForm" class="float-end">Add</span>
    </h5>

    <div style="margin-top: 8px; display: none" id="formDiv">
        <br/>
        @include('admin.setting.partials.exercise-form')
        <hr/>
    </div>

    @foreach($exerciseTimes as $time)
        <div> <b>From :</b> {{ $time->exercise_time_from }}  <b>To :</b> {{ $time->exercise_time_to }} <b>Type : </b>{{ $time->exercise->name }}</div>
    @endforeach

    <div id="exerciseTime"></div>

    <button type="button" class="btn btn-secondary mr-2 mt-2"
            onclick="prevStep('exercise', 'resting')">Previous
    </button>
    <button type="button" class="btn btn-primary mt-3"
            onclick="nextStep('exercise', 'meals')">Next
    </button>
</div>
