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
                name="{{ $attributes->get('label') }}"      {{-- .'['.$option->id.']' --}}
                value="{{ $option->id }}"
                id="{{ $attributes->get('name') }}"
                {{ $attributes->filter(fn ($value, $key) => !in_array($key, ['label'])) }}
            >
            <label class="form-check-label" for="{{ $attributes->get('name') }}">
                {{ $option->name }}
            </label>
        </div>
    @endforeach
</div>