<div class="formSection">
    @isset($title)
    <h3 class="formSectionTitle">
        {{ $title }}
        @isset($subtitle)
            <div class="font-italic"> {{ $subtitle }}</div>
        @endisset
    </h3>
    @endisset

    <div class="form-group" id="continentsCheckboxesDiv">
        <input class="form-check-input continentsCheckboxes" type="checkbox" value="1" name="continentCheckboxAny" id="continentsCheckboxesTrigger"
            @if(!empty(old('continentCheckboxAny')))
                @if((old('continentCheckboxAny')) == "1") 
                    checked="checked" 
                @endif
            @endif
        >
        <label class="form-check-label" for="continentsCheckboxesTrigger">
            Anywhere
        </label>
        @foreach($continents AS $continent)
        {{-- @dump($volunteer->continents->contains($continent)) --}}
         @php
            if(isset($volunteer)) {
                $oldContinents= !empty(old('continent')[$continent->id]) ? old('continent')[$continent->id] : $volunteer->continents->contains($continent);
            }
            else {
                $oldContinents= !empty(old('continent')[$continent->id]) ? old('continent')[$continent->id] : null;
            }
        @endphp
            <div class="form-check">
                <input class="form-check-input continentsCheckboxes" type="checkbox" value="1" name="continent[{{ $continent->id }}]" id="continent_{{ $continent->snakeCaseName }}"
                    @if($oldContinents) 
                        checked="checked" 
                    @endif
                >
                <label class="form-check-label" for="continent_{{ $continent->snakeCaseName }}">
                    {{ $continent->name }}
                </label>                     
            </div>
        @endforeach                           
    </div>
</div>