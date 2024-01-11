<label>From</label>

<label>
    <select class="form-control" name="exercise_time_from" id="exercise_time_from">
        <option value="6:00">6:00</option>
        <option value="8:00">8:00</option>
        <option value="12:00">12:00</option>
    </select>
</label>

<label>To</label>

<label>
    <select class="form-control" name="exercise_time_to" id="exercise_time_to">
        <option value="9:00">9:00</option>
        <option value="10:00">10:00</option>
        <option value="13:00">13:00</option>
    </select>
</label>

<label>Type</label>

<label>
    <select class="form-control" name="exercise_id" id="exercise_id">
        @foreach($exercises as $exercise)
            <option value="{{ $exercise->id }}"> {{ $exercise->name }}</option>
        @endforeach
    </select>
</label>

<button type="button" id="saveExercise" class="btn btn-sm btn-success">Save</button>
