@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65"
                                            height="65" alt="search icon"> Edit Volunteer</h1>
            </div>

            <div class="row pb-3">
                <div class="col-12 col-md-6">
                    <form action="{{ route('volunteer.delete', $volunteer) }}" method="POST"
                          onclick="return confirm('Are You Sure?')" onkeydown="return confirm('Are You Sure?')">
                        @method('DELETE')
                        @csrf
                        <input class="ml-auto float-md-right delete-btn" type="submit" value="Delete Volunteer">
                    </form>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('volunteer.update', $volunteer->id) }}">
                @csrf
                @method("PATCH")

                <div class="row">
                    <div class="col-12 col-md-6">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <x-form.section>
                            <x-slot name="title">
                                1. Contact Information
                            </x-slot>
                            <x-base.input name="name" value="{{ $volunteer->name }}" label="Name *" required/>
                            <x-base.select name="country_id" label="Country" :iconName="'selectArr'"
                                           :options="$countries" :value="$volunteer->country"/>
                            <x-base.input name="email" value="{{ $volunteer->email }}" label="E-mail *" type="email"
                                          required/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                2. Personal Information
                            </x-slot>
                            <x-base.select name="gender_id" label="Gender" :iconName="'selectArr'" :options="$genders"
                                           :value="$volunteer->gender"/>
                            <x-base.input name="birthdate"
                                          value="{{ date_format(new datetime($volunteer->birthdate), 'Y-m-d') }}"
                                          label="Date of birth (yyyy-mm-dd) *" type="text" required
                                          class="datepicker-here" data-language='en' data-date-format="yyyy-mm-dd"
                                          :iconName="'calendarIcon'"/>

                            <x-base.select name="driving_licence"
                                           label="International driving license? *"
                                           :options="collect([(object)array('id' => 0, 'name' => 'No'), (object)array('id' => 1, 'name' => 'Yes')])"
                                           :iconName="'selectArr'"
                                           :value="$volunteer->drivingLicenceModel" required/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                3. Experience in the following disciplines
                            </x-slot>
                            <div class="form-group">
                                @foreach($disciplines AS $discipline)
                                    <x-base.checkbox name="discipline[{{ $discipline->id }}]"
                                                     label="{{ $discipline->name }}"
                                                     class="form-check-input required-checkboxes-disciplines"
                                                     :checked="(int)$volunteer->disciplines->contains($discipline)"/>
                                @endforeach
                                <div id="error-wrapper-disciplines" class="mt-3"></div>
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                4. O-Experience as competitor
                            </x-slot>
                            <x-slot name="subtitle">
                                State below how long your experience for each given Event-Type is.
                                <div class="warn">The number will be taken as years - 0 for no experience.</div>
                            </x-slot>
                            <x-base.input
                                    name="ol_duration"
                                    value="{{ $volunteer->ol_duration }}"
                                    label="Year you started orienteering (yyyy) *"
                                    type="number" class="datepicker-here"
                                    data-language="en"
                                    data-date-format="yyyy"
                                    data-view="years"
                                    data-min-view="years"
                                    placeholder=" "
                                    required
                                    :iconName="'calendarIcon'"/>
                            <x-base.input
                                    name="club"
                                    value="{{ $volunteer->club }}"
                                    label="Your present club (if any)"
                                    type="text"/>
                            <x-base.input name="local_experience"
                                          value="{{ $volunteer->local_experience }}"
                                          label="Experiences with local Events (number)" type="number" size="3" min="0"
                                          step="1"/>
                            <x-base.input name="national_experience"
                                          value="{{ $volunteer->national_experience }}"
                                          label="Experiences with national Events (number)" type="number" size="3"
                                          min="0"
                                          step="1"/>
                            <x-base.input name="international_experience"
                                          value="{{ $volunteer->international_experience }}"
                                          label="Experiences with international Events (number)" type="number" size="3"
                                          min="0" step="1"/>
                        </x-form.section>


                        <x-form.section>
                            <x-slot name="title">
                                5. Languages
                            </x-slot>
                            <x-slot name="subtitle">
                                <div class="warn">(required, even if only listed in "other")</div>
                            </x-slot>
                            @foreach($languages AS $language)
                                <x-base.radio name="language[{{ $language->id }}]" label="{{ $language->name }}"
                                              :options="$languageProficiencies"
                                              value="{{$volunteer->languageVolunteers->where('language_id', $language->id)->first()?->languageProficiency->id}}"/>
                            @endforeach

                            <x-base.input name="other_languages" label="Additional languages" value="{{ $volunteer->other_languages }}"/>
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
                                <x-base.checkbox label="Anywhere" name="continentsCheckboxesTrigger" type="checkbox"
                                                 class="form-check-input  continentsCheckboxes" value="1"/>

                                @foreach($continents AS $continent)
                                    <x-base.checkbox label="{{ $continent->name }}"
                                                     name="continent[{{ $continent->id }}]" type="checkbox"
                                                     class="form-check-input continentsCheckboxes"
                                                     :checked="$volunteer->continents->contains($continent)"/>
                                @endforeach
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                7. Timing
                            </x-slot>
                            <x-slot name="subtitle">
                                For approximately how many weeks can you work as a volunteer?
                                <div class="warn">(leave blank if you can stay more than 6 weeks)</div>
                            </x-slot>

                            <x-base.input name="work_duration" value="{{ $volunteer->work_duration }}" label="weeks"
                                          type="number" size="3"/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                8. Skills
                            </x-slot>
                            <x-slot name="subtitle">
                                <div class="warn"> (Please tick all relevant to you.
                                    Details are <strong>required</strong> if skill is ticked)
                                </div>
                            </x-slot>
                            @foreach($skillTypes AS $skillType)
                                <div class="form-group">
                                    <div class="formSubtitle2">{{ $skillType->name }} *
                                        @isset($skillType->warn)
                                            <div class="font-weight-normal">{{ $skillType->warn }}</div>
                                        @endisset

                                        @foreach($skillType->skills AS $skill)
                                            <x-base.checkbox label="{{ $skill->name }}" name="skill[{{ $skill->id }}]"
                                                             type="checkbox" class="form-check-input checkbox-required-text"
                                                             :checked="$volunteer->skills->contains($skill)"/>
                                        @endforeach

                                        @php
                                            $fieldDB="skill_".$skillType->snakeCaseName;
                                            $fieldQuery=$volunteer->$fieldDB
                                        @endphp
                                        
                                        <x-base.textarea name="skill_{{ $skillType->snakeCaseName }}" :required="$skillType->skills->intersect($volunteer->skills)->count()"
                                                         label="{{ $skillType->text }}" value="{{ $fieldQuery }}" />

                                        @if($skillType->id === 2)
                                            @if($volunteer->getFirstMedia('map_sample'))
                                                <div class="formSubtitle3">
                                                    <a href="{{ route('media.download', $volunteer->getFirstMedia('map_sample')->id) }}">
                                                        Download the old map sample you uploaded
                                                    </a>
                                                </div>
                                            @endif
                                            <div id="new_map_id" class="font-weight-normal mb-2">Upload a new map sample (will replace the old one)</div>
                                            <input id="skill_map_upload_new" name="skill_map_upload" type="file" aria-labelledby="new_map_id"/>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <x-base.textarea name="skill_other" label="Other skills? Please explain..."
                                                 value="{{ $volunteer->skill_other }}"/>
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                9. O-Work Experience
                            </x-slot>
                            <div class="form-group">
                                @foreach($dutyTypes AS $dutyType)
                                    <x-base.input name="o_work_experience[{{ $dutyType->id }}]"
                                                  label="{{ $dutyType->name }} (number)" type="number"
                                                  value="{{ $volunteer->getAttribute($dutyType->id === 1
                                                            ? 'o_work_experience_local'
                                                            : 'o_work_experience_international')
                                                             }}"
                                                  size="3"

                                                  min="0" step="1"/>
                                    <label class="formSubtitle2">Duties:</label>
                                    @foreach($duties AS $duty)
                                        <x-base.checkbox label="{{ $duty->name }}"
                                                         name="duty[{{ $dutyType->id }}][{{ $duty->id }}]"
                                                         type="checkbox" class="form-check-input"
                                                         :checked="$volunteer->hasDuty($duty, $dutyType)"/>
                                    @endforeach
                                @endforeach
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                10. Additional Information
                            </x-slot>
                            <x-base.textarea name="help" value="{{ $volunteer->help }}"
                                             label="Explain how you can help as a volunteer *" required/>
                            <x-base.textarea name="expectation" value="{{ $volunteer->expectation }}"
                                             label="Expectations as a volunteer"/>
                        </x-form.section>
                        
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="sticky">
                            <div class="noteWrap">
                                <h2 class="noteTitle">Note</h2>
                                <p>Edit your volunteer-information below. Leave defaults if no change is required.</p>
                            </div>

                            <div class="formSection">

                                <div class="form-group d-flex">
                                    <input class="ml-auto required-btn" type="submit" value="Save changes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
