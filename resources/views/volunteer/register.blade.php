@extends('layouts.app')
@section('content')
<section class="default">

    <div class="container">
        <div class="titleWrap">
            <h1 class="title"><img class="title-icon" src="{{ asset('images/icon-add.svg') }}" width="65" height="65"> Volunteer Registration Form</h1>

            <div class="title-desc">Please note that you must be 18+ to register as a volunteer!</div>
        </div>

        {{-- @dump($errors)
        @dump(session()->getOldInput()) --}}
        

        <form method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="">
            {{-- <input type="hidden" name="MAX_FILE_SIZE" value="{{ MAX_FILE_SIZE }}" /> --}}

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            1. Contact Information
                        </h3>

                        <div class="form-group">
                            <input id="field_name" placeholder=" " type="text" name="name" value="{{ old('name') }}" size="15" required>
                            <label class="formGroupLabel" for="field_name">Name *</label>
                            <div class="mt-3">
                                @foreach ($errors->get('name') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>
                        </div>

                        <x-person.countries-form />

                        <div class="form-group">
                            <input id="field_email" placeholder=" " type="email" name="email" value="{{ old('email') }}" size="15" required>
                            <label class="formGroupLabel" for="field_email">E-mail *</label>
                            <div class="mt-3">
                                @foreach ($errors->get('email') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>
                        </div>

                        {{--
                        <div class="form-group">
                            <input id="field_phone" placeholder=" " type="text" name="phone" value="" size="15">
                            <label class="formGroupLabel" for="field_phone">Phone </label>
                            <div class="warn">(optional)</div>
                        </div>
                        --}}
                    </div>

                    <div class="formSection">
                        <h3 class="formSectionTitle">
                            2. Personal Information
                        </h3>

                        <x-person.genders-form />

                        <div class="form-group">
                            <input id="field_birthdate" placeholder=" " type="text" name="birthdate" size="15" value="{{ old('birthdate') }}" class="datepicker-here" data-language='en' data-date-format="yyyy-mm-dd" required>
                            <label class="formGroupLabel" for="field_birthdate">Date of birth (yyyy-mm-dd) *</label>
                            <img for="field_birthdate" class="selectArr v2" src="{{ asset('images/calendarIcon.svg') }}" alt="" />
                            <div class="mt-3">
                                @foreach ($errors->get('birthdate') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="form-group">
                            <input id="field_nickname" placeholder=" " type="text" name="nickname" value="{{ old('nickname') }}" size="15" value="">
                            <label class="formGroupLabel" for="field_nickname">Nickname </label>
                            <div class="warn">optional</div>
                            <div class="warn">if left blank, your name will be assumed as your nickname</div>
                            <div class="mt-3">
                                @foreach ($errors->get('nickname') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <select size="1" name="driving_licence" id="license" required>
                                @if(!old('driving_licence'))
                                    <option disabled selected="" value="">International driving license? *</option>
                                @endif
                                <option value="1" @if(old('driving_licence') == "1") selected @endif>Yes</option>
                                <option value="0" @if(old('driving_licence') == "0") selected @endif>No</option>
                            </select>
                            <img for="license" class="selectArr" src="{{ asset('images/selectArr.svg') }}" alt="" />
                            <div class="mt-3">
                                @foreach ($errors->get('driving_licence') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <x-orienteering.disciplines-form>
                        <x-slot name="title">
                            3. Disciplines of experience
                        </x-slot>
                    </x-orienteering.disciplines-form>

                    <x-orienteering.competitor-experience-form>
                        <x-slot name="title">
                            4. O-Experience
                        </x-slot>
                    </x-orienteering.competitor-experience-form>

                    <x-language.experience-form>
                        <x-slot name="title">
                            5. Languages
                        </x-slot>
                        <x-slot name="subtitle">
                            (required, even if only listed in "other")
                        </x-slot>
                    </x-language.experience-form>

                    <x-person.continents-form>
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
                            <div class="font-italic">
                                For how long can you work?
                                <div class="warn">(leave blank if you can stay more than 6 weeks)</div>
                            </div>
                        </h3>

                        <div class="form-group">
                            <input placeholder="" type="number" size="3" name="work_duration" value="{{ old('work_duration') }}" id="work_duration" value="">
                            <label class="formGroupLabel" for="work_duration">weeks</label>
                            <div class="mt-3">
                                @foreach ($errors->get('work_duration') as $message)
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <x-orienteering.skills-form />

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
                                {{-- @dump(old('o_work_expirence')[$dutyType->id])
                                @dump($dutyType->id) --}}
                            </div>

                            <div class="form-group">
                                <label class="formGroupLabelStatic">Duties:</label>
                                @foreach($duties AS $duty)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="duty[{{ $dutyType->id }}][{{ $duty->id }}]" id="{{ $dutyType->snakeCaseName.'_'.$duty->snakeCaseName }}"
                                            @if(!empty(old('duty')[$dutyType->id][$duty->id]))
                                                @if((old('duty')[$dutyType->id][$duty->id]) == "1") 
                                                    checked="checked" 
                                                @endif
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
                            {{--
                            <label class="formGroupLabelStatic">Skilled in mapping? Upload your "best" maps here...</label>
                            <div class="warn">Required for mappers!
                                <br>(At most 3 maps in PDF format, max file size is 2 Mb)

@if(isset($maps) && $maps)
                                    <p>Already loaded maps:
@foreach($maps AS $key => $map)
                                            <a href="" target="_blank">Map {{ ++$key }}</a>
                            @endforeach
                            <br /><span class="warn">New maps will erase previously loaded</span>
                            </p>
                            @endif
                        </div>

                        <div class="mt-3 custom-file">
                            <input type="file" class="custom-file-input" id="mapsFile1" name="maps[]" accept=".pdf">
                            <label class="custom-file-label" for="mapsFile1">Choose file</label>
                        </div>

                        <div class="mt-3 custom-file">
                            <input type="file" class="custom-file-input" id="mapsFile2" name="maps[]" accept=".pdf">
                            <label class="custom-file-label" for="mapsFile2">Choose file</label>
                        </div>

                        <div class="mt-3 custom-file">
                            <input type="file" class="custom-file-input" id="mapsFile3" name="maps[]" accept=".pdf">
                            <label class="custom-file-label" for="mapsFile3">Choose file</label>
                        </div>
                        --}}
                    </div>

                    <div class="form-group">
                        <textarea placeholder="" rows="4" cols="30" name="help" id="help" required>{{ old('help') }}</textarea>
                        <label class="formGroupLabel" for="help">Explain how you can help as a volunteer *</label>
                    </div>

                    <div class="form-group">
                        <textarea placeholder="" rows="4" cols="30" name="expectation" id="expectation">{{ old('expectation') }}</textarea>
                        <label class="formGroupLabel" for="expectation">Expectations as a volunteer</label>
                    </div>

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
