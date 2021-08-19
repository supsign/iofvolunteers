<div class="form-group">
    <input type="number" min="0" step="1" name="local_experience" value="{{ old('local_experience') ?? $item?->local_experience }}" id="local_experience">
    <label class="formGroupLabel" for="local_experience">Exprience with local Events</label>
</div>

<div class="form-group">
    <input type="number" min="0" step="1" name="national_experience" value="{{ old('national_experience') ?? $item?->national_experience }}" id="national_experience">
    <label class="formGroupLabel" for="national_experience_id">Exprience with national Events</label>
</div>

<div class="form-group">
    <input type="number" min="0" step="1" name="international_experience" value="{{ old('international_experience') ?? $item?->international_experience }}" id="international_experience">
    <label class="formGroupLabel" for="international_experience_id">Exprience with international Events</label>
</div>