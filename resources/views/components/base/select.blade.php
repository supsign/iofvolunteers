<div class="form-group">
    <div class="warn">{{$attributes->get('label')}}</div>
    
    <select 
        id="{{ $attributes->get('name') }}" 
        name="{{ $attributes->get('name') }}" 
        {{ $attributes }}
    >

        @if(!$value || !$value->id)
            <option selected disabled>{{ $attributes->get('label') }}</option>
        @endif

        @foreach($options AS $option)
            <option value="{{ $option->id }}" @if(old($attributes->get('name')) == $option->id OR $value && $value->id === $option->id) selected @endif>{{ $option->name }}</option>
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