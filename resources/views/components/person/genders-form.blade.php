<div class="form-group">
    <div class="warn">Gender</div>
    <select size="1" name="gender_id" id="gender">
        @if(!old('gender_id'))
    	    <option selected disabled>Gender</option>
        @endif
        @foreach($genders AS $gender)
            <option value="{{ $gender->id }}" @if(old('gender_id') == $gender->id) selected @endif>{{ ucfirst($gender->name) }}</option>
        @endforeach
        @if($isSearch)
            <option value="3" @if(old('gender_id') == "3") selected @endif>Doesn't matter</option>
        @endif
    </select>
    <img for="gender" class="selectArr selectArrComponents" src="{{ asset('images/selectArr.svg') }}" alt="" />
</div>