<div class="form-group">
    <input 
        id="{{ $attributes->get('name') }}"
        type="{{ $attributes->get('type') ?? 'text' }}"
        value="{{ old($attributes->get('name')) ?? $attributes->get('value') }}"
        {{ $attributes->filter(fn ($value, $key) => !in_array($key, ['label'])) }}
    />
    <label class="formGroupLabel" for="field_{{ $attributes->get('name') }}">{{ $attributes->get('label') }}</label>

    @isset($subtitle)
        {{ $subtitle }}
    @endisset

    <div class="mt-3">
        @foreach ($errors->get($attributes->get('name')) as $message)
            <div class="alert alert-danger">{{ $message }} </div>
        @endforeach
    </div>
</div>