@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title"><img class="title-icon" src="{{asset('images/icon-search5.svg')}}" width="65"
                                       height="65"> Guest Search Form</h1>

                <div class="title-desc">Please fill in your search criteria. Leave blank if not relevant / important!
                </div>
            </div>

            <form method="POST" action="guest/search" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-12 col-md-6">

                        <x-form.section>
                            <x-slot name="title">
                                1. Personal Information
                            </x-slot>
                            <x-slot name="subtitle">
                                Note that volunteers under 18 are not allowed to register on the Platform
                            </x-slot>
                            <x-base.select name="gender_id" label="Gender" :iconName="'selectArr'" :options="$genders"/>
                            <div class="mx-0 row">
                                <div class="pl-0 pr-0 mt-0 col-12 col-sm-6 pr-sm-2">
                                    <x-base.input name="minage" label="Age (at least)" type="number"/>
                                </div>
                                <div class="pl-0 pr-0 mt-0 col-12 col-sm-6 pl-sm-2">
                                    <x-base.input name="maxage" label="Age (at most)" type="number"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <x-base.checkbox name="driving_licence" label="International driving license?"
                                                 class="form-check-input" :iconName="'selectArr'"/>
                                <div class="warn">Check if required</div>
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                2. Experience in the following disciplines
                            </x-slot>
                            <div class="form-group">
                                @foreach($disciplines AS $discipline)
                                    <x-base.checkbox name="discipline[{{ $discipline->id }}]"
                                                     label="{{ $discipline->name }}"
                                                     class="form-check-input"/>
                                @endforeach
                            </div>
                        </x-form.section>

                        <div class="formSection">
                            <h3 class="formSectionTitle">
                                3. O-Experience
                            </h3>

                            <div class="form-group">
                                <input id="field_oyears" placeholder=" " type="text" name="oyears" size="2">
                                <label class="formGroupLabel" for="field_oyears">Years in orienteering (at least ""
                                    years)</label>
                            </div>

                            <div class="form-group">
                                <label class="formGroupLabelStatic">Experience as Competitor</label>
                            </div>

                            <div class="form-group">
                                <select size="1" name="competitorExp[local]" id="competitorExplocal">
                                    <option selected="" value="">Taken part in minimum <br>
                                        Local events
                                    </option>
                                    <option value="none">none</option>
                                    <option value="1 - 50">1 - 50</option>
                                    <option value="51 - 100">51 - 100</option>
                                    <option value="over 100">over 100</option>
                                </select>
                                <img for="competitorExplocal" class="selectArr" src="{{asset('images/selectArr.svg')}}"
                                     alt=""/>
                            </div>

                            <div class="form-group">
                                <select size="1" name="competitorExp[national]" id="competitorExpnational">
                                    <option selected="" value="">National Championships</option>
                                    <option value="none">none</option>
                                    <option value="1 - 50">1 - 50</option>
                                    <option value="51 - 100">51 - 100</option>
                                    <option value="over 100">over 100</option>
                                </select>
                                <img for="competitorExpnational" class="selectArr"
                                     src="{{asset('images/selectArr.svg')}}" alt=""/>
                            </div>

                            <div class="form-group">
                                <select size="1" name="competitorExp[international]" id="competitorExpinternational">
                                    <option selected="" value="">International Competitions</option>
                                    <option value="none">none</option>
                                    <option value="1 - 20">1 - 20</option>
                                    <option value="21 - 50">21 - 50</option>
                                    <option value="over 50">over 50</option>
                                </select>
                                <img for="competitorExpinternational" class="selectArr"
                                     src="{{asset('images/selectArr.svg')}}" alt=""/>
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
                                    <input class="form-check-input" type="checkbox" name="languages[English][known]"
                                           value="1" id="languages1_1">
                                    <label class="form-check-label" for="languages1_1">
                                        English
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="languages[French][known]"
                                           value="1" id="languages2_1">
                                    <label class="form-check-label" for="languages2_1">
                                        French
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="languages[Spanish][known]"
                                           value="1" id="languages3_1">
                                    <label class="form-check-label" for="languages3_1">
                                        Spanish
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="languages[German][known]"
                                           value="1" id="languages4_1">
                                    <label class="form-check-label" for="languages4_1">
                                        German
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="languages[Italian][known]"
                                           value="1" id="languages5_1">
                                    <label class="form-check-label" for="languages5_1">
                                        Italian
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="languages[Portuguese][known]"
                                           value="1" id="languages6_1">
                                    <label class="form-check-label" for="languages6_1">
                                        Portuguese
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           name="languages[Scandinavian][known]" value="1" id="languages7_1">
                                    <label class="form-check-label" for="languages7_1">
                                        Scandinavian
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input id="field_languagesOther" placeholder=" " type="text" name="languages[Other]"
                                       value="">
                                <label class="formGroupLabel" for="field_languagesOther">Other:</label>
                            </div>
                        </div>

                        <div class="formSection">
                            <h3 class="formSectionTitle">
                                5. Timing
                            </h3>

                            <div class="mx-0 row">
                                <div class="pl-0 pr-0 form-group col-12 col-sm-6 pr-sm-2">
                                    <input id="field_timeToStart" placeholder=" " type="text" size="10"
                                           name="timeToStart" value="">
                                    <label class="formGroupLabel" for="field_timeToStart">When to start?</label>
                                </div>

                                <div class="pl-0 pr-0 form-group col-12 col-sm-6 pl-sm-2">
                                    <input id="field_maxWorkDuration" placeholder=" " type="text" size="7"
                                           name="maxWorkDuration" value="">
                                    <label class="formGroupLabel" for="field_maxWorkDuration">Must stay for at least ""
                                        weeks</label>
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
