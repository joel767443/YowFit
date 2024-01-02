<div class="tab" id="meals">
    <h5>Meals</h5>
    <input type="text" class="form-control" name="meals_per_day" id="meals_per_day" value="{{ $settings->meals_per_day }}">
    @include('admin.setting.partials.meals-form', ['index' => 'one'])
    @include('admin.setting.partials.meals-form', ['index' => 'two'])
    @include('admin.setting.partials.meals-form', ['index' => 'three'])

    <button type="button" class="btn btn-secondary mr-2 mt-3"
            onclick="prevStep('meals', 'exercise')">Previous
    </button>
    <button type="button" class="btn btn-primary mt-3" onclick="nextStep('meals', 'work')">
        Next
    </button>
</div>
