@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title"><img class="title-icon" src="{{asset('images/icon-search3.svg')}}" width="65"
                                       height="65"> Project Search Form</h1>

                <div class="title-desc">Please fill in your search criteria. Leave blank if not relevant / important!
                </div>
            </div>

            <form method="POST" action="project/search" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="formSection">
                            <div class="form-group">
                                <select type="text" name="country" id="country" size="1" value=""></select>
                                <div class="warn">Country</div>
                                <img for="country" class="selectArr" src="{{asset('images/selectArr.svg')}}" alt=""/>
                            </div>
                        </div>

                        <div class="formSection">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                           name="offer[international_travel_expenses]" id="offer1">
                                    <label class="form-check-label" for="offer1">
                                        International travel expenses
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                           name="offer[domestic_travel_expenses]" id="offer2">
                                    <label class="form-check-label" for="offer2">
                                        Domestic travel expenses
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                           name="offer[accommodation]" id="offer3">
                                    <label class="form-check-label" for="offer3">
                                        Accommodation
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="offer[meals]"
                                           id="offer4">
                                    <label class="form-check-label" for="offer4">
                                        Meals
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="offer[pocket_money]"
                                           id="offer5">
                                    <label class="form-check-label" for="offer5">
                                        Pocket money
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input id="field_offerother" placeholder=" " type="text" name="offer[other]" size="20">
                                <label class="formGroupLabel" for="field_offerother">Other (please state):</label>
                            </div>
                        </div>

                        <div class="formSection">
                            <h3 class="formSectionTitle">
                                Skills required
                                <div class="warn">
                                    &nbsp;(Please tick all relevant to the project)
                                </div>
                            </h3>

                            <div class="form-group">
                                <label class="formGroupLabelStatic">* Mapping</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="mappingDesc[Sprint]"
                                           id="mappingSkilled1">
                                    <label class="form-check-label" for="mappingSkilled1">
                                        Sprint
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="mappingDesc[Forest]"
                                           id="mappingSkilled2">
                                    <label class="form-check-label" for="mappingSkilled2">
                                        Forest
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="formGroupLabelStatic">* Coaching</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                           name="coachDesc[nationalTeam]" id="coachSkilled1">
                                    <label class="form-check-label" for="coachSkilled1">
                                        National Team
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="coachDesc[clubs]"
                                           id="coachSkilled2">
                                    <label class="form-check-label" for="coachSkilled2">
                                        Clubs
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="formGroupLabelStatic">* IT &amp; time-keeping</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="itDesc[si]"
                                           id="itSkilled1">
                                    <label class="form-check-label" for="itSkilled1">
                                        SportIdent
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="itDesc[emit]"
                                           id="itSkilled2">
                                    <label class="form-check-label" for="itSkilled2">
                                        Emit
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="itDesc[gps]"
                                           id="itSkilled3">
                                    <label class="form-check-label" for="itSkilled3">
                                        GPS Tracking
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="formGroupLabelStatic">* Event Organising</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="eventDesc[club]"
                                           id="eventSkilled1">
                                    <label class="form-check-label" for="eventSkilled1">
                                        Club
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="eventDesc[local]"
                                           id="eventSkilled2">
                                    <label class="form-check-label" for="eventSkilled2">
                                        Local
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="eventDesc[national]"
                                           id="eventSkilled3">
                                    <label class="form-check-label" for="eventSkilled3">
                                        National
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                           name="eventDesc[highLevel]" id="eventSkilled4">
                                    <label class="form-check-label" for="eventSkilled4">
                                        High-Level
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                           name="teacherDesc[materials]" id="teacherDesc1">
                                    <label class="form-check-label" for="teacherDesc1">
                                        Development of Educational Material
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                           name="teacherDesc[beginners]" id="teacherDesc2">
                                    <label class="form-check-label" for="teacherDesc2">
                                        Beginners &amp; children
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="formSection">
                            <div class="form-group d-flex">
                                <input class="ml-auto" type="submit" value="Find projects">
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
