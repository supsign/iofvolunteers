@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65"
                                            height="65" alt="search icon"> Project Details</h1>
            </div>
            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to project list"/>
            <input type="button" class="ml-auto float-md-right" onclick="location.href='{{ route('project.edit', $project ) }}';" value="Edit Project">

            <table aria-describedby="Details of a Project" class="table">
                <tbody>
                    <tr>
                        <th id="project_project_name" class="font-weight-bold">Name:</th>
                        <td>{{ $project->name }}</td>
                    </tr>
                    <tr>
                        <th id="organisation_name" class="font-weight-bold">Organisation:</th>
                        <td>{{ $project->organisation_name }}</td>
                    </tr>
                    <tr>
                        <th id="projectStatus" class="font-weight-bold">Status:</th>
                        <td>{{ $project->projectStatus->name }}</td>
                    </tr>

                    @if($project->organisation_webpage)
                        <tr>
                            <th id="organisation_webpage" class="font-weight-bold">Web page:</th>
                            <td>{{ $project->organisation_webpage }}</td>
                        </tr>
                    @endif

                    <tr>
                        <th id="project_continent" class="font-weight-bold">Region:</th>
                        <td>
                            {{ $project->continent->name }}
                        </td>
                    </tr>
                    <tr>
                        <th id="organisation_contact" class="font-weight-bold">Organisation contact person:</th>
                        <td>{{ $project->organisation_contact }}</td>
                    </tr>
                    <tr>
                        <th id="organisation_contact_position" class="font-weight-bold">Position in the Organisation:</th>
                        <td>{{ $project->organisation_contact_position }}</td>
                    </tr>
                    <tr>
                        <th id="project_country" class="font-weight-bold">Country:</th>
                        <td>{{ $project->country->name }}</td>
                    </tr>
                    <tr>
                        <th id="organisation_email" class="font-weight-bold">E-Mail:</th>
                        <td>{{ $project->organisation_email }}</td>
                    </tr>
                    <tr>
                        <th id="organisation_phone" class="font-weight-bold">Phone</th>
                        <td>{{ $project->organisation_phone }}</td>
                    </tr>
                    <tr>
                        <th id="project_place" class="font-weight-bold">Work location:</th>
                        <td>{{ $project->place }}</td>
                    </tr>

                    @if($project->start_date)
                        <tr>
                            <th id="start_date" class="font-weight-bold">Start Date:</th>
                            <td>{{ date_format(new datetime($project->start_date), 'Y-m-d') }}</td>
                        </tr>
                    @endif

                    <tr>
                        <th id="project_contact" class="font-weight-bold">Project contact person:</th>
                        <td>{{ $project->contact }}</td>
                    </tr>
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

                    <tr>
                        <th id="exprience_details" class="font-weight-bold">Work details:</th>
                        <td>{{ $project->exprience_details }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </section>

@endsection