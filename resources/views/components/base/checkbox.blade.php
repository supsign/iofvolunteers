<div class="form-check">
    <input 
        type="checkbox"
        id="{{ $attributes->get('name') }}"
        value="{{ old($attributes->get('name')) ?? $attributes->get('value') }}"
        {{ $attributes->filter(fn ($value, $key) => !in_array($key, ['label'])) }}
    />
    <label class="form-check-label" for="{{ $attributes->get('name') }}">
        {!! $attributes->get('label') !!}
    </label>
</div>