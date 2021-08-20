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
                        <x-base.input name="name" value="{{ old('name') }}" label="Name *" required />
                        <x-base.select name="country_id" label="Country" :iconName="'selectArr'"/>
                        <x-base.input name="email" value="{{ old('email') }}" label="E-mail *" type="email" required />
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            2. Personal Information
                        </x-slot>   
                        <x-base.select name="gender_id" label="Gender" :iconName="'selectArr'"/>               
                        <x-base.input name="birthdate" value="{{ old('birthdate') }}" label="Date of birth (yyyy-mm-dd) *" type="text" required class="datepicker-here" data-language='en' data-date-format="yyyy-mm-dd" :iconName="'calendarIcon'" />
                        <x-base.input name="nickname" value="{{ old('nickname') }}" label="Nickname">
                            <x-slot name="subtitle">
                                <div class="font-weight-normal">optional</div>
                                <div class="font-weight-normal">if left blank, your name will be assumed as your nickname</div>
                            </x-slot>
                        </x-base.input>
                        <x-base.select name="driving_licence" label="International driving license? *" :iconName="'selectArr'"/>
                        
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            3. Disciplines of experience
                        </x-slot>
                        <x-base.checkbox name="disciplines" type="checkbox" class="form-check-input" value="1"/>               
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            4. O-Experience
                        </x-slot>
                        <x-base.select name="o_experience[local]" label="Local events" :iconName="'selectArr'"/>
                        <x-base.select name="o_experience[national]" label="National Championships" :iconName="'selectArr'"/>
                        <x-base.select name="o_experience[international]" label=">International Competitions" :iconName="'selectArr'"/>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            5. Languages
                        </x-slot>
                        <x-slot name="subtitle">
                            <div class="warn">(required, even if only listed in "other")</div>
                        </x-slot>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            6. Where to work?
                        </x-slot>
                        <x-slot name="subtitle">
                            Do you have a preferred destination?
                            <div class="warn">If not, just tick "Anywhere"</div>
                        </x-slot>
                        <x-base.checkbox name="continents" type="checkbox" class="form-check-input" value="1"/>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            7. Timing
                        </x-slot>
                        <x-slot name="subtitle">
                            For how long can you work?
                            <div class="warn">(leave blank if you can stay more than 6 weeks)</div>
                        </x-slot>
                        
                        <x-base.input name="work_duration" value="{{ old('work_duration') }}" label="weeks" type="number" size="3" />
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            8. Skills
                        </x-slot>
                        <x-slot name="subtitle">
                            <div class="warn"> (Please tick all relevant to you. Details are required if skill is ticked)</div>
                        </x-slot>
                        
                        
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            9. O-Work Experience
                        </x-slot>
                    </x-form.section>

                    <x-form.section>
                        <x-slot name="title">
                            10. Additional Information
                        </x-slot>
                    </x-form.section>

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
