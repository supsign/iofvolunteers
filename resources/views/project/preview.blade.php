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
                            <td><a href="{{ $project->organisation_webpage }}" target="_blank">{{ $project->organisation_webpage }}</a></td>
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

                    @if($project->organisation_email)
                        <tr>
                            <th id="organisation_email" class="font-weight-bold">E-Mail:</th>
                            <td><a href="mailto:{{ $project->organisation_email }}">{{ $project->organisation_email }}</a></td>
                        </tr>
                    @endif

                    @if($project->organisation_phone)
                        <tr>
                            <th id="organisation_phone" class="font-weight-bold">Phone</th>
                            <td>{{ $project->organisation_phone }}</td>
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
        </div>
    </section>

@endsection