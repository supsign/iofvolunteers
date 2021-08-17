<div class="form-group">
    <div class="warn">Gender</div>
    @dump($volunteer)
    <select size="1" name="gender_id" id="gender">
        @php
            if(isset($volunteer)) {
                $oldId= old('gender_id') ?: $volunteer->gender_id;
            }
            else {
                $oldId= old('gender_id');
            }
        @endphp
        @if(!$oldId)
    	    <option selected disabled>Gender</option>
        @endif
        @foreach($genders AS $gender)
            <option value="{{ $gender->id }}" @if($oldId == $gender->id) selected @endif>{{ ucfirst($gender->name) }}</option>
        @endforeach
        @if($isSearch)
            <option value="3" @if($oldId == "3") selected @endif>Doesn't matter</option>
        @endif
         
    </select>
    <img for="gender" class="selectArr selectArrComponents" src="{{ asset('images/selectArr.svg') }}" alt="" />
</div>