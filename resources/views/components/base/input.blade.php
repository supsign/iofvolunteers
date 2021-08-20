<input 
    id="field_{{ $attributes->get('name') }}"
    type={{ $attributes->get('type') }} 
    name={{ $attributes->get('name') }} 
    value="{{ $attributes->get('value') }}"
>
<label class="formGroupLabel" for="field_{{ $attributes->get('name') }}">field_{{ $attributes->get('label') }}</label>
<div class="mt-3">
    @foreach ($errors->get($attributes->get('name')) as $message)
        <div class="alert alert-danger">{{ $message }} </div>
    @endforeach
</div>