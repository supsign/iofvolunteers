@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65"
                                       height="65" alt="edit project"> Edit Project</h1>

                <div class="warn pt-2">All fields with * <strong>are mandatory</strong></div>
            </div>

            <div class="row pb-3">
                <div class="col-12 col-md-6">
                    <form action="{{ route('project.delete', $project) }}" method="POST"
                          onclick="return confirm('Are You Sure?')" onkeydown="return confirm('Are You Sure?')">
                        @method('DELETE')
                        @csrf
                        <input class="ml-auto float-md-right delete-btn" type="submit" value="Delete Project">
                    </form>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('project.update', $project->id) }}">
                @csrf
                @method("PATCH")

                <div class="row">
                    <div class="col-12 col-md-6">

                        <x-form.section>
                            <x-slot name="title">
                                1. Details of the Organisation *
                            </x-slot>
                            <x-base.input name="name" value="{{ $project->name }}" label="Name of the project *" required/>
                            <x-base.input name="organisation_name" value="{{ $project->organisation_name }}"
                                            label="Name of the organisation *" required/>
                            <x-base.select name="project_status_id" :value="$project->projectStatus"
                                            label="Status *" :iconName="'selectArr'"
                                            :options="$stati" required/>
                            <x-base.input name="organisation_webpage" value="{{ $project->organisation_webpage }}"
                                            label="Web page (if exists)"/>
                            {{-- <x-base.input name="organisation_language_id" label="Native language(s) *" required /> --}}
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                2. Details of the Project
                            </x-slot>

                            {{-- todo input field place --> ist das sinnvoll? Oder rausnehmen und beide Dropdowns Country und Continent benutzen--}}
                            <x-base.input name="place" value="{{ $project->place }}"
                                          label="Where will the volunteer be working? *" required/>
                            <x-base.select name="continent_id" :value="$project->continent"
                                           label="Region *" :iconName="'selectArr'"
                                           :options="$continents" required/>
                            <x-base.select name="country_id" :value="$project->country"
                                           label="Country *" required :iconName="'selectArr'"
                                           :options="$countries"/>
                            <x-base.input name="start_date" value="{{ date_format(new datetime($project->start_date), 'Y-m-d') }}"
                                          label="When is the volunteer expected to start?" class="datepicker-here"
                                          data-language='en' data-date-format="yyyy-mm-dd"
                                          :iconName="'calendarIcon'"/>
                            <x-base.input name="contact" value="{{ $project->contact }}" label="Contact person of the project *"
                                          required/>
                            <x-base.input name="organisation_email" value="{{ $project->organisation_email }}"
                                          label="E-mail of the contact person *" type="email" required/>
                            <x-base.input name="organisation_phone" value="{{ $project->organisation_phone }}"
                                          label="Phone of the contact person *" required/>

                            <div class="form-group">
                                <label class="formSubtitle2">What can you offer the volunteer? *</label>
                                @foreach($offers AS $offer)
                                    <x-base.checkbox label="{{ $offer->name }}" name="offer[{{ $offer->id }}]"
                                                     class="form-check-input required-checkboxes-offers"
                                                     :checked="(int)$project->projectOffers->contains($offer)"/>
                                @endforeach
                                <div id="error-wrapper-offers" class="mt-3"></div>
                            </div>
                            <x-base.input name="offer_text" value="{{ $project->offer_text }}" label="Other (please state):"/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                3. Discipline of Project *
                            </x-slot>
                            <div class="form-group">
                                @foreach($disciplines AS $discipline)
                                    <x-base.checkbox label="{{ $discipline->name }}" name="discipline[{{ $discipline->id }}]"
                                                     class="form-check-input required-checkboxes-disciplines"
                                                     :checked="(int)$project->disciplines->contains($discipline)"/>
                                @endforeach
                                <div id="error-wrapper-disciplines" class="mt-3"></div>
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                4. Skills required
                            </x-slot>
                            <x-slot name="subtitle">
                                <div class="info"> (Please tick all relevant to the project)</div>
                            </x-slot>
                            @foreach($skillTypes AS $skillType)
                                <div class="form-group">
                                    <div class="formSubtitle2">{{ $skillType->name }}
                                        @isset($skillType->warn)
                                            <div class="font-weight-normal">{{ $skillType->warn }}</div>
                                        @endisset

                                        @foreach($skillType->skills AS $skill)
                                            <x-base.checkbox label="{{ $skill->name }}" name="skill[{{ $skill->id }}]"
                                                             class="form-check-input"
                                                             :checked="(int)$project->skills->contains($skill)"/>
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
                                <div class="info">(Select if relevant to the project)</div>
                            </x-slot>
                            <div class="form-group">
                                @foreach($dutyTypes AS $dutyType)
                                    <x-base.input name="o_work_experience[{{ $dutyType->id }}]"
                                                    value="{{ $project->getAttribute($dutyType->id === 1
                                                        ? 'o_work_experience_local'
                                                        : 'o_work_experience_international')
                                                        }}"
                                                    label="{{ $dutyType->name }} (number)" type="number" size="3" min="0"
                                                    step="1"/>
                                    <label class="formSubtitle2">Duties:</label>
                                    @foreach($duties AS $duty)
                                        <x-base.checkbox label="{{ $duty->name }}"
                                                        name="duty[{{ $dutyType->id }}][{{ $duty->id }}]"
                                                        class="form-check-input"
                                                        :checked="(int)$project->duties->contains($duty)"/>
                                    @endforeach
                                @endforeach
                            </div>
                            <x-base.input name="other_duties" value="{{ $project->other_duties }}" label="Other duties? State below..."/>
                            <x-base.input name="exprience_details" value="{{ $project->exprience_details }}" label="Details of the work to be done *" required/>
                        </x-form.section>
                        
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="sticky">
                            <div class="noteWrap">
                                <h2 class="noteTitle">Note</h2>
                                <p>Edit your project-informations below. Leave defaults if no change is required.</p>
                            </div>

                            <div class="formSection">

                                <div class="form-group d-flex">
                                    <input class="ml-auto required-btn-offer required-btn-disciplines" type="submit" value="Save changes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
