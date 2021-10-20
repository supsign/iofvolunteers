@extends('layouts.app')
@section('content')

    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title">
                    <img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65" alt="Search List">
                    Host Search Result </h1>
            </div>


            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to search"/>

            <table aria-describedby="List all Hosts from the search form" class="table">
                <tbody>
                <tr>
                    <th id="search_host_name" class="big-desc">Name</th>
                    <th id="search_host_country" class="big-desc">Country</th>
                    <th id="search_host_description" class="big-desc">Host-Description</th>
                </tr>
                @foreach($hosts AS $host)
                    <tr>
                        <td>
                            @if(false)
                                {{ $host->name ?? '' }}
                            @else
                                <a href="{{ route('volunteer.show', $host ) }}">
                                    {{ $host->name ?? '' }}
                                </a>
                            @endif
                        </td>
                        <td class="desc">{{ $host->country->name }}</td>
                        <td class="desc">{{ $host->host_desc }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
