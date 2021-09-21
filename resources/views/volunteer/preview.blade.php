@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65"
                                            height="65"> Volunteer Details</h1>
            </div>

            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to results"/>

            <table class="table">
                <tbody>

                <tr>
                    <td class="font-weight-bold">Name:</td>
                    <td>{{ $volunteer->name }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Sex:</td>
                    <td>{{ $volunteer->gender->name ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Country & Club:</td>
                    <td>
                        <strong>Country:</strong> {{ $volunteer->country->name }}<br>
                        @if($volunteer->club)
                            <strong>Club:</strong> {{ $volunteer->club }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Age</td>
                    <td>{{ $volunteer->age }} years</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Experience</td>
                    <td>since {{ $volunteer->ol_duration }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Driving license:</td>
                    <td>{{ $volunteer->driving_licence ? 'Yes' : 'No' }}</td>
                </tr>

                @if($volunteer->languageVolunteers()->where('language_proficiency_id', '!=', 4)->count() || $volunteer->other_languages)
                    <tr>
                        <td class="font-weight-bold">Languages</td>
                        <td>
                            @foreach($volunteer->languageVolunteers AS $languageVolunteer)
                                @if($languageVolunteer->language_proficiency_id === 4)
                                    @continue;
                                @endif

                                <strong>{{ $languageVolunteer->language->name }}
                                    :</strong> {{ $languageVolunteer->languageProficiency->name }}<br/>
                            @endforeach

                            @if($volunteer->other_languages)
                                <strong>Other languages :</strong> {{ $volunteer->other_languages }}
                            @endif

                        </td>
                    </tr>
                @endif

                @if($volunteer->continents->count())
                    <tr>
                        <td class="font-weight-bold">Prefered destinations:</td>
                        <td>
                            <ul>
                                @foreach($volunteer->continents AS $continent)
                                    <li>{{ $continent->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endif

                @if($volunteer->disciplines->count())
                    <tr>
                        <td class="font-weight-bold">Disciplines of Experience</td>
                        <td>
                            <ul>
                                @foreach($volunteer->disciplines AS $discipline)
                                    <li>{{ $discipline->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endif

                @if($volunteer->local_experience || $volunteer->national_experience || $volunteer->international_experience)
                    <tr>
                        <td class="font-weight-bold">O-Experience (in years)</td>
                        <td>
                            <ul>
                                @if($volunteer->local_experience)
                                    <li><strong>Local:</strong>
                                        {{ $volunteer->local_experience }}
                                    </li>
                                @endif

                                @if($volunteer->national_experience)
                                    <li><strong>National:</strong>
                                        {{ $volunteer->national_experience }}
                                    </li>
                                @endif

                                @if($volunteer->international_experience)
                                    <li><strong>International:</strong>
                                        {{ $volunteer->international_experience }}
                                    </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endif

                @if($volunteer->o_work_experience_local || $volunteer->o_work_experience_international)
                    <tr>
                        <td class="font-weight-bold">O-Work Experience (in years)</td>
                        <td>
                            <ul>
                                @if($volunteer->o_work_experience_local)
                                    <li><strong>Local:</strong>
                                        {{ $volunteer->o_work_experience_local }}
                                    </li>
                                @endif

                                @if($volunteer->o_work_experience_international)
                                    <li><strong>International:</strong>
                                        {{ $volunteer->o_work_experience_international }}
                                    </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endif

                @if($volunteer->skillTypes->count())
                    <tr>
                        <td class="font-weight-bold">{{ __('Skills') }}</td>
                        <td>
                            <ul>
                                @foreach($volunteer->skillTypes AS $skillType)
                                    <strong>{{ $skillType->name }}</strong><br/>
                                    @foreach($volunteer->skills()->where('skill_type_id', $skillType->id)->get() AS $skill)
                                        {{ $skill->name }}<br/>
                                    @endforeach

                                    @if($skillType->id === 2)
                                        @if($volunteer->getFirstMedia('map_sample'))
                                            <div>
                                                <a href="{{ route('media.download', $volunteer->getFirstMedia('map_sample')->id) }}">
                                                    Download map samples <b>here</b>
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach

                                @if($volunteer->skill_other)
                                    <strong>Other:</strong><br/> {{ $volunteer->skill_other }}
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td class="font-weight-bold">My benefits</td>
                    <td>{{ $volunteer->help }}</td>
                </tr>
                <tr>
                    @if($volunteer->expectation)
                        <td class="font-weight-bold">Expectations</td>
                        <td>{{ $volunteer->expectation }}
                    @endif
                </tr>

                </tbody>
            </table>

            @if(false)
                <br>
                Contacts: {{ $volunteer->email }}
            @endif

            @if(true)
                <div id="mail-wrapper" class="d-flex flex-row">
                    <form class="d-flex flex-column align-items-start w-50" onsubmit="return searchVolunteer(event)"
                          enctype="multipart/form-data">
                        @csrf
                        <x-form.section>
                            <x-slot name="title">
                                Invite volunteer to your project
                            </x-slot>
                            <x-base.select name="project_id" label="Project" :iconName="'selectArr'" :options="$projects"
                                           class="project_name_select" required/>
                            <input type="hidden" value="{{ $volunteer->id }}" name="volunteer_id">
                            <input class="mt-3" type="submit" name="submitButton" value="Contact volunteer"/>
                        </x-form.section>
                    </form>
                    <div>
                        <h3 class="mb-4 formSectionTitle">Mail-Preview</h3>
                        <div class="border p-4">
                            <p>Dear {{ $volunteer->name }}</p>
                            <p>{{ $user->firstname }} {{ $user->lastname }} is looking for your volunteer help with project "Projectname".</p>
                            <p>To learn more about this project, go to IOF’s Connecting Worldwide volunteer platform and search for the project called "Projectname".</p>
                            <p>In order to get in contact with the responsible person of this project, you can simply reply to this e-mail.</p>
                            <p>Kind Regards, <br />
                            iof volunteers</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
