<div class="form-group">
    <div class="form-check">
        <input 
            class= {{ $attributes->get('class') }}
            id="checkbox_{{ $attributes->get('name') }}" 
            name="{{ $attributes->get('name') }}"
            type="{{ $attributes->get('type') }}"
            value="{{ $attributes->get('value') }}"

        >
        <label class="form-check-label" for="checkbox_{{ $attributes->get('name') }}">
            {{ $attributes->get('name') }}
        </label>
    </div>
</div>