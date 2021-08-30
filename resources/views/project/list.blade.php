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
                        <td class="big-desc">Project Contact</td>
                        <td class="big-desc"></td>
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
                                    <input type="button" onclick="location.href='{{ route('project.edit', $project ) }}'" value="Edit"/>
                                    <input type="button" onclick="location.href='{{ route('project.delete', $project ) }}" value="Delete"/>
                                </td>
                            </tr>
                        @endforeach                
                </tbody>
            </table>
        </div>
    </section>

@endsection
