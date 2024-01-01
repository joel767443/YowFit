<div class="tab" id="exercise">
    <h5>Exercises</h5>

    <p>When can you exercise</p>
    <label>From</label>
    <label>
        <select class="form-control" name="hours-sleep">
            <option selected> - select -</option>
            <option>6:00</option>
            <option>8:00</option>
            <option>12:00</option>
        </select>
    </label>
    <label>To</label>
    <label>
        <select class="form-control" name="hours-sleep">
            <option selected> - select -</option>
            <option>9:00</option>
            <option>10:00</option>
            <option>13:00</option>
        </select>
    </label>
    <label>Type</label>
    <label>
        <select class="form-control" name="hours-sleep">
            <option selected> - select -</option>
            <option>Walking</option>
            <option>Running</option>
            <option>Weight lifting</option>
        </select>
    </label>
    <br/>
    <button type="button" class="btn btn-secondary mr-2 mt-3"
            onclick="prevStep('exercise', 'resting')">Previous
    </button>
    <button type="button" class="btn btn-primary mt-3"
            onclick="nextStep('exercise', 'meals')">Next
    </button>
</div>
