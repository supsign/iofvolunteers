@extends('layouts.app')

@section('content')
    <section class="default">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body ">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <x-form.section>
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-base.input name="email" type="email" label="{{ __('E-Mail Address:') }}"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">                                                                       
                                            <x-base.input name="password" type="password" label="{{ __('Password:') }}"
                                                    value="{{ old('password') }}" required autocomplete="current-password"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </x-form.section>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
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
