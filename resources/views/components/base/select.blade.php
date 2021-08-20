<div class="form-group">
    <select 
        id="{{ $attributes->get('id') }}" 
        name="{{ $attributes->get('name') }}" 

    >
        @if(!$value)
            <option selected disabled>Country</option>
        @endif
        @foreach($options AS $option)
            <option value="{{ $option->$attributes->get('id') }}" @if($value == $option->id) selected @endif>{{ ucfirst($option->$attributes->get('name')) }}</option>
        @endforeach
    </select>
        

    <div class="mt-3">
        @foreach ($errors->get($attributes->get('name')) as $message)
            <div class="alert alert-danger">{{ $message }} </div>
        @endforeach
    </div>
</div>