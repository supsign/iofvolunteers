@extends('layouts.app')
@section('content')

<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title">
                <img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65">
                My Volunteers
            </h1>

            <div class="title-desc">Click on Volunteer Nickname for more details</div>
        </div>


        @if(true)
            <input type="button" class="mb-3" onclick="location.href='{{ route('volunteer.register') }}';" value="Add volunteer" />
        @endif

        <table class="table">
            <tbody>
                <tr>
                    <td class="big-desc">Nickname</td>
                    <td class="big-desc">Name</td>
                    <td class="big-desc">Duration available</td>
                    <td class="big-desc"></td>
                </tr>
                <tr>
                    <td>
                        @if(true)
                            {{ $user->volunteer->nickname ?? '' }}
                        @else
                            <a href="{{ url }}volunteer/preview/{{ $user->volunteer->id }}">
                                {{ $user->volunteer->nickname ?? '' }}
                            </a>
                        @endif
                        @if(false)
                            <span class="warn"> (disabled)</span>
                        @endif
                    </td>
                    <td class="desc"> {{ $user->volunteer->name }}</td>
                    <td class="desc">{{ $user->volunteer->work_duration }} weeks</td>
                    <td class="desc">
                        *An dieser Stelle folgen nach Diskussion die Buttons für Edit und Delete*
                        @if(false)
                            <input type="button" onclick="location.href='volunteer/edit/{{ $user->volunteer->id }}';" value="Edit" />
                            <input type="button" onclick="location.href='volunteer/switch/{{ $user->volunteer->id }}';" value="{{ $user->volunteer->active ? 'Disable' : 'Enable' }}" />
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</section>

@endsection
