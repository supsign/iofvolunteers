@extends('layouts.app')
@section('content')

<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title"><img class="title-icon" src="{{asset('images/icon-search1.svg')}}" width="65" height="65"> Volunteer Search Form</h1>

            <div class="title-desc">Please fill in your search criteria. Leave blank if not relevant / important!</div>
        </div>

        <form method="POST" action="/volunteer/search" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <x-form.section>
                        <x-slot name="title">
                            1. Personal Information
                        </x-slot>   
                        <x-base.select name="gender_id" label="Gender" :iconName="'selectArr'" :options="$genders"/> 
                        <div class="mx-0 row"> 
                            <div class="pl-0 pr-0 mt-0 form-group col-12 col-sm-6 pr-sm-2">
                                <x-base.input name="minage" value="{{ old('minage') }}" label="Age (at least)" type="number" />
                                    <div class="font-weight-normal">
                                        Note that volunteers under 18 are not allowed to register on the Platform
                                    </div>
                            </div>
                            <div class="pl-0 pr-0 mt-0 form-group col-12 col-sm-6 pl-sm-2">
                                <x-base.input name="maxage" value="{{ old('maxage') }}" label="Age (at most)" type="number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <x-base.checkbox name="driving_licence" label="International driving license?" class="form-check-input" :iconName="'selectArr'" /> 
                            <div class="warn">Check if required</div>
                        </div>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            2. Disciplines of experience
                        </x-slot>
                        <div class="form-group">
                            @foreach($disciplines AS $discipline)
                                <x-base.checkbox name="discipline[{{ $discipline->id }}]" label="{{ $discipline->name }}" class="form-check-input" />
                            @endforeach
                        </div>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            3. O-Experience
                        </x-slot>
                        <x-base.input name="ol_duration" value="{{ old('ol_duration') }}" label='Years in orienteering (at least "" years)' type="number" class="datepicker-here" data-language='en' data-date-format="yyyy" data-view="years" data-min-view="years" placeholder=" " value="" :iconName="'calendarIcon'" />
                        <div class="form-group">
                            <label class="formSubtitle2">Experience as Competitor</label>
                        </div>
                        <x-base.input name="local_experience" value="{{ old('local_experience') }}" label="Exprience with local Events" type="number" size="3" min="0" step="1" />
                        <x-base.input name="national_experience" value="{{ old('national_experience') }}" label="Exprience with national Events" type="number" size="3" min="0" step="1"/>
                        <x-base.input name="international_experience" value="{{ old('international_experience') }}" label="Exprience with international Events" type="number" size="3" min="0" step="1"/>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            4. Languages
                        </x-slot>
                        <x-slot name="subtitle">
                            Tick only the most important one or two to increase search results
                        </x-slot>
                            @foreach($languages AS $language)                           
                                <x-base.radio name="language[{{ $language->id }}]" label="{{ $language->name }}" :options="$languageProficiency" value="{{ old('language['.$language->id.']') ?? 4 }}" />                      
                            @endforeach
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            5. Timing
                        </x-slot>
                        <div class="mx-0 row">
                            <div class="pl-0 pr-0 m-0 form-group col-12 col-sm-6 pr-sm-2">
                                <x-base.input name="work_duration" value="{{ old('work_duration') }}" label="When to start?" type="number" size="3" />
                            </div>

                            <div class="pl-0 pr-0 m-0 form-group col-12 col-sm-6 pl-sm-2">
                                <x-base.input name="work_duration" value="{{ old('work_duration') }}" label='Must stay for at least "" weeks' type="number" size="3" />
                            </div>
                        </div>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            6. Skills required
                        </x-slot>
                        @foreach ($skillTypes AS $skillType)
                            <x-base.checkbox label="{{ $skillType->name }}" name="skill[{{ $skillType->id }}]" type="checkbox" class="form-check-input"/>
                        @endforeach
                    </x-form.section>
                </div>

                <div class="col-12 col-md-6">
                    <div class="sticky">
                        <div class="noteWrap">
                            <h3 class="noteTitle">Note</h3>
                            <p>
                                Please fill in your search criteria. Leave blank if not relevant / important!
                            </p>
                        </div>
                        <div class="formSection">
                            <div class="form-group d-flex">
                                <input class="ml-auto" type="submit" value="Find volunteers">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section>
@endsection
