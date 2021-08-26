@extends('layouts.app')
@section('content')

<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title">
                <img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65">
                Search Volunteers </h1>
        </div>


        <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to search" />

        <table class="table">
            <tbody>
                <tr>
                    <td class="big-desc">Name & Age</td>
                    <td class="big-desc">Country</td>
                    <td class="big-desc">OL-Work-Experience (in years)</td>
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
                                            {{ $dutyType->id === 1 ? $volunteer->o_work_expirence_local : $volunteer->o_work_expirence_international}}<br />
                                                @foreach($volunteer->duties()->where('duty_type_id', $dutyType->id)->get() AS $duty)
                                                    {{ $duty->name }} <br />
                                                @endforeach
                                    @endforeach
                                </li>
                            </ul>
                        </td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($user->projects()->count())
            <div class="mt-3">
                <form class="d-flex flex-column align-items-start" method="POST" action="volunteer/contactall" enctype="multipart/form-data">
                    <input type="hidden" name="list" value="">
                    <p>Invite all volunteers to project:</p>
                    <div class="selectWrap">
                        <select size="1" name="project">
                            -Project-
                        </select>
                    </div>
                    <input class="mt-3" type="submit" value="Contact volunteers" />
                </form>
            </div>
        @endif
    </div>
</section>

@endsection
