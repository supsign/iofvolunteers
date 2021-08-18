<div class="formSection">
    @isset($title)
    <h3 class="formSectionTitle">
        {{ $title }}
        @isset($subtitle)
            <div class="warn"> {{ $subtitle }}</div>
        @endisset
    </h3>
    @endisset

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
                    @if(!empty(old('language')[$l->id]))
                        @if((old('language')[$l->id]) == $lp->id) 
                            checked="checked" 
                        @endif

                    @else 
                        @if($lp->name === 'none'))
                            checked="checked"
                        @endif
                    @endif
                                    
                    >
                    <label class="form-check-label" for="languages_{{ $l->id }}_{{ $lp->id }}">
                        {{$lp->name}}
                    </label>
                      
                </div>
            @endforeach
            {{-- @dump(old('language')[$l->id])
            @dump($lp->id) --}}

        </div>
    @endforeach

    {{--
    <div class="form-group">
        <input id="field_languagesOther" placeholder=" " type="text" name="other_languages" value="" size="30">
        <label class="formGroupLabel"  for="field_languagesOther">Other languages?</label>
        <div class="font-italic">
            State each language and level, separated by commas below...
        </div>
    </div>
    --}}
</div>