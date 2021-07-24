@extends('layouts.app')
@section('content')

<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title"><img class="title-icon" src="{{asset('images/icon-search1.svg')}}" width="65" height="65"> Volunteer Search Form</h1>

            <div class="title-desc">Please fill in your search criteriaicon-search1.svg. Leave blank if not relevant / important!</div>
        </div>

        <form method="POST" action="/volunteer/search" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            1. Personal Information
                        </h3>

                        <x-person.genders-form isSearch="true"/>

                        <div class="form-group">
                            <div class="mx-0 row">
                                <div class="pl-0 pr-0 form-group col-12 col-sm-6 pr-sm-2">
                                    <input id="field_minage" placeholder="" type="text" name="minage" size="2">
                                    <label class="formGroupLabel"  for="field_minage">Age (at least)</label>
                                    <div class="warn">
                                        Note that volunteers under 18 are not allowed to register on the Platform
                                    </div>
                                </div>
                                <div class="pl-0 pr-0 form-group col-12 col-sm-6 pl-sm-2">
                                    <input id="field_maxage" placeholder="" type="text" name="maxage" size="2">
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

                    <x-orienteering.disciplines-form>
                        <x-slot name="title">
                            2. Disciplines of experience
                        </x-slot>
                    </x-orienteering.disciplines-form>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            3. O-Experience
                        </h3>

                        <div class="form-group">
                            <input id="field_oyears" placeholder="" type="text" name="ol_duration" size="2">
                            <label class="formGroupLabel"  for="field_oyears">Years in orienteering (at least "" years)</label>
                        </div>

                        <div class="form-group">
                            <label class="formGroupLabelStatic">Experience as Competitor</label>
                        </div>

                        <x-orienteering.competitor-experience-dropdown />
                    </div>

                    <x-language.experience-form>
                        <x-slot name="title">
                            4. Languages
                        </x-slot>
                        <x-slot name="subtitle">
                            Tick only the most important one or two to increase search results
                        </x-slot>    
                    </x-language.experience-form>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            5. Timing
                        </h3>

                        <div class="mx-0 row">
                            <div class="pl-0 pr-0 form-group col-12 col-sm-6 pr-sm-2">
                                <input id="field_timeToStart" placeholder="" type="text" size="10" name="time_to_start" value="" >
                                <label class="formGroupLabel"  for="field_timeToStart">When to start?</label>
                            </div>

                            <div class="pl-0 pr-0 form-group col-12 col-sm-6 pl-sm-2">
                                <input id="field_maxWorkDuration" placeholder="" type="text" size="7" name="max_work_duration" value="">
                                <label class="formGroupLabel"  for="field_maxWorkDuration">Must stay for at least "" weeks</label>
                            </div>
                        </div>
                    </div>

                    <x-orienteering.skills-search-form>
                        <x-slot name="title">
                            6. Skills required
                        </x-slot>
                    </x-orienteering.skills-search-form>

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
