<div class="form-group">
    <label for="{{ $attributes->get('name') }}" class="select label">{{ $attributes->get('label') }}</label>

    <select
            id="{{ $attributes->get('name') }}"
            name="{{ $attributes->get('name') }}"
            {{ $attributes }}
            class="selectOption"
            @if($required)
            required
            @endif
    >
        @if(!$value || !$value->id)
            <option selected disabled value="">-</option>
        @endif

        @foreach($options AS $option)
            <option
                    value="{{ $option->id }}"
                    @if(!is_null(old($attributes->get('name'))) && old($attributes->get('name')) == $option->id
                    OR $value && $value->id === $option->id) selected @endif>{{ $option->name }}
            </option>
        @endforeach
    </select>

    @isset($iconName)
        <img class="selectArr selectArrComponents" src="{{ asset('images/'.$iconName.'.svg') }}" alt=""/>
    @endisset

    <div class="clickReset d-none">
        <img class="selectArr selectArrComponents2" src="{{ asset('images/crossSign.svg') }}" alt=""/>
    </div>

    <div class="mt-3">
        @foreach($errors->get($attributes->get('name')) as $message)
            <div class="alert alert-danger">{{ $message }} </div>
        @endforeach
    </div>
</div>
