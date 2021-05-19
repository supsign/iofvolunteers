<div class="formSection">
    <h3 class="formSectionTitle">
        {{ $title }}
        <div class="warn">
            &nbsp;(Please tick only the most important ones to increase search results...)
        </div>
    </h3>

    <div class="form-group">
        @foreach($skillTypes as $skillType)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="skillType[{{ $skillType->id }}]" id="skillType[{{ $skillType->id }}]">
                <label class="form-check-label" for="skillType[{{ $skillType->id }}]">
                    {{ $skillType->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>
