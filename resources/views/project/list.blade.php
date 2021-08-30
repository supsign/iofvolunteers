@extends('layouts.app')
@section('content')

    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title">
                    <img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65">
                    List Projects 
                </h1>
                <div class="title-desc">Click on Project Name for more details.</div>
            </div>

            @if(false)
                <input type="button" class="mb-3" onclick="location.href='{{ route('project.register') }}';" value="Add project" />
            @endif

            <table class="table">
                <tbody>
                    <tr>
                        <td class="big-desc">Project Name</td>
                        <td class="big-desc">Organisation Name</td>
                        <td class="big-desc">Organisation Contact</td>
                        <td class="big-desc"></td>
                    </tr>
                    <tr>
                        @foreach ($projects as $project)
                            <td class="desc">
                                {{ $project->name }}
                            </td>
                            <td class="desc">{{ $project->organisation_name }}</td>
                            <td class="desc">{{ $project->organisation_contact }}</td>
                            <td class="desc"><input type="button" onclick="location.href='project/edit/{{ $project->id }}';" value="Edit"/>
                                <input type="button" onclick="location.href='project/delete/{{ $project->id }}';" value="Delete"/>
                            </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

@endsection
