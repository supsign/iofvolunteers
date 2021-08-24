@extends('layouts.app')
@section('content')
<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65"> Volunteer Details</h1>
        </div>

        <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to results" />


        <table class="table">
            <tbody>

                <tr>
                    <td>Name</td>
                    <td>{{ $volunteer->name }}</td>
                </tr>

                <tr>
                    <td>Sex</td>
                    <td>{{ $volunteer->gender->name ?? 'none' }}</td>
                </tr>
                <tr>
                    <td>Country & Club</td>
                    <td>
                        {{ $volunteer->country->name }}<br>
                        {{ $volunteer->club }}
                    </td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>{{ $volunteer->age }}</td>
                </tr>
                <tr>
                    <td>Experience</td>
                    <td>since {{ $volunteer->ol_duration }}</td>
                </tr>
                <tr>
                    <td>Driving license:</td>
                    <td>{{ $volunteer->driving_licence ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Languages</td>
                    <td>
                        @foreach($volunteer->languageVolunteers AS $languageVolunteer)
                            @if($languageVolunteer->language_proficiency_id === 4)
                                @continue;
                            @endif

                            {{ $languageVolunteer->language->name }}: {{ $languageVolunteer->languageProficiency->name }}<br />

                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Prefered destinations:</td>
                    <td>
                        <ul>
                            @foreach($volunteer->continents AS $continent)
                                <li> {{ $continent->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>O-Experience</td>
                    <td>
                        <ul>
                            @foreach($volunteer->disciplines AS $discipline)
                                <li>{{ $discipline->name }}</li>
                            @endforeach
                        </ul>
                        <ul>
                            <li>Local: {{ $volunteer->expirenceLocal->value ?? '' }}</li>
                            <li> National: {{ $volunteer->expirenceNational->value ?? '' }}</li>
                            <li>International: {{ $volunteer->expirenceInternational->value ?? '' }}</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>O-Work Experience</td>
                    <td>
                        <ul>
                            @foreach($volunteer->skillTypes AS $skillType)
                                <li>{{ $skillType->name }}</li>
                                <ul>
                                    @foreach($volunteer->skills AS $skill)
                                        @if($skill->skill_type_id !== $skillType->id)
                                            @continue;
                                        @endif
                                        <li>{{ $skill->name }}</li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </ul>
                    </td>
                </tr>


                <tr>
                    <td>My benefits</td>
                    <td>{{ $volunteer->help }}</td>
                </tr>
                <tr>
                    <td>Expectations</td>
                    <td>{{ $volunteer->expectation }}
                </tr>
                <tr>
                    <td>Experiences</td>
                    <td>{{ $volunteer->experience }}</td>
                </tr>
                <tr>
                    <td>Education / Seminars</td>
                    <td>{{ $volunteer->education }}</td>
                </tr>

            </tbody>
        </table>
        @if(false)
            <br>
            Contacts: {{ $volunteer->email }}, {{ $volunteer->phone }}
        @endif

        <br>
        <b></b>
        <br>

        <br>
        <b></b>
        <br>


        @if(false)
            <div class="mt-3">
                <form class="d-flex flex-column align-items-start" method="POST" action="/volunteer/contact" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $volunteer->id }}">
                    <p>Invite volunteer to project:</p>
                    <div class="selectWrap">
                        <select size="1" name="project">
                            Projects
                        </select>
                    </div>
                    <input class="mt-3" type="submit" value="Contact volunteer" />
                </form>
            </div>
        @endif
    </div>
</section>

@endsection
