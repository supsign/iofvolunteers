@extends('layouts.app')
@section('content')

    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title">
                    <img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65">
                    Search Volunteers </h1>
            </div>


            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to search"/>

            <table class="table">
                <tbody>
                    <tr>
                        <th id="project_name" class="big-desc">Project Name</td>
                        <th id="org_name" class="big-desc">Organisation Name</td>
                        <th id="project_contact" class="big-desc">Project Contact</td>
                        <th id="edit_delete_buttons" class="big-desc"></td>
                    </tr>
                    @foreach($projects AS $project)
                        <tr>
                            <td>
                                @if(false)
                                    {{ $project->name ?? '' }}
                                @else
                                    <a href="{{ route('project.show', $project ) }}">
                                        {{ $project->name }}
                                    </a>
                                @endif
                            </td>
                            <td class="desc">{{ $project->country->name }}</td>
                            <td class="desc">
                                <ul>
                                    <li>
                                        @foreach($dutyTypes AS $dutyType)
                                            <strong>{{ $dutyType->name . ':'}}</strong>
                                            @if($dutyType->id === 1 ? $project->o_work_experience_local : $project->o_work_experience_international)
                                                {{ $dutyType->id === 1 ? $project->o_work_experience_local : $project->o_work_experience_international }}
                                                <br/>
                                            @else
                                                No Experience<br/>
                                            @endif
                                            @foreach($project->duties()->where('duty_type_id', $dutyType->id)->get() AS $duty)
                                                {{ $duty->name }} <br/>
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
        </div>
    </section>

@endsection
