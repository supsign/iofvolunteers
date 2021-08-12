<div class="form-group">
    <select size="1" name="o_experience[local]" id="competitorExplocal">
        @if(!old('o_experience[local]'))
            <option disabled selected>Local events</option>
        @endif
        @foreach ($experiences->local() as $exp )
            <option value="{{ $exp->id }}" @if(old('o_experience[local]') == $exp->id) selected @endif>{{ $exp->value }}</option>
        @endforeach
    </select>
    <img for="competitorExplocal" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
</div>

<div class="form-group">
    <select size="1" name="o_experience[national]" id="competitorExpnational">
        @if(!old('o_experience[national]'))
            <option disabled selected="" value="">National Championships</option>
        @endif
        @foreach ($experiences->national() as $exp )
            <option value="{{ $exp->id }}" @if(old('o_experience[national]') == $exp->id) selected @endif>{{ $exp->value }}</option>
        @endforeach
    </select>
    <img for="competitorExpnational" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
</div>

<div class="form-group">
    <select size="1" name="o_experience[international]" id="competitorExpinternational">
        @if(!old('o_experience[international]')) 
            <option disabled selected="" value="">International Competitions</option>
        @endif
        @foreach ($experiences->international() as $exp )
            <option value="{{ $exp->id }}" @if(old('o_experience[international]') == $exp->id) selected @endif>{{ $exp->value }}</option>
        @endforeach
    </select>
    <img for="competitorExpinternational" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
</div>