@extends('layouts.app')
@section('content')
    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65"
                                            height="65"> Volunteer Details</h1>
            </div>

            <input type="button" class="mb-3" onclick="window.history.go(-1); return false;" value="Back to project list"/>

            <table class="table">
                <tbody>
                </tbody>
            </table>
        </div>
    </section>

@endsection
