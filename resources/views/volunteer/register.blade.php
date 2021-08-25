@extends('layouts.app')
@section('content')
<section class="default">

    <div class="container">
        <div class="titleWrap">
            <h1 class="title"><img class="title-icon" src="{{ asset('images/icon-add.svg') }}" width="65" height="65"> Volunteer Registration Form</h1>

            <div class="title-desc">Please note that you must be 18+ to register as a volunteer!</div>
        </div>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="">

            <div class="row">
                <div class="col-12 col-md-6">

                    <x-form.section>
                        <x-slot name="title">
                            1. Contact Information
                        </x-slot>
                        <x-base.input name="name" value="{{ old('name') }}" label="Name *" required />
                        <x-base.select name="country_id" label="Country" :iconName="'selectArr'" :options="$countries" />
                        <x-base.input name="email" value="{{ old('email') }}" label="E-mail *" type="email" required />
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            2. Personal Information
                        </x-slot>
                        <x-base.select name="gender_id" label="Gender" :iconName="'selectArr'" :options="$genders" />
                        <x-base.input name="birthdate"
                                      value="{{ old('birthdate') }}" label="Date of birth (yyyy-mm-dd) *"
                                      type="text" required class="datepicker-here" data-language='en' data-date-format="yyyy-mm-dd"
                                      :iconName="'calendarIcon'" />
                            <x-slot name="subtitle">
                                <div class="font-weight-normal">optional</div>
                                <div class="font-weight-normal">if left blank, your name will be assumed as your nickname</div>
                            </x-slot>
                        </x-base.input>
                        <x-base.select name="driving_licence"
                                       label="International driving license? *"
                                       :options="collect([(object)array('id' => 0, 'name' => 'No'), (object)array('id' => 1, 'name' => 'Yes')])"
                                       :iconName="'selectArr'" required />
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            3. Disciplines of experience
                        </x-slot>
                        <div class="form-group">
                            @foreach($disciplines AS $discipline)
                                <x-base.checkbox name="discipline[{{ $discipline->id }}]" label="{{ $discipline->name }}" class="form-check-input" />
                            @endforeach
                        </div>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            4. O-Experience
                        </x-slot>
                        <x-slot name="subtitle">
                            State below how long your experience for each given Event-Type is.
                            <div class="warn">The number will be taken as years - 0 for no experience.</div>
                        </x-slot>
                        <x-base.input name="ol_duration"
                                      value="{{ old('ol_duration') }}" label="Year you started orienteering (yyyy) *"
                                      type="number" class="datepicker-here" data-language='en' data-date-format="yyyy"
                                      data-view="years" data-min-view="years" placeholder=" " value="" required :iconName="'calendarIcon'" />
                        <x-base.input name="field_club"
                                      value="{{ old('field_club') }}" label="Your present club (if any)" type="text" />
                        <x-base.input name="local_experience"
                                      value="{{ old('local_experience') }}" label="Exprience with local Events (number)" type="number" size="3" min="0" step="1" />
                        <x-base.input name="national_experience"
                                      value="{{ old('national_experience') }}" label="Exprience with national Events (number)" type="number" size="3" min="0" step="1" />
                        <x-base.input name="international_experience"
                                      value="{{ old('international_experience') }}" label="Exprience with international Events (number)" type="number" size="3" min="0" step="1" />
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            5. Languages
                        </x-slot>
                        <x-slot name="subtitle">
                        </x-slot>
                        @foreach($languages AS $language)
                            <x-base.radio name="language[{{ $language->id }}]" label="{{ $language->name }}" :options="$languageProficiency"
                                          value="{{ old('language['.$language->id.']') ?? 4 }}" />
                        @endforeach
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            6. Where to work?
                        </x-slot>
                        <x-slot name="subtitle">
                            Do you have a preferred destination?
                            <div class="warn">If not, just tick "Anywhere"</div>
                        </x-slot>
                        <div class="form-group">
                            <x-base.checkbox label="Anywhere" name="continentsCheckboxesTrigger" type="checkbox" class="form-check-input  continentsCheckboxes" />
                            @foreach($continents AS $continent)
                                <x-base.checkbox label="{{ $continent->name }}" name="continent[{{ $continent->id }}]" type="checkbox" class="form-check-input continentsCheckboxes" />
                            @endforeach
                        </div>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            7. Timing
                        </x-slot>
                        <x-slot name="subtitle">
                            For how long can you work?
                            <div class="warn">(leave blank if you can stay more than 6 weeks)</div>
                        </x-slot>

                        <x-base.input name="work_duration" value="{{ old('work_duration') }}" label="weeks" type="number" size="3" />
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            8. Skills
                        </x-slot>
                        <x-slot name="subtitle">
                            <div class="warn"> (Please tick all relevant to you.
                                Details are <b>required</b> if skill is ticked)
                            </div>
                        </x-slot>
                        @foreach($skillTypes AS $skillType)
                            <div class="form-group">
                                <div class="formSubtitle2">{{ $skillType->name }} *
                                    @isset($skillType->warn)
                                        <div class="font-weight-normal">{{ $skillType->warn }}</div>
                                    @endisset

                                    @foreach($skillType->skills AS $skill)
                                        <x-base.checkbox label="{{ $skill->name }}" name="skill[{{ $skill->id }}]" type="checkbox" class="form-check-input" />
                                    @endforeach
                                    <x-base.textarea name="skill_{{ $skillType->snakeCaseName }}" label="{{ $skillType->text }}" />
                                </div>
                            </div>
                        @endforeach
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            9. O-Work Experience
                        </x-slot>
                        <div class="form-group">
                            @foreach($dutyTypes AS $dutyType)
                                <x-base.input name="o_work_expirence[{{ $dutyType->id }}]" label="{{ $dutyType->name }}" type="number" size="3" min="0" step="1" />
                                <label class="formSubtitle2">Duties:</label>
                                @foreach($duties AS $duty)
                                    <x-base.checkbox label="{{ $duty->name }}" name="duty[{{ $dutyType->id }}][{{ $duty->id }}]" class="form-check-input" />
                                @endforeach
                            @endforeach
                        </div>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            10. Additional Information
                        </x-slot>
                        <x-base.textarea name="help" value="{{ old('help') }}" label="Explain how you can help as a volunteer *" required />
                        <x-base.textarea name="expectation" value="{{ old('expectation') }}" label="Expectations as a volunteer" />
                    </x-form.section>

                </div>
                <div class="col-12 col-md-6">
                    <div class="sticky">
                        <div class="noteWrap">
                            <h3 class="noteTitle">Disclaimer</h3>
                            <p>I have filled in my details
                                above as accurately as possible. By submitting this form, I state that I am a volunteer in
                                developing orienteering. I understand that the IOF cannot be held responsible for my being or not
                                being recruited as a volunteer. I also understand that should I choose to accept any offer
                                requesting my assistance, the IOF cannot be held responsible for the terms under which I will work
                                as a volunteer.</p>
                        </div>

                        <div class="formSection">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="agb" id="agb" value="1" required>
                                    <label class="form-check-label" for="agb">
                                        I have read and understood the above.
                                    </label>
                                    <div class="warn"> Mandatory: Please accept the disclaimer.</div>
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <input class="ml-auto" type="submit" value="Submit my details">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
