@extends('layouts.app')
@section('content')
<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title"><img class="title-icon" src="{{asset('images/icon-add.svg')}}" width="65" height="65"> Volunteer Registration Form</h1>

            <div class="title-desc">Please note that you must be 18+ to register as a
                volunteer!</div>
        </div>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="">
            {{-- <input type="hidden" name="MAX_FILE_SIZE" value="{{ MAX_FILE_SIZE }}" /> --}}

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            1. Contact Information
                        </h3>

                        <div class="form-group">
                            <input id="field_name" placeholder=" " type="text" name="name" size="15" required>
                            <label class="formGroupLabel"  for="field_name">Name</label>
                        </div>

                        <div class="form-group">
                            <div class="warn">Country</div>
                            <select type="text" name="country" id="country_id" size="1" value="" required>
                                @foreach($countries AS $country)
                                    <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
                                @endforeach
                            </select>
                            <img for="country" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
                        </div>

                        <div class="form-group">
                            <input id="field_email" placeholder=" " type="text" name="email" size="15" required>
                            <label class="formGroupLabel"  for="field_email">E-mail *</label>
                        </div>

                        <div class="form-group">
                            <input id="field_phone" placeholder=" " type="text" name="phone" value="" size="15">
                            <label class="formGroupLabel"  for="field_phone">Phone </label>
                            <div class="warn">(optional)</div>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            2. Personal Information
                        </h3>

                        <div class="form-group">
                            <div class="warn">Gender</div>
                            <select size="1" name="gender_id" id="gender">
                                @foreach($genders AS $gender)
                                    <option value="{{ $gender->id }}">{{ ucfirst($gender->name) }}</option>
                                @endforeach
                            </select>
                            <img for="gender" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
                        </div>

                        <div class="form-group">
                            <input id="field_birthdate" placeholder=" " type="text" name="birthdate" size="15" value="" class="datepicker-here" data-language='en' data-date-format="yyyy-mm-dd" required>
                            <label class="formGroupLabel"  for="field_birthdate">Date of birth (yyyy-mm-dd) *</label>
                            <img for="field_birthdate" class="selectArr v2" src="{{asset('images/calendarIcon.svg')}}" alt="" />
                        </div>

                        <div class="form-group">
                            <input id="field_nickname" placeholder=" " type="text" name="nickname" size="15" value="">
                            <label class="formGroupLabel"  for="field_nickname">Nickname </label>
                            <div class="warn">optional</div>
                            <div class="warn">if left blank, your first name  will be assumed as your nickname</div>
                        </div>

                        <div class="form-group">
                            <select size="1" name="driving_licence" id="license">
                                <option selected="" value="">International driving license?</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <img for="license" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            3. Disciplines of experience
                        </h3>

                        <div class="form-group">
                            @foreach($disciplines AS $discipline)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="discipline_{{ $discipline->snakeCaseName }}" name="discipline[{{ $discipline->id }}]">
                                    <label class="form-check-label" for="discipline_{{ $discipline->snakeCaseName }}">
                                        {{ $discipline->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <x-orienteering.experience-form />
                    <x-language.experience-form />

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            6. Where to work?
                            <div class="font-italic">
                                Do you have a preferred destination?
                                <br>If not, just tick "Anywhere"
                            </div>
                        </h3>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="continent[0]" id="continent-anywhere">
                                <label class="form-check-label" for="continent-anywhere">
                                    Anywhere
                                </label>
                            </div>

                            @foreach($continents AS $continent)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="continent[{{ $continent->id }}]" id="continent_{{ $continent->snakeCaseName }}">
                                    <label class="form-check-label" for="continent_{{ $continent->snakeCaseName }}">
                                        {{ $continent->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            7. Timing
                            <div class="font-italic">
                                For how long can you work?
                                <div class="warn">(leave blank if you can stay more than 6 weeks)</div>
                            </div>
                        </h3>

                        <div class="form-group">
                            <input placeholder="" type="text" size="3" name="duration" id="duration" value="">
                            <label class="formGroupLabel" for="duration">weeks</label>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            8. Skills
                            <div class="warn"> &nbsp;(Please tick all relevant to you.
                                Details are <b>required</b> if skill is ticked)
                            </div>
                        </h3>

                        <div class="form-group">
                            <div class="formGroupLabelStatic">* Mapping</div>
                            <div class="warn">Notice that you will be required to upload map samples!</div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="mappingDesc[Sprint]" id="mappingDesc1">
                                <label class="form-check-label" for="mappingDesc1">
                                    Sprint
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="mappingDesc[Forest]" id="mappingDesc2">
                                <label class="form-check-label" for="mappingDesc2">
                                    Forest
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="mappingDesc[MTBO]" id="mappingDesc3">
                                <label class="form-check-label" for="mappingDesc3">
                                    MTBO
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="mappingDesc[SkiO]" id="mappingDesc4">
                                <label class="form-check-label" for="mappingDesc4">
                                    SkiO
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="2" cols="30" name="skill_mapping" id="mappingDescInfo" value=""></textarea>
                            <label class="formGroupLabel"  for="mappingDescInfo">Brief outline of your experience as a mapper</label>
                        </div>


                        <div class="form-group">
                            <div class="formGroupLabelStatic">* Coaching</div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="coachDesc[nationalTeam]" id="coachDesc1">
                                <label class="form-check-label" for="coachDesc1">
                                    National Team
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="coachDesc[clubs]" id="coachDesc2">
                                <label class="form-check-label" for="coachDesc2">
                                    Clubs
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="2" cols="30" name="skill_coaching" id="coachDescInfo" value=""></textarea>
                            <label class="formGroupLabel"  for="coachDescInfo">Brief outline of your experience in coaching</label>
                        </div>


                        <div class="form-group">
                            <div class="formGroupLabelStatic">* IT &amp; time-keeping</div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="itDesc[si]" id="itDesc1">
                                <label class="form-check-label" for="itDesc1">
                                    SportIdent
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="itDesc[emit]" id="itDesc2">
                                <label class="form-check-label" for="itDesc2">
                                    Emit
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="itDesc[othertime]" id="itDesc3">
                                <label class="form-check-label" for="itDesc3">
                                    Other Timekeeping
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="itDesc[gps]" id="itDesc4">
                                <label class="form-check-label" for="itDesc4">
                                    GPS Tracking
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="2" cols="30" name="skill_it" id="itDescInfo" value=""></textarea>
                            <label class="formGroupLabel"  for="itDescInfo">Brief details of your IT skills &amp; experience</label>
                        </div>


                        <div class="form-group">
                            <div class="formGroupLabelStatic">* Event Organising</div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="eventDesc[club]" id="eventDesc1">
                                <label class="form-check-label" for="eventDesc1">
                                    Club
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="eventDesc[local]" id="eventDesc2">
                                <label class="form-check-label" for="eventDesc2">
                                    Local
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="eventDesc[national]" id="eventDesc3">
                                <label class="form-check-label" for="eventDesc3">
                                    National
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="eventDesc[highLevel]" id="eventDesc4">
                                <label class="form-check-label" for="eventDesc4">
                                    High-Level
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="2" cols="30" name="skill_event_org" id="eventDescInfo" value=""></textarea>
                            <label class="formGroupLabel"  for="eventDescInfo">Brief outline of your experience as organiser</label>
                        </div>


                        <div class="form-group">
                            <div class="formGroupLabelStatic">* Teaching experience</div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="teacherDesc[beginners]" id="teacherDesc1">
                                <label class="form-check-label" for="teacherDesc1">
                                    Beginners &amp; children
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="teacherDesc[map]" id="teacherDesc2">
                                <label class="form-check-label" for="teacherDesc2">
                                    Teach how to map
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="teacherDesc[coach]" id="teacherDesc3">
                                <label class="form-check-label" for="teacherDesc3">
                                    Teach coaching
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="teacherDesc[it]" id="teacherDesc4">
                                <label class="form-check-label" for="teacherDesc4">
                                    Teach IT &amp; Timekeeping
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="teacherDesc[events]" id="teacherDesc5">
                                <label class="form-check-label" for="teacherDesc5">
                                    Teach Event Organising
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="2" cols="30" name="skill_teaching" id="teacherDescInfo" value=""></textarea>
                            <label class="formGroupLabel"  for="teacherDescInfo">Brief outline of your experience in teaching</label>
                        </div>


                        <div class="form-group">
                            <textarea placeholder=" " rows="2" cols="30" name="skill_other" id="skill_other" value=""></textarea>
                            <label class="formGroupLabel"  for="skill_other">* Other skills? Please explain...</label>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            9. O-Work Experience
                        </h3>

                        <div class="form-group">
                            <select size="1" name="oworkLocalExp[experience]" id="oworkLocalExpexperience">
                                <option selected="" value="">Local / National Events</option>
                                <option value="none">none</option>
                                <option value="1 - 10">1 - 10</option>
                                <option value="11 - 30">11 - 30</option>
                                <option value="over 30">over 30</option>
                            </select>
                            <img for="oworkLocalExpexperience" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
                        </div>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">Duties:</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="oworkLocalExp[director]" id="oworkLocalExp1">
                                <label class="form-check-label" for="oworkLocalExp1">
                                    Event Director
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="oworkLocalExp[mapper]" id="oworkLocalExp2">
                                <label class="form-check-label" for="oworkLocalExp2">
                                    Mapper / Course Planner
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="oworkLocalExp[it]" id="oworkLocalExp3">
                                <label class="form-check-label" for="oworkLocalExp3">
                                    IT Director
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="oworkLocalExp[advisor]" id="oworkLocalExp4">
                                <label class="form-check-label" for="oworkLocalExp4">
                                    Event Advisor
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="oworkLocalExp[jury]" id="oworkLocalExp5">
                                <label class="form-check-label" for="oworkLocalExp5">
                                    Jury Member
                                </label>
                            </div>

                            <div class="form-group">
                                <input id="field_oworkLocalExpother" placeholder=" " type="text" name="oworkLocalExp[other]" value="" size="20">
                                <label class="formGroupLabel"  for="field_oworkLocalExpother">Other duties? State below...</label>
                            </div>
                        </div>


                        <div class="form-group">
                            <select size="1" name="oworkInternationalExp[experience]" id="oworkInternationalExpexperience">
                                <option selected="" value="">International Events</option>
                                <option value="none">none</option>
                                <option value="1 - 10">1 - 10</option>
                                <option value="11 - 20">11 - 20</option>
                                <option value="over 20">over 20</option>
                            </select>
                            <img for="oworkInternationalExpexperience" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
                        </div>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">Duties:</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="oworkInternationalExp[director]" id="oworkInternationalExp1">
                                <label class="form-check-label" for="oworkInternationalExp1">
                                    Event Director
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="oworkInternationalExp[mapper]" id="oworkInternationalExp2">
                                <label class="form-check-label" for="oworkInternationalExp2">
                                    Mapper / Course Planner
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="oworkInternationalExp[it]" id="oworkInternationalExp3">
                                <label class="form-check-label" for="oworkInternationalExp3">
                                    IT Director
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="oworkInternationalExp[advisor]" id="oworkInternationalExp4">
                                <label class="form-check-label" for="oworkInternationalExp4">
                                    Event Advisor
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="oworkInternationalExp[jury]" id="oworkInternationalExp5">
                                <label class="form-check-label" for="oworkInternationalExp5">
                                    Jury Member
                                </label>
                            </div>

                            <div class="form-group">
                                <input id="field_oworkInternationalExpinfo" placeholder=" " type="text" name="oworkInternationalExp[info]" value="" size="20">
                                <label class="formGroupLabel"  for="field_oworkInternationalExpinfo">Other duties? State below...</label>
                            </div>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            10. Additional Information
                        </h3>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">Skilled in mapping? Upload your "best" maps here...</label>
                            <div class="warn">Required for mappers!
                                <br>(At most 3 maps in PDF format, max file size is 2 Mb)

                                @if(isset($maps) && $maps)
                                    <p>Already loaded maps:
                                        @foreach ($maps AS $key => $map)
                                            <a href="" target="_blank">Map {{ ++$key }}</a>
                                        @endforeach
                                        <br/><span class="warn">New maps will erase previously loaded</span>
                                    </p>
                                @endif
                            </div>

                            <div class="mt-3 custom-file">
                                <input type="file" class="custom-file-input" id="mapsFile1" name="maps[]" accept=".pdf">
                                <label class="custom-file-label" for="mapsFile1">Choose file</label>
                            </div>

                            <div class="mt-3 custom-file">
                                <input type="file" class="custom-file-input" id="mapsFile2" name="maps[]" accept=".pdf">
                                <label class="custom-file-label" for="mapsFile2">Choose file</label>
                            </div>

                            <div class="mt-3 custom-file">
                                <input type="file" class="custom-file-input" id="mapsFile3" name="maps[]" accept=".pdf">
                                <label class="custom-file-label" for="mapsFile3">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea placeholder="" rows="4" cols="30" name="help" id="help" value="" required></textarea>
                            <label class="formGroupLabel" for="help">Explain how you can help as a volunteer *</label>
                        </div>

                        <div class="form-group">
                            <textarea placeholder="" rows="4" cols="30" name="expectation" id="expectation" value=""></textarea>
                            <label class="formGroupLabel" for="expectation">Expectations as a volunteer</label>
                        </div>

                        <div class="form-group">
                            <textarea placeholder="" rows="4" cols="30" name="experience" id="experience" value=""></textarea>
                            <label class="formGroupLabel" for="experience">Experience abroad? When? Where? What?</label>
                        </div>

                        <div class="form-group">
                            <textarea placeholder="" rows="4" cols="30" name="education" id="education" value=""></textarea>
                            <label class="formGroupLabel" for="education">Seminars, Training Camps attended...</label>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="sticky">
                        <div class="noteWrap">
                            <h3 class="noteTitle">Disclaimer</h3>
                            <p>I have filled in my details
                            above as accurately as possible. By submitting this form, I state that I am a volunteer in
                            developing orienteering. I understand that the IOF cannot be held responsible for my being or not
                            being recruited as a volunteer. I also understand that should I choose to accept any offer
                            requesting my assistance, the IOF cannot be held responsible for the terms under which I will work
                                as a volunteer.</p>
                        </div>

                        <div class="formSection">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="iAgreeWithTerms" id="iAgreeWithTerms" required>
                                    <label class="form-check-label" for="iAgreeWithTerms">
                                        I have read and understood the above.
                                    </label>
                                    <div class="warn"> Please tick the disclaimer...</div>
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <input class="ml-auto" type="submit" value="Submit my details">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
