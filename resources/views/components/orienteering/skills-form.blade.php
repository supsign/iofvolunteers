<div class="formSection">
    <h3 class="formSectionTitle">
        8. Skills
        <div class="warn"> &nbsp;(Please tick all relevant to you.
            Details are <b>required</b> if skill is ticked)
        </div>
    </h3>

    @foreach($skilltypes as $skilltype)
        <div class="form-group">
            <div class="formGroupLabelStatic">* {{ $skilltype->name }}</div>
            @isset($skilltype->warn)
                <div class="warn">{{ $skilltype->warn }}</div>
            @endisset

            @foreach($skills->where('skill_type_id', $skilltype->id) as $skill )
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="skill[{{ $skill->id }}]" id="skills[{{ $skill->id }}]">
                    <label class="form-check-label" for="skills[{{ $skill->id }}]">
                        {{ $skill->name }}
                    </label>
                </div>
            @endforeach
            <div class="form-group">
                <textarea placeholder=" " rows="2" cols="30" name="skill_{{ $skilltype->snakeCaseName }}" id="skill_{{ $skilltype->snakeCaseName }}" value=""></textarea>
                <label class="formGroupLabel" for="skill_{{ $skilltype->snakeCaseName }}">{{ $skilltype->text }}</label>
            </div>
        </div>
    @endforeach

    <div class="form-group">
        <textarea placeholder=" " rows="2" cols="30" name="skill_other" id="skill_other" value=""></textarea>
        <label class="formGroupLabel" for="skill_other">* Other skills? Please explain...</label>
    </div>
</div>