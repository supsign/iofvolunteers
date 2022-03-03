@extends('layouts.app')

@section('content')
    <section class="default">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">
                            <div class="row justify-content-md-center red">
                                Please register first in order to use our services.
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <x-form.section>
                                    <div>
                                        <div class="row justify-content-md-center">
                                            <div class="col-md-7">
                                                <x-base.input name="email" type="email" label="{{ __('E-Mail Address') }}"
                                                        value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                            </div>
                                        </div>

                                        <div class="row justify-content-md-center">
                                            <div class="col-md-7">
                                                <x-base.input name="password" type="password" label="{{ __('Password') }}"
                                                        value="{{ old('password') }}" required autocomplete="current-password"/>
                                            </div>
                                        </div>

                                        <div class="row justify-content-md-center">
                                            <div class="col-md-7">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label mb-3" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </x-form.section>

                                <div class="row justify-content-md-center mb-3">
                                    <div class="col-md-7">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{ __('Login') }}
                                        </button>


                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-md-7 d-flex justify-content-between">
                                        @if (Route::has('register'))
                                            <a class="link" href="{{ route('register') }}">
                                                {{ __('Register') }}
                                            </a>
                                        @endif

                                        @if (Route::has('password.request'))
                                            <a class="link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
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
