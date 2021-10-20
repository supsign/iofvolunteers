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
                    <th id="search_guest_country" class="big-desc">Country</th>
                    <th id="search_guest_description" class="big-desc">O-Work-Experience (in years)</th>
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
                            {{ $guest->country->name }}
                        </td>
                        <td class="desc">
                            <ul>
                                <li>
                                    <strong>Experience with local Events:</strong> {{ $guest->local_experience }}<br />
                                </li>
                                <li>
                                    <strong>Experience with national Events:</strong> {{ $guest->national_experience }}<br />
                                </li>
                                <li>
                                    <strong>Experience with international Events:</strong> {{ $guest->international_experience }}<br />
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
