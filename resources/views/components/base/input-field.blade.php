<div class="form-group">
    <input id="field_name" placeholder=" " type={{ $type }} name={{ $name }} value=" {{ $value }}" size="15" required>
    <label class="formGroupLabel" for="field_name"> {{ $label }}</label>
    <div class="mt-3">
        @foreach ($errors->get($name) as $message)
            <div class="alert alert-danger">{{ $message }} </div>
        @endforeach
    </div>
</div>