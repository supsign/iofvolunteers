<div class="formSection">
    <h3 class="formSectionTitle">
        4. O-Experience
    </h3>

    <div class="form-group">
        <input type="number" min="1900" max="2099" step="1" name="ol_duration" size="4" id="ol_duration" class="datepicker-here" data-language='en' data-date-format="yyyy" data-view="years" data-min-view="years" placeholder=" " value="" required>
        <label class="formGroupLabel"  for="ol_duration">Year you started orienteering (yyyy) *</label>
        <img for="ol_duration" class="selectArr v2" src="{{asset('images/calendarIcon.svg')}}" alt="" />
    </div>

    <div class="form-group">
        <input id="field_club" placeholder=" " type="text" name="club" size="20">
        <label class="formGroupLabel"  for="field_club">Your present club (if any)</label>
        <div class="font-italic">
            Experience as Competitor
        </div>
    </div>

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
</div>