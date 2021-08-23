<div class="form-group form-inline">
    <div class="form-check">
        <label class="form-check-label">
            {{ $attributes->get('label') }}
        </label>
    </div>

    @foreach($options AS $option)
        <div class="form-check">
            <input
                type="radio"
                id="{{ $attributes->get('name') }}"
                name="{{ $attributes->get('name') }}"
                value="{{ $option->id }}"
                @if($option->id == old($attributes->get('name')) || $option->id == $attributes->get('value')) checked @endif
                {{ $attributes->filter(fn ($value, $key) => !in_array($key, ['label', 'value'])) }}
            >
            <label class="form-check-label" for="{{ $attributes->get('name') }}">
                {{ $option->name }}
            </label>
        </div>
    @endforeach
</div>