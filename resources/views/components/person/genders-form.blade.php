<div class="form-group">
    <div class="warn">Gender</div>
    <select size="1" name="gender_id" id="gender">
    	<option selected disabled>Gender</option>
        @foreach($genders AS $gender)
            <option value="{{ $gender->id }}">{{ ucfirst($gender->name) }}</option>
        @endforeach
        @isset($isSearch)
            <option value="3">Doesn't matter</option>
        @endif
    </select>
    <img for="gender" class="selectArr" src="{{ asset('images/selectArr.svg') }}" alt="" />
</div>