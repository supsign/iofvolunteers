<div class="formSection">
    @isset($title)
    <h3 class="formSectionTitle">
        {{ $title }}
        @isset($subtitle)
            <div class="formSubtitle2"> {{ $subtitle }}</div>
        @endisset
    </h3>
    @endisset

    @foreach($skilltypes as $skilltype)
        <div class="form-group">

            <div class="formSubtitle2">{{ $skilltype->name }} *
                @isset($skilltype->warn)
                    <div class="font-weight-normal">{{ $skilltype->warn }}</div>
                @endisset
            </div>

            @foreach($skills->where('skill_type_id', $skilltype->id) as $skill )
            @php
                if(isset($volunteer)) {
                    $oldSkilltype= !empty(old('skill')[$skill->id]) ? old('skill')[$skill->id] : $volunteer->skills->contains($skill);
                }
                else {
                    $oldSkilltype= !empty(old('skill')[$skill->id]) ? old('skill')[$skill->id] : null;
                }
            @endphp
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="skill[{{ $skill->id }}]" id="skills[{{ $skill->id }}]"
                    @if($oldSkilltype) 
                        checked="checked" 
                    @endif
                    >
                    <label class="form-check-label" for="skills[{{ $skill->id }}]">
                        {{ $skill->name }}
                    </label>
                </div>
            @endforeach

            @php
                if(isset($volunteer)) {
                    $oldSkilltypeText= !empty(old('skill_')[$skilltype->snakeCaseName]) ? old('skill_')[$skilltype->snakeCaseName] : $volunteer->skilltypes->contains($skilltype);
                    $fieldDB="skill_".$skilltype->snakeCaseName;
                    $fieldQuery=$volunteer->$fieldDB;
                }
                else {
                    $fieldQuery= !empty(old('skill_')[$skilltype->snakeCaseName]) ? old('skill_')[$skilltype->snakeCaseName] : null;
                }
            @endphp
            <div class="form-group">
                <textarea placeholder=" " rows="2" cols="30" name="skill_{{ $skilltype->snakeCaseName }}" id="skill_{{ $skilltype->snakeCaseName }}" value="">{{ $fieldQuery  }}</textarea> 
                <label class="formGroupLabel" for="skill_{{ $skilltype->snakeCaseName }}">{{ $skilltype->text }}</label>
            </div>
        </div>
    @endforeach
    @isset($additionalFields)
        <div class="form-group"> {{ $additionalFields }} </div>
    @endisset
</div>
