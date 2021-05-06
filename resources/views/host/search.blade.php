<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title"><img class="title-icon" src="{{ $imagePath }}/icon-search4.svg" width="65" height="65"> Host Search Form</h1>

            <div class="title-desc">Please fill in your search criteria. Leave blank if not relevant / important!</div>
        </div>

        <form method="POST" action="host/search" enctype="multipart/form-data">

            <div class="row">
                <div class="col-12 col-md-6">

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            1. Personal Information
                        </h3>

                        <div class="form-group">
                            <select type="text" name="country" id="country" size="1" value=""></select>
                            <div class="warn">Country</div>
                            <img for="country" class="selectArr" src="{{ $imagePath }}/selectArr.svg" alt="" />
                        </div>

                        <div class="form-group">
                            <input id="field_maxDuration" placeholder=" " type="text" size="7" name="maxDuration" value="">
                            <label class="formGroupLabel"  for="field_maxDuration">Hosting duration "" weeks</label>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            2. Languages available
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
                        <div class="form-group d-flex">
                            <input class="ml-auto" type="submit" value="Find host">
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