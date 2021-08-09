<div class="formSection">
    @isset($title)
    <h3 class="formSectionTitle">
        {{ $title }}
        @isset($subtitle)
            <div class="font-italic"> {{ $subtitle }}</div>
        @endisset
    </h3>
    @endisset

    <div class="form-group" id="selectAny">
        <input class="form-check-input checkbox" type="checkbox" value="1" name="AnyName" id="AnyId">
        <label class="form-check-label" for="AnyId">
            Anywhere
        </label>
        @foreach($continents AS $continent)
            <div class="form-check">
                <input class="form-check-input checkbox" type="checkbox" value="1" name="continent[{{ $continent->id }}]" id="continent_{{ $continent->snakeCaseName }}">
                <label class="form-check-label" for="continent_{{ $continent->snakeCaseName }}">
                    {{ $continent->name }}
                </label>                     
            </div>
        @endforeach                           
    </div>
</div>