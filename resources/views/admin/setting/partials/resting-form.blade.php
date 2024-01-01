<div class="tab" id="resting">
    <h5>Resting</h5>
    <p>How many hours do you want to sleep</p>

    <label>
        <select class="form-control" name="hours_sleep" id="hours_sleep">
            <option selected>0</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
        </select>
    </label>
    <p>What time do you want to sleep</p>
    <label>
        <select class="form-control" name="sleeping_time" id="sleeping_time">
            <option selected>0</option>
            <option>19:00</option>
            <option>20:00</option>
            <option>21:00</option>
            <option>22:00</option>
        </select>
    </label>
    <input type="hidden" name="user_id"
           value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
    <input type="hidden" name="wakeup_time" value="5:00">
    <p>When do you want to weigh yourself?</p>
    <label>
        <select class="form-control" name="weighing_frequency" id="weighing_frequency">
            <option selected>Every week</option>
            <option>Every 2 weeks</option>
            <option>Monthly</option>
        </select>
    </label>

    <br/>
    <button type="button" class="btn btn-primary mt-3"
            onclick="nextStep('resting', 'exercise')">Next
    </button>
</div>
