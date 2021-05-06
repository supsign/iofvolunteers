<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title"><img class="title-icon" src="{{ $imagePath }}/icon-search5.svg" width="65" height="65"> Guest Search Form</h1>

            <div class="title-desc">Please fill in your search criteria. Leave blank if not relevant / important!</div>
        </div>

        <form method="POST" action="guest/search" enctype="multipart/form-data">

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
                            <img for="gender" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
                        </div>

                        <div class="form-group">
                            <div class="row mx-0">
                                <div class="form-group col-12 col-sm-6 pl-0 pr-0 pr-sm-2">
                                    <input id="field_minage" placeholder=" " type="text" name="minage" size="2">
                                    <label class="formGroupLabel"  for="field_minage">Age (at least)</label>
                                    <div class="warn">
                                        Note that volunteers under 18 are not allowed to register in the Platform
                                    </div>
                                </div>
                                <div class="form-group col-12 col-sm-6 pr-0 pl-0 pl-sm-2">
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

                        <div class="form-group">
                            <select size="1" name="competitorExp[local]" id="competitorExplocal">
                                <option selected="" value="">Taken part in minimum <br>
                                    Local events</option>
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
                            4. Languages required
                            <div class="warn">
                                Tick only the <u>most important</u> one or two to increase search results
                            </div>
                        </h3>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[English][known]" value="1" id="languages1_1">
                                <label class="form-check-label" for="languages1_1">
                                    English
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[French][known]" value="1" id="languages2_1">
                                <label class="form-check-label" for="languages2_1">
                                    French
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[Spanish][known]" value="1" id="languages3_1">
                                <label class="form-check-label" for="languages3_1">
                                    Spanish
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[German][known]" value="1" id="languages4_1">
                                <label class="form-check-label" for="languages4_1">
                                    German
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[Italian][known]" value="1" id="languages5_1">
                                <label class="form-check-label" for="languages5_1">
                                    Italian
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[Portuguese][known]" value="1" id="languages6_1">
                                <label class="form-check-label" for="languages6_1">
                                    Portuguese
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[Scandinavian][known]" value="1" id="languages7_1">
                                <label class="form-check-label" for="languages7_1">
                                    Scandinavian
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input id="field_languagesOther" placeholder=" " type="text" name="languages[Other]" value="">
                            <label class="formGroupLabel"  for="field_languagesOther">Other:</label>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            5. Timing
                        </h3>

                        <div class="row mx-0">
                            <div class="form-group col-12 col-sm-6 pl-0 pr-0 pr-sm-2">
                                <input id="field_timeToStart" placeholder=" " type="text" size="10" name="timeToStart" value="" >
                                <label class="formGroupLabel"  for="field_timeToStart">When to start?</label>
                            </div>

                            <div class="form-group col-12 col-sm-6 pr-0 pl-0 pl-sm-2">
                                <input id="field_maxWorkDuration" placeholder=" " type="text" size="7" name="maxWorkDuration" value="">
                                <label class="formGroupLabel"  for="field_maxWorkDuration">Must stay for at least "" weeks</label>
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