<div class="form-group">
    <x-base.input 
        id="{{ $attributes->get('name') }}"
        type="{{ $attributes->get('type') }}"
        name="{{ $attributes->get('name') }}"
        label="{{ $attributes->get('label') }}"
        value="{{ old($attributes->get('name')) ?? $attributes->get('value') }}"
    />
    <label class="formGroupLabel" for="field_{{ $attributes->get('name') }}">{{ $attributes->get('label') }}</label>
    <div class="mt-3">
        @foreach ($errors->get($attributes->get('name')) as $message)
            <div class="alert alert-danger">{{ $message }} </div>
        @endforeach
    </div>
<div class="form-group">