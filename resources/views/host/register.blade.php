@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title"><img class="title-icon" src="{{asset('images/icon-add4.svg')}}" width="65"
                                       height="65" alt="add Host"> Host Registration Form</h1>

                <div class="warn pt-2"> All fields with * <strong>are mandatory</strong></div>
            </div>

            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="">

                <div class="row">
                    <div class="col-12 col-md-6">
                        <x-form.section>
                            <x-slot name="title">
                                1. Host details *
                            </x-slot>

                            <x-base.select name="country_id" label="Country *" :iconName="'selectArr'"
                                           :options="$countries" required/>
                            <x-base.input name="zip" label='Postal code *' required />
                            <x-base.input name="city" label='City *' required />
                            <x-base.input name="max_duration" value="{{ old('maxDuration') }}" label='Max. hosting duration in weeks *'
                                          type="number" min="1" required />
                            <x-base.textarea name="host_desc" label="Describe yourself as a host *" required />
                            <div id="host_description" class="font-weight-normal mb-2">
                                You may specify the characteristics of a potential guest here
                            </div>
                            <x-base.textarea name="guest_expectations" label="Guest expectations" />
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                2. Contacts
                            </x-slot>
                            <x-base.input name="name" value="{{ old('name') }}" label="Firstname and Lastname *"
                                          required />
                            <x-base.input name="contact_phone" label="Phone *" required/>
                            <x-base.input name="contact_email" label="E-mail *" type="email" required/>
                            <x-base.input name="contact_other" label="Other"/>
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
                                              value="{{ old('language['.$language->id.']') ?? 4 }}"/>
                            @endforeach

                            <div class="font-weight-normal mb-2">
                                Please state each language and level separated by commas below.
                            </div>
                            <x-base.input name="other_languages" label="Additional languages" class="additional-language"/>
                            <div id="error-wrapper-radio-language" class="mt-3"></div>
                        </x-form.section>

                         <x-form.section>
                            <x-slot name="title">
                                4. What can you offer? *
                            </x-slot>
                            <div class="form-group">
                                @foreach($offers AS $offer)
                                    <x-base.checkbox label="{{ $offer->name }}" name="offer[{{ $offer->id }}]"
                                                     class="form-check-input required-checkboxes-offers"/>
                                @endforeach
                                <div id="error-wrapper-host-offers" class="mt-3 error-wrapper"></div>
                            </div>
                            <x-base.input name="offer_text" label="Other (please state):"/>
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
                                    <input class="ml-auto required-btn-host check-radiobuttons-button" type="submit" value="Submit our request">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
