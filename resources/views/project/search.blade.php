@extends('layouts.app')
@section('content')

    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title"><img class="title-icon" src="{{asset('images/icon-search3.svg')}}" width="65"
                                       height="65"> Project Search Form</h1>
            </div>

            <form method="POST" action="/project/search" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12 col-md-6">

                        <x-form.section>
                            <x-slot name="title">
                                1. Details of the Organisation
                            </x-slot>
                            <x-slot name="subtitle">
                                Pick your preferred destinations
                            </x-slot>
                            <div class="form-group">
                                <x-base.checkbox label="Anywhere" name="continentsCheckboxesTrigger" type="checkbox"
                                                 class="form-check-input  continentsCheckboxes"/>
                                @foreach($continents AS $continent)
                                    <x-base.checkbox label="{{ $continent->name }}"
                                                     name="continent[{{ $continent->id }}]" type="checkbox"
                                                     class="form-check-input continentsCheckboxes"/>
                                @endforeach
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                2. Details of the Project
                            </x-slot>
                            <x-slot name="subtitle">
                                Pick your preferred offers
                            </x-slot>
                            <div class="form-group">
                                @foreach($offers AS $offer)
                                    <x-base.checkbox label="{{ $offer->name }}" name="offer[{{ $offer->id }}]"
                                                     class="form-check-input"/>
                                @endforeach
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                3. Discipline of Project
                            </x-slot>
                            <div class="form-group">
                                @foreach($disciplines AS $discipline)
                                    <x-base.checkbox name="discipline[{{ $discipline->id }}]"
                                                     label="{{ $discipline->name }}" class="form-check-input"/>
                                @endforeach
                            </div>
                        </x-form.section>
                        <x-form.section>
                            <x-slot name="title">
                                4. Skills required
                            </x-slot>
                            <div class="form-group">
                                @foreach($skillTypes AS $skillType)
                                    <x-base.checkbox label="{{ $skillType->name }}" name="skillType[{{ $skillType->id }}]"
                                                     class="form-check-input"/>
                                @endforeach
                            </div>
                        </x-form.section>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="sticky">
                            <div class="noteWrap">
                                <h3 class="noteTitle">Note</h3>
                                <p>
                                    Please fill in your search criteria. Leave blank if not relevant / important!
                                </p>
                            </div>
                            <div class="formSection">
                                <div class="form-group d-flex">
                                    <input class="ml-auto" type="submit" value="Find projects">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
