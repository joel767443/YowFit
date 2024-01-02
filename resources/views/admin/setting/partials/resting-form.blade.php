<div class="tab" id="resting">
    <h5>Resting</h5>
    <p>How many hours do you want to sleep</p>
    <label>
        <select class="form-control" name="hours_sleep" id="hours_sleep">
            <option value="7" {{ $settings->hours_sleep == 7 ? 'selected' : '' }}>7</option>
            <option value="8" {{ $settings->hours_sleep == 8 ? 'selected' : '' }}>8</option>
            <option value="9" {{ $settings->hours_sleep == 9 ? 'selected' : '' }}>9</option>
        </select>
    </label>
    <p>What time do you want to sleep</p>
    <label>{{ $settings->sleeping_time }}
        <select class="form-control" name="sleeping_time" id="sleeping_time">
            <option value="19:00" {{ $settings->sleeping_time == '19:00' ? 'selected' : '' }}>19:00</option>
            <option value="20:00" {{ $settings->sleeping_time == '20:00' ? 'selected' : '' }}>20:00</option>
            <option value="21:00" {{ $settings->sleeping_time == '21:00' ? 'selected' : '' }}>21:00</option>
            <option value="22:00" {{ $settings->sleeping_time == '22:00' ? 'selected' : '' }}>22:00</option>
        </select>
    </label>
    <input type="hidden" name="user_id"
           value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
    <input type="hidden" name="wakeup_time" value="5:00">
    <p>When do you want to weigh yourself?</p>
    <label>
        <select class="form-control" name="weighing_frequency" id="weighing_frequency">
            <option value="every_week" {{ $settings->weighing_frequency == 'every_week' ? 'selected' : '' }}>Every week</option>
            <option value="every_two_weeks" {{ $settings->weighing_frequency == 'every_two_weeks' ? 'selected' : '' }}>Every 2 weeks</option>
            <option value="monthly" {{ $settings->weighing_frequency == 'monthly' ? 'selected' : '' }}>Monthly</option>
        </select>
    </label>

    <br/>
    <button type="button" class="btn btn-primary mt-3"
            onclick="nextStep('resting', 'exercise')">Next
    </button>
</div>
