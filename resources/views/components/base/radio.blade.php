<div class="form-group form-inline">
    <div class="form-check">
        <label class="form-check-label">
            {{ $attributes->get('label') }}
        </label>
    </div>

    @php
        $i = 1;
    @endphp

    @foreach($options AS $option)
        <div class="form-check">
            <input
                   class="form-check-input"
                   type="radio"
                   id="{{ $attributes->get('name') }}_{{ $i }}"
                   name="{{ $attributes->get('name') }}"
                   value="{{ $option->id }}"
                   @if($option->id == old($attributes->get('name')) || $option->id == $attributes->get('value')) checked @endif
            {{ $attributes->filter(fn ($value, $key) => !in_array($key, ['label', 'value'])) }}
            >
            <label class="form-check-label" for="{{ $attributes->get('name') }}_{{ $i }}">
                {{ $option->name }}
            </label>
        </div>
        @php
            $i++
        @endphp
    @endforeach
</div>
