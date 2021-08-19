<div class="formSection">
    @isset($title)
    <h3 class="formSectionTitle">
        {{ $title }}
    </h3>
    @endisset
    
    <div class="form-group">     
        <input type="number" min="1900" max="2099" step="1" name="ol_duration" value="{{ old('ol_duration') ?? $item?->ol_duration }}" size="4" id="ol_duration" class="datepicker-here" data-language='en' data-date-format="yyyy" data-view="years" data-min-view="years" placeholder=" " value="" required>
        <label class="formGroupLabel"  for="ol_duration">Year you started orienteering (yyyy) *</label>
        <img for="ol_duration" class="selectArr v2" src="{{asset('images/calendarIcon.svg')}}" alt="" />
        <div class="mt-3">
            @foreach ($errors->get('ol_duration') as $message)
                <div class="alert alert-danger">{{ $message }} </div>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        <input id="field_club" placeholder=" " type="text" name="club" value="{{ old('club') ?? $item?->club }}" size="20">
        <label class="formGroupLabel"  for="field_club">Your present club (if any)</label>
        <div class="font-italic">
            Experience as Competitor
        </div>
    </div>

    <div class="form-group">
        <input type="number" min="0" step="1" name="local_experience" value="{{ old('local_experience') ?? $item?->local_experience }}" id="local_experience">
        <label class="formGroupLabel" for="local_experience">Exprience with local Events</label>
    </div>

    <div class="form-group">
        <input type="number" min="0" step="1" name="national_experience" value="{{ old('national_experience') ?? $item?->national_experience }}" id="national_experience">
        <label class="formGroupLabel" for="national_experience_id">Exprience with national Events</label>
    </div>

    <div class="form-group">
        <input type="number" min="0" step="1" name="international_experience" value="{{ old('international_experience') ?? $item?->international_experience }}" id="international_experience">
        <label class="formGroupLabel" for="international_experience_id">Exprience with international Events</label>
    </div>
</div>