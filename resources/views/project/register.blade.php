@extends('layouts.app')
@section('content')
<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="pb-0 title"><img class="title-icon" src="{{asset('images/icon-add3.svg')}}" width="65" height="65"> Project Registration Form</h1>
        </div>

        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="">

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="formSection">
                        <h3 class="formSectionTitle">
                           1. Details of the Organisation *</span>
                        </h3>

                        <div class="form-group">
                            <input id="field_name" placeholder=" " type="text" name="name" size="20">
                            <label class="formGroupLabel"  for="field_name">Name of the organisation</label>
                            <div class="mt-3">
                                @foreach ($errors->get('name') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <select size="1" name="status">
                                <option selected="" value="">Status</option>
                                <option value="Federation">Federation</option>
                                <option value="Club">Club</option>
                                <option value="Informal Group">Informal Group</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input id="field_webpage" placeholder=" " type="text" name="webpage" size="20">
                            <label class="formGroupLabel"  for="field_webpage">Web page (if exists)</label>
                        </div>

                        <div class="form-group">
                            <select size="1" name="region">
                                <option selected="" value="">Region</option>
                                <option value="North America"> North America</option>
                                <option value="South America"> South America</option>
                                <option value="Europe"> Europe</option>
                                <option value="Asia"> Asia</option>
                                <option value="Africa"> Africa</option>
                                <option value="Oceania"> Oceania</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input id="field_contact" placeholder=" " type="text" name="contact" size="20" value="">
                            <label class="formGroupLabel"  for="field_contact">Contact person</label>
                        </div>

                        <div class="form-group">
                            <input id="field_position" placeholder=" " type="text" name="position" size="20">
                            <label class="formGroupLabel"  for="field_position">Position in the organisation</label>
                        </div>

                        <div class="form-group">
                            <div class="warn">Country</div>
                            <select type="text" name="country" id="country" size="1" value="" required>
                                @foreach($countries AS $country)
                                    <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
                                @endforeach
                            </select>
                            <img for="country" class="selectArr selectArrComponents" src="{{asset('images/selectArr.svg')}}" alt="" />
                        </div>

                        <div class="form-group">
                            <input id="field_email" placeholder=" " type="text" name="email" size="20" value="">
                            <label class="formGroupLabel"  for="field_email">E-mail</label>
                        </div>

                        <div class="form-group">
                            <input id="field_phone" placeholder=" " type="text" name="phone" size="10">
                            <label class="formGroupLabel"  for="field_phone">Phone</label>
                        </div>

                        <div class="form-group">
                            <input id="field_language" placeholder=" " type="text" name="language" size="20">
                            <label class="formGroupLabel"  for="field_language">Native language(s)</label>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            2. Details of the Project
                        </h3>

                        <div class="form-group">
                            <input type="text" id="field_place" placeholder=" " name="place" size="30">
                            <label class="formGroupLabel"  for="field_place">Where will the volunteer be working? *</label>
                        </div>

                        <div class="form-group">
                            <input id="field_startDate" placeholder=" " type="text" name="startDate" size="10" >
                            <label class="formGroupLabel"  for="field_startDate">When is the volunteer expected to start?</label>
                        </div>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">What can you offer the volunteer? *</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[international_travel_expenses]" id="offer1">
                                <label class="form-check-label" for="offer1">
                                    International travel expenses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[domestic_travel_expenses]" id="offer2">
                                <label class="form-check-label" for="offer2">
                                    Domestic travel expenses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[accommodation]" id="offer3">
                                <label class="form-check-label" for="offer3">
                                    Accommodation
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[meals]" id="offer4">
                                <label class="form-check-label" for="offer4">
                                    Meals
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[pocket_money]" id="offer5">
                                <label class="form-check-label" for="offer5">
                                    Pocket money
                                </label>
                            </div>

                            <div class="mt-2 form-group">
                                <input id="field_offerother" placeholder=" " type="text" name="offer[other]" size="20">
                                <label class="formGroupLabel"  for="field_offerother">Other (please state):</label>
                            </div>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            3. Discipline of Project *
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
                            4. Skills required
                            <div class="warn">
                                &nbsp;(Please tick all relevant to the project)
                            </div>
                        </h3>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">* Mapping</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="mappingDesc[Sprint]" id="mappingSkilled1">
                                <label class="form-check-label" for="mappingSkilled1">
                                    Sprint
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="mappingDesc[Forest]" id="mappingSkilled2">
                                <label class="form-check-label" for="mappingSkilled2">
                                    Forest
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="mappingDesc[MTBO]" id="mappingSkilled3">
                                <label class="form-check-label" for="mappingSkilled3">
                                    MTBO
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="mappingDesc[SkiO]" id="mappingSkilled4">
                                <label class="form-check-label" for="mappingSkilled4">
                                    Ski-O
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">* Coaching</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="coachDesc[nationalTeam]" id="coachSkilled1">
                                <label class="form-check-label" for="coachSkilled1">
                                    National Team
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="coachDesc[clubs]" id="coachSkilled2">
                                <label class="form-check-label" for="coachSkilled2">
                                    Clubs
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">* IT &amp; time-keeping</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="itDesc[si]" id="itSkilled1">
                                <label class="form-check-label" for="itSkilled1">
                                    SportIdent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="itDesc[emit]" id="itSkilled2">
                                <label class="form-check-label" for="itSkilled2">
                                    Emit
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="itDesc[gps]" id="itSkilled3">
                                <label class="form-check-label" for="itSkilled3">
                                    GPS Tracking
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">* Event Organising</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="eventDesc[club]" id="eventSkilled1">
                                <label class="form-check-label" for="eventSkilled1">
                                    Club
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="eventDesc[local]" id="eventSkilled2">
                                <label class="form-check-label" for="eventSkilled2">
                                    Local
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="eventDesc[national]" id="eventSkilled3">
                                <label class="form-check-label" for="eventSkilled3">
                                    National
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="eventDesc[highLevel]" id="eventSkilled4">
                                <label class="form-check-label" for="eventSkilled4">
                                    High-Level
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="teacherDesc[materials]" id="teacherDesc1">
                                <label class="form-check-label" for="teacherDesc1">
                                    Development of Educational Material
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="teacherDesc[beginners]" id="teacherDesc2">
                                <label class="form-check-label" for="teacherDesc2">
                                    Beginners &amp; children
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            5. Experience required
                            <div class="warn"> &nbsp;(Select if relevant to the project)</div>
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

                        <div class="form-group">
                            <textarea  placeholder=" " rows="4" cols="50" name="details" id="details"></textarea>
                            <label class="formGroupLabel"  for="details">Details of the work to be done *</label>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            6. Personal details of Volunteer
                            <div class="warn"> &nbsp;(Just skip if not important)</div>
                        </h3>

                        <div class="form-group">
                            <select size="1" name="gender">
                                <option selected="" value="">Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select size="1" name="age">
                                <option selected="" value="">Age</option>
                                <option value="Under 25">Under 25</option>
                                <option value="25 - 35">25 - 35</option>
                                <option value="36 - 50">36 - 50</option>
                                <option value="Over 50">Over 50</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select size="1" name="license">
                                <option selected="" value="">International driving license?</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input id="field_expectedLanguage" placeholder=" " type="text" name="expectedLanguage" size="20">
                            <label class="formGroupLabel"  for="field_expectedLanguage">Language expectations</label>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            7. Disciplines of experience
                        </h3>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="expectedDisciplines1" name="expectedDisciplines[footO]">
                                <label class="form-check-label" for="expectedDisciplines1">
                                    Foot-O
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="expectedDisciplines2" name="expectedDisciplines[mtbO]">
                                <label class="form-check-label" for="expectedDisciplines2">
                                    MTBO
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="expectedDisciplines3" name="expectedDisciplines[skiO]">
                                <label class="form-check-label" for="expectedDisciplines3">
                                    Ski-O
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="expectedDisciplines4" name="expectedDisciplines[trailO]">
                                <label class="form-check-label" for="expectedDisciplines4">
                                    Trail-O
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            8. O-Experience
                        </h3>

                        <div class="form-group">
                            <select size="1" name="expirience[years]">
                                <option selected="" value="">Years of experience</option>
                                <option value="Under 5">Under 5</option>
                                <option value="5 - 9">5 - 9</option>
                                <option value="10 - 20">10 - 20</option>
                                <option value="Over 20">Over 20</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">Competed in...</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="expirience[local]" id="expirience1">
                                <label class="form-check-label" for="expirience1">
                                    Local events
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="expirience[national]" id="expirience2">
                                <label class="form-check-label" for="expirience2">
                                    National Championships
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="expirience[international]" id="expirience3">
                                <label class="form-check-label" for="expirience3">
                                    International Competitions
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="sticky">
                        <div class="noteWrap">
                            <h3 class="noteTitle">Disclaimer</h3>
                            <p>
                                The details above are as accurate as possible. We understand that
                                the
                                IOF cannot be held responsible for our finding or not finding a suitable volunteer. We also
                                understand that should we choose to recruit a volunteer through this database, the IOF cannot be
                                held responsible for the terms or quality of work produced.
                            </p>
                        </div>

                        <div class="formSection">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="iAgreeWithTerms" id="iAgreeWithTerms" required>
                                    <label class="form-check-label" for="iAgreeWithTerms">
                                        I have read and understood the above. *
                                    </label>
                                    <div class="warn">Mandatory: Please accept the disclaimer.</div>
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <input class="ml-auto" type="submit" value="Submit our request">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection