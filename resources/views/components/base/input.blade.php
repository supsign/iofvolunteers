<div class="form-group">
    <input
            id="field_{{ $attributes->get('name') }}"
            type="{{ $attributes->get('type') ?? 'text' }}"
            class="{{ $attributes->get('class') }}"
            value="{{ old(str_replace(['[', ']'], ['.',''],$attributes->get('name'))) ?? $attributes->get('value') }}"
            {{ $attributes->filter(fn ($value, $key) => $key != 'label') }} />
    <label class="formGroupLabel" for="field_{{ $attributes->get('name') }}">{{ $attributes->get('label') }}</label>

    @isset($iconName)
        <img class="selectArr v2"
             src="{{ asset('images/'.$iconName.'.svg') }}" alt=""/>
    @endisset

    @isset($subtitle)
        {{ $subtitle }}
    @endisset

    <div class="mt-3">
        @foreach($errors->get($attributes->get('name')) as $message)
            <div class="alert alert-danger">{{ $message }} </div>
        @endforeach
    </div>
</div>
