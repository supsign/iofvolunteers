@extends('layouts.app')
@section('content')

    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title">
                    <img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65">
                    List Projects </h1>
            </div>

            <table class="table">
                <tbody>
                    <tr>
                        <td class="big-desc">Name & Age</td>
                        <td class="big-desc">Country</td>
                        <td class="big-desc">OL-Work-Experience (in years)</td>
                    </tr>
                @foreach($projects AS $project)
                <tr>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
