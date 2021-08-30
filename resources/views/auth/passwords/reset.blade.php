@extends('layouts.app')

@section('content')
    <section class="default">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <x-form.section>
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-7">
                                            <x-base.input name="email" type="email"
                                                        value="{{ $email }}" required hidden/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-center">
                                        <div class="col-md-7">
                                            <x-base.input name="password" type="password" label="{{__('Password') }}"
                                                        required autocomplete="new-password" autofocus/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-center">
                                        <div class="col-md-7">
                                            <x-base.input name="password_confirmation" type="password" label="{{__('Confirm Password') }}"
                                                        required autocomplete="new-password"/>
                                        </div>
                                    </div>
                                </x-form.section>

                                <div class="row justify-content-md-center">
                                    <div class="col-md-7">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
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
