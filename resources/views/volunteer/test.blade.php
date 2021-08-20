@extends('layouts.app')
@section('content')
<section class="default">

    <div class="container">
        <div class="titleWrap">
            <h1 class="title"><img class="title-icon" src="{{ asset('images/icon-add.svg') }}" width="65" height="65"> Volunteer Registration Form</h1>

            <div class="title-desc">Please note that you must be 18+ to register as a volunteer!</div>
        </div>        

        <form method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="">

            <div class="row">
                <div class="col-12 col-md-6">
                    
                    <x-form.section>
                        <x-slot name="title">
                            1. Contact Information
                        </x-slot>
                        <x-slot name="body">
                            <x-base.input name="name" value="{{ old('name')}}" label="Name *" />
                            {{-- <x-form.country /> --}}
                            <x-form.input name="email" value="{{ old('email')}}" label="E-mail *" type="email" />
                        </x-slot>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            2. Personal Information
                        </x-slot>
                        <x-slot name="body">
                            Stuff here
                        </x-slot>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            3. Disciplines of experience
                        </x-slot>
                        <x-slot name="body">
                            Stuff here
                        </x-slot>
                    </x-form.section>

                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="sticky">
                    <div class="noteWrap">
                        <h3 class="noteTitle">Disclaimer</h3>
                        <p>I have filled in my details
                            above as accurately as possible. By submitting this form, I state that I am a volunteer in
                            developing orienteering. I understand that the IOF cannot be held responsible for my being or not
                            being recruited as a volunteer. I also understand that should I choose to accept any offer
                            requesting my assistance, the IOF cannot be held responsible for the terms under which I will work
                            as a volunteer.</p>
                    </div>

                    <div class="formSection">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="agb" id="agb" required>
                                <label class="form-check-label" for="agb">
                                    I have read and understood the above.
                                </label>
                                <div class="warn"> Mandatory: Please accept the disclaimer.</div>
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <input class="ml-auto" type="submit" value="Submit my details">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
</section>
@endsection