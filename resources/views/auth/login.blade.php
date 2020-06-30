@extends('layouts.app')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
@section('content')
<div class="container-small">
    <div class="c-row ">
        <div class="w-100">
            <div class="log-card w-100">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="w-100">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group w-100">
                            <label for="email" class=" col-form-label ">{{ __('E-Mail Address') }}</label>
                            <br>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="password" class=" col-form-label ">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="offset-md-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group  mb-0  justify-content-center">
                            <div class="text-center w-100 pt-3">
                                <button type="submit" class="btn btn-primary logbtn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="text-center w-100">
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
@endsection
