@extends('layouts.app')
@section('content')

<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title"><img class="title-icon" src="{{asset('images/icon-search1.svg')}}" width="65" height="65"> Volunteer Search Form</h1>

            <div class="title-desc">Please fill in your search criteriaicon-search1.svg. Leave blank if not relevant / important!</div>
        </div>

        <form method="POST" action="volunteer/search" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            1. Personal Information
                        </h3>

                        <div class="form-group">
                            <select size="1" name="gender" id="gender">
                                <option selected="" value="">Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            <img for="gender" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt="" />
                        </div>

                        <div class="form-group">
                            <div class="mx-0 row">
                                <div class="pl-0 pr-0 form-group col-12 col-sm-6 pr-sm-2">
                                    <input id="field_minage" placeholder=" " type="text" name="minage" size="2">
                                    <label class="formGroupLabel"  for="field_minage">Age (at least)</label>
                                    <div class="warn">
                                        Note that volunteers under 18 are not allowed to register in the Platform
                                    </div>
                                </div>
                                <div class="pl-0 pr-0 form-group col-12 col-sm-6 pl-sm-2">
                                    <input id="field_maxage" placeholder=" " type="text" name="maxage" size="2">
                                    <label class="formGroupLabel"  for="field_maxage">Age (at most)</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="license" value="1" id="license1">
                                <label class="form-check-label" for="license1">
                                    International driving license?
                                </label>
                                <div class="warn">Check if required</div>
                            </div>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            2. Disciplines of experience
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
                            3. O-Experience
                        </h3>

                        <div class="form-group">
                            <input id="field_oyears" placeholder=" " type="text" name="oyears" size="2">
                            <label class="formGroupLabel"  for="field_oyears">Years in orienteering (at least "" years)</label>
                        </div>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">Experience as Competitor</label>
                        </div>

                        <x-orienteering.competitor-experience-dropdown />
                    </div>

                    <x-language.experience-form title="4. Languages" />

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            5. Timing
                        </h3>

                        <div class="mx-0 row">
                            <div class="pl-0 pr-0 form-group col-12 col-sm-6 pr-sm-2">
                                <input id="field_timeToStart" placeholder=" " type="text" size="10" name="timeToStart" value="" >
                                <label class="formGroupLabel"  for="field_timeToStart">When to start?</label>
                            </div>

                            <div class="pl-0 pr-0 form-group col-12 col-sm-6 pl-sm-2">
                                <input id="field_maxWorkDuration" placeholder=" " type="text" size="7" name="maxWorkDuration" value="">
                                <label class="formGroupLabel"  for="field_maxWorkDuration">Must stay for at least "" weeks</label>
                            </div>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            6. Skills required
                            <div class="warn">
                                &nbsp;(Please tick only the <u>most important</u> ones to increase search results...)
                            </div>
                        </h3>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="mappingSkilled" id="mappingSkilled1">
                                <label class="form-check-label" for="mappingSkilled1">
                                    Mapping
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="coachSkilled" id="coachSkilled1">
                                <label class="form-check-label" for="coachSkilled1">
                                    Coaching
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="itSkilled" id="itSkilled1">
                                <label class="form-check-label" for="itSkilled1">
                                    IT &amp; timekeeping
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="eventSkilled" id="eventSkilled1">
                                <label class="form-check-label" for="eventSkilled1">
                                    Event Organising
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">Teaching</u> (please tick)</label>

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
                                <input class="form-check-input" type="checkbox" value="1" name="teacherDesc[event]" id="teacherDesc5">
                                <label class="form-check-label" for="teacherDesc5">
                                    Teach Event Organising
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="formSection">
                        <div class="form-group d-flex">
                            <input class="ml-auto" type="submit" value="Find volunteers">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="sticky">
                        <div class="noteWrap">
                            <h3 class="noteTitle">Note</h3>
                            <p>
                                Please fill in your search criteria. Leave blank if not relevant / important!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section>
@endsection
