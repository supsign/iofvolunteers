<input 
    id="field_{{ $attributes->get('name') }}"
    type="{{ $attributes->get('type') ?? 'text' }}"
    name="{{ $attributes->get('name') }}"
    value="{{ $attributes->get('value') ?? '' }}"
>