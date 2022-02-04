@extends('layouts.app')
@section('content')

    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title">
                    <img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65" alt="Search List">
                    Volunteer Search Result </h1>
            </div>


            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to search"/>

            <table aria-describedby="List all volunteers from the search form" class="table">
                <tbody>
                <tr>
                    <th id="search_volunteer_name" class="big-desc">Name & Age</th>
                    <th id="search_volunteer_country" class="big-desc">Country</th>
                    <th id="search_volunteer_o_work_xp" class="big-desc">O-Work-Experience (number)</th>
                </tr>
                @foreach($volunteers AS $volunteer)
                    <tr>
                        <td>
                            @if(false)
                                {{ $volunteer->name ?? '' }}
                            @else
                                <a href="{{ route('volunteer.show', $volunteer ) }}">
                                    {{ $volunteer->name . ' (' . $volunteer->age .' years)' ?? '' }}
                                </a>
                            @endif
                        </td>
                        <td class="desc">{{ $volunteer->country->name }}</td>
                        <td class="desc">
                            <ul>
                                <li>
                                    @foreach($dutyTypes AS $dutyType)
                                        <strong>{{ $dutyType->name . ':'}}</strong>
                                        @if($dutyType->id === 1 ? $volunteer->o_work_experience_local : $volunteer->o_work_experience_international)
                                            {{ $dutyType->id === 1 ? $volunteer->o_work_experience_local : $volunteer->o_work_experience_international }}
                                            <br/>
                                        @else
                                            No Experience<br/>
                                        @endif
                                        @foreach($volunteer->duties()->where('duty_type_id', $dutyType->id)->get() AS $duty)
                                            {{ $duty->name }} <br/>
                                        @endforeach
                                    @endforeach
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
