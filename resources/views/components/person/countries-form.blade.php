<div class="form-group">
    <div class="warn">Country</div>
    <select type="text" name="country_id" id="country_id" size="1" value="" required>     
        @if(!old('country_id'))
            <option selected disabled>Country</option>
        @endif
        @foreach($countries AS $country)
            <option value="{{ $country->id }}" @if(old('country_id') == $country->id) selected @endif>{{ ucfirst($country->name) }}</option>
        @endforeach
    </select>
    <img for="country" class="selectArr selectArrComponents" src="{{ asset('images/selectArr.svg') }}" alt="" />
    <div class="mt-3">
        @foreach ($errors->get('country_id') as $message)
            <div class="alert alert-danger">{{ $message }} </div>
        @endforeach
    </div>
</div>