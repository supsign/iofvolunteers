@extends('layouts.app')
@section('content')

    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title">
                    <img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65">
                    Host Search Result </h1>
            </div>


            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to search"/>

            <table class="table">
                <tbody>
                <tr>
                    <td class="big-desc">Name</td>
                    <td class="big-desc">Country</td>
                    <td class="big-desc">Host-Description</td>
                </tr>
                @foreach($hosts AS $host)
                    <tr>
                        <td>
                            @if(false)
                                {{ $host->name ?? '' }}
                            @else
                                <a href="{{ route('host.show', $host ) }}">
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
