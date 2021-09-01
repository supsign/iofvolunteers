@extends('layouts.app')
@section('content')

    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title">
                    <img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65" alt="show">
                    List Projects
                </h1>
                <div class="title-desc">Click on the Project Name for more details.</div>
            </div>
            <input type="button" class="mb-3" onclick="location.href='{{ route('project.register') }}';" value="Add project" />

            <table aria-describedby="List all my created Projects" class="table">
                <tbody>
                    <tr>
                        <th id="project_name" class="big-desc">Project Name</td>
                        <th id="org_name" class="big-desc">Organisation Name</td>
                        <th id="project_contact" class="big-desc">Project Contact</td>
                        <th id="edit_delete_buttons" class="big-desc"></td>
                    </tr>
                    @foreach ($projects as $project)
                        <tr>
                            <td class="desc">
                                <a href="{{ route('project.show', $project ) }}">
                                    {{ $project->name }}
                                </a>
                            </td>
                            <td class="desc">{{ $project->organisation_name }}</td>
                            <td class="desc">{{ $project->contact }}</td>
                            <td class="desc">
                                {{-- Edit-Delete Buttons für später (wenn benötigt)
                                <input type="button" onclick="location.href='{{ route('project.edit', $project ) }}';" value="Edit"/>
                                <input type="button" onclick="location.href='{{ route('project.delete', $project ) }}';" value="Delete"/> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
