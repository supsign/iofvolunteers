<div class="formSection">
    <h3 class="formSectionTitle">
        {{ $title }}
    </h3>

    <div class="form-group">
        @foreach($disciplines AS $discipline)
        @php
            if(isset($volunteer)) {
                $oldDiscipline= !empty(old('discipline')[$discipline->id]) ? old('discipline')[$discipline->id] : $volunteer->disciplines->contains($discipline);
            }
            else {
                $oldDiscipline= !empty(old('discipline')[$discipline->id]) ? old('discipline')[$discipline->id] : null;
            }
        @endphp
        {{-- @dump($volunteer->disciplines) --}}
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="discipline_{{ $discipline->snakeCaseName }}" name="discipline[{{ $discipline->id }}]"

                @if($oldDiscipline)
                    checked="checked" 
                @endif
                >
                <label class="form-check-label" for="discipline_{{ $discipline->snakeCaseName }}">
                    {{ $discipline->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>