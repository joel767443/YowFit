<div class="tab" id="work">
    <h5>Work</h5>
    @include('admin.setting.partials.work-form', ['index' => 'one'])
    <br/>
    <button type="button" class="btn btn-secondary mr-2 mt-3"
            onclick="prevStep('work', 'meals')">Previous
    </button>
    <button type="submit" class="btn btn-success mt-3">Submit</button>
</div>
