@extends('layouts.app')
@section('content')

    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title">
                    <img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65"
                         alt="Search List"> Guest Search Result </h1>
            </div>


            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to search"/>

            <table aria-describedby="List all Guests from the search form" class="table">
                <tbody>
                <tr>
                    <th id="search_guest_name" class="big-desc">Name</th>
                    <th id="search_guest_disciplines" class="big-desc">Disciplines</th>
                    <th id="search_guest_age" class="big-desc">Age</th>
                    <th id="search_guest_language" class="big-desc">Languages</th>
                </tr>
                @foreach($guests AS $guest)
                    <tr>
                        <td>
                            @if(false)
                                {{ $guest->name ?? '' }}
                            @else
                                <a href="{{ route('guest.show', $guest ) }}">
                                    {{ $guest->name ?? '' }}
                                </a>
                            @endif
                        </td>
                        <td class="desc">
                            <ul>
                                @if($guest->disciplines->count())
                                    @foreach($guest->disciplines AS $discipline)
                                        <li>{{ $discipline->name }}</li>
                                    @endforeach
                                @else
                                    <li>No Experience</li>
                                @endif
                            </ul>
                        </td>
                        <td class="desc">
                            {{ $guest->age }} years
                        </td>
                        <td class="desc">
                            @if($guest->languageGuests()->where('language_proficiency_id', '!=', 4)->count())
                                @foreach($guest->languageGuests AS $languageGuest)
                                    @if($languageGuest->language_proficiency_id === 4)
                                        @continue;
                                    @endif

                                    <strong>{{ $languageGuest->language->name }}
                                        :</strong> {{ $languageGuest->languageProficiency->name }}<br/>
                                @endforeach
                            @else
                                No Languages selected
                            @endif

                            @if($guest->other_languages)
                                <strong>Other languages :</strong> {{ $guest->other_languages }}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
