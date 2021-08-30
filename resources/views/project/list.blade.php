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
                        <td class="big-desc">Project Name</td>
                    </tr>
                <tr>
                    @foreach ($projects as $project)
                        <td>{{ $project->name }}</td>
                        <td>Edit/Delete?</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
    </section>

@endsection
