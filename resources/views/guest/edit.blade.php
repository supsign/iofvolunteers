@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65"
                                       height="65" alt="edit guest"> Edit Guest</h1>

                <div class="warn pt-2">All fields with * <strong>are mandatory</strong></div>
            </div>

            <div class="row pb-3">
                <div class="col-12 col-md-6 row m-0 justify-content-md-between align-content-center justify-content-center">
                    <div><x-base.toggleActive modelName="guest" :model="$guest" /></div>
                    <form action="{{ route('guest.delete', $guest) }}" method="POST"
                          onclick="return confirm('Are You Sure?')" onkeydown="return confirm('Are You Sure?')">
                        @method('DELETE')
                        @csrf
                        <input class="delete-btn m-2 m-lg-0"  type="submit" value="Delete Guest">
                    </form>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('guest.update', $guest->id) }}">
                @csrf
                @method("PATCH")

                <div class="row">
                    <div class="col-12 col-md-6">
                        <x-form.section>
                            <x-slot name="title">
                                1. Guest details *
                            </x-slot>
                            <x-base.select name="country_id" label="Country" :value="$guest->country"
                                           :iconName="'selectArr'" :options="$countries" required/>
                            <x-base.input name="name" label="Firstname and Lastname *" value="{{ $guest->name }}"
                                          required/>
                            <x-base.select name="gender_id" label="Gender" :value="$guest->gender"
                                           :iconName="'selectArr'" :options="$genders"/>
                            <x-base.input name="birthdate" label="Date of birth (yyyy-mm-dd) *"
                                          value="{{ date_format(new datetime($guest->birthdate), 'Y-m-d') }}"
                                          type="text" required class="datepicker-here" data-language='en'
                                          data-date-format="yyyy-mm-dd"
                                          :iconName="'calendarIcon'" required/>
                            <x-base.input name="email" label="E-mail *" value="{{ $guest->email }}" type="email"
                                          required/>
                            <x-base.input name="phone" label="Phone *" value="{{ $guest->phone }}" required/>
                            <x-base.input name="contact_other" label="Other contact option"
                                          value="{{ $guest->contact_other }}"/>
                            <x-base.select name="driving_licence"
                                           label="International driving license? *"
                                           :options="collect([(object)array('id' => 0, 'name' => 'No'), (object)array('id' => 1, 'name' => 'Yes')])"
                                           :iconName="'selectArr'"
                                           :value="$guest->drivingLicenceModel" required/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                2. Experience in the following disciplines
                            </x-slot>
                            <div class="form-group">
                                @foreach($disciplines AS $discipline)
                                    <x-base.checkbox name="discipline[{{ $discipline->id }}]"
                                                     label="{{ $discipline->name }}"
                                                     class="form-check-input"
                                                     :checked="(int)$guest->disciplines->contains($discipline)"/>
                                @endforeach
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                3. O-Experience
                            </x-slot>
                            <x-base.input name="ol_duration"
                                          label="Year you started orienteering (yyyy) * (0 for no experience)"
                                          value="{{ $guest->ol_duration }}"
                                          type="number" class="datepicker-here" data-language='en'
                                          data-date-format="yyyy"
                                          data-view="years" data-min-view="years"
                                          placeholder=" " required
                                          :iconName="'calendarIcon'" min="0"/>
                            <x-base.input name="club" label="Your present club (if any)"
                                          value="{{ $guest->club }}"/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                <h3>
                                    Amount of Events as competitor
                                </h3>
                            </x-slot>
                            <x-slot name="subtitle">
                                <div>State below on how many events you attended for each given Event-Type.</div>
                                <div class="info">State the approximate amount of events - 0 for no experience.</div>
                            </x-slot>
                            <x-base.input name="local_experience"
                                          label="Experience with local Events (amount)"
                                          value="{{ $guest->local_experience }}"
                                          type="number" size="3" min="0" step="1"/>
                            <x-base.input name="national_experience"
                                          label="Experience with national Events (amount)"
                                          value="{{ $guest->national_experience }}"
                                          type="number" size="3" min="0" step="1"/>
                            <x-base.input name="international_experience"
                                          label="Experience with international Events (amount)"
                                          value="{{ $guest->international_experience }}"
                                          type="number" size="3" min="0" step="1"/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                4. Languages spoken *
                            </x-slot>
                            <x-slot name="subtitle">
                                <div class="warn"> (required, even if only listed in "Additional languages")</div>
                            </x-slot>
                            @foreach($languages AS $language)
                                <x-base.radio name="language[{{ $language->id }}]" label="{{ $language->name }}"
                                              :options="$languageProficiency" class="radio-language"
                                              value="{{$guest->languageGuests->where('language_id', $language->id)->first()?->languageProficiency->id}}"/>
                            @endforeach

                            <div class="font-weight-normal mb-2">
                                Please state each language and level separated by commas below.
                            </div>
                            <x-base.input name="other_languages" label="Additional languages"
                                          value="{{ $guest->other_languages }}"
                                          class="additional-language"/>
                            <div id="error-wrapper-radio-language" class="mt-3"></div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                5. Additional Information
                            </x-slot>
                            <x-base.textarea name="o_expectations" label="O-Expectations"
                                             value="{{ $guest->o_expectations }}"/>
                            <x-base.textarea name="motivation" label="Motivation"
                                             value="{{ $guest->motivation }}"/>
                            <x-base.textarea name="health_restrictions" label="Allergies / Medical restrictions"
                                             value="{{ $guest->health_restrictions }}"/>
                            <x-base.textarea name="offer" label="What you can offer"
                                             value="{{ $guest->offer }}"/>
                            <x-base.textarea name="other_input" label="Anything you would like to add"
                                             value="{{ $guest->other_input }}"/>
                        </x-form.section>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="sticky">
                            <div class="noteWrap">
                                <h2 class="noteTitle">Note</h2>
                                <p>Edit your guest-information below. Leave defaults if no changes are required.</p>
                            </div>

                            <div class="formSection">
                                <div class="form-group d-flex">
                                    <input class="ml-auto check-radiobuttons-button" type="submit" value="Save changes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
