<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title"><img class="title-icon" src="{{ $imagePath }}/icon-add.svg" width="65" height="65"> Volunteer Registration Form</h1>

            <div class="title-desc">Please note that you must be 18+ to register as a
                volunteer!</div>
        </div>

        <form method="POST" action="volunteer/register" enctype="multipart/form-data">
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
                            <select type="text" name="country" id="country" size="1" value="" required>
                                {{ $countries }}
                            </select>
                            <div class="warn">Country</div>
                            <img for="country" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
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
                            <select size="1" name="gender" id="gender">
                                @foreach($genders AS $gender)
                                    <option value="{{ $gender->short_name }}">{{ ucfirst($gender->name) }}</option>
                                @endforeach
                            </select>
                            <img for="gender" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
                        </div>

                        <div class="form-group">
                            <input id="field_birthdate" placeholder=" " type="text" name="birthdate" size="15" value="" class="datepicker-here" data-language='en' data-date-format="yyyy-mm-dd" required>
                            <label class="formGroupLabel"  for="field_birthdate">Date of birth (yyyy-mm-dd) *</label>
                            <img for="field_birthdate" class="selectArr v2" src="{{ $imagePath }}/calendarIcon.svg" alt="" />
                        </div>

                        <div class="form-group">
                            <input id="field_nickname" placeholder=" " type="text" name="nickname" size="15" value="">
                            <label class="formGroupLabel"  for="field_nickname">Nickname </label>
                            <div class="warn">optional</div>
                            <div class="warn">if left blank, your first name  will be assumed as your nickname</div>
                        </div>

                        <div class="form-group">
                            <select size="1" name="license" id="license">
                                <option selected="" value="">International driving license?</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <img for="license" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            3. Disciplines of experience
                        </h3>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="footO" name="footO">
                                <label class="form-check-label" for="footO">
                                    Foot-O
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="mtbO" name="mtbO">
                                <label class="form-check-label" for="mtbO">
                                    MTBO
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="skiO" name="skiO">
                                <label class="form-check-label" for="skiO">
                                    Ski-O
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="trailO" name="trailO">
                                <label class="form-check-label" for="trailO">
                                    Trail-O
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            4. O-Experience
                        </h3>

                        <div class="form-group">
                            <input type="number" min="1900" max="2099" step="1" name="startO" size="4" id="field_startO" class="datepicker-here" data-language='en' data-date-format="yyyy" data-view="years" data-min-view="years" placeholder=" " value="" required>
                            <label class="formGroupLabel"  for="field_startO">Year you started orienteering (yyyy) *</label>
                            <img for="field_startO" class="selectArr v2" src="{{ $imagePath }}/calendarIcon.svg" alt="" />
                        </div>

                        <div class="form-group">
                            <input id="field_club" placeholder=" " type="text" name="club" size="20">
                            <label class="formGroupLabel"  for="field_club">Your present club (if any)</label>
                            <div class="font-italic">
                                Experience as Competitor
                            </div>
                        </div>

                        <div class="form-group">
                            <select size="1" name="competitorExp[local]" id="competitorExplocal">
                                <option selected="" value="">Local events</option>
                                <option value="none">none</option>
                                <option value="1 - 50">1 - 50</option>
                                <option value="51 - 100">51 - 100</option>
                                <option value="over 100">over 100</option>
                            </select>
                            <img for="competitorExplocal" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
                        </div>

                        <div class="form-group">
                            <select size="1" name="competitorExp[national]" id="competitorExpnational">
                                <option selected="" value="">National Championships</option>
                                <option value="none">none</option>
                                <option value="1 - 50">1 - 50</option>
                                <option value="51 - 100">51 - 100</option>
                                <option value="over 100">over 100</option>
                            </select>
                            <img for="competitorExpnational" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
                        </div>

                        <div class="form-group">
                            <select size="1" name="competitorExp[international]" id="competitorExpinternational">
                                <option selected="" value="">International Competitions</option>
                                <option value="none">none</option>
                                <option value="1 - 20">1 - 20</option>
                                <option value="21 - 50">21 - 50</option>
                                <option value="over 50">over 50</option>
                            </select>
                            <img for="competitorExpinternational" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            5. Languages spoken
                            <div class="warn"> (required, even if only listed in "other")</div>
                        </h3>

                        <div class="form-group form-inline">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[English][known]" value="1" id="languages1_1">
                                <label class="form-check-label" for="languages1_1">
                                    English
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[English][level]" value="Excellent" id="languages1_2">
                                <label class="form-check-label" for="languages1_2">
                                    Excellent
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[English][level]" value="OK" id="languages1_3">
                                <label class="form-check-label" for="languages1_3">
                                    OK
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[English][level]" value="Poor" id="languages1_4">
                                <label class="form-check-label" for="languages1_4">
                                    Poor
                                </label>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[French][known]" value="1" id="languages2_1">
                                <label class="form-check-label" for="languages2_1">
                                    French
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[French][level]" value="Excellent" id="languages2_2">
                                <label class="form-check-label" for="languages2_2">
                                    Excellent
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[French][level]" value="OK" id="languages2_3">
                                <label class="form-check-label" for="languages2_3">
                                    OK
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[French][level]" value="Poor" id="languages2_4">
                                <label class="form-check-label" for="languages2_4">
                                    Poor
                                </label>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[Spanish][known]" value="1" id="languages3_1">
                                <label class="form-check-label" for="languages3_1">
                                    Spanish
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Spanish][level]" value="Excellent" id="languages3_2">
                                <label class="form-check-label" for="languages3_2">
                                    Excellent
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Spanish][level]" value="OK" id="languages3_3">
                                <label class="form-check-label" for="languages3_3">
                                    OK
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Spanish][level]" value="Poor" id="languages3_4">
                                <label class="form-check-label" for="languages3_4">
                                    Poor
                                </label>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[German][known]" value="1" id="languages4_1">
                                <label class="form-check-label" for="languages4_1">
                                    German
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[German][level]" value="Excellent" id="languages4_2">
                                <label class="form-check-label" for="languages4_2">
                                    Excellent
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[German][level]" value="OK" id="languages4_3">
                                <label class="form-check-label" for="languages4_3">
                                    OK
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[German][level]" value="Poor" id="languages4_4">
                                <label class="form-check-label" for="languages4_4">
                                    Poor
                                </label>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[Italian][known]" value="1" id="languages5_1">
                                <label class="form-check-label" for="languages5_1">
                                    Italian
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Italian][level]" value="Excellent" id="languages5_2">
                                <label class="form-check-label" for="languages5_2">
                                    Excellent
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Italian][level]" value="OK" id="languages5_3">
                                <label class="form-check-label" for="languages5_3">
                                    OK
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Italian][level]" value="Poor" id="languages5_4">
                                <label class="form-check-label" for="languages5_4">
                                    Poor
                                </label>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[Portuguese][known]" value="1" id="languages6_1">
                                <label class="form-check-label" for="languages6_1">
                                    Portuguese
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Portuguese][level]" value="Excellent" id="languages6_2">
                                <label class="form-check-label" for="languages6_2">
                                    Excellent
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Portuguese][level]" value="OK" id="languages6_3">
                                <label class="form-check-label" for="languages6_3">
                                    OK
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Portuguese][level]" value="Poor" id="languages6_4">
                                <label class="form-check-label" for="languages6_4">
                                    Poor
                                </label>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[Scandinavian][known]" value="1" id="languages7_1">
                                <label class="form-check-label" for="languages7_1">
                                    Scandinavian
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Scandinavian][level]" value="Excellent" id="languages7_2">
                                <label class="form-check-label" for="languages7_2">
                                    Excellent
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Scandinavian][level]" value="OK" id="languages7_3">
                                <label class="form-check-label" for="languages7_3">
                                    OK
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="languages[Scandinavian][level]" value="Poor" id="languages7_4">
                                <label class="form-check-label" for="languages7_4">
                                    Poor
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input id="field_languagesOther" placeholder=" " type="text" name="languages[Other]" value="" size="30">
                            <label class="formGroupLabel"  for="field_languagesOther">Other languages?</label>
                            <div class="font-italic">
                                State each language and level, separated by commas below...
                            </div>
                        </div>
                    </div>

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
                                <input class="form-check-input" type="checkbox" value="1" name="preferredContinents[Anywhere]" id="preferredContinents1">
                                <label class="form-check-label" for="preferredContinents1">
                                    Anywhere
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="preferredContinents[North America]" id="preferredContinents2">
                                <label class="form-check-label" for="preferredContinents2">
                                    North America
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="preferredContinents[South America]" id="preferredContinents3">
                                <label class="form-check-label" for="preferredContinents3">
                                    South America
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="preferredContinents[Europe]" id="preferredContinents4">
                                <label class="form-check-label" for="preferredContinents4">
                                    Europe
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="preferredContinents[Asia]" id="preferredContinents5">
                                <label class="form-check-label" for="preferredContinents5">
                                    Asia
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="preferredContinents[Africa]" id="preferredContinents6">
                                <label class="form-check-label" for="preferredContinents6">
                                    Africa
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="preferredContinents[Oceania]" id="preferredContinents7">
                                <label class="form-check-label" for="preferredContinents7">
                                    Oceania
                                </label>
                            </div>

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
                            <input placeholder=" " type="text" size="3" name="maxWorkDuration" id="maxWorkDuration" value="">
                            <label class="formGroupLabel"  for="maxWorkDuration">weeks</label>
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
                            <textarea placeholder=" " rows="2" cols="30" name="mappingDesc[info]" id="mappingDescInfo" value=""></textarea>
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
                            <textarea placeholder=" " rows="2" cols="30" name="coachDesc[info]" id="coachDescInfo" value=""></textarea>
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
                            <textarea placeholder=" " rows="2" cols="30" name="itDesc[info]" id="itDescInfo" value=""></textarea>
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
                            <textarea placeholder=" " rows="2" cols="30" name="eventDesc[info]" id="eventDescInfo" value=""></textarea>
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
                            <textarea placeholder=" " rows="2" cols="30" name="teacherDesc[info]" id="teacherDescInfo" value=""></textarea>
                            <label class="formGroupLabel"  for="teacherDescInfo">Brief outline of your experience in teaching</label>
                        </div>


                        <div class="form-group">
                            <textarea placeholder=" " rows="2" cols="30" name="otherSkills" id="otherSkills" value=""></textarea>
                            <label class="formGroupLabel"  for="otherSkills">* Other skills? Please explain...</label>
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
                            <img for="oworkLocalExpexperience" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
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
                            <img for="oworkInternationalExpexperience" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
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

                            <div class="custom-file mt-3">
                                <input type="file" class="custom-file-input" id="mapsFile1" name="maps[]" accept=".pdf">
                                <label class="custom-file-label" for="mapsFile1">Choose file</label>
                            </div>

                            <div class="custom-file mt-3">
                                <input type="file" class="custom-file-input" id="mapsFile2" name="maps[]" accept=".pdf">
                                <label class="custom-file-label" for="mapsFile2">Choose file</label>
                            </div>

                            <div class="custom-file mt-3">
                                <input type="file" class="custom-file-input" id="mapsFile3" name="maps[]" accept=".pdf">
                                <label class="custom-file-label" for="mapsFile3">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="4" cols="30" name="helpDesc" id="helpDesc" value="" required></textarea>
                            <label class="formGroupLabel"  for="helpDesc">Explain how you can help as a volunteer *</label>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="4" cols="30" name="expectations" id="expectations" value=""></textarea>
                            <label class="formGroupLabel"  for="expectations">Expectations as a volunteer</label>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="4" cols="30" name="abroadExp" id="abroadExp" value=""></textarea>
                            <label class="formGroupLabel"  for="abroadExp">Experience abroad? When? Where? What?</label>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="4" cols="30" name="learning" id="learning" value=""></textarea>
                            <label class="formGroupLabel"  for="learning">Seminars, Training Camps attended...</label>
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