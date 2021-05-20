@extends('layouts.app')
@section('content')
<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65"> Volunteer Details</h1>
        </div>

        <table class="table">
            <tbody>
                <tr>
                    <td class="big-desc">
                        Volunteer
                    </td>
                    <td class="big-desc">
                        Languages spoken
                    </td>
                    <td class="big-desc">
                        Work Preferences
                    </td>
                    <td class="big-desc">
                        Disciplines of experience
                    </td>
                    <td class="big-desc">
                        O-Experience
                    </td>
                    <td class="big-desc">
                        O-Skills
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Nickname:</b> {{ $volunteer->nickname }}
                        <br>
                        <br>
                        <b>Country:</b> {{ $volunteer->country->name }}
                        <br>
                        <br>
                        <b>Age:</b> {{ $volunteer->age }}
                        <br>
                        <br>
                        <b>International driving license:</b> {{ $volunteer->driving_licence ? 'Yes' : 'No' }}
                        @if(true)
                            <br>
                            Contacts: {{ $volunteer->email }}, {{ $volunteer->phone }}
                        @endif
                    </td>

                    <td>
                        languages
                    </td>

                    <td>
                        continents
                    </td>

                    <td>
                        skills
                    </td>

                    <td>
                        expirence
                    </td>

                    <td>
                        skills again?

                        <br>
                        <b>How can this Volunteer help you? </b>
                        <br>{{ $volunteer->help }}

                        <br>
                        <b>Expectations as a Volunteer </b>
                        <br>{{ $volunteer->expectations }}

                    </td>
                </tr>
            </tbody>
        </table>


        @if(true)
            <div class="mt-3">
                <form class="d-flex flex-column align-items-start"  method="POST" action="/volunteer/contact" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $volunteer->id }}">
                    <p>Invite volunteer to project:</p>
                    <div class="selectWrap">
                        <select size="1" name="project">
                            Projects
                        </select>
                    </div>
                <input class="mt-3" type="submit" value="Contact volunteer"/>
                </form>
            </div>
        @endif
    </div>
</section>

@endsection
