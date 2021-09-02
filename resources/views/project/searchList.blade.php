@extends('layouts.app')
@section('content')

    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title">
                    <img class="title-icon" src="{{ asset('images/icon-search3.svg') }}" width="65" height="65">
                    Project Search Result </h1>
            </div>


            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to search"/>

            <table aria-describedby="List all projects from the search form" class="table">
                <tbody>
                    <tr>
                        <th id="search_project_name" class="big-desc">Project Name</td>
                        <th id="search_org_name" class="big-desc">Organisation Name</td>
                        <th id="search_project_contact" class="big-desc">Project Contact</td>
                    </tr>
                    @foreach ($projects as $project)
                        <tr>
                            <td class="desc">
                                @if(false)
                                    {{ $project->name ?? '' }}
                                @else
                                    <a href="{{ route('project.show', $project ) }}">
                                        {{ $project->name }}
                                    </a>
                                @endif
                            </td>
                            <td class="desc">{{ $project->organisation_name }}</td>
                            <td class="desc">{{ $project->contact }}</td>
                            <td class="desc">
                            </td>
                        </tr>
                    @endforeach                  
                </tbody>
            </table>
        </div>
    </section>

@endsection
