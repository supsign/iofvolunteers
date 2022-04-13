@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65"
                                       height="65" alt="edit host"> Edit Host</h1>

                <div class="warn pt-2">All fields with * <strong>are mandatory</strong></div>
            </div>

            <div class="row pb-3">
                <div class="col-12 col-md-6 row m-0 justify-content-md-between align-content-center justify-content-center">
                 <x-base.toggleActive modelName="host" :model="$host" />
                    <form action="{{ route('host.delete', $host) }}" method="POST"
                          onclick="return confirm('Are You Sure?')" onkeydown="return confirm('Are You Sure?')">
                        @method('DELETE')
                        @csrf
                        <input class="delete-btn m-2 m-lg-0" type="submit" value="Delete Host">
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
                            <x-base.input name="zip" value="{{ $host->zip }}" label='Postal code *' required />
                            <x-base.input name="city" value="{{ $host->city }}" label='City *' required />
                            <x-base.input name="max_duration" value="{{ $host->max_duration }}" label='Max. hosting duration in weeks *'
                                          type="number" min="1" required />
                            <x-base.textarea name="host_desc" value="{{ $host->host_desc }}" label="Describe yourself as a host *" required />
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
                                3. Languages *
                            </x-slot>
                            <x-slot name="subtitle">
                                <div class="warn"> (required, even if only listed in "Additional languages")</div>
                            </x-slot>

                            @foreach($languages AS $language)
                                <x-base.radio name="language[{{ $language->id }}]" label="{{ $language->name }}"
                                              :options="$languageProficiency" class="radio-language"
                                              value="{{$host->languageHosts->where('language_id', $language->id)->first()?->languageProficiency->id}}"/>
                            @endforeach

                            <div class="font-weight-normal mb-2">
                                Please state each language and level separated by commas below.
                            </div>
                            <x-base.input name="other_languages" value="{{ $host->other_languages }}"
                                          label="Additional languages"
                                          class="additional-language"/>
                            <div id="error-wrapper-radio-language" class="mt-3"></div>
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
                                    <input class="ml-auto required-btn-host check-radiobuttons-button" type="submit" value="Save changes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
