<div class="form-group">
    <select 
        id="{{ $attributes->get('id') }}" 
        name="{{ $attributes->get('name') }}" 
    >
        @if(!$oldCountry)
            <option selected disabled>Country</option>
        @endif
        @foreach($countries AS $country)
            <option value="{{ $country->id }}" @if($oldCountry == $country->id) selected @endif>{{ ucfirst($country->name) }}</option>
        @endforeach
    </select>
        

    <div class="mt-3">
        @foreach ($errors->get($attributes->get('name')) as $message)
            <div class="alert alert-danger">{{ $message }} </div>
        @endforeach
    </div>
</div>