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
        <input class="form-check-input continentsCheckboxes" type="checkbox" value="1" name="AnyName" id="continentsCheckboxesTrigger">
        <label class="form-check-label" for="continentsCheckboxesTrigger">
            Anywhere
        </label>
        @foreach($continents AS $continent)
            <div class="form-check">
                <input class="form-check-input continentsCheckboxes" type="checkbox" value="1" name="continent[{{ $continent->id }}]" id="continent_{{ $continent->snakeCaseName }}">
                <label class="form-check-label" for="continent_{{ $continent->snakeCaseName }}">
                    {{ $continent->name }}
                </label>                     
            </div>
        @endforeach                           
    </div>
</div>