@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search4.svg') }}" width="65"
                                            height="65" alt="search icon"> Host Details</h1>
            </div>

            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to results"/>

            <table class="table" aria-describedby="Details of a Host">
                <tbody>

                @if($host->country->name)
                    <tr>
                        <th id="host_preview_country" class="font-weight-bold">Country</th>
                        <td>{{ $host->country->name }}</td>
                    </tr>
                @endif

                @if($host->zip || $host->city)
                    <tr>
                        <th id="host_preview_country" class="font-weight-bold">Postal code & City</th>
                        <td>{{ $host->zip }} {{ $host->city }}</td>
                    </tr>
                @endif

                @if($host->max_duration)
                    <tr>
                        <th id="host_preview_max_duration" class="font-weight-bold">Max. hosting duration:</th>
                        <td>{{ $host->max_duration }} weeks</td>
                    </tr>
                @endif

                @if($host->host_desc)
                    <tr>
                        <th id="host_preview_desc" class="font-weight-bold">Host description:</th>
                        <td>{{ $host->host_desc }}</td>
                    </tr>
                @endif

                @if($host->guest_expectations)
                    <tr>
                        <th id="host_preview_guest_expectations" class="font-weight-bold">Guest expectations:</th>
                        <td>{{ $host->guest_expectations }}</td>
                    </tr>
                @endif

                @if($host->name)
                    <tr>
                        <th id="host_preview_name" class="font-weight-bold">Name:</th>
                        <td>{{ $host->name }}</td>
                    </tr>
                @endif

{{--                @if($host->contact_phone) --}}
{{--                    <tr> --}}
{{--                        <th id="host_preview_phone" class="font-weight-bold">Phone:</th> --}}
{{--                        <td>{{ $host->contact_phone }}</td> --}}
{{--                    </tr> --}}
{{--                @endif --}}

{{--                @if($host->contact_email) --}}
{{--                    <tr> --}}
{{--                        <th id="host_preview_email" class="font-weight-bold">E-Mail:</th> --}}
{{--                        <td><a href="mailto:{{ $host->contact_email }}">{{ $host->contact_email }}</a></td> --}}
{{--                    </tr> --}}
{{--                @endif --}}

{{--                @if($host->contact_other) --}}
{{--                    <tr> --}}
{{--                        <th id="host_preview_contact_other" class="font-weight-bold">Other contact options:</th> --}}
{{--                        <td>{{ $host->contact_other }}</td> --}}
{{--                    </tr> --}}
{{--                @endif --}}


                @if($host->languageHosts()->where('language_proficiency_id', '!=', 4)->count() || $host->other_languages)
                    <tr>
                        <th id="host_preview_languages" class="font-weight-bold">Languages</th>
                        <td>
                            @foreach($host->languageHosts AS $languageHost)
                                @if($languageHost->language_proficiency_id === 4)
                                    @continue;
                                @endif

                                <strong>{{ $languageHost->language->name }}
                                    :</strong> {{ $languageHost->languageProficiency->name }}<br/>
                            @endforeach

                            @if($host->other_languages)
                                <strong>Other languages :</strong> {{ $host->other_languages }}
                            @endif

                        </td>
                    </tr>
                @endif

                @if($host->projectOffers->count() || $host->offer_text)
                    <tr>
                        <th id="host_preview_projectOffers" class="font-weight-bold">Offers:</th>
                        <td>
                            <ul>
                                @foreach($host->projectOffers AS $projectOffer)
                                    <li>{{ $projectOffer->name }}</li>
                                @endforeach

                                @if($host->offer_text)
                                    <li><strong>Other offers:</strong> {{ $host->offer_text }}</li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endif

                </tbody>
            </table>

            @if(false)
                <br>
                Contacts: {{ $host->email }}
            @endif

            @if($guest)
                <div id="mail-wrapper" class="d-flex flex-row">
                    <form class="d-flex flex-column align-items-start w-50" onsubmit="return searchHost(event)"
                          enctype="multipart/form-data">
                        @csrf
                        <x-form.section>
                            <x-slot name="title">
                                Ask Host for an accommodation
                            </x-slot>
                            <input type="hidden" value="{{ $host->id }}" name="host_id">
                            <input type="hidden" value="{{ $guest->id }}" name="guest_id">
                            <input class="mt-3" type="submit" name="submitButton" value="Contact host"/>
                        </x-form.section>
                    </form>
                    <div>
                        <h3 class="mb-4 formSectionTitle">Mail-Preview</h3>
                        <div class="border p-4">
                            <p>Dear {{ $host->name }}</p>
                            <p>Guest {{ $guest->name }} is looking for your help as a guest family.</p>
                            <p>Further details:</p>
                            <p>Name: {{ $guest->name }}</p>
                            <p>Country: {{ $guest->country->name }}</p>
                            <p>Birthdate: {{ $guest->birthdate }}</p>
                            <p>OL-Experience: since {{ $guest->ol_duration }}</p>
                            <p>Motivation: {{ $guest->motivation }}</p>
                            <p>In order to get in contact with {{ $guest->name }}, you can simply reply to this e-mail.</p>
                            <p>Kind Regards, <br />
                                iof volunteers</p>
                        </div>
                    </div>
                </div>
            @else
            
            <div>
               For a Host Request, you have to create a Guest.
                <a onclick="location.href='{{ route('guest.registerForm') }}'" class="ml-2">      
                    <input class="ml-auto" type="button" value="Register Guest" >
                </a>
            </div>
            @endif
        </div>
    </section>

@endsection
