<div class="formSection">
    <h3 class="formSectionTitle">
        {{ $title }}
        <div class="warn"> (required, even if only listed in "other")</div>
    </h3>

    @foreach($languages as $l)
        <div class="form-group form-inline">
            <div class="form-check">
                <label class="form-check-label">
                    {{ $l->name }}
                </label>
            </div>
            @foreach ($languageProficiencies as $lp )
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="language[{{ $l->id }}]" value="{{ $lp->id }}" id="languages_{{ $l->id }}_{{ $lp->id }}"
                        @if($lp->name === 'none' && !isset($langSelection))
                        checked="checked"    
                        @endif
                    >
                    <label class="form-check-label" for="languages_{{ $l->id }}_{{ $lp->id }}">
                        {{$lp->name}}
                    </label>
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="form-group">
        <input id="field_languagesOther" placeholder=" " type="text" name="other_languages" value="" size="30">
        <label class="formGroupLabel"  for="field_languagesOther">Other languages?</label>
        <div class="font-italic">
            State each language and level, separated by commas below...
        </div>
    </div>
</div>