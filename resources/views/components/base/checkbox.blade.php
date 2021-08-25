<div class="form-check">
    <input
           hidden
           id="{{ $attributes->get('name') }}_hidden_false"
           type="checkbox"
           name="{{ $attributes->get('name') }}"
           value="0"
           checked />
    <input
           type="checkbox"
           id="{{ $attributes->get('name') }}"
           name="{{ $attributes->get('name') }}"
           value="1"
           @if(
    old(str_replace(['[', ']'], ['.',''],$attributes->get('name'))
    ) || $checked) checked @endif
    class="{{ $attributes->get('class') }}"
    />
    <label class="form-check-label" for="{{ $attributes->get('name') }}">
        {!! $attributes->get('label') !!}
    </label>
</div>
