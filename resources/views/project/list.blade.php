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

            <table class="table">
                <tbody>
                    <tr>
                        <th class="big-desc">Project Name</td>
                        <th class="big-desc">Organisation Name</td>
                        <th class="big-desc">Project Contact</td>
                        <th class="big-desc"></td>
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
