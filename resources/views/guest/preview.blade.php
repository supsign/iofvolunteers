@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search4.svg') }}" width="65"
                                            height="65" alt="search icon"> Guest Details</h1>
            </div>

            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to results"/>

            <table class="table" aria-describedby="Details of a Guest">
                <tbody>

                @if($guest->name)
                    <tr>
                        <th id="guest_preview_name" class="font-weight-bold">Name</th>
                        <td>{{ $guest->name }}</td>
                    </tr>
                @endif

                @if($guest->country || $guest->club)
                    <tr>
                        <th id="guest_preview_country" class="font-weight-bold">Country & Club</th>
                        <td>{{ $guest->country->name }}<br />
                            @if($guest->club)
                                <strong>Club:</strong> {{ $guest->club }}
                            @endif
                        </td>
                    </tr>
                @endif

                @if($guest->gender)
                    <tr>
                        <th id="guest_preview_sex" class="font-weight-bold">Gender</th>
                        <td>{{ $guest->gender->name ?? '-' }}</td>
                    </tr>
                @endif

                @if($guest->age)
                    <tr>
                        <th id="guest_preview_age" class="font-weight-bold">Age</th>
                        <td>{{ $guest->age }} years</td>
                    </tr>
                @endif


                <tr>
                    <th id="guest_preview_driving" class="font-weight-bold">Driving license</th>
                    <td>{{ $guest->driving_licence ? 'Yes' : 'No' }}</td>
                </tr>

                @if($guest->ol_duration)
                    <tr>
                        <th id="guest_preview_ol_experience" class="font-weight-bold">O-Experience</th>
                        <td>since {{ $guest->ol_duration }}</td>
                    </tr>
                @endif


                @if($guest->disciplines->count())
                    <tr>
                        <th id="guest_preview_disciplines" class="font-weight-bold">Disciplines of Experience</th>
                        <td>
                            <ul>
                                @foreach($guest->disciplines AS $discipline)
                                    <li>{{ $discipline->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endif

                @if($guest->local_experience || $guest->national_experience || $guest->international_experience)
                    <tr>
                        <th id="guest_preview_oexperience" class="font-weight-bold">O-Experience (amount of events)</th>
                        <td>
                            <ul>
                                @if($guest->local_experience)
                                    <li><strong>Local:</strong>
                                        {{ $guest->local_experience }}
                                    </li>
                                @endif

                                @if($guest->national_experience)
                                    <li><strong>National:</strong>
                                        {{ $guest->national_experience }}
                                    </li>
                                @endif

                                @if($guest->international_experience)
                                    <li><strong>International:</strong>
                                        {{ $guest->international_experience }}
                                    </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endif

                {{--@if($guest->max_duration)
                    <tr>
                        <th id="guest_preview_max_duration" class="font-weight-bold">Max. hosting duration</th>
                        <td>{{ $guest->max_duration }} weeks</td>
                    </tr>
                @endif --}}

                @if($guest->languageGuests()->where('language_proficiency_id', '!=', 4)->count() || $guest->other_languages)
                    <tr>
                        <th id="guest_preview_languages" class="font-weight-bold">Languages</th>
                        <td>
                            @foreach($guest->languageGuests AS $languageGuest)
                                @if($languageGuest->language_proficiency_id === 4)
                                    @continue;
                                @endif

                                <strong>{{ $languageGuest->language->name }}
                                    :</strong> {{ $languageGuest->languageProficiency->name }}<br/>
                            @endforeach

                            @if($guest->other_languages)
                                <strong>Other languages :</strong> {{ $guest->other_languages }}
                            @endif

                        </td>
                    </tr>
                @endif

                @if($guest->o_expectations)
                    <tr>
                        <th id="guest_preview_oexpectations" class="font-weight-bold">O-Expectations</th>
                        <td>{{ $guest->o_expectations }}</td>
                    </tr>
                @endif

                @if($guest->motivation)
                    <tr>
                        <th id="guest_preview_motivation" class="font-weight-bold">Motivation</th>
                        <td>{{ $guest->motivation }}</td>
                    </tr>
                @endif

                @if($guest->health_restrictions)
                    <tr>
                        <th id="guest_preview_medical" class="font-weight-bold">Allergies / Medical restrictions</th>
                        <td>{{ $guest->health_restrictions }}</td>
                    </tr>
                @endif

                @if($guest->offer)
                    <tr>
                        <th id="guest_preview_offers" class="font-weight-bold">Offers</th>
                        <td>{{ $guest->offer }}</td>
                    </tr>
                @endif

                @if($guest->other_input)
                    <tr>
                        <th id="guest_preview_other_input" class="font-weight-bold">Other input</th>
                        <td>{{ $guest->other_input }}</td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </section>

@endsection
