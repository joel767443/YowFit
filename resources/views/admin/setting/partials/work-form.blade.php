<p>What times are your work times</p>

<label>From</label>
<label>
    <select class="form-control" name="work_time_from[{{ $index }}]" id="work_time_from_{{ $index }}">
        <option value="6:00" {{ $settings->to == '6:00' ? 'selected' : '' }}>6:00</option>
        <option value="8:00" {{ $settings->to == '8:00' ? 'selected' : '' }}>8:00</option>
        <option value="12:00" {{ $settings->to == '12:00' ? 'selected' : '' }}>12:00</option>
    </select>
</label>
<label>To</label>
<label>
    <select class="form-control" name="work_time_to[{{ $index }}]" id="work_time_to_{{ $index }}">
        <option value="9:00" {{ $settings->to == '9:00' ? 'selected' : '' }}>9:00</option>
        <option value="10:00" {{ $settings->to == '10:00' ? 'selected' : '' }}>10:00</option>
        <option value="13:00" {{ $settings->to == '13:00' ? 'selected' : '' }}>13:00</option>
    </select>
</label>

<label>Type</label>
<label>
    <select class="form-control" name="exercise_id[{{ $index }}]" id="exercise_id_{{ $index }}">
        @foreach($workTypes as $workType)
            <option value="{{ $workType }}"> {{ $workType }}</option>
        @endforeach
    </select>
</label>
