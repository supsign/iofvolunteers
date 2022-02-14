@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65"
                                            height="65" alt="search icon"> Project Details</h1>
            </div>
            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to list"/>
            @if($user->id === $project->user_id)
                <input type="button" class="ml-auto float-md-right" onclick="location.href='{{ route('project.edit', $project ) }}';" value="Edit Project">
            @endif

            <table aria-describedby="Details of a Project" class="table">
                <tbody>

                    @if($project->name)
                        <tr>
                            <th id="project_project_name" class="font-weight-bold">Project name:</th>
                            <td>{{ $project->name }}</td>
                        </tr>
                    @endif

                    @if($project->organisation_name)
                        <tr>
                            <th id="organisation_name" class="font-weight-bold">Organisation:</th>
                            <td>{{ $project->organisation_name }}</td>
                        </tr>
                    @endif

                    @if($project->projectStatus->name)
                        <tr>
                            <th id="projectStatus" class="font-weight-bold">Status:</th>
                            <td>{{ $project->projectStatus->name }}</td>
                        </tr>
                    @endif

                    @if($project->organisation_webpage)
                        <tr>
                            <th id="organisation_webpage" class="font-weight-bold">Web page:</th>
                            <td><a href="{{ $project->organisation_webpage }}" target="_blank" rel=noopener>{{ $project->organisation_webpage }}</a></td>
                        </tr>
                    @endif

                    @if($project->continent->name)
                        <tr>
                            <th id="project_continent" class="font-weight-bold">Region:</th>
                            <td>
                                {{ $project->continent->name }}
                            </td>
                        </tr>
                    @endif

                    @if($project->country->name)
                        <tr>
                            <th id="project_country" class="font-weight-bold">Country:</th>
                            <td>{{ $project->country->name }}</td>
                        </tr>
                    @endif

                    {{-- todo input field place --> ist das sinnvoll? Oder rausnehmen und beide Dropdowns Country und Continent benutzen--}}
                    @if($project->place)
                        <tr>
                            <th id="project_place" class="font-weight-bold">Work location:</th>
                            <td>{{ $project->place }}</td>
                        </tr>
                    @endif

                    @if($project->contact)
                        <tr>
                            <th id="project_contact" class="font-weight-bold">Project contact person:</th>
                            <td>{{ $project->contact }}</td>
                        </tr>
                    @endif

                    @if($project->start_date)
                        <tr>
                            <th id="start_date" class="font-weight-bold">Start Date:</th>
                            <td>{{ date_format(new datetime($project->start_date), 'Y-m-d') }}</td>
                        </tr>
                    @endif

                    @if($project->projectOffers->count() || $project->offer_text)
                        <tr>
                            <th id="projectOffers" class="font-weight-bold">Offers:</th>
                            <td>
                                <ul>
                                     @foreach($project->projectOffers AS $projectOffer)
                                        <li>{{ $projectOffer->name }}</li>
                                    @endforeach

                                    @if($project->offer_text)
                                        <li><strong>Other offers:</strong> {{ $project->offer_text }}</li>
                                    @endif
                                </ul>
                            </td>
                        </tr>
                    @endif

                    @if($project->disciplines->count())
                        <tr>
                            <th id="project_disciplines" class="font-weight-bold">Discipline of Project:</th>
                            <td>
                                <ul>
                                    @foreach($project->disciplines AS $discipline)
                                        <li>{{ $discipline->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif

                    @if($project->skillTypes->count())
                        <tr>
                            <th id="project_skillType" class="font-weight-bold">Skills:</th>
                            <td>
                                <ul>
                                    @foreach($project->skillTypes AS $skillType)
                                        <strong>{{ $skillType->name }}</strong><br/>
                                        @foreach($project->skills()->where('skill_type_id', $skillType->id)->get() AS $skill)
                                            {{ $skill->name }}<br/>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif

                    @if( $project->o_work_experience_local || $project->o_work_experience_international || $project->offer_text)
                        <tr>
                            <th id="project_o_work_experience" class="font-weight-bold">required Experience:</th>
                            <td>
                                <ul>
                                    @foreach($dutyTypes AS $dutyType)
                                        @if($dutyType->id === 1 ? $project->o_work_experience_local : $project->o_work_experience_international)
                                            <li><strong>{{ $dutyType->name . ':'}}</strong>
                                                @if($dutyType->id === 1 ? $project->o_work_experience_local : $project->o_work_experience_international)
                                                    {{ $dutyType->id === 1 ? $project->o_work_experience_local : $project->o_work_experience_international }}
                                                @else
                                                    No Experience
                                                @endif
                                            </li>

                                            @foreach($project->duties()->where('duty_type_id', $dutyType->id)->get() AS $duty)
                                                <li>{{ $duty->name }} </li>
                                            @endforeach
                                        @endif
                                    @endforeach
                                    @if($project->offer_text)
                                        <li><strong>Other Duties:</strong> {{ $project->other_duties }}</li>
                                    @endif
                                </ul>
                            </td>
                        </tr>
                    @endif

                    @if($project->exprience_details)
                        <tr>
                            <th id="exprience_details" class="font-weight-bold">Work details:</th>
                            <td>{{ $project->exprience_details }}</td>
                        </tr>
                    @endif

                </tbody>
            </table>

            @if($project->volunteers->count() && $user->id === $project->user_id)
                <x-form.section>
                    <x-slot name="title">
                        Interested Volunteers
                    </x-slot>

                    <div class="row font-weight-bold">
                        <div class="col p-4 border">Name</div>
                    </div>
                    <div class="row">
                        @foreach($project->volunteers as $volunteer)
                            <div class="border p-4 col">
                                <a href="{{ route('volunteer.show', $volunteer) }}">
                                    {{ $volunteer->name }}
                                </a>
                            </div>
                            <div class="w-100"></div>
                        @endforeach
                    </div>
                </x-form.section>
            @endif

            @if($volunteer)
                <div id="mail-wrapper" class="d-flex flex-row">
                    <form class="d-flex flex-column align-items-start w-50" onsubmit="return searchProject(event)"
                          enctype="multipart/form-data">
                        @csrf
                        <x-form.section>
                            <x-slot name="title">
                                Offer your help for this project
                            </x-slot>

                            <input type="hidden" value="{{ $project->id }}" name="project_id">
                            <input type="hidden" value="{{ $volunteer->id }}" name="volunteer_id">
                            <input class="mt-3" type="submit" name="submitButton" value="Contact project owner"/>
                        </x-form.section>
                    </form>
                    <div>
                        <h3 class="mb-4 formSectionTitle">Mail-Preview</h3>
                        <div class="border p-4">
                            <p>Dear {{ $project->contact }}</p>
                            <p>The volunteer {{ $user->firstname }} {{ $user->lastname }} is interested in helping you with your project {{ $project->name }}.</p>
                            <p>To learn more about the volunteer, have a look at IOF’s Connecting Worldwide volunteer platform.</p>
                            <p>In order to get in contact with the interested volunteer, you can simply reply to this e-mail.</p>
                            <p>Kind Regards, <br />
                                iof volunteers</p>
                        </div>
                    </div>
                </div>
            @else
                <div id="mail-wrapper" class="d-flex flex-row mt-4">
                    <x-form.section>
                        <x-slot name="title">
                            Offer your help for this project
                        </x-slot>

                        <div>
                            In order to contact a Project owner, you need to <a href="{{ route('volunteer.register') }}">create a Volunteer</a> first.
                        </div>
                    </x-form.section>
                </div>
            @endif
        </div>
    </section>

@endsection