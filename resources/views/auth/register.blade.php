@extends('layouts.app')

@section('content')
    <section class="default">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <x-form.section>
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-6">
                                            <x-base.input name="firstname" label="{{ __('Firstname') }}"
                                                        value="{{ old('firstname') }}" required
                                                        autocomplete="firstname" autofocus/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-center">
                                        <div class="col-md-6">
                                            <x-base.input name="lastname" label="{{ __('Lastname') }}"
                                                        value="{{ old('lastname') }}" required
                                                        autocomplete="lastname" autofocus/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-center">
                                        <div class="col-md-6">
                                            <x-base.input name="email"  type="email" label="{{__('E-Mail Address') }}"
                                                        value="{{ old('email') }}" required
                                                        autocomplete="email"/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-center">
                                        <div class="col-md-6">
                                            <x-base.input name="password" type="password" label="{{__('Password:') }}"
                                                        required autocomplete="new-password"/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-center">

                                        <div class="col-md-6">
                                            <x-base.input name="password_confirmation" label="{{__('Confirm Password') }}"
                                                        required autocomplete="new-password"/>
                                        </div>
                                    </div>
                                </x-form.section>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
