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
                        <b>International driving license:</b> {{ $volunteer->driving_licence }}
                        @if(true)
                            <br>
                            Contacts: {{ $volunteer->email }}, {{ $volunteer->phone }}
                        endif
                    </td>

                    <td>
                        {{ $volunteer->languages }}
                    </td>

                    <td>
                        Preferred destinations: {{ $volunteer->preferredContinents }}
                    </td>

                    <td>
                        {% if $volunteer->footO %} Foot-O<br> {% endif %}
                        {% if $volunteer->mtbO %} MTBO<br> {% endif %}
                        {% if $volunteer->skiO %} Ski-O<br> {% endif %}
                        {% if $volunteer->trailO %} Trail-O<br> {% endif %}
                    </td>

                    <td>
                        {{ $volunteer->competitorExp }}
                    </td>

                    <td>
                        {{ $volunteer->skills|raw }}
                        <br>
                        <b>How can this Volunteer help you? </b>
                        <br>{{ $volunteer->helpDesc }}

                        <br>
                        <b>Expectations as a Volunteer </b>
                        <br>{{ $volunteer->expectations }}

                    </td>
                </tr>
            </tbody>
        </table>


        {% if not visit %}
            <div class="mt-3">
                <form class="d-flex flex-column align-items-start"  method="POST" action="{{ url }}volunteer/contact" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $volunteer->id }}">
                    <p>Invite volunteer to project:</p>
                    <div class="selectWrap">
                        <select size="1" name="project">
                            {{ projects|raw }}
                        </select>
                    </div>
                <input class="mt-3" type="submit" value="Contact volunteer"/>
                </form>
            </div>
        {% endif %}
    </div>
</section>

@endsection
