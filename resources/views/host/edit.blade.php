@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65"
                                            height="65" alt="search icon"> Edit Host</h1>
            </div>

            <div class="row pb-3">
                <div class="col-12 col-md-6">
                    <form action="{{ route('host.delete', $host) }}" method="POST"
                          onclick="return confirm('Are You Sure?')" onkeydown="return confirm('Are You Sure?')">
                        @method('DELETE')
                        @csrf
                        <input class="ml-auto float-md-right delete-btn" type="submit" value="Delete Host">
                    </form>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('host.update', $host->id) }}">
                @csrf
                @method("PATCH")

                <div class="row">
                    <div class="col-12 col-md-6">

                        <x-form.section>
                            <x-slot name="title">
                                1. Host details *
                            </x-slot>

                            <x-base.select name="country_id" label="Country" :value="$host->country"
                                           :iconName="'selectArr'" :options="$countries" required/>
                            <x-base.input name="max_duration" value="{{ $host->max_duration }}" label='Max hosting duration "" weeks *'
                                          type="number" min="1" required />
                            <x-base.textarea name="host_desc" value="{{ $host->host_desc }}" label="Host description" required />
                            <div id="host_description" class="font-weight-normal mb-2">
                                You may specify the characteristics of a potential guest here
                            </div>
                            <x-base.textarea name="guest_expectations" value="{{ $host->guest_expectations }}" label="Guest expectations" />
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                2. Contacts
                            </x-slot>
                            <x-base.input name="name" value="{{ $host->name }}" label="Firstname and Lastname *"
                                          required />
                            <x-base.input name="contact_phone" value="{{ $host->contact_phone }}" label="Phone *" required/>
                            <x-base.input name="contact_email" value="{{ $host->contact_email }}" label="E-mail *" type="email" required/>
                            <x-base.input name="contact_other" value="{{ $host->contact_other }}" label="Other"/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                3. Languages spoken
                            </x-slot>
                            <x-slot name="subtitle">
                                <div class="warn"> (required, even if only listed in "other")</div>
                            </x-slot>

                            @foreach($languages AS $language)
                                <x-base.radio name="language[{{ $language->id }}]" label="{{ $language->name }}"
                                              :options="$languageProficiency"
                                              value="{{$host->languageHosts->where('language_id', $language->id)->first()?->languageProficiency->id}}"/>
                            @endforeach

                            <div id="host_description" class="font-weight-normal mb-2">
                                State each language and level, separated by commas below
                            </div>
                            <x-base.input name="other_languages" value="{{ $host->other_languages }}" label="Additional languages"/>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                4. What can you offer? *
                            </x-slot>
                            <div class="form-group">
                                @foreach($offers AS $offer)
                                    <x-base.checkbox label="{{ $offer->name }}" name="offer[{{ $offer->id }}]"
                                                     class="form-check-input required-checkboxes-offers"
                                                     :checked="(int)$host->projectOffers->contains($offer)"/>
                                @endforeach
                                <div id="error-wrapper-host-offers" class="mt-3 error-wrapper"></div>
                            </div>
                            <x-base.input name="offer_text" value="{{ $host->offer_text }}" label="Other (please state):"/>
                        </x-form.section>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="sticky">
                            <div class="noteWrap">
                                <h2 class="noteTitle">Note</h2>
                                <p>Edit your host-informations below. Leave defaults if no changes are required.</p>
                            </div>

                            <div class="formSection">
                                <div class="form-group d-flex">
                                    <input class="ml-auto required-btn-host" type="submit" value="Save changes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
