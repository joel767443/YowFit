<div class="tab" id="meals">
    <h5>Meals</h5>
    <p>How many times do you want to eat</p>
    <label>
        <select class="form-control" name="meals_per_day">
            <option selected>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </label>
    <p>Choose meals</p>
    <input type="text" name="meals_input" class="form-control">
    <button type="button" class="btn btn-secondary mr-2 mt-3"
            onclick="prevStep('meals', 'exercise')">Previous
    </button>
    <button type="button" class="btn btn-primary mt-3" onclick="nextStep('meals', 'work')">
        Next
    </button>
</div>
