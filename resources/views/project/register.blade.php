@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="pb-0 title"><img class="title-icon" src="{{ asset('images/icon-add3.svg') }}" width="65"
                                            height="65"> Project Registration Form</h1>
            </div>

            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="">

                <div class="row">
                    <div class="col-12 col-md-6">
                        <x-form.section>
                            <x-slot name="title">
                                1. Details of the Organisation *
                            </x-slot>
                            <x-base.input name="name" label="Name of your project *" required/>
                            <x-base.input name="organisation_name" label="Name of the organisation *" required/>
                            <x-base.select name="project_status_id" label="Status *" :iconName="'selectArr'"
                                           :options="$stati" required/>
                            <x-base.input name="organisation_webpage" label="Web page (if exists)"/>
                            <x-base.select name="region_id" label="Region *" :iconName="'selectArr'"
                                           :options="$continents" required/>
                            <x-base.input name="organisation_contact" label="Contact person *" required/>
                            <x-base.input name="organisation_contact_position" label="Position in the organisation *"
                                          required/>
                            <x-base.select name="country_id" label="Country" :iconName="'selectArr'"
                                           :options="$countries"/>
                            <x-base.input name="organisation_email" label="E-mail *" type="email" required/>
                            <x-base.input name="organisation_phone" label="Phone *" required/>
                            {{-- <x-base.input name="organisation_language_id" label="Native language(s) *" required /> --}}
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                2. Details of the Project
                            </x-slot>
                            <x-base.input name="place" value="{{ old('place') }}"
                                          label="Where will the volunteer be working? *" required/>
                            <x-base.input name="start_date" value="{{ old('start_date') }}"
                                          label="When is the volunteer expected to start?" class="datepicker-here"
                                          data-language='en' data-date-format="yyyy-mm-dd"
                                          :iconName="'calendarIcon'"/>
                            <x-base.input name="contact" value="{{ old('contact') }}" label="Contact person *"
                                          required/>
                            <div class="form-group">
                                <label class="formSubtitle2">What can you offer the volunteer? *</label>
                                @foreach($offers AS $offer)
                                    <x-base.checkbox label="{{ $offer->name }}" name="offer[{{ $offer->id }}]"
                                                     class="form-check-input"/>
                                @endforeach
                            </div>
                            <x-base.input name="offer_text" label="Other (please state):"/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                3. Discipline of Project *
                            </x-slot>
                            <div class="form-group">
                                @foreach($disciplines AS $discipline)
                                    <x-base.checkbox name="discipline[{{ $discipline->id }}]"
                                                     label="{{ $discipline->name }}" class="form-check-input"/>
                                @endforeach
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                4. Skills required
                            </x-slot>
                            <x-slot name="subtitle">
                                <div class="warn"> (Please tick all relevant to the project)</div>
                            </x-slot>
                            @foreach($skillTypes AS $skillType)
                                <div class="form-group">
                                    <div class="formSubtitle2">{{ $skillType->name }} *
                                        @isset($skillType->warn)
                                            <div class="font-weight-normal">{{ $skillType->warn }}</div>
                                        @endisset

                                        @foreach($skillType->skills AS $skill)
                                            <x-base.checkbox label="{{ $skill->name }}" name="skill[{{ $skill->id }}]"
                                                             class="form-check-input"/>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                5. Experience required
                            </x-slot>
                            <x-slot name="subtitle">
                                <div class="warn">(Select if relevant to the project)</div>
                            </x-slot>
                            <div class="form-group">
                                @foreach($dutyTypes AS $dutyType)
                                    <x-base.input name="o_work_experience[{{ $dutyType->id }}]"
                                                  label="{{ $dutyType->name }} (number)" type="number" size="3" min="0"
                                                  step="1"/>
                                    <label class="formSubtitle2">Duties:</label>
                                    @foreach($duties AS $duty)
                                        <x-base.checkbox label="{{ $duty->name }}"
                                                         name="duty[{{ $dutyType->id }}][{{ $duty->id }}]"
                                                         class="form-check-input"/>
                                    @endforeach
                                @endforeach
                            </div>
                            <x-base.input name="other_duties" label="Other duties? State below..."/>
                            <x-base.input name="exprience_details" label="Details of the work to be done *" required/>
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
