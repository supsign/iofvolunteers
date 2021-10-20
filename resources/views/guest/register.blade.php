@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="pb-0 title"><img class="title-icon" src="{{asset('images/icon-add5.svg')}}" width="65"
                                            height="65" alt="register Guest"> Guest Registration Form</h1>
            </div>

            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="">

                <div class="row">
                    <div class="col-12 col-md-6">

                        <x-form.section>
                            <x-slot name="title">
                                1. Guest details *
                            </x-slot>
                            <x-base.select name="country_id" label="Country" :iconName="'selectArr'"
                                           :options="$countries" required/>
                            <x-base.input name="name" label="Firstname and Lastname *" required/>
                            <x-base.select name="gender_id" label="Gender" :iconName="'selectArr'" :options="$genders"/>
                            <x-base.input name="birthdate"
                                          label="Date of birth (yyyy-mm-dd) *"
                                          type="text" required class="datepicker-here" data-language='en'
                                          data-date-format="yyyy-mm-dd"
                                          :iconName="'calendarIcon'" required/>
                            <x-base.input name="email" value="{{ old('email') }}" label="E-mail *" type="email"
                                          required/>
                            <x-base.input name="phone" label="Phone *" required/>
                            <x-base.input name="contact_other" label="Other contact option"/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                2. O-Experience
                            </x-slot>
                            <x-base.input name="ol_duration"
                                          label="Year you started orienteering (yyyy) * (0 for no experience)"
                                          type="number" class="datepicker-here" data-language='en'
                                          data-date-format="yyyy"
                                          data-view="years" data-min-view="years" placeholder=" " value="" required
                                          :iconName="'calendarIcon'" min="0"/>
                            <x-base.input name="club"
                                          label="Your present club (if any)"/>
                            <div class="form-group">
                                <label class="formSubtitle2">Years of experience as competitor</label>
                            </div>
                            <x-base.input name="local_experience"
                                          label="Exprience with local Events (number)" type="number" size="3" min="0"
                                          step="1"/>
                            <x-base.input name="national_experience"
                                          label="Exprience with national Events (number)" type="number" size="3" min="0"
                                          step="1"/>
                            <x-base.input name="international_experience"
                                          label="Exprience with international Events (number)" type="number" size="3"
                                          min="0" step="1"/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                3. Languages spoken
                            </x-slot>
                            <x-slot name="subtitle">
                                <div class="warn"> (required, even if only listed in "additional languages")</div>
                            </x-slot>
                            @foreach($languages AS $language)
                                <x-base.radio name="language[{{ $language->id }}]" label="{{ $language->name }}"
                                              :options="$languageProficiency"
                                              value="{{ old('language['.$language->id.']') ?? 4 }}"/>
                            @endforeach

                            <x-base.input name="other_languages" label="Additional languages"/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                4. Additional Information
                            </x-slot>
                            <x-base.textarea name="o_expectations" label="O-Expectations" />
                            <x-base.textarea name="motivation" label="Motivation" />
                            <x-base.textarea name="health_restrictions" label="Allergies / Medical restrictions" />
                            <x-base.textarea name="offer" label="What you can offer" />
                            <x-base.textarea name="other_input" label="Anything you would like to add" />
                        </x-form.section>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="sticky">
                            <div class="noteWrap">
                                <h3 class="noteTitle">Disclaimer</h3>
                                <p>
                                    The details above are as accurate as possible. We understand that
                                    the
                                    IOF cannot be held responsible for our finding or not finding a suitable volunteer.
                                    We also
                                    understand that should we choose to recruit a volunteer through this database, the
                                    IOF cannot be
                                    held responsible for the terms or quality of work produced.
                                </p>
                            </div>

                            <div class="formSection">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="agb" id="agb"
                                               required>
                                        <label class="form-check-label" for="agb">
                                            I have read and understood the above. *
                                        </label>
                                        <div class="warn">Mandatory: Please accept the disclaimer.</div>
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
