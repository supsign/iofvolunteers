<div class="form-group">
    <div class="warn">Country</div>
    <select type="text" name="country_id" id="country_id" size="1" value="" required>
        <option selected disabled>Country</option>
        @foreach($countries AS $country)
            <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
        @endforeach
    </select>
    <img for="country" class="selectArr" src="{{ asset('images/selectArr.svg') }}" alt="" />
</div>