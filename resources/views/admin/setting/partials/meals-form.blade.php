    <label>From</label>
<label>
    <select class="form-control" name="meal_start_time[{{ $index }}]" id="meal_start_time_{{ $index }}">
        <option value="6:00" {{ $settings->to == '6:00' ? 'selected' : '' }}>6:00</option>
        <option value="8:00" {{ $settings->to == '8:00' ? 'selected' : '' }}>8:00</option>
        <option value="12:00" {{ $settings->to == '12:00' ? 'selected' : '' }}>12:00</option>
    </select>
</label>
<label>To</label>
<label>
    <select class="form-control" name="meal_end_time[{{ $index }}]" id="meal_end_time_{{ $index }}">
        <option value="9:00" {{ $settings->to == '9:00' ? 'selected' : '' }}>9:00</option>
        <option value="10:00" {{ $settings->to == '10:00' ? 'selected' : '' }}>10:00</option>
        <option value="13:00" {{ $settings->to == '13:00' ? 'selected' : '' }}>13:00</option>
    </select>
</label>
<br/>
<label>Meal</label>
<label>
    <select class="form-control" name="meal_id[{{ $index }}]" id="meal_id_{{ $index }}">
        @foreach($meals as $meal)
            <option value="{{ $meal->id }}"> {{ $meal->name }}</option>
        @endforeach
    </select>
</label>

<br/>
