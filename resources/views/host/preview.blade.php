@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search4.svg') }}" width="65"
                                            height="65" alt="search icon"> Host Details</h1>
            </div>

            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to results"/>

            <table class="table">
                <tbody>

                @if($host->country->name)
                    <tr>
                        <th class="font-weight-bold">Country</th>
                        <td>{{ $host->country->name }}</td>
                    </tr>
                @endif

                @if($host->max_duration)
                    <tr>
                        <th class="font-weight-bold">Max. hosting duration:</th>
                        <td>{{ $host->max_duration }} weeks</td>
                    </tr>
                @endif

                @if($host->host_desc)
                    <tr>
                        <th class="font-weight-bold">Host description:</th>
                        <td>{{ $host->host_desc }}</td>
                    </tr>
                @endif

                @if($host->guest_expectations)
                    <tr>
                        <th class="font-weight-bold">Host description:</th>
                        <td>{{ $host->guest_expectations }}</td>
                    </tr>
                @endif

                @if($host->name)
                    <tr>
                        <th class="font-weight-bold">Name:</th>
                        <td>{{ $host->name }}</td>
                    </tr>
                @endif

                @if($host->contact_phone)
                    <tr>
                        <th class="font-weight-bold">Phone:</th>
                        <td>{{ $host->contact_phone }}</td>
                    </tr>
                @endif

                @if($host->contact_email)
                    <tr>
                        <th class="font-weight-bold">E-Mail:</th>
                        <td><a href="mailto:{{ $host->contact_email }}">{{ $host->contact_email }}</a></td>
                    </tr>
                @endif

                @if($host->contact_other)
                    <tr>
                        <th class="font-weight-bold">Other contact options:</th>
                        <td>{{ $host->contact_other }}</td>
                    </tr>
                @endif


                @if($host->languageHosts()->where('language_proficiency_id', '!=', 4)->count() || $host->other_languages)
                    <tr>
                        <th class="font-weight-bold">Languages</th>
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
                        <th id="projectOffers" class="font-weight-bold">Offers:</th>
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
        </div>
    </section>

@endsection
