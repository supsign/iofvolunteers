@extends('layouts.app')
@section('content')
<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="pb-0 title"><img class="title-icon" src="{{asset('images/icon-add4.svg')}}" width="65" height="65"> Host Registration Form</h1>
        </div>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="">

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            1. Host details <span class="warn">*</span>
                        </h3>

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
                            <input id="field_name" placeholder=" " type="text" name="name" size="15" required>
                            <label class="formGroupLabel"  for="field_name">Name</label>
                        </div>

                        <div class="form-group">
                            <input id="field_email" placeholder=" " type="text" name="email" size="15" required>
                            <label class="formGroupLabel"  for="field_email">E-mail *</label>
                        </div>

                        <div class="form-group">
                            <input placeholder=" " type="text" size="3" name="maxDuration" id="maxDuration" value="">
                            <label class="formGroupLabel"  for="maxDuration">Max hosting duration "" weeks</label>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="2" cols="30" name="hostDesc" id="hostDesc" value=""></textarea>
                            <label class="formGroupLabel"  for="hostDesc">Host description</label>
                        </div>

                        <div class="form-group">
                            <textarea placeholder=" " rows="2" cols="30" name="guestExpectations" id="guestExpectations" value=""></textarea>
                            <label class="formGroupLabel"  for="guestExpectations">Guest expectations</label>
                            <span class="warn"> You may specify the characteristics of a potential guest here</span>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            2. Contacts
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
                            3. Languages spoken
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
                            4. What can you offer? <span class="warn">*</span>
                        </h3>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[food]" id="offer1">
                                <label class="form-check-label" for="offer1">
                                    Food
                                </label>
                            </div>
                            <input type="text" name="offer[food_price]" value="free">
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[accomodation]" id="offer2">
                                <label class="form-check-label" for="offer2">
                                    Accomodation
                                </label>
                            </div>
                            <input type="text" name="offer[accomodation_price]" value="free">
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[local_tourism]" id="offer3">
                                <label class="form-check-label" for="offer3">
                                    Local tourism and sightseeng
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[o-training]" id="offer4">
                                <label class="form-check-label" for="offer4">
                                    O-traning
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[events]" id="offer5">
                                <label class="form-check-label" for="offer5">
                                    Events / competitions
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input id="field_offer3" placeholder=" " type="text" name="offer[distance_to_public_transport]" value="1 mile">
                            <label class="formGroupLabel"  for="field_offer3">Distance to public transport:</label>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[loan_bike]" id="offer6">
                                <label class="form-check-label" for="offer6">
                                    Loan a bike
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="offer[loan_car]" id="offer7">
                                <label class="form-check-label" for="offer7">
                                    Loan a car
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input id="field_offer4" placeholder=" " type="text" name="offer[other]" size="20">
                            <label class="formGroupLabel"  for="field_offer4">Other (please state):</label>
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