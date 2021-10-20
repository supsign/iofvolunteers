@extends('layouts.app')
@section('content')

    <section class="default">
        <div class="container">
            <div class="titleWrap">
                <h1 class="title"><img class="title-icon" src="{{asset('images/icon-search4.svg')}}" width="65"
                                       height="65" alt="Search a Host"> Host Search Form</h1>
            </div>

            <form method="POST" action="/host/search" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12 col-md-6">

                        <x-form.section>
                            <x-slot name="title">
                                1. Personal Information
                            </x-slot>
                            <div class="form-group">
                                <x-base.select name="country_id" label="Country" :iconName="'selectArr'" :options="$countries"/>
                            </div>
                            <div class="form-group">
                                <label class="formSubtitle2">Pick your preferred destinations</label>
                                <x-base.checkbox label="Anywhere" name="continentsCheckboxesTrigger" type="checkbox"
                                                 class="form-check-input continentsCheckboxes"/>
                                @foreach($continents AS $continent)
                                    <x-base.checkbox label="{{ $continent->name }}"
                                                     name="continent[{{ $continent->id }}]" type="checkbox"
                                                     class="form-check-input continentsCheckboxes"/>
                                @endforeach
                            </div>
                            <div class="mx-0 row">
                                <div class="pl-0 pr-0 mt-0 col-12 col-sm-6 pr-sm-2">
                                    <x-base.input name="minage" value="{{ old('maxDuration') }}" label='Hosting duration weeks (at least)'
                                                  type="number" min="1" />
                                </div>
                                <div class="pl-0 pr-0 mt-0 col-12 col-sm-6 pl-sm-2">
                                    <x-base.input name="maxage" value="{{ old('maxDuration') }}" label='Hosting duration weeks (at most)'
                                                  type="number" min="1" />
                                </div>
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                2. Details
                            </x-slot>

                            <div class="form-group">
                                <label class="formSubtitle2">Offers</label>
                                @foreach($offers AS $offer)
                                    <x-base.checkbox label="{{ $offer->name }}" name="offer[{{ $offer->id }}]"
                                                     class="form-check-input"/>
                                @endforeach
                            </div>
                        </x-form.section>

                        <x-form.section>
                            <x-slot name="title">
                                3. Languages available
                            </x-slot>
                                <x-slot name="subtitle">
                                    Tick only the most important one or two to increase search results
                                </x-slot>
                                @foreach($languages AS $language)
                                    <x-base.radio name="language[{{ $language->id }}]" label="{{ $language->name }}"
                                                  :options="$languageProficiency"
                                                  value="{{ old('language['.$language->id.']') ?? 4 }}"/>
                                @endforeach
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
                                    <input class="ml-auto" type="submit" value="Find host">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
