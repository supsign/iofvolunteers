<div class="form-group">
    <select 
        id="{{ $attributes->get('name') }}" 
        name="{{ $attributes->get('name') }}" 

    >
        @if(!$value)
            <option selected disabled>{{ $options->$attributes->get('name') }}</option>
        @endif
        @foreach($options AS $option)
            <option value="{{ $option->$attributes->get('id') }}" @if($value == $option->id) selected @endif>{{ ucfirst($option->$attributes->get('label')) }}</option>
        @endforeach
    </select>
    @isset($iconName)
        <img for="{{ $attributes->get('name') }}" class="selectArr selectArrComponents" src="{{ asset('images/'.$iconName.'.svg') }}" alt="" /> 
    @endisset   
    <div class="mt-3">
        @foreach ($errors->get($attributes->get('name')) as $message)
            <div class="alert alert-danger">{{ $message }} </div>
        @endforeach
    </div>
</div>