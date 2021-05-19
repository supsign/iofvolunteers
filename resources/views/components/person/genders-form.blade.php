<div class="form-group">
    <div class="warn">Gender</div>
    <select size="1" name="gender_id" id="gender">
        @foreach($genders AS $gender)
            <option value="{{ $gender->id }}">{{ ucfirst($gender->name) }}</option>
        @endforeach
    </select>
    <img for="gender" class="selectArr" src="{{ asset('images/selectArr.svg') }}" alt="" />
</div>