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
          {{-- @dump($volunteer->languages->contains($l)) --}}
        <div class="form-group form-inline">

            
            <div class="form-check">
                <label class="form-check-label">
                    {{ $l->name }}
                </label>
            </div>
            @foreach ($languageProficiencies as $lp )

                @php
                    if(isset($volunteer)) {
                        
                        if(!empty(old('language')[$l->id])) {
                            $oldLanguage=old('language')[$l->id]; 
                        } else {
                            $oldLanguage=(bool)$volunteer->languageVolunteers()->where('language_id', $l->id)->where('language_proficiency_id', $lp->id)->count();
                        }
                    }
                    else {
                        $oldLanguage= !empty(old('language')[$l->id]) ? old('language')[$l->id] : null;
                    }
                @endphp
                
                <div class="form-check">
                    {{-- @dump($oldLanguage, $lp->name === 'none') --}}
                    <input class="form-check-input" type="radio" name="language[{{ $l->id }}]" value="{{ $lp->id }}" id="languages_{{ $l->id }}_{{ $lp->id }}"
                    
                    
                    @if($oldLanguage)
                        checked="checked" 

                    @elseif($lp->name === 'none' && !isset($volunteer))
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