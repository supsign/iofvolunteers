@extends('layouts.app')
@section('content')

<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title">
                <img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65">
                Search Volunteers </h1>
        </div>


        <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to search" />

        <table class="table">
            <tbody>
                <tr>
                    <td class="big-desc">Name</td>
                    <td class="big-desc">Duration available</td>
                    <td class="big-desc"></td>
                </tr>
                @foreach($volunteers AS $volunteer)
                    <tr>
                        <td>
                            @if(false)
                                {{ $volunteer->name ?? '' }}
                            @else
                                <a href="{{ route('volunteer.show', $volunteer ) }}">
                                    {{ $volunteer->name ?? '' }}
                                </a>
                            @endif
                        </td>
                        <td class="desc">{{ $volunteer->work_duration }} weeks</td>
                        <td class="desc">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($user->projects()->count())
            <div class="mt-3">
                <form class="d-flex flex-column align-items-start" method="POST" action="volunteer/contactall" enctype="multipart/form-data">
                    <input type="hidden" name="list" value="">
                    <p>Invite all volunteers to project:</p>
                    <div class="selectWrap">
                        <select size="1" name="project">
                            -Project-
                        </select>
                    </div>
                    <input class="mt-3" type="submit" value="Contact volunteers" />
                </form>
            </div>
        @endif
    </div>
</section>

@endsection
