<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title pb-0"><img class="title-icon" src="{{ $imagePath }}/icon-add5.svg" width="65" height="65"> Guest Registration Form</h1>
        </div>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="">

            <div class="row">
                <div class="col-12 col-md-6">

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            1. Guest details
                            <span class="warn">*</span>
                        </h3>

                        <div class="form-group">
                            <div class="warn">Country</div>
                            <select type="text" name="country_id" id="country" size="1" value="" required>
                                @foreach($countries AS $country)
                                    <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
                                @endforeach
                            </select>
                            <img for="country_id" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
                        </div>

                        <div class="form-group">
                            <input id="field_name" placeholder=" " type="text" name="name" size="15">
                            <label class="formGroupLabel"  for="field_name">Name</label>
                        </div>

                        <div class="form-group">
                            <div class="warn">Gender</div>
                            <select size="1" name="gender_id" id="gender">
                                @foreach($genders AS $gender)
                                    <option value="{{ $gender->id }}">{{ ucfirst($gender->name) }}</option>
                                @endforeach
                            </select>
                            <img for="gender_id" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
                        </div>

                        <div class="form-group">
                            <input id="field_email" placeholder=" " type="text" name="email" size="15">
                            <label class="formGroupLabel"  for="field_email">E-mail *</label>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            2. O-Experience
                        </h3>

                        <div class="form-group">
                            <input type="number" min="1900" max="2099" step="1" name="startO" size="4" id="field_startO" class="datepicker-here" data-language='en' data-date-format="yyyy" data-view="years" data-min-view="years" placeholder=" " value="">
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
                            3. Contacts
                        </h3>

                        <div class="form-group">
                            <input id="field_contacts1" placeholder=" " type="text" name="contacts[phone]">
                            <label class="formGroupLabel"  for="field_contacts1">Phone</label>
                        </div>

                        <div class="form-group">
                            <input id="field_contacts2" placeholder=" " type="text" name="contacts[email]">
                            <label class="formGroupLabel"  for="field_contacts2">Email</label>
                        </div>

                        <div class="form-group">
                            <input id="field_contacts3" placeholder=" " type="text" name="contacts[skype]">
                            <label class="formGroupLabel"  for="field_contacts3">Skype</label>
                        </div>

                        <div class="form-group">
                            <input id="field_contacts4" placeholder=" " type="text" name="contacts[telegram]">
                            <label class="formGroupLabel"  for="field_contacts4">Telegram</label>
                        </div>

                        <div class="form-group">
                            <input id="field_contacts5" placeholder=" " type="text" name="contacts[other]">
                            <label class="formGroupLabel"  for="field_contacts5">Other</label>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            4. Languages spoken
                            <div class="warn"> , even if only listed in "other")</div>
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
                        <div class="form-group">
                            <textarea  placeholder=" " rows="2" cols="30" name="oExpectations" id="oExpectations" value=""></textarea>
                            <label class="formGroupLabel"  for="oExpectations">O-expectations</label>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="2" cols="30" name="motivation" id="motivation" value=""></textarea>
                            <label class="formGroupLabel"  for="motivation">Motivation</label>
                        </div>

                        <div class="form-group">
                            <textarea  placeholder=" " rows="2" cols="30" name="healthRestrictions" id="healthRestrictions" value=""></textarea>
                            <label class="formGroupLabel"  for="healthRestrictions">Allergies / medical restrictions</label>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="2" cols="30" name="offer" id="offer" value=""></textarea>
                            <label class="formGroupLabel"  for="offer">What you can offer</label>
                        </div>

                        <div class="form-group">
                            <textarea id="field_other" placeholder=" " rows="4" cols="50" name="other"></textarea>
                            <label class="formGroupLabel"  for="field_other">Anything you would like to add</label>
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
                                    <input class="form-check-input" type="checkbox" value="1" name="iAgreeWithTerms" id="iAgreeWithTerms">
                                    <label class="form-check-label" for="iAgreeWithTerms">
                                        I have read and understood the above. *
                                    </label>
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