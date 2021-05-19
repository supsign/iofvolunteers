<div class="form-group">
    <select size="1" name="o_experience[local]" id="competitorExplocal">
        <option disabled selected="" value="">Local events</option>
        @foreach ($experiences->local() as $exp )
            <option value="{{ $exp->id }}">{{ $exp->value }}</option>
        @endforeach
    </select>
    <img for="competitorExplocal" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
</div>

<div class="form-group">
    <select size="1" name="o_experience[national]" id="competitorExpnational">
        <option disabled selected="" value="">National Championships</option>
        @foreach ($experiences->national() as $exp )
        <option value="{{ $exp->id }}">{{ $exp->value }}</option>
    @endforeach
    </select>
    <img for="competitorExpnational" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
</div>

<div class="form-group">
    <select size="1" name="o_experience[international]" id="competitorExpinternational">
        <option disabled selected="" value="">International Competitions</option>
        @foreach ($experiences->international() as $exp )
        <option value="{{ $exp->id }}">{{ $exp->value }}</option>
    @endforeach
    </select>
    <img for="competitorExpinternational" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
</div>