<div class="form-group">
    <input 
        id="{{ $attributes->get('name') }}"
        type="{{ $attributes->get('type') ?? 'text' }}"
        name="{{ $attributes->get('name') }}"
        label="{{ $attributes->get('label') }}"
        value="{{ old($attributes->get('name')) ?? $attributes->get('value') }}"
        {{ $attributes->get('required') ? 'required' : '' }}
        {{ $attributes->get('disabled') ? 'disabled' : '' }}
    />
    <label class="formGroupLabel" for="field_{{ $attributes->get('name') }}">{{ $attributes->get('label') }}</label>
    <div class="mt-3">
        @foreach ($errors->get($attributes->get('name')) as $message)
            <div class="alert alert-danger">{{ $message }} </div>
        @endforeach
    </div>
</div>