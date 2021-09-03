<div class="form-group">
    <textarea
            rows="4"
            cols="30"
            id="{{ $attributes->get('name') }}"
            @if ($required)
                required
            @endif
        {{ $attributes->filter(fn ($value, $key) => !in_array($key, ['label', 'value'])) }}
    >{{ old($attributes->get('name')) ?? $attributes->get('value') }}</textarea>
    <label class="formGroupLabel" for="{{ $attributes->get('name') }}">{!! $attributes->get('label') !!}</label>
</div>
