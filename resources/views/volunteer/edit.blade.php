@extends('layouts.app')
@section('content')
<section class="default">
    <div class="container">
        <div class="titleWrap">
            <h1 class="title pb-0"><img class="title-icon" src="{{ asset('images/icon-search1.svg') }}" width="65" height="65"> Edit Volunteer</h1>
        </div>

        <form method="POST" enctype="multipart/form-data" action="{{ route('volunteer.update', $volunteer->id) }}">
            @csrf
            @method("PATCH")

            @dump($errors)

            <div class="row">
                <div class="col-12">
                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            1. Contact Information
                        </h3>

                        <div class="form-group">
                            <input id="field_name" placeholder=" " type="text" name="name" value="{{ old('name') ?? $volunteer?->name }}" size="15" required>
                            <label class="formGroupLabel" for="field_name">Name *</label>
                            <div class="mt-3">
                                @foreach ($errors->get('name') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>
                        </div>

                        <x-person.countries-form :volunteer=$volunteer/>

                        <div class="form-group">
                            <input id="field_email" placeholder=" " type="email" name="email" value="{{ old('email') ?? $volunteer?->email }}" size="15">
                            <label class="formGroupLabel" for="field_email">E-mail *</label>
                            <div class="mt-3">
                                @foreach ($errors->get('email') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            2. Personal Information
                        </h3>

                        <x-person.genders-form :volunteer=$volunteer/>

                        <div class="form-group">
                            <input id="field_birthdate" placeholder=" " type="text" name="birthdate" size="15" value="{{ old('birthdate') ?? $volunteer?->birthdate }}" class="datepicker-here" data-language='en' data-date-format="yyyy-mm-dd" required>
                            <label class="formGroupLabel" for="field_birthdate">Date of birth (yyyy-mm-dd) *</label>
                            <img for="field_birthdate" class="selectArr v2" src="{{ asset('images/calendarIcon.svg') }}" alt="" />
                            <div class="mt-3">
                                @foreach ($errors->get('birthdate') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>

                        </div>
                        
                        <div class="form-group">
                            <input id="field_nickname" placeholder=" " type="text" name="nickname" value="{{ old('nickname') ?? $volunteer?->nickname }}" size="15" value="">
                            <label class="formGroupLabel" for="field_nickname">Nickname </label>
                            <div class="mt-3">
                                @foreach ($errors->get('nickname') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="warn">International driving license</div>
                            <select size="1" name="driving_licence" id="license" required>
                                @if(!old('driving_licence'))
                                    <option disabled selected="" value="">International driving license? *</option>
                                @endif
                                <option value="1" @if(!empty(old('driving_licence')) == "1" || $volunteer?->driving_licence =="1") selected @endif>Yes</option>
                                <option value="0" @if(!empty(old('driving_licence')) == "1" || $volunteer?->driving_licence =="0") selected @endif>No</option>
                            </select>
                            <img for="license" class="selectArr selectArrComponents" src="{{ asset('images/selectArr.svg') }}" alt="" />
                            <div class="mt-3">
                                @foreach ($errors->get('driving_licence') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <x-orienteering.disciplines-form :volunteer=$volunteer>
                        <x-slot name="title">
                            3. Disciplines of experience
                        </x-slot>
                    </x-orienteering.disciplines-form>

                    <x-orienteering.competitor-experience-form :item=$volunteer>
                        <x-slot name="title">
                            4. O-Experience
                        </x-slot>
                    </x-orienteering.competitor-experience-form>

                    <x-language.experience-form :volunteer=$volunteer>
                        <x-slot name="title">
                            5. Languages
                        </x-slot>
                        <x-slot name="subtitle">
                            (required, even if only listed in "other")
                        </x-slot>
                    </x-language.experience-form>

                    <x-person.continents-form :volunteer=$volunteer>
                        <x-slot name="title">
                            6. Where to work?
                        </x-slot>
                        <x-slot name="subtitle">
                            Do you have a preferred destination?
                            <div class="warn">If not, just tick "Anywhere"</div>
                        </x-slot>

                    </x-person.continents-form>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            7. Timing
                            <div class="formSubtitle2">
                                For how long can you work?
                                <div class="warn">(leave blank if you can stay more than 6 weeks)</div>
                            </div>
                        </h3>

                        <div class="form-group">
                            <input placeholder="" type="number" size="3" name="work_duration" value="{{ old('work_duration') ?? $volunteer?->work_duration }}" id="work_duration" value="">
                            <label class="formGroupLabel" for="work_duration">weeks</label>
                            <div class="mt-3">
                                @foreach ($errors->get('work_duration') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <x-orienteering.skills-form :volunteer=$volunteer/>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            9. O-Work Experience
                        </h3>

                        @foreach($dutyTypes AS $dutyType)
                            <div class="form-group">
                                <select size="1" name="o_work_expirence[{{ $dutyType->id }}]" id="duty[{{ $dutyType->id }}]">
                                    <option disabled selected="" value="">{{ $dutyType->name }}</option>
                                    <option value="none">none</option>
                                    <option value="1 - 10">1 - 10</option>
                                    <option value="11 - 30">11 - 30</option>
                                    <option value="over 30">over 30</option>
                                </select>
                                <img for="" class="selectArr" src="{{ asset('images/selectArr.svg') }}" alt="" />
                            </div>

                            <div class="form-group">
                                <label class="formSubtitle2">Duties:</label>
                                @foreach($duties AS $duty)
                                    @php
                                        if(isset($volunteer)) {
                                            $oldDuties= !empty(old('duty')[$dutyType->id]) ? old('duty')[$dutyType->id] : $volunteer->duties->contains($duty);
                                        }
                                        else {
                                            $oldDuties= !empty(old('duty')[$dutyType->id]) ? old('duty')[$dutyType->id] : null;
                                        }
                                    @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="duty[{{ $dutyType->id }}][{{ $duty->id }}]" id="{{ $dutyType->snakeCaseName.'_'.$duty->snakeCaseName }}"
                                                @if($oldDuties) 
                                                    checked="checked" 
                                                @endif
                                        >
                                        <label class="form-check-label" for="{{ $dutyType->snakeCaseName.'_'.$duty->snakeCaseName }}">
                                            {{ $duty->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            10. Additional Information
                        </h3>

                        <div class="form-group">                    
                    </div>

                    <div class="form-group">
                        <textarea placeholder="" rows="4" cols="30" name="help" id="help" required>{{ old('help') ?: $volunteer->help }}</textarea>
                        <label class="formGroupLabel" for="help">Explain how you can help as a volunteer *</label>
                    </div>

                    <div class="form-group">
                        <textarea placeholder="" rows="4" cols="30" name="expectation" id="expectation">{{ old('expectation') ?: $volunteer->expectation }}</textarea>
                        <label class="formGroupLabel" for="expectation">Expectations as a volunteer</label>
                    </div>
                    <input class="ml-auto" type="submit" value="Save changes">
                </div>
            </div>
        </form>

    </div>
</section>

@endsection
