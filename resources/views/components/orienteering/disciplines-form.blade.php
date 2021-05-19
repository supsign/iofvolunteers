<div class="formSection">
    <h3 class="formSectionTitle">
        {{ $title }}
    </h3>

    <div class="form-group">
        @foreach($disciplines AS $discipline)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="discipline_{{ $discipline->snakeCaseName }}" name="discipline[{{ $discipline->id }}]">
                <label class="form-check-label" for="discipline_{{ $discipline->snakeCaseName }}">
                    {{ $discipline->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>