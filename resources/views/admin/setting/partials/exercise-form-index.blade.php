<div class="tab" id="exercise">
    <h5>Exercises</h5>

    <p>Exercises per day</p>
    <input type="text" class="form-control" name="exercises_per_day" id="exercises_per_day">
    @include('admin.setting.partials.exercise-form', ['index' => 'one'])
    @include('admin.setting.partials.exercise-form', ['index' => 'two'])
    @include('admin.setting.partials.exercise-form', ['index' => 'three'])

    <br/>
    <button type="button" class="btn btn-secondary mr-2 mt-3"
            onclick="prevStep('exercise', 'resting')">Previous
    </button>
    <button type="button" class="btn btn-primary mt-3"
            onclick="nextStep('exercise', 'meals')">Next
    </button>
</div>
